<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <center>
        <h3>Taekwondo Bulungan ISCI</h3>
    </center>
    <br>
    <?php $url = 'images/userpicture/' . $data["foto"]; ?>
    <img src="{{$url}}" height="260dp" width="180dp" class="img-thumbnail">
    <br>
    <h4>Biodata</h4>
    <table class="table table-bordered">
												<thead>
													<tr>
														<th width="30%">Name</th>
														<th width="70%">{{$data['nama']}}</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															Registration Number
														</td>
														<td>
															{{$data['no_reg']}}
														</td>
													</tr>
													<tr>
											<td>
												Address
											</td>
											<td>
												{{$data['alamat']}}
											</td>
										</tr>
										<tr>
											<td>
												Phone Number
											</td>
											<td>
												{{$data['phone']}}
											</td>
										</tr>
													<tr>
														<td>
															Birth place, date
														</td>
														<td>
															<!-- <span class="badge badge-success">22</span> -->
															{{$data['tempat_lahir']}},
															{{date("d-M-Y", strtotime($data['tanggal_lahir']))}}
														</td>
													</tr>
												</tbody>
											</table>

    <h4>Additional Information</h4>
    <table class="table table-striped">
									<tbody>
										
										<tr>
											<td>
												<b>Belt / Score</b>
											</td>
											<td>
												@if ($data['sabuk_terakhir']=='white')
													'White' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_9')
													'Yellow (Geup 9)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_8')
													'Yellow strip Green (Geup 8)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_7')
													'Green (Geup 7)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_6')
													'Green strip Blue (Geup 6)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_5')
													'Blue (Geup 5)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_4')
													'Blue strip Red (Geup 4)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_3')
													'Red (Geup 3)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_2')
													'Red strip I (Geup 2)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='geup_1')
													'Red strip II (Geup 1)' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='DAN1')
													'Black DAN 1' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='DAN2')
													'Black DAN 2' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='DAN3')
													'Black DAN 3' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='DAN4')
													'Black DAN 4' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='DAN5')
													'Black DAN 5' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='DAN6')
													'Black DAN 6' / {{$data['score_ujian']}}
												@elseif ($data['sabuk_terakhir']=='DAN7')
													'Black DAN 7' / {{$data['score_ujian']}}
												@else
													'Black DAN 8' / {{$data['score_ujian']}}
												@endif
											</td>
											</tr>
											<tr>
												<td>
													<b>Exam. Place</b>
												</td>
												<td>
													{{$data['tmpt_ujian_terakhir']}}
												</td>
											</tr>
										<tr>
											<td>
												<b>Dojang</b>
											</td>
											<td>
												<b>{{$dojang['nama']}}</b><br>
												{{$dojang['alamat']}}

											</td>
										</tr>
									</tbody>
								</table>


    <h4>Achievements</h4>
    <table class="table table-bordered">
									<thead class="thead-light">
										<tr>
											<th>ID Achievement</th>
											<th>Event/Tournament</th>
											<th>Date</th>
											<th>Place</th>
											<th>Medal</th>
											<th>Attachment</th>
											<th>Additional info</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($achievs as $medal)
										@if($medal['status'] == 'terkonfirmasi')

										<tr>
											<td>
												{{$medal['id']}}
											</td>
											<td>
												{{$medal['nama_event']}}
											</td>
											<td>
												{{$medal['tanggal_event']}}
											</td>
											<td>
												{{$medal['tempat_event']}}
											</td>
											<td>
												{{$medal['medali']}}
											</td>
											<td>
												<a href="/getfile/<?= $medal->id ?>">{{$medal['lampiran']}}</a>

											</td>
											<td>
												{{$medal['keterangan']}}
											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>

</body>

</html>