@extends('layout.master')
@section('judul', 'Daftar Rombel')
@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="panel">

								<div class="panel-heading">
									<h3 class="panel-title">Data Rombel</h3>
									<div class="right">
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table">
										<thead>
											<tr>
												<th>NAMA ROMBEL</th>	
												<th>AKSI</th>
											</tr>
										</thead>
										@foreach($rombel as $ray)
										<tr>
											<td>{{$ray->nama_rombel}}</td>
											<td>
												<a href="/rombel/{{$ray->id}}/edit" class="btn btn-warning btn-sm">edit</a>
												<a href="/rombel/{{$ray->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Untuk Menghapus Data?')">delete</a>
											</td>
										</tr>
										@endforeach
									</table>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Penambahan Data Rombel</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <form action="/rombel/create" method="POST">
				        	{{csrf_field()}}

						

						  <div class="form-group">
						    <label for="exampleInputEmail1">Nama</label>
						    <input type="text" name="nama_rombel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
						  </div>

						  

							
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary">Submit</button>
				        </form>
				      </div>
				    </div>
				  </div>

@stop




