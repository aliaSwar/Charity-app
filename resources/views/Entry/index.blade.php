<x-layouts.app>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <!-- Basic Bootstrap Table -->


            <!--/ Basic Bootstrap Table -->
            @if (session()->has('delete'))
                <div class="alert alert-danger">
                    <p>{{ session()->get('delete') }}</p>
                </div>
            @endif



            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h5 class="pb-1 mb-4"> المدرجين</h5>
                    </div>

                    <div class="col-12 col-md-6">
                        <a href="{{ route('excel') }}" class="btn btn-danger">هل تريد تصدير ملف
                            اكسل؟</a>
                    </div>

                </div>
                <br>
                <br>

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
                                <td><a href="{{ route('categories.show', $entry->category) }}"><span
                                            class="badge bg-label-success me-1">{{ $entry->category->category }}</span></a>
                                </td>
                                <td><a href="{{ route('statuses.show', $entry->status) }}"><span
                                            class="badge bg-label-info me-1">{{ $entry->status->status }}</span></a>
                                </td>
                                <td><a href="{{ route('financials.show', $entry->financial) }}"><span
                                            class="badge bg-label-danger me-1">{{ $entry->financial->type }}</span></a>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('entries.show', $entry) }}"><i
                                                    class="bx bx bxs-detail"></i> عرض التفاصيل</a>
                                            @if (Auth::user()->hasRole('موظف الادراج العام') or Auth::user()->hasRole('مدير الإدراج'))
                                                <a class="dropdown-item" href="{{ route('entries.edit', $entry) }}"><i
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

            <div class="column is-12">{{ $entries->links() }}</div>

        </div>
    </div>

</x-layouts.app>
