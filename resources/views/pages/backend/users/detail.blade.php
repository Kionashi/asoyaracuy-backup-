@extends('layouts.backend.master.index') 
@section('content')

<!-- Main row -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Pagos <small>Panel de control</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{!!URL::route('admin')!!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="{!!URL::route('admin/users')!!}">Usuarios</a></li>
			<li class="active">Detalle</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<h2>Usuario</h2>
		<div class="panel panel-primary">
			<div class="panel-heading">Detalles del usuario</div>
			<div class="panel-body"><span>Quinta: </span>{{$user->house}}</div>
			<div class="panel-body"><span>Tel&eacute;fono: </span>{{$user->phone}}</div>
			<div class="panel-body"><span>Email: </span>{{$user->email}}</div>
			<div class="panel-body"><span>Rol: </span>
				@if($user->role == 'USER')
                    Usuarios
                @elseif($user->role == 'DIRECTIVE')
                    Directivo
                @elseif($user->role == 'ADMIN')
                    Administrador
                @else
                    {{ $user->role }}
                @endif
			</div>
			@if(isset($specialFee))
				<div class="panel-body"><span>Cuota especial: </span>{{$specialFee->amount}}</div>	
			@endif
		</div>
		
		<a href="{{URL::route('admin/users/edit/', $user->id)}}"><button class="btn btn-success">Editar</button></a>
		<a href="{{URL::route('admin/users/delete/', $user->id)}}"><button class="btn btn-danger">Eliminar</button></a>
		<a href="{{URL::route('admin/users')}}"><button class="btn btn-primary">Volver</button></a>
	</section>
	
</div>
@endsection
