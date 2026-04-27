<x-guest-layout>
    <!-- Header Form -->
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            Masuk Portal PMB
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
            Silakan masuk untuk melanjutkan pendaftaran mahasiswa.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Alamat Email')" />
            <x-text-input id="email" class="block mt-1 w-full" 
                            type="email" name="email" 
                            :value="old('email')" 
                            placeholder="nama@email.com"
                            required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Kata Sandi')" />
                @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-indigo-600 dark:text-indigo-400 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Lupa sandi?') }}
                    </a>
                @endif
            </div>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-start">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ingat saya di perangkat ini') }}</span>
            </label>
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center py-3 text-base uppercase tracking-widest bg-indigo-600 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800 transition shadow-lg shadow-indigo-500/20">
                {{ __('Masuk Sekarang') }}
            </x-primary-button>
        </div>

        <!-- Link ke Register -->
        <div class="text-center mt-6">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Belum memiliki akun PMB? 
                <a class="font-bold text-indigo-600 dark:text-indigo-400 hover:underline" href="{{ route('register') }}">
                    Daftar Calon Mahasiswa
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>