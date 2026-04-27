<!-- Menambahkan sticky, backdrop-blur, dan shadow halus -->
<nav x-data="{ open: false }" class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md sticky top-0 z-50 border-b border-indigo-50 dark:border-indigo-900/30 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group transition hover:scale-105 duration-300">
                        <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" class="block h-10 w-auto fill-current text-indigo-600 dark:text-indigo-400">
                            <path d="M32 12L4 24L32 36L60 24L32 12Z" fill="currentColor" />
                            <path d="M12 28V40C12 40 18 46 32 46C46 46 52 40 52 40V28" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                            <path d="M54 24V34" stroke="currentColor" stroke-width="3" stroke-linecap="round" fill="none" />
                            <circle cx="54" cy="36" r="3" fill="currentColor" />
                            <path d="M22 52H42" stroke="currentColor" stroke-width="3" stroke-linecap="round" />
                        </svg>

                        <div class="flex flex-col leading-tight">
                            <span class="text-lg font-bold tracking-tighter text-gray-900 dark:text-white group-hover:text-indigo-600 transition">
                                PMB <span class="text-indigo-600 dark:text-indigo-400">ONLINE</span>
                            </span>
                            <span class="text-[10px] uppercase tracking-widest text-gray-500 dark:text-gray-400 font-semibold">
                                Universitas Tertutup
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-sm font-medium transition-colors duration-200">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <!-- MENU KHUSUS ADMIN -->
                    @if(Auth::user()->role === 'admin')
                        <x-nav-link :href="route('admin.pendaftaran')" :active="request()->routeIs('admin.pendaftaran')" class="text-sm font-medium transition-colors duration-200">
                            {{ __('Data Pendaftaran') }}
                        </x-nav-link>
                    @endif

                    <!-- MENU FORM PENDAFTARAN -->
                    {{-- Muncul hanya jika Admin ATAU User yang BELUM mengisi pendaftaran --}}
                    @if(Auth::user()->role === 'admin' || !Auth::user()->pendaftaran)
                        <x-nav-link :href="route('pendaftaran.create')" :active="request()->routeIs('pendaftaran.create')" class="text-sm font-medium transition-colors duration-200">
                            {{ __('Form Pendaftaran') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Label Role -->
                <span class="me-3 px-2 py-1 text-[10px] font-bold uppercase rounded bg-gray-100 dark:bg-gray-800 text-gray-500">
                    {{ Auth::user()->role }}
                </span>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-indigo-100 dark:border-indigo-900/50 text-sm leading-4 font-semibold rounded-xl text-indigo-700 dark:text-indigo-300 bg-indigo-50/50 dark:bg-indigo-900/20 hover:bg-indigo-100 dark:hover:bg-indigo-900/40 focus:outline-none transition ease-in-out duration-200">
                            <div class="flex items-center">
                                <span class="bg-indigo-200 dark:bg-indigo-800 rounded-full h-2 w-2 me-2 {{ Auth::user()->role === 'admin' ? 'animate-pulse' : '' }}"></span>
                                {{ Auth::user()->name }}
                            </div>
                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4 opacity-70" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="font-medium">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="text-red-600 dark:text-red-400 font-medium" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-indigo-500 hover:bg-indigo-50 dark:hover:bg-indigo-900/30 focus:outline-none transition duration-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white/50 dark:bg-gray-900/50 backdrop-blur-lg">
        <div class="pt-2 pb-3 space-y-1 px-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-xl">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if(Auth::user()->role === 'admin')
                <x-responsive-nav-link :href="route('admin.pendaftaran')" :active="request()->routeIs('admin.pendaftaran')" class="rounded-xl">
                    {{ __('Data Pendaftaran (Admin)') }}
                </x-responsive-nav-link>
            @endif

            {{-- Responsive Form Link --}}
            @if(Auth::user()->role === 'admin' || !Auth::user()->pendaftaran)
                <x-responsive-nav-link :href="route('pendaftaran.create')" :active="request()->routeIs('pendaftaran.create')" class="rounded-xl">
                    {{ __('Form Pendaftaran') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-indigo-100 dark:border-indigo-900/30">
            <div class="px-4 flex items-center gap-3">
                <div class="h-10 w-10 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold shadow-indigo-200 shadow-lg">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-bold text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-xs text-indigo-500 uppercase tracking-widest">{{ Auth::user()->role }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1 px-2 pb-4">
                <x-responsive-nav-link :href="route('profile.edit')" class="rounded-xl font-medium">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="rounded-xl text-red-600 dark:text-red-400 font-medium" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>