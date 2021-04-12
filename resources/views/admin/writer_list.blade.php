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
                            <li class="breadcrumb-item active" aria-current="page">Writer</li>
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
                    <h3 class="mb-0">Writers</h3>
                    <a class="btn btn-sm btn-primary float-right" href="{{route('admin.writer.create')}}">Create
                        Writer</a>
                </div>
                <div class="table-responsive py-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Cost</td>
                                <td>Created At</td>
                                <td>Updated At</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($writers->count() > 0)
                            @foreach ($writers as $writer)
                            <tr>
                                <td>{{$writer->name}}</td>
                                <td>{{$writer->cost}}</td>
                                <td>{{$writer->created_at->format('m-d-Y H:i')}}</td>
                                <td>{{$writer->updated_at->format('m-d-Y H:i')}}</td>
                                <td>
                                    <a href="{{route('admin.writer.edit', $writer->id)}}"
                                        class="btn btn-sm btn-info">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                            @if($writers->count() == 0)
                            <tr>
                                <td colspan="5">No writer please add</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
