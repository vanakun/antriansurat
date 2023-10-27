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
                @include('../profile/sidemenu-setting')
                <div class="intro-y box shadow col-span-10">
                  <div class="intro-x p-5">
                      <div class="text-lg font-medium mr-auto">
                          Change Password
                          <div class="mt-3 border-b border-gray-300"></div>
                      </div>
                      <form action="{{ route('update-password') }}" method="POST">
                          @csrf
                          <div class="flex gap-6">
                              <div class="w-full">
                                  <div class="intro-x mt-4">
                                      <label for="old_password">Old Password</label>
                                      <input type="password" name="old_password" id="old_password" class="form-control mt-1">
                                  </div>
                                  @if ($errors->has('old_password'))
                                      <div class="text-red-500">{{ $errors->first('old_password') }}</div>
                                  @endif
                                  <div class="intro-x mt-4">
                                      <label for="password">New Password</label>
                                      <input type="password" name="password" id="password" class="form-control mt-1">
                                  </div>
                                  <div class="intro-x mt-4">
                                      <label for="password_confirmation">Confirmation Password</label>
                                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control mt-1">
                                  </div>
                              </div>
                          </div>
                          <button type="submit" class="btn btn-primary mt-4">Change Password</button>
                      </form>
                  </div>
              </div>

            </div>
        </div>
        <!-- END: Content -->
    </div>
@endsection
