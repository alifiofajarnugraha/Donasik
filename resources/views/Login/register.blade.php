<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - DONASIK</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Register Page -->
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="text-center mb-4">
                <h2 class="text-dark">Daftar DONASIK</h2>
                <p class="text-muted">Buat akun untuk mulai berdonasi</p>
            </div>

            <div class="card shadow-lg">
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <!-- Full Name Field -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <!-- Password Field -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <!-- Password Confirmation Field -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        </div>

                        <!-- Phone Field -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone" class="form-control" required>
                        </div>

                        <!-- Terms & Conditions Checkbox -->
                        <div class="form-check mb-3">
                            <input type="checkbox" id="terms" name="terms" class="form-check-input" required>
                            <label for="terms" class="form-check-label">Saya setuju dengan <a href="#" class="text-primary">Syarat & Ketentuan</a></label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    </form>

                    <!-- Login Link -->
                    <div class="mt-4 text-center">
                        <p class="text-muted">
                            Sudah punya akun? <a href="/login" class="text-primary">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
