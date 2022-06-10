<x-layouts.app>


    @if (session()->has('data'))
        <div class="alert alert-success">
            <p>{{ session()->get('data') }}</p>
        </div>
    @endif
</x-layouts.app>
