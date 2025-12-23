@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="display-5 fw-bold text-dark mb-3"><i class="bi bi-speedometer2 me-2"></i>Admin Dashboard</h1>
            <p class="text-muted">Quick access to admin pages and summary stats</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Tips -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="card-title mb-1">Tips</h5>
                            <p class="text-muted small mb-0">Manage clean energy tips</p>
                        </div>
                        <i class="bi bi-lightbulb-fill fs-1 text-warning"></i>
                    </div>

                    <div class="mt-auto d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h2 mb-0">{{ $tipsCount }}</span>
                            <div class="text-muted small">total tips</div>
                        </div>
                        <div class="text-end">
                            <a href="/admin/tips" class="btn btn-outline-primary btn-sm mb-2">Open</a>
                            <a href="/admin/tips/create" class="btn btn-success btn-sm">Add</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Resources -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="card-title mb-1">Resources</h5>
                            <p class="text-muted small mb-0">Manage educational resources</p>
                        </div>
                        <i class="bi bi-folder2-open fs-1 text-primary"></i>
                    </div>

                    <div class="mt-auto d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h2 mb-0">{{ $resourcesCount }}</span>
                            <div class="text-muted small">total resources</div>
                        </div>
                        <div class="text-end">
                            <a href="/admin/resources" class="btn btn-outline-primary btn-sm mb-2">Open</a>
                            <a href="/admin/resources/create" class="btn btn-success btn-sm">Add</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feedback -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="card-title mb-1">Feedback</h5>
                            <p class="text-muted small mb-0">View and manage user feedback</p>
                        </div>
                        <i class="bi bi-chat-square-text fs-1 text-success"></i>
                    </div>

                    <div class="mt-auto d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h2 mb-0">{{ $feedbackCount }}</span>
                            <div class="text-muted small">total feedback</div>
                        </div>
                        <div class="text-end">
                            <a href="/admin/feedback" class="btn btn-outline-primary btn-sm">Open</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection