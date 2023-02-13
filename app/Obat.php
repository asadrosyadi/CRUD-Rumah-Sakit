<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';
    public $timestamps = false;

    public function scopeSearch($query, $s)
    {
        return $query->where('kd_obat', 'like', '%' . $s. '%')
                    ->orWhere('nm_obat', 'like', '%' . $s. '%' )
                    ->orWhere('harga_modal', 'like', '%' . $s. '%' )
                    ->orWhere('harga_jual', 'like', '%' . $s. '%' )
                    ->orWhere('stok', 'like', '%' . $s. '%' )
                    ->orWhere('keterangan', 'like', '%' . $s. '%' );
    }

    public function rawatobat()
    {
        return $this->hasMany('App\Rawatobat', 'kd_obat');
    }
}
