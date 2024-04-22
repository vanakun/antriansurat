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
            @yield('subcontent')
            <div class="box">
                <div class=" items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Detail</h2>
                </div>
                <div class="flex gap-4">
                    <div class="intro-y text-center w-1/2 p-5">
                        <img alt="proyek_img" class="h-auto w-full rounded-md mx-auto zoom-in" width="" src="{{ asset('dist/poster_project/' . $project->image) }}">
                    </div>
                    <div class="intro-y w-1/2">
                        <!-- <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">Detail</h2>
                        </div> -->
                        <div id="" class="p-5">
                            <div class="preview">
                                <div class="form-inline">
                                    <label for="" class="form-label">Nama</label>
                                    <input id="" type="text" class="form-control" value="{{ $project->nama ?? '' }}" readonly>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="" class="form-label">Lokasi</label>
                                    <input id="" type="text" class="form-control" value="{{ $project->lokasi  ?? ''}}" readonly>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="" class="form-label">Dibuat</label>
                                    <input id="" type="text" class="form-control" value="{{ $project->created_at->format('d F Y') }}" readonly>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="" class="form-label">Status</label>
                                    <input id="" type="text" class="form-control {{ $project ?? ''->status === 'active' ? 'text-success' : 'text-danger' }}" value="{{ ucfirst($project->status ?? '') }}" readonly>
                                </div>
                                <div class="form-inline mt-5">
                                    <a href="{{ route('cetakPDF', ['project_id' => $project->id]) }}" class="btn btn-primary" target="_blank">Generate PDF for All Steps</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tahap --}}
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Tahap</h2>
                </div>
                <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                    <table class="table table-report -mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">Tahap</th>
                                <th class="whitespace-nowrap">Nama</th>
                                <th class="whitespace-nowrap">Keterangan</th>
                                <th class="whitespace-nowrap">Ketua</th>
                                <th class="whitespace-nowrap">Status</th>
                                <th class="whitespace-nowrap">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (!empty($steps))
                            @foreach ($steps as $index => $step)
                            <tr class="intro-x image-fit zoom-in">
                                <td>
                                    <a href="{{ route('stepProject', $step->id) }}">
                                        <div class="font-medium whitespace-nowrap ml-3">{{ $step->tahap }}</div>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('stepProject', $step->id) }}">
                                        <div class="flex items-center">
                                            <div class="font-medium whitespace-nowrap">{{ $step->nama }}</div>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('stepProject', $step->id) }}">
                                        <div class="flex items-center">
                                            <div class="font-medium whitespace-nowrap">{{ $step->keterangan }}</div>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('stepProject', $step->id) }}">
                                        <div class="flex items-center">
                                            <div class="font-medium whitespace-nowrap">{{ $step->user->name }}</div>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('stepProject', $step->id) }}">
                                        <div class="flex items-center">
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
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('pdf', $step->id)}}" class="flex items-center" target="_blank">
                                        <div class="p-2 flex items-center justify-center rounded-full">
                                            <i data-feather="printer" class="w-5 h-5 tooltip" title="Cetak PDF"></i>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <p>Tidak ada langkah-langkah tersedia.</p>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>
@endsection
