<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapan';
    protected $fillable = ['id_pengaduan','tgl_tanggapan', 'tanggapan'];
    protected $primaryKey = 'id_tanggapan';

    public function pengaduan(){
        return $this->hasOne(Pengaduan::class, 'id_pengaduan', 'id_pengaduan');   
    }

    public function user(){
        return $this->hasMany('App\User','id');
    }
}
