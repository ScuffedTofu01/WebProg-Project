<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">

<style>
.font-serif { font-family: 'Playfair Display', serif; }

.navbar, .navbar-brand, .nav-link {
    font-family: 'Playfair Display', serif;
}
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm border-bottom border-success">
    <div class="container">
        
        {{-- Brand --}}
        <a class="navbar-brand fw-bold text-success" style="font-size: 28px;" href="/">
            <span class="fs-4">🌱</span>
            Clean Energy Tips
        </a>

        {{-- Mobile Toggle --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="navbar-nav gap-lg-4 text-center mt-3 mt-lg-0">
                <a class="nav-link text-dark" href="/">Home</a>
                <a class="nav-link text-dark" href="/tips">Tips</a>
                <a class="nav-link text-dark" href="/resources">Resources</a>
                <a class="nav-link btn btn-success text-dark" style="color:#333 !important;" href="/about">About</a>

                @guest
                    <a class="nav-link" href="/login">Login</a>
                    <a class="nav-link" href="/register">Sign Up</a>
                @endguest

                @auth
                    <!-- if admin, show admin link -->
                    @if(strtolower(Auth::user()->email) === strtolower(env('ADMIN_EMAIL', '')))
                        <a class="nav-link text-dark" href="/admin">Admin</a>
                    @endif

                    <!-- user dropdown -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="/logout" method="POST" class="px-3 py-1">
                                    @csrf
                                    <button class="btn btn-link text-danger p-0" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
</nav>