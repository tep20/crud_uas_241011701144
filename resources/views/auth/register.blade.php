<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - TS Luxury</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* Background gradasi gelap sesuai tema Luxury */
            background: linear-gradient(135deg, #070707 0%, #1a1a1a 100%);
            min-height: 100vh;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .text-gold { color: #d4af37; }
        .btn-gold {
            background-color: #d4af37;
            color: #000;
            border: none;
            font-weight: bold;
        }
        .btn-gold:hover {
            background-color: #b39025;
            color: #fff;
        }
        .login-card {
            width: 100%;
            max-width: 500px; /* Sedikit lebih lebar dari login untuk menampung field tambahan */
            background-color: #111;
            border: 1px solid #333;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);
            border-radius: 8px;
        }
        .form-control {
            background-color: #222;
            border: 1px solid #444;
            color: #eee;
        }
        .form-control:focus {
            background-color: #222;
            color: #fff;
            border-color: #d4af37;
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25);
        }
        .form-label {
            color: #ccc;
        }
        a {
            text-decoration: none;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #d4af37 !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card login-card">
                <div class="card-header text-center border-bottom border-secondary pt-4 pb-3">
                    <h3 class="mb-0 text-gold fw-bold">TS LUXURY</h3>
                    <small class="text-muted">Buat Akun Baru</small>
                </div>
                <div class="card-body p-4">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required 
                                autofocus
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input 
                                    type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    id="password" 
                                    name="password" 
                                    required
                                >
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="password-confirmation" class="form-label">Konfirmasi Password</label>
                                <input 
                                    type="password" 
                                    class="form-control @error('password_confirmation') is-invalid @enderror" 
                                    id="password-confirmation" 
                                    name="password_confirmation" 
                                    required
                                >
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-gold w-100 mb-3 py-2">DAFTAR SEKARANG</button>
                    </form>

                    <div class="text-center mt-3 border-top border-secondary pt-3">
                        <span class="text-muted" style="font-size: 0.9rem;">Sudah punya akun?</span>
                        <a href="{{ route('login') }}" class="text-gold fw-bold ms-1" style="font-size: 0.9rem;">Login di sini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>