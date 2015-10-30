<?php 
namespace App;
/**
*  service menu fetcher
*/
use Route;
class MenuFetcher
{
	function __construct()
	{

	}
	public function lists($level)
	{
		$menu = [
			'admin'=>[
					[ 'route'=>'landing', 'name'=>'Dashboard Admin', 'icon'=> 'fa fa-home'],
					[ 'route'=>'unitkegiatan.index', 'name'=>'Unit Kegiatan', 'icon'=> 'fa fa-database'],
					[ 'route'=>'kondisiusaha.index', 'name'=>'Kondisi Usaha', 'icon'=> 'fa fa-line-chart'],
					[ 'route'=>'produk.index', 'name'=>'Produk Usaha', 'icon'=> 'fa fa-shopping-cart'],
					[ 'route'=>'data.', 'name'=>'Data Utama', 'icon'=> 'fa fa-briefcase','inGroup'=>[
						[ 'route'=>'tujuan_pemasaran.index', 'name'=>'Tujuan Pemasaran', 'icon'=> 'fa fa-truck'],
						[ 'route'=>'tempat_pemasaran.index', 'name'=>'Tempat Pemasaran', 'icon'=> 'fa fa-flag-o'],
						[ 'route'=>'bahan_baku.index', 'name'=>'Bahan Baku', 'icon'=> 'fa fa-cube'],
						[ 'route'=>'permodalan.index', 'name'=>'Permodalan', 'icon'=> 'fa fa-credit-card'],
						[ 'route'=>'manajement.index', 'name'=>'Manajement', 'icon'=> 'fa fa-sitemap'],
						[ 'route'=>'izin.index', 'name'=>'Izin Usaha', 'icon'=> 'fa fa-archive'],
						[ 'route'=>'kategori.', 'name'=>'Kategori Produk', 'icon'=> 'fa fa-tags', 'inGroup'=>[
							[ 'route'=>'master_kategori.index', 'name'=>'Master Kategori Produk', 'icon'=> 'fa fa-tags'],
							[ 'route'=>'sub_kategori.index', 'name'=>'Sub Kategori Produk', 'icon'=> 'fa fa-tag'],
						]],
						[ 'route'=>'media_online.index', 'name'=>'Media Online', 'icon'=> 'fa fa-globe'],
					]],
			]
		];
		return $menu[$level];
	}
	public function make($menu,$role = null,$prefix = null,$child = false)
	{
		$o = "";
		$lists = is_object($menu) ? $menu->lists($role) : $menu;
		foreach ($lists as $list) {
			if(is_array($list)){
				if(isset($list['inGroup'])){
					$inGroup = $list['inGroup'];
					unset($list['inGroup']);
					$active  = in_array( $list['route'],explode( '.',Route::currentRouteName() ) ) ? 'active expand':'';
					if(!$child){
						$icon = isset($list['icon']) ? "<div class='gui-icon'><i class='{$list['icon']}'></i></div>" : ""; 
						$o.="<li class = 'gui-folder $active'>";
						$o.="<a>$icon<span class='title'>{$list['name']}</span></a>";
					}
					else{
						$icon = isset($list['icon']) ? "<i class='{$list['icon']}'></i>" : ""; 
						$o.="<li class = 'gui-folder $active'>";
						$o.="<a><span class='title'>$icon {$list['name']}</span></a>";	
					}
						$o.="<ul>";
						$oldPrefix = $prefix;
						$prefix = (!is_null($prefix)) ? $prefix.$list['route'] : $list['route'];
						$o.=$this->make($inGroup,$role,$prefix,true);
						$prefix = $oldPrefix;
						$o.="</ul>";
					$o.="</li>";
				}else{
					$routeName = $role;
					$routeName.= !is_null($prefix) ? ".$prefix":".";
					$routeName.= "{$list['route']}";
					$link = route($routeName);
					$o.="<li><a href='$link' >";
					if($child){
						$ic= isset($list['icon']) ? "<i class='{$list['icon']}'></i>" : ""; 
						$o.="<span class='title'>$ic {$list['name']}</span>";
					}else{
						$ic= isset($list['icon']) ? "<div class='gui-icon'><i class='{$list['icon']}'></i></div>" : ""; 
						$o.="$ic<span class='title'> {$list['name']}</span>";

					}
					$o.="</a></li>";
				}
			}
		}
		return $o;

	}
}