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
						<a href="#">Home</a>
						<i class="fa fa-angle-right"></i>
						<span>Dojang</span>
					</h2>
				</div>
				<!--//banner-->

				<!--grid-->
				<div class="typo-grid">

					<div class="typo-1">

						<div class="grid_3 grid_4">
							<h3 class="head-top">New Dojang Form</h3>
							@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
									<li>
										<h6>{{ $error }}</h6>
									</li>
									@endforeach
								</ul>
							</div>
							@endif
							<h4 class="head-top">Dojang Details</h5>

								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<div calss="container">
											@if(Session::get('form_mode')=='edit')
												<form action="/editdojang" method="POST" enctype="multipart/form-data">
											@else
												<form action="/newdojang" method="POST" enctype="multipart/form-data">
											@endif
													{{ csrf_field() }}
													<div class="form-group">
														<label for="nama">Dojang's Name </label>
														@if(Session::get('form_mode')=='edit')
														<input type="text" class="form-control" id="nama" name="nama" placeholder="Dojang's Name" value="{{ $data->nama }}">
														@else
														<input type="text" class="form-control" id="nama" name="nama" placeholder="Dojang's Name" value="{{ old('nama') }}">
														@endif
													</div>
													<div class="form-group">
														<label for="alamat">Address </label>
														@if(Session::get('form_mode')=='edit')
														<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Dojang's Address" value="{{ $data->alamat }}">
														@else
														<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Dojang's Address" value="{{ old('alamat') }}">
														@endif
													</div>
													<div class="form-group">
														<label for="alamat">Phone Number </label>
														@if(Session::get('form_mode')=='edit')
														<input type="text" class="form-control" id="phone" name="phone" placeholder="Dojang's Phone Number" value="{{ $data->phone }}">
														@else
														<input type="text" class="form-control" id="phone" name="phone" placeholder="Dojang's Phone Number" value="{{ old('phone') }}">
														@endif
													</div>
													<input type="hidden" name="id" value="{{ $data->id }}">

													<button type="submit" class="btn btn-primary">Submit</button>
												</form>
											</div>
										</div> <!-- tutup tabel -->
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