<x-guest-layout>
    <!-- Header Form -->
    <div class="mb-6 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-100 dark:bg-indigo-900/30 rounded-full mb-4">
            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            Konfirmasi Keamanan
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2 px-4">
            {{ __('Ini adalah area aman. Silakan konfirmasi kata sandi Anda sebelum melanjutkan tindakan ini.') }}
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Kata Sandi')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="Masukkan sandi Anda"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-primary-button class="w-full justify-center py-3 bg-indigo-600 hover:bg-indigo-700 transition shadow-lg shadow-indigo-500/20">
                {{ __('Konfirmasi Sekarang') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>