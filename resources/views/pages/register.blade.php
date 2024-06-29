@extends('../layout/' . $layout)

@section('subhead')
    <title>Upload Surat - Tinker - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <div class="container sm:px-10">
        <h1 class="text-2xl font-bold text-center xl:text-left mt-6">User Registration</h1>
        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col xl:flex-row items-center justify-center my-10 xl:my-0">
            @csrf
            <div class="bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
             
                <div class="intro-x mt-2 text-slate-400 dark:text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                <div class="intro-x mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <input type="text" name="name" id="name" class="intro-x login__input form-control py-3 px-4 block w-full sm:w-auto" placeholder="Fullname">
                    <input type="text" name="email" id="email" class="intro-x login__input form-control py-3 px-4 block mt-4 sm:mt-0 w-full sm:w-auto" placeholder="Email">
                    <input type="text" name="phone" id="phone" class="intro-x login__input form-control py-3 px-4 block mt-4 sm:mt-0 w-full sm:w-auto" placeholder="Phone">
                    <input type="password" name="password" id="password" class="intro-x login__input form-control py-3 px-4 block mt-4 sm:mt-0 w-full sm:w-auto" placeholder="Password">
                    <div class="intro-x w-full grid grid-cols-12 gap-1 h-1 mt-3" id="passwordStrengthIndicator">
                        <div class="col-span-3 h-full rounded bg-slate-100 dark:bg-darkmode-800"></div>
                        <div class="col-span-3 h-full rounded bg-slate-100 dark:bg-darkmode-800"></div>
                        <div class="col-span-3 h-full rounded bg-slate-100 dark:bg-darkmode-800"></div>
                        <div class="col-span-3 h-full rounded bg-slate-100 dark:bg-darkmode-800"></div>
                    </div>
                    <div id="passwordStrengthText" class="intro-x text-white block mt-2 text-xs sm:text-sm"></div>
                    <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4 sm:mt-0 w-full sm:w-auto" id="confirmPassword" placeholder="Password Confirmation">
                    <div id="passwordMismatchMessage" class="text-white text-sm mt-2 hidden">Password confirmation does not match.</div>
                </div>
                <div class="intro-x flex items-center text-slate-600 dark:text-slate-500 mt-4 text-xs sm:text-sm">
                    <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                    <label class="cursor-pointer select-none text-black" for="remember-me">I agree to the Envato</label>
                    <a class="text-primary dark:text-slate-200 ml-1" href="">Privacy Policy</a>.
                </div>
                <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                    <button type="submit" id="registerButton" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Register User</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById("registerButton").addEventListener("click", function () {
            // Mendapatkan nilai password dan konfirmasi password
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;

            // Memeriksa apakah password dan konfirmasi password cocok
            if (password !== confirmPassword) {
                // Jika tidak cocok, tampilkan pesan kesalahan
                document.getElementById("passwordMismatchMessage").classList.remove("hidden");

                // Sembunyikan pesan kesalahan dalam 5 detik
                setTimeout(function () {
                    document.getElementById("passwordMismatchMessage").classList.add("hidden");
                }, 4000); // 5000 milidetik (5 detik)

                return; // Hentikan proses registrasi
            }

            // Jika cocok, lanjutkan proses registrasi
            // ... (kode untuk registrasi)
        });
    </script>
    <script>
    document.getElementById("password").addEventListener("input", function () {
        const password = this.value;
        const passwordStrengthIndicator = document.getElementById("passwordStrengthIndicator");
        const passwordStrengthText = document.getElementById("passwordStrengthText"); 
        const passwordContainsUppercase = /[A-Z]/.test(password);
        const passwordContainsDigit = /\d/.test(password);
        const passwordLength = password.length;
        const passwordContainsSpecialChar = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/.test(password);

        let strength = 0;
        if (passwordContainsUppercase) strength++;
        if (passwordContainsDigit) strength++;
        if (passwordLength >= 8) strength++;
        if (passwordContainsSpecialChar) strength++;

        const indicatorItems = passwordStrengthIndicator.querySelectorAll("div");
        for (let i = 0; i < indicatorItems.length; i++) {
            if (i < strength) {
                indicatorItems[i].classList.add("bg-success");
                indicatorItems[i].classList.remove("bg-slate-100", "dark:bg-darkmode-800");
            } else {
                indicatorItems[i].classList.remove("bg-success");
                indicatorItems[i].classList.add("bg-slate-100", "dark:bg-darkmode-800");
            }
        }

        let strengthText = "Weak password";
        if (strength >= 2) {
            strengthText = "Medium password";
        }
        if (strength >= 3) {
            strengthText = "Strong password";
        }
        passwordStrengthText.textContent = strengthText;
        if (password === "") {
            passwordStrengthText.textContent = "";
        }
    });
    </script>
@endsection
