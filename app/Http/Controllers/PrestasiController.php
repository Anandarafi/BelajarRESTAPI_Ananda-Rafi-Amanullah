<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrestasiModel;
use Illuminate\Support\Facade\Validator;

class PrestasiController extends Controller
{
    public function index()
    {
        return PrestasiModel::all();
    }
    public function create(Request $request)
    {
        $prestasi = new PrestasiModel;
        $prestasi->nama_prestasi = $request->nama_prestasi;
        $prestasi->juara = $request->juara;
        $prestasi->save();

        return "DATA BERHASIL DITAMBAH";
    }
}
