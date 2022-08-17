<x-layouts.app>
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <div class="col-14">
                    <div class="card mb-4">
                        <h5 class="card-header">{{ $sponsor->user->name }}</h5>
                        <div class="card-body">
                            <p class="card-text">
                                <br>
                                الكفيل, {{ $sponsor->user->name }}❤️
                            </p>

                            <a class="btn btn-success" href="{{ route('sponsors.show', $sponsor) }}"
                                style="background: #1ABC9C !important">عرض</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xxl flex-grow-1 container-p-y">


            <form class="row g-3" action="{{ route('orphans.store', $sponsor) }}" method="POST">
                @csrf

                <div class="col-md-5">
                    <label for="validationServer02" class="form-label">المبلغ </label>
                    <input type="number"
                        name="salary_year"class="form-control is-valid @error('salary_year') is-invalid @enderror"
                        id="validationServer02">
                    @error('salary_year')
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
                        id="validationServer01">
                    @error('begin_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <label for="validationServer01" class="form-label">تاريخ انتهاء الكفالة</label>
                    <input type="date" name="end_date"
                        class="form-control is-valid @error('end_date') is-invalid @enderror" id="validationServer01">
                    @error('end_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                @if ($mothers == null)
                    <div class="col-md-5 position-relative">
                        <label for="validationTooltip04" class="form-label">أتريد كفالة الأم؟</label>
                        <select name="mother_is_ok"class="form-select is-valid @error('type_id') is-invalid @enderror"
                            id="validationTooltip04">
                            <option selected disabled value="">اختر...</option>
                            @foreach ($mothers as $mother)
                                <option value="{{ $mother->id }}">
                                    {{ $mother->full_name }}عائلة{{ $mother->entry->family_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                @endif
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
                @foreach ($people as $key => $person)
                    <tr>
                        <td><a href="{{ route('entries.show', $person->entry) }}">
                                {{ $person->entry->family_name }}
                            </a></td>
                        <td><a href="{{ route('person.show', $person) }}">{{ $person->full_name }}</a></td>
                        <td>
                            تأكيد الكفالة
                            <input type="checkbox" name="people[]" value="{{ $person->id }}">
                        </td>
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
