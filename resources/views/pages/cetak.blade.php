<!DOCTYPE html>
<html>
<head>
    <title>Cetak PDF - Tahap dan Anggota Terlibat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .status {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .approved {
            background-color: white;
            color: black;
        }
        .waiting {
            background-color: white;
            color: black;
        }
        .rejected {
            background-color: white;
            color: black;
        }
        .unknown {
            background-color: gray;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Daftar Tahap dan Anggota Terlibat</h1>
    
    <p><strong>Nama Proyek:</strong> {{ $project->nama }}</p>
    <p><strong>Status:</strong> {{ ucfirst($project->status) }}</p>

    <table>
        <thead>
            <tr>
                <th>Tahap</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Ketua</th>
                <th>Anggota</th>
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
                    <td>{{ $step->user->name }}</td>
                    <td>
                        @foreach ($step->experts as $expert)
                            <li style="margin-left: 10px;">{{ $expert->name ?? "-" }}</li>
                        @endforeach
                    </td>
                    <td>
                        <div class="status 
                            @if($step->status == 1)
                                approved
                            @elseif($step->status == 2)
                                waiting
                            @elseif($step->status == 3)
                                rejected
                            @else
                                unknown
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
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
