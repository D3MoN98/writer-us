@extends('admin.layout.app')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Form elements</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i
                                        class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.writer.index')}}">Writer</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Writer</li>
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
            <h3 class="mb-0">Writer Details</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <form action="{{route('admin.writer.update', $writer->id)}}" method="post" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @method('put')

                @csrf
                <!-- Form groups used in grid -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="writerName">Writer Name</label>
                            <input type="text" name="writer[name]" value="{{$writer->name}}" class="form-control"
                                id="writerName" placeholder="Name" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="writerFinishedPapers">Writer finished papers</label>
                            <input type="number" name="writer[finished_papers]" value="{{$writer->finished_papers}}"
                                class="form-control" id="writerFinishedPapers"
                                placeholder="Total number of finished papers">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="writerCustomerReviews">Writer customer
                                reviews</label>
                            <input type="number" name="writer[customer_reviews]" value="{{$writer->customer_reviews}}"
                                class="form-control" id="writerCustomerReviews"
                                placeholder="Total number of customer reviews">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="writerGlobalRatingRank">Writer global rating
                                rank</label>
                            <input type="number" name="writer[global_rating_rank]"
                                value="{{$writer->global_rating_rank}}" class="form-control" id="writerGlobalRatingRank"
                                placeholder="Global rating rank">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="writerRatingScore">Rating score</label>
                            <input type="number" name="writer[rating_score]" value="{{$writer->rating_score}}"
                                class="form-control" id="writerRatingScore" placeholder="Rating score">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="writerSuccessRate">Success rate</label>
                            <input type="number" name="writer[success_rate]" value="{{$writer->success_rate}}"
                                class="form-control" id="writerSuccessRate" placeholder="Success rate">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="writerCost">Cost</label>
                            <input type="number" name="writer[cost]" value="{{$writer->cost}}" class="form-control"
                                id="writerCost" placeholder="Cost">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="writerCost">Writer Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="writer_file"
                                    value="{{$writer->writer_file}}" id="writerImage" lang="en" required>
                                <label class="custom-file-label" for="writerImage"></label>
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


@endpush
