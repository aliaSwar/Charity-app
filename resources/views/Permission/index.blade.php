<x-layouts.app>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row-cols-1">
                <div class="row-cols-1">

                    <div class="table-responsive">
                        <table class="table table-flush-spacing">
                            <tbody>
                                <tr>
                                    <td class="text-nowrap fw-bolder">
                                        <h4 class="fw-bold py-3 mb-4">الصلاحيات

                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-info">
                                                <circle cx="12" cy="12" r="10">
                                                </circle>
                                                <line x1="12" y1="16" x2="12" y2="12 ">
                                                </line>
                                                <line x1="12" y1="8" x2="12.01" y2="8">
                                                </line>
                                            </svg>
                                        </h4>
                                    </td>

                                </tr>
                                @foreach ($message as $permission)
                                    <tr>

                                        <td>
                                            {{ $permission->name }}
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                @foreach ($permissions as $perm)
                                                    @if ($permission->name == $perm->name)
                                                        <div class="form-check me-3 me-lg-5">

                                                            <label class="form-check-label" for="userManagementRead">
                                                                {{ $perm->display_name }}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex flex-row">
        <img src="{{ asset('assets\img\image\o.png') }}" class="d-grid gap-2 col-lg-4 mx-auto">

    </div>


</x-layouts.app>
