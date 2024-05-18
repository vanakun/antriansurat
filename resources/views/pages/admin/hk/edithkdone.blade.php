@extends('../layout/' . $layout)

@section('subhead')
    <title>Upload Surat - Tinker - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    

    <!-- Content -->
    <div class="content">
        <h2 class="intro-y text-lg font-medium mt-10">Upload SURAT HUKUM (HK)</h2>
        
        <!-- Form untuk mengunggah surat -->
        <form action="{{ route('updatehkdone', ['id' => $surathk->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Kolom input dan tombol submit -->

            <!-- Kolom input untuk mengunggah surat -->
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6">
                    <label for="status" class="form-label">Status</label>
                    <input id="status" type="text" name="status" class="form-control" value="{{ $surathk->status }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="surat" class="form-label">Surat</label>
                    <input id="surat" type="text" name="surat" class="form-control" value="{{ $surathk->j_surat }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input id="tanggal" type="date" name="tanggal" class="form-control" value="{{ $surathk->tanggal }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input id="nama" type="text" name="nama" class="form-control" value="{{ $surathk->nama }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="perihal" class="form-label">Perihal</label>
                    <input id="perihal" type="text" name="perihal" class="form-control" value="{{ $surathk->perihal }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input id="tujuan" type="text" name="tujuan" class="form-control" value="{{ $surathk->tujuan }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="jenis_surat" class="form-label">Jenis Surat</label>
                    <input id="jenis_surat" type="text" name="jenis_surat" class="form-control" value="{{ $surathk->jenis_surat }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input id="keterangan" type="text" name="keterangan" class="form-control" value="{{ $surathk->keterangan }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="kota" class="form-label">Kota</label>
                    <select id="kota" name="kota" class="form-select" required readonly>
                        <option value="">Pilih Kota</option>
                        <option value="AC-01" {{ ($surathk->kota == 'AC-01') ? 'selected' : '' }}>Kabupaten Aceh Barat</option>
                        <option value="AC-02" {{ ($surathk->kota == 'AC-02') ? 'selected' : '' }}>Kabupaten Aceh Barat Daya</option>
                        <option value="AC-03" {{ ($surathk->kota == 'AC-03') ? 'selected' : '' }}>Kabupaten Aceh Besar</option>
                        <option value="AC-04" {{ ($surathk->kota == 'AC-04') ? 'selected' : '' }}>Kabupaten Aceh Jaya</option>
                        <option value="AC-05" {{ ($surathk->kota == 'AC-05') ? 'selected' : '' }}>Kabupaten Aceh Selatan</option>
                        <option value="AC-06" {{ ($surathk->kota == 'AC-06') ? 'selected' : '' }}>Kabupaten Aceh Singkil</option>
                        <option value="AC-07" {{ ($surathk->kota == 'AC-07') ? 'selected' : '' }}>Kabupaten Aceh Tamiang</option>
                        <option value="AC-08" {{ ($surathk->kota == 'AC-08') ? 'selected' : '' }}>Kabupaten Aceh Tengah</option>
                        <option value="AC-09" {{ ($surathk->kota == 'AC-09') ? 'selected' : '' }}>Kabupaten Aceh Tenggara</option>
                        <option value="AC-10" {{ ($surathk->kota == 'AC-10') ? 'selected' : '' }}>Kabupaten Aceh Timur</option>
                        <option value="AC-11" {{ ($surathk->kota == 'AC-11') ? 'selected' : '' }}>Kabupaten Aceh Utara</option>
                        <option value="AC-12" {{ ($surathk->kota == 'AC-12') ? 'selected' : '' }}>Kabupaten Bener Meriah</option>
                        <option value="AC-13" {{ ($surathk->kota == 'AC-13') ? 'selected' : '' }}>Kabupaten Bireun</option>
                        <option value="AC-14" {{ ($surathk->kota == 'AC-14') ? 'selected' : '' }}>Kabupaten Gayo Lues</option>
                        <option value="AC-15" {{ ($surathk->kota == 'AC-15') ? 'selected' : '' }}>Kabupaten Nagan Raya</option>
                        <option value="AC-16" {{ ($surathk->kota == 'AC-16') ? 'selected' : '' }}>Kabupaten Pidie</option>
                        <option value="AC-17" {{ ($surathk->kota == 'AC-17') ? 'selected' : '' }}>Kabupaten Pidie Jaya</option>
                        <option value="AC-18" {{ ($surathk->kota == 'AC-18') ? 'selected' : '' }}>Kabupaten Simeulue</option>
                        <option value="AC-19" {{ ($surathk->kota == 'AC-19') ? 'selected' : '' }}>Kota Banda Aceh</option>
                        <option value="AC-20" {{ ($surathk->kota == 'AC-20') ? 'selected' : '' }}>Kota Subulussalam</option>
                        <option value="AC-21" {{ ($surathk->kota == 'AC-21') ? 'selected' : '' }}>Kota Langsa</option>
                        <option value="AC-22" {{ ($surathk->kota == 'AC-22') ? 'selected' : '' }}>Kota Lhokseumawe</option>
                        <option value="AC-23" {{ ($surathk->kota == 'AC-23') ? 'selected' : '' }}>Kota Sabang</option>
                    </select>
                </div>


                <div class="col-span-12">
                    <label for="fasilitatif" class="form-label">Fasilitatif</label>
                    <select id="fasilitatif" name="fasilitatif" class="form-select" required readonly>
                        <option value="">Pilih Fasilitatif</option>
                        <option value="HK.00" {{ ($surathk->fasilitatif == 'HK.00') ? 'selected' : '' }}>Program Legislasi</option>
                        <option value="HK.01.00" {{ ($surathk->fasilitatif == 'HK.01.00') ? 'selected' : '' }}>Produk Hukum yang Bersifat Pengaturan</option>
                        <option value="HK.01.01" {{ ($surathk->fasilitatif == 'HK.01.01') ? 'selected' : '' }}>Produk Hukum yang Bersifat Penetapan</option>
                        <option value="HK.02.00" {{ ($surathk->fasilitatif == 'HK.02.00') ? 'selected' : '' }}>Kerjasama Dalam Negeri</option>
                        <option value="HK.02.01" {{ ($surathk->fasilitatif == 'HK.02.01') ? 'selected' : '' }}>Kerjasama Luar Negeri</option>
                        <option value="HK.03.00" {{ ($surathk->fasilitatif == 'HK.03.00') ? 'selected' : '' }}>Advokasi Hukum Kasus Perdata</option>
                        <option value="HK.03.01" {{ ($surathk->fasilitatif == 'HK.03.01') ? 'selected' : '' }}>Advokasi Hukum Kasus Pidana</option>
                        <option value="HK.03.02" {{ ($surathk->fasilitatif == 'HK.03.02') ? 'selected' : '' }}>Advokasi Hukum Kasus Peradilan Tata Usaha Negara</option>
                        <option value="HK.03.03" {{ ($surathk->fasilitatif == 'HK.03.03') ? 'selected' : '' }}>Advokasi Hukum Perkara Perselisihan Hasil</option>
                        <option value="HK.03.04" {{ ($surathk->fasilitatif == 'HK.03.04') ? 'selected' : '' }}>Advokasi Hukum Perkara Kode Etik</option>
                        <option value="HK.03.05" {{ ($surathk->fasilitatif == 'HK.03.05') ? 'selected' : '' }}>Advokasi Hukum Perkara Uji Materiil</option>
                        <option value="HK.03.06" {{ ($surathk->fasilitatif == 'HK.03.06') ? 'selected' : '' }}>Advokasi Hukum dalam Pengaduan dan Konsultasi Hukum</option>
                        <option value="HK.03.07" {{ ($surathk->fasilitatif == 'HK.03.07') ? 'selected' : '' }}>Advokasi Hukum dalam Alternatif Penyelesaian Sengketa</option>
                        <option value="HK.04" {{ ($surathk->fasilitatif == 'HK.04') ? 'selected' : '' }}>Telaah Hukum Internal</option>
                        <option value="HK.04.01" {{ ($surathk->fasilitatif == 'HK.04.01') ? 'selected' : '' }}>Telaah Hukum Internal</option>
                        <option value="HK.04.02" {{ ($surathk->fasilitatif == 'HK.04.02') ? 'selected' : '' }}>Telaah Hukum Eksternal</option>
                        <option value="HK.05.00" {{ ($surathk->fasilitatif == 'HK.05.00') ? 'selected' : '' }}>Sosialisasi Hukum Tingkat Pusat</option>
                        <option value="HK.05.01" {{ ($surathk->fasilitatif == 'HK.05.01') ? 'selected' : '' }}>Sosialisasi Hukum Tingkat Provinsi</option>
                        <option value="HK.05.02" {{ ($surathk->fasilitatif == 'HK.05.02') ? 'selected' : '' }}>Sosialisasi Hukum Tingkat Kabupaten/Kota</option>
                        <option value="HK.06" {{ ($surathk->fasilitatif == 'HK.06') ? 'selected' : '' }}>Dokumentasi Hukum</option>
                        <option value="HK.07" {{ ($surathk->fasilitatif == 'HK.07') ? 'selected' : '' }}>Hak Atas Kekayaan Intelektual</option>
                        <option value="HK.08" {{ ($surathk->fasilitatif == 'HK.08') ? 'selected' : '' }}>Kasus Hukum</option>
                    </select>
                </div>


                <div class="col-span-12 sm:col-span-6">
                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                    <input id="nomor_surat" type="text" name="nomor_surat" class="form-control" value="{{ $surathk->no_surat }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="user" class="form-label">User</label>
                    <input id="user" type="text" name="user" class="form-control" value="{{ $surathk->user->name }}" required readonly>
                </div>
                
                <div class="col-span-12 sm:col-span-6">
                    @if ($surathk->file_surat)
                        <p><strong>File Surat:</strong> <a href="{{ asset('uploads/'.$surathk->file_surat) }}">Unduh Surat</a></p>
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
                <input type="hidden" name="status" value="{{ $surathk->status }}">
                
                <!-- Tambahkan kondisi untuk mengubah nama tombol -->
                @php
                    if ($surathk->status == 'waiting') {
                        $buttonText = 'Upload surat';
                    } elseif ($surathk->status == 'queue') {
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
                <input type="hidden" name="status" value="{{ $surathk->status }}">
                
                <!-- Tambahkan kondisi untuk mengubah nama tombol -->
                @php
                    $buttonText = ($surathk->status == 'queue') ? 'Update Surat' : 'Approve Pengajuan Surat';
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
            fetch('{{ route("tolakSurat", ["id" => $surathk->id]) }}', {
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
