<!-- Modal -->
<div class="modal fade" id="forgetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('password.email')}}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Forget Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($errors->first('forget-password-error'))
                    <div class="alert alert-danger text-center">
                        <strong>{{$errors->first('forget-password-error')}}</strong>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="frgPsEmail">Email</label>
                        <input type="email" name="email" id="frgPsEmail" class="form-control" placeholder=""
                            aria-describedby="helpId" required>

                        <div class="invalid-feedback">
                            Email is required
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary cmn_btn">Send Link</button>
                    <button type="button" class="btn btn-primary cmn_btn lg-in" data-dismiss="modal">Cancel</button>
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

@if ($errors->first('forget-password-error'))

@push('scripts')

<script>
    $('#forgetPasswordModal').modal('show');
</script>

@endpush

@endif
