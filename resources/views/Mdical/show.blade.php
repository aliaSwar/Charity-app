<x-layouts.app>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="container ">

                <div class="row mb-2">
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">اسم المريض:{{ $mdical->name_recipient }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text"> المواليد: {{ $mdical->birthday }}</p>

                            </div>
                        </div>
                    </div>


                </div>

                <div class="row mb-2">
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">الهاتف:{{ $mdical->phone ? $mdical->phone : 'ليس لديه' }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">المرض:
                                    {{ $mdical->illness }}</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">العنوان:
                                    {{ $mdical->address }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">ترتيبه ضمن العائلة:
                                    {{ $mdical->whos }}</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">الوالد:
                                    {{ $mdical->husband_name }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">الوالدة:
                                    {{ $mdical->wife_name }}</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-0">
                    <div class="row g-0">
                        <div class="card-body ">
                            قرار الجلسة
                            <p class="card-text">{{ $mdical->session_decision }}</p>
                        </div>


                    </div>
                </div>
</x-layouts.app>
