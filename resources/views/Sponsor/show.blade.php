<x-layouts.app>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <div class="col-14">
                    <div class="card mb-4">
                        <h5 class="card-header">{{ $sponsor->user->name }}</h5>
                        <div class="card-body">
                            <p class="card-text">
                                جمعيتنا , ❤️ جمعية انعاش الفقير الخيرية لديها كفالات بمدة
                                {{ $sponsor->user->name }}
                            </p>
                            <p class="demo-inline-spacing">
                            <form method="post" action="{{ route('sponsors.destroy', $sponsor) }}">
                                @method('delete')
                                @csrf

                                <button type="submit" class="btn btn-primary me-1">حذف</button>

                                <a href="{{ route('sponsors.edit', $sponsor) }}" class="btn btn-primary me-1">

                                    تعديل

                                </a>
                                <a href="{{ route('filter.create', $sponsor) }}" class="btn btn-primary me-1">

                                    انشاء كفالة

                                </a>
                                <a href="{{ route('paids.create', $sponsor) }}" class="btn btn-primary me-1">
                                    انشاء دفعة
                                </a>
                            </form>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="container">
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
                                            <a class="dropdown-item" href="{{ route('orphans.edit', $orphan) }}"><i
                                                    class="  bx bx-adjust"></i> تعديل</a>
                                            <form method="post" action="{{ route('orphans.destroy', $orphan) }}">
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

                <!-- Vertically centered modal -->

            </div>

        </div>

        {{ $orphans->links() }}
    </div>
</x-layouts.app>
