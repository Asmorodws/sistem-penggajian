<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $listJabatan;

    public function __construct()
    {

        $this->listJabatan = Jabatan::latest()->get();
    }


    public function index()
    {

        return view('jabatan.index', ['datas' => $this->listJabatan]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.create', ['listJabatan' => $this->listJabatan]);
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
            'nama_jabatan' => 'required',
            'bonus' => 'required',
            'pph' => 'required',
            'gaji_pokok' => 'required',
        ]);


        Jabatan::create($request->post());

        return redirect('jabatan')->with('success', 'Data berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        return view('jabatan.edit', ['data' => $jabatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'nama_jabatan' => 'required',
            'bonus' => 'required',
            'pph' => 'required',
            'gaji_pokok' => 'required',
        ]);

        $jabatan->fill($request->post())->save();
        return redirect('jabatan')->with('success', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        //
        $jabatan->delete();
        return redirect('jabatan')->with('success', 'Data berhasil di hapus');
    }

    public function delete($id)
    {
        $datas = Jabatan::find($id);

        return view('jabatan.delete', compact('datas'));
    }
}