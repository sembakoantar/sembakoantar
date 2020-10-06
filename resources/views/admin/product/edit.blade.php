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
                        <h3 class="card-title">Edit Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                    <form role="form" action="{{ route('product.update',$product->id) }}" method="POST">
                        @csrf
                        {{ @method_field('PUT')}}
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                            </div>
                            
                            <div class="form-group">
                                <label>Description</label>
                                <!-- <input type="text" class="form-control" name="description" value="{{ $product->description }}"> -->
                                <textarea id="my-editor" name="description" class="form-control">{!! old('content', $product->description) !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="text" class="form-control" name="stock" value="{{ $product->stock }}">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                            </div>
                            <div class="form-group">
                                <label>Price Box</label>
                                <input type="text" class="form-control" name="price_box" value="{{ $product->price_box }}">
                            </div>
                            <div class="form-group">
                                <label>brand</label>
                                <select class="form-control select2" id="brand" name="brand_id">
                                    @foreach($brand as $b)
                                        <?php
                                            if($product->brand_id == $b->id){?>
                                                <option value="{{ $b->id }}" selected="selected">{{ $b->name}}</option>
                                            <?php }
                                            else{?>
                                                <option value="{{ $b->id }}">{{ $b->name}}</option>
                                            <?php }
                                        ?> 
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2" id="category" name="category_id">
                                    @foreach($category as $c)
                                        <?php
                                            if($product->category_id == $c->id){?>
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
                                <label>Sub Category</label>
                                <select class="form-control select2" id="sub_category" name="sub_category_id">
                                    @foreach($sub_category as $s)
                                        <?php
                                            if($product->sub_category_id == $s->id){?>
                                                <option value="{{ $s->id }}" selected="selected">{{ $s->name}}</option>
                                            <?php }
                                            else{?>
                                                <option value="{{ $s->id }}">{{ $s->name}}</option>
                                            <?php }
                                        ?> 
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <div class="col-md-4">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" name="photo">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Photo Lama</label>
                                <div class="col-md-4">
                                    <img src="{{ url('img/product',$product->photo) }}" alt="" width="150px">                
                                </div>        
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
            
            
        </script>
    @endsection
@show