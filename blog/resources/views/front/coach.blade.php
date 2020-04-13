@extends('layout/basefront')
@section('title','Taekwondo Bulungan ISCI-Coaches')

@section('container')

<section id="fh5co-explore" data-section="explore">
	<div class="container">
		<div class="row">
			<div class="col-md-12 section-heading text-center">
				<h2 class="animate-box">Our Coach</h2>
				<!-- <div class="row">
						<div class="col-md-8 col-md-offset-2 subtext animate-box">
							<h3>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</h3>
						</div>
					</div> -->
			</div>
		</div>
	</div>
	<div class="fh5co-project">
		<div class="container">
			<div class="row">
				@foreach($data as $coach)
				<div class="col-md-4">
					<div class="fh5co-portfolio animate-box">
						<a href="#">
							<?php $url = 'images/userpicture/' . $coach->foto;
							?>
							<div class="portfolio-entry" style="background-image: url('<?=$url?>');">
								<div class="desc">
									Belt :<p>
									@if ($coach->sabuk_terakhir == 'geup_3')
													'Red (Geup 3)'
												@elseif ($coach->sabuk_terakhir =='geup_2')
													'Red strip I (Geup 2)'
												@elseif ($coach->sabuk_terakhir =='geup_1')
													'Red strip II (Geup 1)'
												@elseif ($coach->sabuk_terakhir =='DAN1')
													'Black DAN 1'
												@elseif ($coach->sabuk_terakhir =='DAN2')
													'Black DAN 2'
												@elseif ($coach->sabuk_terakhir =='DAN3')
													'Black DAN 3'
												@elseif ($coach->sabuk_terakhir =='DAN4')
													'Black DAN 4'
												@elseif ($coach->sabuk_terakhir =='DAN5')
													'Black DAN 5'
												@elseif ($coach->sabuk_terakhir =='DAN6')
													'Black DAN 6'
												@elseif ($coach->sabuk_terakhir =='DAN7')
													'Black DAN 7'
												@else
													'Black DAN 8'
												@endif</p>
									Teaching at:
									<p>{{$coach->dojang}}</p>
								</div>
							</div>
							<div class="portfolio-text text-center">
								<h3>{{$coach->nama}}</h3>

							</div>
						</a>
					</div>
				</div>
				@endforeach
			</div>

		</div>
	</div>
</section>

@endsection