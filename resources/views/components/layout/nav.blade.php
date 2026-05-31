<header class="w-full py-4">
    <div class="container mx-auto flex items-center justify-between px-4">
        <div>
            <img src="/images/icon.svg" class="w-auto h-8" alt="logo">
        </div>
        <div class="flex items-center gap-x-6">
            @auth
                <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn" data-test="logout-btn">Logout</button>
                </form>
            @else
                <a href="/login">Sign in</a>
                <a href="/register" class="btn">Register</a>
            @endauth
        </div>
    </div>
</header>