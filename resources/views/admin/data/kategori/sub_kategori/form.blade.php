@inject('kategoriProduk','App\KategoriProduk')
<div class="row">
	<div class="col-md-12">
			<div class="form-group floating-label">
				{!!Form::select('kategori_produk_id',$kategoriProduk->lists('label','id'),null,['class'=>'form-control', 'id'=>'kategori_produk_id'])!!}
				{!!Form::label('kategori_produk_id','Nama Kategori Produk')!!}
			</div>
	</div>
	<div class="col-md-12">
			<div class="form-group floating-label">
				{!!Form::text('label',null,['class'=>'form-control', 'id'=>'label'])!!}
				{!!Form::label('label','Nama Kategori Produk')!!}
			</div>
	</div>
</div>
