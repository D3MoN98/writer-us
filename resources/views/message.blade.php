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
                        <a class="nav-link text-primary " href="{{route('job.index')}}">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('message')}}" class="nav-link text-primary active">Send Message</a>
                    </li>
                </ul>
            </div>
            <div class="col-12">
                <div class="tab-content">
                    <div class="tab-pane fade show active">
                        <form action="{{route('message.send')}}" method="post" class="needs-validation" novalidate>

                            <div class="row">
                                @csrf

                                <div class="col-12">
                                    <h3>Message</h3>
                                    <hr>
                                    <div class="form-group">
                                        <label for="">Message</label>
                                        <textarea class="form-control" name="message" id="" cols="30" rows="10"
                                            required></textarea>
                                        <div class="invalid-feedback">
                                            Messsage is required
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
