<x-layouts.app>

    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- <hr class="my-5" /> --}}
            <form action="{{ route('store') }}" method="POST" class="row g-3 needs-validation"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">تاريخ الاعانة </label>
                    <input name="aid_date" type="date" class="form-control" id="validationCustom02">

                </div>


                <div class=" col-md-3 -btn-group dropend -mt-px">
                    <label for="validationCustom04" class="form-label">نوع الاعانة</label>
                    <select name="aid_id" class="form-select" id="validationCustom04"
                        aria-label="Default select example">

                        <option selected>اختر نوع الاعانة</option>
                        @foreach ($aids as $aid)
                            <option value="{{ $aid->id }}">{{ $aid->name }}</option>
                        @endforeach
                    </select>


                </div>


                <div class="row-cols-1">
                    <div class="row-cols-1">

                        <div class="table-responsive">
                            <table class="table table-flush-spacing">
                                <tbody>
                                    <tr>
                                        <td class="text-nowrap fw-bolder">
                                            <h4 class="fw-bold py-3 mb-4">توزيع الإعانات

                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-info">
                                                    <circle cx="12" cy="12" r="10">
                                                    </circle>
                                                    <line x1="12" y1="16" x2="12" y2="12 ">
                                                    </line>
                                                    <line x1="12" y1="8" x2="12.01" y2="8">
                                                    </line>
                                                </svg>
                                            </h4>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td> عامة</td>
                                        <td>
                                            <div class="d-flex">

                                                <div class="form-check me-3 me-lg-5">

                                                    اختيار الكل
                                                    <input type="checkbox" name="selectAll" value="selectAll">

                                                </div>
                                            </div>

                                        </td>

                                    </tr>
                                    <tr>
                                        <td> مخصصة</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="container">
                        <input class="form-control mb-4" id="tableSearch" type="text" placeholder="بحث..">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="table-success ">رقم الاستمارة</th>
                                    <th class="table-success ">اسم العائلة</th>
                                    <th class="table-success ">الاعانات</th>

                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($entries as $entry)
                                    <tr>
                                        <td>{{ $entry->id }}</td>
                                        <td>{{ $entry->family_name }}</td>
                                        <td><a href="{{ route('entry.aids', $entry->id) }}" class="btn btn-success">عرض
                                                الاعانات </a>
                                            <input class="form-check-input" type="checkbox" name="entryid[]"
                                                value="{{ $entry->id }}">
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="column is-12">{{ $entries->links() }}</div>

                    <hr class="my-5" />



                    <div class="row mt-3">
                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                            <input type="submit" class="btn btn-danger" value="اختيار">
                        </div>
                    </div>
            </form>


            </tbody>
            </table>
        </div>
    </div>





</x-layouts.app>
