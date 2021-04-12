<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('register-action')}}" method="post" class="needs-validation" novalidate>
                @csrf


                <div class="modal-header">
                    <h5 class="modal-title">Register </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="registerName">Name</label>
                        <input type="text" name="name" id="registerName"
                            class="form-control  @error('name') is-invalid @enderror" placeholder=""
                            aria-describedby="helpId" value="{{old('name')}}" required>

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

                    <div class="form-group">
                        <label for="registerEmail">Email</label>
                        <input type="email" name="email" id="registerEmail"
                            class="form-control  @error('email') is-invalid @enderror" placeholder=""
                            aria-describedby="helpId" value="{{old('email')}}" required>
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


                    <div class="form-group">
                        <label for="registerContact">Contact</label>
                        <input type="tel" name="contact_no" id="registerContact"
                            class="form-control  @error('contact_no') is-invalid @enderror" placeholder=""
                            aria-describedby="helpId" value="{{old('contact_no')}}"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                            maxlength="10" required>
                        @error('contact_no')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @else
                        <div class="invalid-feedback">
                            Contact is required
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="registerPassword">Password</label>
                        <input type="password" name="password" id="registerPassword"
                            class="form-control  @error('password') is-invalid @enderror" placeholder=""
                            aria-describedby="helpId" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @else
                        <div class="invalid-feedback">
                            Password is required
                        </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="registerConfirmPassword">Confirm Password</label>
                        <input type="password" name="confirm_password" id="registerConfirmPassword"
                            class="form-control  @error('confirm_password') is-invalid @enderror" placeholder=""
                            aria-describedby="helpId" required>
                        @error('confirm_password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @else
                        <div class="invalid-feedback">
                            Confirm Password is required
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary cmn_btn">Register</button>
                    <button type="button" class="btn btn-primary cmn_btn lg-in" data-toggle="modal"
                        data-target="#loginModal">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

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

@if ($errors->any())

@push('scripts')

<script>
    $('#registerModal').modal('show');
</script>

@endpush

@endif
