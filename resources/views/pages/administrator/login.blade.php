<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/login-form/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/login-form/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/login-form/css/style.css') }}">

    <title>Halaman Login - Web Desa</title>
</head>

<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('assets/login-form/images/desa.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3>Halaman Login <strong>Web Desa</strong></h3>
                        <p class="mb-4">Silahkan login untuk mengakses halaman admin Web Desa!
                        </p>
                        <form action="/postlogin" method="post">

                            {{ csrf_field() }}

                            <div class="form-group first">
                                <label for="username">Email</label>
                                <input type="text" class="form-control" placeholder="Masukkan email" id="email"
                                    name="email">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Masukkan password"
                                    name="password" id="password">
                            </div>

                            <input type="submit" value="Log In" class="btn btn-block btn-success">

                        </form>

                        @if (count($errors))
                            <div class="alert alert-danger" style="margin-top: 15px" role="alert">
                                Maaf! Password atau Email yang anda masukkan Salah!
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>


    </div>



    <script src="{{ asset('assets/login-form/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/login-form/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/login-form/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/login-form/js/main.js') }}"></script>



</body>

</html>
