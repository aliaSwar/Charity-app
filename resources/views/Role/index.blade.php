<x-layouts.app>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">المناصب </h4>

            <div class="row">
                @foreach ($roles as $role)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <span>العدد الكلي {{ $role->users->count() }} مستخدمين</span>
                                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        @foreach ($role->users as $user)
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar avatar-sm pull-up" title
                                                data-bs-original-title="{{ $user->name }}">
                                                <img src="{{ is_null($user->image) ? '../assets/img/avatars/5.png' : Storage::url($user->image) }}"
                                                    alt="Avatar" class="rounded-circle" />
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                    <div class="role-heading">
                                        <h4 class="fw-bolder">{{ $role->name }}</h4>
                                        <p class="card-text"> {{ Str::limit($role->description, 80) }} ...
                                            <br>

                                        </p>

                                        <small class="fw-bolder">
                                            <a href="{{ route('roles.create') }}"> اضافة
                                                منصب
                                            </a>
                                        </small>

                                    </div>
                                    <a href="{{ route('roles.show', $role) }}" class="text-body"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-copy font-medium-5">
                                            <rect x="9" y="9" width="13" height="13"
                                                rx="2" ry="2"></rect>
                                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1">
                                            </path>
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="d-flex align-items-end justify-content-center h-px-100">
                                    <img src="{{ asset('assets/img/image/m.png') }}" class="img-fluid mt-8"
                                        alt="Image">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body text-sm-end text-center ps-sm-3  ">
                                    <a href="{{ route('roles.create') }}"
                                        class="stretched-link text-nowrap add-new-role">
                                        <span class="btn btn-primary mb-0 waves-effect waves-float waves-light">اضافة
                                            منصب جديد</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-layouts.app>
