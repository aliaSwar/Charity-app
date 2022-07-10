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
                            <label for="validationCustom02" class="form-label  "> اسم
                                الموظف </label>
                            <input type="string" name="name"class="form-control @error('name') is-invalid @enderror"
                                id="validationCustom02">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class=" col-md-4 ">

                            <label for="validationCustom02" class="form-label"> رقم الهاتف </label>
                            <input type="number" name="phone"class="form-control">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class=" col-md-4 ">

                            <label for="validationCustom02" class="form-label"> الصورة</label>
                            <input type="file" name="image"class="form-control">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class=" col-md-4 ">

                            <label for="validationCustom02" class="form-label"> الايميل </label>
                            <input type="string"
                                name="email"class="form-control  @error('email') is-invalid @enderror">
                        </div>
                        <div class=" col-md-4 ">
                            <div class="col-md-12">
                                <label for="validationCustom04" class="form-label" id="rule">دور الموظف</label>
                                <select class="form-select" name="role_id" id="validationCustom04">
                                    <option selected disabled value="">...اختر</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach


                                </select>

                            </div>
                        </div>

                        <div class="col-12">
                            <h4 class="mt-2 pt-50">اضافة الصلاحيات</h4>
                            <div class="table-responsive">
                                <table class="table table-flush-spacing">
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap fw-bolder">
                                                حالات الوصول
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="اعطاءالكل">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                        height="14" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-info">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="16" x2="12"
                                                            y2="12"></line>
                                                        <line x1="12" y1="8" x2="12.01"
                                                            y2="8"></line>
                                                    </svg>
                                                </span>
                                            </td>
                                            <td>

                                                <input class="form-check-input" type="checkbox" name="selectAll"
                                                    id="selectAll">
                                                <label class="form-check-label" for="selectAll"> اختيار الكل </label>

                                            </td>
                                        </tr>
                                        @foreach ($permissions as $permission)
                                            <tr>
                                                <td>
                                                    {{ $permission->name }}
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="form-check me-3 me-lg-5">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="userManagementRead">
                                                            <label class="form-check-label" for="userManagementRead">
                                                                انشاء</label>
                                                        </div>
                                                        <div class="form-check me-3 me-lg-5">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="userManagementWrite">
                                                            <label class="form-check-label" for="userManagementWrite">
                                                                عرض </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="userManagementCreate">
                                                            <label class="form-check-label"
                                                                for="userManagementCreate"> تعديل </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="userManagementCreate">
                                                            <label class="form-check-label"
                                                                for="userManagementCreate"> حذف</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
</x-layouts.app>
