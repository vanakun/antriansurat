@extends('../layout/' . $layout)

@section('subhead')
    <title>Upload Surat - Tinker - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    

    <!-- Content -->
    <div class="content">
        <h2 class="intro-y text-lg font-medium mt-10">Surat Pengawasan Pemilu</h2>
        
        <!-- Form untuk mengunggah surat -->
        <form action="{{ route('updatepmdone', ['id' => $suratPengawasanPemilus->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Kolom input dan tombol submit -->

            <!-- Kolom input untuk mengunggah surat -->
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6">
                    <label for="status" class="form-label">Status</label>
                    <input id="status" type="text" name="status" class="form-control" value="{{ $suratPengawasanPemilus->status }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="surat" class="form-label">Surat</label>
                    <input id="surat" type="text" name="surat" class="form-control" value="{{ $suratPengawasanPemilus->j_surat }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input id="tanggal" type="date" name="tanggal" class="form-control" value="{{ $suratPengawasanPemilus->tanggal }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input id="nama" type="text" name="nama" class="form-control" value="{{ $suratPengawasanPemilus->nama }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="perihal" class="form-label">Perihal</label>
                    <input id="perihal" type="text" name="perihal" class="form-control" value="{{ $suratPengawasanPemilus->perihal }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input id="tujuan" type="text" name="tujuan" class="form-control" value="{{ $suratPengawasanPemilus->tujuan }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="jenis_surat" class="form-label">Jenis Surat</label>
                    <input id="jenis_surat" type="text" name="jenis_surat" class="form-control" value="{{ $suratPengawasanPemilus->jenis_surat }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input id="keterangan" type="text" name="keterangan" class="form-control" value="{{ $suratPengawasanPemilus->keterangan }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="kota" class="form-label">Kota</label>
                    <select id="kota" name="kota" class="form-select" required readonly>
                        <option value="">Pilih Kota</option>
                        <option value="AC-01" {{ ($suratPengawasanPemilus->kota == 'AC-01') ? 'selected' : '' }}>Kabupaten Aceh Barat</option>
                        <option value="AC-02" {{ ($suratPengawasanPemilus->kota == 'AC-02') ? 'selected' : '' }}>Kabupaten Aceh Barat Daya</option>
                        <option value="AC-03" {{ ($suratPengawasanPemilus->kota == 'AC-03') ? 'selected' : '' }}>Kabupaten Aceh Besar</option>
                        <option value="AC-04" {{ ($suratPengawasanPemilus->kota == 'AC-04') ? 'selected' : '' }}>Kabupaten Aceh Jaya</option>
                        <option value="AC-05" {{ ($suratPengawasanPemilus->kota == 'AC-05') ? 'selected' : '' }}>Kabupaten Aceh Selatan</option>
                        <option value="AC-06" {{ ($suratPengawasanPemilus->kota == 'AC-06') ? 'selected' : '' }}>Kabupaten Aceh Singkil</option>
                        <option value="AC-07" {{ ($suratPengawasanPemilus->kota == 'AC-07') ? 'selected' : '' }}>Kabupaten Aceh Tamiang</option>
                        <option value="AC-08" {{ ($suratPengawasanPemilus->kota == 'AC-08') ? 'selected' : '' }}>Kabupaten Aceh Tengah</option>
                        <option value="AC-09" {{ ($suratPengawasanPemilus->kota == 'AC-09') ? 'selected' : '' }}>Kabupaten Aceh Tenggara</option>
                        <option value="AC-10" {{ ($suratPengawasanPemilus->kota == 'AC-10') ? 'selected' : '' }}>Kabupaten Aceh Timur</option>
                        <option value="AC-11" {{ ($suratPengawasanPemilus->kota == 'AC-11') ? 'selected' : '' }}>Kabupaten Aceh Utara</option>
                        <option value="AC-12" {{ ($suratPengawasanPemilus->kota == 'AC-12') ? 'selected' : '' }}>Kabupaten Bener Meriah</option>
                        <option value="AC-13" {{ ($suratPengawasanPemilus->kota == 'AC-13') ? 'selected' : '' }}>Kabupaten Bireun</option>
                        <option value="AC-14" {{ ($suratPengawasanPemilus->kota == 'AC-14') ? 'selected' : '' }}>Kabupaten Gayo Lues</option>
                        <option value="AC-15" {{ ($suratPengawasanPemilus->kota == 'AC-15') ? 'selected' : '' }}>Kabupaten Nagan Raya</option>
                        <option value="AC-16" {{ ($suratPengawasanPemilus->kota == 'AC-16') ? 'selected' : '' }}>Kabupaten Pidie</option>
                        <option value="AC-17" {{ ($suratPengawasanPemilus->kota == 'AC-17') ? 'selected' : '' }}>Kabupaten Pidie Jaya</option>
                        <option value="AC-18" {{ ($suratPengawasanPemilus->kota == 'AC-18') ? 'selected' : '' }}>Kabupaten Simeulue</option>
                        <option value="AC-19" {{ ($suratPengawasanPemilus->kota == 'AC-19') ? 'selected' : '' }}>Kota Banda Aceh</option>
                        <option value="AC-20" {{ ($suratPengawasanPemilus->kota == 'AC-20') ? 'selected' : '' }}>Kota Subulussalam</option>
                        <option value="AC-21" {{ ($suratPengawasanPemilus->kota == 'AC-21') ? 'selected' : '' }}>Kota Langsa</option>
                        <option value="AC-22" {{ ($suratPengawasanPemilus->kota == 'AC-22') ? 'selected' : '' }}>Kota Lhokseumawe</option>
                        <option value="AC-23" {{ ($suratPengawasanPemilus->kota == 'AC-23') ? 'selected' : '' }}>Kota Sabang</option>
                    </select>
                </div>


                <div class="col-span-12">
                    <label for="substantif" class="form-label">Substantif</label>
                    <select id="substantif" name="substantif" class="form-select" required readonly>
                        <option value="">Pilih Substantif</option>
                        <option value="PM.00.00" {{ ($suratPengawasanPemilus->substantif == 'PM.00.00') ? 'selected' : '' }}>Teknis Pengawasan Pemilu Tingkat Pusat</option>
                        <option value="PM.00.01" {{ ($suratPengawasanPemilus->substantif == 'PM.00.01') ? 'selected' : '' }}>Teknis Pengawasan Pemilu Tingkat Provinsi</option>
                        <option value="PM.00.02" {{ ($suratPengawasanPemilus->substantif == 'PM.00.02') ? 'selected' : '' }}>Teknis Pengawasan Pemilu Tingkat Kabupaten/Kota</option>
                        <option value="PM.01.00" {{ ($suratPengawasanPemilus->substantif == 'PM.01.00') ? 'selected' : '' }}>Hasil Pengawasan Pemilu Tingkat Pusat</option>
                        <option value="PM.01.01" {{ ($suratPengawasanPemilus->substantif == 'PM.01.01') ? 'selected' : '' }}>Hasil Pengawasan Pemilu Tingkat Provinsi</option>
                        <option value="PM.01.02" {{ ($suratPengawasanPemilus->substantif == 'PM.01.02') ? 'selected' : '' }}>Hasil Pengawasan Pemilu Tingkat Kabupaten/Kota</option>
                        <option value="PM.02.00" {{ ($suratPengawasanPemilus->substantif == 'PM.02.00') ? 'selected' : '' }}>Rekomendasi Hasil Pengawasan Pemilu Tingkat Pusat</option>
                        <option value="PM.02.01" {{ ($suratPengawasanPemilus->substantif == 'PM.02.01') ? 'selected' : '' }}>Rekomendasi Hasil Pengawasan Pemilu Tingkat Provinsi</option>
                        <option value="PM.02.02" {{ ($suratPengawasanPemilus->substantif == 'PM.02.02') ? 'selected' : '' }}>Rekomendasi Hasil Pengawasan Pemilu Tingkat Kabupaten/Kota</option>
                        <option value="PM.03.00" {{ ($suratPengawasanPemilus->substantif == 'PM.03.00') ? 'selected' : '' }}>Sosialisasi Pengawasan Pemilu Tingkat Pusat</option>
                        <option value="PM.03.01" {{ ($suratPengawasanPemilus->substantif == 'PM.03.01') ? 'selected' : '' }}>Sosialisasi Pengawasan Pemilu Tingkat Provinsi</option>
                        <option value="PM.03.02" {{ ($suratPengawasanPemilus->substantif == 'PM.03.02') ? 'selected' : '' }}>Sosialisasi Pengawasan Pemilu Tingkat Kabupaten/Kota</option>
                        <option value="PM.04" {{ ($suratPengawasanPemilus->substantif == 'PM.04') ? 'selected' : '' }}>Kerjasama Pengawasan Pemilu</option>
                        <option value="PM.05" {{ ($suratPengawasanPemilus->substantif == 'PM.05') ? 'selected' : '' }}>Partisipasi Masyarakat</option>
                        <option value="PM.06" {{ ($suratPengawasanPemilus->substantif == 'PM.06') ? 'selected' : '' }}>Analisis Teknis Pengawasan Pemilu dan Potensi Pelanggaran</option>
                    </select>
                </div>

                <div class="col-span-12 sm:col-span-6">
                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                    <input id="nomor_surat" type="text" name="nomor_surat" class="form-control" value="{{ $suratPengawasanPemilus->no_surat }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="user" class="form-label">User</label>
                    <input id="user" type="text" name="user" class="form-control" value="{{ $suratPengawasanPemilus->user->name }}" required readonly>
                </div>
                
                <div class="col-span-12 sm:col-span-6">
                    @if ($suratPengawasanPemilus->file_surat)
                        <p><strong>File Surat:</strong> <a href="{{ asset('uploads/'.$suratPengawasanPemilus->file_surat) }}">Unduh Surat</a></p>
                    @else
                        <p><strong>File Surat:</strong> Tidak Ada</p>
                    @endif
                </div>
                
            </div>
           
           
        </form>
    </div>
@endsection
