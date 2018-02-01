@extends('layouts.frontend.master.index')
@section('content')
	<div class="slider-area">
        	<!-- Slider -->
			<!-- <div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img alt="Asoyaracuy" src="{!! asset('frontend/img/carousel/h4-slide.png') !!}">
					</li>
					<li>
						<img alt="Asoyaracuy" src="{!! asset('frontend/img/carousel/h4-slide2.png') !!}">
					</li>
					<li>
						<img alt="Asoyaracuy" src="{!! asset('frontend/img/carousel/h4-slide3.png') !!}">
					</li>
					<li>
						<img alt="Asoyaracuy" src="{!! asset('frontend/img/carousel/h4-slide4.png') !!}">
					</li>
				</ul>
			</div> -->
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <a class="white" href="{{route('profile')}}">
                            <i class="fa fa-user"></i>
                            <p>Perfíl</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <a class="white" href="{{route('payments')}}">
                            <i class="fa fa-id-card"></i>
                            <p>Estado de cuenta</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo disabled">
                        <i class="fa fa-lock"></i>
                        <p>Solicitudes</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo disabled">
                        <i class="fa fa-lock"></i>
                        <p>Contacto</p>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo disabled">
                        <i class="fa fa-lock"></i>
                        <p>Clasificados</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo disabled">
                        <i class="fa fa-lock"></i>
                        <p>Eventos</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo disabled">
                        <i class="fa fa-lock"></i>
                        <p>Documentos</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo disabled">
                        <i class="fa fa-lock"></i>
                        <p>Directiva</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
@endsection
