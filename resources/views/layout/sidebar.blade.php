        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo" style="padding:20px 0;">
                <a href="index.html" class="app-brand-link">
                    <span class="app-brand-text demo menu-text fw-bolder ms-2"> <img style="width:10%"
                            src="{{ asset('assets/img/favicon/kesbangpol.jpg') }}" alt="logo">
                        E-Arsip</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item">
                    <a href="{{route('index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>

                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Master Data</span>
                </li>
                <!-- Cards -->
                <li class="menu-item">
                    <a href="{{route('undangan')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-collection"></i>
                        <div data-i18n="Basic">Undangan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('surat-keluar')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-archive-out"></i>
                        <div data-i18n="Basic">Surat Keluar</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('surat-masuk')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-archive-in"></i>
                        <div data-i18n="Basic">Surat Masuk</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('nota-dinas')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-notepad"></i>
                        <div data-i18n="Basic">Nota Dinas</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="cards-basic.html" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-briefcase"></i>
                        <div data-i18n="Basic">SPT dan SPPD</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="cards-basic.html" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-car"></i>
                        <div data-i18n="Basic">Surat Kerja</div>
                    </a>
                </li>
            </ul>
        </aside>