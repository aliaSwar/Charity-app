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
                <form action="{{ route('statuses.store') }}" method="POST" class="row g-3 needs-validation"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label"> ادخل حالة المدرجين </label>
                        <input name="status" type="text"
                            class="form-control @error('status') border-light-danger @enderror" id="validationCustom01">
                        @error('status')
                            <div>
                                <p class="help is-danger">{{ $message }}</p>
                            </div>
                        @enderror

                    </div>
                    <hr class="my-5" />
                    <div class="col-md-3">
                        <input type="submit" value="تم" class="btn btn-primary" />
                    </div>
                </form>


</x-layouts.app>
