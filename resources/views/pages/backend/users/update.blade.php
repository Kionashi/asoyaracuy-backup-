@extends('layouts.backend.master.index') 
@section('content')

<!-- Main row -->
<div class="content-wrapper" style="height: 853px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Usuarios <small>Panel de control</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{!!URL::route('admin')!!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="{!!URL::route('admin/users')!!}">Usuarios</a></li>
			<li class="active">Actualizar</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content col-md-5">
	
		<h2>Actualizar Quinta {{$user->house}}</h2>
		<div class="container">
		    <div class="row">
		        <div class="col-md-8">
					<div class="panel panel-default">
			            <div class="panel-body">
							{!! Form::open(array('route' => 'admin/users/update', 'class' => 'form-horizontal')) !!}
							    {!! Form::hidden('id',$user->id) !!}

								<div class="form-group{{ $errors->has('house') ? ' has-error' : '' }}">
							      	<label class="col-md-4 control-label" for="house">Quinta</label>
							      	<div class="col-md-6">
										{!! Form::text('house', $user->house , array('placeholder' => 'Quinta', 'class' => 'form-control')) !!}
										
										@if ($errors->has('house'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('house') }}</strong>
		                                    </span>
		                                @endif
							    	</div>
							    </div>

							    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							    	<label class="col-md-4 control-label" for="email">Correo electr&oacute;nico</label>
							    	<div class="col-md-6">
								    	{!! Form::email('email', $user->email , array('placeholder' => 'example@mail.com', 'class' => 'form-control')) !!}

								    	@if ($errors->has('email'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
		                                @endif
								    </div>
							    </div>
							    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
							    	<label class="col-md-4 control-label" for="phone">Tel&eacute;fono</label>
							      	<div class="col-md-6">
							    		{!! Form::text('phone', $user->phone , array('placeholder' => '(0212) 111 22 22', 'class' => 'form-control')) !!}

							    		@if ($errors->has('phone'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('phone') }}</strong>
		                                    </span>
		                                @endif
							    	</div>
							    </div>
							    @if(isset($specialFee)) 
							    <div class="form-group">
							    	<label class="col-md-4 control-label" for="specialFee">Cuota Especial Activa</label>
							      	<div class="col-md-6">
								    	{!! Form::number('specialFee', $specialFee->amount , array('placeholder' => '100', 'class' => 'form-control','readonly')) !!}
								    </div>
							    </div>
							    @endif
							    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							    	<label class="col-md-4 control-label" for="password">Contrase&ntilde;a</label>
							    	<div class="col-md-6">
							    		{!! Form::password('password', array('class' => 'form-control')) !!}
							    	</div>
							    </div>
							    <div class="form-group">
							    	<label class="col-md-4 control-label" for="password_confirmation">Confirmaci&oacute;n de contrase&ntilde;a</label>
							    	<div class="col-md-6">
							    		{!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
							    	</div>
							    </div>

							    <div class="form-group">
							    	<label class="col-md-4 control-label" for="role">Rol</label>
							    	<div class="col-md-6">
							    		{!! Form::select('role', array('USER' => 'Usuario', 'ADMIN' => 'Administrador', 'COLLECTOR' => 'Cobrador', 'DIRECTIVE' => 'Junta directiva'), ['class' => 'form-control']) !!}
							    	</div>
							    </div>
							    <div class="form-group">
							    	<label class="col-md-4 control-label" for="hasSpecialFee">¿Agregar cuota especial?</label>
							    	<div class="col-md-6">
							    		<input name="hasSpecialFee" type="checkbox">
							    	</div>
							    </div>
							    <div class="form-group">
							      	<label class="col-md-4 control-label" for="amount">Nueva cuota especial</label>
							      	<div class="col-md-6">
							    		{!! Form::number('amount','', array('class' => 'form-control')) !!}
							    	</div>
							    </div>
							    <div class="form-group">
							    	<label class="col-md-4 control-label" for="specialFee">Balance</label>
							      	<div class="col-md-6">
								    	{!! Form::number('balance', $user->balance , array('class' => 'form-control')) !!}
								    </div>
							    </div>
								
								<div class="form-group">
		                            <div class="col-md-6 col-md-offset-4">
		                                <button class="btn btn-success" type="submit">
											<i class="fa fa-btn fa-user"></i>
		                                	Guardar
		                                </button>
		                                    
		                                <a href="{{URL::route('admin/users')}}" class="btn btn-primary">Volver</a>
		                            </div>
		                        </div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class = "col-md-3"></div>
</div>
@endsection
