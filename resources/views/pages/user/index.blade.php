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
        
        <h2 class="intro-y text-lg font-medium mt-10">Permohonan Pengajuan Surat</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        {{-- Tampilkan tombol "Tambah Pengajuan Surat" hanya jika pengguna memiliki peran "User" --}}
        @php
            $allowedRoles = ['User'];
            $userRole = auth()->user()->role;
        @endphp

        @if(in_array($userRole, $allowedRoles))
            <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createsurat') }}">Tambah Pengajuan Surat</a></button>
        @endif
        <!-- <div id="real-time-clock" class="intro-y hidden md:block mx-auto text-slate-500"></div> -->
        <div class="intro-y mx-auto md:block mt-4">
           
        </div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form action="" method="GET">
                <div class="w-56 relative text-slate-500">
                    <input type="text" name="search" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </form>
        </div>
    </div>
    <!-- BEGIN: Data List -->
   
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <h2 class="intro-y text-lg font-medium mt-10">Pengajuan Surat Pengawasan Pemilu (PM)</h2>
    <br>
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Status</th>
                    <th class="whitespace-nowrap">Surat</th>
                    <th class="whitespace-nowrap">Tanggal</th>
                    <th class="whitespace-nowrap">Nama</th>
                    <th class="whitespace-nowrap">Perihal</th>
                    <th class="whitespace-nowrap">Tujuan</th>
                    <th class="whitespace-nowrap">Jenis Surat</th>
                    <th class="whitespace-nowrap">Keterangan</th>
                    <th class="whitespace-nowrap">Nomor Surat</th>
                    <th class="whitespace-nowrap">User</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suratPengawasanPemilus as $surat)
                <tr class="intro-x image-fit zoom-in">
                <td>
                        <a href="{{ route('showsuratpmuser', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->id }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('showsuratpmuser', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->status }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('showsuratpmuser', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->j_surat }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('showsuratpmuser', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->tanggal }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('showsuratpmuser', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->nama }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('showsuratpmuser', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->perihal }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('showsuratpmuser', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->tujuan }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('showsuratpmuser', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->jenis_surat }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('showsuratpmuser', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->keterangan }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('showsuratpmuser', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->no_surat }}</div>
                        </a>
                    </td>
                   
                    <td>
                        <a href="{{ route('showsuratpmuser', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->user->name }}</div>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="intro-y flex flex-col mt-4">
            {!! $suratPengawasanPemilus->links('pagination') !!}
        </div>
    </div>
    <!-- END: Data List -->
</div>

