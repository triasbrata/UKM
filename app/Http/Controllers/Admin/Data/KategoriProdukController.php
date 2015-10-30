<?php

namespace App\Http\Controllers\Admin\Data;


use App\Http\Controllers\Controller;

use App\KategoriProduk;
use App\Http\Requests\KategoriProdukRequest;
use UploadHelper;
use File;

class KategoriProdukController extends Controller
{
    protected $path;

    function __construct(KategoriProduk $model,$path = "imgs/jenis_produk") {
        $this->path = $path;
        $moduleName = "Kategori Produk";
        $prefix = 'admin.data.kategori.master_kategori';
        UploadHelper::setPath($path);
        parent::__construct($prefix,$model,$moduleName);
    }
   
    public function store(KategoriProduk $m, KategoriProdukRequest $r)
    {
        return $this->crud($m,$r,__METHOD__);
    }

    public function update(KategoriProduk $m, KategoriProdukRequest $r)
    {  
        return $this->crud($m,$r,__METHOD__);
    } 
    private function crud(KategoriProduk $m, KategoriProdukRequest $r, $from)
    {
        if($r->hasFile('foto')){
            $foto = $r->file('foto');
            UploadHelper::setFile($foto);
            $checkFoto = UploadHelper::checkFile();
            if(count($checkFoto) < 1){
                if(UploadHelper::upload()){
                    $data['label'] = $r->input('label');
                    $data['foto'] = UploadHelper::getFileName();
                    if($m->fill($data)->save()){
                        return $this->routeAndSuccess($from);
                    }
                    return $this->routeBackWithError($from);
                }
                return $this->routeBackWithError($from)->withErrors(['Foto gagal di upload']);
            }
            return $this->routeBackWithError($from)->withErrors($checkFoto);
        }
        return $this->routeBackWithError($from)->withErrors(['Foto tidak ditemukan']);
    }

    public function destroy(KategoriProduk $m)
    {
      if(File::delete("{$this->path}/{$m->foto}")){
        if($m->delete()){
            return $this->routeAndSuccess('destroy');
        }
        return $this->routeBackWithError('destroy');
      }
      return $this->routeBackWithError('destroy')->with(["Foto tidak bisa di hapus"]);
    }
}
