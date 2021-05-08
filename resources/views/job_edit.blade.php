@extends('layout.app')

@push('styles')
<style>
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: white !important;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
@endpush

@section('content')

<div class="container">
    <div class="row my-5">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link text-primary" id="v-pills-profile-tab" href="{{route('profile')}}">Profile</a>
                <a class="nav-link text-primary active" href="{{route('job.index')}}">Jobs</a>
                <a href="{{route('message')}}" class="nav-link text-primary">Send Message</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content">
                <div class="tab-pane fade show active">
                    <form action="{{route('job.update', $job->id)}}" method="post">

                        <div class="row">
                            @csrf
                            @method('put')

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Docement Type</label>
                                    <select class="form-control" name="job[document_type]" required>
                                        <option value="">Select a document type</option>
                                        @foreach ($document_types as $item)
                                        <option {{ $job->document_type == $item ? 'selected' : ''}} value="{{$item}}">
                                            {{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Academic Level</label>
                                    <select class="form-control" name="job[academic_level]" required>
                                        <option value="">Select an academic level</option>
                                        @foreach ($academic_levels as $item)
                                        <option {{ $job->academic_level == $item ? 'selected' : '' }} value="{{$item}}">
                                            {{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Number of pages :</label>
                                    <input type="number" name="job[pages]" value="{{$job->pages}}" class="form-control"
                                        placeholder="" required>
                                    <label>275 words one page (double spaced)</label>
                                </div>

                                <div class="form-group">
                                    <label>Select your subject :</label>
                                    <select class="form-control" name="job[subject]" required>
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
                                    <select class="form-control" name="job[urgency]" required>
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
                                    <textarea class="form-control" name="job[topic]" placeholder="Write about…"
                                        required>{{$job->topic}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Paper instructions :</label>
                                    <textarea class="form-control" name="job[paper_instructions]"
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
                                        <li class="list-group-item d-flex justify-content-between">File {{$i}}
                                            <a class="btn btn-link ml-auto" data-fancybox data-type="iframe"
                                                data-src="{{asset('storage/'.$file->file)}}" href="javascript:;">
                                                View
                                            </a>
                                        </li>


                                        @php
                                        $i++
                                        @endphp
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endpush
