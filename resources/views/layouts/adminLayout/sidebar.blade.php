<div class="col-xl-3">                           
    <aside class="menu-sidebar3 js-spe-sidebar">
        <nav class="navbar-sidebar2 navbar-sidebar3">
            <ul class="list-unstyled navbar__list">
                <li class="active">
                    <a class="js-arrow" href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('manage-users') }}">
                        <i class="fas fa-users"></i>Users</a>
                    <!-- <span class="inbox-num">3</span> -->
                </li>
                <li>
                    <a href="{{ route('manage-categories') }}">
                        <i class="fas fa-tags"></i>Categories</a>
                </li>                
                <li>
                    <a href="{{ route('manage-items') }}">
                        <i class="fas fa-shopping-cart"></i>Items</a>
                </li>                
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-shopping-basket"></i>eCommerce</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Pages
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                        <li>
                            <a href="forget-pass.html">Forget Password</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>
</div>
                            