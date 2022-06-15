<x-layouts.app>
    <div class="content-wrapper">
        <!-- Content -->

        @if (session()->has('success'))
            <div class="alert alert-success">
                <p>{{ session()->get('success') }}</p>
            </div>
        @endif
        <div class="container-xxl flex-grow-1 container-p-y">

            <h6 class="pb-1 mb-4 text-muted">الأوراق الثيوتية</h6>
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                @foreach ($papers as $paper)
                    <a href="{{ route('papers.show', $paper) }}">
                        <div class="col">
                            <div class="card h-100">
                                <img class="card-img-top"
                                    src={{ is_null($paper->image) ? '../assets\img\elements\11.jpg' : Storage::url($paper->image) }}
                                    alt="حدث خطأ ما" />
                                <div class="card-body">
                                    <h5 class="card-title">{{ $paper->name }}</h5>
                                    <p class="card-text">
                                        هذه الورقة ثبوتية تأخذ صورة من المدرج لاثبات البيانات
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>

</x-layouts.app>
