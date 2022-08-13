<x-layouts.app>
    <div class="content-wrapper ">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y ">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">الأوراق الثبوتية /</span> {{ $paper->name }}
            </h4>

            <div class="col-xxl d-xxl-flex justify-content-center ">
                <div class="card-block text-center">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $paper->name }}</h5>
                            <h6 class="card-subtitle text-muted"> </h6>
                        </div>
                        <div class="align-items-center">

                            <img class="img-fluid"
                                src=" {{ is_null($paper->image) ? '../assets\img\elements\11.jpg' : Storage::url($paper->image) }} "
                                alt="حدث خطأ ما" />
                        </div>
                        <div class=" card-body">
                            <p class="card-text"> تأتي مع المدرجين لاثبات الادراج.</p>
                            @if (Auth::user()->hasRole('مدير الإدراج'))
                                <form method="post" action="{{ route('papers.destroy', $paper) }}">
                                    @method('delete')
                                    @csrf

                                    <button type="submit" class="btn btn-primary me-1">حذف</button>

                                    <a href="{{ route('papers.edit', $paper) }}" class="btn btn-primary me-1">

                                        تعديل

                                    </a>

                                </form>
                            @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-layouts.app>
