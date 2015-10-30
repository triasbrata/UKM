<?php

namespace App\Http\Controllers\Admin\Data;


use App\Http\Controllers\Controller;

use App\MediaOnline;
use App\Http\Requests\MediaOnlineRequest;

class MediaOnlineController extends Controller
{
    protected $path;

    function __construct(MediaOnline $model) {
        $moduleName = "Media Online";
        $prefix = 'admin.data.media_online';
        parent::__construct($prefix,$model,$moduleName);
    }
   
    public function store(MediaOnline $m, MediaOnlineRequest $r)
    {
        return $this->crud($m,$r,__METHOD__);
    }

    public function update(MediaOnline $m, MediaOnlineRequest $r)
    {  
        return $this->crud($m,$r,__METHOD__);
    } 
    private function crud(MediaOnline $m, MediaOnlineRequest $r, $from)
    {
        if($m->fill($r->all())->save()){
            return $this->routeAndSuccess($from);
        }
        return $this->routeBackWithError($from);
    }

    public function destroy(MediaOnline $m)
    {
      if($m->delete()){
          return $this->routeAndSuccess('destroy');
      }
      return $this->routeBackWithError('destroy');
    }
}
