<x-layouts.app>

    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="btn-group-lg">
                <div class="control">
                    <button class="btn btn-primary">filter</button>
                </div>
            </div>
            <hr>
            <div class="profile2">

                {{-- to send entry id to store person in database --}}
                <form action="{{ route('orphans.filter', $sponsor) }}" method="POST" class="row g-3 needs-validation"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class=" col-md-3 -btn-group dropend">
                        <label for="validationCustom04" class="form-label ">جنس المكفول
                        </label>
                        <select name="gender"
                            class="form-select border-warning @error('gender') border-light-danger @enderror"
                            id="validationCustom04" aria-label="Default select example">
                            <option value="الابن">طفل </option>
                            <option value="الابنة">طفلة </option>

                        </select>
                        @error('gender')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class=" col-md-3 -btn-group dropend">
                        <label for="validationCustom04" class="form-label ">عمر المكفول
                        </label>
                        <select name="age"
                            class="form-select border-info    @error('age') border-light-danger @enderror"
                            id="validationCustom04" aria-label="Default select example">
                            <option value="1">أقل من خمس سنوات </option>
                            <option value="2">بين الخامسة والعاشرة </option>
                            <option value="3"> اكثر من عشر سنوات </option>
                        </select>
                        @error('age')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class=" col-md-3 -btn-group dropend">
                        <label for="validationCustom02" class="form-label">الفئة </label>
                        <select name="financial_id"
                            class="form-select border-primary @error('financial_id') border-light-danger @enderror"
                            id="validationCustom04" aria-label="Default select example">
                            {{-- <select value="{{ old('category_id') }}"> --}}
                            <option selected>اختر الفئة</option>
                            @foreach ($financials as $financial)
                                <option value="{{ $financial->id }}">{{ $financial->type }}</option>
                            @endforeach
                        </select>
                        @error('financial_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" col-md-3 -btn-group dropend">
                        <label for="validationCustom02" class="form-label">النوع </label>
                        <select name="category_id"
                            class="form-select border-primary @error('category_id') border-light-danger @enderror"
                            id="validationCustom04" aria-label="Default select example">

                            <option selected>اختر النوع</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" col-md-3 -btn-group dropend">
                        <label for="validationCustom02" class="form-label">الحالة </label>
                        <select name="status_id"
                            class="form-select border-primary @error('status_id') border-light-danger @enderror"
                            id="validationCustom04" aria-label="Default select example">

                            <option selected>اختر الحالة</option>
                            @foreach ($statuss as $status)
                                <option value="{{ $status->id }}">{{ $status->status }}</option>
                            @endforeach
                        </select>
                        @error('status_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-5">
                        <label for="validationServer02" class="form-label">اسم العائلة </label>
                        <input type="text" name="name" class="form-control is-valid" id="validationServer02">
                        <span>يمكن ان يختار عائلة معينة لكفالتها</span>

                    </div>

                    <div class="btn-group-lg">
                        <div class="control">
                            <input class="btn btn-primary" type="submit" value="فلترة">
                        </div>
                        <hr class="my-5" />
                </form>
            </div>

        </div>
        <div class="container">
            <input class="form-control mb-4" id="tableSearch" type="text" placeholder="بحث..">

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
                                <form action="{{ route('orphans.create') }}" method="GET">
                                    <input type="checkbox" name="people[]" value="{{ $person->id }}">
                            </td>
                    @endforeach
                    <div class="row mt-3">
                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                            <input type="submit" class="btn btn-danger" value="اختيار">
                        </div>
                    </div>
                    <hr>
                    </form>


                </tbody>
            </table>
        </div>

        {{ $people->links() }}

    </div>
    </div>





</x-layouts.app>
