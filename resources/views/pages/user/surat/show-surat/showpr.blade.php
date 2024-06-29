@extends('../layout/main')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    @include('../layout/components/mobile-menu')
    <div class="flex overflow-hidden">
        <!-- BEGIN: Content -->
        <div class="content">
        @include('../layout/components/top-bar-tenagaahli')
        <h2 class="intro-y text-lg font-medium mt-10">PERENCANAAN (PR)</h2>
        
        <!-- Form untuk mengunggah surat -->
        <form action="{{ route('updatepmdone', ['id' => $surat->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Kolom input dan tombol submit -->

            <!-- Kolom input untuk mengunggah surat -->
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6">
                    <label for="status" class="form-label">Status</label>
                    <input id="status" type="text" name="status" class="form-control" value="{{ $surat->status }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="surat" class="form-label">Surat</label>
                    <input id="surat" type="text" name="surat" class="form-control" value="{{ $surat->j_surat }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input id="tanggal" type="date" name="tanggal" class="form-control" value="{{ $surat->tanggal }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input id="nama" type="text" name="nama" class="form-control" value="{{ $surat->nama }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="perihal" class="form-label">Perihal</label>
                    <input id="perihal" type="text" name="perihal" class="form-control" value="{{ $surat->perihal }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input id="tujuan" type="text" name="tujuan" class="form-control" value="{{ $surat->tujuan }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="jenis_surat" class="form-label">Jenis Surat</label>
                    <input id="jenis_surat" type="text" name="jenis_surat" class="form-control" value="{{ $surat->jenis_surat }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input id="keterangan" type="text" name="keterangan" class="form-control" value="{{ $surat->keterangan }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="kota" class="form-label">Kota</label>
                    <select id="kota" name="kota" class="form-select" required readonly>
                        <option value="">Pilih Kota</option>
                        <option value="AC-01" {{ ($surat->kota == 'AC-01') ? 'selected' : '' }}>Kabupaten Aceh Barat</option>
                        <option value="AC-02" {{ ($surat->kota == 'AC-02') ? 'selected' : '' }}>Kabupaten Aceh Barat Daya</option>
                        <option value="AC-03" {{ ($surat->kota == 'AC-03') ? 'selected' : '' }}>Kabupaten Aceh Besar</option>
                        <option value="AC-04" {{ ($surat->kota == 'AC-04') ? 'selected' : '' }}>Kabupaten Aceh Jaya</option>
                        <option value="AC-05" {{ ($surat->kota == 'AC-05') ? 'selected' : '' }}>Kabupaten Aceh Selatan</option>
                        <option value="AC-06" {{ ($surat->kota == 'AC-06') ? 'selected' : '' }}>Kabupaten Aceh Singkil</option>
                        <option value="AC-07" {{ ($surat->kota == 'AC-07') ? 'selected' : '' }}>Kabupaten Aceh Tamiang</option>
                        <option value="AC-08" {{ ($surat->kota == 'AC-08') ? 'selected' : '' }}>Kabupaten Aceh Tengah</option>
                        <option value="AC-09" {{ ($surat->kota == 'AC-09') ? 'selected' : '' }}>Kabupaten Aceh Tenggara</option>
                        <option value="AC-10" {{ ($surat->kota == 'AC-10') ? 'selected' : '' }}>Kabupaten Aceh Timur</option>
                        <option value="AC-11" {{ ($surat->kota == 'AC-11') ? 'selected' : '' }}>Kabupaten Aceh Utara</option>
                        <option value="AC-12" {{ ($surat->kota == 'AC-12') ? 'selected' : '' }}>Kabupaten Bener Meriah</option>
                        <option value="AC-13" {{ ($surat->kota == 'AC-13') ? 'selected' : '' }}>Kabupaten Bireun</option>
                        <option value="AC-14" {{ ($surat->kota == 'AC-14') ? 'selected' : '' }}>Kabupaten Gayo Lues</option>
                        <option value="AC-15" {{ ($surat->kota == 'AC-15') ? 'selected' : '' }}>Kabupaten Nagan Raya</option>
                        <option value="AC-16" {{ ($surat->kota == 'AC-16') ? 'selected' : '' }}>Kabupaten Pidie</option>
                        <option value="AC-17" {{ ($surat->kota == 'AC-17') ? 'selected' : '' }}>Kabupaten Pidie Jaya</option>
                        <option value="AC-18" {{ ($surat->kota == 'AC-18') ? 'selected' : '' }}>Kabupaten Simeulue</option>
                        <option value="AC-19" {{ ($surat->kota == 'AC-19') ? 'selected' : '' }}>Kota Banda Aceh</option>
                        <option value="AC-20" {{ ($surat->kota == 'AC-20') ? 'selected' : '' }}>Kota Subulussalam</option>
                        <option value="AC-21" {{ ($surat->kota == 'AC-21') ? 'selected' : '' }}>Kota Langsa</option>
                        <option value="AC-22" {{ ($surat->kota == 'AC-22') ? 'selected' : '' }}>Kota Lhokseumawe</option>
                        <option value="AC-23" {{ ($surat->kota == 'AC-23') ? 'selected' : '' }}>Kota Sabang</option>
                    </select>
                </div>


                <div class="col-span-12">
                    <label for="fasilitatif" class="form-label">Fasilitatif</label>
                    <select id="fasilitatif" name="fasilitatif" class="form-select" required readonly>
                        <option value="">Pilih Fasilitatif</option>
                        <option value="PR.00.00" {{ ($surat->fasilitatif == 'PR.00.00') ? 'selected' : '' }}>Rencana Pembangunan Jangka Panjang (RPJP)</option>
                        <option value="PR.00.01" {{ ($surat->fasilitatif == 'PR.00.01') ? 'selected' : '' }}>Rencana Pembangunan Jangka Menengah (RPJM)</option>
                        <option value="PR.00.02" {{ ($surat->fasilitatif == 'PR.00.02') ? 'selected' : '' }}>Rencana Strategis (Renstra)</option>
                        <option value="PR.01.00" {{ ($surat->fasilitatif == 'PR.01.00') ? 'selected' : '' }}>Usulan Rencana Kegiatan</option>
                        <option value="PR.01.01" {{ ($surat->fasilitatif == 'PR.01.01') ? 'selected' : '' }}>Rencana Kerja Tahunan</option>
                        <option value="PR.01.02" {{ ($surat->fasilitatif == 'PR.01.02') ? 'selected' : '' }}>Rencana Kerja Tahunan Badan Pengawas Pemilihan Umum</option>
                        <option value="PR.02" {{ ($surat->fasilitatif == 'PR.02') ? 'selected' : '' }}>Penetapan Kinerja</option>
                        <option value="PR.03.00" {{ ($surat->fasilitatif == 'PR.03.00') ? 'selected' : '' }}>Penyusunan Rencana Anggaran</option>
                        <option value="PR.03.01" {{ ($surat->fasilitatif == 'PR.03.01') ? 'selected' : '' }}>Revisi Dokumen Anggaran</option>
                        <option value="PR.04.00" {{ ($surat->fasilitatif == 'PR.04.00') ? 'selected' : '' }}>Laporan Berkala</option>
                        <option value="PR.04.01" {{ ($surat->fasilitatif == 'PR.04.01') ? 'selected' : '' }}>Laporan Khusus</option>
                        <option value="PR.04.02" {{ ($surat->fasilitatif == 'PR.04.02') ? 'selected' : '' }}>Laporan Perkembangan/Progress Report</option>
                        <option value="PR.04.03" {{ ($surat->fasilitatif == 'PR.04.03') ? 'selected' : '' }}>Laporan Akuntabilitas Kinerja Instansi Pemerintah (LAKIP)</option>
                        <option value="PR.04.04" {{ ($surat->fasilitatif == 'PR.04.04') ? 'selected' : '' }}>Evaluasi Program</option>
                    </select>
                </div>

                <div class="col-span-12 sm:col-span-6">
                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                    <input id="nomor_surat" type="text" name="nomor_surat" class="form-control" value="{{ $surat->no_surat }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="user" class="form-label">User</label>
                    <input id="user" type="text" name="user" class="form-control" value="{{ $surat->user->name }}" required readonly>
                </div>
                
                <div class="col-span-12 sm:col-span-6">
                    @if ($surat->file_surat)
                        <p><strong>File Surat:</strong> <a href="{{ asset('uploads/'.$surat->file_surat) }}">Unduh Surat</a></p>
                    @else
                        <p><strong>File Surat:</strong> Tidak Ada</p>
                    @endif
                </div>
                
            </div>
           
           
        </form>
    </div>
@endsection
