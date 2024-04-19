<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">

        <a href="#" class="app-brand-link">
            <span class="app-brand-text demo fw-bolder ms-2 text-capitalize">Event Cordy</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @active('home')">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-item @active('publisher.events.create') @active('publisher.events.edit') @active('publisher.events.index')">
            <a href="{{ route('publisher.events.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Analytics">Events</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Analytics">Reviews</div>
            </a>
        </li>

        {{-- <!-- Layouts -->
                        <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-layout"></i>
                                <div data-i18n="Layouts">Layouts</div>
                            </a>

                            <ul class="menu-sub">
                                <li class="menu-item">
                                    <a href="layouts-without-menu.html" class="menu-link">
                                        <div data-i18n="Without menu">Without menu</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="layouts-without-navbar.html" class="menu-link">
                                        <div data-i18n="Without navbar">Without navbar</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="layouts-container.html" class="menu-link">
                                        <div data-i18n="Container">Container</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="layouts-fluid.html" class="menu-link">
                                        <div data-i18n="Fluid">Fluid</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="layouts-blank.html" class="menu-link">
                                        <div data-i18n="Blank">Blank</div>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}

    </ul>
</aside>
<!-- / Menu -->
