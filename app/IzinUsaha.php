<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IzinUsaha extends Model
{
    	protected $guarded = ['id'];

    	public function kondisi()
    	{
    		return $this->belongsToMany(KondisiUsaha::class)->withPivot('value');
    	}
}
