<x-guest-layout>
    <!-- Header Form -->
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            Daftar Akun Mahasiswa Baru
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
            Silakan lengkapi data di bawah untuk memulai pendaftaran.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full" 
                            type="text" name="name" 
                            :value="old('name')" 
                            placeholder="Masukkan nama sesuai ijazah"
                            required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Alamat Email')" />
            <x-text-input id="email" class="block mt-1 w-full" 
                            type="email" name="email" 
                            :value="old('email')" 
                            placeholder="contoh@email.com"
                            required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <p class="text-[10px] text-gray-500 mt-1 italic">*Pastikan email aktif untuk menerima informasi kelulusan.</p>
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Kata Sandi')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="Minimal 8 karakter"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" 
                            placeholder="Ulangi kata sandi"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center py-3 text-base uppercase tracking-widest bg-indigo-600 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800 transition">
                {{ __('Buat Akun Sekarang') }}
            </x-primary-button>
        </div>

        <div class="text-center mt-4">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Sudah punya akun? 
                <a class="font-bold text-indigo-600 dark:text-indigo-400 hover:underline" href="{{ route('login') }}">
                    Masuk di sini
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>