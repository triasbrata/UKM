<?php

namespace App\Http\Controllers\Admin\Data;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\IzinUsahaRequest;
use App\IzinUsaha;

class IzinUsahaController extends Controller
{
    function __construct() {
        $prefix = 'admin.data.izin';
        $model = new IzinUsaha();
        $moduleName = 'Izin Usaha';
        parent::__construct($prefix,$model,$moduleName);
    }
    public function store( IzinUsaha $model,  IzinUsahaRequest $r)
    {
        if ($model->fill($r->all())->save()) {
            return $this->routeAndSuccess('store');
        }
        return $this->routeBackWithError('store');
    }
    public function update(IzinUsaha $model, IzinUsahaRequest $r)
    {
        if ($model->fill($r->all())->save()) {
            return $this->routeAndSuccess('update');
        }
        return $this->routeBackWithError('update');
    }
    public function destroy(IzinUsaha $model)
    {
         if ($model->delete()) {
            return $this->routeAndSuccess('destroy');
        }
        return $this->routeBackWithError('destroy');
    }
}
