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
           
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">Permohonan Pengajuan Surat</h2>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createsuratpm') }}">Tambah Pengajuan Surat PENGAWASAN PEMILU</a></button>
                </div>
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createsuratpp') }}">Tambah Pengajuan Surat PENANGANAN PELANGGARAN DAN SENGKETA PEMILU </a></button>
                </div>
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createsuratps') }}">Tambah Pengajuan Surat PENYELESAIAN SENGKETA </a></button>
                </div>
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createsuratpr') }}">Tambah Pengajuan Surat PERENCANAAN </a></button>
                </div>
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createsuratot') }}">Tambah Pengajuan Surat ORGANISASI DAN TATA LAKSANA </a></button>
                </div>
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createsuratka') }}">Tambah Pengajuan Surat PERSURATAN DAN KEARSIPAN </a></button>
                </div>
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createsuratku') }}">Tambah Pengajuan Surat KEUANGAN </a></button>
                </div>
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createsuratpl') }}">Tambah Pengajuan Surat PERLENGKAPAN </a></button>
                </div>
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createsurathk') }}">Tambah Pengajuan Surat HUKUM </a></button>
                </div>
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createsurathm') }}">Tambah Pengajuan Surat HUBUNGAN MASYARAKAT </a></button>
                </div>
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createsuratkp') }}">Tambah Pengajuan Surat KEPEGAWAIAN </a></button>
                </div>
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createsuratrt') }}">Tambah Pengajuan Surat KETATAUSAHAAN DAN KERUMAHTANGGAAN  </a></button>
                </div>
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createsuratpm') }}">Tambah Pengajuan Surat TEKNOLOGI INFORMASI</a></button>
                </div>
                <!-- END: Blog Layout -->
            </div>
            
        </div>
        <!-- END: Content -->
    </div>
@endsection

@section('script')


@endsection