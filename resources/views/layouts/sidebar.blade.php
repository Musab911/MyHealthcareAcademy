<div id="wrapper">
    <!-- Start sidebar-wrapper -->
    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
        <div class="brand-logo">
            <a href="index.html">
                <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                <h5 class="logo-text">Health Care admin</h5>
            </a>
        </div>
        <ul class="sidebar-menu do-nicescrol">
            <li>
                <a href="{{ route('admin') }}">
                    <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user') }}">
                    <i class="zmdi zmdi-view-dashboard"></i> <span>Internship</span>
                </a>
            </li>
            <li>
                <a href="#" id="citiesToggle">
                    <i class="zmdi zmdi-format-list-bulleted"></i> <span>Cities</span>
                </a>
                <ul id="citiesSubMenu" style="display: none;">
                    <li>
                        <a href="{{ route('form') }}">
                            <span>Add City</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('allcities') }}">
                            <span>All Cities</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a>
                    <i class="zmdi zmdi-format-list-bulleted"></i> <span>Industries</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('add.industry') }}">
                            <span>Add Industry</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('index.industry') }}">
                            <span>All Industry</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('applications.show') }}">
                    <i class="zmdi zmdi-view-dashboard"></i> <span>Applications</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- End sidebar-wrapper -->
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const citiesToggle = document.getElementById('citiesToggle');
        const citiesSubMenu = document.getElementById('citiesSubMenu');

        citiesToggle.addEventListener('click', function(event) {
            event.preventDefault();
            citiesSubMenu.style.display = citiesSubMenu.style.display === 'none' ? 'block' : 'none';
        });
    });
</script>
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
  </ul>
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-envelope-open-o"></i></a>
    </li>
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-bell-o"></i></a>
    </li>
    <li class="nav-item language">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();"><i class="fa fa-flag"></i></a>
      <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
        </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title">Sarajhon Mccoy</h6>
            <p class="user-subtitle">mccoy@example.com</p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>
      </ul>
    </li>
  </ul>
</nav>
</header>