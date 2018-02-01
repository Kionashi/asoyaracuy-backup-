@extends('layouts.frontend.master.index')
@section('content')

<div class="wrapper">
	<div class="container">
        <div id="customer_details" class="col2-set">
            <h3>Historial de pagos</h3>
			<div class="table-responsive">
			@if(count($payments) > 0)
			<a href="{{route('payment/create')}}"><button class="btn btn-success">Registrar pago</button></a>
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
					  <td><a href="{{route('payment/detail', $payment->id)}}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></td>
					</tr>
					@endforeach
				</table>
			@else
				<p>No se han realizado pagos todav&iacute;a</p>
			@endif
			</div>
			<a href="{{route('payment/create')}}"><button class="btn btn-success">Registrar pago</button></a>
			<br />
		</div>
	</div>
</div>

@endsection
