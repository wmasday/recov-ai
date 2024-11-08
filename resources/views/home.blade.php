<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RecovAI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-light">
    <main class="content">
        <form class="row justify-content-center" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="col-sm-4 rounded-3 shadow-lg bg-white p-5">
                <img src="{{ asset('images/logo-recov.png') }}" alt="Logo Recov" style="width: 142px;height: 37px;"
                    class="mt-3" />

                <div class="mt-5">
                    <label class="text-secondary mb-2" style="font-size: 13px;">Email</label>
                    <input type="email" class="form-control py-2" placeholder="mail@mail.com" style="font-size: 13px;"
                        name="email" required />
                </div>
                <div class="mt-2">
                    <label class="text-secondary mb-2" style="font-size: 13px;">Password</label>
                    <input type="password" class="form-control py-2" style="font-size: 13px;" name="password"
                        required />
                </div>

                <button type="submit" class="btn btn-add-employee mt-5 w-100">Login</button>
            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: '{{ session('error') }}',
                confirmButtonText: 'Try Again'
            });
        </script>
    @endif
</body>

</html>
