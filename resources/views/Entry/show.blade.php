<x-layouts.app>


    <!-- / Navbar -->

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <!-- Basic Bootstrap Table -->


            <!--/ Basic Bootstrap Table -->

            <hr class="my-5" />

            <!-- Contextual Classes -->

            <div class="card text-bg-warning mb-3">
                <h5 class="card-header">معلومات عامة </h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="table-warning"> المعلومات</th>
                                <th class="table-warning"> المعلومات</th>


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
                                <td><i class="fab fa-react fa-lg text-info "></i> <strong>مدة الإدراج </strong></td>
                                <td></td>

                            </tr>
                            <tr class="table-default">
                                <td>
                                    <i class="fab fa-bootstrap fa-lg text-primary "></i> <strong> رقم القيد</strong>
                                </td>
                                <td>Jerry Milton</td>

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
            2

            <hr class="my-5" />
            @foreach ($people as $person)
                {{ $person->full_name }}
            @endforeach
</x-layouts.app>
