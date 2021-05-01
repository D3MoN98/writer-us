@extends('admin.layout.app')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .preview .card {
        max-width: 250px;
        height: auto;
        overflow: hidden;
    }

    .preview .card img {
        width: 250px;
        height: auto;
    }
</style>
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
                            <li class="breadcrumb-item"><a href="{{route('admin.blog.index')}}">Blogs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Blog</li>
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
            <h3 class="mb-0">Blog Details</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form action="{{route('admin.blog.update', $blog->id)}}" method="post" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @csrf

                @method('put')
                <!-- Form groups used in grid -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="blogTitle">Title</label>
                            <input type="text" name="blog[title]" class="form-control" id="blogTitle"
                                placeholder="Title" value="{{$blog->title}}" required>

                            <div class="invalid-feedback">
                                Title is required
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="blogCategory">Category</label>
                            <select name="blog[category_id]" id="" class="form-control category-select"
                                id="blogCategory" placeholder="Category">
                                <option value="">Select a category</option>
                                @foreach ($blog_categories as $category)
                                <option value="{{$category->id}}"
                                    {{$blog->blog_category_id == $category->id ? 'selected' : ''}}>{{$category->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="blogExcerpt">Excerpt</label>
                            <textarea name="blog[excerpt]" id="" class="form-control" id="blogExcerpt"
                                placeholder="Excerpt">{{$blog->excerpt}}</textarea>
                        </div>


                        <div class="form-group">
                            <label class="form-control-label" for="blogContent">Content</label>
                            <textarea name="blog[content]" class="form-control content" id="blogContent"
                                placeholder="Content" required>{{$blog->content}}</textarea>
                            <div class="invalid-feedback">
                                Content is required
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="blogTags">Tags</label>
                            <select name="blog[tags][]" id="" class="form-control tags-select" id="blogTags"
                                placeholder="Tags" multiple>
                                @foreach ($tags as $tag)
                                <option value="{{$tag}}"
                                    {{is_array($blog->tags) && in_array($tag, $blog->tags) ? 'selected' : ''}}>{{$tag}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="blogImage">Blog Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" accept="image/*" name="blog_file[]"
                                    multiple id="blogImage" lang="en">
                                <label class="custom-file-label" for="blogImage">Select file</label>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="preview card-deck">
                                @if (!empty($blog->images))
                                @foreach ($blog->images as $image)
                                <div class="card">
                                    <img class="card-img-top" src="{{asset('storage/'.$image)}}" alt="">
                                    <div class="card-footer">
                                        <a href="#" class="text-danger img-delete float-right"
                                            data-value="{{$image}}"><b>Delete</b></a>
                                    </div>
                                </div>
                                @endforeach
                                @endif
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
    });

    $(".tags-select").select2({
        placeholder: "Select a tags",
        tags: true
    });
</script>

<script>
    // Multiple images preview in browser
var imagesPreview = function (input, placeToInsertImagePreview) {
  if (input.files) {
    var filesAmount = input.files.length;
    for (i = 0; i < filesAmount; i++) {
      var reader = new FileReader();
      reader.onload = function (event) {

        var card = $($.parseHTML("<div>")).addClass('card').addClass("card-preview");
        $($.parseHTML("<img>"))
          .attr("src", event.target.result)
          .addClass("card-img-top")
          .appendTo(card);
          card.appendTo(placeToInsertImagePreview);
      };
      reader.readAsDataURL(input.files[i]);
    }
  }
};
$("#blogImage").on("change", function () {
  $('div.preview .card-preview').remove();
  imagesPreview(this, "div.preview");
});

</script>


<script>
    $(document).on('click', '.img-delete', function(e){
        e.preventDefault();

        var _this = $(this);
        var img = $(this).data('value');

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
                $.ajax({
                    url: '{{url("admin/blog/delete/image")}}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': '{{$blog->id}}',
                        'image': img
                    },
                    type: 'post',
                    dataType: 'json',
                    success:function(data){
                        console.log(data);
                        _this.closest('.card').remove();
                        Swal.fire(
                            'Good job!',
                            'Image deleted',
                            'success'
                        );
                    }
                })
            }
        })
    });
</script>

<script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script>
<script>
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.replace('blogContent');
</script>

@endpush
