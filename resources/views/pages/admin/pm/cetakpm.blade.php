<!-- resources/views/pages/admin/pm/cetakpm.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat Pengawasan Pemilu</title>
    <style>
        h1 {
            text-align: center; /* Center the heading */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>KLASIFIKASI PM</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Perihal</th>
                <th>Tujuan</th>
                <th>Jenis Surat</th>
                <th>Keterangan</th>
                <th>Kota</th>
                <th>Substantif</th>
                <th>No Surat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratPengawasanPemilus as $index => $surat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $surat->status }}</td>
                <td>{{ $surat->tanggal }}</td>
                <td>{{ $surat->nama }}</td>
                <td>{{ $surat->perihal }}</td>
                <td>{{ $surat->tujuan }}</td>
                <td>{{ $surat->jenis_surat }}</td>
                <td>{{ $surat->keterangan }}</td>
                <td>{{ $surat->kota }}</td>
                <td>{{ $surat->substantif }}</td>
                <td>{{ $surat->no_surat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
