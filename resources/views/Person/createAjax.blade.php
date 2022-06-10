<x-layouts.app>
    <x-slot name="styles">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </x-slot>
    <x-slot name="scripts">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript">
            /* store person in database and return respones success  */ <
            script >
                $('#contactForm').on('submit', function(event) {
                    event.preventDefault();
                    // Get Alll Text Box Id's
                    name = $('#full_name').val();


                    $.ajax({
                        url: "{{ route('people.store') }}", //Define Post URL
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            full_name: full_name,

                        },
                        //Display Response Success Message
                        success: function(response) {
                            $('#res_message').show();
                            $('#res_message').html(response.msg);
                            $('#msg_div').removeClass('d-none');

                            document.getElementById("contactForm").reset();
                            setTimeout(function() {
                                $('#res_message').hide();
                                $('#msg_div').hide();
                            }, 4000);
                        },
                    });
                });
        </script>
    </x-slot>
    <!-- / Menu -->
    @if (session()->has('sucsess'))
        <div class="alert alert-success">
            <p>{{ session()->get('sucsess') }}</p>
        </div>
    @endif
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
                    <form id="contactForm" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">اسم الفرد</label>
                            <input type="text" class="form-control" id="family_name">

                        </div>


                        <div class="">
                            <button class="btn btn-primary" type="button"> اضافةشخص للمدرجين</button>
                        </div>
                        <hr class="my-5" />


                    </form>

                </div>





</x-layouts.app>
