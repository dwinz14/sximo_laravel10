<?php $sximoconfig  = config('sximo');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
    <title>{{ config('sximo.cnf_appname') }}</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="{{ asset('')}}assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('')}}assets/css/style_mobile.css" rel="stylesheet">
    <script src="{{ asset('')}}assets/plugins/moment/moment.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('')}}assets/js/sximo.min.js"></script>

    <script src="{{ asset('')}}assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

<body>
    @yield('content') 
</body>
</html>


