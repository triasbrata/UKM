<?php

namespace App\Http\Controllers\Admin\Data;


use App\Http\Controllers\Controller;

use App\SubKategoriProduk;
use App\Http\Requests\SubKategoriProdukRequest;
use UploadHelper;
use File;

class SubKategoriProdukController extends Controller
{
    protected $path;

    function __construct(SubKategoriProduk $model) {
        $moduleName = "Sub Kategori Produk";
        $prefix = 'admin.data.kategori.sub_kategori';
        parent::__construct($prefix,$model,$moduleName);
    }
   
    public function store(SubKategoriProduk $m, SubKategoriProdukRequest $r)
    {
        return $this->crud($m,$r,__METHOD__);
    }

    public function update(SubKategoriProduk $m, SubKategoriProdukRequest $r)
    {  
        return $this->crud($m,$r,__METHOD__);
    } 
    private function crud(SubKategoriProduk $m, SubKategoriProdukRequest $r, $from)
    {
        if($m->fill($r->only(['kategori_produk_id','label']))->save()){
            return $this->routeAndSuccess($from);
        }
        return $this->routeBackWithError($from);
    }

    public function destroy(SubKategoriProduk $m)
    {
      if($m->delete()){
          return $this->routeAndSuccess('destroy');
      }
      return $this->routeBackWithError('destroy');
    }
}
