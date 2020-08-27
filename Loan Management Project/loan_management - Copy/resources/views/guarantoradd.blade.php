<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sanju enterprises - Guarantors Manage</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/selectFX/css/cs-skin-elastic.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}" />

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
                        <h1>Guarantors</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="/guarantors">Guarantor</a></li>
                            <li><a href="/addguarantor">Add Guarantor</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-lg-12">
                        <a href="/guarantors" class="btn btn-secondary btn-sm"><i
                                class="fa fa-arrow-circle-o-left"></i>&nbsp;
                            Back</a>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add Guarantor</strong>
                            </div>
                            <div class="card-body">
                                {{-- @if (count($errors) > 0) --}}
                                {{-- {{$errors[0]} --}}
                                {{-- @endif --}}
                                {{-- @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{$error}}
                            </div>
                            @endforeach --}}
                            @if(isset($flag)&&$flag==1)
                            <div class="alert alert-success">Record Added Successfull</div>
                            @endif
                            <form action="/newguarantor" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="col-md-3">
                                    <div class="container">
                                        <div class="row  text-center">
                                            <img src="{{ asset('images/userthumb.png') }}"
                                                class="avatar img-circle img-thumbnail" alt="">
                                        </div><br>

                                        <div class="row  text-center">
                                            <span>Select Guarantor Image</span>
                                        </div>
                                        <div class="row  text-center {{$errors->has('proimage')?'has-error' : ''}}">
                                            <input type="file" id="proimage" name="proimage"
                                                class="text-center center-block file-upload">
                                            @error('proimage')
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 {{$errors->has('fname')?'has-error' : ''}}">
                                            <label for="exampleFormControlInput1">Name</label>
                                            <input type="text" id="fname" name="fname" class="form-control"
                                                placeholder="Full Name" value="{{ old('fname')}}">
                                            @if ($errors->has('fname'))
                                            <small
                                                class="help-block form-text text-danger">{{$errors->first('fname')}}</small>
                                            @endif
                                            {{-- @error('fname')
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                            @enderror --}}
                                        </div>
                                    </div>
                                    <div class="form-row">
                                       
                                        <div class="form-group col-md-6 {{$errors->has('nic')?'has-error' : ''}}">
                                            <label>NIC No</label>
                                            <input type="text" id="nic" name="nic" class="form-control"
                                                placeholder="nic" value="{{ old('nic')}}">
                                            @if ($errors->has('nic'))
                                            <small
                                                class="help-block form-text text-danger">{{$errors->first('nic')}}</small>
                                            @endif
                                        </div>

                                    </div>
                                  
                                    <div class="form-row">
                                        <div class="form-group col-md-4 {{$errors->has('add1')?'has-error' : ''}}">
                                            <label>Address 1</label>
                                            <input type="text" id="add1" name="add1" class="form-control"
                                                placeholder="address" value="{{ old('add1')}}">
                                            @if ($errors->has('add1'))
                                            <small
                                                class="help-block form-text text-danger">{{$errors->first('add1')}}</small>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-4 {{$errors->has('add2')?'has-error' : ''}}">
                                            <label>Address 2</label>
                                            <input type="text" id="add2" name="add2" class="form-control"
                                                placeholder="address" value="{{ old('add2')}}">
                                            @if ($errors->has('add2'))
                                            <small
                                                class="help-block form-text text-danger">{{$errors->first('add2')}}</small>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-4 {{$errors->has('city')?'has-error' : ''}}">
                                            <label>City</label>
                                            <input type="text" id="city" name="city" class="form-control"
                                                placeholder="city" value="{{ old('city')}}">
                                            @if ($errors->has('city'))
                                            <small
                                                class="help-block form-text text-danger">{{$errors->first('city')}}</small>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 {{$errors->has('tp1')?'has-error' : ''}}">
                                            <label>Mobile 1</label>
                                            <input type="text" id="tp1" name="tp1" class="form-control"
                                                placeholder="mobile number" value="{{ old('tp1')}}">
                                            @if ($errors->has('tp1'))
                                            <small
                                                class="help-block form-text text-danger">{{$errors->first('tp1')}}</small>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6 {{$errors->has('tp2')?'has-error' : ''}}">
                                            <label>Mobile 2</label>
                                            <input type="text" id="tp2" name="tp2" class="form-control"
                                                placeholder="mobile number" value="{{ old('tp2')}}">
                                        </div>

                                    </div>
                                 
                                    

                                </div>
                                <div class="form-row">
                                    <div
                                        class="form-group col-md-12 {{$errors->has('customerdetilas')?'has-error' : ''}}">
                                        <label>Note</label>
                                        <textarea name="customerdetilas" id="customerdetilas" rows="5"
                                            placeholder="About Guarantor..."
                                            class="form-control">{{ old('customerdetilas')}}</textarea>
                                    </div>
                                </div>

                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <button id="payment-button" type="submit" class="btn btn-sm btn-info btn-block">
                                            <i class="fa fa-plus fa-sm"></i>&nbsp;
                                            <span id="payment-button-amount">Add</span>
                                        </button>

                                


                                    </div>

                                </div>

                            </form>
                        </div> <!-- .card -->

                    </div>
                </div>



            </div>


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
           document.getElementById("cusmnusb").setAttribute("class", "menu-item-has-children dropdown active");
         });
    </script>
    <script>
        $(document).ready(function() {
    
    
    var readURL = function(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function (e) {
    $('.avatar').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
    }
    }
    
    
    $(".file-upload").on('change', function(){
    readURL(this);
    });
    });


    function saveCustomer(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var name =   document.getElementById("fname").value
    var nic =   document.getElementById("nic").value
    var add1 =   document.getElementById("add1").value
    var add2 =   document.getElementById("add2").value
    var city =   document.getElementById("city").value
    var tp1 =   document.getElementById("tp1").value
    var tp2 =   document.getElementById("tp2").value
    var customerdetilas =   document.getElementById("customerdetilas").value
    var img =   document.getElementById("proimage").files[0];
 
        if (name!="" && nic!=""&& add1!=""&& add2!=""&& city!=""&& tp1!=""&& tp2!=""&& customerdetilas!="") {

                if (tp1.length==10&& tp2.length==10) {
              $.ajax({
                url: "/newguarantor",
                    type:"POST",
                    data: {_token: CSRF_TOKEN,
        
                    cname: name,
            
                    cnic: nic,
                  
                    cadd1: add1,
                    cadd2: add2,
                    ccity: city,
                    ctp1: tp1,
                    ctp2: tp2,
                  
                    cdetils: customerdetilas,
                    images: img,
                    status:0},
                    success:function(response){

                        console.log(response);
                        if(response.status == 1){
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    Toast.fire({
                                        type: 'warning',
                                        title: 'This Customer Allready Registed...!'
                                    });
                                }else if(response.status == 2){
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    Toast.fire({
                                        type: 'success',
                                        title: 'Add new Customer Customer Success....!'
                                    });
                                } 



},
error: function(response) {
                            console.log(response);
                        }
});
} else {
    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Add Correct Mobile Number....!'
        });
}



}else{
const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Fill All Details'
        });
}
       
   }
  
    

    



                function test1(){
    var img =   document.getElementById("proimage").files[0];
    var name =   document.getElementById("fname").value
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    alert(img);
                        $.ajax({
                        url: "/testcustomer",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                            fname: name,
                            fname1: img
                    
                        },


                        success:function(data){
                            console.log(data);
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });
                    }

                   

                  
    </script>
</body>

</html>