<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pasienModel;

class pasienController extends Controller
{
    //Tampil
    public function index(){
        $data = array(
            "pasien" => pasienModel::all(),
        );
        return view('pages.#pasien.pasien', $data);
    }

    //Tambah Data
    public function create(){
        return view('pages.#pasien.tambahPasien');
    }

    public function store(Request $request)
    {
        PasienModel::create($request->all());
        return redirect('/pasien');
    }
    //delete
    public function delete($kode_pasien){
        $pasien = pasienModel::where('kode_pasien', $kode_pasien);
        $pasien->delete();

        return redirect('/pasien');
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
