<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Arahkan berdasarkan role
        if ($user->role === 'admin') {
            return $this->adminDashboard();
        }

        return $this->userDashboard($user);
    }

    /**
     * Logika untuk Dashboard Admin
     */
    private function adminDashboard()
    {
        // Statistik untuk Admin
        $data = [
            'total_pendaftar' => Pendaftaran::count(),
            'pendaftar_hari_ini' => Pendaftaran::whereDate('created_at', today())->count(),
            'pendaftar_terbaru' => Pendaftaran::with(['provinsi'])->latest()->take(5)->get(),
            // Anda bisa tambah statistik lain di sini (misal: pendaftar per gender)
        ];

        return view('admin.dashboard', $data);
    }

    /**
     * Logika untuk Dashboard User
     */
    private function userDashboard($user)
    {
        // Ambil data pendaftaran milik user yang sedang login
        // Pastikan relasi 'pendaftaran' sudah ada di model User
        $pendaftaran = $user->pendaftaran;

        return view('dashboard', compact('pendaftaran'));
    }
}