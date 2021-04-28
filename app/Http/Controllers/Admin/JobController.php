<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Job;
use App\JobFile;
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
        $job_files = [];
        if ($request->hasFile('job_file')) {
            foreach ($request->file('job_file') as $file) {
                $path = $file->store('storage/jobs', 'public');
                JobFile::create([
                    'added_by' => Auth::id(),
                    'job_id' => $id,
                    'file' => $path
                ]);
            }
        }

        return back()->withSuccess('Your job successfuly submitted');
    }
}