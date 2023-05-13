<?php

namespace App\Controllers;

use App\Models\Mahasiswa;

class DashboardController extends BaseController
{
    public function index()
    {
        echo $this->blade->run('admin.dashboard', [
            'totalMahasiswa' => Mahasiswa::count(),
            'LakiLaki' => Mahasiswa::where('gender', 'L')->count(),
            'Perempuan' => Mahasiswa::where('gender', 'P')->count(),
        ]);
    }
}
