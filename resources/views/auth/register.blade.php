@extends('layouts.app')

@section('custom_styles')
<style>
    /* Green Gradient Background */
    .auth-bg {
        /* Matches Login Page Gradient */
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
        animation-delay: 0.2s; 
    }
</style>
@endsection

@section('content')
<div class="auth-bg">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                
                <div class="card shadow-lg border-0 rounded-4 anim-card">
                    <div class="card-body p-5">
                        
                        <div class="anim-content">
                            <div class="text-center mb-4">
                                <i class="bi bi-flower1 fs-1 text-success"></i>
                                <h3 class="fw-bold mt-2">Create Account</h3>
                                <p class="text-muted">Join us for a greener future</p>
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

                            <form action="/register" method="POST">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="text" name="name" class="form-control" id="floatingName" placeholder="Full Name" value="{{ old('name') }}" required>
                                    <label for="floatingName">Full Name</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" value="{{ old('email') }}" required>
                                    <label for="floatingEmail">Email address</label>
                                </div>

                                <div class="row g-2 mb-4">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="password" name="password" class="form-control" id="floatingPwd" placeholder="Password" required>
                                            <label for="floatingPwd">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="password" name="password_confirmation" class="form-control" id="floatingConfirm" placeholder="Confirm Password" required>
                                            <label for="floatingConfirm">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid gap-2">
                                    <button class="btn btn-success btn-lg" type="submit">Sign Up</button>
                                </div>

                                <div class="text-center mt-4">
                                    <span class="text-muted small">Already have an account?</span>
                                    <a href="/login" class="text-decoration-none fw-bold text-success">Login</a>
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