<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Writer;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writers = Writer::all();
        return view('admin.writer_list')->with([
            'writers' => $writers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.writer_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $writer = $request->writer;

        // dd($price);
        $writer_files = [];
        if ($request->hasFile('writer_file')) {
            $writer['image'] = $request->file('writer_file')->store('storage/writers', 'public');
        }

        $writer_id = Writer::create($writer)->id;

        return redirect()->route('admin.writer.edit', $writer_id)->withSuccess('writer Added');
    }

    /**
     * Display the specified resource.
     *blog_id
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
        $writer = writer::find($id);


        return view('admin.writer_edit')->with([
            'writer' => $writer,
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
        $writer = $request->writer;
        if ($request->hasFile('writer_file')) {
            $writer['image'] = $request->file('writer_file')->store('storage/writers', 'public');
        }

        Writer::find($id)->update($writer);
        return redirect()->back()->withSuccess('Writer updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Writer::destroy($id);
        return redirect()->back()->withSuccess('Writer deleted');
    }
}