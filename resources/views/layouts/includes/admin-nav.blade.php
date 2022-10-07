
        <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
            <a class="navbar-brand me-lg-5" href="#">
                <img class="navbar-brand-dark" src="/img/favicon/ficon-mixx.png" alt="Admin logo" />
            </a>
            <div class="d-flex align-items-center">
                <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>      
        <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
          <div class="sidebar-inner px-4 pt-3">
            <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
              <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" data-bs-toggle="collapse"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
                    aria-label="Toggle navigation">
                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </a>
              </div>
            </div>
            <ul class="nav flex-column pt-3 pt-md-0">
              <li class="nav-item">
                <a href="#" class="nav-link d-flex align-items-center">
                  <span class="sidebar-icon">
                    <img src="/img/favicon/ficon-mixx.png" height="20" width="20" alt="Admin Logo">
                  </span>
                  <span class="mt-1 ms-1 sidebar-text">Admin</span>
                </a>
              </li>
              <li class="nav-item  {{ (request()->segment(1) == 'admin' && request()->segment(2) == '') ? 'active' : '' }} ">
                <a href="/admin" class="nav-link">
                  <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                  </span> 
                  <span class="sidebar-text">Dashboard</span>
                </a>
              </li>

              @can('users.list')
              <li class="nav-item {{ (request()->segment(1) == 'users') ? 'active' : '' }}">
                <a href="/users/list" class="nav-link d-flex justify-content-between">
                  <span>
                    <span class="sidebar-icon">
                      <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg></span>
                    <span class="sidebar-text">Felhasználók</span>
                  </span>
                </a>
              </li>
              @endcan
              @can('logs')
              <li class="nav-item {{ (request()->segment(1) == 'logs') ? 'active' : '' }}">
                <a href="/logs" class="nav-link d-flex justify-content-between">
                  <span>
                    <span class="sidebar-icon">
                      <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z"/>
                      </svg>
                    </span>
                    <span class="sidebar-text">Log</span>
                  </span>
                </a>
              </li>
              @endcan
              @can('fileManager')
              <li class="nav-item {{ (request()->segment(1) == 'file-manager') ? 'active' : '' }}">
                <a href="/file-manager" class="nav-link d-flex justify-content-between">
                  <span>
                    <span class="sidebar-icon">
                      <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
                      </svg>
                    </span>
                    <span class="sidebar-text">Fájlkezelő</span>
                  </span>
                </a>
              </li>
              @endcan
              @can('menu.index')
              <li class="nav-item {{ (request()->segment(1) == 'menu') ? 'active' : '' }}">
                <a href="/menu" class="nav-link d-flex justify-content-between">
                  <span>
                    <span class="sidebar-icon">
                      <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    </span>
                    <span class="sidebar-text">Menü</span>
                  </span>
                </a>
              </li>
              @endcan
              @can('pages.index')
              <li class="nav-item {{ (request()->segment(1) == 'pages') ? 'active' : '' }}">
                <a href="/pages" class="nav-link d-flex justify-content-between">
                  <span>
                    <span class="sidebar-icon">
                      <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path><path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                    </span> 
                    <span class="sidebar-text">Oldalak</span>
                  </span>
                </a>
              </li>
              @endcan
              @can('posts.index')
              <li class="nav-item ">
                <span
                  class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                  data-bs-toggle="collapse" data-bs-target="#submenu-posts"  {{ (request()->segment(1) == 'posts') || (request()->segment(1) == 'category') ? 'aria-expanded="true"' : '' }}>
                  <span>
                    <span class="sidebar-icon">
                      <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path></svg>
                    </span> 
                    <span class="sidebar-text">Bejegyzések</span>
                  </span>
                  <span class="link-arrow">
                    <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                  </span>
                </span>
                <div class="multi-level collapse {{ (request()->segment(1) == 'posts') || (request()->segment(1) == 'category') ? 'show' : '' }}"
                  role="list" id="submenu-posts" aria-expanded="false">
                  <ul class="flex-column nav">
                    <li class="nav-item {{ (request()->segment(1) == 'posts') ? 'active' : '' }}">
                      <a class="nav-link" href="/posts">
                        <span class="sidebar-text">Összes bejegyzés</span>
                      </a>
                    </li>
                    <li class="nav-item {{ (request()->segment(1) == 'category') ? 'active' : '' }}" >
                      <a class="nav-link" href="/category">
                        <span class="sidebar-text">Kategóriák</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              @endcan
              @can('products.index')
              <li class="nav-item {{ (request()->segment(1) == 'products') ? 'active' : '' }} ">
                <a href="/products" class="nav-link">
                  <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg></span>
                  <span class="sidebar-text">Ételek</span>
                </a>
              </li>
              @endcan
              @can('orders.show')
              <li class="nav-item {{ (request()->segment(1) == 'orders') ? 'active' : '' }} ">
                <a href="/orders" class="nav-link">
                  <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>
                  </span>
                  <span class="sidebar-text">Rendelések</span>
                </a>
              </li>
              @endcan
              @can('contact-form-list')
              <li class="nav-item {{ (request()->segment(2) == 'contact-form-list') ? 'active' : '' }} ">
                <a href="/admin/contact-form-list" class="nav-link">
                  <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                  </span>
                  
                  <span class="sidebar-text">Kapcsolati űrlap</span>
                </a>
              </li>
              @endcan
              @if(auth()->user()->can('roles.index') && auth()->user()->can('permissions.index'))
              <li class="nav-item ">
                <span
                  class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                  data-bs-toggle="collapse" data-bs-target="#submenu-settings"  {{ (request()->segment(1) == 'roles') || (request()->segment(1) == 'permissions') ? 'aria-expanded="true"' : '' }}>
                  <span>
                    <span class="sidebar-icon">
                      <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg></span> 
                    <span class="sidebar-text">Beállítások</span>
                  </span>
                  <span class="link-arrow">
                    <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                  </span>
                </span>
                <div class="multi-level collapse {{ (request()->segment(1) == 'roles') || (request()->segment(1) == 'permissions') ? 'show' : '' }}"
                  role="list" id="submenu-settings" aria-expanded="false">
                  <ul class="flex-column nav">
                    <li class="nav-item  {{ (request()->segment(1) == 'roles') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('roles.index') }}">
                        <span class="sidebar-text">Roles</span>
                      </a>
                    </li>
                    <li class="nav-item {{ (request()->segment(1) == 'permissions') ? 'active' : '' }}" >
                      <a class="nav-link" href="{{ route('permissions.index') }}">
                        <span class="sidebar-text">Permission</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              @endif
              <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
              <li class="nav-item">
                <a href="/" target="_blank"
                  class="nav-link d-flex align-items-center">
                  <span class="sidebar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="icon icon-xs me-2" viewBox="0 0 16 16">
                      <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                    </svg>
                  </span>
                  <span class="sidebar-text">Főoldalra</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>