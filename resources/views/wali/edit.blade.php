@extends('layout.master')
@section('judul', 'Perubahan Data wali')
@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			@if ($errors->any())
					<div class="alert alert-danger">
						<strong>Perhatian</strong> Ada Masalah Dalam Inputan.<br><br>
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
									<h3 class="panel-title">Edit Data wali</h3>
								</div>
								<div class="panel-body">
									 <form action="/wali/{{$wali->id}}/update" method="POST" enctype="multipart/form-data">
							        	{{csrf_field()}}

									   <div class="form-group">
										    <label for="exampleInputEmail1">Nama</label>
										    <input type="text" name="orang_tua" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{$wali->orang_tua}}">
										  </div>

										   <div class="form-group">
										    <label for="exampleInputEmail1">Jenis Kelamin</label>
										    <select name="jenis_kelamin" class="form-control">
										    	@if($wali->jenis_kelamin == "Laki-laki")
										    	<option value="Laki-Laki" selected>Laki-Laki</option>
										    	<option value="Perempuan">Perempuan</option>
										    	@else
										    	<option value="Laki-laki">Laki-laki</option>
										    	<option value="Perempuan"selected>Perempuan</option>
										    	@endif
										    </select>
										  </div>

										  <div class="form-group">
										    <label for="exampleInputEmail1">Alamat</label>
										    <textarea name="alamat" class="form-control" id="exampleInputEmail1">{{$wali->alamat}} </textarea>
										  </div>

										  <div class="form-group">
										    <label for="exampleInputEmail1">Telepon</label>
										    <input type="text" name="telepon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{$wali->telepon}}">
										  </div>
										  

											
										  
								      </div>
							      <button type="submit" class="btn btn-warning btn-block">Update</button>
							</form>
								</div>
							</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

