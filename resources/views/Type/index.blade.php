<x-layouts.app>

    @if (session()->has('success'))
        <div class="alert alert-success">
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h5 class="pb-1 mb-4">فترات الكفالات</h5>
                </div>
                <div class="col-12 col-md-6">
                    <a href="{{ route('types.create') }}" class="btn btn-danger">هل تريد إنشاء فترة جديدة؟</a>
                </div>
            </div>
            <div class="row">
                @foreach ($types as $type)
                    <div class="col-md-6 col-xl-4">
                        <div class="card bg-secondary text-white mb-3">
                            <div class="card-header">{{ $type->type }}</div>
                            <div class="card-body">
                                <p class="card-text">
                                    جمعيتنا , ❤️ جمعية انعاش الفقير الخيرية لديها الفترة للكفالات
                                    ال{{ $type->type }}
                                </p>
                                <p class="demo-inline-spacing">
                                <form method="post" action="{{ route('types.destroy', $type) }}">
                                    @method('delete')
                                    @csrf

                                    <button type="submit" class="btn btn-primary me-1">حذف</button>

                                    <a href="{{ route('types.edit', $type) }}" class="btn btn-primary me-1">

                                        تعديل

                                    </a>
                                    <a href="{{ route('types.show', $type) }}" class="btn btn-primary me-1">

                                        عرض

                                    </a>
                                </form>

                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

</x-layouts.app>
