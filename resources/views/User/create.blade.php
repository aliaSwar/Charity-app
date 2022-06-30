<x-layouts.app>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y ">



            <div class="card mb-0" {{-- style="max-width: 800px;" id="bb" --}}>
                <div class="row g-0">
                    <div class="d-flex flex-row">
                        <img src="{{ asset('assets/img/image/t.jpg') }}" class="img-fluid d-grid gap-2 col-lg-3 mx-auto"
                            alt="..." id="perr">
                    </div>
                    <form action="{{ route('users.store') }}" method="POST" class="row g-3 needs-validation"
                        enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="card-body">
                            <h5 class="card-title">املأ الحقول بالمعلومات الخاصة بالموظف/ة الجديد/ة:
                            </h5>
                        </div>
                        <div class=" col-md-4 ">
                            <label for="validationCustom02" class="form-label "> اسم
                                الموظف </label>
                            <input type="string" class="form-control" id="validationCustom02" required>
                        </div>
                        <div class=" col-md-4 ">

                            <label for="validationCustom02" class="form-label"> رقم الهاتف </label>
                            <input type="number" class="form-control" required>
                        </div>
                        <div class=" col-md-4 ">

                            <label for="validationCustom02" class="form-label"> الايميل </label>
                            <input type="string" class="form-control" required>
                        </div>
                        <div class=" col-md-4 ">
                            <div class="col-md-12">
                                <label for="validationCustom04" class="form-label" id="rule">دور الموظف</label>
                                <select class="form-select" id="validationCustom04" required>
                                    <option selected disabled value="">...اختر</option>
                                    <option>موظف في قسم الإدراج</option>
                                    <option>مدير في قسم الإدراج</option>
                                    <option>موظف في قسم الإدراج الطبي</option>
                                    <option>مدير في قسم الإدراج الطبي</option>
                                    <option>موظف في قسم الكفالات</option>
                                    <option> مدير في قسك الكفالات</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label" id="per"> :
                                    الصلاحيات
                                    للموظف </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        إضافة مدرج
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        التأكد من وجود الأوراق اللازمة
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        إدراة بيانات المدرجين
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        تسجيل إعانة جديدة
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        متابعة قسم الحالات غير النشطة
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        إدارة بيانات المكفولين
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        إضافة كفالة جديدة
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        إدارة التقارير المالية لكل كفيل
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group-lg">
                            <div class="row mt-3">
                                <div class="d-grid gap-2 col-lg-6 mx-auto">
                                    <input type="submit" class="btn btn-secondary" value="اختيار">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

</x-layouts.app>
