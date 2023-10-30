<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - rME Blog</title>

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
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <h1 class="-top-3">Login</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf


                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Email address</label>
                            <input type="email" id="form1Example13" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Password</label>
                            <input type="password" id="form1Example23" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"  />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary btn-lg btn-block col-md-12">Sign in</button>

                        <div class="d-flex justify-content-between align-items-end " style="margin-top: 5px">
                            <a class="form-check-label col-md-12 ml-auto" style="text-align: right;" href="{{ url('/register') }}">Don't have an account?</a>
                        </div>



                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                        </div>

                        <a href="{{ route('auth-google') }}" class="btn btn-primary btn-lg btn-block col-md-12" style="background-color: #4285F4">
                            <i class="fab fa-google me-2"></i> Login with Google
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

</body>
</html>
