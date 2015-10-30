<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class MediaOnline extends Model
{
    	protected $guarded = ['id'];
    	public function kondisi_usaha()
    	{
    		return $this->hasMany(KondisiUsaha::class)->withPivot('value');
    	}
}
