<!-- <div class="mt-5">
    <div class="list-group">
        <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action">Users</a>
        <a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action">Products</a>
        <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action">Categories</a>
      </div>
</div> -->
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p href="{{ route('admin.users.index') }}" class="text">Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p href="{{ route('admin.products.index') }}" class="text">Products</p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-blue"></i>
              <p href="{{ route('admin.categories.index') }}" class="text">Categories</p>
            </a>
          </li> 
        </ul>
      </nav>