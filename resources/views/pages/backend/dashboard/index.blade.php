@extends('layouts.backend.master.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Panel de Administración</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Panel de control</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$totalFunding}}</h3>

              <p>Ingresos (Bs)</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('admin/payments')}}" class="small-box-footer">M&aacute;s info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$debtorsCount}}<sup style="font-size: 20px"></sup></h3>

              <p>Deudores</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            {!! Form::open(array('route' => 'admin/users','id' => 'debtorsForm')) !!}
            {!! Form::hidden('filter','debtors') !!}
            {!! Form::close() !!}
            <a class="small-box-footer" style="cursor: pointer;" id="debtors">M&aacute;s info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$usersCount}}</h3>

              <p>Usuarios activos</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('admin/users')}}" class="small-box-footer">M&aacute;s info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$paymentsCount}}</h3>

              <p>Pagos Pendientes</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            {!! Form::open(array('route' => 'admin/payments','id' => 'pendingPaymentsForm')) !!}
            {!! Form::hidden('filter','pending') !!}
            {!! Form::close() !!}
            <a class="small-box-footer" style="cursor: pointer;" id="pendingPayments">M&aacute;s info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('custom_script')
  <script type="text/javascript">
    $(document).ready(function(){
      
      $('#debtors').click(function(){
        $('#debtorsForm').submit();
      });
      $('#pendingPayments').click(function(){
        $('#pendingPaymentsForm').submit();
      });
      
    });
  </script>
@endsection