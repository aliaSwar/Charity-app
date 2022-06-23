<x-layouts.app>
    <div class="content-wrapper">
        <!-- Content -->

        @if (session()->has('data'))
            <div class="alert alert-success">
                <p>{{ session()->get('data') }}</p>
            </div>
        @endif
        <div class="container-xxl flex-grow-1 container-p-y">

            <h6 class="pb-1 mb-4 text-muted">منشورات التطبيق</h6>
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                @foreach ($posts as $post)
                    <a href="{{ route('posts.show', $post) }}">
                        <div class="col">
                            <div class="card h-100">
                                <img class="card-img-top"
                                    src={{ is_null($post->image) ? '../assets\img\elements\11.jpg' : Storage::url($post->image) }}
                                    alt="حدث خطأ ما" />
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->name }}</h5>
                                    <p class="card-text">
                                        {!! $post->text !!}
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
