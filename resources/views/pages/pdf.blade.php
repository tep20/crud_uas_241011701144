<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Workshop IT</title>
    <style>
        body {
            font-family: sans-serif;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <h2>Laporan Data Workshop IT</h2>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 25%">Tema</th>
                <th style="width: 20%">Pembicara</th>
                <th style="width: 20%">Lokasi</th>
                <th style="width: 15%">Tanggal</th>
                <th style="width: 15%">Penyelenggara</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workshops as $index => $w)
            <tr>
                <td style="text-align: center">{{ $index + 1 }}</td>
                <td>{{ $w->tema }}</td>
                <td>{{ $w->pembicara }}</td>
                <td>{{ $w->lokasi }}</td>
                <td>{{ $w->tanggal }}</td>
                <td>{{ $w->penyelenggara }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ date('d-m-Y H:i') }}
    </div>

</body>
</html>