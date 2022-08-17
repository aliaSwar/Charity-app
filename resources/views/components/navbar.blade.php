<div class="layout-page">

    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                    <h5 class="card-title al"> جمعية إنعاش الفقير الخيرية في التل </h5>

                </div>
            </div>

            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                    <a class="github-button" href="" data-icon="octicon-star" data-size="large"
                        data-show-count="true"
                        aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">كن عونا</a>
                </li>
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src={{ is_null(auth()->user()->image) ? '../assets/img/avatars/1.png' : Storage::url(auth()->user()->image) }}
                                alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="{{ is_null(auth()->user()->image) ? '../assets/img/avatars/1.png' : Storage::url(auth()->user()->image) }}"
                                                alt class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                                        <small class="text-muted">
                                            @foreach (auth()->user()->roles as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        </small>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route('users.show', auth()->user()) }}">
                                <i class="bx bx-user me-2"></i>
                                <span class="align-middle">عرض التفاصيل</span>
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf

                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">
                                        <input type="submit" style="border:none;background:none;padding: 0"
                                            value="تسجيل خروج"></span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>


                <!--/ User -->
            </ul>
        </div>
    </nav>
