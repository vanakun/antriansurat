@extends('../layout/' . $layout)

@section('subhead')
    <title>Upload Surat - Tinker - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    

    <!-- Content -->
    <div class="content">
        <h2 class="intro-y text-lg font-medium mt-10">Upload SURAT TEKNOLOGI INFORMASI (TI)</h2>
        
        <!-- Form untuk mengunggah surat -->
        <form action="{{ route('updatetidone', ['id' => $suratti->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Kolom input dan tombol submit -->

            <!-- Kolom input untuk mengunggah surat -->
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6">
                    <label for="status" class="form-label">Status</label>
                    <input id="status" type="text" name="status" class="form-control" value="{{ $suratti->status }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="surat" class="form-label">Surat</label>
                    <input id="surat" type="text" name="surat" class="form-control" value="{{ $suratti->j_surat }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input id="tanggal" type="date" name="tanggal" class="form-control" value="{{ $suratti->tanggal }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input id="nama" type="text" name="nama" class="form-control" value="{{ $suratti->nama }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="perihal" class="form-label">Perihal</label>
                    <input id="perihal" type="text" name="perihal" class="form-control" value="{{ $suratti->perihal }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input id="tujuan" type="text" name="tujuan" class="form-control" value="{{ $suratti->tujuan }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="jenis_surat" class="form-label">Jenis Surat</label>
                    <input id="jenis_surat" type="text" name="jenis_surat" class="form-control" value="{{ $suratti->jenis_surat }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input id="keterangan" type="text" name="keterangan" class="form-control" value="{{ $suratti->keterangan }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="kota" class="form-label">Kota</label>
                    <select id="kota" name="kota" class="form-select" required readonly>
                        <option value="">Pilih Kota</option>
                        <option value="AC-01" {{ ($suratti->kota == 'AC-01') ? 'selected' : '' }}>Kabupaten Aceh Barat</option>
                        <option value="AC-02" {{ ($suratti->kota == 'AC-02') ? 'selected' : '' }}>Kabupaten Aceh Barat Daya</option>
                        <option value="AC-03" {{ ($suratti->kota == 'AC-03') ? 'selected' : '' }}>Kabupaten Aceh Besar</option>
                        <option value="AC-04" {{ ($suratti->kota == 'AC-04') ? 'selected' : '' }}>Kabupaten Aceh Jaya</option>
                        <option value="AC-05" {{ ($suratti->kota == 'AC-05') ? 'selected' : '' }}>Kabupaten Aceh Selatan</option>
                        <option value="AC-06" {{ ($suratti->kota == 'AC-06') ? 'selected' : '' }}>Kabupaten Aceh Singkil</option>
                        <option value="AC-07" {{ ($suratti->kota == 'AC-07') ? 'selected' : '' }}>Kabupaten Aceh Tamiang</option>
                        <option value="AC-08" {{ ($suratti->kota == 'AC-08') ? 'selected' : '' }}>Kabupaten Aceh Tengah</option>
                        <option value="AC-09" {{ ($suratti->kota == 'AC-09') ? 'selected' : '' }}>Kabupaten Aceh Tenggara</option>
                        <option value="AC-10" {{ ($suratti->kota == 'AC-10') ? 'selected' : '' }}>Kabupaten Aceh Timur</option>
                        <option value="AC-11" {{ ($suratti->kota == 'AC-11') ? 'selected' : '' }}>Kabupaten Aceh Utara</option>
                        <option value="AC-12" {{ ($suratti->kota == 'AC-12') ? 'selected' : '' }}>Kabupaten Bener Meriah</option>
                        <option value="AC-13" {{ ($suratti->kota == 'AC-13') ? 'selected' : '' }}>Kabupaten Bireun</option>
                        <option value="AC-14" {{ ($suratti->kota == 'AC-14') ? 'selected' : '' }}>Kabupaten Gayo Lues</option>
                        <option value="AC-15" {{ ($suratti->kota == 'AC-15') ? 'selected' : '' }}>Kabupaten Nagan Raya</option>
                        <option value="AC-16" {{ ($suratti->kota == 'AC-16') ? 'selected' : '' }}>Kabupaten Pidie</option>
                        <option value="AC-17" {{ ($suratti->kota == 'AC-17') ? 'selected' : '' }}>Kabupaten Pidie Jaya</option>
                        <option value="AC-18" {{ ($suratti->kota == 'AC-18') ? 'selected' : '' }}>Kabupaten Simeulue</option>
                        <option value="AC-19" {{ ($suratti->kota == 'AC-19') ? 'selected' : '' }}>Kota Banda Aceh</option>
                        <option value="AC-20" {{ ($suratti->kota == 'AC-20') ? 'selected' : '' }}>Kota Subulussalam</option>
                        <option value="AC-21" {{ ($suratti->kota == 'AC-21') ? 'selected' : '' }}>Kota Langsa</option>
                        <option value="AC-22" {{ ($suratti->kota == 'AC-22') ? 'selected' : '' }}>Kota Lhokseumawe</option>
                        <option value="AC-23" {{ ($suratti->kota == 'AC-23') ? 'selected' : '' }}>Kota Sabang</option>
                    </select>
                </div>


                <div class="col-span-12">
                    <label for="fasilitatif" class="form-label">Fasilitatif</label>
                    <select id="fasilitatif" name="fasilitatif" class="form-select" required readonly>
                        <option value="">Pilih Fasilitatif</option>
                        <option value="TI.00.00" {{ ($suratti->fasilitatif == 'TI.00.00') ? 'selected' : '' }}>DIPA/ POK</option>
                        <option value="TI.00.01" {{ ($suratti->fasilitatif == 'TI.00.01') ? 'selected' : '' }}>Rencana Anggaran Belanja (RAB)</option>
                        <option value="TI.00.02" {{ ($suratti->fasilitatif == 'TI.00.02') ? 'selected' : '' }}>Penggajian</option>
                        <option value="TI.00.03" {{ ($suratti->fasilitatif == 'TI.00.03') ? 'selected' : '' }}>Pengeluaran Anggaran</option>
                        <option value="TI.01.00" {{ ($suratti->fasilitatif == 'TI.01.00') ? 'selected' : '' }}>Perbendaharaan</option>
                        <option value="TI.01.01" {{ ($suratti->fasilitatif == 'TI.01.01') ? 'selected' : '' }}>TI4 (Kartu Pengawasan Pembayaran Penghasilan Pegawai)</option>
                        <option value="TI.01.02" {{ ($suratti->fasilitatif == 'TI.01.02') ? 'selected' : '' }}>Kartu Pengawasan Kredit</option>
                        <option value="TI.01.03" {{ ($suratti->fasilitatif == 'TI.01.03') ? 'selected' : '' }}>Pajak</option>
                        <option value="TI.01.04" {{ ($suratti->fasilitatif == 'TI.01.04') ? 'selected' : '' }}>Penerimaan Non Pajak</option>
                        <option value="TI.01.05" {{ ($suratti->fasilitatif == 'TI.01.05') ? 'selected' : '' }}>Pengembalian Belanja</option>
                        <option value="TI.01.06" {{ ($suratti->fasilitatif == 'TI.01.06') ? 'selected' : '' }}>Berita Acara Pemeriksaan Kas</option>
                        <option value="TI.01.07" {{ ($suratti->fasilitatif == 'TI.01.07') ? 'selected' : '' }}>Tuntutan Ganti Rugi</option>
                        <option value="TI.01.08" {{ ($suratti->fasilitatif == 'TI.01.08') ? 'selected' : '' }}>Pinjaman/Bantuan Luar Negeri</option>
                        <option value="TI.01.09" {{ ($suratti->fasilitatif == 'TI.01.09') ? 'selected' : '' }}>Verifikasi Anggaran</option>
                        <option value="TI.01.10" {{ ($suratti->fasilitatif == 'TI.01.10') ? 'selected' : '' }}>PembuTIan Anggaran</option>
                        <option value="TI.02" {{ ($suratti->fasilitatif == 'TI.02') ? 'selected' : '' }}>Perhitungan Anggaran</option>
                        <option value="TI.03.00" {{ ($suratti->fasilitatif == 'TI.03.00') ? 'selected' : '' }}>Keterangan Penghasilan</option>
                        <option value="TI.03.01" {{ ($suratti->fasilitatif == 'TI.03.01') ? 'selected' : '' }}>STIP (Surat Keterangan Pemberhentian Pembayaran)</option>
                        <option value="TI.03.02" {{ ($suratti->fasilitatif == 'TI.03.02') ? 'selected' : '' }}>Permohonan Pinjaman</option>
                        <option value="TI.03.03" {{ ($suratti->fasilitatif == 'TI.03.03') ? 'selected' : '' }}>Iuran Keanggotaan Organisasi</option>
                    </select>
                </div>


                <div class="col-span-12 sm:col-span-6">
                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                    <input id="nomor_surat" type="text" name="nomor_surat" class="form-control" value="{{ $suratti->no_surat }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="user" class="form-label">User</label>
                    <input id="user" type="text" name="user" class="form-control" value="{{ $suratti->user->name }}" required readonly>
                </div>
                
                <div class="col-span-12 sm:col-span-6">
                    @if ($suratti->file_surat)
                        <p><strong>File Surat:</strong> <a href="{{ asset('uploads/'.$suratti->file_surat) }}">Unduh Surat</a></p>
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
                <input type="hidden" name="status" value="{{ $suratti->status }}">
                
                <!-- Tambahkan kondisi untuk mengubah nama tombol -->
                @php
                    if ($suratti->status == 'waiting') {
                        $buttonText = 'Upload surat';
                    } elseif ($suratti->status == 'queue') {
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
                <input type="hidden" name="status" value="{{ $suratti->status }}">
                
                <!-- Tambahkan kondisi untuk mengubah nama tombol -->
                @php
                    $buttonText = ($suratti->status == 'queue') ? 'Update Surat' : 'Approve Pengajuan Surat';
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
            fetch('{{ route("tolakSurat", ["id" => $suratti->id]) }}', {
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
