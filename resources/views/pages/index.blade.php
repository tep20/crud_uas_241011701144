@extends('layouts.layout')
@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Daftar Workshop IT</h3>
        <div>
            <a href="{{ route('workshops.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
            <a href="{{ route('workshops.export-pdf') }}" class="btn btn-danger"><i class="fas fa-file-pdf"></i> PDF</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>Gambar</th><th>Tema</th><th>Pembicara</th><th>Lokasi & Tgl</th><th>Penyelenggara</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workshops as $w)
            <tr>
                <td class="text-center"><img src="{{ asset('storage/workshops/'.$w->gambar) }}" width="80" class="rounded"></td>
                <td>{{ $w->tema }}</td>
                <td>{{ $w->pembicara }}</td>
                <td>{{ $w->lokasi }} <br> <small class="text-muted">{{ $w->tanggal }}</small></td>
                <td>{{ $w->penyelenggara }}</td>
                <td class="text-center">
                    <form onsubmit="return confirm('Hapus?')" action="{{ route('workshops.destroy', $w->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <a href="{{ route('workshops.edit', $w->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $workshops->links() }}
</div>
@endsection