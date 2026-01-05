@extends('layouts.layout')

@section('title', 'Beranda')

@section('content')
<div class="row align-items-center min-vh-75 py-5">
    <div class="col-lg-6">
        <h1 class="display-4 fw-bold mb-3" style="color: #2d3748;">Tingkatkan Skill Coding Anda</h1>
        <p class="lead text-muted mb-4">Bergabunglah dengan ribuan developer lainnya dalam workshop eksklusif seputar teknologi web, mobile, dan AI terkini.</p>
        <div class="d-flex gap-2">
            <a href="{{ route('workshops.index') }}" class="btn btn-primary btn-lg px-4 shadow-sm" style="background: #667eea; border:none;">Lihat Workshop</a>
            <a href="/about" class="btn btn-outline-secondary btn-lg px-4 shadow-sm">Tentang Kami</a>
        </div>
    </div>
    <div class="col-lg-6 text-center mt-5 mt-lg-0">
        <img src="https://img.freepik.com/free-vector/programming-concept-illustration_114360-1351.jpg" alt="Hero Image" class="img-fluid rounded-4 shadow-lg">
    </div>
</div>
@endsection