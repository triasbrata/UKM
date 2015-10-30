<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KondisiUsaha extends Model
{
    	protected $guarded = ['id'];

    	public function usaha()
    	{
    		return $this->belongsTo(UnitUsaha::class,"unit_usaha_id");
    	}
       
    	public function last()
    	{
    		return $this->orderBy('created_at', 'desc')->first();
    	}
    	public function tujuan_pemasaran()
    	{
    		return $this->belongsToMany(TujuanPemasaran::class,'kondisi_tujuan_pem');
    	}
    	public function manajement()
    	{
    		return $this->belongsToMany(Manajement::class,'kondisi_usaha_manajement');
    	}
    	public function tenaga_kerja()
    	{
    		return $this->belongsToMany(TenagaKerja::class,'kutk');
    	}
    	public function tempat_pemasaran()
    	{
    		return $this->belongsToMany(TempatPemasaran::class,'kondisi_tempat_pem');
    	}
    	public function permodalan()
    	{
    		return $this->belongsToMany(Permodalan::class,'kondisi_usaha_permodalan');
    	}
    	public function bahan_baku()
    	{
    		return $this->belongsToMany(BahanBaku::class,'bahan_baku_kondisi_usaha');
    	}
        public function izin_usaha()
        {
            return $this->belongsToMany(IzinUsaha::class)->withPivot('value');
        }
        public function findValueIzinUsha($id)
        {
            if($this->izin_usaha->count()){
                foreach ($this->izin_usaha as $isin) {
                    if($isin->pivot->izin_usaha_id == $id){
                        break;
                    }
                }
                return $isin->pivot->value;
            }
        }
        public function media_online()
        {
            return $this->belongsToMany(MediaOnline::class)->withPivot('value');
        }
        public function findValueMediaOnline($id)
        {
            if($this->media_online->count() > 0){
                 foreach ($this->media_online as $mediaOnline) {
                    if($mediaOnline->pivot->media_online_id == $id){
                        break;
                    }
                }
                return $mediaOnline->pivot->value;
            }
        }
        public function getTujuanPemasaranListAttribute()
        {
            return $this->tujuan_pemasaran->lists('id')->toArray();
        }
        public function getBahanBakuListAttribute()
        {
            return $this->tujuan_pemasaran->lists('id')->toArray();
        }
        public function getTempatPemasaranListAttribute()
        {
            return $this->tujuan_pemasaran->lists('id')->toArray();
        }
        public function getPermodalanListAttribute()
        {
            return $this->tujuan_pemasaran->lists('id')->toArray();
        }
        public function getPekerjaPriaAttribute()
        {
            return $this->tenaga_kerja->first()->pekerja_pria;
        }
        public function getPekerjaWanitaAttribute()
        {
            return $this->tenaga_kerja->first()->pekerja_wanita;
        }
}

