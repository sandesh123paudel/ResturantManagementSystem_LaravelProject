
<aside class="main-sidebar sidebar-dark-secondary elevation-4">
    <!-- Brand Logo -->
    <a href={{route('admin.dashboard')}} class="brand-link">
        <img src="{{asset('images/logowhite.svg')}}" alt="Logo" class="brand-image img-circle elevation-0">
        <span class="brand-text font-weight-light">Silver Point Restaurant</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href={{ route('admin.dashboard')}} class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>																
                </li>
                <li class="nav-item">
                    <a href={{ route('admin.category')}} class="nav-link">
                        <i class="nav-icon fas fa-hamburger"></i>
                        <p>Category</p>
                    </a>
                </li>
              
                <li class="nav-item">
                    <a href={{ route('admin.products')}} class="nav-link">
                        <i class="nav-icon fas fa-pizza-slice"></i>
                        <p>Products</p>
                    </a>
                </li>
                							
                <li class="nav-item">
                    <a href={{ route('admin.orders')}} class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ route('admin.users')}} class="nav-link">
                        <i class="nav-icon  fas fa-users"></i>
                        <p>Customers</p>
                    </a>
                </li>							
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
 </aside>