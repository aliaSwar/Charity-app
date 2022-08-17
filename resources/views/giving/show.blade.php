<x-layouts.app>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <!-- Basic Bootstrap Table -->


            <!--/ Basic Bootstrap Table -->

            <hr class="my-5" />










            <!-- Contextual Classes -->



            <!--/ Contextual Classes -->


            <div class="container">
                <input class="form-control mb-4" id="tableSearch" type="text"
                    placeholder=" بحث في إعانات العائلة(////)..">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="table-success "> رقم الإعانة</th>
                            <th class="table-success "> الإعانة</th>
                            <th class="table-success ">تاريخ الإعانة </th>

                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php $a = 0; ?>
                        @foreach ($aids as $aid)
                            <tr>
                                <?php $a++; ?>
                                <td>{{ $a }}</td>
                                <td>{{ $aid->name }}</td>
                                <td>{{ $aid->pivot->date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </section>

        <!-- / Content -->



        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->

    <!-- / Layout page -->


    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>


</x-layouts.app>
