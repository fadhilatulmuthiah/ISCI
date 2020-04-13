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
				<span>Students</span>
			</h2>
		</div>
		<!--//banner-->

		<!--grid-->
		<div class="typo-grid">

			<div class="typo-1">

				<div class="grid_3 grid_4">
					<h3 class="head-top">List User</h3>
					@if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
					@endif
					<h4 class="head-top">Display table...</h4><br>

					<div class="container">

						<nav>
							<div class="nav nav-pills" id="nav-tab" role="tablist">
								<a class="nav-item nav-link" id="nav-student-tab" data-toggle="tab" href="#nav-student" role="tab" aria-controls="nav-student" aria-selected="false">Students</a>
								<a class="nav-item nav-link" id="nav-staff-tab" data-toggle="tab" href="#nav-staff" role="tab" aria-controls="nav-staff" aria-selected="false">Staffs</a>
							</div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="nav-student" role="tabpanel" aria-labelledby="nav-student-tab">
								<div class="row">
									<div class="col-md-12">
										<div calss="container">
											<table class="table table-bordered">
												<thead class="thead-light">
													<tr>
														<th>Registration Number</th>
														<th>username</th>
														<th>Name</th>
														<th>Birth Place</th>
														<th>Birth Date</th>
														<th>Address</th>
														<th>Phone Number</th>
														<th>Belt</th>
														<th>Exam. Date</th>
														<th>Exam. Place</th>
														<th>Dojang ID</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($list as $student)
													<tr>
														<td>
															{{$student['no_reg']}}
														</td>
														<td>
															{{$student['username']}}
														</td>
														<td>
															{{$student['nama']}}
														</td>
														<td>
															{{$student['tempat_lahir']}}
														</td>
														<td>
															{{$student['tanggal_lahir']}}
														</td>
														<td>
															{{$student['alamat']}}
														</td>
														<td>
															{{$student['phone']}}
														</td>
														<td>
															{{$student['sabuk_terakhir']}}
														</td>
														<td>
															{{$student['ujian_terakhir']}}
														</td>
														<td>
															{{$student['tmpt_ujian_terakhir']}}
														</td>
														<td>
															{{$student['id_dojang']}}
														</td>
														<td>
															<a href="/detail/<?= $student->username ?>" class="badge badge-success">detail</a>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>

										</div>
									</div> <!-- tutup tabel -->
								</div>
							</div>
							<div class="tab-pane fade" id="nav-staff" role="tabpanel" aria-labelledby="nav-staff-tab">
								<div class="row">
									<div class="col-md-12">
										<div calss="container">
											<table class="table table-bordered">
												<thead class="thead-light">
													<tr>
														<th>Registration Number</th>
														<th>username</th>
														<th>Name</th>
														<th>Birth Place</th>
														<th>Birth Date</th>
														<th>Address</th>
														<th>Phone Number</th>
														<th>Belt</th>
														<th>Exam. Date</th>
														<th>Exam. Place</th>
														<th>Dojang ID</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($staff as $staff)
													<tr>
														<td>
															{{$staff['no_reg']}}
														</td>
														<td>
															@if($staff['role'] == 'super_admin')
															<h6>
																<font>
																	<font color="red">(Sys. Adm)</font>
															</h6>
															@endif
															{{$staff['username']}}
														</td>
														<td>
															{{$staff['nama']}}
														</td>
														<td>
															{{$staff['tempat_lahir']}}
														</td>
														<td>
															{{$staff['tanggal_lahir']}}
														</td>
														<td>
															{{$staff['alamat']}}
														</td>
														<td>
															{{$staff['phone']}}
														</td>
														<td>
															{{$staff['sabuk_terakhir']}}
														</td>
														<td>
															{{$staff['ujian_terakhir']}}
														</td>
														<td>
															{{$staff['tmpt_ujian_terakhir']}}
														</td>
														<td>
															{{$staff['id_dojang']}}
														</td>
														<td>
															<a href="/detail/<?= $staff->username ?>" class="badge badge-success">detail</a>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>

										</div>
									</div> <!-- tutup tabel -->
								</div>
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