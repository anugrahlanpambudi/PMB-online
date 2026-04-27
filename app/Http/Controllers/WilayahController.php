<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\WilayahImport;
use Maatwebsite\Excel\Facades\Excel;

class WilayahController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        // Proses import menggunakan class yang kita buat di Langkah 1
        Excel::import(new WilayahImport, $request->file('file'));

        return back()->with('success', 'Data Wilayah Berhasil Diimpor!');
    }
}