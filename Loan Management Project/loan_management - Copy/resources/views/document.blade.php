<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Staff</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sanju enterprises - Staff">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/selectFX/css/cs-skin-elastic.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}" />
    <link rel="stylesheet" href="{{asset('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    
    
</head>

<body>


    <!-- Left Panel -->
    @include('inc.sidebar')
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('inc.headernav')
        <!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Loan Documents</h1>
                    </div>
                </div>
            </div>
  
        </div>

        <div class="panel-body">

           
                <div class="row">

                   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Upload Loan Documents Here</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">

                                    <form method="POST" action="{{route('upload')}}"  enctype="multipart/form-data">
                                        
                                    {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Description</label>
                                            <input id="desc" name="desc" type="text" class="form-control"
                                                >
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Select Attachments</label>
                                            <input id="file" name="file[]" type="file" class="form-control"
                                                accept="image/*" multiple>
                                        </div>

                                        <div>
                                           <input type="submit" name="upload" value="Upload" class="btn btn-success">
                                        </div>

                                         </form>

                                    </div>
                                </div>

                            </div>
                            <br/>
                             <div class="progress">
                <div class="progress-bar" role="progressbar"  aria-valuenow="" 
                aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
            </div>
               

            <div class="row" id="success"></div>
                        </div> <!-- .card -->

                    </div>

                </div>

            </div>

        </div>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    {{-- <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script> --}}
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>


    <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}">
    </script>
    <script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('js/init-scripts/data-table/datatables-init.js')}}"></script>

    
  
</body>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<script>
    jQuery(document).ready(function($){
        $('form').ajaxForm({
            beforeSend:function(){
                $('#success').empty();
                $('.progress-bar').text('0%');
                $('.progress-bar').css('width','0%');
            },
            uploadProgress:function(event,position,total,percentComplete){

                $('.progress-bar').text(percentComplete+'0%');
                $('.progress-bar').css('width',percentComplete+'0%');

            },
            success:function(data){
                console.log(data);
                // $('#success').html('<div class="text-success text-center"><b>'+data.success+'</b></div><br/><br/>');
                //console.log(Object.keys(data).length);
                $('#success').append(data.image);
                $('.progress-bar').text('Uploaded');
                $('.progress-bar').css('width','100%');
                // location.reload();
            },

            error:function(data){
                console.log(data);

            }
        });
    });
</script>

</html>