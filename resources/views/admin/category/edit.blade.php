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
                        <h3 class="card-title">Edit Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                    <form role="form" action="{{ route('category.update',$sub_category->id) }}" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="card-body">
                        <div class="form-group">
                            <label>Sub Category</label>
                            <input type="text" class="form-control" name="sub_category" value="{{ $sub_category->name }}">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control select2" id="category" name="category_id">
                                @foreach($category as $c)
                                    <?php
                                        if($sub_category->category_id == $c->id){?>
                                            <option value="{{ $c->id }}" selected="selected">{{ $c->name}}</option>
                                        <?php }
                                        else{?>
                                            <option value="{{ $c->id }}">{{ $c->name}}</option>
                                        <?php }
                                    ?> 
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Type produk</label>
                            <select class="form-control" name="type" id="type">
                            <?php
                                if($c->type == "makanan"){?>
                                    <option value="makanan" selected="selected">Makanan</option>
                                    <option value="minuman">Minuman</option>
                                <?php }
                                else{?>
                                    <option value="makanan">Makanan</option>
                                    <option value="minuman" selected="selected">Minuman</option>
                                <?php }
                            ?>
                            </select>
                        </div>
                        </div>
                        

                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    
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
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- DataTables -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <!-- Select2 -->
        <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('dist/js/demo.js') }}"></script>
        <!-- page script -->
        <script>
            //Initialize Select2 Elements
            //$('.select2').select2({
                //theme: 'bootstrap4'
           // })
            
            
        </script>
    @endsection
@show