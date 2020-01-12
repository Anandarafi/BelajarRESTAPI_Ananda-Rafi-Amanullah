<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestasimodel extends Model
{
    protected $table='prestasi';
    protected $primaryKey='id_prestasi';
    public $timestamps=false;
    protected $fillable= [
        'nama_prestasi','juara','id_siswa',
    ];
}
