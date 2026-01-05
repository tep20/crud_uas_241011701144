@extends('layouts.layout')

@section('title', 'Login Area')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-5">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header text-center py-4 bg-primary text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <h4 class="mb-0 fw-bold"><i class="fas fa-user-circle me-2"></i>Login Admin</h4>
            </div>
            <div class="card-body p-5 bg-white">
                <form action="{{ route('login.process') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control rounded-3" id="email" placeholder="name@example.com" required>
                        <label for="email">Alamat Email</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" name="password" class="form-control rounded-3" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    
                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold" style="background: #667eea; border:none;">MASUK SEKARANG</button>
                    </div>
                    
                    <div class="text-center">
                        <span class="text-muted">Belum punya akun?</span>
                        <a href="{{ route('register') }}" class="text-decoration-none fw-bold text-primary">Daftar Disini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection