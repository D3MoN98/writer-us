@extends('admin.layout.app')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Form elements</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i
                                        class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.writer.index')}}">Writer</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Writer</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Writer Details</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form action="{{route('admin.job.update', $job->id)}}" method="post" enctype="multipart/form-data">

                <div class="row">
                    @csrf
                    @method('put')

                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Docement Type</label>
                            <select class="form-control" readonly name="job[document_type]" required>
                                <option value="">Select a document type</option>
                                @foreach ($document_types as $item)
                                <option {{ $job->document_type == $item ? 'selected' : ''}} value="{{$item}}">
                                    {{$item}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Academic Level</label>
                            <select class="form-control" readonly name="job[academic_level]" required>
                                <option value="">Select an academic level</option>
                                @foreach ($academic_levels as $item)
                                <option {{ $job->academic_level == $item ? 'selected' : '' }} value="{{$item}}">
                                    {{$item}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Number of pages :</label>
                            <input type="number" readonly name="job[pages]" value="{{$job->pages}}" class="form-control"
                                placeholder="" required>
                            <label>275 words one page (double spaced)</label>
                        </div>

                        <div class="form-group">
                            <label>Select your subject :</label>
                            <select class="form-control" readonly name="job[subject]" required>
                                <option value="">Select a subject</option>
                                @foreach ($subjects as $item)
                                <option {{ $job->subject == $item ? 'selected' : '' }} value="{{$item}}">
                                    {{$item}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Urgency :</label>
                            <select class="form-control" readonly name="job[urgency]" required>
                                <option value="">Select a urgency</option>
                                @foreach ($urgencies as $item)
                                <option {{ $job->urgency == $item['value'] ? 'selected' : '' }}
                                    data-urgency-price="{{$item['cost']}}" value="{{$item['value']}}">
                                    {{$item['value']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>What is your topic? </label>
                            <textarea class="form-control" readonly name="job[topic]" placeholder="Write about…"
                                required>{{$job->topic}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Paper instructions :</label>
                            <textarea class="form-control" readonly name="job[paper_instructions]"
                                placeholder="Any special requirements? Give us the main idea of the paper and other details (e.g. citation formatting)"
                                required>{{$job->paper_instructions}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Files :</label>
                            <ul class="list-group">
                                @if ($job->job_files->count() > 0)
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($job->job_files as $file)
                                <li class="list-group-item d-flex justify-content-between">File {{$i}} <a
                                        class="btn btn-link ml-auto" href="{{asset('storage/'.$file->file)}}"
                                        download>Download</a>
                                </li>
                                @php
                                $i++
                                @endphp
                                @endforeach
                                @endif
                            </ul>
                        </div>

                        <div class="form-group">
                            <label>Add Files :</label>
                            <input class="form-control" type="file" name="job_file[]" id="">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
