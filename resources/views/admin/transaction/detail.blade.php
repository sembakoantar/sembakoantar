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
                        <h3 class="card-title">Detail Transaksi</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                    <form role="form" action="" method="">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kode</label>
                                <input type="text" class="form-control" name="Kode" value="{{ $detail[0]['code'] }}">
                            </div>
                            <div class="form-group">
                                <label>Produk</label>
                                <input type="text" class="form-control" name="Product" value="{{ $product }}">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" class="form-control" name="Category" value="{{ $category }}">
                            </div>

                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="text" class="form-control" name="Jumlah" value="{{ $detail[0]['qty'] }}">
                            </div>
                            <div class="form-group">
                                <label>Subtotal</label>
                                <input type="text" class="form-control" name="Subtotal" value="{{ $detail[0]['subtotal'] }}">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="Nama" value="{{ $detail[0]['name'] }}">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="Alamat" value="{{ $detail[0]['address'] }}">
                            </div>
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input type="text" class="form-control" name="KodePos" value="{{ $detail[0]['postal_code'] }}">
                            </div>
                            <div class="form-group">
                                <label>Kurir</label>
                                <input type="text" class="form-control" name="Kurir" value="{{ $detail[0]['kurir'] }}">
                            </div>
                            <div class="form-group">
                                <label>Status Pembayaran</label>
                                @php
                                    if($detail[0]['payment'] == 0){
                                @endphp
                                        <input type="text" class="form-control" name="Status" value="Belum Terbayar">
                                @php
                                    }
                                    else{
                                @endphp
                                        <input type="text" class="form-control" name="Status" value="Sudah Terbayar">
                                @php
                                    }
                                @endphp
                            </div>
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