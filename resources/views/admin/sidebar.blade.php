
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link" style="background-color: #049A9A">
      <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E-shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block"> {{ Auth::user()->name  ?? '' }}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{URL::to('admin/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview  
              {{ request()->is('admin/category/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/category') ? 'menu-open' : '' }}
              {{ request()->is('admin/subcategory/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/subcategory') ? 'menu-open' : '' }}
              {{ request()->is('admin/prosubcategory/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/prosubcategory') ? 'menu-open' : '' }}
          ">
            <a href="" class="nav-link has-treeview">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p class=" has-treeview">
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ request()->is('admin/category/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/category/create')}}" class="nav-link {{ request()->is('admin/category/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>              

              <li class="nav-item {{ request()->is('admin/category') ? 'active' : '' }}">
                <a href="{{URL::to('admin/category')}}" class="nav-link {{ request()->is('admin/category') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Category</p>
                </a>
              </li>

              <li class="nav-item {{ request()->is('admin/subcategory/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/subcategory/create')}}" class="nav-link {{ request()->is('admin/subcategory/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sub Category</p>
                </a>
              </li>               

              <li class="nav-item {{ request()->is('admin/subcategory') ? 'active' : '' }}">
                <a href="{{URL::to('admin/subcategory')}}" class="nav-link {{ request()->is('admin/subcategory') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Sub Category</p>
                </a>
              </li> 

              <li class="nav-item {{ request()->is('admin/prosubcategory/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/prosubcategory/create')}}" class="nav-link {{ request()->is('admin/prosubcategory/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Pro Sub Category</p>
                </a>
              </li> 

              <li class="nav-item {{ request()->is('admin/prosubcategory') ? 'active' : '' }}">
                <a href="{{URL::to('admin/prosubcategory')}}" class="nav-link {{ request()->is('admin/prosubcategory') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Pro Sub Category</p>
                </a>
              </li> 

            </ul>
          </li>

          <li class="nav-item has-treeview  
              {{ request()->is('admin/brand/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/brand') ? 'menu-open' : '' }}
          ">
            <a href="" class="nav-link has-treeview">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p class=" has-treeview">
                Brand
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ request()->is('admin/brand/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/brand/create')}}" class="nav-link {{ request()->is('admin/brand/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Brand</p>
                </a>
              </li>              

              <li class="nav-item {{ request()->is('admin/brand') ? 'active' : '' }}">
                <a href="{{URL::to('admin/brand')}}" class="nav-link {{ request()->is('admin/brand') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Brand</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview  
              {{ request()->is('admin/color/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/color') ? 'menu-open' : '' }}
          ">
            <a href="" class="nav-link has-treeview">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p class=" has-treeview">
                Color
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ request()->is('admin/color/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/color/create')}}" class="nav-link {{ request()->is('admin/color/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Color</p>
                </a>
              </li>              

              <li class="nav-item {{ request()->is('admin/color') ? 'active' : '' }}">
                <a href="{{URL::to('admin/color')}}" class="nav-link {{ request()->is('admin/color') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Color</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item has-treeview  
              {{ request()->is('admin/size/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/size') ? 'menu-open' : '' }}
          ">
            <a href="" class="nav-link has-treeview">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p class=" has-treeview">
                Size
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ request()->is('admin/size/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/size/create')}}" class="nav-link {{ request()->is('admin/size/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Size</p>
                </a>
              </li>              

              <li class="nav-item {{ request()->is('admin/size') ? 'active' : '' }}">
                <a href="{{URL::to('admin/size')}}" class="nav-link {{ request()->is('admin/size') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Size</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item has-treeview  
              {{ request()->is('admin/product/create') ? 'menu-open' : '' }}
              {{ request()->is('admin/product') ? 'menu-open' : '' }}
          ">
            <a href="" class="nav-link has-treeview">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p class=" has-treeview">
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ request()->is('admin/product/create') ? 'active' : '' }}">
                <a href="{{URL::to('admin/product/create')}}" class="nav-link {{ request()->is('admin/product/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>              

              <li class="nav-item {{ request()->is('admin/product') ? 'active' : '' }}">
                <a href="{{URL::to('admin/product')}}" class="nav-link {{ request()->is('admin/product') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Product</p>
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





