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
                            <th class="table-success ">اسم المريض</th>
                            <th class="table-success ">رقم الهاتف</th>
                            <th class="table-success ">من الفرد</th>
                            <th class="table-success ">اسم الوالد</th>
                            <th class="table-success ">اسم الوالدة</th>
                            <th class="table-success ">اسم المرض</th>
                            <th class="table-success ">التفاصيل </th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($mdicals as $mdical)
                            <tr>
                                <td>{{ $mdical->id }}</td>
                                <td>{{ $mdical->name_recipient }}</td>
                                <td>{{ $mdical->phone }}</td>
                                <td>{{ $mdical->whos }}
                                </td>
                                <td>{{ $mdical->husband_name }}</td>
                                <td>{{ $mdical->wife_name }}
                                </td>
                                <td>
                                    {{ $mdical->illness }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('mdicals.show', $mdical) }}"><i
                                                    class="bx bx bxs-detail"></i> عرض التفاصيل</a>
                                            @if (Auth::user()->hasRole('موظف الادراج الطبي'))
                                                <a class="dropdown-item" href="{{ route('mdicals.edit', $mdical) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> تعديل</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="column is-12">{{ $mdicals->links() }}</div>

        </div>
    </div>
</x-layouts.app>
