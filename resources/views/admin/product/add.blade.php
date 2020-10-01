@extends('admin.layout.master')
    @section('header')
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    @endsection
    @section('body')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                    <form role="form" action="{{ route('product.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="text" class="form-control" name="photo">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="text" class="form-control" name="stock">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" name="prince">
                        </div>
                        <div class="form-group">
                            <label>Price Box</label>
                            <input type="text" class="form-control" name="price_box">
                        </div>
                       <!--  <div class="form-group">
                            <label>Brand</label>
                            <select class="form-control select2" id="brand" onchange="dis_category()" name="brand">
                                <option value=""></option>
                                @foreach($product as $p)
                                    <option value="{{ $p->id }}">{{ $p->brand}}</option>
                                @endforeach
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label>Sub Category</label>
                            <select class="form-control select2" id="subcategory" onchange="dis_category()" name="sub_category_id">
                                <option value=""></option>
                                @foreach($sub_category as $p)
                                    <option value="{{ $p->id }}">{{ $p->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control select2" id="category" onchange="dis_category()" name="category_id">
                                <option value=""></option>
                                @foreach($category as $p)
                                    <option value="{{ $p->id }}">{{ $p->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label>User</label>
                            <select class="form-control select2" id="user" onchange="dis_category()" name="user_id">
                                <option value=""></option>
                                @foreach($product as $p)
                                    <option value="{{ $p->id }}">{{ $p->user_id}}</option>
                                @endforeach
                            </select>
                        </div> -->
                       <!--  <div class="form-group">
                            <label>Add Brand if doesnt exist</label>
                            <input type="text" class="form-control" id="add_brand" placeholder="Enter Category" name="brand">
                        </div> -->
                        <!-- select -->
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            
        </div>
    </section>
    @endsection
    @section('footer')
        <!-- DataTables -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->
        
        <!-- jQuery -->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <!-- Select2 -->
        <script src="../../plugins/select2/js/select2.full.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../dist/js/demo.js"></script>
        <!-- page script -->
        <script>
            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            })

            function dis_category(){
                var s_category = document.getElementById("category");
                if(s_category.options[s_category.selectedIndex].text == ""){
                    document.getElementById("add_category").disabled = false;
                    document.getElementById("type").disabled = false;
                }
                else{
                    document.getElementById("add_category").disabled = true;
                    document.getElementById("type").disabled = true;
                    document.getElementById("add_category").value = "";
                }
            }
            
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        </script>
    @endsection
@show