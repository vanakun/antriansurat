@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - Tinker - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="relative">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 xl:col-span-9 2xl:col-span-9 z-10">
                <div class="mt-6 -mb-6 intro-y">
                    <div class="alert alert-dismissible show box bg-primary text-white flex items-center mb-6" role="alert">
                        <span>
                            Smart Surat Bawaslu 
                        </span>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close">
                            <i data-feather="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
                
       
   
                <div class="mt-14 mb-3 grid grid-cols-12 sm:gap-10 intro-y">
    <!-- Row 1 -->
    
    <div class="col-span-12 lg:col-span-8 lg:col-span-8 py-6 sm:pl-5 lg:pl-1 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                <canvas id="suratDoughnutChart"></canvas>
                </div>
            </div>
        </div>
    </div>
                <!-- END: Official Store -->
    <div class="col-span-12 md:col-span-8 md:col-span-4 py-6 sm:pl-5 md:pl-1 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
        <div class="text-slate-500">No Surat PM Terakhir </div> <br>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirPM }}</div>
            <br>
            <br>
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratChart"></canvas>
                </div>
            </div>
            <br>
            <br>
            
            <br>
            <br>
           
           
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratChartpp"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat PP Terakhir </div>  <br>
            <div class="text-slate-500">{{ $noSuratTerakhirPP }}</div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratChartps"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat PS Terakhir  </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirPs }}</div>
        </div>
    </div>

    <!-- Row 2 -->
    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratChartpr"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat PR Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirPr }}</div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratChartot"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat OT Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirOt }}</div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratChartka"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat KA Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirKa }}</div>
        </div>
    </div>

    <!-- Row 3 -->
    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratChartku"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat KU Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirKu }}</div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratChartpl"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat PL Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirPl }}</div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratCharthk"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat HK Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirHk }}</div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratCharthm"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat HM Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirHm }}</div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratChartkp"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat KP Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirKp }}</div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratChartrt"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat RT Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirRt }}</div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratChartpw"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat PW Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirPw }}</div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratChartti"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat TI Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirTi }}</div>
        </div>
    </div>
    <!-- <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratCharthk"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat HK Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirHk }}</div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratCharthk"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat HK Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirHk }}</div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratCharthk"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat HK Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirHk }}</div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratCharthk"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat HK Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirHk }}</div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="container">
                    <canvas id="suratCharthk"></canvas>
                </div>
            </div>
            <br>
            <div class="text-slate-500">No Surat HK Terakhir </div>
            <br>
            <div class="text-slate-500">{{ $noSuratTerakhirHk }}</div>
        </div>
    </div>
    
