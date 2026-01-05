@extends('layouts.layout')
@section('title', 'Login')
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card p-4">
            <h3 class="text-center mb-4">Login Pengguna</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err) {{ $err }} <br> @endforeach
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">MASUK</button>
                <div class="text-center mt-3">
                    <a href="{{ route('register') }}">Belum punya akun? Daftar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection