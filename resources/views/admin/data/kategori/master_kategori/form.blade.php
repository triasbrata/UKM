<div class="row">
	<div class="col-md-12">
			<div class="form-group floating-label">
				{!!Form::text('label',null,['class'=>'form-control', 'id'=>'label'])!!}
				{!!Form::label('label','Nama Kategori Produk')!!}
			</div>
	</div>
	<div class="col-md-12">
		<div class="fileinput fileinput-new input-group" data-provides="fileinput">
			<div class="form-control" data-trigger="fileinput">
				<i class="fa fa-file fileinput-exists"></i> <span class="fileinput-filename"></span>
			</div>
			<span class="input-group-addon btn-file btn btn-primary">
				<span class="fileinput-new">Pilih Gambar</span>
				<span class="fileinput-exists">Ubah Gambar</span><input type="file" name="foto" accept="image/*">
			</span>
			<a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Batal</a>
		</div>			
	</div>
</div>
