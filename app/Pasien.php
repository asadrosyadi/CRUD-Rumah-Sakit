<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';
    public $timestamps = false;

    public function scopeSearch($query, $s)
    {
        return $query->where('nomor_rmk', 'like', '%' . $s. '%')
                    ->orWhere('nm_pasien', 'like', '%' . $s. '%' )
                    ->orWhere('no_identitas', 'like', '%' . $s. '%' )
                    ->orWhere('jns_kelamin', 'like', '%' . $s. '%' )
                    ->orWhere('gol_darah', 'like', '%' . $s. '%' )
                    ->orWhere('tanggal_lahir', 'like', '%' . $s. '%' )
                    ->orWhere('no_telepon', 'like', '%' . $s. '%' )
                    ->orWhere('alamat', 'like', '%' . $s. '%' )
                    ->orWhere('stts_nikah', 'like', '%' . $s. '%' )
                    ->orWhere('pekerjaan', 'like', '%' . $s. '%' );
    }

    public function pendaftaran()
    {
        return $this->hasMany('App\Pendaftaran', 'nomor_rmk');
    }
}
