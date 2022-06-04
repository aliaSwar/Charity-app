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

                <!-- Contextual Classes -->

                <div class="card text-bg-warning mb-3">
                    <h5 class="card-header">معلومات عامة </h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="table-warning"> المعلومات</th>
                                    <th class="table-warning"> المعلومات</th>


                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr class="table-default">
                                    <td><i class="fab fa-sketch fa-lg text-warning "></i> <strong>رقم القيد</strong>
                                    </td>
                                    <td>{{ $entry->diwan_num }}</td>

                                </tr>

                                <tr class="table-default">
                                    <td><i class="fab fa-angular fa-lg text-danger "></i> <strong>تاريخ الإدراج</strong>
                                    </td>
                                    <td>{{ $entry->entry_date }}</td>

                                </tr>
                                <tr class="table-default">
                                    <td><i class="fab fa-vuejs fa-lg text-success"></i> <strong>تاريخ الانتهاء</strong>
                                    </td>
                                    <td>Trevor Baker</td>

                                </tr>
                                <tr class="table-default">
                                    <td><i class="fab fa-react fa-lg text-info "></i> <strong>مدة الإدراج </strong></td>
                                    <td></td>

                                </tr>
                                <tr class="table-default">
                                    <td>
                                        <i class="fab fa-bootstrap fa-lg text-primary "></i> <strong> رقم القيد</strong>
                                    </td>
                                    <td>Jerry Milton</td>

                                    </td>
                                </tr>
                                <tr class="table-default">
                                    <td><i class="fab fa-sketch fa-lg text-warning "></i> <strong> العنوان</strong></td>
                                    <td>Sarah Banks</td>

                                </tr>
                                <tr class="table-default">
                                    <td><i class="fab fa-react fa-lg text-info"></i> <strong>رقم البطاقة الذكية
                                        </strong></td>
                                    <td>Ted Richer</td>

                                </tr>
                                <tr class="table-default">
                                    <td>
                                        <i class="fab fa-bootstrap fa-lg text-primary "></i> <strong>راتب الإدراج
                                        </strong>
                                    </td>
                                    <td>Perry Parker</td>


                            </tbody>
                        </table>
                    </div>
                </div>
2

                <hr class="my-5" />
                @foreach ($people as $person)
                
                    {{ $person->full_name }}
                @endforeach
</x-layouts.app>
