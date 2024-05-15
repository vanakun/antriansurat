@extends('../layout/' . $layout)

@section('subhead')
    <title>Upload Surat - Tinker - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    

    <!-- Content -->
    <div class="content">
        <h2 class="intro-y text-lg font-medium mt-10">Upload SURAT PENYELESAIAN SENGKETA (PS)</h2>
        
        <!-- Form untuk mengunggah surat -->
        <form action="{{ route('updatepsdone', ['id' => $suratps->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Kolom input dan tombol submit -->

            <!-- Kolom input untuk mengunggah surat -->
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6">
                    <label for="status" class="form-label">Status</label>
                    <input id="status" type="text" name="status" class="form-control" value="{{ $suratps->status }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="surat" class="form-label">Surat</label>
                    <input id="surat" type="text" name="surat" class="form-control" value="{{ $suratps->j_surat }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input id="tanggal" type="date" name="tanggal" class="form-control" value="{{ $suratps->tanggal }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input id="nama" type="text" name="nama" class="form-control" value="{{ $suratps->nama }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="perihal" class="form-label">Perihal</label>
                    <input id="perihal" type="text" name="perihal" class="form-control" value="{{ $suratps->perihal }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input id="tujuan" type="text" name="tujuan" class="form-control" value="{{ $suratps->tujuan }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="jenis_surat" class="form-label">Jenis Surat</label>
                    <input id="jenis_surat" type="text" name="jenis_surat" class="form-control" value="{{ $suratps->jenis_surat }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input id="keterangan" type="text" name="keterangan" class="form-control" value="{{ $suratps->keterangan }}" required readonly>
                </div>
                <div class="col-span-12">
                    <label for="kota" class="form-label">Kota</label>
                    <select id="kota" name="kota" class="form-select" required readonly>
                        <option value="">Pilih Kota</option>
                        <option value="AC-01" {{ ($suratps->kota == 'AC-01') ? 'selected' : '' }}>Kabupaten Aceh Barat</option>
                        <option value="AC-02" {{ ($suratps->kota == 'AC-02') ? 'selected' : '' }}>Kabupaten Aceh Barat Daya</option>
                        <option value="AC-03" {{ ($suratps->kota == 'AC-03') ? 'selected' : '' }}>Kabupaten Aceh Besar</option>
                        <option value="AC-04" {{ ($suratps->kota == 'AC-04') ? 'selected' : '' }}>Kabupaten Aceh Jaya</option>
                        <option value="AC-05" {{ ($suratps->kota == 'AC-05') ? 'selected' : '' }}>Kabupaten Aceh Selatan</option>
                        <option value="AC-06" {{ ($suratps->kota == 'AC-06') ? 'selected' : '' }}>Kabupaten Aceh Singkil</option>
                        <option value="AC-07" {{ ($suratps->kota == 'AC-07') ? 'selected' : '' }}>Kabupaten Aceh Tamiang</option>
                        <option value="AC-08" {{ ($suratps->kota == 'AC-08') ? 'selected' : '' }}>Kabupaten Aceh Tengah</option>
                        <option value="AC-09" {{ ($suratps->kota == 'AC-09') ? 'selected' : '' }}>Kabupaten Aceh Tenggara</option>
                        <option value="AC-10" {{ ($suratps->kota == 'AC-10') ? 'selected' : '' }}>Kabupaten Aceh Timur</option>
                        <option value="AC-11" {{ ($suratps->kota == 'AC-11') ? 'selected' : '' }}>Kabupaten Aceh Utara</option>
                        <option value="AC-12" {{ ($suratps->kota == 'AC-12') ? 'selected' : '' }}>Kabupaten Bener Meriah</option>
                        <option value="AC-13" {{ ($suratps->kota == 'AC-13') ? 'selected' : '' }}>Kabupaten Bireun</option>
                        <option value="AC-14" {{ ($suratps->kota == 'AC-14') ? 'selected' : '' }}>Kabupaten Gayo Lues</option>
                        <option value="AC-15" {{ ($suratps->kota == 'AC-15') ? 'selected' : '' }}>Kabupaten Nagan Raya</option>
                        <option value="AC-16" {{ ($suratps->kota == 'AC-16') ? 'selected' : '' }}>Kabupaten Pidie</option>
                        <option value="AC-17" {{ ($suratps->kota == 'AC-17') ? 'selected' : '' }}>Kabupaten Pidie Jaya</option>
                        <option value="AC-18" {{ ($suratps->kota == 'AC-18') ? 'selected' : '' }}>Kabupaten Simeulue</option>
                        <option value="AC-19" {{ ($suratps->kota == 'AC-19') ? 'selected' : '' }}>Kota Banda Aceh</option>
                        <option value="AC-20" {{ ($suratps->kota == 'AC-20') ? 'selected' : '' }}>Kota Subulussalam</option>
                        <option value="AC-21" {{ ($suratps->kota == 'AC-21') ? 'selected' : '' }}>Kota Langsa</option>
                        <option value="AC-22" {{ ($suratps->kota == 'AC-22') ? 'selected' : '' }}>Kota Lhokseumawe</option>
                        <option value="AC-23" {{ ($suratps->kota == 'AC-23') ? 'selected' : '' }}>Kota Sabang</option>
                    </select>
                </div>


                <div class="col-span-12">
                    <label for="substantif" class="form-label">Substantif</label>
                    <select id="substantif" name="substantif" class="form-select" required readonly>
                        <option value="">Pilih Substantif</option>
                        <option value="PS.00.00" {{ ($suratps->substantif == 'PS.00.00') ? 'selected' : '' }}>Penyelesaian Sengketa Pemilu Tingkat Pusat</option>
                        <option value="PS.00.01" {{ ($suratps->substantif == 'PS.00.01') ? 'selected' : '' }}>Penyelesaian Sengketa Pemilu Tingkat Provinsi</option>
                        <option value="PS.00.02" {{ ($suratps->substantif == 'PS.00.02') ? 'selected' : '' }}>Penyelesaian Sengketa Pemilu Tingkat Kabupaten/Kota</option>
                        <option value="PS.00.03" {{ ($suratps->substantif == 'PS.00.03') ? 'selected' : '' }}>Penyelesaian Sengketa Pemilu Tingkat Kecamatan</option>
                        
                        <option value="PS.01.00" {{ ($suratps->substantif == 'PS.01.00') ? 'selected' : '' }}>Penyelesaian Sengketa Pemilihan Tingkat Pusat</option>
                        <option value="PS.01.01" {{ ($suratps->substantif == 'PS.01.01') ? 'selected' : '' }}>Penyelesaian Sengketa Pemilihan Tingkat Provinsi</option>
                        <option value="PS.01.02" {{ ($suratps->substantif == 'PS.01.02') ? 'selected' : '' }}>Penyelesaian Sengketa Pemilihan Tingkat Kabupaten/Kota</option>
                        <option value="PS.01.03" {{ ($suratps->substantif == 'PS.01.03') ? 'selected' : '' }}>Penyelesaian Sengketa Pemilihan Tingkat Kecamatan</option>
                        
                        <option value="PS.02" {{ ($suratps->substantif == 'PS.02') ? 'selected' : '' }}>Sosialisasi Penyelesaian Sengketa</option>
                        <option value="PS.03" {{ ($suratps->substantif == 'PS.03') ? 'selected' : '' }}>Pendampingan, Monitoring, dan Evaluasi</option>
                    </select>
                </div>


                <div class="col-span-12 sm:col-span-6">
                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                    <input id="nomor_surat" type="text" name="nomor_surat" class="form-control" value="{{ $suratps->no_surat }}" required readonly>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="user" class="form-label">User</label>
                    <input id="user" type="text" name="user" class="form-control" value="{{ $suratps->user->name }}" required readonly>
                </div>
                
                <div class="col-span-12 sm:col-span-6">
                    @if ($suratps->file_surat)
                        <p><strong>File Surat:</strong> <a href="{{ asset('uploads/'.$suratps->file_surat) }}">Unduh Surat</a></p>
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
                <input type="hidden" name="status" value="{{ $suratps->status }}">
                
                <!-- Tambahkan kondisi untuk mengubah nama tombol -->
                @php
                    if ($suratps->status == 'waiting') {
                        $buttonText = 'Upload surat';
                    } elseif ($suratps->status == 'queue') {
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
                <input type="hidden" name="status" value="{{ $suratps->status }}">
                
                <!-- Tambahkan kondisi untuk mengubah nama tombol -->
                @php
                    $buttonText = ($suratps->status == 'queue') ? 'Update Surat' : 'Approve Pengajuan Surat';
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
            fetch('{{ route("tolakSurat", ["id" => $suratps->id]) }}', {
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
