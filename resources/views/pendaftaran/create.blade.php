<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Form Pendaftaran Mahasiswa
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto bg-white shadow rounded-lg p-6">

            {{-- SUCCESS --}}
            @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
            @endif

            {{-- ERROR --}}
            @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('pendaftaran.store') }}" enctype="multipart/form-data">
                @csrf

                <h3 class="font-bold text-lg mb-4">Data Pribadi</h3>

                <!-- Nama -->
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border rounded px-3 py-2">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2">
                </div>

                <!-- No HP -->
                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" class="w-full border rounded px-3 py-2">
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label>Alamat KTP</label>
                    <textarea name="alamat_ktp" class="w-full border rounded px-3 py-2">{{ old('alamat_ktp') }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Alamat Sekarang</label>
                    <textarea name="alamat_sekarang" class="w-full border rounded px-3 py-2">{{ old('alamat_sekarang') }}</textarea>
                </div>

                <!-- WILAYAH -->
                <div class="grid grid-cols-3 gap-3 mb-3">

                    <select id="provinsi" name="provinsi_id" class="border rounded px-3 py-2">
                        <option value="">Pilih Provinsi</option>
                        @foreach($provinsi as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>

                    <select id="kabupaten" name="kabupaten_id" class="border rounded px-3 py-2">
                        <option value="">Pilih Kabupaten</option>
                    </select>

                    <select id="kecamatan" name="kecamatan_id" class="border rounded px-3 py-2">
                        <option value="">Pilih Kecamatan</option>
                    </select>

                </div>

                <!-- Kontak -->
                <div class="grid grid-cols-2 gap-3 mb-3">
                    <input type="text" name="telp" placeholder="Telepon" class="border rounded px-3 py-2">
                    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="border rounded px-3 py-2">
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="w-full border rounded px-3 py-2">
                </div>

                <!-- Kewarganegaraan -->
                <div class="mb-3">
                    <label>Kewarganegaraan</label>
                    <select name="kewarganegaraan" class="w-full border rounded px-3 py-2">
                        <option value="">-- pilih --</option>
                        <option value="WNI Asli">WNI Asli</option>
                        <option value="WNI Keturunan">WNI Keturunan</option>
                        <option value="WNA">WNA</option>
                    </select>
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-3">
                    <label>Jenis Kelamin</label><br>
                    <input type="radio" name="jenis_kelamin" value="Pria"> Pria
                    <input type="radio" name="jenis_kelamin" value="Wanita" class="ml-3"> Wanita
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label>Status</label><br>
                    <input type="radio" name="status" value="Belum menikah"> Belum menikah
                    <input type="radio" name="status" value="Menikah" class="ml-3"> Menikah
                    <input type="radio" name="status" value="Lain-lain (janda/duda)" class="ml-3"> Lain-lain (janda/duda)
                </div>

                <!-- Agama -->
                <div class="mb-3">
                    <label class="block font-semibold mb-2">Agama</label>
                    <div class="flex flex-wrap gap-4 p-2 border rounded bg-gray-50">
                        @foreach($agamas as $agama)
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio"
                                name="agama_id"
                                value="{{ $agama->id }}"
                                {{ old('agama_id') == $agama->id ? 'checked' : '' }}
                                class="form-radio text-blue-600">
                            <span class="ml-2">{{ $agama->nama }}</span>
                        </label>
                        @endforeach
                    </div>
                    @error('agama_id')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Foto -->
                <div class="mb-3">
                    <label>Upload Foto</label>
                    <input type="file" name="foto" class="w-full">
                </div>

                <!-- Submit -->
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Daftar
                </button>

            </form>
        </div>
    </div>

    {{-- JS --}}
    <script>
        // VALIDASI NO HP
        document.getElementById("no_hp").addEventListener("input", function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // PROVINSI -> KABUPATEN
        document.getElementById('provinsi').addEventListener('change', function() {
            let id = this.value;

            fetch('/kabupaten/' + id)
                .then(res => res.json())
                .then(data => {
                    let kab = document.getElementById('kabupaten');
                    kab.innerHTML = '<option value="">Pilih Kabupaten</option>';

                    data.forEach(item => {
                        kab.innerHTML += `<option value="${item.id}">${item.nama}</option>`;
                    });

                    document.getElementById('kecamatan').innerHTML = '<option value="">Pilih Kecamatan</option>';
                });
        });

        // KABUPATEN -> KECAMATAN
        document.getElementById('kabupaten').addEventListener('change', function() {
            let id = this.value;

            fetch('/kecamatan/' + id)
                .then(res => res.json())
                .then(data => {
                    let kec = document.getElementById('kecamatan');
                    kec.innerHTML = '<option value="">Pilih Kecamatan</option>';

                    data.forEach(item => {
                        kec.innerHTML += `<option value="${item.id}">${item.nama}</option>`;
                    });
                });
        });
    </script>
</x-app-layout>