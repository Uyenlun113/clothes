<nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i> </a> </li>
            <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Home</a> </li>
            <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Contact</a> </li>
        </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
            <li class="nav-item"> <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="bi bi-search"></i> </a> </li> <!--end::Navbar Search-->
            <!--begin::Messages Dropdown Menu-->
            <li class="nav-item dropdown"> <a class="nav-link" data-bs-toggle="dropdown" href="#"> <i
                        class="bi bi-chat-text"></i> <span class="navbar-badge badge text-bg-danger">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <a href="#" class="dropdown-item">
                        <!--begin::Message-->
                        <div class="d-flex">
                            <div class="flex-shrink-0"> <img
                                    src="{{ url('public/assets/dist/assets/img/user1-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 rounded-circle me-3"> </div>
                            <div class="flex-grow-1">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-end fs-7 text-danger"><i class="bi bi-star-fill"></i></span>
                                </h3>
                                <p class="fs-7">Call me whenever you can...</p>
                                <p class="fs-7 text-secondary"> <i class="bi bi-clock-fill me-1"></i> 4 Hours
                                    Ago
                                </p>
                            </div>
                        </div> <!--end::Message-->
                    </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item">
                        <!--begin::Message-->
                        <div class="d-flex">
                            <div class="flex-shrink-0"> <img
                                    src="{{ url('public/assets/dist/assets/img/user8-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 rounded-circle me-3"> </div>
                            <div class="flex-grow-1">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-end fs-7 text-secondary"> <i class="bi bi-star-fill"></i>
                                    </span>
                                </h3>
                                <p class="fs-7">I got your message bro</p>
                                <p class="fs-7 text-secondary"> <i class="bi bi-clock-fill me-1"></i> 4 Hours
                                    Ago
                                </p>
                            </div>
                        </div> <!--end::Message-->
                    </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item">
                        <!--begin::Message-->
                        <div class="d-flex">
                            <div class="flex-shrink-0"> <img
                                    src="{{ url('public/assets/dist/assets/img/user3-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 rounded-circle me-3"> </div>
                            <div class="flex-grow-1">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-end fs-7 text-warning"> <i class="bi bi-star-fill"></i>
                                    </span>
                                </h3>
                                <p class="fs-7">The subject goes here</p>
                                <p class="fs-7 text-secondary"> <i class="bi bi-clock-fill me-1"></i> 4 Hours
                                    Ago
                                </p>
                            </div>
                        </div> <!--end::Message-->
                    </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item dropdown-footer">See All
                        Messages</a>
                </div>
            </li> <!--end::Messages Dropdown Menu--> <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown"> <a class="nav-link" data-bs-toggle="dropdown" href="#"> <i
                        class="bi bi-bell-fill"></i> <span class="navbar-badge badge text-bg-warning">15</span> </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <span
                        class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i
                            class="bi bi-envelope me-2"></i> 4 new messages
                        <span class="float-end text-secondary fs-7">3 mins</span> </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i
                            class="bi bi-people-fill me-2"></i> 8 friend requests
                        <span class="float-end text-secondary fs-7">12 hours</span> </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i
                            class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                        <span class="float-end text-secondary fs-7">2 days</span> </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item dropdown-footer">
                        See All Notifications
                    </a>
                </div>
            </li> <!--end::Notifications Dropdown Menu--> <!--begin::Fullscreen Toggle-->
            <li class="nav-item"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i
                        data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i data-lte-icon="minimize"
                        class="bi bi-fullscreen-exit" style="display: none;"></i>
                </a> </li> <!--end::Fullscreen Toggle--> <!--begin::User Menu Dropdown-->

        </ul> <!--end::End Navbar Links-->
    </div> <!--end::Container-->
</nav> <!--end::Header--> <!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <!--begin::Brand Text-->
            <h2 class="brand-text fw-light">Clothes</h2>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index.html" class="brand-link">
            <!--begin::Brand Image--> <img src="{{ url('public/assets/dist/assets/img/AdminLTELogo.png') }}"
                alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image-->
            <!--begin::Brand Text--> <span class="brand-text fw-light">Hello , {{ Auth::user()->name }} !</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item menu-open"> <a href="{{ url('admin/dashboard') }}" class="nav-link"> <i
                            class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item"> <a href="#" class="nav-link"> <i
                            class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Danh mục
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ url('admin/category/add') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Thêm danh mục</p>
                            </a> </li>
                        <li class="nav-item"> <a href="{{ url('admin/category/list') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Danh sách danh mục</p>
                            </a> </li>

                    </ul>

                </li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i
                            class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Danh mục phụ
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ url('admin/sub_category/add') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Thêm danh mục phụ</p>
                            </a> </li>
                        <li class="nav-item"> <a href="{{ url('admin/sub_category/list') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Danh sách danh mục phụ</p>
                            </a> </li>

                    </ul>

                </li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-people"></i>
                        <p>
                            Tài khoản
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ url('admin/user/add') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Thêm Tài khoản</p>
                            </a> </li>
                        <li class="nav-item"> <a href="{{ url('admin/user/list') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Danh sách tài khoản</p>
                            </a> </li>

                    </ul>

                </li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-box-seam"></i>
                        <p>
                            Sản phẩm
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ url('admin/product/add') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Thêm sản phẩm</p>
                            </a> </li>
                        <li class="nav-item"> <a href="{{ url('admin/product/list') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Danh sách sản phẩm</p>
                            </a> </li>
                    </ul>
                </li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i
                            class="nav-icon bi bi-palette-fill"></i>
                        <p>
                            Màu
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ url('admin/color/add') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Thêm màu sản phẩm</p>
                            </a> </li>
                        <li class="nav-item"> <a href="{{ url('admin/color/list') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Danh sách màu sản phẩm</p>
                            </a> </li>
                    </ul>
                </li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-tags-fill"></i>
                        <p>
                            Mã giảm giá
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ url('admin/discount/add') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Thêm mã giảm giá</p>
                            </a> </li>
                        <li class="nav-item"> <a href="{{ url('admin/discount/list') }}" class="nav-link"> <i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Danh sách mã giảm giá</p>
                            </a> </li>
                    </ul>
                </li>
                <li class="nav-item menu-open"> <a href="{{ url('admin/logout') }}" class="nav-link active"> <i
                            class="nav-icon bi bi-box-arrow-right"></i>
                        <p>
                            Đăng xuất
                        </p>
                    </a>
                </li>
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->
