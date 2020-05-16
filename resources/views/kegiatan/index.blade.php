

@extends('layout.master')
@section('judul', 'Lihat Kegiatan')
@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
							<div class="panel panel-headline">
								<div class="panel-heading">
									<p class="panel-subtitle text-center text-success">Pilih Jadwal Kegiatan</p>
									
									</div>
							</div>
								
									
								<div class="panel-body">
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
									<form method="GET" action="/kegiatan">
									<div class="input-group">
										<input class="form-control" placeholder="Search" name="cari" type="text">
										<span class="input-group-btn"><button class="btn btn-primary" type="submit">Cari</button></span>
										
									</div>
									</form>
									</div>
									
									  
									  <table class="table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>TANGGAL</th>
												<th class="float-right">AKSI</th>
											</tr>
										</thead>
										<tbody>
										<?php $value = null ?>
										<?php $no = 1 ?>
										 @foreach($detail as $data)
											<tr>
												@if ($value != $data->tanggal)
												<td>{{$no++}}</td>
												
												<td>{{$data->tanggal }}</td>
												<?php $value = $data->tanggal ?>
												<td><a href="/kegiatan/{{$data->id}}/lihat" class="btn btn-warning "><i class="fa fa-eye"></i> Lihat</a></td>
												@endif
											</tr>
										</tbody>
										@endforeach
									</table>
									  
									  
										</td>
									</form>
								</div>
									
									
							
							


	


@stop






