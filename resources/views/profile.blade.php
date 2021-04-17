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
                <a class="nav-link text-primary active" id="v-pills-profile-tab" href="{{route('profile')}}">Profile</a>
                <a class="nav-link text-primary" href="{{route('job.index')}}">Jobs</a>
                <a class="nav-link text-primary">Payment Method</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content">
                <div class="tab-pane fade show active">
                    <form action="{{route('profile.update')}}" method="POST" class="needs-validation" novalidate>
                        <div class="row">

                            @csrf
                            @method('put')

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder=""
                                        value="{{$user->name}}" required>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @else
                                    <div class="invalid-feedback">
                                        Name is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder=""
                                        value="{{$user->email}}" required>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @else
                                    <div class="invalid-feedback">
                                        Email is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="contact_no">Contact No</label>
                                    <input type="tel" name="contact_no"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        maxlength="10" id="contact_no"
                                        class="form-control @error('contact_no') is-invalid @enderror" placeholder=""
                                        value="{{$user->contact_no}}" required>
                                    @error('contact_no')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @else
                                    <div class="invalid-feedback">
                                        Contact No is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
