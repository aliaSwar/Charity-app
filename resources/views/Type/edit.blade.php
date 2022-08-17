<x-layouts.app>


    @if (session()->has('success'))
        <div class="alert alert-success">
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <hr class="my-5" />
            <form action="{{ route('types.update', $type) }}" method="POST" class="row g-3 needs-validation"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">تعديل الفترة </label>
                    <input name="type" type="text" value="{{ old('type', $type->type) }}"
                        class="form-control @error('type') border-light-danger @enderror" id="validationCustom01">
                    @error('type')
                        <div>
                            <p class="help is-danger">{{ $message }}</p>
                        </div>
                    @enderror

                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">ادخل عدد أشهر الكفالة </label>
                    <input name="date" type="number"
                        class="form-control @error('date') border-light-danger @enderror"value="{{ old('date', $type->date) }}">
                    @error('date')
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
