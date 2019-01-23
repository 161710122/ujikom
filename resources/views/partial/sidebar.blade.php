  <aside class="main-sidebar sidebar-light-primary elevation-5">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
    <img src="{{asset('/assets/img/logo1.png')}}" alt="AdminLTE Logo" style="width:200px;height: 50px;margin-left:13px;">
    
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
           </li>
             
           <li class="nav-item ">
            <a href="{{route('category.index')}}" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Category
              </p>
            </a>
           </li>
           <li class="nav-item ">
            <a href="{{route('brand.index')}}" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Brand
              </p>
            </a>
           </li>
           <li class="nav-item ">
            <a href="{{route('blog.index')}}" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Blog
              </p>
            </a>
           </li>

          <li class="nav-item has-treeview">
          
          <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Product
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
          
          <ul class="nav nav-treeview">
            
             <li class="nav-item">
                <a href={{route('product.index')}} class="nav-link">
                  <i class="fa fa-circle-o "></i>
                  <p>Product</p>
                </a>
              </li>
              
              
              
              <li class="nav-item">
                <a href={{route('productimage.index')}} class="nav-link">
                  <i class="fa fa-circle-o "></i>
                  <p>Product Image</p>
                </a>            
          </li>
         
            </ul>
            </li>
            
            
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-wrench"></i>
              <p>
                Pengaturan
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
            <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                                     class="nav-link">
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

              <i class="fa fa-circle-o text-danger"></i>
              <p class="text">Logout</p>
            </a>
          </li>
            </ul>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>