<!DOCTYPE html>
<html>
<head>
    <title>Laporan Katalog Produk</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h2, .header h4 { margin: 0; padding: 0; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 6px; vertical-align: middle; }
        th { background-color: #f2f2f2; text-align: center; font-weight: bold; }
        
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        
        /* Styling gambar agar rapi di dalam sel tabel */
        .img-product { width: 50px; height: 50px; object-fit: cover; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Katalog Produk</h2>
        <h4>TS Luxury</h4>
    </div>
    <hr>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 15%">ID Produk</th>
                <th style="width: 25%">Nama Produk</th>
                <th style="width: 15%">Kategori</th>
                <th style="width: 15%">Harga</th>
                <th style="width: 10%">Stok</th>
                <th style="width: 15%">Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($katalogs as $index => $item)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $item->id_produk }}</td>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->kategori_produk }}</td>
                <td class="text-right">Rp {{ number_format($item->harga_produk, 0, ',', '.') }}</td>
                <td class="text-center">{{ $item->stok_produk }}</td>
                <td class="text-center">
                    @php
                        
                        $imagePath = public_path('assets/images/' . $item->gambar_produk);
                        $base64Image = null;

                       
                        if (!empty($item->gambar_produk) && file_exists($imagePath)) {
                            try {
                                // Ambil konten file dan encode ke base64
                                $imageData = file_get_contents($imagePath);
                                $type = pathinfo($imagePath, PATHINFO_EXTENSION);
                                $base64Image = 'data:image/' . $type . ';base64,' . base64_encode($imageData);
                            } catch (\Exception $e) {
                                
                                $base64Image = null;
                            }
                        }
                    @endphp

                    @if($base64Image)
                        <img src="{{ $base64Image }}" class="img-product" alt="img">
                    @else
                        <span>-</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>