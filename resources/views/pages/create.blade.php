@extends('layouts.layout')

@section('title', 'Tambah Data Workshop')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-lg rounded-lg">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 fw-bold"><i class="fas fa-plus-circle me-2"></i> Tambah Workshop Baru</h5>
            </div>
            <div class="card-body p-4">
                
                <form action="{{ route('workshops.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">GAMBAR POSTER</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                        
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">TEMA WORKSHOP</label>
                        <input type="text" class="form-control @error('tema') is-invalid @enderror" name="tema" value="{{ old('tema') }}" placeholder="Masukkan Tema Workshop">
                        
                        @error('tema')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">PEMBICARA</label>
                            <input type="text" class="form-control @error('pembicara') is-invalid @enderror" name="pembicara" value="{{ old('pembicara') }}" placeholder="Nama Pembicara">
                            
                            @error('pembicara')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">PENYELENGGARA</label>
                            <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror" name="penyelenggara" value="{{ old('penyelenggara') }}" placeholder="Penyelenggara">
                            
                            @error('penyelenggara')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">LOKASI</label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi') }}" placeholder="Lokasi Acara">
                            
                            @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">TANGGAL</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}">
                            
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> SIMPAN</button>
                        <button type="reset" class="btn btn-warning"><i class="fas fa-redo me-1"></i> RESET</button>
                        <a href="{{ route('workshops.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> KEMBALI</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection