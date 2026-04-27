<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Panel Utama Admin</h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            
            {{-- Barisan Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-xs font-bold text-gray-400 uppercase">Total Pendaftar</p>
                    <p class="text-3xl font-black text-indigo-600">{{ $total_pendaftar }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-xs font-bold text-gray-400 uppercase">Masuk Hari Ini</p>
                    <p class="text-3xl font-black text-green-500">{{ $pendaftar_hari_ini }}</p>
                </div>
            </div>

            {{-- Tabel Pendaftar Terbaru --}}
            <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
                <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                    <h3 class="font-bold text-gray-700">5 Pendaftar Terbaru</h3>
                    <a href="{{ route('admin.pendaftaran') }}" class="text-xs text-indigo-600 font-bold hover:underline">LIHAT SEMUA →</a>
                </div>
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-[10px] uppercase text-gray-500 font-bold">
                        <tr>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Provinsi</th>
                            <th class="px-6 py-3">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-sm">
                        @foreach($pendaftar_terbaru as $p)
                        <tr>
                            <td class="px-6 py-4 font-medium">{{ $p->nama }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $p->provinsi->nama ?? '-' }}</td>
                            <td class="px-6 py-4 text-gray-400 text-xs">{{ $p->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>