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
            </div>
        </div>

    </div>
</nav>