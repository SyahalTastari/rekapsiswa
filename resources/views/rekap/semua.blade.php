

@extends('layout.master')
@section('judul', 'Rekap')
@section('content')

	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
							<div class="panel panel-headline">
								<div class="panel-heading">
									
									<p class="panel-subtitle text-center text-success">Rekap Pada Tanggal <?php $value = null ?>@foreach($semua as $data)@if ($value != $data->tanggal) <b>{{$data->tanggal}}</b><?php $value = $data->tanggal ?> @endif @endforeach</p>
									
									</div>
							</div>
								
									
								<div class="panel-body">
									  <div class="content">
									  <table class="table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>NAMA PESERTA</th>
												<th>NAMA KEGIATAN</th>
												<th>RAYON</th>
												<th>ROMBEL</th>
												<th>STATUS</th>
												
											</tr>
										</thead>
										<tbody>
										 @foreach($semua as $data)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$data->nama}}</td>
												<td>{{$data->nama_kegiatan}}</td>
												<td>{{$data->nama_rayon}}</td>
												<td>{{$data->nama_rombel}}</td>

                                               	@if($data->status == 'merah')
                                                <td>
                                                	Belum Melakukan
												</td>
												@endif
												@if($data->status == 'kuning')
												<td>
													Belum Validasi
													</td>
												@endif
												@if($data->status == 'hijau')
												<td>
													Sudah Melakukan
												</td>
												@endif
											</tr>
										</tbody>
										@endforeach
									</table>
									</div>
									  
									  
										</td>
									</form>
								</div>
									
									
							
							


	


@stop






