<x-app-layout>
    <x-slot name="header">
         <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800 leading-tight">
                {{ __('Data Pendaftar') }}
            </h2>
            <!-- TOMBOL TAMBAH -->
            <a href="{{ route('pendaftaran.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Pendaftar
            </a>
        </div>
        
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg overflow-hidden">
            
            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))
                <div class="m-4 p-3 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="p-3 text-xs font-semibold text-gray-600 uppercase w-12 text-center">No</th>
                            <th class="p-3 text-xs font-semibold text-gray-600 uppercase">Identitas</th>
                            <th class="p-3 text-xs font-semibold text-gray-600 uppercase text-center">Foto</th>
                            <th class="p-3 text-xs font-semibold text-gray-600 uppercase">Kontak</th>
                            <th class="p-3 text-xs font-semibold text-gray-600 uppercase">Wilayah & Alamat</th>
                            <th class="p-3 text-xs font-semibold text-gray-600 uppercase text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($data as $i => $d)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3 text-sm text-gray-500 text-center">{{ $i+1 }}</td>
                            
                            <td class="p-3">
                                <div class="font-bold text-gray-800 text-sm">{{ $d->nama }}</div>
                                <div class="text-xs text-gray-500">{{ $d->email }}</div>
                            </td>

                            <td class="p-3">
                                <div class="flex justify-center">
                                    @if($d->foto)
                                        <img src="{{ asset('storage/'.$d->foto) }}" 
                                             class="w-10 h-10 object-cover rounded-md border border-gray-200 shadow-sm">
                                    @else
                                        <div class="w-10 h-10 bg-gray-100 rounded-md flex items-center justify-center text-gray-400">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                            </td>

                            <td class="p-3 text-sm">
                                <span class="bg-blue-50 text-blue-700 px-2 py-1 rounded text-xs font-medium border border-blue-100">
                                    {{ $d->no_hp }}
                                </span>
                            </td>

                            <td class="p-3">
                                <div class="text-[11px] font-bold text-gray-600 uppercase leading-tight">
                                    {{ $d->provinsi->nama ?? '-' }}
                                </div>
                                <div class="text-[11px] text-gray-400">
                                    {{ $d->kabupaten->nama ?? '-' }}, {{ $d->kecamatan->nama ?? '-' }}
                                </div>
                                <div class="text-[10px] italic text-gray-500 truncate w-40">
                                    {{ $d->alamat_ktp ?? '-' }}
                                </div>
                            </td>

                            <td class="p-3 text-center">
                                <div class="flex justify-center space-x-1">
                                    <a href="{{ route('admin.pendaftaran.edit', $d->id) }}" 
                                       class="p-1.5 bg-yellow-50 text-yellow-600 rounded hover:bg-yellow-500 hover:text-white transition shadow-sm" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </a>

                                    <form action="{{ route('admin.pendaftaran.delete', $d->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Hapus data ini?')"
                                                class="p-1.5 bg-red-50 text-red-600 rounded hover:bg-red-500 hover:text-white transition shadow-sm" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-400 italic text-sm">
                                Belum ada data pendaftar.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            @if(method_exists($data, 'links'))
                <div class="p-4 border-t border-gray-100">
                    {{ $data->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>