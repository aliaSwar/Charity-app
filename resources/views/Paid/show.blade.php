<x-layouts.app>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="container ">
                <div class="card mb-0">

                    <div class="row g-0">

                        <div class="d-grid gap-md-0 col-lg-2 mx-auto">
                            <div class="d-flex flex-row">
                                <img src={{ Storage::url($paid->image) }} class="rounded-circle " />
                            </div>
                            <br>

                        </div>
                    </div>
                </div>
                <br>

                <div class="row mb-2">
                    <div class="col-md-12 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text"> الكفيل: {{ $paid->sponsor->user->name }}</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">المبلغ: {{ $paid->amount }}</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-12 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">التاريخ: {{ $paid->date_paid }}
                                <p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
