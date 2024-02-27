<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Digital Library</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">DL</a>
      </div>
      <ul class="sidebar-menu">
        @if (session('role') == 'administrator')
          <li class="menu-header">Dashboard</li>
          <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
          </li>
          <li class="menu-header">Master Data</li>
          <li class="{{ Request::is('admin/dashboard/staff') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/dashboard/staff"><i class="fas fa-user-secret"></i> <span>Staff</span></a>
          </li>
          <li class="{{ Request::is('admin/dashboard/member') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/dashboard/member"><i class="fas fa-user-tie"></i> <span>Member</span></a>
          </li>
          <li class="{{ Request::is('admin/dashboard/book', 'admin/dashboard/book/insert') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/dashboard/book"><i class="fas fa-book"></i> <span>Book</span></a>
          </li>
          <li class="{{ Request::is('admin/dashboard/borrowing') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/dashboard/borrowing"><i class="fas fa-hourglass-start"></i> <span>Borrowing</span></a>
          </li>
          <li class="{{ Request::is('admin/dashboard/category') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/dashboard/category"><i class="fas fa-list"></i> <span>Category</span></a>
          </li>
          <li class="dropdown {{ Request::is('admin/dashboard/borrowing/report') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-folder-open"></i> <span>Report</span></a>
            <ul class="dropdown-menu">
              <li class="{{ Request::is('admin/dashboard/borrowing/report') ? 'active' : '' }}">
                <a class="nav-link" href="/admin/dashboard/borrowing/report">Borrowing</a>
              </li>
            </ul>
          </li>
        @endif

        @if (session('role') == 'staff')
          <li class="menu-header">Dashboard</li>
          <li class="{{ Request::is('staff/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="/staff/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
          </li>
          <li class="menu-header">Master Data</li>
          <li class="{{ Request::is('staff/dashboard/book', 'dashboard/book/insert') ? 'active' : '' }}">
            <a class="nav-link" href="/staff/dashboard/book"><i class="fas fa-book"></i> <span>Book</span></a>
          </li>
          <li class="{{ Request::is('staff/dashboard/borrowing') ? 'active' : '' }}">
            <a class="nav-link" href="/staff/dashboard/borrowing"><i class="fas fa-hourglass-start"></i> <span>Borrowing</span></a>
          </li>
          <li class="{{ Request::is('staff/dashboard/category') ? 'active' : '' }}">
            <a class="nav-link" href="/staff/dashboard/category"><i class="fas fa-list"></i> <span>Category</span></a>
          </li>
          <li class="dropdown {{ Request::is('staff/dashboard/borrowing/report') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-folder-open"></i> <span>Report</span></a>
            <ul class="dropdown-menu">
              <li class="{{ Request::is('staff/dashboard/borrowing/report') ? 'active' : '' }}">
                <a class="nav-link" href="/staff/dashboard/borrowing/report">Borrowing</a>
              </li>
            </ul>
          </li>
        @endif

        @if (session('role') == 'borrower')
          <li class="menu-header">Dashboard</li>
          <li class="{{ Request::is('member/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="/member/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
          </li>
          <li class="menu-header">Master Data</li>
          <li class="{{ Request::is('member/dashboard/book', 'dashboard/book/insert') ? 'active' : '' }}">
            <a class="nav-link" href="/member/dashboard/book"><i class="fas fa-book"></i> <span>Book</span></a>
          </li>
          <li class="{{ Request::is('member/dashboard/borrowed') ? 'active' : '' }}">
            <a class="nav-link" href="/member/dashboard/borrowed"><i class="fas fa-calendar-days"></i> <span>Borrowed</span></a>
          </li>
          <li class="{{ Request::is('member/dashboard/returned') ? 'active' : '' }}">
            <a class="nav-link" href="/member/dashboard/returned"><i class="fas fa-clock-rotate-left"></i> <span>Retuned</span></a>
          </li>
          <li class="{{ Request::is('member/dashboard/collection') ? 'active' : '' }}">
            <a class="nav-link" href="/member/dashboard/collection"><i class="fas fa-bookmark"></i> <span>Collection</span></a>
          </li>
          <li class="{{ Request::is('member/dashboard/review') ? 'active' : '' }}">
            <a class="nav-link" href="/member/dashboard/review"><i class="fas fa-comment"></i> <span>Review</span></a>
          </li>
        @endif

        <li class="menu-header">Action</li>
        <li>
            <a class="nav-link" href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i></i> <span>Logout</span></a>
        </li>
      </ul>     
    </aside>
  </div>