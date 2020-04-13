@extends('layout/headerfooter')
@section('title','Taekwondo Bulungan ISCI')

@section('panel')
<div id="page-wrapper" class="gray-bg dashbard-1">
	<div class="content-main">
		<!--banner-->
		<div class="banner">
			<h2>
				<a href="#">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Sistem View</span>
			</h2>
		</div>
		<!--//banner-->

		<!--grid-->
		<div class="typo-grid">

			<div class="typo-1">

				<div class="grid_3 grid_4">
					<h3 class="head-top">Setting</h3>
					@if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
					@endif
					<a href="/system">
						<h4 class="head-top" style="float: left">Displayed Coaches:</h4>
					</a>
					<a href="/dojang">
						<h4 class="head-top" style="float: right">>> Dojang's Table</h4>
					</a>
					<br>

					<div class="container">
						<div class="tab-content" id="nav-tabContent">
							<div class="row">
								<div class="col-md-12">
									<div calss="container">
										<table id="displayed" class="table table-bordered">
											<thead class="thead-light">
												<tr>
													<th></th>
													<th>Registration Number</th>
														<th>username</th>
														<th>Name</th>
														<th>Birth Place</th>
														<th>Birth Date</th>
														<th>Address</th>
														<th>Belt</th>
														<th>Exam. Date</th>
														<th>Exam. Place</th>
														<th>Dojang ID</th>
														<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($list as $list)
												<tr>
													<td>
														<a href="/remove/<?= $list->id ?>" class="badge badge-danger">Remove</a>
													</td>
													<td>
														{{$list->no_reg}}
													</td>
													<td>
														{{$list->username}}
													</td>
													<td>
														{{$list->nama}}
													</td>
													<td>
														{{$list->tempat_lahir}}
													</td>
													<td>
														{{$list->tanggal_lahir}}
													</td>
													<td>
														{{$list->alamat}}
													</td>
													<td>
														{{$list->sabuk_terakhir}}
													</td>
													<td>
														{{$list->ujian_terakhir}}
													</td>
													<td>
														{{$list->tmpt_ujian_terakhir}}
													</td>
													<td>
														{{$list->id_dojang}}
													</td>
													<td>
														<a href="/detail/<?= $list->username ?>" class="badge badge-success">detail</a>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>

									</div>
								</div> <!-- tutup tabel -->
							</div>
							<!-- </div>
						<div class='container'> -->
							<div class="tab-content" id="nav-tabContent">
								<h4 class="head-top">List Coach:</h4><br>

								<div class="row">
									<div class="col-md-12">
										<div calss="container">
											<table id="listed" class="table table-bordered">
												<thead class="thead-light">
													<tr>
														<th></th>
														<th>No. Registrasi</th>
														<th>username</th>
														<th>Nama</th>
														<th>Tmpt. Lahir</th>
														<th>Tgl. Lahir</th>
														<th>Alamat</th>
														<th>Sabuk Terakhir</th>
														<th>Tgl. Ujian</th>
														<th>Tmpt. Ujian</th>
														<th>ID Dojang</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($staff as $staff)
													@if($staff->role == 'admin' or $staff->role == 'super_admin')
													<tr>
														<td>
															<a href="/display/<?= $staff->username ?>" class="badge badge-success">Display</a>
														</td>
														<td>
															{{$staff->no_reg}}
														</td>
														<td>
															{{$staff->username}}
														</td>
														<td>
															{{$staff->nama}}
														</td>
														<td>
															{{$staff->tempat_lahir}}
														</td>
														<td>
															{{$staff->tanggal_lahir}}
														</td>
														<td>
															{{$staff->alamat}}
														</td>
														<td>
															{{$staff->sabuk_terakhir}}
														</td>
														<td>
															{{$staff->ujian_terakhir}}
														</td>
														<td>
															{{$staff->tmpt_ujian_terakhir}}
														</td>
														<td>
															{{$staff->id_dojang}}
														</td>
														<td>
															<a href="/detail/<?= $staff->username ?>" class="badge badge-success">detail</a>
														</td>
													</tr>
													@endif
													@endforeach
												</tbody>
											</table>

										</div>
									</div> <!-- tutup tabel -->
								</div>
							</div>

						</div>
					</div>
				</div> <!-- tutup grid3 -->
			</div> <!-- tutup typo 1 -->
		</div> <!-- ttup typo grid -->


		<!--//grid-->
		<!---->
	</div>
</div>
<div class="clearfix"> </div>
</div>
@endsection