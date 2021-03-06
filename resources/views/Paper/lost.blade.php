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
                        @foreach ($papers as $paper)
                            @foreach ($paper->entries as $entry)
                                <tr>
                                    <td>{{ $entry->id }}</td>
                                    <td>{{ $entry->family_name }}</td>
                                    <td>{{ $entry->phone_num }}</td>
                                    <td><a href="{{ route('categories.show', $entry->category) }}"><span
                                                class="badge bg-label-success me-1">{{ $entry->category->category }}</span></a>
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
