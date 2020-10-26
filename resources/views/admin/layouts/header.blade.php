<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{!empty($title)?$title:'Admin Panel'}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/')}}/design/Adminlte/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/')}}/design/Adminlte/dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('/')}}/design/Adminlte/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{url('/')}}/design/Adminlte/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{url('/')}}/design/Adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{url('/')}}/design/Adminlte/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('/')}}/design/Adminlte/plugins/daterangepicker/daterangepicker-bs3.css">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{url('/')}}/design/Adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


    <link rel="stylesheet" href="{{url('/')}}/design/Adminlte/jstree/themes/default/style.css">
    <!-- Google Font: Source Sans Pro -->
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('/')}}/design/Adminlte/plugins/datatables/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/')}}/design/Adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{url('/')}}/design/Adminlte/dist/css/adminlte.css">
</head>
@stack('css')