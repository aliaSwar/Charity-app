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
                <div class="row mt-3">
                    <div class="d-grid gap-2 col-lg-6 mx-auto">
                        <button class="btn btn-secondary btn-lg" type="submit">تم</button>
                    </div>
                </div>
            </form>


</x-layouts.app>
