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
                <div class="intro-y box shadow col-span-10">
                  <div class="intro-x p-5">
                      <div class="text-lg font-medium mr-auto">
                          Change Password
                          <div class="mt-3 border-b border-gray-300"></div>
                      </div>
                        @if(session('error'))
                            <div class="alert alert-danger text-white">
                                {{ session('error') }}
                            </div>
                            <script>
                                setTimeout(function() {
                                    document.querySelector('.alert').style.display = 'none';
                                }, 4000);
                            </script>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success text-white">
                                {{ session('success') }}
                                <button class="close" data-dismiss="alert">x</button>
                            </div>
                            <script>
                                setTimeout(function() {
                                    document.querySelector('.alert').style.display = 'none';
                                }, 4000);
                            </script>
                        @endif
                      <form action="{{ route('update-password', $user->id) }}" method="POST">
                          @csrf
                          <div class="flex gap-6">
                              <div class="w-full">
                                  <div class="intro-x mt-4">
                                      <label for="old_password">Old Password</label>
                                      <input type="password" name="old_password" id="old_password" class="form-control mt-1">
                                  </div>
                                  @if($errors->has('old_password'))
                                      <div class="error-message">{{ $errors->first('old_password') }}</div>
                                  @endif
                                  <div class="intro-x mt-4">
                                      <label for="password">New Password</label>
                                      <input type="password" name="password" id="password" class="form-control mt-1">
                                    </div>
                                    <div class="intro-x mt-4">
                                        <label for="password_confirmation">Confirmation Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control mt-1">
                                        @error('password')
                                            <div class="text-primary">{{ $message }}</div>
                                        @enderror
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

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Tambahkan event listener untuk validasi panjang password
            document.getElementById('password').addEventListener("input", function() {
                var password = this.value;
                if (password.length < 8) {
                    this.setCustomValidity("Password must be at least 8 characters long.");
                } else {
                    this.setCustomValidity('');
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Ambil elemen tombol "Edit" dan "Simpan"
            const editButton = document.getElementById('chnage-email');
            const saveButton = document.getElementById('save-button');
            
            // Ambil elemen-elemen input yang ingin diubah
            const inputElements = document.querySelectorAll('.hidden-input');

            // Buat variabel untuk melacak status edit
            let isEditing = false;

            // Tambahkan event listener pada tombol "Edit"
            editButton.addEventListener('click', function (e) {
                e.preventDefault();

                // Toggle status edit
                isEditing = !isEditing;

                // Iterasi melalui input dan ubah properti disabled
                inputElements.forEach(function (input) {
                    input.disabled = !isEditing;
                });

                // Toggle tampilan tombol "Simpan"
                if (isEditing) {
                    saveButton.classList.remove('hidden');
                } else {
                    saveButton.classList.add('hidden');
                }
            });
        });
    </script>


@endsection

