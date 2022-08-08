<x-layouts.app>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="container ">
                <div class="card mb-0">
                    <div class="row g-0">
                        <div class="d-grid gap-md-5 col-lg-2 mx-auto">
                            <div class="d-flex flex-row">
                                @if ($person->category == 'الابن')
                                    <img src={{ asset('assets/img/image/boy.jpg') }} class="rounded-circle " />
                                @elseif ($person->category == 'الابنة')
                                    <img src={{ asset('assets/img/image/child.jpg') }} class="rounded-circle " />
                                @elseif ($person->category == 'الأم')
                                    <img src={{ asset('assets/img/image/mother.png') }} class="rounded-circle " />
                                @else
                                    <img src={{ asset('assets/img/image/father.png') }} class="rounded-circle " />
                                @endif
                            </div>
                            <p class="card-text">{{ $person->full_name }}</p>
                        </div>
                    </div>
                </div>
                <br>

                <div class="row mb-2">
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text"> المواليد: {{ $person->birthday }}</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">الجنس:{{ $person->category }}</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">الهاتف:{{ $person->phone ? $person->phone : 'ليس لديه' }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">الحالة الصحية:
                                    {{ $person->health_status }}</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">العمل:
                                    {{ $person->work }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">حالته:
                                    {{ $person->status }}</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">وضعه الاجتماعي:
                                    {{ $person->family_status }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">التعليم:
                                    {{ $person->education }}</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">مكفول:

                                    {{ $person->orphan ? ' :نعم تابع  للكفالة ذات الرقم' . $person->orphan_id : 'لا' }}
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">عائلته:
                                    {{ $person->entry->family_name }}</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-0">
                    <div class="row g-0">
                        <div class="card-body ">
                            ملاحظات:
                            <p class="card-text">{{ $person->notes }}</p>
                        </div>


                    </div>
                </div>
</x-layouts.app>
