@extends('layouts.backend.master.index') 
@section('content')

<!-- Main row -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Usuarios <small>Panel de control</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!!URL::route('admin')!!}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Usuarios</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="table-responsive" style="overflow-x: hidden; ">
            <table id="dataTable" class="table table-bordered table-striped" style="overflow-x: hidden;">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Casa</th>
                    <th>Tel&eacute;fono</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Balance</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <?php $i = 1;?>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->house }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->role == 'USER')
                            Usuarios
                        @elseif($user->role == 'DIRECTIVE')
                            Directivo
                        @elseif($user->role == 'ADMIN')
                            Administrador
                        @else
                            {{ $user->role }}
                        @endif
                    </td>
                    <td>{{ $user->balance }}</td>
                    <td><a href="{{URL::route('admin/users/',$user->id)}}"><button class="btn btn-primary">Detalle</button></a></td>
                </tr>
                @endforeach
            </table>
        </div>
        <a href="{{URL::route('admin/users/create')}}"><button class="btn btn-success">Agregar</button></a>
    </section>
</div>
@endsection
