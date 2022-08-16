<x-layouts.app>

    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- <hr class="my-5" /> --}}
            <form action="{{ route('create.aids') }}" method="POST" class="row g-3 needs-validation"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">تاريخ الاعانة </label>
                    <input name="aid_date" type="date" class="form-control" id="validationCustom02">

                </div>


                <div class=" col-md-3 -btn-group dropend -mt-px">
                    <label for="validationCustom04" class="form-label">نوع الاعانة</label>
                    <select name="aid_id" class="form-select"
                        id="validationCustom04" aria-label="Default select example">
                        {{-- <select value="{{ old('category_id') }}"> --}}
                        <option selected>اختر نوع الاعانة</option>
                        @foreach ($aids as $aid)
                            <option value="{{ $aid->id }}">{{ $aid->name }}</option>
                        @endforeach
                    </select>
                    <input class="form-check-input" type="checkbox" name="selectAll"
                                                value="all">
                                            <label class="form-check-label" for="selectAll"> اختيار الكل
                                            </label>

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
                            @foreach ($allentry as $entry)
                                <tr>
                                    <td>{{ $entry->id }}</td>
                                    <td>{{ $entry->family_name }}</td>
                                    <td><a href="{{route('entry.aids',$entry -> id)}}" class="btn btn-success">عرض الاعانات </a>
                                        <input class="form-check-input" type="checkbox"
                                        name="entryid[]" value="{{ $entry->id }}">
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>



                 <hr class="my-5" />

                <div class="col-md-12">

                  <button class="btn btn-primary" type="submit"> تأكيد </button>

                </div>



              <hr class="my-5" />

            </form>

            <hr class="my-5" />



</x-layouts.app>
