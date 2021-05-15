<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Job;
use App\JobFile;
use App\Mail\JobAddFilesMail;
use App\Mail\JobReleaseMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();

        return view('admin.job_list')->with([
            'jobs' => $jobs
        ]);
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

        return view('admin.job_edit')->with([
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
        if ($request->hasFile('job_demo_file')) {
            foreach ($request->file('job_demo_file') as $file) {
                $path = $file->store('storage/jobs', 'public');
                JobFile::create([
                    'added_by' => Auth::id(),
                    'job_id' => $id,
                    'file' => $path
                ]);
            }

            Job::find($id)->update([
                'status' => 'in progress'
            ]);
        } else if ($request->hasFile('job_final_file')) {
            foreach ($request->file('job_final_file') as $file) {
                $path = $file->store('storage/jobs', 'public');
                JobFile::create([
                    'added_by' => Auth::id(),
                    'job_id' => $id,
                    'file' => $path,
                    'is_demo' => 1
                ]);
            }
            Job::find($id)->update([
                'status' => 'completed'
            ]);
        }

        $job = Job::find($id);

        Mail::to($job->user->email)->send(new JobAddFilesMail($job));

        return back()->withSuccess('Job successfuly updated');
    }

    public function release($id)
    {
        $job = Job::find($id);
        $job->update([
            'status' => 'released'
        ]);

        Mail::to($job->user->email)->send(new JobReleaseMail($job));

        return back()->withSuccess('Job successfuly released');
    }
}