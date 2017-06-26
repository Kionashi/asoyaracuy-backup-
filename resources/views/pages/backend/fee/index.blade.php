@extends('layouts.backend.master.index') 
@section('content')

<!-- Main row -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Cobranzas <small>Panel de control</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{!!URL::route('admin')!!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">Cobranzas</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-6">
				<h4>Cuota Actual</h4>
			</div>
			<div class="col-md-6">
				@if(isset($fee))
					<h4>{{$fee->amount}}</h4> 
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h4>Última Cobranza</h4>
			</div>
			<div class="col-md-6">
				@if(isset($fee))
					<h4>{{$fee->last_collection}}</h4> 
				@endif
			</div>
		</div>
		<div class="row">

			<div class="col-md-6">
				<h4>Nueva Cuota</h4>
			</div>
			<div class="col-md-4">
				{!! Form::open(array('route' => 'admin/fees/store', 'class' => 'form-horizontal')) !!}
					<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
							{!! Form::number('amount', null , array('placeholder' => 'Cantidad', 'class' => 'form-control')) !!}
							
							@if ($errors->has('amount'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('amount') }}</strong>
	                            </span>
	                        @endif
				    </div>

				    <div class="form-group">
	                        <button class="btn btn-success" type="submit">
								<i class="fa fa-btn fa-user"></i>
	                        	Guardar
	                        </button>
	                            
	                </div>
				{!! Form::close() !!}
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">REALIZAR COBRANZA</button>
        			<a href="{{URL::route('admin')}}" class="btn btn-primary">Volver</a>
			</div>
		</div>	
	</section>
</div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Realizar cobranza</h4>
        </div>
        <div class="modal-body">
          <p>¿Esta seguro que desea realizar la cobranza?</p>
          <p>Esta acción no se puede deshacer</p>
        </div>
        <div class="modal-footer">
          <a href="{{URL::route('admin/fees/collect')}}" class="btn btn-danger" >Confirmar</a><button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      
    </div>
  </div>
  

@endsection
