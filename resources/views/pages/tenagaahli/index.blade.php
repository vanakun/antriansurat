@extends('../layout/main')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    @include('../layout/components/mobile-menu')
    <div class="flex overflow-hidden">
        <!-- BEGIN: Side Menu -->
            
       
        <!-- END: Side Menu -->

        <!-- BEGIN: Content -->
        <div class="content">
            @include('../layout/components/top-bar-tenagaahli')
            @yield('subcontent')
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">Blog Layout</h2>
            </div>
            <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                <!-- BEGIN: Blog Layout -->
                @foreach ($post as $index => $pos)
                    <div class="intro-y col-span-12 md:col-span-6 box">
                        <div class="h-[320px] before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black/90 before:to-black/10 image-fit">
                            <img alt="Tinker Tailwind HTML Admin Template" class="rounded-t-md" src="{{ asset('dist/poster_project/' . $pos->image) }}">
                            <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                                
                                <div class="ml-3 text-white mr-auto">
                                </div>
                                <div class="dropdown ml-3">
                                    <a href="javascript:;" class="bg-white/20 dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full" aria-expanded="false" data-tw-toggle="dropdown">
                                        <i data-feather="more-vertical" class="w-4 h-4 text-white"></i>
                                    </a>
                                    <div class="dropdown-menu w-40">
                                        <ul class="dropdown-content">
                                            <li>
                                                <a href="" class="dropdown-item">
                                                    <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit Post
                                                </a>
                                            </li>
                                            <li>
                                                <a href="" class="dropdown-item">
                                                    <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete Post
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
                                <span class="bg-white/20 px-2 py-1 rounded">Category {{$pos->lokasi}}</span>
                                <a href="" class="block font-medium text-xl mt-3">{{ $pos->nama }} </a>
                            </div>
                        </div>
                        <div class="p-5 text-slate-600 dark:text-slate-500">deskrip</div>
                        <div class="flex items-center px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400">
                            <a class="mr-auto flex items-center text-primary" href="{{ route('showProject', $pos->id) }}">
                                <div><i data-feather="eye" class="w-4 h-4"></i></div>
                                <div class="ml-1">View Details</div>
                            </a>
                            <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full text-primary bg-primary/10 dark:bg-darkmode-300 dark:text-slate-300 ml-auto tooltip" title="Share">
                                <i data-feather="share-2" class="w-3 h-3"></i>
                            </a>
                            <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-primary text-white ml-2 tooltip" title="Download PDF">
                                <i data-feather="share" class="w-3 h-3"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
                <!-- END: Blog Layout -->
            </div>
        </div>
        <!-- END: Content -->
    </div>
@endsection
