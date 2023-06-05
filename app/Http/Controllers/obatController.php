<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ObatModel;

class obatController extends Controller
{
    // public function index(){
    //     $obat = obatModel::all();
    //     return view('pages.#obat.obat',compact('obat'));
    // }

    public function index(){
        $data = array(
            "obat" => obatModel::all(),
        );
        return view('pages.#obat.obat',$data);
    }
    
    //Tambah Data
    public function create(){
        return view('pages.#obat.tambahObat');
    }

    public function store(Request $request)
    {
        obatModel::create($request->all());
        return redirect('/obat');
    }
    //Data
    public function delete($kode_obat ){
        $obat = obatModel::where('kode_obat', $kode_obat );
        $obat->delete();

        return redirect('/obat');
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
