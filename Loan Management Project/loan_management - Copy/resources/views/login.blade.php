<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sanju Enterprises - Login</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/selectFX/css/cs-skin-elastic.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/css/flat-ui.css">

    <!--Start-laraval--------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--End-laraval--------->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</head>

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container-fluid">
        <div class="row">
         <div class="col-md-6 bg-light">
                <br><br>
                <br><br>
                
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" width="150%" height="120%" alt="">
                    </a>
                </div>
            
                
            </div>
            <div class="col-md-6 bg-dark" style="padding:50px" >
            <br><br>
            <br><br>
            <br><br>

                <div class="login-form">
                    <form method="POST" action="/login">
                       {{csrf_field()}}
                        <br>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="UserName">
                        </div><br>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                        {{$error}}
                        </div>
                        @endforeach
                        @if ($error_msg!='')
                        <div class="alert alert-danger" role="alert">
                            {{$error_msg}}
                        </div>
                        @endif
                      
                     
                    
                        {{-- <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>

                        </div> --}}<br>
                        <input type="submit" class="btn btn-dark btn-flat m-b-30 m-t-30" value="Login"/>

                    </form>
                </div>
            </div>
        </div>
           
        </div>
    </div>

</body>

</html>