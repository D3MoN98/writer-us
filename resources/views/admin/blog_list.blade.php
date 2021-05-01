@extends('admin.layout.app')


@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i
                                        class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
                    <h3 class="mb-0">Blogs</h3>

                    <a href="{{route('admin.blog.create')}}" class="btn btn-primary float-right">Create</a>
                </div>
                <div class="table-responsive py-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Writer</th>
                                <th>Category</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($blogs->count() > 0)
                            @foreach ($blogs as $blog)
                            <tr>
                                <td scope="row">{{$blog->id}}</td>
                                <td>{{$blog->title}}</td>
                                <td>{{$blog->slug}}</td>
                                <td>{{$blog->user->name ?? null}}</td>
                                <td>{{$blog->blog_category->name ?? null}}</td>
                                <td>{{$blog->created_at->format('m/d/Y')}}</td>
                                <td>
                                    <form action="{{route('admin.blog.destroy', $blog->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{route('admin.blog.edit', $blog->id)}}" type="button"
                                            class="btn btn-sm btn-primary"><i class="fa fa-edit"
                                                style="font-weight: bolder"></i></a>
                                        <button type="submit" class="btn btn-sm btn-danger delete"><i
                                                class="fa fa-trash" style="font-weight: bolder"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="7">No Blogs</td>
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

@push('scripts')

<script>
    $(document).on('click', '.delete', function(e){
        e.preventDefault();
        var _this = $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                _this.closest('form').submit();
            }
        })
    })
</script>

@endpush
