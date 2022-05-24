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
                <hr class="my-5" />
                <form id="contactEntry" action="{{ route('entries.store') }}" method="POST"
                    class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">اسم العائلة</label>
                        <input name="family_name" type="text" class="form-control" id="validationCustom01" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">رقم الديوان </label>
                        <input name="diwan_num" type="number" class="form-control" id="validationCustom02" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">رقم البطاقة الذكية</label>
                        <input name="smartCard_num" type="number" class="form-control" id="validationCustom02"
                            required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">رقم الهاتف</label>
                        <div class="input-group has-validation">

                            <input name="phone_num" type="number" class="form-control" id="validationCustomUsername"
                                placeholder="0944444458" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label"> رقم السجل </label>
                        <input name="registration_num" type="number" class="form-control" id="validationCustom02"
                            required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label"> رقم القيد </label>
                        <input name="family_num" type="number" class="form-control" id="validationCustom02" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
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
                        <input name="address" type="text" class="form-control" id="validationCustom03"
                            placeholder="city">
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">نوع المدرج </label>
                        <select name="category_id" class="form-select" id="validationCustom04" required>
                            <select value="{{ old('category_id') }}">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">حالة المدرج </label>
                        <select name="status_is" class="form-select" id="validationCustom04" required>
                            <select value="{{ old('status_id') }}">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->status }}</option>
                                @endforeach
                            </select>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label">رقم البطاقة الذكية</label>
                        <input type="number" class="form-control" id="validationCustom05" required>

                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label"> راتب الإدراج</label>
                        <input name="salary_charity" type="number" class="form-control" id="validationCustom05">

                    </div>
                    <hr class="my-5" />
                    <div class="col-md-3">
                        <button type="submit" id="save_entry" class="btn btn-primary">تم</button>
                    </div>
                </form>

                <hr class="my-5" />

                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label"> اسم الزوج</label>
                    <input type="text" class="form-control" id="validationCustom05" required>

                </div>
                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label"> الرقم الوطني للزوج</label>
                    <input type="text" class="form-control" id="validationCustom05" required>

                </div>
                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label"> عدد أطفال الزوج</label>
                    <input type="text" class="form-control" id="validationCustom05" required>

                </div>
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">الوضع العائلي للزوج</label>
                    <!-- Default dropend button -->
                    <div class="btn-group dropend">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">متزوج</option>
                            <option value="2">مطلق</option>
                            <option value="3">أرمل</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label"> مواليد الزوج</label>
                    <input type="text" class="form-control" id="validationCustom05" required>

                </div>

                <hr class="my-5" />

                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label"> اسم الزوجة</label>
                    <input type="text" class="form-control" id="validationCustom05" required>

                </div>
                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label"> الرقم الوطني للزوجة</label>
                    <input type="text" class="form-control" id="validationCustom05" required>

                </div>
                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label"> عدد أطفال الزوجة</label>
                    <input type="text" class="form-control" id="validationCustom05" required>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">الوضع العائلي للزوجة</label>
                    <!-- Default dropend button -->
                    <div class="btn-group dropend">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">متزوجة</option>
                            <option value="2">مطلقة</option>
                            <option value="3">أرملة</option>
                        </select>
                    </div>


                </div>
                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label"> مواليد الزوجة</label>
                    <input type="text" class="form-control" id="validationCustom05" required>

                </div>


                <div class="profile2">

                    <hr class="my-5" />
                    <div class="col-md-3">

                        <label for="validationCustom05" class="form-label">اسم الطفل </label>
                        <input type="text" class="form-control" id="validationCustom05" required>
                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label"> مواليد الطفل </label>
                        <input type="text" class="form-control" id="validationCustom05" required>
                    </div>


                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label"> الصف</label>
                        <!-- Default dropend button -->
                    </div>
                    <div class="btn-group dropend">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option>الأول</option>
                            <option>الثاني</option>
                            <option>الثالث</option>
                            <option>الرابع</option>
                            <option>الخامس</option>
                            <option>السادس</option>
                            <option>أول إعدادي</option>
                            <option>ثاني إعدادي</option>
                            <option>ثالث إعدادي</option>
                            <option>أول ثانوي</option>
                            <option>ثاني ثانوي</option>
                            <option>ثالث ثانوي</option>
                            <option> منقطع</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <button id="btnAddLanguage" class="btn btn-primary" type="button"> إضافة طفل </button>
                </div>


            </div>
            <hr class="my-5" />
        </div>





        <div id="tam" class="col-md-3">
            <button class="btn btn-primary">تم</button>
        </div>

        </form>

    </div>

    </div>
    <x-slot name="scripts">
        {{-- include jquery cdn --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        {{-- Initialize Ajax query --}}
        <script>
            $('#contactEntry').on('click', '#save_entry', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('entries.store') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response)
                })
            });
        </script>
    </x-slot>

</x-layouts.app>
