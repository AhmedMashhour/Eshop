@include('admin.layouts.menue')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{url('design/Adminlte')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{url('design/Adminlte')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{admin()->user()->name}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->


          <li> <a href="{{aurl('')}}" class="nav-link">
                  <i class="nav-icon fa fa-dashboard"></i> <p>{{trans('admin.dashboard')}}</p>
                  <span class="pull-right-container">
            </span>
              </a>

          </li>


          <li> <a href="{{aurl('settings')}}" class="nav-link">
                  <i class="nav-icon fa fa-cogs"></i> <span>Setting</span>
                  <span class="pull-right-container">
            </span>
              </a>
          </li>

          <li class="nav-item has-treeview {{active_menu('admin')[0]}}">
              <a href="#" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>{{trans('admin.admin')}}</p>
              <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="nav nav-treeview" style="{{active_menu('admin')[1]}}">
                  <li class="nav-item"><a href="{{aurl('admin')}}" class="nav-link"><i class="nav-icon fa fa-users"></i>{{trans('admin.admin')}}</a></li>
              </ul>
          </li>

          <li class="nav-item has-treeview {{active_menu('users')[0]}}">
              <a href="#" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Users Accounts</p>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="nav nav-treeview" style="{{active_menu('users')[1]}}">
                  <li class="nav-item"><a href="{{aurl('users')}}" class="nav-link"><i class="nav-icon fa fa-users"></i>Users Accounts</a></li>
                  <li class="nav-item"><a href="{{aurl('users')}}?level=user" class="nav-link"><i class="nav-icon fa fa-users"></i>User</a></li>
                  <li class="nav-item"><a href="{{aurl('users')}}?level=vendor" class="nav-link"><i class="nav-icon fa fa-users"></i>Vendor</a></li>
                  <li class="nav-item"><a href="{{aurl('users')}}?level=company" class="nav-link"><i class="nav-icon fa fa-users"></i>Company</a></li>
              </ul>
          </li>

          <li class="nav-item has-treeview {{active_menu('countries')[0]}}">
              <a href="#" class="nav-link">
                  <i class="fa fa-flag"></i>
                  <p>Countries</p>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="nav nav-treeview" style="{{active_menu('countries')[1]}}">
                  <li class="nav-item"><a href="{{aurl('countries')}}" class="nav-link"><i class="nav-icon fa fa-flag"></i>Countries</a></li>
                  <li class="nav-item"><a href="{{aurl('countries/create')}}" class="nav-link"><i class="nav-icon fa fa-plus"></i>Add Country</a></li>
              </ul>
          </li>
          <li class="nav-item has-treeview {{active_menu('cities')[0]}}">
              <a href="#" class="nav-link">
                  <i class="fa fa-flag"></i>
                  <p>Cities</p>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="nav nav-treeview" style="{{active_menu('cities')[1]}}">
                  <li class="nav-item"><a href="{{aurl('cities')}}" class="nav-link"><i class="nav-icon fa fa-flag"></i>Cities</a></li>
                  <li class="nav-item"><a href="{{aurl('cities/create')}}" class="nav-link"><i class="nav-icon fa fa-plus"></i>Add City</a></li>
              </ul>
          </li>

          <li class="nav-item has-treeview {{active_menu('states')[0]}}">
              <a href="#" class="nav-link">
                  <i class="fa fa-flag"></i>
                  <p>States</p>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="nav nav-treeview" style="{{active_menu('states')[1]}}">
                  <li class="nav-item"><a href="{{aurl('states')}}" class="nav-link"><i class="nav-icon fa fa-flag"></i>States</a></li>
                  <li class="nav-item"><a href="{{aurl('states/create')}}" class="nav-link"><i class="nav-icon fa fa-plus"></i>Add State</a></li>
              </ul>
          </li>

          <li class="nav-item has-treeview {{active_menu('departments')[0]}}">
              <a href="#" class="nav-link">
                  <i class="fa fa-list"></i>
                  <p>Departments</p>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="nav nav-treeview" style="{{active_menu('departments')[1]}}">
                  <li class="nav-item"><a href="{{aurl('departments')}}" class="nav-link"><i class="nav-icon fa fa-list"></i>Departments</a></li>
                  <li class="nav-item"><a href="{{aurl('departments/create')}}" class="nav-link"><i class="nav-icon fa fa-plus"></i>Add Department</a></li>
              </ul>
          </li>

          <li class="nav-item has-treeview {{active_menu('trademarks')[0]}}">
              <a href="#" class="nav-link">
                  <i class="fa fa-cube"></i>
                  <p>TradeMarks</p>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="nav nav-treeview" style="{{active_menu('trademarks')[1]}}">
                  <li class="nav-item"><a href="{{aurl('trademarks')}}" class="nav-link"><i class="nav-icon fa fa-cube"></i>TradeMarks</a></li>
                  <li class="nav-item"><a href="{{aurl('trademarks/create')}}" class="nav-link"><i class="nav-icon fa fa-plus"></i>Add TradeMark</a></li>
              </ul>
          </li>

          <li class="nav-item has-treeview {{active_menu('manufacts')[0]}}">
              <a href="#" class="nav-link">
                  <i class="fa fa-user"></i>
                  <p>Manufacturers</p>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="nav nav-treeview" style="{{active_menu('manufacts')[1]}}">
                  <li class="nav-item"><a href="{{aurl('manufacts')}}" class="nav-link"><i class="nav-icon fa fa-user"></i>Manufacturers</a></li>
                  <li class="nav-item"><a href="{{aurl('manufacts/create')}}" class="nav-link"><i class="nav-icon fa fa-plus"></i>Add Manufacturer</a></li>
              </ul>
          </li>

          <li class="nav-item has-treeview {{active_menu('shippings')[0]}}">
              <a href="#" class="nav-link">
                  <i class="fa fa-truck"></i>
                  <p>Shipping</p>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="nav nav-treeview" style="{{active_menu('shippings')[1]}}">
                  <li class="nav-item"><a href="{{aurl('shippings')}}" class="nav-link"><i class="nav-icon fa fa-truck"></i>Shipping</a></li>
                  <li class="nav-item"><a href="{{aurl('shippings/create')}}" class="nav-link"><i class="nav-icon fa fa-plus"></i>Add Shipping</a></li>
              </ul>
          </li>


          <li class="nav-item has-treeview {{active_menu('malls')[0]}}">
              <a href="#" class="nav-link">
                  <i class="fa fa-building"></i>
                  <p>Malls</p>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="nav nav-treeview" style="{{active_menu('malls')[1]}}">
                  <li class="nav-item"><a href="{{aurl('malls')}}" class="nav-link"><i class="nav-icon fa fa-building"></i>Malls</a></li>
                  <li class="nav-item"><a href="{{aurl('malls/create')}}" class="nav-link"><i class="nav-icon fa fa-plus"></i>Add Malls</a></li>
              </ul>
          </li>


          <li class="nav-item has-treeview {{active_menu('colors')[0]}}">
              <a href="#" class="nav-link">
                  <i class="fa fa-paint-brush"></i>
                  <p>Colors</p>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="nav nav-treeview" style="{{active_menu('colors')[1]}}">
                  <li class="nav-item"><a href="{{aurl('colors')}}" class="nav-link"><i class="nav-icon fa fa-paint-brush"></i>Colors</a></li>
                  <li class="nav-item"><a href="{{aurl('colors/create')}}" class="nav-link"><i class="nav-icon fa fa-plus"></i>Add Color</a></li>
              </ul>
          </li>

          <li class="nav-item has-treeview {{active_menu('sizes')[0]}}">
              <a href="#" class="nav-link">
                  <i class="fa fa-info-circle"></i>
                  <p>Sizes</p>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="nav nav-treeview" style="{{active_menu('sizes')[1]}}">
                  <li class="nav-item"><a href="{{aurl('sizes')}}" class="nav-link"><i class="nav-icon fa fa-info-circle"></i>Sizes</a></li>
                  <li class="nav-item"><a href="{{aurl('sizes/create')}}" class="nav-link"><i class="nav-icon fa fa-plus"></i>Add Size</a></li>
              </ul>
          </li>


          <li class="nav-item has-treeview {{active_menu('weights')[0]}}">
              <a href="#" class="nav-link">
                  <i class="fa fa-info-circle"></i>
                  <p>Weights</p>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="nav nav-treeview" style="{{active_menu('weights')[1]}}">
                  <li class="nav-item"><a href="{{aurl('weights')}}" class="nav-link"><i class="nav-icon fa fa-info-circle"></i>Weights</a></li>
                  <li class="nav-item"><a href="{{aurl('weights/create')}}" class="nav-link"><i class="nav-icon fa fa-plus"></i>Add Weight</a></li>
              </ul>
          </li>


          <li class="nav-item has-treeview {{active_menu('products')[0]}}">
              <a href="#" class="nav-link">
                  <i class="fa fa-product-hunt"></i>
                  <p>Products</p>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="nav nav-treeview" style="{{active_menu('products')[1]}}">
                  <li class="nav-item"><a href="{{aurl('products')}}" class="nav-link"><i class="nav-icon fa fa-product-hunt"></i>Products</a></li>
                  <li class="nav-item"><a href="{{aurl('products/create')}}" class="nav-link"><i class="nav-icon fa fa-plus"></i>Add Product</a></li>
              </ul>
          </li>







      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>