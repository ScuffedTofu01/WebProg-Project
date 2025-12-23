@extends('layouts.app')

@section('custom_styles')
<style>
    /* Green Gradient Background */
    .auth-bg {
        /* Radial gradient: Light Forest Green -> Deep Emerald -> Almost Black Green */
        background: radial-gradient(circle at center, #2d5a45, #1a3c2f, #0d1f18);
        min-height: calc(100vh - 56px);
        display: flex;
        align-items: center;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .anim-card {
        animation: fadeInUp 0.8s ease-out forwards;
    }
    
    .anim-content {
        opacity: 0;
        animation: fadeInUp 0.8s ease-out forwards;
        animation-delay: 0.3s; 
    }
</style>
@endsection

@section('content')
<div class="auth-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                
                <div class="card shadow-lg border-0 rounded-4 anim-card">
                    <div class="card-body p-5">
                        
                        <div class="anim-content">
                            <div class="text-center mb-4">
                                <i class="bi bi-person-circle fs-1 text-success"></i>
                                <h3 class="fw-bold mt-2">Welcome Back</h3>
                                <p class="text-muted">Please login to your account</p>
                            </div>

                            @if($errors->any())
                                <div class="alert alert-danger py-2">
                                    <ul class="mb-0 small">
                                        @foreach($errors->all() as $err)
                                            <li>{{ $err }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="/login" method="POST">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                                    <label for="floatingInput">Email address</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                    <label for="floatingPassword">Password</label>
                                </div>

                                <div class="mb-4 form-check">
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                    <label class="form-check-label small text-secondary" for="remember">Remember me</label>
                                </div>

                                <div class="d-grid gap-2">
                                    <button class="btn btn-success btn-lg" type="submit">Login</button>
                                </div>

                                <div class="text-center mt-4">
                                    <span class="text-muted small">Don't have an account?</span>
                                    <a href="/register" class="text-decoration-none fw-bold text-success">Sign up</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection