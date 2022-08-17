<x-layouts.app>


    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <hr class="my-5" />
            <form action="{{ route('financials.update', $financial) }}" method="POST" class="row g-3 needs-validation"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label"> تعديل الفئة </label>
                    <input name="type" type="text"
                        class="form-control @error('type') border-light-danger @enderror"
                        value="{{ old('type', $financial->type) }}">
                    @error('type')
                        <div>
                            <p class="help is-danger">{{ $message }}</p>
                        </div>
                    @enderror

                </div>
                <div class="row-cols-md-6">
                    <button class="btn btn-info btn-lg" type="submit">تم</button>
                </div>
            </form>


</x-layouts.app>
