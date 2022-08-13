<x-layouts.app>


    @if (session()->has('data'))
        <div class="alert alert-success">
            <p>{{ session()->get('message') }}</p>
        </div>
    @endif
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-6">
                <h5 class="pb-1 mb-4">فئات المدرجين:</h5>
            </div>
            @if (Auth::user()->hasRole('مدير الإدراج'))
                <div class="col-12 col-md-6">
                    <a href="{{ route('financials.create') }}" class="btn btn-danger">هل تريد إنشاء فئة جديدة؟</a>
                </div>
            @endif
        </div>
        <div class="row">
            @foreach ($financials as $financial)
                <div class="col-md-6 col-xl-4">
                    <div class="card bg-gray text-white mb-3">
                        <div class="card-header">{{ $financial->type }}</div>
                        <div class="card-body">
                            <p class="card-text">
                                جمعيتنا , ❤️ جمعية انعاش الفقير الخيرية لديها الفئة
                                {{ $financial->type }}
                            </p>
                            <p class="demo-inline-spacing">
                                @if (Auth::user()->hasRole('مدير الإدراج'))
                                    <form method="post" action="{{ route('financials.destroy', $financial) }}">
                                        @method('delete')
                                        @csrf

                                        <button type="submit" class="btn btn-primary me-1">حذف</button>

                                        <a href="{{ route('financials.edit', $financial) }}"
                                            class="btn btn-primary me-1">

                                            تعديل

                                        </a>
                                @endif
                                <a href="{{ route('financials.show', $financial) }}" class="btn btn-primary me-1">

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
