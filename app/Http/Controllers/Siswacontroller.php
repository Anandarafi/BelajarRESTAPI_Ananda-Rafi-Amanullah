<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiswaModel;
use App\PrestasiModel;
use Illuminate\Support\Facade\Validator;
use Auth;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = SiswaModel::get();
        $arr_data=array();
        foreach ($siswa as $siswa){
            $prestasi=PrestasiModel::where('id_siswa',$siswa->id_siswa)->get();
            $arr_prestasi=array();
            foreach($prestasi as $prestasi){
                $arr_prestasi[]=array(
                    'nama_prestasi'=>$prestasi->nama_prestasi,
                    'juara'=>$prestasi->juara,
                );
            }
            $arr_data[]=array(
                'id_siswa'=> $siswa->id_siswa,
                'nama_siswa'=> $siswa->nama_siswa,
                'tanggal_lahir'=> $siswa->tanggal_lahir,
                'gender'=> $siswa->gender,
                'alamat'=> $siswa->alamat,
                'prestasi'=> $arr_prestasi,
            );
        }
        return Response()->json($arr_data);
    }
    public function create(Request $request){
        $siswa = new SiswaModel;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->gender = $request->gender;
        $siswa->alamat = $request->alamat;
        $siswa->save();

        return "DATA BERHASIL DITAMBAH";
    }
    public function update($id,Request $request)
    {
        $nama_siswa = $request->nama_siswa;
        $tanggal_lahir = $request->tanggal_lahir;
        $gender = $request->gender;
        $alamat = $request->alamat;

        $siswa = SiswaModel::find($id);
        $siswa->nama_siswa = $nama_siswa;
        $siswa->tanggal_lahir = $tanggal_lahir;
        $siswa->gender = $gender;
        $siswa->alamat = $alamat;
        $siswa->save();

        return "DATA BERHASIL di UPDATE";
    }
    public function delete($id)
    {
        $siswa = SiswaModel::find($id);
        $siswa->delete();

        return "DATA BERHASIL di HAPUS";
    }
}
