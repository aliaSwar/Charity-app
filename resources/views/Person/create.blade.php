<x-layouts.app>
    <x-slot name="styles">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </x-slot>
    <x-slot name="scripts">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript">
            /* store person in database and return respones success  */
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#btnAddPerson").click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: {{ route('people.store') }},
                    method: 'POST',
                    data: {
                        /* Code: title,
                        Chief: details */
                    },
                    success: function(response) {
                        if (response.success) {
                            console.log(response.message) //Message come from controller
                        } else {
                            alert("Error")
                        }
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            });
        </script>
    </x-slot>
    <!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>
                </a>
            </div>

            <div class="navbar-nav-left d-flex align-items-center" id="navbar-collapse">
                <!-- Search -->
                <div class="navbar-nav align-items-center">
                    <div class="nav-item d-flex align-items-center">


                        <h5 class="card-title al"> جمعية إنعاش الفير الخيرية في التل/ قسم الإدراج </h5>

                    </div>
                </div>
                <!-- /Search -->

                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <!-- Place this tag where you want the button to render. -->



                </ul>
            </div>
        </nav>

        <!-- Navbar -->


        <div class="content-wrapper">

            <div class="container-xxl flex-grow-1 container-p-y">
                <hr class="my-5" />
                <div class="profile2">
                    <form {{-- action="{{ route('people.store') }}" --}} method="POST" class="row g-3 needs-validation"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">اسم الفرد</label>
                            <input name="family_name" type="text"
                                class="form-control @error('full_name') border-light-danger @enderror"
                                id="validationCustom01">
                            @error('full_name')
                                <div>
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">رقم التواصل</label>
                            <input name="phone" type="number"
                                class="form-control @error('phone') border-light-danger @enderror"
                                id="validationCustom02">
                            @error('phone')
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
                                class="form-control @error('address') border-light-danger @enderror"
                                id="validationCustom03" placeholder="city">
                            @error('address')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>


                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label"> راتب الإدراج</label>
                            <input name="salary_charity" type="number" class="form-control" id="validationCustom05">

                        </div>


                        {{-- the id btnAddPerson button to new person --}}
                        <div class="">
                            <button id="btnAddPerson" class="btn btn-primary" type="button"> إضافة طفل </button>
                        </div>
                        <hr class="my-5" />


                    </form>

                </div>





</x-layouts.app>
