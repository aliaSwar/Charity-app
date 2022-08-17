<x-layouts.app>

    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <hr class="my-5" />
            <form action="{{ route('statuses.update', $status) }}" method="POST" class="row g-3 needs-validation"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label"> تعديل حالة المدرجين </label>
                    <input name="status" type="text"
                        class="form-control @error('status') border-light-danger @enderror">
                    @error('status')
                        <div>
                            <p class="help is-danger">{{ $message }}</p>
                        </div>
                    @enderror

                </div>
                <div class="row-cols-md-6">
                    <button class="btn btn-info btn-lg" style="background: #1ABC9C !important"
                        type="submit">تم</button>
                </div>
            </form>


</x-layouts.app>
