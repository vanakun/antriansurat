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
                @include('../pages/profile/sidemenu-setting')
                <div class="intro-y col-span-10">
                    <div class="intro-x box shadow p-5">
                        <div class="text-lg font-medium mr-auto ">
                            Account
                            <div class="mt-3 border-b border-gray-300"></div>
                        </div>
                        <div class="flex gap-6">
                            <div class="w-full">
                                <div class="intro-x mt-4">
                                    <label for="">Email</label>
                                    <input type="text" name="" value="{{ $user->email }}" class="form-control mt-1" id="nama" disabled>
                                </div>
                                <div class="mt-5">
                                  <a href="" class="hover:text-blue-700">Request Email Change</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>
@endsection
