<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;

class WilayahSeeder extends Seeder
{
    public function run()
    {
        // Gunakan Transaction agar data aman jika terjadi error di tengah jalan
        DB::transaction(function () {
            
            $dataJabodetabek = [
                'DKI Jakarta' => [
                    'Jakarta Pusat' => ['Gambir', 'Tanah Abang', 'Menteng', 'Senen', 'Cempaka Putih', 'Johar Baru', 'Kemayoran', 'Sawah Besar'],
                    'Jakarta Utara' => ['Penjaringan', 'Tanjung Priok', 'Koja', 'Cilincing', 'Pademangan', 'Kelapa Gading'],
                    'Jakarta Barat' => ['Cengkareng', 'Grogol Petamburan', 'Kalideres', 'Kebon Jeruk', 'Kembangan', 'Palmerah', 'Taman Sari', 'Tambora'],
                    'Jakarta Selatan' => ['Kebayoran Baru', 'Kebayoran Lama', 'Pesanggrahan', 'Cilandak', 'Pasar Minggu', 'Jagakarsa', 'Mampang Prapatan', 'Pancoran', 'Tebet', 'Setiabudi'],
                    'Jakarta Timur' => ['Matraman', 'Pulo Gadung', 'Jatinegara', 'Duren Sawit', 'Kramat Jati', 'Makasar', 'Ciracas', 'Pasar Rebo', 'Cipayung', 'Cakung'],
                    'Kepulauan Seribu' => ['Kepulauan Seribu Utara', 'Kepulauan Seribu Selatan'],
                ],
                'Jawa Barat' => [
                    'Kota Bogor' => ['Bogor Barat', 'Bogor Selatan', 'Bogor Tengah', 'Bogor Timur', 'Bogor Utara', 'Tanah Sareal'],
                    'Kabupaten Bogor' => ['Cibinong', 'Gunung Putri', 'Citeureup', 'Babakan Madang', 'Sukaraja', 'Ciawi', 'Cisarua', 'Megamendung', 'Caringin', 'Cijeruk', 'Tamansari', 'Ciomas', 'Dramaga', 'Ciampea', 'Tenjolaya', 'Cibungbulang', 'Pamijahan', 'Leuwiliang', 'Leuwisadeng', 'Nanggung', 'Cigudeg', 'Sukajaya', 'Jasinga', 'Tenjo', 'Parung Panjang', 'Gunung Sindur', 'Rumpin', 'Cigombong', 'Ciseeng', 'Parung', 'Kemang', 'Rancabungur', 'Sukatani', 'Cariu', 'Sukamakmur', 'Jonggol', 'Cileungsi', 'Klapanunggal'],
                    'Kota Depok' => ['Pancoran Mas', 'Cimanggis', 'Sawangan', 'Limo', 'Sukmajaya', 'Beji', 'Cipayung', 'Cilodong', 'Tapos', 'Bojongsari', 'Cinere'],
                    'Kota Bekasi' => ['Bekasi Barat', 'Bekasi Timur', 'Bekasi Utara', 'Bekasi Selatan', 'Rawalumbu', 'Bantar Gebang', 'Pondok Gede', 'Jatiasih', 'Jatisampurna', 'Mustika Jaya', 'Medan Satria', 'Pondok Melati'],
                    'Kabupaten Bekasi' => ['Tarumajaya', 'Babelan', 'Sukawangi', 'Tambun Utara', 'Tambun Selatan', 'Cibitung', 'Cikarang Barat', 'Cikarang Pusat', 'Cikarang Selatan', 'Cikarang Utara', 'Cikarang Timur', 'Setu', 'Serang Baru', 'Cibarusah', 'Bojongmangu', 'Kedung Waringin', 'Pebayuran', 'Sukakarya', 'Sukatani', 'Muara Gembong', 'Cabangbungin'],
                ],
                'Banten' => [
                    'Kota Tangerang' => ['Tangerang', 'Jatiuwung', 'Batuceper', 'Benda', 'Ciledug', 'Cipondoh', 'Karawaci', 'Periuk', 'Pinang', 'Karang Tengah', 'Larangan', 'Neglasari', 'Cibodas'],
                    'Kota Tangerang Selatan' => ['Serpong', 'Serpong Utara', 'Ciputat', 'Ciputat Timur', 'Pondok Aren', 'Pamulang', 'Setu'],
                    'Kabupaten Tangerang' => ['Balaraja', 'Cikupa', 'Cisauk', 'Cisoka', 'Curug', 'Gunung Kaler', 'Jambe', 'Jayanti', 'Kelapa Dua', 'Kosambi', 'Kresek', 'Kronjo', 'Legok', 'Mauk', 'Mekarbaru', 'Pagedangan', 'Pakuhaji', 'Panongan', 'Pasarkemis', 'Rajeg', 'Sepatan', 'Sepatan Timur', 'Sindang Jaya', 'Solear', 'Sukadiri', 'Sukamulya', 'Teluknaga', 'Tigaraksa'],
                ]
            ];

            foreach ($dataJabodetabek as $namaProv => $kabupatens) {
                // 1. Insert Provinsi
                $provinsi = Provinsi::create(['nama' => $namaProv]);

                foreach ($kabupatens as $namaKab => $kecamatans) {
                    // 2. Insert Kabupaten
                    $kabupaten = Kabupaten::create([
                        'provinsi_id' => $provinsi->id,
                        'nama' => $namaKab
                    ]);

                    // 3. Persiapkan Data Kecamatan (Batch Insert)
                    $insertKecamatan = [];
                    foreach ($kecamatans as $namaKec) {
                        $insertKecamatan[] = [
                            'kabupaten_id' => $kabupaten->id,
                            'nama' => $namaKec,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    
                    // Insert sekaligus banyak agar ringan
                    Kecamatan::insert($insertKecamatan);
                }
            }
        });
    }
}