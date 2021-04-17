@extends('layout.app')

@push('styles')
<style>
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: white !important;
    }
</style>
@endpush

@section('content')

<div class="container">
    <div class="row my-5">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link text-primary" id="v-pills-profile-tab" href="{{route('profile')}}">Profile</a>
                <a class="nav-link text-primary active" href="{{route('job.index')}}">Jobs</a>
                <a class="nav-link text-primary">Payment Method</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content">
                <div class="tab-pane fade show active">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Service</th>
                                    <th>Subject</th>
                                    <th>Writer</th>
                                    <th>Pages</th>
                                    <th>Deadline</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                <tr>
                                    <td scope="row">{{$job->id}}</td>
                                    <td>{{$job->service}}</td>
                                    <td>{{$job->subject}}</td>
                                    <td>{{$job->writer->name}}</td>
                                    <td>{{$job->pages}}</td>
                                    <td>{{date('m/d/Y', strtotime($job->deadline))}}</td>
                                    <td>{{$job->created_at->format('m/d/Y')}}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-edit"
                                                style="font-weight: bolder"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
