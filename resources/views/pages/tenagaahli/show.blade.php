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
            <div class="intro-y text-center mt-5">
                <img alt="proyek_img" class="h-auto max-w-lg rounded-md mx-auto zoom-in" width="700" src="{{ asset('dist/poster_project/' . $project->image) }}">
            </div>
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Detail</h2>
                </div>
                <div id="" class="p-5">
                    <div class="preview">
                        <div class="form-inline">
                            <label for="" class="form-label sm:w-20">Nama</label>
                            <input id="" type="text" class="form-control" value="{{ $project->nama }}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="" class="form-label sm:w-20">Lokasi</label>
                            <input id="" type="text" class="form-control" value="{{ $project->lokasi }}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="" class="form-label sm:w-20">Dibuat</label>
                            <input id="" type="text" class="form-control" value="{{ $project->created_at->format('d F Y') }}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="" class="form-label sm:w-20">Status</label>
                            <input id="" type="text" class="form-control {{ $project->status === 'active' ? 'text-success' : 'text-danger' }}" value="{{ $project->status }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Tahap</h2>
                </div>
                <div id="" class="p-5 flex flex-col items-center">
                    <div class="preview">
                      <!-- <button class="btn btn-primary shadow-md mr-2"><a href="">Tambah Tahap</a></button> -->
                    </div>
                </div>
            </div>
            <div class="intro-y box mt-5">
              <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="text-lg font-medium ">{{$project->nama}}</h2>
              </div>
              
            </div>
        </div>
        <!-- END: Content -->
    </div>
@endsection
