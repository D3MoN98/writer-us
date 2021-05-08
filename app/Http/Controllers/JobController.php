<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobFile;
use App\Writer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Srmklive\PayPal\Services\ExpressCheckout;




class JobController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Auth::user()->jobs;
        return view('jobs')->with(['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $writers = Writer::all();
        $job = new Job();
        return view('job')->with([
            'writers' => $writers,
            'document_types' => $job->document_types(),
            'urgencies' => $job->urgencies(),
            'subjects' => $job->subjects(),
            'academic_levels' => $job->academic_levels(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $job = $request->job;
            $job['user_id'] = Auth::id();
            $job['writer_id'] = $job['writer_id'] ?? 1;
            $job['price'] = Writer::find(1)->cost + (int) $job['pages'] * 7 + (int) $this->urgencyCost($job['urgency']);

            $job = Job::create($job);


            $job_files = [];
            if ($request->hasFile('job_file')) {
                foreach ($request->file('job_file') as $file) {
                    $path = $file->store('storage/jobs', 'public');
                    JobFile::create([
                        'added_by' => Auth::id(),
                        'job_id' => $job->id,
                        'file' => $path
                    ]);
                }
            }

            if (isset($request->payment_type_stripe)) {
                $stripe = new \Stripe\StripeClient(env('STRIPE_API_KEY'));
                $token = $stripe->tokens->create([
                    'card' => [
                        'number' => $request->get('card_number'),
                        'exp_month' => $request->get('card_exp_month'),
                        'exp_year' => $request->get('card_exp_year'),
                        'cvc' => $request->get('card_cvv'),
                    ],
                ]);

                // dd($token['id']);

                if (!isset($token['id'])) {
                    return redirect()->back()->withErrors(['error' => 'something went wrong']);
                }

                Stripe\Stripe::setApiKey(env('STRIPE_API_KEY'));

                $charge = Stripe\Charge::create([
                    "amount" => $job['price'],
                    "currency" => "usd",
                    "source" => $token['id'],
                    "description" => "Making test payment."
                ]);

                if ($charge['status'] === 'succeeded') {

                    $job->update([
                        'payment_status' => 'paid'
                    ]);

                    $job->payment()->create([
                        'charge_id' => $charge['id'],
                        'amount' => (float) ($charge['amount']),
                        'status' => $charge['status'],
                        'type' => 'stripe'
                    ]);

                    return back()->withSuccess('Payment successfull');
                }
            } else if (isset($request->payment_type_paypal)) {

                $data['items'] = [
                    [
                        'name' => "Job_$job->id",
                        'price' => $job->price,
                        'desc'  => "New job $job->id",
                        'qty' => 1
                    ]
                ];

                $data['invoice_id'] = $job->id;
                $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
                $data['return_url'] = route('payment.success', $job->id);
                $data['cancel_url'] = route('payment.cancel', $job->id);
                $data['total'] = $job->price;

                $provider = new ExpressCheckout;

                $response = $provider->setExpressCheckout($data);

                $response = $provider->setExpressCheckout($data, true);

                return redirect($response['paypal_link']);
            }


            return redirect()->back()->withErrors(['error' => 'Something went wrong']);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Stripe\Exception\CardException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Stripe\Exception\BadMethodCallException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function urgencyCost($urgency)
    {
        switch ($urgency) {
            case '30 Days':
                $urgency_price = 0;
                break;
            case '14 Days':
                $urgency_price = 0;
                break;
            case '10 Days':
                $urgency_price = 0;
                break;
            case '7 Days':
                $urgency_price = 10;
                break;
            case '5 Days':
                $urgency_price = 10;
                break;
            case '3 Days':
                $urgency_price = 20;
                break;
            case '2 Days':
                $urgency_price = 20;
                break;
            case '24 Hours':
                $urgency_price = 30;
                break;
            case '16 Hours':
                $urgency_price = 30;
                break;
            case '12 Hours':
                $urgency_price = 30;
                break;
            case '5 Hours':
                $urgency_price = 30;
                break;
        }

        return $urgency_price;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $job = Job::find($id);

        if ($job->user_id !== auth()->user()->id) {
            abort(404); // or some other
        }

        return view('job_edit')->with([
            'job' => $job,
            'document_types' => $job->document_types(),
            'urgencies' => $job->urgencies(),
            'subjects' => $job->subjects(),
            'academic_levels' => $job->academic_levels(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function refund($id)
    {
        $job = Job::find($id);

        $payment = $job->payment;

        $stripe = new \Stripe\StripeClient(env('STRIPE_API_KEY'));

        $response = $stripe->refunds->create([
            'charge' => $payment->charge_id,
        ]);

        $job->update([
            'payment_status' => 'refunded'
        ]);

        return back()->withSuccess('Successfuly refunded');
    }


    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelPaypalPayment($id)
    {
        Job::find($id)->update([
            'payment_status' => 'due'
        ]);
        return redirect()->route('job.create')->withErrors(['error' => 'something went wrong']);
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function successPaypalPayment(Request $request, $id)
    {
        $provider = new ExpressCheckout;

        $response = $provider->getExpressCheckoutDetails($request->token);


        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $job = Job::find($id);

            $job->update([
                'payment_status' => 'paid'
            ]);

            $job->payment()->create([
                'charge_id' => $response['TOKEN'],
                'amount' => (float) ($job->price),
                'status' => 'succeeded',
                'type' => 'paypal'
            ]);

            return redirect()->route('job.create')->withSuccess('Payment successfull');
        }

        return redirect()->route('job.create')->withErrors(['error' => 'something went wrong']);
    }
}