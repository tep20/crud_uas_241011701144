@extends('layouts.layout')

@section('title', 'Daftar Workshop')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark" style="color: #2d3748;">Jadwal Workshop IT</h2>
    <div>
        <a href="{{ route('workshops.create') }}" class="btn btn-primary shadow-sm rounded-pill px-4">
            <i class="fas fa-plus me-2"></i>Tambah Data
        </a>
        <a href="{{ route('workshops.export-pdf') }}" class="btn btn-danger shadow-sm rounded-pill px-4 ms-2">
            <i class="fas fa-file-pdf me-2"></i>Export PDF
        </a>
    </div>
</div>

<div class="card border-0 shadow-lg rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-uppercase text-secondary small fw-bold">No</th>
                        <th class="py-3 text-uppercase text-secondary small fw-bold">Poster</th>
                        <th class="py-3 text-uppercase text-secondary small fw-bold">Tema & Pembicara</th>
                        <th class="py-3 text-uppercase text-secondary small fw-bold">Jadwal & Lokasi</th>
                        <th class="text-center py-3 text-uppercase text-secondary small fw-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($workshops as $item)
                    <tr>
                        <td class="ps-4 fw-bold text-muted">{{ $loop->iteration }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/workshops/' . $item->gambar) }}" 
                                     alt="Poster" 
                                     class="rounded-3 shadow-sm object-fit-cover" 
                                     style="width: 80px; height: 110px;">
                            @else
                                <span class="badge bg-secondary rounded-pill">No Image</span>
                            @endif
                        </td>
                        <td>
                            <h6 class="mb-1 fw-bold text-dark">{{ $item->tema }}</h6>
                            <p class="mb-0 small text-muted">
                                <i class="fas fa-user-tie me-1 text-primary"></i> {{ $item->pembicara }}<br>
                                <i class="fas fa-building me-1 text-info"></i> {{ $item->penyelenggara }}
                            </p>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <span class="badge bg-soft-success text-success mb-1" style="width: fit-content;">
                                    <i class="far fa-calendar-alt me-1"></i> {{ date('d M Y', strtotime($item->tanggal)) }}
                                </span>
                                <small class="text-muted"><i class="fas fa-map-marker-alt me-1 text-danger"></i> {{ $item->lokasi }}</small>
                            </div>
                        </td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Yakin ingin menghapus data ini?');" action="{{ route('workshops.destroy', $item->id) }}" method="POST">
                                <a href="{{ route('workshops.edit', $item->id) }}" class="btn btn-sm btn-warning text-white rounded-pill px-3 shadow-sm mb-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3 shadow-sm mb-1">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="text-muted">
                                <i class="fas fa-folder-open fa-3x mb-3 opacity-50"></i>
                                <p class="mb-0">Belum ada data workshop.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0 py-3">
        {{ $workshops->links() }}
    </div>
</div>
@endsection