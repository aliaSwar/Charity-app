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
            <form class="col-md-10" action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="col-md-5">
                    <label for="validationServer01" class="form-label">اسم المنشور</label>
                    <input type="text" name="name"
                        class="form-control is-valid @error('salary_month') is-invalid @enderror"
                        id="validationServer01">
                    @error('name')
                        <div>
                            <p class="help is-danger">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <label class="form-label" for="validationServer01">اضافة صورة</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="file" name="image" id="basic-default-email"
                                class="form-control is-valid  @error('image') border-light-danger @enderror"
                                accept="image/*" />
                        </div>
                        @error('image')
                            <div>
                                <div class="alert alert-danger">{{ $message }}</div>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <label class="label">النص</label>

                    <textarea id="editor" name="text" class="form-control is-valid @error('content') text-danger @enderror"
                        rows="3"></textarea>
                    <input type="hidden" {{-- name="notes" --}}id="content">


                    @error('text')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <hr class="my-5" />
                <div class="btn-group-lg">
                    <div class="control">
                        <input class="btn btn-primary" type="submit" value="إضافة">
                    </div>
                </div>
            </form>

</x-layouts.app>
