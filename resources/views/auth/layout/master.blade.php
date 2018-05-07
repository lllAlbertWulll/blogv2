<!DOCTYPE html>
<html lang="en">
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>爱上猫的鱼灬 | Controller Panel</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Vendors -->

    <!-- Animate CSS -->
    <link href="/admin/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link href="/admin/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">

    <!-- Site CSS -->
    <link href="/admin/css/app-1.min.css" rel="stylesheet">
</head>

<body>
<div class="login">

    @yield('content')

</div>

<!-- Javascript Libraries -->

<!-- jQuery -->
<script src="/admin/vendors/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="/admin/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Placeholder for IE9 -->
<!--[if IE 9 ]>
<script src="/admin/vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
<![endif]-->

<!-- Site Functions & Actions -->
<script src="/admin/js/app.min.js"></script>
</body>
</html>