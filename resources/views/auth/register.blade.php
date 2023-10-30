<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - rME Blog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">

    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
</head>

<body style="background-color: #E3E6F0">

<div class="container-fluid" style="background-color: #E3E6F0">

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100" style="background-color: rgb(255, 255, 255); border-radius: 30px; padding: 0px 40px;">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Registration image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <h1 class="-top-3">Register</h1>
                    <form method="POST" action="{{ route('register') }}" id="register-form">
                        @csrf

                        <div class="form-outline mb-4">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required />
                            <span class="text-danger" id="name-error">@error('name') {{ $message }} @enderror</span>
                        </div>


                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email address</label>
                            <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required />
                            <span class="text-danger" id="email-error">@error('email') {{ $message }} @enderror</span>
                        </div>


                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required />
                            <span class="text-danger" id="password-error">@error('password') {{ $message }} @enderror</span>
                        </div>


                        <div class="form-outline mb-4">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" class="form-control form-control-lg" name="password_confirmation" required />
                            <span class="text-danger" id="password-confirmation-error">@error('password_confirmation') {{ $message }} @enderror</span>
                        </div>


                        <div id="form-errors" class="alert alert-danger" style="display: none;"></div>


                        <button type="button" id="submit-button" class="btn btn-primary btn-lg btn-block col-md-12">Register</button>
                        <div class="d-flex justify-content-between align-items-end " style="margin-top: 5px">
                            <a class="form-check-label col-md-12 ml-auto" style="text-align: right;" href="{{ url('/login') }}">Already have an account?</a>
                        </div>


                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                        </div>

                        <a href="{{ route('auth-google') }}" class="btn btn-primary btn-lg btn-block col-md-12" style="background-color: #4285F4">
                            <i class="fab fa-google me-2"></i> Register with Google
                        </a>


                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#submit-button').click(function() {

        $('#form-errors').hide().html('');

        var formData = $('#register-form').serialize();

        $.ajax({
            type: 'POST',
            url: $('#register-form').attr('action'),
            data: formData,
            success: function(response) {
                window.location.href = "{{ route('home') }}";
                console.log(response);
            },
            error: function(xhr) {

                var errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value) {
                    $('#' + key + '-error').html(value);
                });
                $('#form-errors').html('Please correct the errors above.').show();
            }
        });
    });
});
</script>
</body>
</html>
