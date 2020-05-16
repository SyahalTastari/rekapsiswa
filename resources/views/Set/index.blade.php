

@extends('layout.master')
@section('judul', 'Set Waktu')
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
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"> NIS : {{$data->nis}}  <br><br> Nama : {{auth()->user()->name}}</h3>
									<p class="panel-subtitle text-center text-success">Silahkan atur jadwal kamu</p>
									
								</div>	
							</div>	
								
								<div class="panel-body">
									

									<div class="form-group">
									<label>Hari</label>
									<input type="text" class="form-control" placeholder="text field" name="hari" disabled="true" value="{{$hari_ini}}">
									</div>

									<div class="form-group">
									<label>Tanggal</label>
									<input type="" class="form-control" placeholder="text field" name="tanggal" disabled="true" value="{{$date}}">
									</div>

								
									<br>
									
								
									<div class="right">
										<button type="button" class="btn btn-primary mx-auto  " data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
									</div>
								</div>

								
							
									<table class="table">
										<thead>
											<tr>
												<th>NAMA KEGIATAN</th>	
												<th>TANGGAL</th>
												<th>WAKTU AWAL</th>
												<th>WAKTU AKHIR</th>
												<th>MAPEL</th>
												<th>HAPUS</th>
											</tr>
										</thead>
										
										@forelse($oya as $d)
											
										<tr>
											<td>{{$d->nama_kegiatan}}</td>
											<td>{{$d->tanggal}}</td>
											<td>{{$d->waktu_mulai}}</td>
											<td>{{$d->waktu_selesai}}</td>
											<td>{{$d->mapel}}</td>
											<td><a href="/set/{{$d->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Untuk Menghapus Data?')"><i class="fa fa-trash"></i> DELETE</a></td>
										</tr>
										  @empty
			                                <tr>
			                                    <td colspan="6" class="text-center" ><b><i>Belum Membuat Jadwal</i></b></td>
			                                </tr>
										@endforelse
										
									</table>
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
				        <form action="/set/create" method="POST">
				        	{{csrf_field()}}

						  <div class="form-group {{$errors->has('nama_kegiatan') ? 'has-error' : ''}}">
						    <label for="exampleInputEmail1">Nama Kegiatan</label>
						    <input type="text" name="nama_kegiatan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Kegiatan">
						    @if($errors->has('nama_kegiatan'))
						    	<span class="help-block">{{$errors->first('nama_kegiatan')}}</span>
						  	@endif
						  </div>

						   <div class="form-group {{$errors->has('tanggal') ? 'has-error' : ''}}">
						    <label for="exampleInputEmail1">Tanggal</label>
						    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$date}}" disabled="true">
						     @if($errors->has('tanggal'))
						    	<span class="help-block">{{$errors->first('tanggal')}}</span>
						  	@endif
						  </div>
						  

						  
						   <div class="form-group {{$errors->has('waktu_mulai') ? 'has-error' : ''}}">
						    <label for="exampleInputEmail1">Waktu Mulai</label>
						    <input type="time" name="waktu_mulai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						     @if($errors->has('waktu_mulai'))
						    	<span class="help-block">{{$errors->first('waktu_mulai')}}</span>
						  	@endif
						  </div>

						  <div class="form-group {{$errors->has('waktu_selesai') ? 'has-error' : ''}}">
						    <label for="exampleInputEmail1">Waktu Selesai</label>
						    <input type="time" name="waktu_selesai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						     @if($errors->has('waktu_selesai'))
						    	<span class="help-block">{{$errors->first('waktu_selesai')}}</span>
						  	@endif
						  </div>

						  <div class="form-group {{$errors->has('mapel') ? 'has-error' : ''}}">
						    <label for="exampleInputEmail1">Mapel</label>
						     <select class="form-control" name="mapel" id="exampleFormControlSelect1">
						     	  <option disabled="true" selected value="">Pilih Kategori Mapel</option>
							      <option value="PJOK">PJOK</option>
							      <option value="PPKN">PPKN</option>
							      <option value="PAI">PAI</option>
							    </select>
							     @if($errors->has('mapel'))
						    	<span class="help-block">{{$errors->first('mapel')}}</span>
						  		@endif
						  </div>
						 
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary">Submit</button>
				        </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@stop






