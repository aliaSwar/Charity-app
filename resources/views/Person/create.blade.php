<x-layouts.app>
    <x-slot name="styles">
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    </x-slot>
    <x-slot name="scripts">
        <!-- Include the Quill library -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js" defer></script>

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


    @if (session()->has('success'))
        <div class="alert alert-success">
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif

    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <hr class="my-5" />
            <div class="profile2">

                {{-- to send entry id to store person in database --}}
                <form action="{{ route('person.store', $entry) }}" method="POST" class="row g-3 needs-validation"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class=" col-md-3 -btn-group dropend">
                        <label for="validationCustom04" class="form-label ">نوع المدرج
                        </label>
                        <select name="category" class="form-select @error('category') border-light-danger @enderror"
                            id="validationCustom04" aria-label="Default select example">
                            <option value="الأم">أم</option>
                            <option value="الأب">اب </option>
                            <option value="الابن">طفل </option>
                            <option value="الابنة">طفلة </option>

                        </select>
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">اسم الفرد</label>
                        <input name="full_name" type="text"
                            class="form-control @error('full_name') border-light-danger @enderror"
                            id="validationCustom01">
                        @error('full_name')
                            <div>
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label"> رقم التواصل ان وجد</label>
                        <input name="phone" type="text"
                            class="form-control @error('phone') border-light-danger @enderror" id="validationCustom02">
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">الرقم الوطني</label>
                        <input name="number_id" type="number"
                            class="form-control @error('number_id') border-light-danger @enderror"
                            placeholder="04177777777" id="validationCustom02">
                        @error('number_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">الحالة الصحية </label>
                        <div class="input-group has-validation">

                            <input name="health_status" type="text"
                                class="form-control  @error('health_status') border-light-danger @enderror"
                                id="validationCustomUsername" placeholder="سليم" aria-describedby="inputGroupPrepend">
                        </div>
                        @error('health_status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">تاريخ الميلاد </label>
                        <div class="input-group has-validation">

                            <input name="birthday" type="date"
                                class="form-control  @error('birthday') border-light-danger @enderror"
                                id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend">
                        </div>
                        @error('birthday')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class=" col-md-3 -btn-group dropend">
                        <label for="validationCustom04" class="form-label ">التحصيل العلمي
                        </label>
                        <select name="education" class="form-select @error('education') border-light-danger @enderror"
                            id="validationCustom04" aria-label="Default select example">
                            <option value="امي">أمي أو صغير</option>
                            <option value="أول"> الصف الأول </option>
                            <option value="ثاني">الصف الثاني </option>
                            <option value="ثالث"> الصف الثالث </option>
                            <option value="رابع"> الصف الرابع </option>
                            <option value="خامس"> الصف الخامس </option>
                            <option value="سادس"> الصف السادس </option>
                            <option value="سابع"> الصف السابع </option>
                            <option value="ثامن"> الصف الثامن </option>
                            <option value="تاسع"> الصف التاسع </option>
                            <option value="عاشر"> الصف العاشر </option>
                            <option value="حادي عشر "> الصف الحادي عشر </option>
                            <option value="بكلوريا"> الشهادة الثانوية </option>
                            <option value="جامعي"> المرحلة الجامعية </option>

                        </select>
                        @error('education')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class=" col-md-3 -btn-group dropend">
                        <label for="validationCustom04" class="form-label ">الحالة الاجتماعية
                        </label>
                        <select name="family_status"
                            class="form-select @error('family_status') border-light-danger @enderror"
                            id="validationCustom04" aria-label="Default select example">
                            <option value="single">اعزب</option>
                            <option value="married"> متزوج </option>
                            <option value="separate">منفصل </option>
                            <option value="widow">أرمل </option>

                        </select>
                        @error('family_status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class=" col-md-3 -btn-group dropend">
                        <label for="validationCustom04" class="form-label ">الوضع
                        </label>
                        <select name="status" class="form-select @error('status') border-light-danger @enderror"
                            id="validationCustom04" aria-label="Default select example">
                            <option value="existing">موجود</option>
                            <option value="not existing">غير موجود </option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class=" col-md-3 -btn-group dropend">
                        <label for="validationCustom04" class="form-label ">المهنة </label>
                        <select name="work" class="form-select @error('work') border-light-danger @enderror"
                            id="validationCustom04" aria-label="Default select example">
                            <option value="work">يعمل</option>
                            <option value="dont work">لا يعمل </option>
                        </select>
                        @error('work')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label class="label">ملاحظات</label>

                        <textarea id="editor" name="notes" class="form-control @error('content') text-danger @enderror"
                            rows="3"></textarea>
                        <input type="hidden" {{-- name="notes" --}}id="content">


                        @error('notes')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <hr class="my-5" />
                    <div class="btn-group-lg">
                        <div class="control">
                            <input class="btn btn-primary" type="submit" style="background: #1ABC9C !important"
                                value="إضافة">
                        </div>
                        <hr class="my-5" />



                </form>

            </div>





</x-layouts.app>
