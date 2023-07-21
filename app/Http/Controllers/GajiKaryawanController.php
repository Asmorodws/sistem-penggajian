<?php

namespace App\Http\Controllers;

use App\Exports\GajiKaryawanExport;
use App\Models\Karyawan;
use Database\Seeders\KaryawanSeeder;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GajiKaryawanController extends Controller
{
    protected $listGajiKaryawan;
    public function __construct()
    {
        $this->listGajiKaryawan = Karyawan::with('jabatan')->latest()->get();
    }
    public function index()
    {
        return view('gajikaryawan.index', ['datas' => $this->listGajiKaryawan]);
    }
    public function exportCSV($slug)
    {
        $data =  Karyawan::join('jabatans', 'karyawans.jabatan_id', '=', 'jabatans.id')->selectRaw(
            'karyawans.nama,
            jabatans.nama_jabatan,
            jabatans.gaji_pokok as gaji_pokok, 
            (jabatans.bonus / 100) * gaji_pokok as bonus, 
            ((jabatans.pph / 100) * (gaji_pokok + ((bonus / 100) * gaji_pokok))) as pph,
            (gaji_pokok + ((jabatans.bonus / 100) * gaji_pokok)) - ((jabatans.pph / 100) * (gaji_pokok + ((bonus / 100) * gaji_pokok))) as total'
        )->orderBy('karyawans.nama', 'ASC')->get();
        $time = Carbon::now()->format('M - Y');

        return Excel::download(new GajiKaryawanExport($data), 'Laporan gaji karyawan  (' . $time . ').' . $slug);
    }
    public function detail($id)
    {
        $data = Karyawan::find($id);

        return view('gajikaryawan.detail', ['data' => $data]);
    }
}