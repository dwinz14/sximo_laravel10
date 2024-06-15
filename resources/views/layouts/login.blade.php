<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{config('sximo.cnf_appname') }}</title>
<link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('')}}assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('')}}assets/plugins/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" rel="stylesheet">
    <!-- This page CSS -->
    <!--c3 CSS -->
    <link href="{{ asset('')}}assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('')}}assets/css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('')}}assets/css/legacy.css" rel="stylesheet">

    <!-- Sximo 5 Main CSS -->



<!--<link href="{{ asset('sximo5/css/sximo.css')}}" rel="stylesheet"> -->
    <script src="{{ asset('')}}assets/plugins/moment/moment.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/sximo.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/sximo5.js') }}"></script>


    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->  

    
  
    </head>
    <style>
        #divlogin {
            /* basic */ 
            background-color: #fff;
            margin: 0 auto;
            width: 200px;
            padding: 100px;
            text-align: center;
            /* border-radius */
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            border-radius: 20px;
            /* box-shadow */
            -webkit-box-shadow: rgba(0,0,0,0.8) 0px 0 10px;
            -moz-box-shadow: rgba(0,0,0,0.8) 0 0 10px;
            box-shadow: rgba(0,0,0,0.8) 0 0 10px;
        }
    </style>
<body>

     <section id="wrapper" class="login-register login-sidebar" style="background-image:url({{ asset('') }}assets/images/bg-pdp.png);">

        <div class="login-box card" style="
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px; 
        background-color: #fff;
        -webkit-box-shadow: rgba(0,0,0,0.8) 0px 0 10px;
        -moz-box-shadow: rgba(0,0,0,0.8) 0 0 10px;
        box-shadow: rgba(0,0,0,0.8) 0 0 10px;margin-top: 120px;
        opacity: 0.9;">
            <div class="card-body">
                  <a href="{{ url('')}}" class="text-center db">

                    @if(file_exists(public_path().'/uploads/images/'.config('sximo')['cnf_logo']) && config('sximo')['cnf_logo'] !='')
                            <img src="{{ asset('uploads/images/'.config('sximo')['cnf_logo'])}}" alt="{{ config('sximo')['cnf_appname'] }}" width="90" />
                            @else
                            <img src="{{ asset('uploads/logo.png')}}" alt="{{ config('sximo')['cnf_appname'] }}" width="100" />
                            @endif


                </a>
                <div class="p-2 text-center" >
                    <h3>Sign In To PARKUR </h3>
                    <p class=""  > {{ config('sximo.cnf_appdesc') }}  </p></div>
                  @yield('content') 
            </div>
        </div>    
    </section>    
    
</body> 
</html>