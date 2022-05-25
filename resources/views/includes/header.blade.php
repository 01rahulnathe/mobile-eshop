<header class="main-header">

<!-- Logo -->
<a href="./" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>M-Store</b></span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Store</b> Dashboard</span>
</a>

<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

      <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- The user image in the navbar-->
          <img src="{{ URL::asset('dist/img/avatar5.png')}}" class="user-image" alt="User Image">
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          <span class="hidden-xs">Welcome, <b>{{ Auth::user()->username }}</b></span>
        </a>
        <ul class="dropdown-menu">
          <!-- The user image in the menu -->
          <li class="user-header">
            <img src="{{ URL::asset('dist/img/avatar5.png')}}" class="img-circle" alt="User Image">

            <p>
              <small>{{ Auth::user()->username }}</small>
            </p>
          </li>
          <!-- Menu Body -->

          <!-- Menu Footer-->
          <li class="user-footer">

            <div class="pull-right">
              <a href="/logout" class="btn btn-info btn-flat" style="color:black;">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
      <!-- Control Sidebar Toggle Button -->

    </ul>
  </div>
</nav>
</header>
