<x-layouts.app>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="container ">
                <div class="card mb-0">
                    <div class="row g-0">
                        <p class="card-header">الكفيل:</p>
                        <div class="d-grid gap-md-0 col-lg-2 mx-auto">
                            <div class="d-flex flex-row">

                                <img src="{{ asset('assets/img/image/father.png') }}" class="rounded-circle " />

                            </div>
                            <br>
                            <h5> ❤️🙈{{ $sponsor->user->name }}😘</h5>
                            <br>
                        </div>

                    </div>
                </div>
                <br>
                <div class="row mb-2">
                    <div class="col-md-4 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text"> تاريخ البدء: {{ $orphan->begin_date }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text"> تاريخ الانتهاء: {{ $orphan->end_date }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text"> النوع:{{ $orphan->type->type }} </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text"> الراتب الشهري لكل فرد: {{ $orphan->salary_month }} ليرة</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text"> الراتب السنوي لكل فرد: {{ $orphan->salary_year }} ليرة</p>

                            </div>
                        </div>
                    </div>

                </div>

                <table class="table tables-basic tables-basic">
                    <thead>
                        <tr>
                            <th class="table-success "> المكفول</th>
                            <th class="table-success "> اسم المكفول</th>
                            <th class="table-success "> عائلة المكفول</th>
                            <th class="table-success "> الأم مكفولة</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($people as $key => $person)
                            <tr>
                                <td>
                                    {{ $person->id }}
                                </td>
                                <td>
                                    <a href="{{ route('person.show', $person) }}">{{ $person->full_name }}</a>
                                </td>
                                <td>
                                    <a
                                        href="{{ route('entries.show', $person->entry) }}">{{ $person->entry->family_name }}</a>
                                </td>
                                <td>
                                    {{ $orphan->mother_is_ok }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-layouts.app>
