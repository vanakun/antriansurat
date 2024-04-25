@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - Tinker - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    @include('../layout/components/mobile-menu')
    <div class="flex overflow-hidden">
        <!-- BEGIN: Content -->
        <div class="content">
        <h2 class="intro-y text-lg font-medium mt-10">Antrian Surat Pengawasan Pemilu (PM)</h2>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <!-- BEGIN: Data List -->
                <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                    <h2 class="intro-y text-lg font-medium mt-10">Waiting</h2>
                    <br>
                    <table class="table table-report -mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">#</th>
                                <th class="whitespace-nowrap">status</th>
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
                                <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                                        <div class="font-medium whitespace-nowrap">{{ $surat->id }}</div>
                                    </a>
                                </td>
                                <!-- Other columns -->
                                <td>
                                    <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                                        <div class="font-medium whitespace-nowrap">{{ $surat->status }}</div>
                                    </a>
                                </td>
                                <!-- Other columns -->
                                <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->j_surat }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->tanggal }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->nama }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->perihal }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->tujuan }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->jenis_surat }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->keterangan }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->no_surat }}</div>
                        </a>
                    </td>
                   
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
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
                <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                    <h2 class="intro-y text-lg font-medium mt-10">Done</h2>
                    <br>
                    <table class="table table-report -mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">#</th>
                                <th class="whitespace-nowrap">status</th>
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
                            @foreach($suratPengawasanPemilusdone as $surat)
                            <tr class="intro-x image-fit zoom-in">
                                <td>
                                    <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                                        <div class="font-medium whitespace-nowrap">{{ $surat->id }}</div>
                                    </a>
                                </td>
                                <!-- Other columns -->
                                <td>
                                    <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                                        <div class="font-medium whitespace-nowrap">{{ $surat->status }}</div>
                                    </a>
                                </td>
                                <!-- Other columns -->
                                <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->j_surat }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->tanggal }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->nama }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->perihal }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->tujuan }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->jenis_surat }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->keterangan }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->no_surat }}</div>
                        </a>
                    </td>
                   
                    <td>
                        <a href="{{ route('editsuratpm', ['id' => $surat->id]) }}">
                            <div class="font-medium whitespace-nowrap">{{ $surat->user->name }}</div>
                        </a>
                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="intro-y flex flex-col mt-4">
                        {!! $suratPengawasanPemilusdone->links('pagination') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Any additional scripts -->
@endsection
