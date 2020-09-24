@extends('admin.layout.master')
    @section('header')
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Admin</h1>
            </div>
            <!-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Blank Page</li>
                </ol>
            </div> -->
            </div>
        </div><!-- /.container-fluid -->
        </section>
    @endsection
    @section('body')
    <section class="content">

        <!-- Default box -->
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dashboard</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            Selamat datang di halaman admin
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    @endsection
    @section('footer')
        
    @endsection
@show