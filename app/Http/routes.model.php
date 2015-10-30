<?php 

Route::model('unitkegiatan',\App\UnitUsaha::class);
Route::model('kondisiusaha',\App\KondisiUsaha::class);
Route::model('tujuan_pemasaran',\App\TujuanPemasaran::class);
Route::model('tempat_pemasaran',\App\TempatPemasaran::class);
Route::model('bahan_baku',\App\BahanBaku::class);
Route::model('permodalan',\App\Permodalan::class);
Route::model('manajement',\App\Manajement::class);
Route::model('produk',\App\UnitUsaha::class);
Route::model('izin',\App\IzinUsaha::class);
Route::model('master_kategori',\App\KategoriProduk::class);
Route::model('sub_kategori',\App\IzinUsaha::class);
Route::model('media_online',\App\MediaOnline::class);