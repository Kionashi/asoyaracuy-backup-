<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Asoyaracuy | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        {!!Html::style('backend/css/bootstrap.min.css')!!}
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        {!!Html::style('backend/css/AdminLTE.min.css')!!}
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        {!!Html::style('backend/css/skins/_all-skins.min.css')!!}
        <!-- iCheck -->
        {!!Html::style('backend/css/plugins/iCheck/flat/blue.css')!!}
        <!-- Date Picker -->
        {!!Html::style('backend/css/plugins/datepicker/datepicker3.css')!!}
        <!-- Data Tables -->
        {!!Html::style('backend/css/plugins/datatabkes/dataTables.bootstrap.min.css')!!}
        <!-- Daterange picker -->
        {!!Html::style('backend/css/plugins/daterangepicker/daterangepicker-bs3.css')!!}
        <!-- bootstrap wysihtml5 - text editor -->
        {!!Html::style('backend/css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')!!}
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="hold-transition skin-blue sidebar-mini" style="min-height: 100%;">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="{{route('home')}}" class="logo">
                  <!-- mini logo for sidebar mini 50x50 pixels -->
                  <span class="logo-mini"><b>AsoY</b></span>
                  <!-- logo for regular state and mobile devices -->
                  <span class="logo-lg"><b>Asoyaracuy</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                  <!-- Sidebar toggle button-->
                  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                  </a>
            
                  <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                      <!-- User Account: style can be found in dropdown.less -->
                      <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <img alt="Imagen de usuario" src="{!! asset('backend/img/user2-160x160.jpg') !!}" class="user-image">
                          <span class="hidden-xs">{{$auth->house}}</span>
                        </a>
                        <ul class="dropdown-menu">
                          <!-- User image -->
                          <li class="user-header">
                            <img alt="Imagen de usuario" src="{!! asset('backend/img/user2-160x160.jpg') !!}" class="img-circle">
            
                            <p>
                              Quinta - {{$auth->house}}
                              <small>&Uacute;ltima actualizaci&oacute;n {{$auth->updated_at}}</small>
                            </p>
                          </li>
                          <!-- Menu Footer-->
                          <li class="user-footer">
                            <div class="pull-left">
                              <a href="{{route('profile')}}" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                              <a href="{{route('logout')}}" class="btn btn-default btn-flat">Cerrar Sessi&oacute;n</a>
                            </div>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </nav>
              </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img alt="Imagen de usuario" src="{!! asset('backend/img/user2-160x160.jpg') !!}" class="img-circle">
                        </div>
                        <div class="pull-left info">
                            <p>{{$auth->house}}</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MEN&Uacute; PRINCIPAL</li>
                        <li class="active treeview">
                            {!! HTML::decode(link_to_route('admin', '<i class="fa fa-dashboard"></i><span>Panel de Control</span>')) !!}
                        </li>
                        <li class="treeview">

                            @if($paymentsCount > 0)
                            {!! HTML::decode(link_to_route('admin/payments', '<i class="fa fa-money"></i> <span>Pagos</span> <span class="label label-primary pull-right">'.$paymentsCount.'</span>')) !!}
                            @else
                            {!! HTML::decode(link_to_route('admin/payments', '<i class="fa fa-files-o"></i> <span>Pagos</span>')) !!}
                            @endif
                            
                        </li>
                        <li>
                            {!! HTML::decode(link_to_route('admin/users', '<i class="fa fa-users"></i><span>Usuarios</span>')) !!}
                        </li>
                        <li>
                            {!! HTML::decode(link_to_route('admin/specialfees', '<i class="fa fa-star-o"></i><span>Cuotas Especiales</span>')) !!}
                        </li>
                        <li>
                            {!! HTML::decode(link_to_route('admin/fees', '<i class="fa fa-usd" aria-hidden="true"></i><span>Cobranzas</span>')) !!}
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            @yield('content')
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.2
                </div>
                <strong>Copyright &copy; 2016 Desarrollado por <a href="http://www.cyberia-server.com.ve" target="_blank">Cyberia LabTech</a></strong>.
            </footer>
        </div>
        <!-- jQuery 2.1.4 -->
        {!!Html::script('backend/js/plugins/jQuery/jQuery-2.1.4.min.js')!!}
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.5 -->
        {!!Html::script('backend/js/bootstrap.min.js')!!}
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        {!!Html::script('backend/js/plugins/daterangepicker/daterangepicker.js')!!}
        <!-- datepicker -->
        {!!Html::script('backend/js/plugins/datepicker/bootstrap-datepicker.js')!!}
        <!-- Bootstrap WYSIHTML5 -->
        {!!Html::script('backend/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')!!}
        <!-- Slimscroll -->
        {!!Html::script('backend/js/plugins/slimScroll/jquery.slimscroll.min.js')!!}
        <!-- FastClick -->
        {!!Html::script('backend/js/plugins/fastclick/fastclick.js')!!}
        <!-- DataTables -->
        {!!Html::script('backend/js/plugins/datatables/jquery.dataTables.min.js')!!}
        {!!Html::script('backend/js/plugins/datatables/dataTables.bootstrap.min.js')!!}
        <!-- AdminLTE App -->
        {!!Html::script('backend/js/app.min.js')!!}
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        {!!Html::script('backend/js/dashboard.js')!!}
        <!-- AdminLTE for demo purposes -->
        {!!Html::script('backend/js/demo.js')!!}
        <script type="text/javascript">
            $(document).ready(function(){
                $('#dataTable').DataTable({
                    language: {
                        "emptyTable":     "No hay información disponible para esta tabla",
                        "info":           "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                        "infoEmpty":      "Mostrando 0 a 0 de 0 entradas",
                        "infoFiltered":   "(filtrado de _MAX_ entradas totales)",
                        "infoPostFix":    "",
                        "thousands":      ",",
                        "lengthMenu":     "Mostrar _MENU_ entradas",
                        "loadingRecords": "Cargando...",
                        "processing":     "Procesando...",
                        "search":         "Buscar:",
                        "zeroRecords":    "No se encontraron resultados",
                        "paginate": {
                            "first":      "Primero",
                            "last":       "Última",
                            "next":       "Siguiente",
                            "previous":   "Anterior"
                        },
                    }
                });
            });
        </script>
        
        @yield('custom_script')
    </body>
</html>