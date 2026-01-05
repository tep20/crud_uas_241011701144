@extends('layouts.layout')

@section('title', 'Tambah Workshop')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header bg-white py-3 border-bottom-0">
                <h5 class="mb-0 fw-bold text-primary"><i class="fas fa-plus-circle me-2"></i>Formulir Workshop Baru</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('workshops.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4 text-center">
                        <label class="form-label fw-bold d-block text-start">Upload Poster</label>
                        <div class="p-4 border-2 border-dashed rounded-3 bg-light">
                            <input type="file" class="form-control" name="gambar" required>
                            <small class="text-muted d-block mt-2">Format: JPG, JPEG, PNG (Max: 2MB)</small>
                        </div>
                        @error('gambar') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-bold">Tema Workshop</label>
                            <input type="text" class="form-control form-control-lg bg-light" name="tema" placeholder="Contoh: Belajar Laravel Dasar" value="{{ old('tema') }}">
                            @error('tema') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Pembicara</label>
                            <input type="text" class="form-control bg-light" name="pembicara" placeholder="Nama Pemateri" value="{{ old('pembicara') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Penyelenggara</label>
                            <input type="text" class="form-control bg-light" name="penyelenggara" placeholder="Nama Organisasi/Kampus" value="{{ old('penyelenggara') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Lokasi</label>
                            <input type="text" class="form-control bg-light" name="lokasi" placeholder="Gedung / Link Zoom" value="{{ old('lokasi') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tanggal</label>
                            <input type="date" class="form-control bg-light" name="tanggal" value="{{ old('tanggal') }}">
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('workshops.index') }}" class="btn btn-light border rounded-pill px-4">Batal</a>
                        <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold" style="background: #667eea; border:none;">
                            <i class="fas fa-save me-1"></i> SIMPAN DATA
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection