<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobFile;
use App\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('job')->with(['writers' => $writers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = $request->job;
        $job['user_id'] = Auth::id();
        $job['writer_id'] = 1;
        $job['price'] = Writer::find(1)->cost * $job['pages'];

        $job_id = Job::create($job)->id;

        $job_files = [];
        if ($request->hasFile('job_file')) {
            foreach ($request->file('job_file') as $file) {
                $path = $file->store('storage/jobs', 'public');
                JobFile::create([
                    'job_id' => $job_id,
                    'file' => $path
                ]);
            }
        }

        return back()->withSuccess('Your job successfuly submitted');
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
        //
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
}