<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\pemeriksaanModel;

class pemeriksaanController extends Controller
{
    public function index(){
        $data = array(
            "pemeriksaan" => pemeriksaanModel::all(),
        );
        return view('pages.#pemeriksaan.pemeriksaan', $data);
    }
    //Tambah Data
    public function create(){
        return view('pages.#pemeriksaan.tambahPemeriksaan');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        pemeriksaanModel::create($request->all());
        return redirect('/pemeriksaan');
    }
    //Edit Data
    public function edit($id_dokter)
    {
        $data = [
            "data_dokter" =>dokter::find($id_dokter),
            "id_dokter" => $id_dokter,
            'pasien' => pasienModel::all()
        ];
        return view('pages.#dokter.tampilDokter',$data);
    }
    
    public function update(Request $request, string $id_dokter)
    {
        $data = [
            'id _dokter'=>$request->id_dokter,
            'kode_pasien'=>$request->kode_pasien,
            'Nama_Dokter'=>$request->Nama_Dokter,
            'Jadwal_Dokter'=>$request->Jadwal_Dokter,
            'Spesialis'=>$request->Spesialis,
        ];
        dokter::find($id_dokter)->update($data);

        return redirect()->route('dokter')->with('success', 'Data Berhasil Di Edit!');
    }
}