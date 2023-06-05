<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\tenagamedisModel;

class tenagamedisController extends Controller
{
    public function index(){
        $data = array(
            "tenagamedis" => tenagamedisModel::all(),
        );
        return view('pages.#tenagamedis.tenagamedis', $data);
    }
    //Tambah Data
    public function create(){
        return view('pages.#tenagamedis.tambahTenagaMedis');
    }

    public function store(Request $request)
    {
        tenagamedisModel::create($request->all());
        return redirect('/tenagamedis');
    }
    //Delete Data
    public function delete($id_tenagamedis){
        $tenagamedis = tenagamedisModel::where('id_tenagamedis', $id_tenagamedis);
        $tenagamedis->delete();

        return redirect('/tenagamedis');
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
