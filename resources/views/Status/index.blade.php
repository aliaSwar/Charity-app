<x-layouts.app>


    @if (session()->has('data'))
        <div class="alert alert-success">
            <p>{{ session()->get('data') }}</p>
        </div>
    @endif
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h5 class="pb-1 mb-4">حال المدرجين</h5>
                </div>
                @if (Auth::user()->hasRole('مدير الإدراج'))
                    <div class="col-12 col-md-6">
                        <a href="{{ route('statuses.create') }}" class="btn btn-danger">هل تريد إنشاء حالة جديدة؟</a>
                    </div>
                @endif
            </div>
            <div class="row">
                @foreach ($statuses as $status)
                    <div class="col-md-6 col-xl-4">
                        <div class="card bg-gray text-white mb-3">
                            <div class="card-header">{{ $status->status }}</div>
                            <div class="card-body">
                                <p class="card-text">
                                    جمعيتنا , ❤️ جمعية انعاش الفقير الخيرية لديها حالة
                                    {{ $status->status }}
                                </p>
                                <p class="demo-inline-spacing">
                                    @if (Auth::user()->hasRole('مدير الإدراج'))
                                        <form method="post" action="{{ route('statuses.destroy', $status) }}">
                                            @method('delete')
                                            @csrf

                                            <button type="submit" class="btn btn-primary me-1">حذف</button>

                                            <a href="{{ route('statuses.edit', $status) }}"
                                                class="btn btn-primary me-1">

                                                تعديل

                                            </a>
                                    @endif
                                    <a href="{{ route('statuses.show', $status) }}" class="btn btn-primary me-1">

                                        عرض

                                    </a>
                                    </form>

                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


</x-layouts.app>
