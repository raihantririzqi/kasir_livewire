<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <title>Laravel</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">Kasir</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link"  href="/">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="/pelanggan">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="/produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="/penjualan">Penjualan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div>
        {{ $slot }}
    </div>
    <script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
