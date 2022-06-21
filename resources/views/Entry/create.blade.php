<x-layouts.app>




    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- <hr class="my-5" /> --}}
            <form action="{{ route('entries.store') }}" method="POST" class="row g-3 needs-validation"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">اسم العائلة</label>
                    <input name="family_name" type="text"
                        class="form-control @error('family_name') border-light-danger @enderror"
                        id="validationCustom01">
                    @error('family_name')
                        <div>
                            <div class="alert alert-danger">{{ $message }}</div>
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">رقم القيد </label>
                    <input name="diwan_num" type="number"
                        class="form-control @error('diwan_num') border-light-danger @enderror" id="validationCustom02">
                    @error('diwan_num')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">رقم البطاقة الذكية</label>
                    <input name="smartCard_num" type="number"
                        class="form-control @error('smartCard_num') border-light-danger @enderror"
                        id="validationCustom02">
                    @error('smartCard_num')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">رقم
                        الهاتف</label>
                    <div class="input-group has-validation">

                        <input name="phone_num" type="text"
                            class="form-control  @error('phone_num') border-light-danger @enderror"
                            id="validationCustomUsername" placeholder="0944444458" aria-describedby="inputGroupPrepend">
                    </div>
                    @error('phone_num')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label"> رقم السجل </label>
                    <input name="registration_num" type="number"
                        class="form-control @error('registration_num') border-light-danger @enderror"
                        id="validationCustom02">
                    @error('registration_num')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label"> عدد أفراد العائلة </label>
                    <input name="family_num" type="number"
                        class="form-control @error('family_num') border-light-danger @enderror" id="validationCustom02">
                    @error('family_num')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">تاريخ الادراج </label>
                    <input name="entry_date" type="date" class="form-control" id="validationCustom02">
                    @error('entry_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">تاريخ التجديد</label>
                    <input name="renewal_date" type="date" class="form-control" id="validationCustom02">
                    @error('renewal_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">تاريخ الانتهاء</label>
                    <input name="finshed_date" type="date" class="form-control" id="validationCustom02">
                    @error('finshed_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">العنوان</label>
                    <input name="address" type="text"
                        class="form-control @error('address') border-light-danger @enderror" id="validationCustom03"
                        placeholder="city">
                    @error('address')
                        <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                </div>
                <div class=" col-md-3 -btn-group dropend -mt-px">
                    <label for="validationCustom04" class="form-label">نوع المدرج </label>
                    <select name="category_id" class="form-select @error('category_id') border-light-danger @enderror"
                        id="validationCustom04" aria-label="Default select example">
                        {{-- <select value="{{ old('category_id') }}"> --}}
                        <option selected>اختر نوع المدرجين</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" col-md-3 -btn-group dropend">
                    <label for="validationCustom04" class="form-label">الفئة </label>
                    <select name="financial_id"
                        class="form-select @error('financial_id') border-light-danger @enderror"
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
                    <label for="validationCustom04" class="form-label ">حالة المدرج
                    </label>
                    <select name="status_id" class="form-select @error('status_id') border-light-danger @enderror"
                        id="validationCustom04" aria-label="Default select example">
                        <option selected>اختر حالة المدرج</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->status }}</option>
                        @endforeach
                    </select>
                    @error('status_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label"> راتب الإدراج</label>
                    <input name="salary_charity" type="number" class="form-control" id="validationCustom05">
                    @error('salary_charity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row-cols-md-3">
                    <label for="validationCustom05" class="form-label"> الأوراق الثبوتية</label>
                    <select class="form-select demo-spacing mt-3" multiple aria-label="multiple select example"
                        name="papers[]" multiple>
                        @foreach ($papers as $paper)
                            <option value="{{ $paper->id }}">{{ $paper->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mt-3">
                    <div class="d-grid gap-2 col-lg-6 mx-auto">
                        <button class="btn btn-secondary btn-lg" type="submit">تم</button>
                    </div>
                </div>
            </form>

            <hr class="my-5" />



</x-layouts.app>
