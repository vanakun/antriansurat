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
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">Settings</h2>
            </div>

            <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-2">
                    <div class="box shadow">
                        <ul>
                            <li class="intro-x py-4 px-6 border-b border-gray-300 items-center">
                                <a href="{{ route('setting', $user->id ) }}" class="hover:text-blue-700">
                                    <div class="flex flex-row items-center">
                                        <div><i data-feather="settings" class="w-5 h-5 mr-2"></i></div>
                                        Personal Information
                                    </div>
                                </a>
                            </li>
                            <li class="intro-x py-4 px-6 border-b border-gray-300 items-center">
                                <a href="/profile" class="hover:text-blue-700">
                                    <div class="flex flex-row items-center">
                                        <div><i data-feather="activity" class="w-5 h-5 mr-2"></i></div>
                                        Account Setting
                                    </div>
                                </a>
                            </li>
                            <li class="intro-x py-4 px-6 border-b border-gray-300 items-center">
                                <a href="/settings" class="hover:text-blue-700">
                                    <div class="flex flex-row items-center">
                                        <div><i data-feather="lock" class="w-5 h-5 mr-2"></i></div>
                                        Change Password
                                    </div>
                                </a>
                            </li>
                            <li class="intro-x py-4 px-6 border-b border-gray-300 items-center">
                                <a href="/settings" class="hover:text-red-700">
                                    <div class="flex flex-row items-center">
                                        <div><i data-feather="log-out" class="w-5 h-5 mr-2"></i></div>
                                        Logout
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="intro-y box shadow col-span-10">
                    <div class="intro-x p-5 ">
                        <div class="text-lg font-medium mr-auto ">
                            Display Information
                            <div class="mt-3 border-b border-gray-300"></div>
                        </div>
                        <div class="flex gap-6">
                            <div class="w-1/2">
                                <div class="intro-x mt-4">
                                    <label for="">Nama</label>
                                    <input type="text" name="" value="{{ $user->name }}" class="form-control" id="nama" disabled>
                                </div>
                                <div class="intro-x mt-4">
                                    <label for="">Email</label>
                                    <input type="text" name=""  value="{{ $user->email }}" class="form-control" id="nama" disabled>
                                </div>
                                <div class="intro-x mt-4">
                                    <label for="">Phone</label>
                                    <input type="text" name="" value="{{ $user->phone ? $user->phone : '-' }}" class="form-control" id="nama" disabled>
                                </div>
                            </div>
                            <div class="w-1/2">
                                <div class="intro-x mt-4">
                                    <label for="">Jabatan</label>
                                    <input type="text" name="" value="{{ $user->role }}" class="form-control" id="nama" disabled>
                                </div>
                                <div class="intro-x mt-4">
                                    <label for="">Gender</label>
                                    <input type="text" name="" value="{{ ucfirst($user->gender) }}" class="form-control" id="nama" disabled>
                                </div>
                                <div class="intro-x mt-4">
                                    <label for="">Di buat</label>
                                    <input type="text" name="" value="{{ $user->created_at->format('Y-m-d') }}" class="form-control" id="nama" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="intro-y flex gap-6 mt-5">
                <div class="intro-y box shadow flex-auto w-72">
                    <div>
                        <ul>
                            <li class="intro-x py-4 px-6 border-b border-gray-300 items-center">
                                <a href="/home" class="">
                                Personal Information
                                </a>
                            </li>
                            <li class="intro-x py-4 px-6 border-b border-gray-300 items-center">
                                <a href="/profile" class="">
                                Account Setting
                                </a>
                            </li>
                            <li class="intro-x py-4 px-6 border-b border-gray-300 items-center">
                                <a href="/settings" class="">
                                Change Password
                                </a>
                            </li>
                            <li class="intro-x py-4 px-6 border-b border-gray-300 items-center">
                                <a href="/settings" class="">
                                Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="intro-y box shadow flex-1">
                    <div class="intro-y m-4">
                    asdasd
                    </div>
                </div>
            </div> -->
        </div>
        <!-- END: Content -->
    </div>
@endsection
