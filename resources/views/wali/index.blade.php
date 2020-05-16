@extends('layout.master')
@section('judul', 'Daftar Wali')
@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				@if ($errors->any())
					<div class="alert alert-danger">
						<strong>Perhatian</strong> Pastikan Inputan di isi dengan benar.<br><br>
						    <ul>
						        @foreach ($errors->all() as $error)
						            <li>{{ $error }}</li>
						        @endforeach
						    </ul>
					</div>
				@endif	
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Orang Tua Siswa</h3>
									<div class="right">
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table">
										<thead>
											<tr>
												<th>#</th>
												<th>NAMA</th>
												<th>JENIS KELAMIN</th>
												<th>ALAMAT</th>
												<th>TELEPON</th>	
												<th>AKSI</th>
											</tr>
										</thead>
										@foreach($wali as $wal)
										<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{$wal->orang_tua}}</td>
											<td>{{$wal->jenis_kelamin}}</td>
											<td>{{$wal->alamat}}</td>
											<td>{{$wal->telepon}}</td>
											<td>
												<a href="/wali/{{$wal->id}}/edit" class="btn btn-warning btn-sm">edit</a>
												<a href="/wali/{{$wal->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Untuk Menghapus Data?')">delete</a>
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
				        <h5 class="modal-title" id="exampleModalLabel">Penambahan Data Wali</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <form action="/wali/create" method="POST">
				        	{{csrf_field()}}

						

						  <div class="form-group">
						    <label for="nama_wali">Nama Wali</label>
						    <input type="text" name="orang_tua" class="form-control" id="nama_wali" aria-describedby="emailHelp" placeholder="Nama">
						  </div>

						   <div class="form-group">
						    <label for="exampleInputEmail1">Jenis Kelamin</label>
						    <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
							     <option value="Laki-laki">Laki-laki</option>
							     <option value="Perempuan">Perempuan</option>
							</select>
						  </div>

						   <div class="form-group">
						    <label for="alamat">Alamat</label>
						    <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat"></textarea>
						  </div>

						  <div class="form-group">
						  	<label for="telepon">Telepon</label>
						  	<input type="text" name="telepon" class="form-control" id="telepon" placeholder="Telepon">
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




