<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    public $timestamps = false;

    public function scopeSearch($query, $s)
    {
        return $query->where('no_daftar', 'like', '%' . $s. '%')
                    ->orWhere('nomor_rmk', 'like', '%' . $s. '%' )
                    ->orWhere('tgl_daftar', 'like', '%' . $s. '%' )
                    ->orWhere('keluhan', 'like', '%' . $s. '%' )
                    ->orWhere('kd_tindakan', 'like', '%' . $s. '%' )
                    ->orWhere('nomor_antri', 'like', '%' . $s. '%' )
                    ->orWhere('id_petugas', 'like', '%' . $s. '%' );
    }
    public function pasien()
    {
        return $this->belongsTo('App\Pasien', 'nomor_rmk', 'nomor_rmk');
    }

    public function tindakan()
    {
        return $this->belongsTo('App\Tindakan', 'kd_tindakan', 'kd_tindakan');
    }

    public function petugas()
    {
        return $this->belongsTo('App\Petugas', 'id_petugas', 'id');
    }

}
