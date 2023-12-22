<aside class="main-sidebar sidebar-dark-secondary elevation-5" style="background-color: ivory;">
    <!-- Brand Logo -->
    <a href={{ route('admin.dashboard') }} class="brand-link">
        <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="brand-image img-circle elevation-0">
        <span class="brand-text font-weight-light" style="color: black; font-weight: bold">ADMIN</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar" style="background-color: ivory; color: black;">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href={{ route('admin.dashboard') }} class="nav-link" style="color: black;">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ route('admin.category') }} class="nav-link" style="color: black;">
                        <i class="nav-icon fas fa-hamburger"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ route('admin.products') }} class="nav-link" style="color: black;">
                        <i class="nav-icon fas fa-pizza-slice"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ route('admin.orders') }} class="nav-link" style="color: black;">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ route('admin.users') }} class="nav-link" style="color: black;">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customers</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
