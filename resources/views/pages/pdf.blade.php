<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Workshop</title>
    <style>
        body { font-family: sans-serif; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #444; padding-bottom: 10px; }
        .header h2 { margin: 0; color: #2d3748; }
        .header p { margin: 5px 0 0; color: #718096; font-size: 14px; }
        
        table { width: 100%; border-collapse: collapse; font-size: 12px; }
        th { background-color: #667eea; color: white; padding: 10px; text-align: left; }
        td { border-bottom: 1px solid #ddd; padding: 10px; vertical-align: middle; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        
        .img-poster { width: 60px; height: 80px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd; }
        .badge { background: #eee; padding: 2px 5px; border-radius: 3px; font-size: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Jadwal Workshop IT</h2>
        <p>Generated on: {{ date('d F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 15%">Poster</th>
                <th style="width: 30%">Tema</th>
                <th style="width: 20%">Pembicara</th>
                <th style="width: 15%">Tanggal</th>
                <th style="width: 15%">Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workshops as $item)
            <tr>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td style="text-align: center">
                    @php
                        // Menggunakan path absolut storage
                        $path = storage_path('app/public/workshops/' . $item->gambar);
                        $base64 = '';
                        
                        if (file_exists($path)) {
                            $type = pathinfo($path, PATHINFO_EXTENSION);
                            $data = file_get_contents($path);
                            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        }
                    @endphp

                    @if($base64)
                        <img src="{{ $base64 }}" class="img-poster">
                    @else
                        <span class="badge">No Image</span>
                    @endif
                </td>
                <td>
                    <strong>{{ $item->tema }}</strong><br>
                    <small style="color: #666">by {{ $item->penyelenggara }}</small>
                </td>
                <td>{{ $item->pembicara }}</td>
                <td>{{ date('d/m/Y', strtotime($item->tanggal)) }}</td>
                <td>{{ $item->lokasi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>