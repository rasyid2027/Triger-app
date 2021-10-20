<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Triger</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">Tg</a>
      </div>
        <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown{{ request()->is('dashboard') ? ' active' : '' }}">
            <a href="/dashboard" class="nav-link"><i class="fas fa-users"></i><span>Santri</span></a>
          </li>
        </ul>
    </aside>
  </div>