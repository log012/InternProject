<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<nav x-data="{ open: false }" class="bg-gradient-to-r from-[#A6B8DE] to-[#8BBBF8] border-b border-gray-100 py-3 py-md-0">
    <div class="flex justify-between items-center w-[96%] mx-auto">
        <div class="flex items-center gap-6">
            <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-2xl cursor-pointer md:hidden "></ion-icon>
            <div class="font-extrabold text-gray-900">
                WEB APP
            </div>
        </div>

        <!-- Links -->
        <div id="background-change" class="nav-links md:static absolute bg-transparent md:min-h-fit min-h-[90%] left-0 top-[-100%] w-md-auto flex px-5 py-4">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                <li><x-nav-link :href="route('admin.home')" :active="request()->routeIs('admin.home')">
                        {{ __('Home') }}
                    </x-nav-link></li>

                <li><x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link></li>

                <li><x-nav-link :href="route('admin.developer')" :active="request()->routeIs('admin.developer')">
                        {{ __('Developers') }}
                    </x-nav-link></li>
            </ul>
        </div>

        <!-- Settings Dropdown -->
        <div class="sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>Name</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('admin.profile')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}"> <!-- route('logout') -->
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</nav>

<script>
    const navLinks = document.querySelector('.nav-links');
    // console.log(navLinks.classList.contains('top-[-100%]'));
    function onToggleMenu(e) {
        e.name = e.name === 'menu' ? 'close' : 'menu';
        navLinks.classList.toggle('top-[-100%]');
        navLinks.classList.toggle('top-[4.12rem]');
    }
</script>