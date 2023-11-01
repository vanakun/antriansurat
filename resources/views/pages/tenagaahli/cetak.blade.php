@extends('layout.main')

@section('content')
    <div class="flex overflow-hidden">
        <!-- BEGIN: Content -->
        <div class="content">
        @yield('subcontent')
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Ketua Penanggung Jawab</h2>
                    <h2 class="font-medium text-base ml-auto">{{ $step->user->name }}</h2>
                </div>
            </div>

            {{-- Media --}}
            <div class="intro-y box mt-2">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Tahap: {{ $step->tahap }} {{ $step->nama }}</h2>
                </div>
                <div class="flex p-5">
                    @if($step->status == 1)
                        <div class="text-primary mr-2">
                            <i data-feather="check" class="w-5 h-5"></i>
                        </div>
                        <div class="font-medium whitespace-nowrap text-primary">Approved</div>
                    @elseif($step->status == 2)
                        <div class="text-yellow-500 mr-2">
                            <i data-loading-icon="tail-spin" class="w-5 h-5"></i>
                        </div>
                        <div class="font-medium whitespace-nowrap text-yellow-500">Waiting</div>
                    @elseif($step->status == 3)
                        <div class="text-red-500 mr-2">
                            <i data-feather="x" class="w-5 h-5"></i>
                        </div>
                        <div class="font-medium whitespace-nowrap text-red-500">Rejected</div>
                    @else
                        <div class="text-gray-500 mr-2">
                            <i data-feather="x" class="w-5 h-5"></i>
                        </div>
                        <div class="font-medium whitespace-nowrap text-gray-500">Unknown</div>
                    @endif
                </div>
                <div class="p-5">
                    <div>
                        Keterangan: {{ $step->keterangan }}
                    </div>
                </div>
                <div class="p-5">
                    <div>
                        Keterangan: {{ $step->keterangan }}
                    </div>
                </div>
            </div>

            {{-- Anggota --}}
            <div class="intro-y box mt-2">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Anggota Terlibat</h2>
                </div>
                <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                    <table class="table table-report -mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">No</th>
                                <th class="whitespace-nowrap">Nama</th>
                                <th class="whitespace-nowrap">Telefon</th>
                                <th class="whitespace-nowrap">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($experts as $index => $expert)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $expert->name }}</td>
                                <td>{{ $expert->phone !== null ? '0' . $expert->phone : '-' }}</td>
                                <td><a href="mailto:{{ $expert->email }}">{{ $expert->email }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>
@endsection