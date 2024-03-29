<x-layouts.app>

    <slot name="styles">
        <link rel="stylesheet" href="{{ asset('assets\loading.css') }}">
    </slot>

    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <div class="col-14">
                    <div class="card mb-4">
                        <h5 class="card-header">{{ $type->type }}</h5>
                        <div class="card-body">
                            <br>
                            <p class="card-text">
                                جمعيتنا , ❤️ جمعية انعاش الفقير الخيرية لديها كفالات لمدة
                                {{ $type->type }}وعدد أشهرها {{ $type->date }}
                            </p>
                            <p class="demo-inline-spacing">
                            <form method="post" action="{{ route('types.destroy', $type) }}">
                                @method('delete')
                                @csrf

                                <button type="submit" class="btn btn-primary me-1">حذف</button>

                                <a href="{{ route('types.edit', $type) }}" class="btn btn-primary me-1">

                                    تعديل

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
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="table-success ">رقم الكفالة</th>

                            <th class="table-success ">التفاصيل </th>
                        </tr>
                    </thead>
                    @foreach ($orphans as $orphan)
                        <tr>
                            <td>{{ $orphan->id }}</td>


                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('orphans.show', $orphan) }} detail"><i
                                                class="bx bx bxs-detail"></i> عرض التفاصيل</a>
                                        <a class="dropdown-item" href="{{ route('orphans.edit', $orphan) }}"><i
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
        {{ $orphans->links() }}
</x-layouts.app>
