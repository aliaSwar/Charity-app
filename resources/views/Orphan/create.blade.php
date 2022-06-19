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
            <hr class="my-5" />
            <div class="profile2">

                {{-- to send entry id to store person in database --}}
                <form action="" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class=" col-md-3 -btn-group dropend">
                        <label for="validationCustom04" class="form-label ">جنس المكفول
                        </label>
                        <select name="category"
                            class="form-select border-warning @error('category') border-light-danger @enderror"
                            id="validationCustom04" aria-label="Default select example">
                            <option value="الابن">طفل </option>
                            <option value="الابنة">طفلة </option>
                            <option value="كليهما"> كليهما</option>
                        </select>
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class=" col-md-3 -btn-group dropend">
                        <label for="validationCustom04" class="form-label ">عمر المكفول
                        </label>
                        <select name="category"
                            class="form-select border-info    @error('category') border-light-danger @enderror"
                            id="validationCustom04" aria-label="Default select example">
                            <option value="صغير">أقل من خمس سنوات </option>
                            <option value="متوسط">بين الخامسة والعاشرة </option>
                            <option value="كبير"> اكثر من عشر سنوات </option>
                        </select>
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class=" col-md-3 -btn-group dropend">
                        <label for="validationCustom02" class="form-label">الفئة </label>
                        <select name="financial_id"
                            class="form-select border-primary @error('financial_id') border-light-danger @enderror"
                            id="validationCustom04" aria-label="Default select example">
                            {{-- <select value="{{ old('category_id') }}"> --}}
                            <option selected>اختر الفئة</option>
                            @foreach ($financials as $financial)
                                <option value="{{ $financial->id }}">{{ $financial->type }}</option>
                            @endforeach
                        </select>
                        @error('financial_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-5">
                        <label for="validationServer02" class="form-label">العدد المراد كفالته</label>
                        <input type="text" class="form-control is-valid" id="validationServer02">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            enter last name.
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="validationServer02" class="form-label ">العدد المراد كفالته</label>
                        <input type="number" class="form-control is-valid border-warning" id="validationServer02">
                    </div>
                    <div class="btn-group-lg">
                        <div class="control">
                            <input class="btn btn-primary" type="submit" value="فلترة">
                        </div>
                        <hr class="my-5" />



                </form>

            </div>





</x-layouts.app>
