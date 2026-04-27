<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard Pendaftar</h2>
    </x-slot>

    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                
                @if($pendaftaran)
                    {{-- Tampilan jika SUDAH daftar --}}
                    <div class="mb-4 text-green-500">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold">Terima Kasih, {{ auth()->user()->name }}!</h3>
                    <p class="text-gray-500">Data pendaftaran Anda sudah kami terima.</p>
                    <div class="mt-4 p-4 bg-gray-50 rounded-lg inline-block text-left">
                        <p class="text-sm"><strong>Nama:</strong> {{ $pendaftaran->nama }}</p>
                        <p class="text-sm"><strong>Status:</strong> <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs">Dalam Verifikasi</span></p>
                    </div>
                @else
                    {{-- Tampilan jika BELUM daftar --}}
                    <h3 class="text-lg font-bold">Selamat Datang, {{ auth()->user()->name }}!</h3>
                    <p class="mt-2 text-gray-600">Anda belum mengisi formulir pendaftaran. Silakan klik tombol di bawah untuk mendaftar.</p>
                    <div class="mt-6">
                        <a href="{{ route('pendaftaran.create') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-bold hover:bg-indigo-700 transition">
                            Mulai Pendaftaran
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>