<x-layouts.app>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <!-- Basic Bootstrap Table -->


            <!--/ Basic Bootstrap Table -->

            <hr class="my-5" />


            <div class="container">
                <input class="form-control mb-4" id="tableSearch" type="text" placeholder="بحث..">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            <th class="table-success ">اسم العائلة</th>
                            <th class="table-success ">عدد الأطفال المكفولين </th>
                            <th class="table-success ">عدد الأطفال الغير مكفولين</th>
                            <th class="table-success ">الأم مكفولة</th>
                            <th class="table-success ">الفئة </th>
                            <th class="table-success ">التفاصيل </th>
                        </tr>
                    </thead>
                    <tbody id="myTable">

                        @foreach ($data as $key => $value)
                            <tr>
                                <td>{{ $value->is_orphan_number }}</td>
                        @endforeach

                    </tbody>
                </table>
            </div>



        </div>
    </div>
</x-layouts.app>
