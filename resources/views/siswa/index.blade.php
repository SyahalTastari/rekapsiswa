@extends('layout.master')
@section('judul', 'Daftar Siswa')
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
									<h3 class="panel-title">Data Siswa</h3>
									<div class="right">
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table">
										<thead>
											<tr>
												<th>NAMA</th>	
												<th>JENIS KELAMIN</th>
												<th>ROMBEL</th>
												<th>RAYON</th>
												<th>WALI</th>
												<th>AKSI</th>
											</tr>
										</thead>
										@foreach($siswa as $peserta)
											
										<tr>
											<td><sup class="label label-success">{{$peserta->nis}}</sup><a href="/siswa/{{$peserta->id}}/show">{{$peserta->nama}}</a></td>
											<td>{{$peserta->jenis_kelamin}}</td>
											<td>{{$peserta->rombel->nama_rombel}}</td>
											<td>{{$peserta->rayon->nama_rayon}}</td>
											<?php if ($peserta->wali_id == ''): ?>
											<td><strong>Belum Ada Wali   </strong>
											<a href="/wali/{{$peserta->id}}/tambah">  <i class="lnr lnr-plus-circle"></i></a>
											</td>
											<?php else:?>
											<td>{{$peserta->wali->orang_tua}}</td>
											<?php endif ?>
											
											
											<td>
												<a href="/siswa/{{$peserta->id}}/edit" class="btn btn-warning btn-sm">edit</a>
												<a href="/siswa/{{$peserta->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Untuk Menghapus Data?')">delete</a>
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
				        <h5 class="modal-title" id="exampleModalLabel">Penambahan Data Siswa</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <form action="/siswa/create" method="POST">
				        	{{csrf_field()}}

						  <div class="form-group">
						    <label for="exampleInputEmail1">Nis</label>
						    <input type="number" name="nis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIS">
						  </div>

						   <div class="form-group">
						    <label for="exampleInputEmail1">Nama</label>
						    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
						  </div>

						   <div class="form-group">
							    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
							    <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
							      <option value="Laki-laki">Laki-laki</option>
							      <option value="Perempuan">Perempuan</option>
							    </select>
							</div>

							<div class="form-group">
						    <label for="exampleInputEmail1">Rombel</label>
						     <select class="form-control" name="rombel_id" id="exampleFormControlSelect1">
						     	<option value="">NONE</option>
						     	@foreach($rombel as $r)
							      <option value="{{$r->id}}">{{$r->nama_rombel}}</option>
							      @endforeach
							    </select>
						  </div>

						  <div class="form-group">
						    <label for="exampleFormControlTextarea1">Rayon</label>
						     <select class="form-control" name="rayon_id" id="exampleFormControlSelect1">
						   		<option value="">NONE</option>
						     	@foreach($rayon as $r)
							    <option value="{{$r->id}}">{{$r->nama_rayon}}</option>
							    @endforeach
							 </select>
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




