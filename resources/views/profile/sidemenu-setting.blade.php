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
                <a href="{{ route('accountSet', $user->id ) }}" class="hover:text-blue-700">
                    <div class="flex flex-row items-center">
                        <div><i data-feather="activity" class="w-5 h-5 mr-2"></i></div>
                        Account Setting
                    </div>
                </a>
            </li>
            <li class="intro-x py-4 px-6 border-b border-gray-300 items-center">
                <a href="{{ route('changePw', $user->id ) }}" class="hover:text-blue-700">
                    <div class="flex flex-row items-center">
                        <div><i data-feather="lock" class="w-5 h-5 mr-2"></i></div>
                        Change Password
                    </div>
                </a>
            </li>
            <li class="intro-x py-4 px-6 border-b border-gray-300 items-center">
                <a href="{{ route('logout') }}" class="hover:text-red-700">
                    <div class="flex flex-row items-center">
                        <div><i data-feather="log-out" class="w-5 h-5 mr-2"></i></div>
                        Logout
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>