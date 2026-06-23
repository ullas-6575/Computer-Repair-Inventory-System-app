<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: rgb(240, 220, 255);">

    <nav class="navbar navbar-expand navbar-dark bg-primary px-4">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Computer Repair System</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="{{ route('technician.login') }}">Technician Login</a>
            <a class="nav-link" href="{{ route('customer.login') }}">Customer Login</a>
        </div>
    </nav>

    <div class="container py-5" style="max-width: 450px;">
        <div class="card shadow-sm">
            <div class="card-body p-4">

                <p class="text-secondary small mb-4">Login as a Customer</p>

                @if ($errors->any())
                    <div class="alert alert-danger py-2">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success py-2">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('customer.login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="form-control">
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" id="password" name="password" required class="form-control">
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                </form>

                <p class="text-center text-secondary small mb-0">
                    Don't have an account? <a href="{{ route('customer.register') }}" class="text-primary">Register here</a>
                </p>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
