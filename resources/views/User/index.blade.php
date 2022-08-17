<x-layouts.app>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <div class="d-flex flex-row">
                <img src="{{ asset('assets\img\image\o.png') }}" class="d-grid gap-2 col-lg-5 mx-auto">

            </div>

            <hr class="my-5" />
            <div class="container">
                <input class="form-control mb-4" id="tableSearch" type="text" placeholder="بحث..">
                <div class="card">
                    <table class="table tables-basic tables-basic">
                        <thead>
                            <tr>
                                <th class="table-success ">اسم الموظف</th>
                                <th class="table-success ">منصب الاداري</th>
                                <th class="table-success "> الهاتف</th>
                                <th class="table-success ">تعديل </th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>

                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class=" bx bx-list-ol"></i>
                                            </button>
                                            @foreach ($user->roles as $role)
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('roles.show', $role) }}"><i
                                                            class=" bx bx-radio-circle-marked"></i> رؤية الصلاحيات</a>

                                                </div>
                                            @endforeach
                                            {{ $role->name }}
                                        </div>

                                    </td>
                                    <td><span class="badge bg-label-success me-1"></span>{{ $user->phone }}</td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('users.show', $user) }}"><i
                                                        class="  bx bx-adjust"></i>
                                                    تفاصيل</a>
                                                <a class="dropdown-item" href="{{ route('users.edit', $user) }}"><i
                                                        class=" bx bx-pencil"></i>
                                                    تعديل</a>
                                                <form method="post" action="{{ route('users.destroy', $user) }}">
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
                </div>
            </div>
            </tbody>
            </table>
        </div>
        <div class="column is-12">{{ $users->links() }}</div>
    </div>

    </div>








</x-layouts.app>
