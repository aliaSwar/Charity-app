<x-layouts.app>


    <!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>
                </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <div class="navbar-nav align-items-center">
                    <div class="nav-item d-flex align-items-center">


                        <h5 class="card-title al"> جمعية إنعاش الفقير الخيرية في التل/ قسم الإدراج </h5>

                    </div>
                </div>

                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <!-- Place this tag where you want the button to render. -->

            </div>
        </nav>

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
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">رقم القيد </label>
                        <input name="diwan_num" type="number"
                            class="form-control @error('diwan_num') border-light-danger @enderror"
                            id="validationCustom02">
                        @error('diwan_num')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">رقم البطاقة الذكية</label>
                        <input name="smartCard_num" type="number"
                            class="form-control @error('smartCard_num') border-light-danger @enderror"
                            id="validationCustom02">
                        @error('smartCard_num')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">رقم
                            الهاتف</label>
                        <div class="input-group has-validation">

                            <input name="phone_num" type="number"
                                class="form-control  @error('phone_num') border-light-danger @enderror"
                                id="validationCustomUsername" placeholder="0944444458"
                                aria-describedby="inputGroupPrepend">
                        </div>
                        @error('phone_num')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label"> رقم السجل </label>
                        <input name="registration_num" type="number"
                            class="form-control @error('registration_num') border-light-danger @enderror"
                            id="validationCustom02">
                        @error('registration_num')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label"> عدد أفراد العائلة </label>
                        <input name="family_num" type="number"
                            class="form-control @error('family_num') border-light-danger @enderror"
                            id="validationCustom02">
                        @error('family_num')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">تاريخ الادراج </label>
                        <input name="entry_date" type="date" class="form-control" id="validationCustom02">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">تاريخ التجديد</label>
                        <input name="renewal_date" type="date" class="form-control" id="validationCustom02">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">تاريخ الانتهاء</label>
                        <input name="finshed_date" type="date" class="form-control" id="validationCustom02">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">العنوان</label>
                        <input name="address" type="text"
                            class="form-control @error('address') border-light-danger @enderror" id="validationCustom03"
                            placeholder="city">
                        @error('address')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class=" col-md-3 -btn-group dropend">
                        <label for="validationCustom04" class="form-label">نوع المدرج </label>
                        <select name="category_id"
                            class="form-select @error('category_id') border-light-danger @enderror"
                            id="validationCustom04" aria-label="Default select example">
                            {{-- <select value="{{ old('category_id') }}"> --}}
                            <option selected>اختر نوع المدرجين</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-danger">{{ $message }}</p>
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
                            <p class="text-danger">{{ $message }}</p>
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
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label"> راتب الإدراج</label>
                        <input name="salary_charity" type="number" class="form-control" id="validationCustom05">

                    </div>
                    {{-- <hr class="my-5" /> --}}

                    <button type="submit"
                        class="btn btn-primary btn-lg text-center waves-effect waves-light">تم</button>


                </form>

                <hr class="my-5" />


</x-layouts.app>
