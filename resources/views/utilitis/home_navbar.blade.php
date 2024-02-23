<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<nav x-data="{ open: false }" class="bg-gradient-to-r from-[#8BBBF8] to-[#A6B8DE] border-b border-gray-100 py-4 md:py-0">
    <div class="flex justify-between items-center w-[96%] mx-auto">
        <div class="flex items-center gap-6">
            <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-2xl cursor-pointer md:hidden "></ion-icon>
            <div class="font-extrabold text-gray-900">
                WEB APP
            </div>
        </div>

        <!-- Links -->
        <div class="nav-links md:static absolute bg-white md:bg-transparent md:min-h-fit min-h-[90%] left-0 top-[-100%] w-[12rem] md:w-auto flex px-5 py-5">
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

        <!-- Login button -->
        <div class="sm:flex sm:items-center sm:ms-6">
            <a href="{{route('login')}}"><button class="px-4 py-1.5 mr-4 bg-[#3D5FA4] rounded text-[#fff] font-bold hover:bg-[#073674] hover:text-[#F4F4F4]" >
            Login
            </button></a>
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