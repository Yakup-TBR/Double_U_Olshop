<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>Navbar</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7 col-sm-9 col-md-7 col-lg-5 col-xl-5 col-xxl-4" id="logo">
            <img src="{{ asset('img/logo_juli_jewelry.png') }}" alt="Logo KosTel" class="d-block mx-auto">
                <h2 class="text-center">Juli Jewelry</h2>
                <!-- Menampilkan pesan error jika ada -->
                
        
                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" id="buttonLogin">Login</button>
                </form>
                @if ($errors->any())
                <div class="alert alert-danger" id="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>