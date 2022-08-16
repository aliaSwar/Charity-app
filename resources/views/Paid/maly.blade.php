<x-layouts.app>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="container ">
                <div class="card mb-4">
                    <h5 class="card-header"><span style="color: rgba(21, 22, 21, 0.664)">{{ $sponsor->user->name }}</span>
                    </h5>
                    <div class="row g-0">
                        <div class="d-flex flex-row">
                            <img src="{{ asset('assets/img/image/paid.jpg') }}"
                                class="img-fluid d-grid gap-2 col-lg-3 mx-auto">

                        </div>

                    </div>

                </div>
                <br>
                <input class="form-control mb-4" id="tableSearch" type="text" placeholder="بحث..">

                <table class="table tables-basic tables-basic">
                    <thead>
                        <tr>
                            <th class="table-success "> الدفعة</th>
                            <th class="table-success ">تاريخ الدفعة</th>
                            <th class="table-success ">المبلغ</th>
                            <th class="table-success "> تفاصيل</th>

                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($paids as $paid)
                            <tr>
                                <td>
                                    {{ $paid->id }}
                                </td>

                                <td> {{ $paid->date_paid }}</td>
                                <td> {{ $paid->amount }}</td>



                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">

                                            <a href="{{ route('paids.show', $paid) }}"class="dropdown-item"><i
                                                    class="  bx bx-adjust"></i>
                                                التفاصيل</a>
                                            <a href="{{ route('paids.edit', $paid) }}"class="dropdown-item"><i
                                                    class="bx bx-pencil"></i>
                                                تعديل</a>

                                            <form method="post" action="{{ route('paids.destroy', $paid) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="dropdown-item"><i
                                                        class=" bx bx-x-circle"></i>حذف</button>
                                            </form>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="column is-12">{{ $paids->links() }}</div>
                <!-- Vertically centered modal -->

            </div>

        </div>
    </div>
    </div>
    </section>


    </div>
    </div>
    </div>
    </div>



</x-layouts.app>
