<x-layouts.app>
    <div class="content-wrapper ">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y ">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">منشورات التطبيق /</span> {{ $post->name }}
            </h4>

            <div class="col-xxl d-xxl-flex justify-content-center ">
                <div class="card-block text-center">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->name }}</h5>
                            <h6 class="card-subtitle text-muted"> </h6>
                        </div>
                        <div class="align-items-center">

                            <img class="img-fluid"
                                src=" {{ is_null($post->image) ? '../assets\img\elements\11.jpg' : Storage::url($post->image) }} "
                                alt="حدث خطأ ما" />
                        </div>
                        <div class=" card-body">
                            <p class="card-text"> {!! $post->text !!}</p>
                            @if (Auth::user()->hasRole('موظف السويشال'))
                                <form method="post" action="{{ route('posts.destroy', $post) }}">
                                    @method('delete')
                                    @csrf

                                    <button type="submit" class="btn  btn-success me-1">حذف</button>

                                    <a href="{{ route('posts.edit', $post) }}" class="btn b me-1 "
                                        style="background: #1ABC9C
                                    !important">

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
    </div>


</x-layouts.app>
