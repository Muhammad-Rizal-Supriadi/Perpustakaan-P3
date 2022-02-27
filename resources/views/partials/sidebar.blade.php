      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">
              <i class="ti-layout-grid2 menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">    
            <a class="nav-link" href="{{ route('categories.index') }}">
              <i class="ti-menu-alt menu-icon"></i>
              <span class="menu-title">Categories</span>
            </a>
          </li>
          <li class="nav-item">    
            <a class="nav-link" href="{{ route('publishers.index') }}">
              <i class="ti-home menu-icon"></i>
              <span class="menu-title">Publishers</span>
            </a>
          </li>
          <li class="nav-item">    
            <a class="nav-link" href="{{ route('books.index') }}">
              <i class="ti-book menu-icon"></i>
              <span class="menu-title">Books</span>
            </a>
          </li>
          <li class="nav-item">    
            <a class="nav-link" href="{{ route('employees.index') }}">
              <i class="ti-id-badge menu-icon"></i>
              <span class="menu-title">Employees</span>
            </a>
          </li>
          <li class="nav-item">    
            <a class="nav-link" href="{{ route('members.index') }}">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Members</span>
            </a>
          </li>
          <li class="nav-item">    
            <a class="nav-link" href="{{ route('borrows.index') }}">
              <i class="ti-bookmark menu-icon"></i>
              <span class="menu-title">Borrows</span>
            </a>
          </li>
        </ul>
      </nav>