@extends('layouts.frontend.master.index')
@section('content')

<div class="wrapper">
	<div class="container">
		
		<ul class="nav nav-tabs">
	        <li class="active"><a data-toggle="tab" href="#sectionA">Actualizar Datos</a></li>
	        <li><a data-toggle="tab" href="#sectionB">Registro de pagos</a></li>	      
	    </ul>

		<div class="tab-content">
	        <div id="sectionA" class="tab-pane fade in active">
	            <h3>Actualiza datos</h3>
	            {!! Form::open(['id' => 'update-profile-form']) !!}				
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div id="customer_details" class="col2-set">
					<div class="col-1">
						<div class="woocommerce-billing-fields">
							<h3>Informaci&oacute;n del usuario</h3>
							<label class="" for="house">Quinta</label>
							{!! Form::text('house', $user->house, ['readonly']) !!}
							<label class="" for="phone">Tel&eacute;fono</label>
							{!! Form::text('phone', $user->phone, array('placeholder' => 'Tel&eacute;fono')) !!}
							<label class="" for="email">Email</label>
							{!! Form::email('email', $user->email, array('placeholder' => 'Correo electrónico')) !!}
							<label class="" for="password">Contrase&ntilde;a</label>
							{!! Form::password('password', '') !!}
							<label class="" for="password_confirmation">Confirmaci&oacute;n de contrase&ntilde;a</label>
							{!! Form::password('password_confirmation', '') !!}
						</div>
					</div>
					@if($errors->any())
					<p style="color:red">{{$errors->all()}}</p>
					@endif
				</div>
				<button class="btn btn-success">Actualizar datos</button>
				{!! Form::close() !!}
	        </div>
	        <div id="sectionB" class="tab-pane fade">
	            <div id="customer_details" class="col2-set">
		            <h3>Historial de pagos</h3>
					<div class="table-responsive">
					@if(count($payments) > 0)
					<a href="{{route('profile/payment/add')}}"><button class="btn btn-success">Registrar pago</button></a>
					  	<table class="table">
					    	<thead>
					    	<tr>
							  <th>#</th>
							  <th>Tipo de pago</th>
							  <th>Estado</th>
							  <th>Codigo de confirmación</th>
							  <th>Fecha de pago</th>
							  <th>Monto</th>
							  <th>Acci&oacute;n</th>
							</tr>
					    	</thead>
					    	<?php $i = 1;?>
					    	@foreach ($payments as $payment)
					    	<tr>
							  <td>{{ $i++ }}</td>
							  <td>
							  	@if($payment->type == 'DEPOSIT')
									Deposito
								@elseif($payment->type == 'TRANSFERENCE')
									Transferencia
								@endif
							  </td>
							  <td>
							  	@if($payment->status == 'PENDING')
									En revisión
								@elseif($payment->status == 'APPROVED')
									Aprobado
								@elseif($payment->status == 'REJECTED')
									Rechazado
								@endif	
							  </td>
							  <td>{{ $payment->confirmation_code }}</td>
							  <td>{{ $payment->date }}</td>
							  <td>{{ $payment->amount }}</td>
							  <td><a href="{{route('profile/payment/detail', $payment->id)}}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></td>
							</tr>
							@endforeach
						</table>
					@else
						<p>No se han realizado pagos todav&iacute;a</p>
					@endif
					</div>
					<a href="{{route('profile/payment/add')}}"><button class="btn btn-success">Registrar pago</button></a>
					<br />
				</div>
			</div>
        </div>
	</div>
</div>

@endsection
