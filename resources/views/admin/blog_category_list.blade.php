@extends('admin.layout.app')


@section('content')

<div class="header bg-primary py-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i
                                        class="fas fa-home"></i></a></li>
                            <a class="breadcrumb-item" href="{{route('admin.blog.index')}}" aria-current="page">Blogs
                            </a>
                            <li class="breadcrumb-item active" aria-current="page">Blog Category</li>
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
                    <h3 class="mb-0">Blog Categories</h3>
                    <a href="{{route('admin.blog-category.create')}}" class="btn btn-primary float-right">Create</a>
                </div>
                <div class="table-responsive py-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($blog_categories->count() > 0)
                            @foreach ($blog_categories as $blog_category)
                            <tr>
                                <td scope="row">{{$blog_category->id}}</td>
                                <td>{{$blog_category->name}}</td>
                                <td>{{$blog_category->slug}}</td>
                                <td>{{$blog_category->created_at->format('m/d/Y')}}</td>
                                <td>
                                    <form action="{{route('admin.blog-category.destroy', $blog_category->id)}}"
                                        method="post">
                                        @csrf
                                        @method('delete')

                                        <a href="{{route('admin.blog-category.edit', $blog_category->id)}}"
                                            type="button" class="btn btn-sm btn-primary"><i class="fa fa-edit"
                                                style="font-weight: bolder"></i></a>

                                        <button type="submit" class="btn btn-sm btn-danger delete"><i
                                                class="fa fa-trash" style="font-weight: bolder"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="7">No Blog Categories</td>
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
