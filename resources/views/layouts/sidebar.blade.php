<div id="wrapper">
    <!-- Start sidebar-wrapper -->
    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
        <div class="brand-logo">
            <a href="index.html">
                <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                <h5 class="logo-text">Dashtreme Admin</h5>
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
                    <i class="zmdi zmdi-view-dashboard"></i> <span>internship</span>
                </a>
            </li>
            <li>
                <a href="#" id="citiesToggle">
                    <i class="zmdi zmdi-format-list-bulleted"></i> <span>Cities</span>
                </a>
                <ul id="citiesSubMenu" style="display: none;">
                    <!-- Nested unordered list for submenu, initially hidden -->
                    <li>
                        <a href="{{ route('form') }}">
                            <span>Add City</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('allcities') }}">
                            <!-- Assuming you've defined a route named 'allcities' -->
                            <span>All Cities</span>
                        </a>
                    </li>
                </ul>
            </li>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const citiesToggle = document.getElementById('citiesToggle');
                    const citiesSubMenu = document.getElementById('citiesSubMenu');

                    citiesToggle.addEventListener('click', function(event) {
                        event.preventDefault();
                        if (citiesSubMenu.style.display === 'none') {
                            citiesSubMenu.style.display = 'block';
                        } else {
                            citiesSubMenu.style.display = 'none';
                        }
                    });
                });
            </script>

            <li>
                <a>
                    <i class="zmdi zmdi-format-list-bulleted"></i> <span>Industries</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('add.industry') }}">
                            <span>Industry</span>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="{{ route('index.industry') }}">
                            <span>All Industry</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- End sidebar-wrapper -->
</div>
