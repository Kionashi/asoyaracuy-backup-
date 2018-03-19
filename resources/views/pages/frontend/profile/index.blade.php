@extends('layouts.frontend.master.index')
@section('content')

<div class="wrapper">
	<div class="container">

        <h3>Actualizar datos</h3>
        {!! Form::open(['route' => 'profile']) !!}				
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		{!! Form::hidden('id',$user->id) !!}
		<div id="customer_details" class="col2-set">
			<div class="col-1">
				<div class="woocommerce-billing-fields">
					<label class="" for="house">Quinta</label>
					{!! Form::text('house', $user->house, array('class' => 'form-control', 'disabled','style' => 'padding-top: 2px; padding-bottom: 2px;')) !!}
					<label class="" for="phone">Tel&eacute;fono</label>
					{!! Form::text('phone', $user->phone, array('placeholder' => 'Tel&eacute;fono', 'class' => 'form-control')) !!}
					<label class="" for="email">Email</label>
					{!! Form::email('email', $user->email, array('placeholder' => 'Correo electrónico', 'class' => 'form-control')) !!}
				</div>
			</div>
			@if($errors->any())
			<p style="color:red">{{$errors->all()}}</p>
			@endif
		</div>
		<button class="btn btn-success" style="margin-top: 1em; margin-bottom: 1em;">Enviar</button>
		<a href="{{route('profile/update-password')}}" class="btn btn-primary" style="margin-top: 1em; margin-bottom: 1em;">Actualizar Contraseña</a>
		{!! Form::close() !!}
	        
	</div>
</div>

@endsection
