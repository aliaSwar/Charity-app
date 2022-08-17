<x-layouts.app>
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">الإعانات/</span> إنشاء إعانة</h4>
            <form class="row g-3" action="{{ route('aids.store') }}" method="POST"enctype="multipart/form-data">
                @csrf
                <div class="row-md-5">
                    <label for="validationServer02" class="form-label">الاسم </label>
                    <input type="text"
                        name="name"class="form-control is-valid @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class=" row-md-5 ">

                    <label for="validationCustom02" class="form-label"> الصورة</label>
                    <input type="file"
                        name="image"class="form-control is-valid @error('image') text-danger @enderror">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="">
                    <label class="label">ملاحظات</label>

                    <textarea name="notes" class="form-control is-valid  @error('content') text-danger @enderror" rows="3"></textarea>
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


    </div>


</x-layouts.app>
