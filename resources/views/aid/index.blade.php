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
                            <th class="table-success ">رقم الاستمارة</th>
                            <th class="table-success ">اسم العائلة</th>
                            <th class="table-success ">الاعانات</th>

                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($allentry as $entry)
                            <tr>
                                <td>{{ $entry->id }}</td>
                                <td>{{ $entry->family_name }}</td>
                                <td><a href="{{route('entry.aids',$entry -> id)}}" class="btn btn-success">عرض الاعانات </a>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-layouts.app>
