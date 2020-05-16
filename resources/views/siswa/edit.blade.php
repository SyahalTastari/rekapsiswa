@extends('layout.master')
@section('judul', 'Perubahan Data siswa')
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
									<h3 class="panel-title">Edit Data siswa</h3>
								</div>
								<div class="panel-body">
									 <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
							        	{{csrf_field()}}

									   <div class="form-group">
										    <label for="exampleInputEmail1">Nama</label>
										    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{$siswa->nama}}">
										  </div>

										   <div class="form-group">
										    <label for="exampleInputEmail1">Jenis Kelamin</label>
										    <select name="jenis_kelamin" class="form-control">
										    	<option value="@if ($siswa->jenis_kelamin == 'Laki-laki') Laki-laki" selected >Laki-Laki</option>
										    	<option value="Perempuan">Perempuan</option>
										    	@else
										    	<option value="Laki-laki">Laki-laki</option>
										    	<option value="Perempuan"selected>Perempuan</option>
										    	@endif
										    </select>
										  </div>

										  <div class="form-group">
										    <label for="exampleInputEmail1">Rombel</label>
											 <select name="id_rombel" class="form-control">
		                                        <option value="">None</option>  
		                                        @foreach ($rombel as $row)
		                                        <option value="{{ $row->id }}" {{ $siswa->id_rombel == $row->id ? 'selected':'' }}>{{ $row->nama_rombel }}</option>	             
		                                       @endforeach
	                                    	</select>							
										  </div>



										  <div class="form-group">
										    <label for="exampleInputEmail1">Rayon</label>
											 <select name="id_rayon" class="form-control">
		                                        <option value="">None</option>  
		                                        @foreach ($rayon as $row)
		                                        <option value="{{ $row->id }}" {{ $siswa->id_rayon == $row->id ? 'selected':'' }}>{{ $row->nama_rayon }}</option>	             
		                                       @endforeach
	                                    	</select>							
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

