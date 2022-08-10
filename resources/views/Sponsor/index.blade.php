<x-layouts.app>

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
                            <th class="table-success ">رقم الكفيل</th>
                            <th class="table-success ">اسم الكفيل</th>
                            <th class="table-success ">رقم الهاتف</th>

                            <th class="table-success ">التفاصيل </th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($sponsors as $sponsor)
                            <tr>
                                <td>{{ $sponsor->id }}</td>
                                <td>{{ $sponsor->user->name }}</td>
                                <td>{{ $sponsor->user->phone }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('sponsors.show', $sponsor) }}"><i
                                                    class="bx bx bxs-detail"></i> عرض التفاصيل</a>
                                            <a class="dropdown-item" href="{{ route('sponsors.edit', $sponsor) }}"><i
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
