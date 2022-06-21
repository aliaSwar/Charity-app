<x-layouts.app>

    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <hr class="my-5" />

            <!-- Contextual Classes -->

            <div class="card text-bg-primary mb-3">
                <h5 class="card-header">معلومات عامة </h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="table-primary"> المعلومات</th>
                                <th class="table-primary"> المعلومات</th>


                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr class="table-default">
                                <td><i class="fab fa-sketch fa-lg text-warning "></i> <strong>رقم القيد</strong>
                                </td>
                                <td>{{ $entry->diwan_num }}</td>

                            </tr>

                            <tr class="table-default">
                                <td><i class="fab fa-angular fa-lg text-danger "></i> <strong>تاريخ الإدراج</strong>
                                </td>
                                <td>{{ $entry->entry_date }}</td>

                            </tr>
                            <tr class="table-default">
                                <td><i class="fab fa-vuejs fa-lg text-success"></i> <strong>تاريخ الانتهاء</strong>
                                </td>
                                <td>Trevor Baker</td>

                            </tr>
                            <tr class="table-default">
                                <td><i class="fab fa-react fa-lg text-info "></i> <strong>العائلة مكفولة </strong></td>
                                <td>{{ $entry->all_orphan }}</td>

                            </tr>
                            <tr class="table-default">
                                <td>
                                    <i class="fab fa-bootstrap fa-lg text-primary "></i> <strong>الأم مكفولة</strong>
                                </td>
                                <td> </td>

                                </td>
                            </tr>
                            <tr class="table-default">
                                <td><i class="fab fa-sketch fa-lg text-warning "></i> <strong> العنوان</strong></td>
                                <td>Sarah Banks</td>

                            </tr>
                            <tr class="table-default">
                                <td><i class="fab fa-react fa-lg text-info"></i> <strong>رقم البطاقة الذكية
                                    </strong></td>
                                <td>Ted Richer</td>

                            </tr>
                            <tr class="table-default">
                                <td>
                                    <i class="fab fa-bootstrap fa-lg text-primary "></i> <strong>راتب الإدراج
                                    </strong>
                                </td>
                                <td>Perry Parker</td>


                        </tbody>
                    </table>
                </div>
            </div>
            <hr class="my-5">
            <div class="card text-bg-danger mb-3">
                <h5 class="card-header">معلومات الأفراد </h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="table-primary"> اسم الفرد</th>
                                <th class="table-primary"> من هو</th>
                                <th class="table-primary"> مكفول</th>

                            </tr>
                        </thead>
                        <tbody class="table-flush-spacing">
                            @foreach ($people as $person)
                                <tr class="table-default">
                                    <td><i class="fab fa-sketch fa-lg text-warning "></i>
                                        <a href="{{ route('person.show', $person) }}">
                                            {{ $person->full_name }}
                                        </a>
                                    </td>
                                    <td>{{ $person->category }}</td>
                                    <td>{{ $person->orphan == false ? 'لا' : 'نعم' }}</td>


                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>

            <hr class="my-5" />

</x-layouts.app>
