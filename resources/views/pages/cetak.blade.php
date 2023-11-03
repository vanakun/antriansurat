<!DOCTYPE html>
<html>
<head>
    <title>Cetak PDF - Tahap dan Anggota Terlibat</title>
</head>
<body>
    <h1>Daftar Tahap dan Anggota Terlibat</h1>
    
    <p><strong>Nama Proyek:</strong> {{ $project->nama }}</p>

    <table border="1">
        <thead>
            <tr>
                <th>Tahap</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Anggota Terlibat</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1 @endphp
            @foreach ($step as $step)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $step->nama }}</td>
                    <td>{{ $step->keterangan }}</td>
                    <td>
                        @foreach ($step->experts as $expert)
                            <li>{{ $expert->name }}</li>
                            <!-- Mungkin Anda ingin menampilkan informasi ahli lainnya di sini -->
                        @endforeach
                    </td>
                    <td><div style="text-align: center; font-size: 16px; font-weight: bold; padding: 5px 10px; border-radius: 5px;
                        @if($step->status == 1)
                            background-color: white; color: black;
                        @elseif($step->status == 2)
                            background-color: white; color: black;
                        @elseif($step->status == 3)
                            background-color: white; color: black;
                        @else
                            background-color: gray; color: white;
                        @endif">
                        @if($step->status == 1)
                            Approved
                        @elseif($step->status == 2)
                            Waiting
                        @elseif($step->status == 3)
                            Rejected
                        @else
                            Unknown
                        @endif
                    </div></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
