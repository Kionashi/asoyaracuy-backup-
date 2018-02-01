@extends('layouts.frontend.master.index')
@section('content')

<div class="wrapper">
	<div class="container">

        <h3>Actualizar datos</h3>
        {!! Form::open(['route' => 'profile/update-password']) !!}				
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div id="customer_details" class="col2-set">
			<div class="col-md-12">
				<div class="woocommerce-billing-fields">
					<label class="" for="password">Contrase&ntilde;a</label>
					{!! Form::password('password',array('class' => 'form-control')) !!}
					<label class="" for="passwordConfirmation">Confirmaci&oacute;n de contrase&ntilde;a</label>
					{!! Form::password('passwordConfirmation',array('class' => 'form-control')) !!}
				</div>
			</div>
			@if($errors->any())
			<p style="color:red">{{$errors->all()}}</p>
			@endif
		</div>
		<button class="btn btn-success" style="margin-top: 1em; margin-bottom: 1em;">Actualizar contraseña</button>
		<a href="{{route('profile')}}" class="btn btn-primary" style="margin-top: 1em; margin-bottom: 1em;">Volver</a>
		{!! Form::close() !!}
	        
	</div>
</div>

@endsection
