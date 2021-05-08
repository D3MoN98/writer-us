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
                <a href="{{route('message')}}" class="nav-link text-primary">Send Message</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content">
                <div class="tab-pane fade show active">
                    <div class="row">
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Subject</th>
                                        <th>Writer</th>
                                        <th>Pages</th>
                                        <th>Urgency</th>
                                        <th>Price</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                    <tr>
                                        <td scope="row">{{$job->id}}</td>
                                        <td>{{$job->subject}}</td>
                                        <td>{{$job->writer->name}}</td>
                                        <td>{{$job->pages}}</td>
                                        <td>{{$job->urgency}}</td>
                                        <td>{{$job->price}}</td>
                                        <td>{{$job->payment_status}} ({{$job->payment->type ?? null}})</td>
                                        <td>{{$job->status}}</td>
                                        <td>{{$job->created_at->format('m/d/Y')}}</td>
                                        <td class="text-center">
                                            <form action="{{route('job.refund', $job->id)}}" method="post">
                                                @csrf
                                                @method('put')
                                                @if (!in_array($job->status, ['released', 'cancelled']))
                                                <a href="{{route('job.edit', $job->id)}}" type="button"
                                                    class="btn btn-sm btn-outline-primary">Edit</a>
                                                @endif
                                                @if ($job->payment_status != 'refunded' && isset($job->payment) &&
                                                $job->payment->type ==
                                                'stripe')
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger">Refund</button>
                                                @endif
                                            </form>
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
