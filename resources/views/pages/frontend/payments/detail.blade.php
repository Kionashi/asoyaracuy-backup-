@extends('layouts.frontend.master.index')
@section('content')

<!-- Main row -->
<div class="content-wrapper">
	<!-- Main content -->
	<div class="row">
		<div class="col-md-3"></div>
		<section class="content col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Detalles del pago</div>
				<div class="panel-body"><span style="font-weight: bold;">Banco: </span>{{$payment->bank}}</div>
				<div class="panel-body"><span style="font-weight: bold;">C&oacute;digo de confirmaci&oacute;n: </span>{{$payment->confirmation_code}}</div>
				<div class="panel-body"><span style="font-weight: bold;">Fecha de pago: </span>{{$payment->date}}</div>
				<div class="panel-body"><span style="font-weight: bold;">Monto: </span>{{$payment->amount}}</div>
				<div class="panel-body"><span style="font-weight: bold;">Estado del pago: </span>
					@if($payment->status == 'PENDING')
						En revisión
					@elseif($payment->status == 'APPROVED')
						Aprobado
					@elseif($payment->status == 'REJECTED')
						Rechazado
					@endif	

				</div>
				<div class="panel-body"><span style="font-weight: bold;">Tipo de pago: </span>
					@if($payment->type == 'DEPOSIT')
						Deposito
					@elseif($payment->type == 'TRANSFERENCE')
						Transferencia
					@endif		
				</div>
				<div class="panel-body"><span style="font-weight: bold;">Nota: </span>{{$payment->note}}</div>
				<a class="panel-body" href="{{asset($payment->file)}}" target="_blank">
					<img src="{{asset($payment->file)}}" class="img-responsive">
				</a>
			</div>
			<a href="{{route('payment/download', $payment->id)}}"><button class="btn btn-success">Descargar Factura</button></a>

			<a href="{{route('payments')}}"><button class="btn btn-primary">Volver</button></a>
		</section>
		<div class="col-md-3"></div>
	</div>
</div>
@endsection
