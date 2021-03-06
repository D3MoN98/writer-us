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
    <div class="user-dashboard-otr card">
        <div class="row my-2">
            <div class="col-12">
                <ul class="nav nav-pills justify-content-center mb-3">
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="v-pills-profile-tab"
                            href="{{route('profile')}}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary active" href="{{route('job.index')}}">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('message')}}" class="nav-link text-primary">Send Message</a>
                    </li>
                </ul>
            </div>
            <div class="col-12">
                <div class="tab-content">
                    <div class="tab-pane fade show active">
                        <div class="row">
                            <div class="col-12">
                                <h3>Job List</h3>
                                <hr>
                                <div class="job-list">
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
                                                <td>
                                                    @php
                                                    switch($job->status){
                                                    case 'revision':
                                                    $badge = 'warning';
                                                    break;
                                                    case 'accepted':
                                                    $badge = 'success';
                                                    break;
                                                    case 'completed':
                                                    $badge = 'success';
                                                    break;
                                                    case 'released':
                                                    $badge = 'success';
                                                    break;
                                                    case 'cancelled':
                                                    $badge = 'danger';
                                                    break;
                                                    case 'refunded':
                                                    $badge = 'danger';
                                                    break;
                                                    default:
                                                    $badge = 'primary';
                                                    break;
                                                    }
                                                    @endphp
                                                    <span class="badge badge-{{$badge}}">
                                                        {{ucwords($job->status)}}
                                                    </span>
                                                </td>
                                                <td>{{$job->created_at->format('m/d/Y')}}</td>
                                                <td class="text-center">
                                                    <form action="{{route('job.refund', $job->id)}}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        @if (!in_array($job->status, ['released', 'cancelled',
                                                        'refunded']))
                                                        <a href="{{route('job.edit', $job->id)}}" type="button"
                                                            class="btn btn-sm btn-outline-primary">View Job</a>
                                                        @endif
                                                        @if ($job->payment_status != 'refunded' && isset($job->payment)
                                                        &&
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
        </div>

    </div>

    @endsection
