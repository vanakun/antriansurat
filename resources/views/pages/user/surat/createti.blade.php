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

            <div class="px-6 py-4">
                <h2 class="text-xl font-semibold mb-4">Form SURAT TEKNOLOGI INFORMASI (TI)</h2>

                <form action="{{ route('storesuratti') }}" method="POST" class="max-w-md">
                    @csrf <!-- Untuk Laravel, gunakan csrf token -->

                    <div class="mb-4">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal:</label>
                        <input type="date" id="tanggal" name="tanggal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama:</label>
                        <input type="text" id="nama" name="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="perihal" class="block text-sm font-medium text-gray-700">Perihal:</label>
                        <input type="text" id="perihal" name="perihal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="tujuan" class="block text-sm font-medium text-gray-700">Tujuan:</label>
                        <input type="text" id="tujuan" name="tujuan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="jenis_surat" class="block text-sm font-medium text-gray-700">Jenis Surat:</label>
                        <select id="jenis_surat" name="jenis_surat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="Surat Masuk">Surat Masuk</option>
                            <option value="Surat Keluar">Surat Keluar</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan:</label>
                        <textarea id="keterangan" name="keterangan" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    </div>

                    <div class="mb-4">
                            <label for="kota" class="block text-sm font-medium text-gray-700">Kota:</label>
                            <select id="kota" name="kota" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <!-- Options for Aceh -->
                                <optgroup label="PROVINSI ACEH">
                                    <option value="AC-01">Kabupaten Aceh Barat</option>
                                    <option value="AC-02">Kabupaten Aceh Barat Daya</option>
                                    <option value="AC-03">Kabupaten Aceh Besar</option>
                                    <option value="AC-04">Kabupaten Aceh Jaya</option>
                                    <option value="AC-05">Kabupaten Aceh Selatan</option>
                                    <option value="AC-06">Kabupaten Aceh Singkil</option>
                                    <option value="AC-07">Kabupaten Aceh Tamiang</option>
                                    <option value="AC-08">Kabupaten Aceh Tengah</option>
                                    <option value="AC-09">Kabupaten Aceh Tenggara</option>
                                    <option value="AC-10">Kabupaten Aceh Timur</option>
                                    <option value="AC-11">Kabupaten Aceh Utara</option>
                                    <option value="AC-12">Kabupaten Bener Meriah</option>
                                    <option value="AC-13">Kabupaten Bireun</option>
                                    <option value="AC-14">Kabupaten Gayo Lues</option>
                                    <option value="AC-15">Kabupaten Nagan Raya</option>
                                    <option value="AC-16">Kabupaten Pidie</option>
                                    <option value="AC-17">Kabupaten Pidie Jaya</option>
                                    <option value="AC-18">Kabupaten Simeulue</option>
                                    <option value="AC-19">Kota Banda Aceh</option>
                                    <option value="AC-20">Kota Subulussalam</option>
                                    <option value="AC-21">Kota Langsa</option>
                                    <option value="AC-22">Kota Lhokseumawe</option>
                                    <option value="AC-23">Kota Sabang</option>
                                </optgroup>

                                <!-- Options for AC -->
                                
                            </select>
                        </div>

                    <div class="mb-4">
                        <label for="fasilitatif" class="block text-sm font-medium text-gray-700">FASILITATIF:</label>
                        <input list="fasilitatifOptions" id="fasilitatifInput" name="fasilitatif" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <datalist id="fasilitatifOptions">
                            <option value="TI.00.00">DIPA/ POK </option>
                            <option value="TI.00.01">Rencana Anggaran Belanja (RAB) </option>
                            <option value="TI.00.02">Penggajian </option>
                            <option value="TI.00.03">Pengeluaran Anggaran</option>

                            <option value="TI.01.00">Perbendaharaan  </option>
                            <option value="TI.01.01">TI4 (Kartu Pengawasan Pembayaran Penghasilan Pegawai) </option>
                            <option value="TI.01.02">Kartu Pengawasan Kredit</option>
                            <option value="TI.01.03">Pajak </option>
                            <option value="TI.01.04">Penerimaan Non Pajak </option>
                            <option value="TI.01.05">Pengembalian Belanja </option>
                            <option value="TI.01.06">Berita Acara Pemeriksaan Kas  </option>
                            <option value="TI.01.07">Tuntutan Ganti Rugi</option>
                            <option value="TI.01.08">Pinjaman/Bantuan Luar Negeri</option>
                            <option value="TI.01.09">Verifikasi Anggaran</option>
                            <option value="TI.01.10">PembuTIan Anggaran </option>

                            <option value="TI.02">Perhitungan Anggaran</option>

                            <option value="TI.03.00">Keterangan Penghasilan</option>
                            <option value="TI.03.01">STIP (Surat Keterangan Pemberhentian Pembayaran)</option>
                            <option value="TI.03.02">Permohonan Pinjaman</option>
                            <option value="TI.03.03">Iuran Keanggotaan Organisasi</option>
                            

                        </datalist>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const select = document.getElementById('fasilitatif');
                            const options = Array.from(select.options);

                            select.addEventListener('input', function(event) {
                                const searchText = event.target.value.toLowerCase();
                                select.innerHTML = '';

                                options.forEach(option => {
                                    if (option.text.toLowerCase().includes(searchText) || option.value.toLowerCase().includes(searchText)) {
                                        select.appendChild(option.cloneNode(true));
                                    }
                                });
                            });
                        });
                    </script>
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                        <button type="submit" class="btn btn-primary shadow-md mr-2">Submit</button>
                    </div>
            </form>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const select = document.getElementById('fasilitatif');

        select.addEventListener('input', function(event) {
            const searchText = event.target.value.toLowerCase();
            const options = select.getElementsByTagName('option');

            for (let option of options) {
                const optionText = option.textContent.toLowerCase();
                const optionValue = option.value.toLowerCase();
                if (optionText.includes(searchText) || optionValue.includes(searchText)) {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            }
        });
    });
</script>