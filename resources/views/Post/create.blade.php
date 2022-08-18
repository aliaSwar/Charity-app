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

            <div class="d-flex flex-row">
                <img src="{{ asset('assets\img\image\emp.png') }}" class="d-grid gap-2 col-lg-4 mx-auto">

            </div>
            <form class="col-md-10" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row-cols-md-5">
                    <label for="validationServer01" class="form-label">اسم المنشور</label>
                    <input type="text" name="name"
                        class="form-control is-valid @error('name') border-light-danger @enderror"
                        id="validationServer01">
                    @error('name')
                        <div>
                            <p class="help is-danger">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="row-cols-md-5">
                    <label for="validationServer01" class="form-label">الصورة</label>
                    <input type="file"
                        name="image"class="form-control is-valid @error('image') border-light-danger @enderror">
                    @error('image')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row-cols-md-5">
                    <label class="label">النص</label>

                    <textarea id="editor" name="text" class="form-control is-valid @error('text') border-light-danger @enderror"
                        rows="3"></textarea>
                    <input type="hidden" {{-- name="notes" --}}id="content">


                    @error('text')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="btn-group-lg">
                    <div class="row mt-3">
                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                            <input type="submit" class="btn " style="background: #1ABC9C !important" value="انشاء">
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>


</x-layouts.app>
