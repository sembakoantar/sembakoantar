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
                    
                    
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                    <!-- title row -->
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                            <h3>Penerima</h3>
                                <b>Nama: </b>{{ ucfirst($penerima->name) }}<br>
                                <b>Alamat: </b>{{ ucfirst($penerima->address) }}<br>
                                <b>Kode: </b>{{ ucfirst($penerima->code) }}
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                            <!-- To
                            <address>
                                <strong>John Doe</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (555) 539-1037<br>
                                Email: john.doe@example.com
                            </address> -->
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <br>
                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                <th>Qty</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $st = 0; ?>
                                @foreach($detail as $d)
                                    <tr>
                                        <td>{{ $d->qty }}</td>
                                        <td>{{ $d->product->name }}</td>
                                        <td>{{ $d->product->price }}</td>
                                        <td>{{ number_format($d->subtotal,2,",",".") }}</td>
                                        <?php $st += $d->subtotal; ?>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            
                            <div class="col-6">

                                <div class="table-responsive">
                                    <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>{{ number_format($st,2,",",".") }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping:</th>
                                        <td>{{ number_format(20000,2,",",".") }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td><?php echo number_format($st+20000,2,",",".") ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status Pembayaran:</th>
                                        <td><?php if($penerima->payment == 1){echo "sudah";}
                                        else{echo "belum";} ?> terbayar</td>
                                    </tr>
                                    </table>
                                </div>
                                <a href="{{ route('admin.transaction') }}"><button type="button" class="btn btn-primary">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-backspace-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
                                    </svg> Back
                                </button></a>
                            </div>
                            
                            <!-- /.col -->
                        </div>
                        
                        <!-- this row will not appear when printing -->
                        <!-- <div class="row no-print">
                            <div class="col-12">
                            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                Payment
                            </button>
                            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Generate PDF
                            </button>
                            </div>
                        </div> -->
                    </div>
                    
                    <!-- /.invoice -->
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