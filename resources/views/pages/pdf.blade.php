<!DOCTYPE html>
<html>
<head>
    <title>Laporan Workshop IT</title>
    <style>
        body { font-family: sans-serif; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #667eea; padding-bottom: 15px; }
        .header h2 { margin: 0; color: #2d3748; text-transform: uppercase; font-size: 24px; }
        .header p { margin: 5px 0 0; color: #718096; font-size: 14px; }
        
        table { width: 100%; border-collapse: collapse; font-size: 12px; background-color: #fff; }
        th { background-color: #667eea; color: white; padding: 12px; text-align: left; font-weight: bold; }
        td { border-bottom: 1px solid #e2e8f0; padding: 10px; vertical-align: middle; }
        tr:nth-child(even) { background-color: #f7fafc; }
        
        .img-poster { 
            width: 60px; height: 80px; 
            object-fit: cover; 
            border-radius: 4px; 
            border: 1px solid #cbd5e0; 
            display: block;
        }
        .badge { background: #e2e8f0; padding: 4px 8px; border-radius: 4px; font-size: 10px; color: #4a5568; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Data Workshop IT</h2>
        <p>Tanggal Cetak: {{ date('d F Y, H:i') }} WIB</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%" class="text-center">No</th>
                <th style="width: 15%" class="text-center">Poster</th>
                <th style="width: 30%">Detail Workshop</th>
                <th style="width: 25%">Narasumber</th>
                <th style="width: 25%">Waktu & Tempat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workshops as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">
                    @php
                        // TEKNIK BASE64: Mengambil file langsung dari path storage
                        // Pastikan folder storage/app/public/workshops ada isinya
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
                    <strong style="color: #4a5568; font-size: 14px;">{{ $item->tema }}</strong><br>
                    <span style="color: #718096; font-size: 11px;">Oleh: {{ $item->penyelenggara }}</span>
                </td>
                <td>
                    <strong>{{ $item->pembicara }}</strong>
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($item->tanggal)) }}<br>
                    <small style="color: #718096">{{ $item->lokasi }}</small>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>