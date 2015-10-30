@extends('main')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card card-underline">
				<div class="card-head">
					<header>
						<i class="fa fa-tags"></i> {!! $namaForm !!}
					</header>
					<div class="tools">
						<div class="btn-group">
							<a href="{{ route($create) }}" class="btn btn-primary">Tambah</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table no-margin datatable">
						<thead>
							<tr>
								<th class="col-xs-1">No.</th>
								<th>Nama Kategori</th>
								<th>Foto Kategori</th>
							</tr>
						</thead>
						<tbody>
							<?php $x=1; ?>
							@foreach ($lists as $list)
								<tr>
									<td>{{$x++}}</td>
									<td>{{$list->label}}</td>
									<td> <img src="{{ asset('imgs/jenis_produk/'.$list->foto) }}" class="gambar" alt="Foto {{ $list->label }}" height="50px;">
										<div class="pull-right">
											  {!! Form::open(['route'=>[$destroy,$list->id], 'method'=>'DELETE','class'=>'no-margin']) !!}
												  	{!! link_to_route($edit,'Edit',$list->id,['class'=>'btn btn-info btn-raised btn-sm']) !!}
												  	{!! Form::button('Delete',['class'=>'btn btn-danger btn-raised btn-sm','type'=>'submit']) !!}
											  {!! Form::close() !!}
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal">
		<div class="modal-dialog" >
			<div class="card">
				<div class="card-head">
					<header>
						<h3>Preview foto kategori</h3>
					</header>
				</div>
				<div class="card-content">
					
				</div>
			</div>
		</div>
	</div>
@stop
@section('javascript')
	<script type="text/javascript">
		$(document).on('click','.gambar',function (e) {
			var gambar = $(this);
			$('#modal').find('.card-content').html($('<img>').attr({src:gambar.attr('src'),width:'100%'}));
			$('#modal').modal()
		})
	</script>
@stop