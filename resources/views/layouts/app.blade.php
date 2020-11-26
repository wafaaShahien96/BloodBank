<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Blood Bank</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
<link rel="stylesheet" href="{{asset('adminlte/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- SEARCH FORM -->
   

    <!-- Right navbar links -->
      <!-- Messages Dropdown Menu -->
      
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{asset('adminlte/img/AdminLTELogo.png')}}" alt="Blood Bank" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Blood Bank</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">Waf2</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         

               <li class="nav-item">
                <a href="{{route('admin.governorates.index')}}" class="nav-link">
                   <i class="nav-icon fa fa-map-marker"></i>
                    <p> Governorate </p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="{{route('admin.city.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-flag"></i>
                   <p>Cities</p>
                   </a>
              </li>
             

          <li class="nav-item">
            <a href="{{route('admin.categories.index')}}" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
              <p>Categories</p>
            </a>
          </li>
         
          <li class="nav-item">
          <a href="{{route('admin.posts.index')}}" class="nav-link">
              <i class="nav-icon fa fa-comment"></i>
              <p>Posts</p>
            </a>
          </li>
         
          <li class="nav-item">
          <a href="{{route('admin.bloodtype.index')}}" class="nav-link">
              <i class="nav-icon fa fa-comment"></i>
              <p>BloodTypes</p>
            </a>
          </li>
         
        
          <li class="nav-item">
          <a href="{{route('admin.clients.index')}}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>Client</p>
            </a>
          </li>

          <li class="nav-item">
          <a href="{{route('admin.contact.index')}}" class="nav-link">
              <i class="nav-icon fa fa-phone"></i>
              <p>Contact Us</p>
            </a>
          </li>
         
          <li class="nav-item">
          <a href="{{route('admin.donation_request.index')}}" class="nav-link">
              <i class="nav-icon fas fa-heart"></i>
              <p>Donations Request</p>
            </a>
          </li>
         
          <li class="nav-item">
          <a href="{{route('admin.setting.index')}}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Settings</p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="{{route('admin.permissions.index')}}" class="nav-link">
                <i class="nav-icon fa fa-list"></i>
                <p>Permissions</p>
              </a>
            </li>
           
          <li class="nav-item">
          <a href="{{route('admin.roles.index')}}" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
              <p>Roles</p>
            </a>
          </li>
        
          <li class="nav-item">
          <a href="{{route('admin.users.index')}}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>Users</p>
            </a>
          </li>
         


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 

    <section class="content-header">
      <div class="container-fluid">
  
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('page_title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">@yield('page_title')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @yield('content')

  </div>
  <!-- /.content-wrapper -->
  

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-pre
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/js/demo.js')}}"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@yield('script')

@stack('scripts')
</body>
</html>
