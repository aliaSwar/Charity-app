<x-layouts.app>
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y ">
            <div class="card mb-0" {{-- style="max-width: 800px;" id="bb" --}}>
                <div class="row g-0">
                    <div class="d-flex flex-row">
                        <img src="{{ asset('assets/img/image/t.jpg') }}" class="img-fluid d-grid gap-2 col-lg-3 mx-auto"
                            alt="..." id="perr">
                    </div>
                    <form action="{{ route('users.update', $user) }}" method="POST" class="row g-3 needs-validation"
                        enctype="multipart/form-data">
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="card-body">
                            <h5 class="card-title">عدل الحقول بالمعلومات الخاصة بالموظف/ة:
                            </h5>
                        </div>
                        <div class=" col-md-4 ">
                            <label for="validationCustom02" class="form-label  "> اسم
                                الموظف </label>
                            <input type="string" name="name"
                                value="{{ old('name', $user->name) }}"class="form-control @error('name') is-invalid @enderror"
                                id="validationCustom02">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class=" col-md-4 ">

                            <label for="validationCustom02" class="form-label"> رقم الهاتف </label>
                            <input type="string" value="{{ old('phone', $user->phone) }}"
                                name="phone"class="form-control">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class=" col-md-4 ">

                            <label for="validationCustom02" class="form-label"> الصورة</label>
                            <input type="file"
                                name="image"class="form-control"value="{{ old('image', $user->image) }}">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class=" col-md-4 ">

                            <label for="validationCustom02" class="form-label"> الايميل </label>
                            <input type="string" name="email"
                                value="{{ old('email', $user->email) }}"class="form-control  @error('email') is-invalid @enderror">
                        </div>
                        <div class=" col-md-4 ">
                            <div class="col-md-12">
                                <label for="validationCustom04" class="form-label" id="rule">دور الموظف</label>
                                <select class="form-select" name="role_id" id="validationCustom04">

                                    @foreach ($roles as $role)
                                        <option value="{{ old('id', $role->id) }}">{{ $role->name }}</option>
                                    @endforeach


                                </select>

                            </div>
                        </div>

                </div>
                <div class="btn-group-lg">
                    <div class="row mt-3">
                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                            <input type="submit" class="btn btn-primary" value="اختيار">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
</x-layouts.app>
