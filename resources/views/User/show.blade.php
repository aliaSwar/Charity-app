<x-layouts.app>
    @if (session()->has('success'))
        <div class="alert alert-success">
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="container ">
                <div class="card mb-0">

                    <div class="row g-0">

                        <div class="d-grid gap-md-0 col-lg-2 mx-auto">
                            <div class="d-flex flex-row">
                                <img src="{{ is_null($user->image) ? '../assets/img/avatars/5.png' : Storage::url($user->image) }}"
                                    alt="Avatar" class="rounded-circle" />
                            </div>
                            <br>
                            😘😍{{ $user->name }}
                            @if (Auth::user()->hasRole('مدير عام'))
                                <br>
                                <div>
                                    <form method="delete" action="{{ route('users.destroy', $user) }}">
                                        @method('delete')
                                        @csrf
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">تعديل
                                        </a>
                                        <button type="submit" class="btn btn-info">حذف</button>
                                    </form>
                                </div>
                                <br>
                            @endif
                        </div>
                    </div>
                </div>
                <br>

                <div class="row mb-2">
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text"> المنصب الوظيفي:
                                    @foreach ($user->roles as $role)
                                        {{ $role->name }}
                                    @endforeach

                                </p>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">الايميل:{{ $user->email }}</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6 col-lg-mb-2">
                        <div class="card mb-1">
                            <div class="card-body">

                                <p class="card-text">الهاتف:{{ $user->phone ? $user->phone : 'ليس لديه' }}</p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
</x-layouts.app>
