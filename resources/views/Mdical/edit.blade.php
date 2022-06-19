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
            {{-- <hr class="my-5" /> --}}
            <form action="{{ route('mdicals.store') }}" method="POST" class="row g-3 needs-validation"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">اسم المريض</label>
                    <input name="name_recipient" type="text"
                        class="form-control @error('name_recipient') border-light-danger @enderror"
                        id="validationCustom01">
                    @error('name_recipient')
                        <div>
                            <div class="alert alert-danger">{{ $message }}</div>
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">رقم التواصل</label>
                    <input name="phone" type="number" class="form-control @error('phone') border-light-danger @enderror"
                        placeholder="0944444458" id="validationCustom02" value="{{ old('phone', $mdical->phone) }}">
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">اسم الأب
                    </label>
                    <div class="input-group has-validation">

                        <input name="husband_name" type="text"
                            class="form-control  @error('husband_name') border-light-danger @enderror"
                            id="validationCustomUsername" aria-describedby="inputGroupPrepend">
                    </div>
                    @error('husband_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label"> اسم الأم </label>
                    <input name="wife_name" type="text"
                        class="form-control @error('wife_name') border-light-danger @enderror" id="validationCustom02">
                    @error('wife_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label"> من هو بالعائلة </label>
                    <input name="whos" type="text" class="form-control @error('whos') border-light-danger @enderror"
                        id="validationCustom02" placeholder="هو الام او الاب او الطفل او الطفلة">
                    @error('whos')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">المرض </label>
                    <input name="illness" type="text"
                        class="form-control @error('illness') border-light-danger @enderror" id="validationCustom02">
                    @error('illness')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">مواليد</label>
                    <input name="birthday" type="date"
                        class="form-control @error('birthday') border-light-danger @enderror" id="validationCustom02">
                    @error('birthday')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">العنوان</label>
                    <input name="address" type="text"
                        class="form-control @error('address') border-light-danger @enderror" id="validationCustom03"
                        placeholder="city">
                    @error('address')
                        <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                </div>

                <div class="row-cols-md-3">
                    <label for="validationCustom05" class="form-label"> الأوراق الثبوتية</label>
                    <select class="form-select demo-spacing mt-3" multiple aria-label="multiple select example"
                        name="papers[]" multiple>
                        @foreach ($papers as $paper)
                            <option value="{{ $paper->id }}">{{ $paper->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="">
                    <label class="label">قرار الجلسة </label>

                    <textarea id="editor" name="session_decision" class="form-control @error('content') text-danger @enderror" rows="3"></textarea>
                    <input type="hidden" {{-- name="session_decision" --}}id="content">


                    @error('session_decision')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row mt-3">
                    <div class="d-grid gap-2 col-lg-6 mx-auto">
                        <button class="btn btn-secondary btn-lg" type="submit">تم</button>
                    </div>
                </div>
            </form>

            <hr class="my-5" />



</x-layouts.app>
