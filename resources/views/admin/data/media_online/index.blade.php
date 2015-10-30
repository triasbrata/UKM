@extends('main')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card card-underline">
				<div class="card-head">
					<header>
						<i class="fa fa-archive"></i> {!! $namaForm !!}
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
								<th>Nama Media Online</th>												
								<th>Link Media Online</th>												
							</tr>
						</thead>
						<tbody>
							<?php $x=1; ?>
							@foreach ($lists as $list)
								<tr>
									<td>{{$x++}}</td>
									<td>{{$list->title}}</td>
									<td>{{$list->url}}
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
@stop