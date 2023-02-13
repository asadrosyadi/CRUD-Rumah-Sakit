<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    protected $table = 'tindakan';
    public $timestamps = false;

    public function scopeSearch($query, $s)
    {
        return $query->where('kd_tindakan', 'like', '%' . $s. '%')
                    ->orWhere('nm_tindakan', 'like', '%' . $s. '%' )
                    ->orWhere('harga', 'like', '%' . $s. '%' );
    }

    public function pendaftaran()
    {
        return $this->hasMany('App\Pendaftaran', 'kd_tindakan');
    }

    public function rawattindakan()
    {
        return $this->hasMany('App\Tindakan', 'kd_tindakan');
    }
}
