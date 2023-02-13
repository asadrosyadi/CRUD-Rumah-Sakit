<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rawatobat extends Model
{
    protected $table = 'rawat_obat';
    public $timestamps = false;

    public function scopeSearch($query, $s)
    {
        return $query->where('no_rawat', 'like', '%' . $s. '%')
                    ->orWhere('tgl_obat', 'like', '%' . $s. '%' )
                    ->orWhere('kd_obat', 'like', '%' . $s. '%' )
                    ->orWhere('aturan_pakai', 'like', '%' . $s. '%' )
                    ->orWhere('id_petugas', 'like', '%' . $s. '%' );
    }
    public function rawat()
    {
        return $this->belongsTo('App\RawatPasien', 'no_rawat', 'no_rawat');
    }

    public function obat()
    {
        return $this->belongsTo('App\Obat', 'kd_obat', 'kd_obat');
    }

    public function petugas()
    {
        return $this->belongsTo('App\Petugas', 'id_petugas', 'id');
    }
}
