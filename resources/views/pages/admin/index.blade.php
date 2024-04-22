@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - Tinker - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    @include('../layout/components/mobile-menu')
    <div class="flex overflow-hidden">
        <!-- BEGIN: Content -->
        <div class="content">
            @yield('subcontent')
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">Permohonan Pengajuan Surat</h2>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    {{-- Tampilkan tombol "Tambah Pengajuan Surat" hanya jika pengguna memiliki peran "User" --}}
                    @if(Auth::user()->role == 'User')
                        <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createsurat') }}">Tambah Pengajuan Surat</a></button>
                    @endif
                </div>
                
                <!-- Menampilkan data surat_pengawasan -->
                <div class="intro-y col-span-12">
                    <div class="overflow-x-auto p-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border-b-2 whitespace-nowrap">#</th>
                                    <th class="border-b-2 whitespace-nowrap">Tanggal</th>
                                    <th class="border-b-2 whitespace-nowrap">Nama</th>
                                    <th class="border-b-2 whitespace-nowrap">Perihal</th>
                                    <th class="border-b-2 whitespace-nowrap">Tujuan</th>
                                    <th class="border-b-2 whitespace-nowrap">Jenis Surat</th>
                                    <th class="border-b-2 whitespace-nowrap">Keterangan</th>
                                    <th class="border-b-2 whitespace-nowrap">Nomor Surat</th>
                                    <th class="border-b-2 whitespace-nowrap">User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suratPengawasanPemilus as $surat)
                                    <tr>
                                        <td class="border-b">{{ $loop->iteration }}</td>
                                        <td class="border-b">{{ $surat->tanggal }}</td>
                                        <td class="border-b">{{ $surat->nama }}</td>
                                        <td class="border-b">{{ $surat->perihal }}</td>
                                        <td class="border-b">{{ $surat->tujuan }}</td>
                                        <td class="border-b">{{ $surat->jenis_surat }}</td>
                                        <td class="border-b">{{ $surat->keterangan }}</td>
                                        <td class="border-b">{{ $surat->no_surat }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END: Menampilkan data surat_pengawasan_pemilus -->
            </div>
            
        </div>
        <!-- END: Content -->
    </div>
@endsection

@section('script')


@endsection
