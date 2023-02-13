<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';
    public $timestamps = false;

    public function scopeSearch($query, $s)
    {
        return $query->where('id', 'like', '%' . $s. '%')
                    ->orWhere('nm_petugas', 'like', '%' . $s. '%' )
                    ->orWhere('no_telepon', 'like', '%' . $s. '%' )
                    ->orWhere('username', 'like', '%' . $s. '%' )
                    ->orWhere('password', 'like', '%' . $s. '%' )
                    ->orWhere('level', 'like', '%' . $s. '%' );
    }

    public function pendaftaran()
    {
        return $this->hasMany('App\Pendaftaran', 'id');
    }

    public function rawattindakan()
    {
        return $this->hasMany('App\Rawattindakan', 'no_tindakan');
    }

    public function rawatobat()
    {
        return $this->hasMany('App\Rawatobat', 'no_rawat');
    }
}
