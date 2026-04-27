<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Agama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function index()
    {
        // Menggunakan pagination agar lebih ringan jika data banyak
        $data = Pendaftaran::with([
            'provinsi',
            'kabupaten',
            'kecamatan'
        ])->latest()->paginate(10);

        return view('admin.pendaftaran.index', compact('data'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin' && auth()->user()->pendaftaran) {
            return redirect()->route('dashboard')->with('error', 'Anda sudah melakukan pendaftaran.');
        }

        $provinsi = Provinsi::all();
        $agamas = Agama::all();
        return view('pendaftaran.create', compact('provinsi', 'agamas'));
    }

    public function edit($id)
    {
        $data = Pendaftaran::findOrFail($id);
        $provinsi = Provinsi::all();
        $agamas = Agama::all();

        // AMBIL DATA WILAYAH AGAR DROPDOWN TIDAK KOSONG SAAT LOAD
        $kabupatens = Kabupaten::where('provinsi_id', $data->provinsi_id)->get();
        $kecamatans = Kecamatan::where('kabupaten_id', $data->kabupaten_id)->get();

        return view('admin.pendaftaran.edit', compact('data', 'provinsi', 'agamas', 'kabupatens', 'kecamatans'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin' && auth()->user()->pendaftaran) {
            return redirect()->route('dashboard')->with('error', 'Anda sudah terdaftar.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
            'provinsi_id' => 'required',
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
            'alamat_ktp' => 'required',
            'alamat_sekarang' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi foto
        ]);

        $data = $request->only([
            'nama',
            'email',
            'no_hp',
            'alamat_ktp',
            'alamat_sekarang',
            'provinsi_id',
            'kabupaten_id',
            'kecamatan_id',
            'telp',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'jenis_kelamin',
            'status',
            'agama_id'
        ]);

        $data['user_id'] = auth()->id();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        Pendaftaran::create($data);

        // LOGIKA REDIRECT BERDASARKAN ROLE
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.pendaftaran')->with('success', 'Pendaftaran berhasil ditambahkan!');
        }

        return redirect()->route('dashboard')->with('success', 'Pendaftaran Anda berhasil dikirim!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);

        $input = $request->only([
            'nama',
            'email',
            'no_hp',
            'alamat_ktp',
            'alamat_sekarang',
            'provinsi_id',
            'kabupaten_id',
            'kecamatan_id',
            'telp',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'jenis_kelamin',
            'status',
            'agama_id'
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pendaftaran->foto) {
                Storage::disk('public')->delete($pendaftaran->foto);
            }
            $input['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $pendaftaran->update($input);

        return redirect()->route('admin.pendaftaran')
            ->with('success', 'Data pendaftaran berhasil diperbarui!');
    }

    // 🔥 AJAX KABUPATEN
    public function getKabupaten($id)
    {
        return Kabupaten::where('provinsi_id', $id)->get();
    }

    // 🔥 AJAX KECAMATAN
    public function getKecamatan($id)
    {
        return Kecamatan::where('kabupaten_id', $id)->get();
    }

    public function destroy($id)
    {
        $data = Pendaftaran::findOrFail($id);

        // Hapus file foto dari storage sebelum hapus data
        if ($data->foto) {
            Storage::disk('public')->delete($data->foto);
        }

        $data->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