</div> -->
        </div>
        <div class="report-box-4 w-full h-full grid grid-cols-12 gap-6 xl:absolute -mt-8 xl:mt-0 pb-6 xl:pb-0 top-0 right-0 z-30 xl:z-auto">
            <div class="col-span-12 xl:col-span-3 xl:col-start-10 xl:pb-16 z-30">
                <div class="h-full flex flex-col">
                    <div class="box p-5 mt-6 bg-primary intro-x">
                        <div class="flex flex-wrap gap-3">
                            <div class="mr-auto">
                                <div class="text-white text-opacity-70 dark:text-slate-300 flex items-center leading-3">
                                    Jumlah Surat Selesai
                                    <i data-feather="alert-circle" class="tooltip w-4 h-4 ml-1.5" title="Total value of surat done: {{ $totalSuratSelesai }}"></i>
                                </div>
                                <div class="text-white relative text-2xl font-medium leading-5 pl-4 mt-3.5">
                                    <span class="absolute text-xl top-0 left-0 -mt-1.5"></span> {{ $totalSuratSelesai }} Surat Selesai
                                </div>
                            </div>
                            <a class="flex items-center justify-center w-12 h-12 rounded-full bg-white dark:bg-darkmode-300 bg-opacity-20 hover:bg-opacity-30 text-white" href="{{ route('indexAntrian') }}">
                                <i data-feather="plus" class="w-6 h-6"></i>
                            </a>
                        </div>
                    </div>
                    <div class="report-box-4__content xl:min-h-0 intro-x">
                        <div class="max-h-full xl:overflow-y-auto box mt-5">
                            <div class="xl:sticky top-0 px-5 pt-5 pb-6">
                                <div class="flex items-center justify-between">
                                    <div class="text-lg font-medium truncate mr-5">Log Pengajuan Surat</div>
                                    <a href="" class="ml-auto flex items-center text-primary">
                                        <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Refresh
                                    </a>
                                </div>
                                <br>
                                <div class="flex items-center">
                                    <div class="bg-white w-full rounded shadow-md p-4">
                                        <ul>
                                            @foreach($logs as $log)
                                                <li class="border-b border-gray-200 py-3">
                                                    <div class="text-gray-800">{{ $log->user->name }}</div>
                                                    <div class="text-sm text-gray-600">{{ $log->surat->perihal }}</div>
                                                    <div class="text-xs text-gray-400">{{ class_basename($log->surat_type) }}</div>
                                                    <div class="text-xs text-gray-400">{{ $log->created_at }}</div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <br>
                                        {{ $logs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                    <div class="report-box-4__content xl:min-h-0 intro-x">
                        <div class="max-h-full xl:overflow-y-auto box mt-5">
                            <div class="xl:sticky top-0 px-5 pt-5 pb-6">
                                
                                <div class="flex items-center">
                               
                               
                                    <div class="text-lg font-medium truncate mr-5">Laporan</div>
                                   
                                    
                                   
                                    <a href="" class="ml-auto flex items-center text-primary">
                                        <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Refresh
                                    </a>
                                </div>
                              
                               
                                <ul
                                    class="
                                        nav
                                        nav-pills
                                        border
                                        border-slate-300
                                        dark:border-darkmode-300
                                        border-dashed
                                        rounded-md
                                        mx-auto
                                        p-1
                                        mt-5
                                    "
                                    role="tablist"
                                >
                                    <li id="weekly-report-tab" class="nav-item flex-1" role="presentation">
                                        <button
                                            class="nav-link w-full py-1.5 px-2 active"
                                            data-tw-toggle="pill"
                                            data-tw-target="#weekly-report"
                                            type="button"
                                            role="tab"
                                            aria-controls="weekly-report"
                                            aria-selected="true"
                                        >
                                            Details
                                        </button>
                                    </li>

                                </ul>
                                <br>
                                <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <button class="btn box flex items-center text-slate-600 dark:text-slate-300">
                                        <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                                    </button>
                                    <button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300">
                                        <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF
                                    </button>
                                </div>
                            </div>
                            
                            <div class="tab-content px-5 pb-5">
                            
                                <div class="tab-pane active grid grid-cols-12 gap-y-6" id="weekly-report" role="tabpanel" aria-labelledby="weekly-report-tab">
                                    
                                <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                    
                                      
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                        <div class="text-slate-500">No Surat PM Terakhir</div>
                                        <div class="mt-1.5 flex items-center">
                                            <div class="text-lg">{{ $noSuratTerakhirPM }}</div>
                                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="Total Surat PM yang selesai {{ $totalSuratPM }}">
                                            <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                        <div class="text-slate-500">No Surat PP Terakhir</div>
                                        <div class="mt-1.5 flex items-center">
                                            <div class="text-lg">{{ $noSuratTerakhirPP }}</div>
                                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="Total Surat PP yang selesai {{ $totalSuratPP }}">
                                            <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                        <div class="text-slate-500">No Surat PS Terakhir</div>
                                        <div class="mt-1.5 flex items-center">
                                            <div class="text-lg">{{ $noSuratTerakhirPs }}</div>
                                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="Total Surat PS yang selesai {{ $totalSuratPS }}">
                                                <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                        <div class="text-slate-500">No Surat PR Terakhir</div>
                                        <div class="mt-1.5 flex items-center">
                                            <div class="text-lg">{{ $noSuratTerakhirPr }}</div>
                                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="Total Surat PR yang selesai {{ $totalSuratPR }}">
                                                <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                        <div class="text-slate-500">No Surat OT Terakhir</div>
                                        <div class="mt-1.5 flex items-center">
                                            <div class="text-lg">{{ $noSuratTerakhirOt }}</div>
                                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="Total Surat OT yang selesai {{ $totalSuratOT }}">
                                                <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                        <div class="text-slate-500">No Surat KA Terakhir</div>
                                        <div class="mt-1.5 flex items-center">
                                            <div class="text-lg">{{ $noSuratTerakhirKa }}</div>
                                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="Total Surat KA yang selesai {{ $totalSuratKA }}">
                                                <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                        <div class="text-slate-500">No Surat KU Terakhir</div>
                                        <div class="mt-1.5 flex items-center">
                                            <div class="text-lg">{{ $noSuratTerakhirKu }}</div>
                                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="Total Surat KU yang selesai {{ $totalSuratKA }}">
                                                <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                        <div class="text-slate-500">No Surat PL Terakhir</div>
                                        <div class="mt-1.5 flex items-center">
                                            <div class="text-lg">{{ $noSuratTerakhirPl }}</div>
                                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="Total Surat PL yang selesai {{ $totalSuratPL }}">
                                                <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                        <div class="text-slate-500">No Surat HK Terakhir</div>
                                        <div class="mt-1.5 flex items-center">
                                            <div class="text-lg">{{ $noSuratTerakhirHk }}</div>
                                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="Total Surat HK yang selesai {{ $totalSuratHK }}">
                                                <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                        <div class="text-slate-500">No Surat HM Terakhir</div>
                                        <div class="mt-1.5 flex items-center">
                                            <div class="text-lg">{{ $noSuratTerakhirHm }}</div>
                                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="Total Surat HM yang selesai {{ $totalSuratHM }}">
                                                <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                        <div class="text-slate-500">No Surat KP Terakhir</div>
                                        <div class="mt-1.5 flex items-center">
                                            <div class="text-lg">{{ $noSuratTerakhirKp }}</div>
                                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="Total Surat KP yang selesai {{ $totalSuratKP }}">
                                                <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                        <div class="text-slate-500">No Surat RT Terakhir</div>
                                        <div class="mt-1.5 flex items-center">
                                            <div class="text-lg">{{ $noSuratTerakhirRt }}</div>
                                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="Total Surat RT yang selesai {{ $totalSuratRT }}">
                                                <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                        <div class="text-slate-500">No Surat PW Terakhir</div>
                                        <div class="mt-1.5 flex items-center">
                                            <div class="text-lg">{{ $noSuratTerakhirPw }}</div>
                                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="Total Surat PW yang selesai {{ $totalSuratPW }}">
                                                <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-12">
                                        <div class="text-slate-500">No Surat TI Terakhir</div>
                                        <div class="mt-1.5 flex items-center">
                                            <div class="text-lg">{{ $noSuratTerakhirTi }}</div>
                                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="Total Surat TI yang selesai {{ $totalSuratPW }}">
                                                <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <button class="btn btn-outline-secondary col-span-12 border-slate-300 dark:border-darkmode-300 border-dashed relative justify-start mb-2">
                                        <div class="truncate mr-5">My Portfolio Details</div>
                                        <span class="w-8 h-8 absolute flex justify-center items-center right-0 top-0 bottom-0 my-auto ml-auto mr-0.5">
                                            <i data-feather="arrow-right" class="w-4 h-4"></i>
                                        </span>
                                    </button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
                
                    
       
                    
                </div>
            </div>
        </div>
    </div>
    
    <script>
        var ctx = document.getElementById('suratChart').getContext('2d');
        var suratChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($statusespm),
                datasets: [{
                    label: 'Total Surat (PM)',
                    data: @json($totalspm),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Green background
                    borderColor: 'rgba(91, 173, 128, 1)', 
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
    var ctx = document.getElementById('suratChartpp').getContext('2d');
    var suratChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($statusespp),
            datasets: [{
                label: 'Total Surat (PP)',
                data: @json($totalspp),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Green background
                borderColor: 'rgba(91, 173, 128, 1)',        // Green border
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

     <script>
        var ctx = document.getElementById('suratChartps').getContext('2d');
        var suratChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($statusesps),
                datasets: [{
                    label: 'Total Surat (PS)',
                    data: @json($totalsps),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Green background
                    borderColor: 'rgba(91, 173, 128, 1)', 
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('suratChartpr').getContext('2d');
        var suratChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($statusespr),
                datasets: [{
                    label: 'Total Surat (PR)',
                    data: @json($totalspr),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Green background
                    borderColor: 'rgba(91, 173, 128, 1)',  
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('suratChartot').getContext('2d');
        var suratChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($statusesot),
                datasets: [{
                    label: 'Total Surat (OT)',
                    data: @json($totalsot),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Green background
                    borderColor: 'rgba(91, 173, 128, 1)', 
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('suratChartka').getContext('2d');
        var suratChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($statuseska),
                datasets: [{
                    label: 'Total Surat (KA)',
                    data: @json($totalska),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Green background
                    borderColor: 'rgba(91, 173, 128, 1)', 
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('suratChartku').getContext('2d');
        var suratChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($statusesku),
                datasets: [{
                    label: 'Total Surat (KU)',
                    data: @json($totalsku),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Green background
                    borderColor: 'rgba(91, 173, 128, 1)', 
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('suratChartpl').getContext('2d');
        var suratChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($statusespl),
                datasets: [{
                    label: 'Total Surat (PL)',
                    data: @json($totalspl),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Green background
                    borderColor: 'rgba(91, 173, 128, 1)', 
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('suratCharthk').getContext('2d');
        var suratChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($statuseshk),
                datasets: [{
                    label: 'Total Surat (HK)',
                    data: @json($totalshk),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Green background
                    borderColor: 'rgba(91, 173, 128, 1)', 
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        var ctx = document.getElementById('suratCharthm').getContext('2d');
        var suratChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($statuseshm),
                datasets: [{
                    label: 'Total Surat (HM)',
                    data: @json($totalshm),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Green background
                    borderColor: 'rgba(91, 173, 128, 1)', 
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('suratChartkp').getContext('2d');
        var suratChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($statuseskp),
                datasets: [{
                    label: 'Total Surat (KP)',
                    data: @json($totalskp),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Green background
                    borderColor: 'rgba(91, 173, 128, 1)', 
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('suratChartrt').getContext('2d');
        var suratChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($statusesrt),
                datasets: [{
                    label: 'Total Surat (RT)',
                    data: @json($totalsrt),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Green background
                    borderColor: 'rgba(91, 173, 128, 1)', 
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('suratChartpw').getContext('2d');
        var suratChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($statusespw),
                datasets: [{
                    label: 'Total Surat (PW)',
                    data: @json($totalspw),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Green background
                    borderColor: 'rgba(91, 173, 128, 1)', 
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('suratChartti').getContext('2d');
        var suratChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($statusesti),
                datasets: [{
                    label: 'Total Surat (TI)',
                    data: @json($totalsti),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Green background
                    borderColor: 'rgba(91, 173, 128, 1)', 
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('suratDoughnutChart').getContext('2d');

            const suratData = {
                labels: [
                    'TI',
                    'PW',
                    'RT',
                    'KP',
                    'HM',
                    'HK',
                    'PL',
                    'KU',
                    'KA',
                    'OT',
                    'PS',
                    'PR',
                    'PP',
                    'PM'
                ],
                datasets: [{
                    data: [
                        {{ $totalSuratTI }},
                        {{ $totalSuratPW }},
                        {{ $totalSuratRT }},
                        {{ $totalSuratKP }},
                        {{ $totalSuratHM }},
                        {{ $totalSuratHK }},
                        {{ $totalSuratPL }},
                        {{ $totalSuratKU }},
                        {{ $totalSuratKA }},
                        {{ $totalSuratOT }},
                        {{ $totalSuratPS }},
                        {{ $totalSuratPR }},
                        {{ $totalSuratPP }},
                        {{ $totalSuratPM }}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 2
                }]
            };

            const doughnutChart = new Chart(ctx, {
                type: 'doughnut',
                data: suratData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                        },
                        title: {
                            display: true,
                            text: 'Surat Completion Status'
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    const label = suratData.labels[context.dataIndex];
                                    const value = suratData.datasets[0].data[context.dataIndex];
                                    return `${label} Yang Sudah Selesai: ${value} Surat`;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>


<script>
        function setClock() {
            const now = new Date();
            const seconds = now.getSeconds();
            const minutes = now.getMinutes();
            const hours = now.getHours();
            
            const secondDegrees = ((seconds / 60) * 360) + 90;
            const minuteDegrees = ((minutes / 60) * 360) + ((seconds / 60) * 6) + 90;
            const hourDegrees = ((hours / 12) * 360) + ((minutes / 60) * 30) + 90;
            
            document.getElementById('second').style.transform = `rotate(${secondDegrees}deg)`;
            document.getElementById('minute').style.transform = `rotate(${minuteDegrees}deg)`;
            document.getElementById('hour').style.transform = `rotate(${hourDegrees}deg)`;
        }

        setInterval(setClock, 1000);
        setClock(); // initial call to set the clock to the current time
    </script>


@endsection
