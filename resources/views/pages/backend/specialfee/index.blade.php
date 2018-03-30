@extends('layouts.backend.master.index') 
@section('content')

<!-- Main row -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Cuotas Especiales <small>Panel de control</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{!!URL::route('admin')!!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">Cuotas Especiales</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="table-responsive" style="overflow-x: hidden;">
		    <table id="dataTable" class="table table-bordered table-striped">
		    	<thead>
		    	<tr>
				    <th>#</th>
				    <th>Usuario</th>
				    <th>Cuota Especial</th> 
				    <th>Acciones</th>
				</tr>
		    	</thead>
		    	<?php $i = 1;?>
		    	@foreach ($specialFees as $specialFee)
		    	<tr>
				    <td>{{ $i++ }}</td>
				    <td>{{ $specialFee->user->house }}</td>
				    <td>{{ $specialFee->amount }}</td>
				    <td><a href="{{URL::route('admin/specialfees/delete/',$specialFee->id)}}"><button class="btn btn-primary">Borrar</button></a></td>
				</tr>
				@endforeach
			</table>
		</div>
	</section>
</div>
@endsection
