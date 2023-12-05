@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - Inkindo</title>
@endsection

@section('subcontent')
<!-- resources/views/jurnal-umum/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Jurnal Umum</title>
</head>
<body>
    <h2>Tambah Data Jurnal Umum</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('storeJurnalUmum') }}">
        @csrf
        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" required><br>

        <label for="bukti_transaksi">Bukti Transaksi:</label>
        <input type="text" name="bukti_transaksi" required><br>

        <label for="keterangan">Keterangan:</label>
        <input type="text" name="keterangan" required><br>

        <!-- Select dropdown for jurnal_id -->
        <label for="jurnal_id">Pilih Jurnal:</label>
        <select name="jurnal_id" required>
            <option value="" disabled selected>Pilih Jurnal</option>
            @foreach ($jurnalList as $jurnal)
                <option value="{{ $jurnal->id }}">{{ $jurnal->name }}</option>
            @endforeach
        </select><br>

        <label for="kode_akun">Pilih Kode Akun:</label>
        <select name="kode_akun" required>
            <option value="" disabled selected>Pilih Kode Akun</option>
            @foreach ($kodeAkunList as $kodeAkun)
                <option value="{{ $kodeAkun->kode }}">{{ $kodeAkun->nama }}</option>
            @endforeach
        </select><br>

        <label for="debet">Debet:</label>
        <input type="number" name="debet" step="1000.0"><br>

        <label for="kredit">Kredit:</label>
        <input type="number" name="kredit" step="1000.0"><br>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>

@endsection

@section('script')
<script>
    // Your existing script for image upload or any other custom JavaScript
</script>
@endsection
