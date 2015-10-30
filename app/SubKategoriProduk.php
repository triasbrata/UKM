<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubKategoriProduk extends Model
{
    	protected $guarded = ['id'];
    	public function master()
    	{
    		return $this->belongsTo(KategoriProduk::class,'kategori_produk_id');
    	}
    	public function produk()
    	{
    		return $this->hasMany(Produk::class);
    	}
}
