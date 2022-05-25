<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Orders </title><link rel="shortcut icon" href="#">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }} ">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('bower_components/font-awesome/css/font-awesome.min.css') }} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::asset('bower_components/Ionicons/css/ionicons.min.css') }} ">
  <link rel="stylesheet" href="{{ URL::asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }} ">
  <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }} ">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }} ">
  <link rel="stylesheet" href="{{ URL::asset('bower_components/select2/dist/css/select2.min.css') }} ">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('dist/css/AdminLTE.min.css') }} ">
  <link rel="stylesheet" href="{{ URL::asset('dist/css/skins/_all-skins.min.css') }} ">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">


@include('includes.header')

@include('includes.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Orders
        <small>All Orders list</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Stat</li>
      </ol>
    </section>

    <section class="content">

 <div class="row">

 <div class="col-lg-12 col-md-12 col-sm-12">


          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Orders</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Customer Email</th>
                  <th>Order Number</th>
                  <th>Order Amount</th>
                  <th>Order Date</th>
                </tr>
                </thead>
                <tbody>

                @php ($cnt = 1)
                @foreach($orders as $order)
                <tr>
                    <td class="text-center"><strong>{!! $cnt !!}</strong></td>
                    <td class="text-left"><strong>{!! $order->email !!}</strong></td>
                    <td class="text-center"><strong>{!! $order->order_number !!}</strong></td>
                    <td class="text-center"><strong>{!! $order->amount !!} $</strong></td>
                    <td class="text-left"><strong>{!! $order->order_date !!}</strong></td>
                </tr>
                <!-- begin:modal Add product -->

                @php ($cnt = $cnt + 1)
                <!-- End:modal Add Product -->
                @endforeach

                </tbody>
                <tfoot>

                </tfoot>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>

          </div>

 </div>
    </section>
  </div>

  <!-- Main Footer -->
  @include('includes.footer')

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- Select2 -->

<script src="{{ URL::asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ URL::asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ URL::asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

<script src="{{ URL::asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ URL::asset('plugins/iCheck/icheck.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('dist/js/demo.js') }}"></script>
<!-- Page script -->

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>   $('.select2').select2()
    $('#datepicker').datepicker({
        autoclose: true
    });

    var r = document.getElementById("notice-profile");
    r.className += "active";

</script>
</body>
</html>
