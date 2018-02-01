@extends('layouts.frontend.master.index')
@section('content')

<!-- Main row -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="col-md-4"></div>
		{!! Form::open(array('route' => 'payment/create', 'method'=>'POST', 'files'=>true)) !!}
		<div id="customer_details" class="col2-set">
			<div class="col-md-6">
				<div class="woocommerce-billing-fields">
					<h3>Informaci&oacute;n del pago</h3>
					<div class="col-md-12"><p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
						<label class="" for="bank">Banco<abbr title="required" class="required">*</abbr>
						</label>
						{!!Form::text('bank')!!}
					</p></div>
					<div class="col-md-12"><p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
						<label class="" for="type">Tipo de pago <abbr title="required" class="required">*</abbr>
						</label>
						{!!Form::select('type', $paymentTypes)!!}
					</p></div>
					<div class="col-md-12"><p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
						<label class="" for="confirmation_code">C&oacute;digo de confirmaci&oacute;n<abbr title="required" class="required">*</abbr>
						</label>
						{!!Form::text('confirmation_code')!!}
					</p></div>
					<div class="col-md-12"><p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
						<label class="" for="amount">Monto<abbr title="required" class="required">*</abbr>
						</label>
						{!!Form::number('amount',null, ['class' => 'form-control'])!!}
					</p></div>
					<div class="col-md-12"><label class="">Fecha<abbr title="required" class="required">*</abbr>
					</label>
					<div id="datepicker" data-date=""></div>
					{!!Form::text('paymentDate',null, ['id' => 'paymentDate','placeholder' => 'DD/MM/AAAA'])!!}
</div>
					<div class="col-md-12"><p id="note" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
						<label class="" for="billing_country">Comentario
						</label>
						{!!Form::text('note')!!}
					</p></div>

					<div class="col-md-12"><p id="note" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
						<label class="" for="billing_country">Comprobante
						</label>
						{!!Form::file('paymentFile')!!}
					</p></div>
				</div>
				<button class="btn btn-success">Registrar pago</button>
				<a class="btn btn-primary" href="{{route('payments')}}">Volver</a>
			</div>
		</div>
		{!! Form::close() !!}
		<div class="col-md-4"></div>
	</section>
	
</div>
@endsection

@section('custom_script')
<script type="text/javascript">
    $(document).ready(function(){
    	$.fn.datepicker.defaults.format = "dd/mm/yyyy";
        $('#datepicker').datepicker();
        $('#datepicker').on("changeDate", function() {
		    $('#paymentDate').val(
		        $('#datepicker').datepicker('getFormattedDate')
		    );
		});

    });




</script>
@endsection