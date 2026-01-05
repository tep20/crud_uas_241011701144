@extends('layouts.layout')
@section('title', 'Login')
@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <h3 class="fw-bold" style="color: #4a5568;">Selamat Datang Kembali</h3>
                    <p class="text-muted">Silakan login untuk mengelola data</p>
                </div>

                <form action="{{ route('login.process') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-uppercase text-muted">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                            <input type="email" name="email" class="form-control bg-light border-start-0" placeholder="name@example.com" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                            <input type="password" name="password" class="form-control bg-light border-start-0" placeholder="********" required>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary py-2 rounded-3 fw-bold shadow-sm" style="background: linear-gradient(to right, #667eea, #764ba2); border:none;">MASUK SEKARANG</button>
                    </div>
                </form>
                <div class="text-center mt-4">
                    <small class="text-muted">Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: #667eea;">Daftar disini</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection