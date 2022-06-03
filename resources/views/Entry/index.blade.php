<x-layouts.app>

    <!-- Layout container -->
    <div class="layout-page">
        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>
                </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <!-- Search -->
                <!-- Search -->
                <div class="navbar-nav align-items-center">
                    <div class="nav-item d-flex align-items-center">


                        <h5 class="card-title al"> جمعية إنعاش الفقير الخيرية في التل/ قسم الإدراج </h5>

                    </div>
                </div>
                <!-- /Search -->
                <!-- /Search -->

                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <!-- Place this tag where you want the button to render. -->



            </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">


                <!-- Basic Bootstrap Table -->


                <!--/ Basic Bootstrap Table -->

                <hr class="my-5" />


                <div class="container">
                    <input class="form-control mb-4" id="tableSearch" type="text" placeholder="بحث..">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="table-success ">رقم الاستمارة</th>
                                <th class="table-success ">اسم العائلة</th>
                                <th class="table-success ">رقم الهاتف</th>
                                <th class="table-success ">الصنف</th>
                                <th class="table-success ">الحالة</th>
                                <th class="table-success ">الفئة </th>
                                <th class="table-success ">التفاصيل </th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($entries as $entry)
                                <tr>
                                    <td>{{ $entry->id }}</td>
                                    <td>{{ $entry->family_name }}</td>
                                    <td>{{ $entry->phone_num }}</td>
                                    <td><span
                                            class="badge bg-label-success me-1">{{ $entry->category->category }}</span>
                                    </td>
                                    <td><span class="badge bg-label-info me-1">{{ $entry->status->status }}</span>
                                    </td>
                                    <td><span class="badge bg-label-danger me-1">{{ $entry->financial->type }}</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('entries.show', $entry) }} detail"><i
                                                        class="bx bx bxs-detail"></i> عرض التفاصيل</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('entries.edit', $entry) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> تعديل</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            </section>

            <!-- / Content -->



            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>

</x-layouts.app>
