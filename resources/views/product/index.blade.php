<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Products</title><link rel="shortcut icon" href="#">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('bower_components/select2/dist/css/select2.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('dist/css/skins/_all-skins.min.css') }}">

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
      Products
        <small>All Product list</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Stat</li>
      </ol>
    </section>

    <!-- Main content -->


    <section class="content">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="alert alert-success alert-dismissible" style="display: none;" id="truemsg"> </div>

    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal_product">+ Add Product</a>
        </div>
    </div>
    <br/>

    <!-- begin:modal Edit product -->
    <div id="myModal_product_edit" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <center>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title">Edit Product</h3><br>
                            </div>
                        </center>
                        <div class="modal-body" >
                            <form class="form-horizontal" method="POST" action="{{ url('admin/edit_product') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <input type="hidden" name="pid" id="prod_id" />
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Brand Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="brand_name" class="form-control" id="name_e" placeholder="Enter Brand Name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1_e" class="col-sm-2 control-label">Product Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="prod_desc" id="exampleFormControlTextarea1_e" cols="2" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1_e" class="col-sm-2 control-label">Product Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="prod_img" class="form-control-file" id="exampleFormControlFile1_e">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pprice_e" class="col-sm-2 control-label"> Price</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="prod_price" class="form-control" id="pprice_e" placeholder="100" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="qtt_e" class="col-sm-2 control-label">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="quantity" class="form-control" id="qtt_e" placeholder="100" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-sm-9"></div>
                                    <div class="col-sm-3"><input class="btn btn-primary" type="submit" value="Update"></div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-hover btn-primary btn-sm" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End:modal Edit Product -->

    <!-- begin:modal Add product -->
    <div id="myModal_product" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <center>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title">Add Product</h3><br>
                            </div>
                        </center>
                        <div class="modal-body" >
                            <form class="form-horizontal" method="POST" action="{{ url('admin/add_product') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Brand Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="brand_name" class="form-control" id="name" placeholder="Enter Brand Name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="col-sm-2 control-label">Product Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="prod_desc" id="exampleFormControlTextarea1" cols="2" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1" class="col-sm-2 control-label">Product Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="prod_img" class="form-control-file" id="exampleFormControlFile1" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label"> Price</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="prod_price" class="form-control" id="name" placeholder="100" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="quantity" class="form-control" id="name" placeholder="100" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-sm-9"></div>
                                    <div class="col-sm-3"><input class="btn btn-primary" type="submit" value="Submit"></div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-hover btn-primary btn-sm" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End:modal Add Product -->

 <div class="row">

 <div class="col-lg-12 col-md-12 col-sm-12">


          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Products</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Brand Name</th>
                  <th>Details</th>
                  <th>Quantity</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @php ($cnt = 1)
                @foreach($products as $product)
                <tr>
                    <td class="text-center"><strong>{!! $cnt !!}</strong></td>
                    <td class="text-left"><strong>{!! $product->name !!}</strong></td>
                    <td class="text-left"><strong>{!! $product->description !!}</strong></td>
                    <td class="text-left"><strong>{!! $product->quantity !!}</strong></td>
                    <td class="text-center"><img src="{{ URL::asset('products_images')}}{{ '/'.$product->image }}" width="100" height="100" class="img-responsive"/></td>

                    <td class="text-right"><strong>{!! $product->price !!} $</strong></td>
                    <td class="text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn btn-success" data-toggle="modal" onclick="return editProduct({{ $product->id }})" href="#">Update</a>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#delete_product_{{ $product->id }}">Delete</a>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </td>

                    <div id="delete_product_{{ $product->id }}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content" >
                            <center>
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h3 class="modal-title">Delete Product Confirmation</h3><br>
                                </div>
                            </center>
                            <div class="modal-body" >
                                <p>
                                    Are you sure want to Delete this product?{{ $product->id }}
                                </p>
                                <form class="form-horizontal" method="get" action="del_product/{{ $product->id }}">
                                    {{csrf_field()}}
                                    <br>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <button type="button" class="btn btn-hover btn-primary btn-sm" data-dismiss="modal">Cancel</button>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="btn btn btn-hover btn-danger btn-sm" type="submit" value="Yes, Delete">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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

<script type="text/javascript">

    function editProduct (id) {

        $.ajax({
            url: '{{ route('product.details') }}',
            method: "get",
            data: {
                _token: '{{ csrf_token() }}',
                user_id: id
            },
            success: function (response) {
                if(response){

                    var obj = $.parseJSON(response);

                    $('#myModal_product_edit').modal("show");
                    $('#prod_id').val(obj.id);
                    $('#name_e').val(obj.name);
                    $('#exampleFormControlTextarea1_e').val(obj.description);
                    $('#pprice_e').val(obj.price);
                    $('#qtt_e').val(obj.quantity);
                }
            }
        });
    }
</script>

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

<script>

    $('.select2').select2()

    $('#datepicker').datepicker({
        autoclose: true
    });

    var r = document.getElementById("schedule");
    r.className += "active";

</script>
</body>
</html>
