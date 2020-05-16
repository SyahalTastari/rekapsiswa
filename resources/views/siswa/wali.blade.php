

@extends('layout.master')
@section('judul', 'Tambah Wali')
@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
							<div class="panel panel-headline">
								<div class="panel-heading">
									<p class="panel-subtitle text-center text-success">Pilih Wali</p>
									
									</div>
							</div>
								
									
								<div class="panel-body">
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
									<form method="GET" action="/wali/{{$no}}/tambah">
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
												<th>WALI</th>
												<th>ALAMAT</th>
												<th>TELEPON</th>
												<th class="float-right">AKSI</th>
											</tr>
										</thead>
										<tbody>
										
										 @foreach($wali as $walis)
											<tr>
												
												<td>{{$loop->iteration}}</td>
												
												<td>{{$walis->orang_tua}}</td>
												<td>{{$walis->alamat}}</td>
												<td>{{$walis->telepon}}</td>
												<td><a href="/wali/{{$walis->id}}/{{$no}}/add" class="btn btn-success "><i class="lnr lnr-circle-plus"></i> Tambah</a></td>
												
											</tr>
										</tbody>
										@endforeach
									</table>
									  
									  
										</td>
									</form>
								</div>
									
									
							
							


	


@stop






