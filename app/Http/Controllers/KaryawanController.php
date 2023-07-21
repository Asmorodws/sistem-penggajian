<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;



class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $listKaryawan, $listJabatan;

    public function __construct()
    {
        $this->listKaryawan = Karyawan::with('jabatan')->latest()->get();
        $this->listJabatan = Jabatan::get();
    }


    public function index()
    {
        // $datas = Karyawan::with('jabatan')->latest()->get();
        return view('karyawan.index', ['datas' => $this->listKaryawan]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create', ['listJabatan' => $this->listJabatan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jabatan_id' => 'required'
        ]);

        // $karyawan = new Karyawan();
        // $karyawan->nama = $request->nama;
        // $karyawan->alamat = $request->alamat;
        // $karyawan->tanggal_lahir = $request->tanggal_lahir;
        // $karyawan->tempat_lahir = $request->tempat_lahir;
        // $karyawan->jabatan_id = $request->jabatan_id;

        // $karyawan->save();

        Karyawan::create($request->post());

        return redirect('karyawan')->with('success', 'Data berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', ['data' => $karyawan, 'listJabatan' => $this->listJabatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jabatan_id' => 'required'
        ]);

        $karyawan->fill($request->post())->save();
        return redirect('karyawan')->with('success', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        //
        $karyawan->delete();
        return redirect('karyawan')->with('success', 'Data berhasil di hapus');
    }

    public function delete($id)
    {
        $datas = Karyawan::find($id);

        return view('karyawan.delete', compact('datas'));
    }
}