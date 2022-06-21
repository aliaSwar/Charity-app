<x-layouts.app>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <!-- Basic Bootstrap Table -->


            <!--/ Basic Bootstrap Table -->

            <hr class="my-5" />


            <form class="row g-3">
                <div class="col-md-5">
                    <label for="validationServer01" class="form-label">مبلغ الكفالة</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" required>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        enter first name.
                    </div>
                </div>
                <div class="col-md-5">
                    <label for="validationServer01" class="form-label"> اسم الكفيل</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" required>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        enter first name.
                    </div>
                </div>
                <div class="col-md-5">
                    <label for="validationServer02" class="form-label">العدد المراد كفالته</label>
                    <input type="number" class="form-control is-valid" id="validationServer02" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        enter last name.
                    </div>
                </div>
                <div class="col-md-5 position-relative">
                    <label for="validationTooltip04" class="form-label">نوع الكفالة</label>
                    <select class="form-select" id="validationTooltip04" required>
                        <option selected disabled value="">اختر...</option>
                        <option>شهرية</option>
                        <option>سنوية</option>
                    </select>
                    <div class="invalid-tooltip">
                        Please select a valid state.
                    </div>
                </div>

        </div>


        <div class="container">
            <input class="form-control mb-4" id="tableSearch" type="text" placeholder="بحث..">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="table-success ">اسم المكفولين</th>
                        <th class="table-success "> عدد الأطفال غير المكفولين</th>
                        <th class="table-success "> كفالة الأم </th>
                        <th class="table-success ">عرض الأطفال </th>

                    </tr>
                </thead>
                <tbody id="myTable">
                    <tr>
                        <td>بشرى صالح</td>

                        <td><span class="badge bg-label-success me-1">3</span></td>
                        <td> مكفولة</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="check-child.html"><i class="bx bx bxs-detail"></i>
                                        عرض التفاصيل</a>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>حمزة</td>

                        <td><span class="badge bg-label-warning me-1">2</span></td>
                        <td> غير مكفولة</td>

                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="check-child.html"><i class="bx bx bxs-detail"></i>
                                        عرض التفاصيل</a>

                                </div>
                            </div>
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td>حمزة</td>

                        <td><span class="badge bg-label-warning me-1">1</span></td>
                        <td> غير مكفولة</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="check-child.html"><i class="bx bx bxs-detail"></i>
                                        عرض التفاصيل</a>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>كمال</td>

                        <td><span class="badge bg-label-success me-1">2</span></td>
                        <td> مكفولة</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="check-child.html"><i class="bx bx bxs-detail"></i>
                                        عرض التفاصيل</a>

                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </section>






    <div class="col-12">
        <button href="show-childes.html" class="btn btn-primary" type="submit">Submit form</button>
    </div>
    </form>


</x-layouts.app>
