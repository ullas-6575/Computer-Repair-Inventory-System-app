<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand navbar-dark bg-primary px-4">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Computer Repair System</a>
        <div class="navbar-nav ms-auto d-flex align-items-center">
            <span class="navbar-text text-white me-3">C {{ Auth::guard('customer')->user()->name }}</span>

            <form action="{{ route('customer.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
