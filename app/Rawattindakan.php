<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rawattindakan extends Model
{
    protected $table = 'rawat_tindakan';
    public $timestamps = false;

    public function scopeSearch($query, $s)
    {
        return $query->where('no_tindakan', 'like', '%' . $s. '%')
                    ->orWhere('tgl_tindakan', 'like', '%' . $s. '%' )
                    ->orWhere('no_rawat', 'like', '%' . $s. '%' )
                    ->orWhere('kd_tindakan', 'like', '%' . $s. '%' )
                    ->orWhere('id_dokter', 'like', '%' . $s. '%' )
                    ->orWhere('keterangan', 'like', '%' . $s. '%' )
                    ->orWhere('id_petugas', 'like', '%' . $s. '%' );
    }
    public function rawat()
    {
        return $this->belongsTo('App\Rawatpasien', 'no_rawat', 'no_rawat');
    }

    public function tindakan()
    {
        return $this->belongsTo('App\Tindakan', 'kd_tindakan', 'kd_tindakan');
    }

    public function dokter()
    {
        return $this->belongsTo('App\Dokter', 'id_dokter', 'id_dokter');
    }

    public function petugas()
    {
        return $this->belongsTo('App\Petugas', 'id_petugas', 'id');
    }

}
