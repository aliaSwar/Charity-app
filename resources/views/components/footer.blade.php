

<footer class="footer bg-light">
    <div
        class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3">

        <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
            , ❤️ <a href="https://www.facebook.com/inaash.alfakeer/" target="_blank" class="footer-link fw-bolder"> انعاش
                الفقيرالخيرية </a>
        </div>
        <div>
            @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <i class=""></i>
                    <input type="submit" class="btn btn-sm btn-outline-danger" value="تسجيل خروج">
                </form>

            @endauth

        </div>
    </div>
</footer>
