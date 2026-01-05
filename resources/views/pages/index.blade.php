@extends('layouts.layout')

@section('title', 'Daftar Workshop')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark mb-0">Jadwal Workshop IT</h3>
    <div>
        <a href="{{ route('workshops.create') }}" class="btn btn-primary shadow-sm" style="background: #667eea; border:none;">
            <i class="fas fa-plus me-1"></i> Tambah Data
        </a>
        <a href="{{ route('workshops.export-pdf') }}" class="btn btn-danger shadow-sm ms-2">
            <i class="fas fa-file-pdf me-1"></i> Cetak PDF
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Poster</th>
                        <th>Tema</th>
                        <th>Pembicara</th>
                        <th>Jadwal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($workshops as $item)
                    <tr>
                        <td class="ps-4 fw-bold">{{ $loop->iteration }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/workshops/' . $item->gambar) }}" 
                                     alt="Poster" 
                                     class="rounded shadow-sm" 
                                     style="width: 80px; height: 80px; object-fit: cover;">
                            @else
                                <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td class="fw-semibold text-primary">{{ $item->tema }}</td>
                        <td>
                            <div class="d-flex flex-column">
                                <span class="fw-bold">{{ $item->pembicara }}</span>
                                <small class="text-muted">{{ $item->penyelenggara }}</small>
                            </div>
                        </td>
                        <td>
                            <small class="d-block text-muted"><i class="fas fa-map-marker-alt me-1"></i> {{ $item->lokasi }}</small>
                            <small class="d-block text-success"><i class="far fa-calendar-alt me-1"></i> {{ date('d M Y', strtotime($item->tanggal)) }}</small>
                        </td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('workshops.destroy', $item->id) }}" method="POST">
                                <a href="{{ route('workshops.edit', $item->id) }}" class="btn btn-sm btn-warning text-white shadow-sm mb-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger shadow-sm mb-1">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="fas fa-inbox fa-3x mb-3"></i>
                            <p>Belum ada data workshop.</p>
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