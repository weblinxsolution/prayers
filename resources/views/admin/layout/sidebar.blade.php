

<!-- Start main left sidebar menu -->
<div class="main-sidebar sidebar-style-3" style="margin-left: 3px; !important">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand mt-2">
            <a href="{{ Route('dashboard') }}">
                Tamim
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ Route('dashboard') }}">
                Tamim
            </a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">
                Dashboard
            </li>

            @if (session('super_admin_id'))
                <li>
                    <a class="nav-link" href="{{ Route('listAdmins') }}">
                        <i class="fa-solid fa-users"></i>
                        <span>Admins</span>
                    </a>
                </li>
            @endif

            <li>
                <a class="nav-link" href="{{ Route('admin.listArticles') }}">
                    <i class="fa-solid fa-pager"></i>
                    <span>Manage Articles</span>
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ Route('admin.listquote') }}">
                    <i class="fa-solid fa-pager"></i>
                    <span>Manage Quotes</span>
                </a>
            </li>

            <li class="menu-header">
               Locations Management
            </li>

            <li>
                <a class="nav-link" href="{{ Route('admin.regions') }}">
                    <i class="fa-solid fa-earth-americas"></i>
                    <span>Manage Regions</span>
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ Route('admin.countries') }}">
                    <i class="fa-solid fa-flag"></i>
                    <span>Manage Countries</span>
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ Route('admin.cities') }}">
                    <i class="fa-solid fa-city"></i>
                    <span> Manage Cities</span>
                </a>
            </li>

            <li class="menu-header">
                Quran Management
            </li>

            <li>
                <a class="nav-link" href="{{ Route('admin.playlist') }}">
                    <i class="fa-solid fa-play"></i>
                    <span>Manage Playlist</span>
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ Route('admin.tracks') }}">
                    <i class="fa-solid fa-book-quran"></i>
                    <span>Manage Track</span>
                </a>
            </li>


            <li class="menu-header">
                Ads Management
            </li>

            <li>
                <a class="nav-link" href="{{ Route('admin.appFeatures') }}">
                    <i class="fa-solid fa-mobile-screen-button"></i>
                    <span>Manage App Features</span>
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ Route('admin.bannerAdds') }}">
                    <i class="fa-solid fa-signs-post"></i>
                    <span>Manage Banner Ads</span>
                </a>
            </li>

        </ul>

    </aside>
</div>
