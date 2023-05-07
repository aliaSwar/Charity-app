<x-layouts.app>
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <div class="col-14">
                    <div class="card mb-4">
                        <h5 class="card-header">{{ $orphan->sponsor->user->name }}</h5>
                        <div class="card-body">
                            <p class="card-text">
                                <br>
                                الكفيل, {{ $orphan->sponsor->user->name }}❤️
                            </p>

                            <a class="btn btn-success" href="{{ route('sponsors.show', $orphan->sponsor) }}"
                                style="background: #1ABC9C !important">عرض</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xxl flex-grow-1 container-p-y">


            <form class="row g-3" action="{{ route('orphans.update', $orphan) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-5">
                    <label for="validationServer02" class="form-label">المبلغ </label>
                    <input type="number"
                        name="salary"class="form-control is-valid @error('salary') is-invalid @enderror"
                        value="{{ old('salary', $orphan->salary) }}">
                    @error('salary')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-5 position-relative">
                    <label for="validationTooltip04" class="form-label">نوع الكفالة</label>
                    <select name="type_id"class="form-select is-valid @error('type_id') is-invalid @enderror"
                        id="validationTooltip04">
                        <option selected disabled value="">اختر...</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <label for="validationServer01" class="form-label"> تاريخ بدء الكفالة</label>
                    <input type="date" name="begin_date"
                        class="form-control is-valid @error('begin_date') is-invalid @enderror "
                        value="{{ old('begin_date', $orphan->begin_date) }}">
                    @error('begin_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <label for="validationServer01" class="form-label">تاريخ انتهاء الكفالة</label>
                    <input type="date" name="end_date"
                        class="form-control is-valid @error('end_date') is-invalid @enderror"value="{{ old('end_date', $orphan->end_date) }}">
                    @error('end_date')
                        <div class="alert
                        alert-danger">{{ $message }}
                        </div>
                    @enderror
                </div>

        </div>
    </div>

    <div class="container">


        <h5 class="card-header-elements">عرض الأطفال المكفولين</h3>



    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="table-success ">اسم العائلة</th>
                <th class="table-success ">اسم الفرد</th>
                <th class="table-success ">التفاصيل </th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($orphan->people as $person)
                <tr>
                    <td><a
                            href="{{ route('entries.show', $person->entry) }}"style="
                            text-decoration:none
                        ">
                            {{ $person->entry->family_name }}
                        </a></td>
                    <td><a href="{{ route('person.show', $person) }}"
                            style="text-decoration: none">{{ $person->full_name }}</a></td>
                    <td>
                        تأكيد الكفالة
                        <input type="checkbox" name="person_id" value="{{ $person->id }}">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row mt-3">
        <div class="d-grid gap-2 col-lg-6 mx-auto">
            <input type="submit" class="btn btn-danger" value="اختيار">
        </div>
    </div>
    </form>


</x-layouts.app>
