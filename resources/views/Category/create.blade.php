<x-layouts.app>


    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <hr class="my-5" />
            <form action="{{ route('categories.store') }}" method="POST" class="row g-3 needs-validation"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label"> ادخل نوع المدرجين </label>
                    <input name="category" type="text"
                        class="form-control @error('category') border-light-danger @enderror" id="validationCustom01">
                    @error('category')
                        <div>
                            <p class="help is-danger">{{ $message }}</p>
                        </div>
                    @enderror

                </div>

                <div class="row-cols-md-6">
                    <button class="btn btn-lg" style="background: #1ABC9C !important" type="submit">تم</button>
                </div>

            </form>
        </div>
    </div>


</x-layouts.app>
