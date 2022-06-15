<x-layouts.app>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> إضافة كفيل</h4>

            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">


                        </div>
                        <div class="card-body">
                            <form action="{{ route('sponsors.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">اسم
                                        الكفيل</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                    class="bx bx-user"></i></span>
                                            <input name="name" type="text"
                                                class="form-control @error('name') border-light-danger @enderror"
                                                id="basic-icon-default-fullname" placeholder="فاعل خير " aria-label=" فاعل
                                                خير " aria-describedby="basic-icon-default-fullname2" />
                                            @error('name')
                                                <div>
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">العنوان
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                                    class="bx bx-buildings"></i></span>
                                            <input name="address" type="text" id="basic-icon-default-company"
                                                class="form-control @error('address') border-light-danger @enderror"
                                                placeholder="دمشق" aria-label="دمشق"
                                                aria-describedby="basic-icon-default-company2" />
                                            @error('address')
                                                <div>
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"
                                        for="basic-icon-default-email">الايميل</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                            <input name="email" type="text" id="basic-icon-default-email"
                                                class="form-control @error('email') border-light-danger @enderror"
                                                placeholder="john.doe" aria-label="john.doe"
                                                aria-describedby="basic-icon-default-email2" />

                                            @error('email')
                                                <div>
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">رقم الهاتف</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                    class="bx bx-phone"></i></span>
                                            <input name="phone" type="text" id="basic-icon-default-phone"
                                                class="form-control phone-mask @error('phone') border-light-danger @enderror"
                                                placeholder="658 799 8941" aria-label="658 799 8941"
                                                aria-describedby="basic-icon-default-phone2" />
                                            @error('phone')
                                                <div>
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">إنشاء</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->

</x-layouts.app>
