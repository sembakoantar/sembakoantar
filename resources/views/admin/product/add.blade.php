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
                    
                    <form role="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="photo">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="my-editor" name="description" class="form-control">{!! old('content', '') !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="text" class="form-control" name="stock">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price">
                        </div>
                        <div class="form-group">
                            <label>Price Box</label>
                            <input type="text" class="form-control" name="price_box">
                        </div>
                        <div class="form-group">
                            <label>Brand</label>
                            <select class="form-control select2" id="brand" onchange="dis_brand()" name="brand">
                            <option value="">(New Brand)</option>
                                @foreach($brand as $p)
                                    <option value="{{ $p->id }}">{{ $p->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Add Brand if doesnt exist</label>
                            <input type="text" class="form-control" id="new_brand" placeholder="Enter New Brand" name="add_brand">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control select2" id="category" name="category_id">
                                @foreach($category as $p)
                                    <option value="{{ $p->id }}">{{ $p->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sub Category</label>
                            <select class="form-control select2" id="subcategory" name="sub_category_id">
                                @foreach($sub_category as $s)
                                    <option value="{{ $s->id }}">{{ $s->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        
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
        <!-- bs-custom-file-input -->
        <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../dist/js/demo.js"></script>
        <!-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> -->
        <<!-- script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script> -->
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <script>
        var route_prefix = "/filemanager";
        </script>

        <!-- CKEditor init -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
        <script>
            $('textarea[name=description').ckeditor({
            height: 100,
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
            });
        </script>

        

        <script>
            {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
        </script>
        <script>
            $('#lfm').filemanager('image', {prefix: route_prefix});
            $('#lfm').filemanager('file', {prefix: route_prefix});
        </script>

        <script>
            
        </script>

        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
        <style>
            .popover {
            top: auto;
            left: auto;
            }
        </style>
        <!-- <script>
            $(document).ready(function(){

            

            });
        </script> -->
                <!-- page script -->
                <script type="text/javascript">
                    var options = {
                        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                    };
                    //CKEDITOR.replace('my-editor', options);
                    var lfm = function(id, type, options) {
                        let button = document.getElementById(id);

                        button.addEventListener('click', function () {
                            var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
                            var target_input = document.getElementById(button.getAttribute('data-input'));
                            var target_preview = document.getElementById(button.getAttribute('data-preview'));

                            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                            window.SetUrl = function (items) {
                            var file_path = items.map(function (item) {
                                return item.url;
                            }).join(',');

                            // set the value of the desired input to image url
                            target_input.value = file_path;
                            target_input.dispatchEvent(new Event('change'));

                            // clear previous preview
                            target_preview.innerHtml = '';

                            // set or change the preview image src
                            items.forEach(function (item) {
                                let img = document.createElement('img')
                                img.setAttribute('style', 'height: 5rem')
                                img.setAttribute('src', item.thumb_url)
                                target_preview.appendChild(img);
                            });

                            // trigger change event
                            target_preview.dispatchEvent(new Event('change'));
                            };
                        });
                    };

                    lfm('lfm2', 'file', {prefix: route_prefix});
                    $(document).ready(function () {
                        bsCustomFileInput.init();
                        // Define function to open filemanager window
                        var lfm = function(options, cb) {
                            var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
                            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                            window.SetUrl = cb;
                        };
                    });

                    //Initialize Select2 Elements
                    $('.select2').select2({
                        theme: 'bootstrap4'
                    })

                    function dis_brand(){
                        var d_brand = document.getElementById("brand");
                        if(d_brand.options[d_brand.selectedIndex].value == ""){
                            document.getElementById("new_brand").disabled = false;
                        }
                        else{
                            document.getElementById("new_brand").disabled = true;
                            document.getElementById("new_brand").value = "";
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