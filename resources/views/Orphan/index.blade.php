<x-layouts.app>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="container ">
                <div class="">
                    <div class="row g-0">
                        <div class="d-flex flex-row">
                            <img src="{{ asset('assets/img/image/orphan.png') }}"
                                class="img-fluid d-grid gap-2 col-lg-5 mx-auto">
                        </div>
                    </div>
                </div>
                <br>
                <input class="form-control mb-4" id="tableSearch" type="text" placeholder="بحث..">

                <table class="table tables-basic tables-basic">
                    <thead>
                        <tr>
                            <th class="table-success "> الكفالة</th>
                            <th class="table-success "> رقم الكفيل</th>
                            <th class="table-success "> تفاصيل</th>

                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($orphans as $orphan)
                            <tr>
                                <td>
                                    {{ $orphan->id }}
                                </td>
                                <td>
                                    <a href="{{ route('sponsors.show', $orphan->sponsor_id) }}"
                                        style="text-decoration: none;">
                                        {{ $orphan->sponsor_id }}
                                    </a>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('orphans.show', $orphan) }}"><i
                                                    class="  bx bx-abacus"></i> التفاصيل</a>
                                            @if (Auth::user()->hasRole('موظف الكفالات'))
                                                <a class="dropdown-item" href="{{ route('orphans.edit', $orphan) }}"><i
                                                        class="  bx bx-adjust"></i> تعديل</a>
                                                <form method="post" action="{{ route('orphans.destroy', $orphan) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="dropdown-item"><i
                                                            class=" bx bx-x-circle"></i>حذف</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

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
