<x-layouts.app>
    <div class="content-wrapper">
        <div class="card">
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="d-flex justify-content-between align-items-center header-actions mx-2 row mt-50 mb-1">
                        <div class="col-sm-12 col-md-4 col-lg-6">
                            <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                                        name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                        class="form-select">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                        </div>
                        <div class="col-sm-12 col-md-8 col-lg-6 ps-xl-75 ps-0">
                            <div
                                class="dt-action-buttons d-flex align-items-center justify-content-md-end justify-content-center flex-sm-nowrap flex-wrap">
                                <div class="me-1">
                                    <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input
                                                type="search" class="form-control" placeholder=""
                                                aria-controls="DataTables_Table_0"></label></div>
                                </div>
                                <div class="user_role mt-50 width-200"><select id="UserRole"
                                        class="form-select text-capitalize">
                                        <option value=""> Select Role </option>
                                        <option value="Basic" class="text-capitalize">Basic</option>
                                        <option value="Company" class="text-capitalize">Company</option>
                                        <option value="Enterprise" class="text-capitalize">Enterprise</option>
                                        <option value="Team" class="text-capitalize">Team</option>
                                    </select></div>
                            </div>
                        </div>
                    </div>
                    <table class="user-list-table table dataTable no-footer dtr-column collapsed"
                        id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                        style="width: 1036px;">
                        <thead class="table-light">
                            <tr role="row">
                                <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 0px;"
                                    aria-label=""></th>
                                <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                    colspan="1" style="width: 25px;" data-col="1" aria-label="">
                                    <div class="form-check"> <input class="form-check-input" type="checkbox"
                                            value="" id="checkboxSelectAll"><label class="form-check-label"
                                            for="checkboxSelectAll"></label></div>
                                </th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0"
                                    rowspan="1" colspan="1" style="width: 257px;"
                                    aria-label="Name: activate to sort column ascending" aria-sort="descending">Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" style="width: 118px; display: none;"
                                    aria-label="Role: activate to sort column ascending">Role</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" style="width: 89px; display: none;"
                                    aria-label="Plan: activate to sort column ascending">Plan</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" style="width: 163px; display: none;"
                                    aria-label="Billing: activate to sort column ascending">Billing</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" style="width: 82px; display: none;"
                                    aria-label="Status: activate to sort column ascending">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                    style="width: 68px; display: none;" aria-label="Actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd">
                                <td class=" control" tabindex="0" style=""></td>
                                <td class=" dt-checkboxes-cell" style="">
                                    <div class="form-check"> <input class="form-check-input dt-checkboxes"
                                            type="checkbox" value="" id="checkbox15"><label
                                            class="form-check-label" for="checkbox15"></label></div>
                                </td>
                                <td class="sorting_1" style="">
                                    <div class="d-flex justify-content-left align-items-center">
                                        <div class="avatar-wrapper">
                                            <div class="avatar  me-1"><img
                                                    src="../../../app-assets/images/avatars/2.png" alt="Avatar"
                                                    height="32" width="32"></div>
                                        </div>
                                        <div class="d-flex flex-column"><a href="app-user-view-account.html"
                                                class="user_name text-body text-truncate"><span
                                                    class="fw-bolder">Zsazsa
                                                    McCleverty</span></a><small
                                                class="emp_post text-muted">zmcclevertye@soundcloud.com</small></div>
                                    </div>
                                </td>
                                <td style="display: none;"><span class="text-truncate align-middle"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-database font-medium-3 text-success me-50">
                                            <ellipse cx="12" cy="5" rx="9" ry="3">
                                            </ellipse>
                                            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                        </svg>Maintainer</span></td>
                                <td style="display: none;">Enterprise</td>
                                <td style="display: none;"><span class="text-nowrap">Auto Debit</span></td>
                                <td style="display: none;"><span class="badge rounded-pill badge-light-success"
                                        text-capitalized="">Active</span></td>
                                <td style="display: none;"><a href="app-user-view-account.html"
                                        class="btn btn-sm btn-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-eye font-medium-3 text-body">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg></a></td>
                            </tr>
                            <tr class="even">
                                <td class=" control" tabindex="0" style=""></td>
                                <td class=" dt-checkboxes-cell" style="">
                                    <div class="form-check"> <input class="form-check-input dt-checkboxes"
                                            type="checkbox" value="" id="checkbox13"><label
                                            class="form-check-label" for="checkbox13"></label></div>
                                </td>
                                <td class="sorting_1" style="">
                                    <div class="d-flex justify-content-left align-items-center">
                                        <div class="avatar-wrapper">
                                            <div class="avatar  me-1"><img
                                                    src="../../../app-assets/images/avatars/7.png" alt="Avatar"
                                                    height="32" width="32"></div>
                                        </div>
                                        <div class="d-flex flex-column"><a href="app-user-view-account.html"
                                                class="user_name text-body text-truncate"><span class="fw-bolder">Yoko
                                                    Pottie</span></a><small
                                                class="emp_post text-muted">ypottiec@privacy.gov.au</small></div>
                                    </div>
                                </td>
                                <td style="display: none;"><span class="text-truncate align-middle"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-user font-medium-3 text-primary me-50">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>Subscriber</span></td>
                                <td style="display: none;">Basic</td>
                                <td style="display: none;"><span class="text-nowrap">Auto Debit</span></td>
                                <td style="display: none;"><span class="badge rounded-pill badge-light-secondary"
                                        text-capitalized="">Inactive</span></td>
                                <td style="display: none;"><a href="app-user-view-account.html"
                                        class="btn btn-sm btn-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-eye font-medium-3 text-body">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg></a></td>
                            </tr>
                            <tr class="odd">
                                <td class=" control" tabindex="0" style=""></td>
                                <td class=" dt-checkboxes-cell" style="">
                                    <div class="form-check"> <input class="form-check-input dt-checkboxes"
                                            type="checkbox" value="" id="checkbox20"><label
                                            class="form-check-label" for="checkbox20"></label></div>
                                </td>
                                <td class="sorting_1" style="">
                                    <div class="d-flex justify-content-left align-items-center">
                                        <div class="avatar-wrapper">
                                            <div class="avatar  me-1"><img
                                                    src="../../../app-assets/images/avatars/6.png" alt="Avatar"
                                                    height="32" width="32"></div>
                                        </div>
                                        <div class="d-flex flex-column"><a href="app-user-view-account.html"
                                                class="user_name text-body text-truncate"><span
                                                    class="fw-bolder">Wesley
                                                    Burland</span></a><small
                                                class="emp_post text-muted">wburlandj@uiuc.edu</small></div>
                                    </div>
                                </td>
                                <td style="display: none;"><span class="text-truncate align-middle"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-edit-2 font-medium-3 text-info me-50">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                        </svg>Editor</span></td>
                                <td style="display: none;">Team</td>
                                <td style="display: none;"><span class="text-nowrap">Auto Debit</span></td>
                                <td style="display: none;"><span class="badge rounded-pill badge-light-secondary"
                                        text-capitalized="">Inactive</span></td>
                                <td style="display: none;"><a href="app-user-view-account.html"
                                        class="btn btn-sm btn-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-eye font-medium-3 text-body">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg></a></td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between mx-2 row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                aria-live="polite">
                                Showing 1 to 10 of 50 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled"
                                        id="DataTables_Table_0_previous">
                                        <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0"
                                            tabindex="0" class="page-link">&nbsp;</a>
                                    </li>
                                    <li class="paginate_button page-item active"><a href="#"
                                            aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"
                                            class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0"
                                            class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0"
                                            class="page-link">3</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0"
                                            class="page-link">4</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="DataTables_Table_0" data-dt-idx="5" tabindex="0"
                                            class="page-link">5</a></li>
                                    <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a
                                            href="#" aria-controls="DataTables_Table_0" data-dt-idx="6"
                                            tabindex="0" class="page-link">&nbsp;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layouts.app>
