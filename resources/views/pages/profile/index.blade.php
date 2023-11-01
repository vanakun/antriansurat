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
            <!-- BEGIN: Main Color Switcher-->
            <div class="shadow-md fixed bottom-0 right-0 box border rounded-full h-12 px-5 flex items-center justify-center z-50 mb-10 mr-52">
                <div class="mr-4 hidden sm:block text-slate-600 dark:text-slate-200">Color Scheme</div>
                <a href="{{ route('color-scheme-switcher', ['color_scheme' => 'default']) }}" class="block w-8 h-8 cursor-pointer bg-emerald-900 rounded-full border-4 mr-1 hover:border-slate-200 {{ $color_scheme =='default' ? 'border-slate-300 dark:border-darkmode-800/80' : 'border-white dark:border-darkmode-600' }}"></a>
                <a href="{{ route('color-scheme-switcher', ['color_scheme' => 'theme-1']) }}" class="block w-8 h-8 cursor-pointer bg-blue-800 rounded-full border-4 mr-1 hover:border-slate-200 {{ $color_scheme =='theme-1' ? 'border-slate-300 dark:border-darkmode-800/80' : 'border-white dark:border-darkmode-600' }}"></a>
                <a href="{{ route('color-scheme-switcher', ['color_scheme' => 'theme-2']) }}" class="block w-8 h-8 cursor-pointer bg-blue-900 rounded-full border-4 mr-1 hover:border-slate-200 {{ $color_scheme =='theme-2' ? 'border-slate-300 dark:border-darkmode-800/80' : 'border-white dark:border-darkmode-600' }}"></a>
                <a href="{{ route('color-scheme-switcher', ['color_scheme' => 'theme-3']) }}" class="block w-8 h-8 cursor-pointer bg-cyan-900 rounded-full border-4 mr-1 hover:border-slate-200 {{ $color_scheme =='theme-3' ? 'border-slate-300 dark:border-darkmode-800/80' : 'border-white dark:border-darkmode-600' }}"></a>
                <a href="{{ route('color-scheme-switcher', ['color_scheme' => 'theme-4']) }}" class="block w-8 h-8 cursor-pointer bg-indigo-900 rounded-full border-4 hover:border-slate-200 {{ $color_scheme =='theme-4' ? 'border-slate-300 dark:border-darkmode-800/80' : 'border-white dark:border-darkmode-600' }}"></a>
            </div>
            <!-- END: Main Color Switcher-->
            <!-- BEGIN: Dark Mode Switcher-->
            <div data-url="{{ route('dark-mode-switcher') }}" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
                <div class="mr-4 text-slate-600 dark:text-slate-200">Dark Mode</div>
                <div class="dark-mode-switcher__toggle {{ $dark_mode ? 'dark-mode-switcher__toggle--active' : '' }} border"></div>
            </div>
            <!-- END: Dark Mode Switcher-->
            <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                @include('../pages/profile/sidemenu-setting')
                <div class="intro-x box shadow col-span-10">
                    <div class="intro-x p-5">
                        <div class="text-lg font-medium flex items-center">
                            <span>Display Information</span>
                            <a href="#" id="edit-button" class="ml-auto mr-3 text-blue-500 hover:text-blue-700">
                                <i data-feather="edit" class="w-5 h-5 ml-2"></i>
                            </a>
                        </div>
                        <div class="mt-3 border-b border-gray-300"></div>
                        <form action="{{ route('update-account', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="flex gap-6">
                                <div class="w-1/2">
                                    <div class="intro-x mt-4">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="hidden-input form-control mt-1" id="name" disabled>
                                    </div>
                                    <div class="intro-x mt-4">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" value="{{ $user->email }}" class="form-control mt-1" id="email" disabled>
                                    </div>
                                    <div class="intro-x mt-4">
                                        <label for="phone">Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text mt-1">+62</span>
                                            <input type="text" name="phone" value="{{ $user->phone ? str_replace('+62', '', $user->phone) : '' }}" class="hidden-input form-control mt-1" id="phone" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2">
                                    <div class="intro-x mt-4">
                                        <label for="role">Jabatan</label>
                                        <input type="text" name="role" value="{{ $user->role }}" class="form-control mt-1" id="role" disabled>
                                    </div>
                                    <div class="intro-x mt-4">
                                        <label for="gender">Gender</label>
                                        <select name="gender" class="hidden-input form-select mt-1" id="gender" value="{{ $user->gender }}" disabled>
                                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                    <div class="intro-x mt-4">
                                        <label for="created_at">Di buat</label>
                                        <input type="text" name="created_at" value="{{ $user->created_at->format('Y-m-d') }}" class="form-control mt-1" id="created_at" disabled>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="save-button" class="btn btn-primary hidden shadow-md mt-4">
                                Save
                            </button>
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
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil elemen tombol "Edit" dan "Simpan"
        const editButton = document.getElementById('edit-button');
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

