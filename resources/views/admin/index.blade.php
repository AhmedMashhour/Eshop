@include('admin.layouts.header')
@include('admin.layouts.nav')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
    <section class="content">
@include('admin.layouts.message')
@yield('content')
    	 </section>
    <!-- /.content -->
  </div>





@include('admin.layouts.footer')


