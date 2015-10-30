@extends('main')
@section('title', 'Deskripsi Data Unit Kegiatan Masyarakat')
@section('content')
<div class="card card-underline">
	<div class="card-head">
		<header>{!! $namaForm !!}</header>
		<div class="tools">
			<div class="btn-group">
				<a href="{{ route($index) }}" class="btn btn-icon-toggle"><i class="md md-undo"></i></a>
			</div>
		</div>
	</div>
	<div class="row">
		<div  class="card-body">
			<div class="col-sm-6">
				<ul class="list divider-full-bleed">
					<li>
						<h3 class="text-primary">Data Unit Usaha</h3>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Nama Usaha</span>
								<small>{{$data->usaha->nama}}</small>

							</div>
						</div>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Telpon Unit Usaha</span>
								<small>{{!empty($data->usaha->telp)? $data->usaha->telp : "-"}}</small>

							</div>
						</div>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Email Unit Usaha</span>
								<small>{{!empty($data->usaha->email) ? $data->usaha->email : "-"}}</small>

							</div>
						</div>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Keterangan Usaha</span>
								<small>{{$data->usaha->keterangan}}</small>

							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="col-sm-6">
				<ul class="list divider-full-bleed">
					<li>
						<h3 class="text-primary">Data Pemilik Usaha</h3>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>No. KTP</span>
								<small>{{$data->usaha->personal->no_ktp}}</small>

							</div>
						</div>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Nama Pemilik Usaha</span>
								<small>{{$data->usaha->personal->nama}}</small>

							</div>
						</div>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Jenis Kelamin</span>
								<small>{{$data->usaha->personal->jenis_kelamin == "m" ? "Laki-Laki":"Perempuan"}}</small>

							</div>
						</div>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Tempat Tanggal Lahir</span>
								<small>{{"{$data->usaha->personal->tempat_lahir}, {$data->usaha->personal->tanggal_lahir}"}}</small>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div  class="card-body">
			<div class="col-sm-6">
				<ul class="list divider-full-bleed">
					<li>
						<h3 class="text-primary">Pemasaran & Bahan baku</h3>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Tujuan Pemasaran</span>
								<small>{{ implode($data->tujuan_pemasaran->lists('label')->toArray(),',') }}</small>

							</div>
						</div>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Tempat Pemasaran</span>
								<small>{{ implode($data->tempat_pemasaran->lists('label')->toArray(),',') }}</small>

							</div>
						</div>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Sumber Bahan Baku</span>
								<small>{{ implode($data->bahan_baku->lists('label')->toArray(),',') }}</small>

							</div>
						</div>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Keterangan Usaha</span>
								<small>{{ implode($data->permodalan->lists('label')->toArray(),',') }}</small>

							</div>
						</div>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Omset dalam sebulan</span>
								<small>Rp. {{ number_format($data->omset,2,',','.') }}</small>

							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="col-sm-6">
				<ul class="list divider-full-bleed">
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Omset dalam sebulan</span>
								<small>Rp. {{ number_format($data->omset,2,',','.') }}</small>

							</div>
						</div>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Aset usaha</span>
								<small>Rp. {{ number_format($data->aset,2,',','.') }}</small>

							</div>
						</div>
					</li>
					<li>
						<h3 class="text-primary">Sistem Manajement Usaha & Tenaga Kerja</h3>
					</li>
					
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Sistem manajemen usaha</span>
								<small>{{$data->manajement->first()->label}}</small>

							</div>
						</div>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Jumlah Tenaga Kerja Laki-laki</span>
								<small>{{$data->tenaga_kerja->first()->pekerja_pria}}</small>

							</div>
						</div>
					</li>
					<li class="tile">
						<div class="tile-content ink-reaction">
							<div class="tile-text">
								<span>Jumlah Tenaga Kerja Perempuan</span>
								<small>{{$data->tenaga_kerja->first()->pekerja_wanita}}</small>

							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div  class="card-body">
			<div class="col-sm-6">
				<ul class="list divider-full-bleed">
					<li>
						<h3 class="text-primary">Media Online</h3>
					</li>
					@unless (is_null($data->media_online))
							@foreach ($data->media_online as $element)
								<li class="tile">
									<div class="tile-content ink-reaction">
										<div class="tile-text">
											<span>{{ $element->title }}</span>
											<small>{{ $element->url }}/{{ $element->pivot->value}}</small>

										</div>
									</div>
								</li>
							@endforeach
					@endunless
					
				</ul>
			</div>
			<div class="col-sm-6">
				<ul class="list divider-full-bleed">
					<li>
						<h3 class="text-primary">Izin Usaha</h3>
					</li>
					@unless (is_null($data->izin_usaha))
							@foreach ($data->izin_usaha as $element)
								<li class="tile">
									<div class="tile-content ink-reaction">
										<div class="tile-text">
											<span>{{ $element->title }}</span>
											<small>{{ $element->pivot->value}}</small>

										</div>
									</div>
								</li>
							@endforeach
					@endunless
				</ul>
			</div>
		</div>
	</div>
</div>
@stop