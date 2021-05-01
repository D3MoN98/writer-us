@extends('admin.layout.app')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

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
                            <li class="breadcrumb-item"><a href="{{route('admin.blog-category.index')}}">Blog
                                    Categories</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Blog Category</li>
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
            <h3 class="mb-0">Blog Category Details</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form action="{{route('admin.blog-category.store')}}" method="post" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @csrf
                <!-- Form groups used in grid -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="blogName">Name</label>
                            <input type="text" name="blog_category[name]" class="form-control" id="blogName"
                                placeholder="Name" required>

                            <div class="invalid-feedback">
                                Name is required
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection


@push('scripts')

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(".category-select").select2({
        placeholder: "Select a category",
        allowClear: true
    });

    $(".tags-select").select2({
        placeholder: "Select a tags",
        allowClear: true
        tags: true
    });
</script>

@endpush
