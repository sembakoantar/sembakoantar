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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                        <div class="form-group">
                            <label>Sub Category</label>
                            <input type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control select2" id="category" onchange="dis_category()">
                                @foreach($category as $c)
                                    <option value=""></option>
                                    <option>{{ $c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Add Category if doesnt exist</label>
                            <input type="text" class="form-control" id="add_category" placeholder="Enter Category">
                        </div>
                        <!-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Sub Category</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($sub_category as $c)
                                        <tr>
                                            <td>
                                                {{$no++}}
                                            </td>
                                            <td>
                                                {{$c->name}}
                                            </td>
                                            <td>
                                                {{$c->parent->name}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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
                }
                else{
                    document.getElementById("add_category").disabled = true;
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