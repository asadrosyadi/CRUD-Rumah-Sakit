<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rawatpasien extends Model
{
    protected $table = 'rawat';
    public $timestamps = false;

    public function scopeSearch($query, $s)
    {
        return $query->where('no_rawat', 'like', '%' . $s. '%')
                    ->orWhere('tgl_rawat', 'like', '%' . $s. '%' )
                    ->orWhere('nomor_rmk', 'like', '%' . $s. '%' )
                    ->orWhere('id_dokter', 'like', '%' . $s. '%' )
                    ->orWhere('hasil_diagnosa', 'like', '%' . $s. '%' )
                    ->orWhere('bayar', 'like', '%' . $s. '%' )
                    ->orWhere('id_petugas', 'like', '%' . $s. '%' );
    }

    public function pasien()
    {
        return $this->belongsTo('App\Pasien', 'nomor_rmk', 'nomor_rmk');
    }

    public function dokter()
    {
        return $this->belongsTo('App\Dokter', 'id_dokter', 'id_dokter');
    }

    public function petugas()
    {
        return $this->belongsTo('App\Petugas', 'id_petugas', 'id');
    }

    public function rawattindakan()
    {
        return $this->hasMany('App\Rawattindakan', 'no_rawat');
    }

    public function rawatobat()
    {
        return $this->hasMany('App\Rawatobat', 'no_rawat');
    }
}
