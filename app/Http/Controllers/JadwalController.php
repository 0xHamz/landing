<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = DB::table('jadwal')->orderBy('tanggal_berangkat', 'asc')->get();
        return view('admin.jadwal', compact('jadwals'));
    }
}
