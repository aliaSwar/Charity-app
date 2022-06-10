<x-layouts.app>

    @if (session()->has('data'))
        <div class="alert alert-success" role="alert">
            <p>{{ session()->get('data') }}</p>
        </div>
    @endif
</x-layouts.app>
