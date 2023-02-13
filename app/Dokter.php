<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    public $timestamps = false;

    public function scopeSearch($query, $s)
    {
        return $query->where('id_dokter', 'like', '%' . $s. '%')
                    ->orWhere('nm_dokter', 'like', '%' . $s. '%' )
                    ->orWhere('jenis_kelamin', 'like', '%' . $s. '%' )
                    ->orWhere('tanggal_lahir', 'like', '%' . $s. '%' )
                    ->orWhere('no_telepon', 'like', '%' . $s. '%' )
                    ->orWhere('sip', 'like', '%' . $s. '%' )
                    ->orWhere('spesialis', 'like', '%' . $s. '%' )
                    ->orWhere('alamat', 'like', '%' . $s. '%' );
    }

    public function pendaftaran()
    {
        return $this->hasMany('App\Rawatpasien', 'no_rawat');
    }

    public function rawattindakan()
    {
        return $this->hasMany('App\Rawattindakan', 'id_dokter');
    }


}
