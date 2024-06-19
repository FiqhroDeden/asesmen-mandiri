<div>
    <div class="navbar bg-base-100">
        <!-- Flex container -->
        <div class="flex-1 flex justify-between lg:justify-start items-center">
            <!-- Drawer button for mobile view -->
            <label for="my-drawer-2" class="btn btn-button drawer-button lg:hidden">
                <x-tabler-menu-2 />
            </label>
            <!-- Logo and title, centered on mobile view -->
            <a class="btn btn-ghost text-xl mx-auto lg:ml-0 lg:mr-auto">
                <img src="{{ asset('assets/logo-unpatti.png') }}" alt="Unpatti" width="40px">Asesmen Mandiri
            </a>
        </div>
        <!-- User dropdown -->
        <div class="flex-none gap-2">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="User Avatar" src="{{ asset('assets/avatar-blank.jpg') }}" />
                    </div>
                </div>
                <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                    <li class="menu-title">
                        <span>{{ Auth::user()->name }}</span>
                    </li>
                    {{-- <li>
                        <a class="justify-between">
                            Profile
                            <span class="badge">New</span>
                        </a>
                    </li>
                    <li><a>Settings</a></li> --}}
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>


    </div>
</div>
