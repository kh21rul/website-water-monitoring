<!-- Sidebar -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="{{ asset('img/iconWeb.png') }}" style="width: 30px;">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Vanamei</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
              <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Data</span></li>
            <li class="menu-item {{ Request::is('dashboard/*') ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Data</div>
              </a>
              <ul class="menu-sub active">
                <li class="menu-item {{ Request::is('dashboard/controls') ? 'active' : '' }}">
                  <a href="/dashboard/controls" class="menu-link">
                    <div data-i18n="Without menu">Sistem Kendali</div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </aside>
        <!-- / Sidebar -->