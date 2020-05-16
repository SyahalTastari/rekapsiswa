@extends('layout.master')
@section('judul', 'Perubahan Data Rombel')
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
									<h3 class="panel-title">Edit Data Rombel</h3>
								</div>
								<div class="panel-body">
									 <form action="/rombel/{{$rombel->id}}/update" method="POST" enctype="multipart/form-data">
							        	{{csrf_field()}}

									   <div class="form-group">
										    <label for="exampleInputEmail1">Nama</label>
										    <input type="text" name="nama_rombel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{$rombel->nama_rombel}}">
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

