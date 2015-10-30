<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\KondisiUsahaRequest;
use App\Http\Controllers\Controller;
use App\KondisiUsaha;
use App\TenagaKerja;
class KondisiUsahaController extends Controller
{
	function __construct() {
		$prefix = 'admin.kondisiusaha';
		$model = new KondisiUsaha();
		$moduleName = "Kondisi Usaha";
		parent::__construct($prefix,$model,$moduleName);
	}
    public function store(KondisiUsaha $m, KondisiUsahaRequest $r)
    {
        return $this->crud($m,$r,__METHOD__);
    }
    public function update(KondisiUsaha $m, KondisiUsahaRequest $r)
    {
        return $this->crud($m,$r,__METHOD__);
    }
    private function crud(KondisiUsaha $m, KondisiUsahaRequest $r, $form)
    {

            $kondisiUsahaData = $r->only(['unit_usaha_id', 'tahun', 'bulan', 'aset', 'omset']);
            if($m->fill($kondisiUsahaData)->save()){
                $kondisiUsaha = $m->last();
                if( ! $kondisiUsaha->bahan_baku()->sync($r->input('bahan_baku_list')) ){
                    return $this->routeBackWithError($form)->withErrors(['Bahan baku gagal di pilih']);
                } 
                if( ! $kondisiUsaha->permodalan()->sync($r->input('permodalan_list')) ){
                    return $this->routeBackWithError($form)->withErrors(['Bahan baku gagal di pilih']);
                } 
                if( ! $kondisiUsaha->manajement()->sync($r->only('manajement')) ){
                    return $this->routeBackWithError($form)->withErrors(['Bahan baku gagal di pilih']);
                } 
                if( ! $kondisiUsaha->tujuan_pemasaran()->sync($r->input('tujuan_pemasaran_list')) ){
                    return $this->routeBackWithError($form)->withErrors(['Bahan baku gagal di pilih']);
                } 
                if( ! $kondisiUsaha->tempat_pemasaran()->sync($r->input('tempat_pemasaran_list')) ){
                    return $this->routeBackWithError($form)->withErrors(['Bahan baku gagal di pilih']);
                } 
                foreach ($r->izin_usaha as $key => $value) {
                    $data[$key] = ['value'=>$value];
                }
                if(! $kondisiUsaha->izin_usaha()->sync($data)){
                    return $this->routeBackWithError($form)->withErrors(['Perizinan tidak dikenali']);
                }
                foreach ($r->media_online as $key => $value) {
                    $data[$key] = ['value'=>$value];
                }
                if(! $kondisiUsaha->media_online()->sync($data)){
                    return $this->routeBackWithError($form)->withErrors(['Perizinan tidak dikenali']);
                }
                $tenagaKerjaData = $r->only(['pekerja_pria','pekerja_wanita']);
                $mtk = new TenagaKerja($tenagaKerjaData);
                if($mtk->save()){
                    if( ! $kondisiUsaha->tenaga_kerja()->sync([$mtk->id]) ){
                        return $this->routeBackWithError('store')->withErrors(['Bahan baku gagal di pilih']);
                    } 
                }
                return $this->routeAndSuccess($form);
            }
            return $this->routeBackWithError($form);
    }
}