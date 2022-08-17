<x-layouts.app>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <hr class="my-5" />


            <div class="container">
                <input class="form-control mb-4" id="tableSearch" type="text" placeholder="بحث..">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="table-success ">رقم الاعانة</th>
                            <th class="table-success ">اسم الإعانة</th>

                            <th class="table-success ">التفاصيل </th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($aids as $aid)
                            <tr>
                                <td>{{ $aid->id }}</td>
                                <td>{{ $aid->name }}</td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('aids.show', $aid) }}"><i
                                                    class="bx bx bxs-detail"></i> عرض التفاصيل</a>

                                            @if (Auth::user()->hasRole('موظف الادراج العام  '))
                                                <a class="dropdown-item" href="{{ route('aids.edit', $aid) }}"><i
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

            <div class="column is-12">{{ $aids->links() }}</div>

        </div>
    </div>
</x-layouts.app>