<!-- Tabel kedua -->
<h2 class="intro-y text-lg font-medium mt-10">Pengajuan Surat PENANGANAN PELANGGARAN DAN SENGKETA PEMILU (PP)</h2>
    <br>
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Status</th>
                <th class="whitespace-nowrap">Surat</th>
                <th class="whitespace-nowrap">Tanggal</th>
                <th class="whitespace-nowrap">Nama</th>
                <th class="whitespace-nowrap">Perihal</th>
                <th class="whitespace-nowrap">Tujuan</th>
                <th class="whitespace-nowrap">Jenis Surat</th>
                <th class="whitespace-nowrap">Keterangan</th>
                <th class="whitespace-nowrap">Nomor Surat</th>
                <th class="whitespace-nowrap">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratpp as $surat)
            <tr class="intro-x image-fit zoom-in">
                <td><a href="{{ route('showsuratppuser', ['id' => $surat->id]) }}">{{ $surat->id }}</a></td>
                <td><a href="{{ route('showsuratppuser', ['id' => $surat->id]) }}">{{ $surat->status }}</a></td>
                <td><a href="{{ route('showsuratppuser', ['id' => $surat->id]) }}">{{ $surat->j_surat }}</a></td>
                <td><a href="{{ route('showsuratppuser', ['id' => $surat->id]) }}">{{ $surat->tanggal }}</a></td>
                <td><a href="{{ route('showsuratppuser', ['id' => $surat->id]) }}">{{ $surat->nama }}</a></td>
                <td><a href="{{ route('showsuratppuser', ['id' => $surat->id]) }}">{{ $surat->perihal }}</a></td>
                <td><a href="{{ route('showsuratppuser', ['id' => $surat->id]) }}">{{ $surat->tujuan }}</a></td>
                <td><a href="{{ route('showsuratppuser', ['id' => $surat->id]) }}">{{ $surat->jenis_surat }}</a></td>
                <td><a href="{{ route('showsuratppuser', ['id' => $surat->id]) }}">{{ $surat->keterangan }}</a></td>
                <td><a href="{{ route('showsuratppuser', ['id' => $surat->id]) }}">{{ $surat->no_surat }}</a></td>
                <td><a href="{{ route('showsuratppuser', ['id' => $surat->id]) }}">{{ $surat->user->name }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="intro-y flex flex-col mt-4">
        {!! $suratpp->links('pagination') !!}
    </div>
</div>
<h2 class="intro-y text-lg font-medium mt-10">Pengajuan Surat PENYELESAIAN SENGKETA (PS)</h2>
    <br>
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Status</th>
                <th class="whitespace-nowrap">Surat</th>
                <th class="whitespace-nowrap">Tanggal</th>
                <th class="whitespace-nowrap">Nama</th>
                <th class="whitespace-nowrap">Perihal</th>
                <th class="whitespace-nowrap">Tujuan</th>
                <th class="whitespace-nowrap">Jenis Surat</th>
                <th class="whitespace-nowrap">Keterangan</th>
                <th class="whitespace-nowrap">Nomor Surat</th>
                <th class="whitespace-nowrap">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratps as $surat)
            <tr class="intro-x image-fit zoom-in">
                <td><a href="{{ route('showsuratpsuser', ['id' => $surat->id]) }}">{{ $surat->id }}</a></td>
                <td><a href="{{ route('showsuratpsuser', ['id' => $surat->id]) }}">{{ $surat->status }}</a></td>
                <td><a href="{{ route('showsuratpsuser', ['id' => $surat->id]) }}">{{ $surat->j_surat }}</a></td>
                <td><a href="{{ route('showsuratpsuser', ['id' => $surat->id]) }}">{{ $surat->tanggal }}</a></td>
                <td><a href="{{ route('showsuratpsuser', ['id' => $surat->id]) }}">{{ $surat->nama }}</a></td>
                <td><a href="{{ route('showsuratpsuser', ['id' => $surat->id]) }}">{{ $surat->perihal }}</a></td>
                <td><a href="{{ route('showsuratpsuser', ['id' => $surat->id]) }}">{{ $surat->tujuan }}</a></td>
                <td><a href="{{ route('showsuratpsuser', ['id' => $surat->id]) }}">{{ $surat->jenis_surat }}</a></td>
                <td><a href="{{ route('showsuratpsuser', ['id' => $surat->id]) }}">{{ $surat->keterangan }}</a></td>
                <td><a href="{{ route('showsuratpsuser', ['id' => $surat->id]) }}">{{ $surat->no_surat }}</a></td>
                <td><a href="{{ route('showsuratpsuser', ['id' => $surat->id]) }}">{{ $surat->user->name }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="intro-y flex flex-col mt-4">
        {!! $suratps->links('pagination') !!}
    </div>
</div>
<h2 class="intro-y text-lg font-medium mt-10">Pengajuan Surat PERENCANAAN (PR)</h2>
    <br>
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Status</th>
                <th class="whitespace-nowrap">Surat</th>
                <th class="whitespace-nowrap">Tanggal</th>
                <th class="whitespace-nowrap">Nama</th>
                <th class="whitespace-nowrap">Perihal</th>
                <th class="whitespace-nowrap">Tujuan</th>
                <th class="whitespace-nowrap">Jenis Surat</th>
                <th class="whitespace-nowrap">Keterangan</th>
                <th class="whitespace-nowrap">Nomor Surat</th>
                <th class="whitespace-nowrap">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratpr as $surat)
            <tr class="intro-x image-fit zoom-in">
               
                <td><a href="{{ route('showsuratpruser', ['id' => $surat->id]) }}">{{ $surat->id }}</a></td>
                <td><a href="{{ route('showsuratpruser', ['id' => $surat->id]) }}">{{ $surat->status}}</a></td>
                <td><a href="{{ route('showsuratpruser', ['id' => $surat->id]) }}">{{ $surat->j_surat }}</a></td>
                <td><a href="{{ route('showsuratpruser', ['id' => $surat->id]) }}">{{ $surat->tanggal }}</a></td>
                <td><a href="{{ route('showsuratpruser', ['id' => $surat->id]) }}">{{ $surat->nama }}</a></td>
                <td><a href="{{ route('showsuratpruser', ['id' => $surat->id]) }}">{{ $surat->perihal }}</a></td>
                <td><a href="{{ route('showsuratpruser', ['id' => $surat->id]) }}">{{ $surat->tujuan }}</a></td>
                <td><a href="{{ route('showsuratpruser', ['id' => $surat->id]) }}">{{ $surat->jenis_surat }}</a></td>
                <td><a href="{{ route('showsuratpruser', ['id' => $surat->id]) }}">{{ $surat->keterangan }}</a></td>
                <td><a href="{{ route('showsuratpruser', ['id' => $surat->id]) }}">{{ $surat->no_surat }}</a></td>
                <td><a href="{{ route('showsuratpruser', ['id' => $surat->id]) }}">{{ $surat->user->name }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="intro-y flex flex-col mt-4">
        {!! $suratpr->links('pagination') !!}
    </div>
</div>
<h2 class="intro-y text-lg font-medium mt-10">Pengajuan Surat ORGANISASI DAN TATA LAKSANA (OT)</h2>
    <br>
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Surat</th>
                <th class="whitespace-nowrap">Status</th>
                <th class="whitespace-nowrap">Tanggal</th>
                <th class="whitespace-nowrap">Nama</th>
                <th class="whitespace-nowrap">Perihal</th>
                <th class="whitespace-nowrap">Tujuan</th>
                <th class="whitespace-nowrap">Jenis Surat</th>
                <th class="whitespace-nowrap">Keterangan</th>
                <th class="whitespace-nowrap">Nomor Surat</th>
                <th class="whitespace-nowrap">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratot as $surat)
            <tr class="intro-x image-fit zoom-in">
               
                <td><a href="#">{{ $surat->id }}</a></td>
                <td><a href="#">{{ $surat->status }}</a></td>
                <td><a href="#">{{ $surat->j_surat }}</a></td>
                <td><a href="#">{{ $surat->tanggal }}</a></td>
                <td><a href="#">{{ $surat->nama }}</a></td>
                <td><a href="#">{{ $surat->perihal }}</a></td>
                <td><a href="#">{{ $surat->tujuan }}</a></td>
                <td><a href="#">{{ $surat->jenis_surat }}</a></td>
                <td><a href="#">{{ $surat->keterangan }}</a></td>
                <td><a href="#">{{ $surat->no_surat }}</a></td>
                <td><a href="#">{{ $surat->user->name }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="intro-y flex flex-col mt-4">
        {!! $suratot->links('pagination') !!}
    </div>
</div>

<h2 class="intro-y text-lg font-medium mt-10">Pengajuan Surat PERSURATAN DAN KEARSIPAN (KA)</h2>
    <br>
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Surat</th>
                <th class="whitespace-nowrap">Tanggal</th>
                <th class="whitespace-nowrap">Nama</th>
                <th class="whitespace-nowrap">Perihal</th>
                <th class="whitespace-nowrap">Tujuan</th>
                <th class="whitespace-nowrap">Jenis Surat</th>
                <th class="whitespace-nowrap">Keterangan</th>
                <th class="whitespace-nowrap">Nomor Surat</th>
                <th class="whitespace-nowrap">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratka as $surat)
            <tr class="intro-x image-fit zoom-in">
               
                <td><a href="#">{{ $surat->id }}</a></td>
                <td><a href="#">{{ $surat->j_surat }}</a></td>
                <td><a href="#">{{ $surat->tanggal }}</a></td>
                <td><a href="#">{{ $surat->nama }}</a></td>
                <td><a href="#">{{ $surat->perihal }}</a></td>
                <td><a href="#">{{ $surat->tujuan }}</a></td>
                <td><a href="#">{{ $surat->jenis_surat }}</a></td>
                <td><a href="#">{{ $surat->keterangan }}</a></td>
                <td><a href="#">{{ $surat->no_surat }}</a></td>
                <td><a href="#">{{ $surat->user->name }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="intro-y flex flex-col mt-4">
        {!! $suratka->links('pagination') !!}
    </div>
</div>

<h2 class="intro-y text-lg font-medium mt-10">Pengajuan Surat KEUANGAN (KU)</h2>
    <br>
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Surat</th>
                <th class="whitespace-nowrap">Tanggal</th>
                <th class="whitespace-nowrap">Nama</th>
                <th class="whitespace-nowrap">Perihal</th>
                <th class="whitespace-nowrap">Tujuan</th>
                <th class="whitespace-nowrap">Jenis Surat</th>
                <th class="whitespace-nowrap">Keterangan</th>
                <th class="whitespace-nowrap">Nomor Surat</th>
                <th class="whitespace-nowrap">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratku as $surat)
            <tr class="intro-x image-fit zoom-in">
               
                <td><a href="#">{{ $surat->id }}</a></td>
                <td><a href="#">{{ $surat->j_surat }}</a></td>
                <td><a href="#">{{ $surat->tanggal }}</a></td>
                <td><a href="#">{{ $surat->nama }}</a></td>
                <td><a href="#">{{ $surat->perihal }}</a></td>
                <td><a href="#">{{ $surat->tujuan }}</a></td>
                <td><a href="#">{{ $surat->jenis_surat }}</a></td>
                <td><a href="#">{{ $surat->keterangan }}</a></td>
                <td><a href="#">{{ $surat->no_surat }}</a></td>
                <td><a href="#">{{ $surat->user->name }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="intro-y flex flex-col mt-4">
        {!! $suratku->links('pagination') !!}
    </div>
</div>

<h2 class="intro-y text-lg font-medium mt-10">PERLENGKAPAN (PL)</h2>
    <br>
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Surat</th>
                <th class="whitespace-nowrap">Tanggal</th>
                <th class="whitespace-nowrap">Nama</th>
                <th class="whitespace-nowrap">Perihal</th>
                <th class="whitespace-nowrap">Tujuan</th>
                <th class="whitespace-nowrap">Jenis Surat</th>
                <th class="whitespace-nowrap">Keterangan</th>
                <th class="whitespace-nowrap">Nomor Surat</th>
                <th class="whitespace-nowrap">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratpl as $surat)
            <tr class="intro-x image-fit zoom-in">
               
                <td><a href="#">{{ $surat->id }}</a></td>
                <td><a href="#">{{ $surat->j_surat }}</a></td>
                <td><a href="#">{{ $surat->tanggal }}</a></td>
                <td><a href="#">{{ $surat->nama }}</a></td>
                <td><a href="#">{{ $surat->perihal }}</a></td>
                <td><a href="#">{{ $surat->tujuan }}</a></td>
                <td><a href="#">{{ $surat->jenis_surat }}</a></td>
                <td><a href="#">{{ $surat->keterangan }}</a></td>
                <td><a href="#">{{ $surat->no_surat }}</a></td>
                <td><a href="#">{{ $surat->user->name }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="intro-y flex flex-col mt-4">
        {!! $suratpl->links('pagination') !!}
    </div>
</div>


<h2 class="intro-y text-lg font-medium mt-10">Hukum (HK)</h2>
    <br>
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Surat</th>
                <th class="whitespace-nowrap">Tanggal</th>
                <th class="whitespace-nowrap">Nama</th>
                <th class="whitespace-nowrap">Perihal</th>
                <th class="whitespace-nowrap">Tujuan</th>
                <th class="whitespace-nowrap">Jenis Surat</th>
                <th class="whitespace-nowrap">Keterangan</th>
                <th class="whitespace-nowrap">Nomor Surat</th>
                <th class="whitespace-nowrap">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($surathk as $surat)
            <tr class="intro-x image-fit zoom-in">
               
                <td><a href="#">{{ $surat->id }}</a></td>
                <td><a href="#">{{ $surat->j_surat }}</a></td>
                <td><a href="#">{{ $surat->tanggal }}</a></td>
                <td><a href="#">{{ $surat->nama }}</a></td>
                <td><a href="#">{{ $surat->perihal }}</a></td>
                <td><a href="#">{{ $surat->tujuan }}</a></td>
                <td><a href="#">{{ $surat->jenis_surat }}</a></td>
                <td><a href="#">{{ $surat->keterangan }}</a></td>
                <td><a href="#">{{ $surat->no_surat }}</a></td>
                <td><a href="#">{{ $surat->user->name }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="intro-y flex flex-col mt-4">
        {!! $surathk->links('pagination') !!}
    </div>
</div>

<h2 class="intro-y text-lg font-medium mt-10">HUBUNGAN MASYARAKAT (HM)</h2>
    <br>
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Surat</th>
                <th class="whitespace-nowrap">Tanggal</th>
                <th class="whitespace-nowrap">Nama</th>
                <th class="whitespace-nowrap">Perihal</th>
                <th class="whitespace-nowrap">Tujuan</th>
                <th class="whitespace-nowrap">Jenis Surat</th>
                <th class="whitespace-nowrap">Keterangan</th>
                <th class="whitespace-nowrap">Nomor Surat</th>
                <th class="whitespace-nowrap">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($surathm as $surat)
            <tr class="intro-x image-fit zoom-in">
               
                <td><a href="#">{{ $surat->id }}</a></td>
                <td><a href="#">{{ $surat->j_surat }}</a></td>
                <td><a href="#">{{ $surat->tanggal }}</a></td>
                <td><a href="#">{{ $surat->nama }}</a></td>
                <td><a href="#">{{ $surat->perihal }}</a></td>
                <td><a href="#">{{ $surat->tujuan }}</a></td>
                <td><a href="#">{{ $surat->jenis_surat }}</a></td>
                <td><a href="#">{{ $surat->keterangan }}</a></td>
                <td><a href="#">{{ $surat->no_surat }}</a></td>
                <td><a href="#">{{ $surat->user->name }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="intro-y flex flex-col mt-4">
        {!! $surathm->links('pagination') !!}
    </div>
</div>

<h2 class="intro-y text-lg font-medium mt-10">KEPEGAWAIAN (KP)</h2>
    <br>
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Surat</th>
                <th class="whitespace-nowrap">Tanggal</th>
                <th class="whitespace-nowrap">Nama</th>
                <th class="whitespace-nowrap">Perihal</th>
                <th class="whitespace-nowrap">Tujuan</th>
                <th class="whitespace-nowrap">Jenis Surat</th>
                <th class="whitespace-nowrap">Keterangan</th>
                <th class="whitespace-nowrap">Nomor Surat</th>
                <th class="whitespace-nowrap">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratkp as $surat)
            <tr class="intro-x image-fit zoom-in">
               
                <td><a href="#">{{ $surat->id }}</a></td>
                <td><a href="#">{{ $surat->j_surat }}</a></td>
                <td><a href="#">{{ $surat->tanggal }}</a></td>
                <td><a href="#">{{ $surat->nama }}</a></td>
                <td><a href="#">{{ $surat->perihal }}</a></td>
                <td><a href="#">{{ $surat->tujuan }}</a></td>
                <td><a href="#">{{ $surat->jenis_surat }}</a></td>
                <td><a href="#">{{ $surat->keterangan }}</a></td>
                <td><a href="#">{{ $surat->no_surat }}</a></td>
                <td><a href="#">{{ $surat->user->name }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="intro-y flex flex-col mt-4">
        {!! $suratkp->links('pagination') !!}
    </div>
</div>

<h2 class="intro-y text-lg font-medium mt-10">KETATAUSAHAAN DAN KERUMAHTANGGAAN (RT)</h2>
    <br>
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Surat</th>
                <th class="whitespace-nowrap">Tanggal</th>
                <th class="whitespace-nowrap">Nama</th>
                <th class="whitespace-nowrap">Perihal</th>
                <th class="whitespace-nowrap">Tujuan</th>
                <th class="whitespace-nowrap">Jenis Surat</th>
                <th class="whitespace-nowrap">Keterangan</th>
                <th class="whitespace-nowrap">Nomor Surat</th>
                <th class="whitespace-nowrap">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratrt as $surat)
            <tr class="intro-x image-fit zoom-in">
               
                <td><a href="#">{{ $surat->id }}</a></td>
                <td><a href="#">{{ $surat->j_surat }}</a></td>
                <td><a href="#">{{ $surat->tanggal }}</a></td>
                <td><a href="#">{{ $surat->nama }}</a></td>
                <td><a href="#">{{ $surat->perihal }}</a></td>
                <td><a href="#">{{ $surat->tujuan }}</a></td>
                <td><a href="#">{{ $surat->jenis_surat }}</a></td>
                <td><a href="#">{{ $surat->keterangan }}</a></td>
                <td><a href="#">{{ $surat->no_surat }}</a></td>
                <td><a href="#">{{ $surat->user->name }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="intro-y flex flex-col mt-4">
        {!! $suratrt->links('pagination') !!}
    </div>
</div>



<h2 class="intro-y text-lg font-medium mt-10">TEKNOLOGI INFORMASI (TI)</h2>
    <br>
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Surat</th>
                <th class="whitespace-nowrap">Tanggal</th>
                <th class="whitespace-nowrap">Nama</th>
                <th class="whitespace-nowrap">Perihal</th>
                <th class="whitespace-nowrap">Tujuan</th>
                <th class="whitespace-nowrap">Jenis Surat</th>
                <th class="whitespace-nowrap">Keterangan</th>
                <th class="whitespace-nowrap">Nomor Surat</th>
                <th class="whitespace-nowrap">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratti as $surat)
            <tr class="intro-x image-fit zoom-in">
               
                <td><a href="#">{{ $surat->id }}</a></td>
                <td><a href="#">{{ $surat->j_surat }}</a></td>
                <td><a href="#">{{ $surat->tanggal }}</a></td>
                <td><a href="#">{{ $surat->nama }}</a></td>
                <td><a href="#">{{ $surat->perihal }}</a></td>
                <td><a href="#">{{ $surat->tujuan }}</a></td>
                <td><a href="#">{{ $surat->jenis_surat }}</a></td>
                <td><a href="#">{{ $surat->keterangan }}</a></td>
                <td><a href="#">{{ $surat->no_surat }}</a></td>
                <td><a href="#">{{ $surat->user->name }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="intro-y flex flex-col mt-4">
        {!! $suratti->links('pagination') !!}
    </div>
</div>

<h2 class="intro-y text-lg font-medium mt-10">PENGAWASAN (PW)</h2>
    <br>
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Surat</th>
                <th class="whitespace-nowrap">Tanggal</th>
                <th class="whitespace-nowrap">Nama</th>
                <th class="whitespace-nowrap">Perihal</th>
                <th class="whitespace-nowrap">Tujuan</th>
                <th class="whitespace-nowrap">Jenis Surat</th>
                <th class="whitespace-nowrap">Keterangan</th>
                <th class="whitespace-nowrap">Nomor Surat</th>
                <th class="whitespace-nowrap">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratpw as $surat)
            <tr class="intro-x image-fit zoom-in">
               
                <td><a href="#">{{ $surat->id }}</a></td>
                <td><a href="#">{{ $surat->j_surat }}</a></td>
                <td><a href="#">{{ $surat->tanggal }}</a></td>
                <td><a href="#">{{ $surat->nama }}</a></td>
                <td><a href="#">{{ $surat->perihal }}</a></td>
                <td><a href="#">{{ $surat->tujuan }}</a></td>
                <td><a href="#">{{ $surat->jenis_surat }}</a></td>
                <td><a href="#">{{ $surat->keterangan }}</a></td>
                <td><a href="#">{{ $surat->no_surat }}</a></td>
                <td><a href="#">{{ $surat->user->name }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="intro-y flex flex-col mt-4">
        {!! $suratpw->links('pagination') !!}
    </div>
</div>

@endsection

@section('script')


@endsection
