@extends('layouts.layout')

@section('title', 'Tentang Kami')

@section('content')
<div class="card p-5 border-0 shadow-sm">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #764ba2;">Tentang Platform Workshop IT</h2>
        <div style="width: 60px; height: 4px; background: #667eea; margin: 10px auto;"></div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <p class="text-secondary" style="font-size: 1.1rem; line-height: 1.8;">
                Kami adalah komunitas yang berdedikasi untuk menyebarkan pengetahuan teknologi informasi kepada mahasiswa dan profesional muda. 
                Platform ini menyediakan informasi jadwal workshop terbaru, mulai dari pemrograman dasar hingga topik lanjutan seperti Machine Learning.
            </p>
        </div>
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-transparent"><i class="fas fa-check-circle text-success me-2"></i> Mentor Berpengalaman</li>
                <li class="list-group-item bg-transparent"><i class="fas fa-check-circle text-success me-2"></i> Materi Terupdate</li>
                <li class="list-group-item bg-transparent"><i class="fas fa-check-circle text-success me-2"></i> Sertifikat Digital</li>
            </ul>
        </div>
    </div>
</div>
@endsection