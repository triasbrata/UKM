@inject('usaha','App\UnitUsaha')
@inject('tujuanPemasaran','App\TujuanPemasaran')
@inject('tempatPemasaran','App\TempatPemasaran')
@inject('bahanBaku','App\BahanBaku')
@inject('permodalan','App\Permodalan')
@inject('manajement','App\Manajement')
@inject('media','App\MediaOnline')
@inject('izin','App\IzinUsaha')
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
			<h4 class="text-primary">Data Unit Usaha</h4>
		</div>
		<div class="col-md-4">
			<div class="form-group floating-label">
				{!!Form::select('unit_usaha_id',$usaha->lists('nama','id'),null,['class'=>'form-control', 'id'=>'unit_usaha_id'])!!}
				{!!Form::label('unit_usaha_id','Nama Unit Usaha')!!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group floating-label">
				{!!Form::text('tahun',null,['class'=>'tahun-picker form-control ', 'id'=>'tahun'])!!}
				{!!Form::label('tahun','Tahun Kondisi Usaha')!!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group floating-label">
				{!!Form::text('bulan',null,['class'=>'form-control bulan-picker', 'id'=>'bulan'])!!}
				{!!Form::label('bulan','Bulan Kondisi Usaha')!!}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="col-md-12">
			<h4 class="text-primary">Target Pasar</h4>
		</div>
		<div class="col-md-12">	
			<div class="form-group floating-label">
				{!!Form::select('tujuan_pemasaran_list[]',$tujuanPemasaran->lists('label','id'),null,['class'=>'form-control', 'id'=>'tujuan_pemasaran','multiple'=>'multiple'])!!}
				{!!Form::label('tujuan_pemasaran','Tujuan Pemasaran')!!}
			</div>
		</div>
		<div class="col-md-12">	
			<div class="form-group floating-label">
				{!!Form::select('tempat_pemasaran_list[]',$tempatPemasaran->lists('label','id'),null,['class'=>'form-control', 'id'=>'tempat_pemasaran','multiple'=>'multiple'])!!}
				{!!Form::label('tempat_pemasaran','Tempat Pemasaran')!!}
			</div>
		</div>
		<div class="col-md-12">	
			<h4 class="text-primary">Bahan Baku Usaha</h4>
		</div>
		<div class="col-md-12">	
			<div class="form-group floating-label">
				{!!Form::select('bahan_baku_list[]',$bahanBaku->lists('label','id'),null,['class'=>'form-control', 'id'=>'bahan_baku','multiple'=>'multiple'])!!}
				{!!Form::label('bahan_baku','Sumber Bahan Baku')!!}
			</div>
		</div>
		<div class="col-md-12">	
			<h4 class="text-primary">Keuangan</h4>
		</div>
		<div class="col-md-12">	
			<div class="form-group floating-label">
				{!!Form::select('permodalan_list[]',$permodalan->lists('label','id'),null,['class'=>'form-control', 'id'=>'permodalan','multiple'=>'multiple'])!!}
				{!!Form::label('permodalan','Sumber Utama Modal')!!}
			</div>
		</div>
		<div class="col-md-6">	
			<div class="form-group floating-label">
				<div class="input-group">
					<span class="input-group-addon" style="font-size:24px;">Rp.</span>
					<div class="input-group-content">
						{!!Form::text('omset',null,['class'=>'form-control inputmask', 'data-inputmask'=>"'mask':'99999999'",'id'=>'omset'])!!}
						{!!Form::label('omset','Omzet')!!}
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">	
			<div class="form-group floating-label">
				<div class="input-group">
					<span class="input-group-addon" style="font-size:24px;">Rp.</span>
					<div class="input-group-content">
						{!!Form::text('aset',null,['class'=>'form-control inputmask', 'data-inputmask'=>"'mask':'99999999'",'id'=>'aset'])!!}
						{!!Form::label('aset','Aset')!!}
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="col-md-12">
			<h4 class="text-primary">Sistem Manajement Usaha & Tenaga Kerja</h4>
		</div>
		<div class="col-md-12">	
			<div class="form-group floating-label">
				{!!Form::select('manajement',$manajement->lists('label','id'),null,['class'=>'form-control', 'id'=>'manajement'])!!}
				{!!Form::label('manajement','Sistem Manajement')!!}
			</div>
		</div>
		<div class="col-md-6">	
			<div class="form-group floating-label">
			<div class="input-group">
				<div class="input-group-content">
					{!!Form::text('pekerja_pria',null,['class'=>'form-control', 'id'=>'pekerja_pria'])!!}
					{!!Form::label('pekerja_pria','Jumlah Pekerja Laki-Laki')!!}
				</div>
				<span class="input-group-addon">Orang</span>
			</div>
			</div>
		</div>
		<div class="col-md-6">	
			<div class="form-group floating-label">
			<div class="input-group">
				<div class="input-group-content">
					{!!Form::text('pekerja_wanita',null,['class'=>'form-control', 'id'=>'pekerja_wanita'])!!}
					{!!Form::label('pekerja_wanita','Jumlah Pekerja Perempuan')!!}
				</div>
				<span class="input-group-addon">Orang</span>
			</div>
			</div>
		</div>
		<div class="col-md-12">	
		<h4 class="text-primary">Perizinan</h4>
		</div>
		<?php $x=0 ?>
		@foreach ($izin->all() as $element)
			<div class="col-md-6">	
				<div class="form-group floating-label">
					{!!Form::text('izin_usaha['.$element->id.']',isset($data)?$data->findValueIzinUsha($element->id):null,['class'=>'form-control', 'id'=>'izin_usaha_'.$x])!!}
					{!!Form::label('izin_usaha_'.$x,$element->title)!!}
				</div>
			</div>
		@endforeach
		<div class="col-md-12">	
		<h4 class="text-primary">Media Sosial</h4>
		</div>
		@foreach ($media->all() as $element)
			<div class="col-md-6">	
				<div class="form-group floating-label">
							{!!Form::text('media_online['.$element->id.']',isset($data)? $data->findValueMediaOnline($element->id):null,['class'=>'form-control', 'id'=>'media_online_'.$x])!!}
							{!!Form::label('media_online_'.$x,$element->title)!!}	
				</div>
			</div>
		@endforeach
	</div>
</div>