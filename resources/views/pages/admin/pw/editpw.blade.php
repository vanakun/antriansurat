@extends('../layout/' . $layout)

@section('subhead')
    <title>Upload Surat - Tinker - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    

    <!-- Content -->
    <div class="content">
        <h2 class="intro-y text-lg font-medium mt-10">Approve SURAT PENGAWASAN (PW)</h2>
        
        <!-- Form untuk mengunggah surat -->
        <form action="{{ route('updatesuratpw', ['id' => $suratpw->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Kolom input dan tombol submit -->

            <!-- Kolom input untuk mengunggah surat -->
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6">
                    <label for="status" class="form-label">Status</label>
                    <input id="status" type="text" name="status" class="form-control" value="{{ $suratpw->status }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="surat" class="form-label">Surat</label>
                    <input id="surat" type="text" name="surat" class="form-control" value="{{ $suratpw->j_surat }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input id="tanggal" type="date" name="tanggal" class="form-control" value="{{ $suratpw->tanggal }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input id="nama" type="text" name="nama" class="form-control" value="{{ $suratpw->nama }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="perihal" class="form-label">Perihal</label>
                    <input id="perihal" type="text" name="perihal" class="form-control" value="{{ $suratpw->perihal }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input id="tujuan" type="text" name="tujuan" class="form-control" value="{{ $suratpw->tujuan }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="jenis_surat" class="form-label">Jenis Surat</label>
                    <input id="jenis_surat" type="text" name="jenis_surat" class="form-control" value="{{ $suratpw->jenis_surat }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input id="keterangan" type="text" name="keterangan" class="form-control" value="{{ $suratpw->keterangan }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="kota" class="form-label">Kota</label>
                    <select id="kota" name="kota" class="form-select" required readonly>
                        <option value="">Pilih Kota</option>
                        <option value="AC-01" {{ ($suratpw->kota == 'AC-01') ? 'selected' : '' }}>Kabupaten Aceh Barat</option>
                        <option value="AC-02" {{ ($suratpw->kota == 'AC-02') ? 'selected' : '' }}>Kabupaten Aceh Barat Daya</option>
                        <option value="AC-03" {{ ($suratpw->kota == 'AC-03') ? 'selected' : '' }}>Kabupaten Aceh Besar</option>
                        <option value="AC-04" {{ ($suratpw->kota == 'AC-04') ? 'selected' : '' }}>Kabupaten Aceh Jaya</option>
                        <option value="AC-05" {{ ($suratpw->kota == 'AC-05') ? 'selected' : '' }}>Kabupaten Aceh Selatan</option>
                        <option value="AC-06" {{ ($suratpw->kota == 'AC-06') ? 'selected' : '' }}>Kabupaten Aceh Singkil</option>
                        <option value="AC-07" {{ ($suratpw->kota == 'AC-07') ? 'selected' : '' }}>Kabupaten Aceh Tamiang</option>
                        <option value="AC-08" {{ ($suratpw->kota == 'AC-08') ? 'selected' : '' }}>Kabupaten Aceh Tengah</option>
                        <option value="AC-09" {{ ($suratpw->kota == 'AC-09') ? 'selected' : '' }}>Kabupaten Aceh Tenggara</option>
                        <option value="AC-10" {{ ($suratpw->kota == 'AC-10') ? 'selected' : '' }}>Kabupaten Aceh Timur</option>
                        <option value="AC-11" {{ ($suratpw->kota == 'AC-11') ? 'selected' : '' }}>Kabupaten Aceh Utara</option>
                        <option value="AC-12" {{ ($suratpw->kota == 'AC-12') ? 'selected' : '' }}>Kabupaten Bener Meriah</option>
                        <option value="AC-13" {{ ($suratpw->kota == 'AC-13') ? 'selected' : '' }}>Kabupaten Bireun</option>
                        <option value="AC-14" {{ ($suratpw->kota == 'AC-14') ? 'selected' : '' }}>Kabupaten Gayo Lues</option>
                        <option value="AC-15" {{ ($suratpw->kota == 'AC-15') ? 'selected' : '' }}>Kabupaten Nagan Raya</option>
                        <option value="AC-16" {{ ($suratpw->kota == 'AC-16') ? 'selected' : '' }}>Kabupaten Pidie</option>
                        <option value="AC-17" {{ ($suratpw->kota == 'AC-17') ? 'selected' : '' }}>Kabupaten Pidie Jaya</option>
                        <option value="AC-18" {{ ($suratpw->kota == 'AC-18') ? 'selected' : '' }}>Kabupaten Simeulue</option>
                        <option value="AC-19" {{ ($suratpw->kota == 'AC-19') ? 'selected' : '' }}>Kota Banda Aceh</option>
                        <option value="AC-20" {{ ($suratpw->kota == 'AC-20') ? 'selected' : '' }}>Kota Subulussalam</option>
                        <option value="AC-21" {{ ($suratpw->kota == 'AC-21') ? 'selected' : '' }}>Kota Langsa</option>
                        <option value="AC-22" {{ ($suratpw->kota == 'AC-22') ? 'selected' : '' }}>Kota Lhokseumawe</option>
                        <option value="AC-23" {{ ($suratpw->kota == 'AC-23') ? 'selected' : '' }}>Kota Sabang</option>
                    </select>
                </div>


                <div class="col-span-12">
                    <label for="fasilitatif" class="form-label">Fasilitatif</label>
                    <select id="fasilitatif" name="fasilitatif" class="form-select" required readonly>
                        <option value="">Pilih Fasilitatif</option>
                        <option value="PW.00.00" {{ ($suratpw->fasilitatif == 'PW.00.00') ? 'selected' : '' }}>DIPA/ POK</option>
                        <option value="PW.00.01" {{ ($suratpw->fasilitatif == 'PW.00.01') ? 'selected' : '' }}>Rencana Anggaran Belanja (RAB)</option>
                        <option value="PW.00.02" {{ ($suratpw->fasilitatif == 'PW.00.02') ? 'selected' : '' }}>Penggajian</option>
                        <option value="PW.00.03" {{ ($suratpw->fasilitatif == 'PW.00.03') ? 'selected' : '' }}>Pengeluaran Anggaran</option>
                        <option value="PW.01.00" {{ ($suratpw->fasilitatif == 'PW.01.00') ? 'selected' : '' }}>Perbendaharaan</option>
                        <option value="PW.01.01" {{ ($suratpw->fasilitatif == 'PW.01.01') ? 'selected' : '' }}>PW4 (Kartu Pengawasan Pembayaran Penghasilan Pegawai)</option>
                        <option value="PW.01.02" {{ ($suratpw->fasilitatif == 'PW.01.02') ? 'selected' : '' }}>Kartu Pengawasan Kredit</option>
                        <option value="PW.01.03" {{ ($suratpw->fasilitatif == 'PW.01.03') ? 'selected' : '' }}>Pajak</option>
                        <option value="PW.01.04" {{ ($suratpw->fasilitatif == 'PW.01.04') ? 'selected' : '' }}>Penerimaan Non Pajak</option>
                        <option value="PW.01.05" {{ ($suratpw->fasilitatif == 'PW.01.05') ? 'selected' : '' }}>Pengembalian Belanja</option>
                        <option value="PW.01.06" {{ ($suratpw->fasilitatif == 'PW.01.06') ? 'selected' : '' }}>Berita Acara Pemeriksaan Kas</option>
                        <option value="PW.01.07" {{ ($suratpw->fasilitatif == 'PW.01.07') ? 'selected' : '' }}>Tuntutan Ganti Rugi</option>
                        <option value="PW.01.08" {{ ($suratpw->fasilitatif == 'PW.01.08') ? 'selected' : '' }}>Pinjaman/Bantuan Luar Negeri</option>
                        <option value="PW.01.09" {{ ($suratpw->fasilitatif == 'PW.01.09') ? 'selected' : '' }}>Verifikasi Anggaran</option>
                        <option value="PW.01.10" {{ ($suratpw->fasilitatif == 'PW.01.10') ? 'selected' : '' }}>PembuPWan Anggaran</option>
                        <option value="PW.02" {{ ($suratpw->fasilitatif == 'PW.02') ? 'selected' : '' }}>Perhitungan Anggaran</option>
                        <option value="PW.03.00" {{ ($suratpw->fasilitatif == 'PW.03.00') ? 'selected' : '' }}>Keterangan Penghasilan</option>
                        <option value="PW.03.01" {{ ($suratpw->fasilitatif == 'PW.03.01') ? 'selected' : '' }}>SPWP (Surat Keterangan Pemberhentian Pembayaran)</option>
                        <option value="PW.03.02" {{ ($suratpw->fasilitatif == 'PW.03.02') ? 'selected' : '' }}>Permohonan Pinjaman</option>
                        <option value="PW.03.03" {{ ($suratpw->fasilitatif == 'PW.03.03') ? 'selected' : '' }}>Iuran Keanggotaan Organisasi</option>
                    </select>
                </div>










                <div class="col-span-12 sm:col-span-6">
                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                    <input id="nomor_surat" type="text" name="nomor_surat" class="form-control" value="{{ $suratpw->no_surat }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="user" class="form-label">User</label>
                    <input id="user" type="text" name="user" class="form-control" value="{{ $suratpw->user->name }}" required readonly>
                </div>
                
                <div class="col-span-12 sm:col-span-6">
                    @if ($suratpw->file_surat)
                        <p><strong>File Surat:</strong> <a href="{{ asset('uploads/'.$suratpw->file_surat) }}">Unduh Surat</a></p>
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
            <div class="grid grid-cols-12 gap-6 mt-5">
                <!-- Input tersembunyi untuk status -->
                <input type="hidden" name="status" value="{{ $suratpw->status }}">
                
                <!-- Tambahkan kondisi untuk mengubah nama tombol -->
                @php
                    if ($suratpw->status == 'waiting') {
                        $buttonText = 'Upload surat';
                    } elseif ($suratpw->status == 'queue') {
                        $buttonText = 'Approve Pengajuan Surat';
                    } else {
                        // Default button text if none of the conditions match
                        $buttonText = 'upload surat';
                    }
                @endphp
                <!-- Tombol untuk mengunggah surat -->
                <div class="text-right mt-5 col-span-12">
                    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
                    <button id="tolakSuratButton" type="button" class="btn btn-danger">Tolak Surat</button>

                </div>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <!-- Input tersembunyi untuk status -->
                <input type="hidden" name="status" value="{{ $suratpw->status }}">
                
                <!-- Tambahkan kondisi untuk mengubah nama tombol -->
                @php
                    $buttonText = ($suratpw->status == 'queue') ? 'Update Surat' : 'Approve Pengajuan Surat';
                @endphp
    
                <!-- Tombol untuk mengunggah surat -->
                
                
            </div>
            
        </form>
       
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var tolakSuratButton = document.querySelector('#tolakSuratButton');

        tolakSuratButton.addEventListener('click', function (event) {
            // Kirim permintaan HTTP menggunakan fetch API
            fetch('{{ route("tolakSurat", ["id" => $suratpw->id]) }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    status: 'reject'
                })
            })
            .then(response => {
                // Handle respon dari backend
                if (response.ok) {
                    // Jika berhasil, refresh halaman atau lakukan tindakan lain
                    location.reload();
                } else {
                    // Jika gagal, tampilkan pesan error
                    alert('Gagal menolak surat. Mohon coba lagi.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan. Mohon coba lagi.');
            });
        });
    });
</script>

@endsection
