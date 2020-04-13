@extends('layout/headerfooter')
@section('title','Taekwondo Bulungan ISCI')

@section('panel')

<body>
	<div id="wrapper">

		<div id="page-wrapper" class="gray-bg dashbard-1">
			<div class="content-main">
				<!--banner-->
				<div class="banner">
					<h2>
						<a href="#l">Home</a>
						<i class="fa fa-angle-right"></i>
						<span>Achievements</span>
					</h2>
				</div>
				<!--//banner-->

				<!--grid-->
				<div class="typo-grid">

					<div class="typo-1">

						<div class="grid_3 grid_4">
							<h3 class="head-top">Prestasi</h3>
							@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
							@endif

							<a href="/system">
								<h4 class="head-top" style="float: left">>> Displayed Coaches</h4>
							</a>
							<a href="/dojang">
								<h4 class="head-top" style="float: right">Dojang's Table</h4>
							</a><br><br>
							<a href="/adddojang" class="btn btn-light">Register New Dojang</a>
							<div class="tab-content" id="nav-tabContent">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<div calss="container">

												<table class="table table-bordered">
													<thead class="thead-light">
														<tr>
															<th>Dojang ID</th>
															<th>Dojang's Name</th>
															<th>Address</th>
															<th>Phone Number</th>
															<th>Actions</th>
														</tr>
													</thead>
													<tbody>
														@foreach ($data as $dojang)
														<tr>
															<td>
																{{$dojang['id']}}
															</td>
															<td>
																{{$dojang['nama']}}
															</td>
															<td>
																{{$dojang['alamat']}}
															</td>
															<td>
																{{$dojang['phone']}}
															</td>
															<td>
																<a href="/editdojang/<?= $dojang->id ?>" class="badge badge-success">edit</a>
																<a href="/deletedojang/<?= $dojang->id ?>" onclick="return confirm('WARNING !!! Are you sure to delete this dojang ?')" class="badge badge-danger">delete</a>
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