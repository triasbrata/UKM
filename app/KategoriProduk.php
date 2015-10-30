<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    	protected $guarded = ['id'];
    	public function sub()
    	{
    		return $this->hasMany(SubKategoriProduk::class,'kategori_produk_id');
    	}
}
