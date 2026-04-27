<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800 leading-tight">
                Edit Data: {{ $data->nama }}
            </h2>
            <a href="{{ route('admin.pendaftaran') }}" class="text-sm text-gray-500 hover:text-gray-700">← Kembali</a>
        </div>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden p-8">

            <form method="POST" action="{{ route('admin.pendaftaran.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- IDENTITAS DASAR --}}
                    <div class="space-y-4">
                        <h3 class="font-bold text-blue-600 border-b pb-2">Informasi Pribadi</h3>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama" value="{{ old('nama', $data->nama) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $data->tempat_lahir) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                {{-- Value harus "Pria" atau "Wanita" agar tidak kena truncate/terpotong --}}
                                <option value="Pria" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Pria' ? 'selected' : '' }}>Laki-laki (Pria)</option>
                                <option value="Wanita" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Wanita' ? 'selected' : '' }}>Perempuan (Wanita)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Agama</label>
                            <select name="agama_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @foreach($agamas as $agama)
                                <option value="{{ $agama->id }}" {{ $data->agama_id == $agama->id ? 'selected' : '' }}>{{ $agama->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <input type="text" name="status" value="{{ old('status', $data->status) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Contoh: Lajang / Menikah">
                        </div>
                    </div>

                    {{-- KONTAK & WILAYAH --}}
                    <div class="space-y-4">
                        <h3 class="font-bold text-blue-600 border-b pb-2">Kontak & Alamat</h3>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" value="{{ old('email', $data->email) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">No HP</label>
                                <input type="text" name="no_hp" value="{{ old('no_hp', $data->no_hp) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Telp Rumah</label>
                                <input type="text" name="telp" value="{{ old('telp', $data->telp) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Provinsi</label>
                            <select name="provinsi_id" id="provinsi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @foreach($provinsi as $p)
                                <option value="{{ $p->id }}" {{ $data->provinsi_id == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Kabupaten</label>
                                <select name="kabupaten_id" id="kabupaten" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="{{ $data->kabupaten_id }}">{{ $data->kabupaten->nama ?? 'Pilih Kabupaten' }}</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Kecamatan</label>
                                <select name="kecamatan_id" id="kecamatan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="{{ $data->kecamatan_id }}">{{ $data->kecamatan->nama ?? 'Pilih Kecamatan' }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6 border-t pt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Alamat KTP</label>
                        <textarea name="alamat_ktp" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('alamat_ktp', $data->alamat_ktp) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Alamat Sekarang</label>
                        <textarea name="alamat_sekarang" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('alamat_sekarang', $data->alamat_sekarang) }}</textarea>
                    </div>
                </div>

                <div class="mt-6 border-t pt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
                    <div class="flex items-center space-x-4">
                        @if($data->foto)
                        <img src="{{ asset('storage/'.$data->foto) }}" class="w-20 h-20 object-cover rounded border">
                        @endif
                        <input type="file" name="foto" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>
                    <p class="text-xs text-gray-400 mt-1 italic">*Kosongkan jika tidak ingin mengubah foto.</p>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md shadow-lg transition">
                        Simpan Perubahan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- SCRIPT AJAX WILAYAH --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#provinsi').on('change', function() {
                let id = $(this).val();
                $('#kabupaten').empty().append('<option value="">Memuat...</option>');
                $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');

                $.get('/kabupaten/' + id, function(data) {
                    $('#kabupaten').empty().append('<option value="">Pilih Kabupaten</option>');
                    $.each(data, function(key, val) {
                        $('#kabupaten').append('<option value="' + val.id + '">' + val.nama + '</option>');
                    });
                });
            });

            $('#kabupaten').on('change', function() {
                let id = $(this).val();
                $('#kecamatan').empty().append('<option value="">Memuat...</option>');

                $.get('/kecamatan/' + id, function(data) {
                    $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
                    $.each(data, function(key, val) {
                        $('#kecamatan').append('<option value="' + val.id + '">' + val.nama + '</option>');
                    });
                });
            });
        });
    </script>
</x-app-layout>