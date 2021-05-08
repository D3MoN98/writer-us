@extends('admin.layout.app')


@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Datatables</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i
                                        class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Job</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Jobs</h3>
                </div>
                <div class="table-responsive py-4">
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
                                <th>Action</th>
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
                                <td>{{$job->payment_status}}</td>
                                <td>{{$job->status}}</td>
                                <td>{{$job->created_at->format('m/d/Y')}}</td>
                                <td>
                                    <form action="{{route('admin.job.release', $job->id)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <a href="{{route('admin.job.edit', $job->id)}}" type="button"
                                            class="btn btn-sm btn-primary"><i class="fa fa-edit"
                                                style="font-weight: bolder"></i></a>
                                        @if (!in_array($job->status, ['released', 'cancelled']))
                                        <button type="submit" class="btn btn-sm btn-success release" title="Release"><i
                                                class="fa fa-check" style="font-weight: bolder"></i></button>
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


@endsection

@push('scripts')

<script>
    $(document).on('click', '.release', function(e){
        e.preventDefault();
        var _this = $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, release it!'
        }).then((result) => {
            if (result.value) {
                _this.closest('form').submit();

            }
        })
    })
</script>

@endpush
