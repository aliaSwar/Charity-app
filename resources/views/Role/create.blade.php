<x-layouts.app>
    <x-slot name="styles">
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    </x-slot>
    <x-slot name="scripts">
        <!-- Include the Quill library -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <!-- Initialize Quill editor -->
        <script>
            var quill = new Quill('#editor', {
                theme: 'snow'
            })
            quill.on('text-change', function(delta, source) {
                document.getElementById('content').value = quill.root.innerHTML
            })
        </script>
    </x-slot>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">

            <form action="{{ route('roles.store') }}" method="POST" class="row g-3 needs-validation"
                enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class=" row-cols-md-2 ">
                    <label for="validationCustom04" class="form-label ">الاسم
                    </label>
                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror"
                        id="validationServer02">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="row-cols-md-2">
                    <label for="validationServer02" class="form-label">المنصب</label>
                    <input type="text" name="display_name"
                        class="form-control  @error('display_name') is-invalid @enderror" id="validationServer02">

                    @error('display_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row-cols-1">
                    <label for="validationServer02" class="form-label">الوصف</label>
                    <textarea id="editor" name="description" class="form-control  @error('content') text-danger @enderror"
                        rows="3"></textarea>
                    <input type="hidden"id="content">
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row-cols-1">
                    <div class="row-cols-1">
                        <h4 class="mt-2 pt-50">اضافة الصلاحيات</h4>
                        <div class="table-responsive">
                            <table class="table table-flush-spacing">
                                <tbody>
                                    <tr>
                                        <td class="text-nowrap fw-bolder">
                                            حالات الوصول
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                data-bs-original-title="اعطاءالكل">
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
                                            </span>
                                        </td>
                                        <td>

                                            <input class="form-check-input" type="checkbox" name="selectAll"
                                                value="all">
                                            <label class="form-check-label" for="selectAll"> اختيار الكل
                                            </label>

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
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="permissions[]" value="{{ $perm->id }}">
                                                                <label class="form-check-label"
                                                                    for="userManagementRead">
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
    <div class="btn-group-lg">
        <div class="row mt-3">
            <div class="d-grid gap-2 col-lg-6 mx-auto">
                <input type="submit" class="btn btn-secondary" value="انشاء">
            </div>
        </div>
    </div>

    </form>

    <div class="d-flex flex-row">
        <img src="{{ asset('assets\img\image\o.png') }}" class="d-grid gap-2 col-lg-4 mx-auto">

    </div>
    



</x-layouts.app>
