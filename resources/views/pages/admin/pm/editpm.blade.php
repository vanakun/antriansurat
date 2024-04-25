@extends('../layout/' . $layout)

@section('subhead')
    <title>Upload Surat - Tinker - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    @include('../layout/components/mobile-menu')

    <!-- Content -->
    <div class="content">
        <h2 class="intro-y text-lg font-medium mt-10">Upload Surat Pengawasan Pemilu</h2>
        
        <!-- Form untuk mengunggah surat -->
        <form action="{{ route('updatesuratpm', ['id' => $suratPengawasanPemilus->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Kolom input dan tombol submit -->

            <!-- Kolom input untuk mengunggah surat -->
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6">
                    <label for="status" class="form-label">Status</label>
                    <input id="status" type="text" name="status" class="form-control" value="{{ $suratPengawasanPemilus->status }}" required>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="surat" class="form-label">Surat</label>
                    <input id="surat" type="text" name="surat" class="form-control" value="{{ $suratPengawasanPemilus->j_surat }}" required>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input id="tanggal" type="date" name="tanggal" class="form-control" value="{{ $suratPengawasanPemilus->tanggal }}" required>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input id="nama" type="text" name="nama" class="form-control" value="{{ $suratPengawasanPemilus->nama }}" required>
                </div>
                <div class="col-span-12">
                    <label for="perihal" class="form-label">Perihal</label>
                    <input id="perihal" type="text" name="perihal" class="form-control" value="{{ $suratPengawasanPemilus->perihal }}" required>
                </div>
                <div class="col-span-12">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input id="tujuan" type="text" name="tujuan" class="form-control" value="{{ $suratPengawasanPemilus->tujuan }}" required>
                </div>
                <div class="col-span-12">
                    <label for="jenis_surat" class="form-label">Jenis Surat</label>
                    <input id="jenis_surat" type="text" name="jenis_surat" class="form-control" value="{{ $suratPengawasanPemilus->jenis_surat }}" required>
                </div>
                <div class="col-span-12">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input id="keterangan" type="text" name="keterangan" class="form-control" value="{{ $suratPengawasanPemilus->keterangan }}" required>
                </div>
                <div class="col-span-12">
                    <label for="kota" class="form-label">Kota</label>
                    <input id="kota" type="text" name="kota" class="form-control" value="{{ $suratPengawasanPemilus->kota }}" required>
                </div>
                <div class="col-span-12">
                    <label for="substantif" class="form-label">Substantif</label>
                    <input id="substantif" type="text" name="substantif" class="form-control" value="{{ $suratPengawasanPemilus->substantif }}" required>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                    <input id="nomor_surat" type="text" name="nomor_surat" class="form-control" value="{{ $suratPengawasanPemilus->no_surat }}" >
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="user" class="form-label">User</label>
                    <input id="user" type="text" name="user" class="form-control" value="{{ $suratPengawasanPemilus->user->name }}" required>
                </div>
                
                <div class="col-span-12 sm:col-span-6">
                    @if ($suratPengawasanPemilus->file_surat)
                        <p><strong>File Surat:</strong> <a href="{{ asset('uploads/'.$suratPengawasanPemilus->file_surat) }}">Unduh Surat</a></p>
                    @else
                        <p><strong>File Surat:</strong> Tidak Ada</p>
                    @endif
                </div>
                
                <div class="col-span-12 sm:col-span-6">
                    <label for="file_surat" class="form-label">File Surat (PDF)</label>
                    <input id="file_surat" type="file" name="file_surat" class="form-control">
                </div>
            </div>
           
            <!-- Tombol untuk mengunggah surat -->
            <div class="text-right mt-5">
                <button type="submit" class="btn btn-primary">Unggah Surat</button>
            </div>
        </form>
    </div>
@endsection
