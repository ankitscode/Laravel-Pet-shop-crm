<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .html,
        body {
            background-color: #8EC5FC;
            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
        }

        .cc {
            margin-top: -0.1rem !important;
        }
    </style>
</head>

<body>
    <div class="auth-page-wrapper pt-5">
        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card mt-4 cc">

                                <div class="card-body p-2">
                                    <div class="text-center mt-2">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p class="text-muted">Sign Up to continue to YourVet Doc.</p>
                                    </div>
                                    <div class="p-2 mt-4">
                                        <form action="{{ route('register') }}" method="POST">
                                            @csrf
                                            <div class="mb-2">
                                                <label for="username" class="form-label">Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" " id=" username" name="name" placeholder="Enter username">
                                                @error('name')
    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
@enderror
                                            </div>
                                            <div class="mb-2">
                                                <label for="username" class="form-label">Email</label>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="username" name="email" placeholder="Enter username">
                                                @error('email')
    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
@enderror
                                            </div>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <label class="form-label" for="password-input">Password</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror pe-5" name="password" placeholder="Enter password" id="password-input">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                @error('password')
    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
@enderror
                                            </div>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-success w-100" type="submit">Sign </button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <div class="signin-other-title">
                                            <h5 class="fs-13 mb-4 title">Sign up with</h5>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="fa-brands fa-facebook fs-16"></i></button>
                                            
                                            <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="fa-brands fa-twitter fs-16"></i></button>
                                            <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="fa-brands fa-github fs-16"></i></button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        
    </div>
    @section('script')
                        <script src="{{ URL::asset('assets/libs/particles.js/particles.js.min.js') }}"></script>
                        <script src="{{ URL::asset('assets/js/pages/particles.app.js') }}"></script>
                        <script src="{{ URL::asset('assets/js/pages/password-addon.init.js') }}"></script>
                    </body>

                    </html>
