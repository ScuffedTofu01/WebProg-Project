@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-5 fw-bold text-dark mb-3">
                <i class="bi bi-chat-square-text me-2"></i>User Feedback
            </h1>
            <p class="text-muted">Manage and review feedback from users about clean energy tips</p>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="ps-4 py-3 fw-semibold text-secondary">Tip</th>
                            <th scope="col" class="py-3 fw-semibold text-secondary">Rating</th>
                            <th scope="col" class="py-3 fw-semibold text-secondary">Comment</th>
                            <th scope="col" class="py-3 fw-semibold text-secondary">Date</th>
                            <th scope="col" class="pe-4 py-3 fw-semibold text-secondary text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($feedback as $fb)
                        <tr class="align-middle">
                            <td class="ps-4 py-3">
                                <span class="fw-medium text-dark">{{ $fb->tip->title }}</span>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-success rounded-pill px-3 py-2">
                                    <i class="bi bi-star-fill me-1"></i>{{ $fb->rating }}
                                </span>
                            </td>
                            <td class="py-3">
                                <span class="text-muted">{{ $fb->comment ?? '-' }}</span>
                            </td>
                            <td class="py-3">
                                <small class="text-secondary">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $fb->created_at->format('M d, Y') }}
                                </small>
                            </td>
                            <td class="pe-4 py-3 text-end">
                                <form action="/admin/feedback/{{ $fb->id }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this feedback?');" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete feedback">
                                        <i class="bi bi-trash3"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                    <p class="mb-0">No feedback available yet</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($feedback->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $feedback->links('pagination::bootstrap-5') }}
    </div>
    @endif

</div>

<style>
    /* Custom styling to match the green theme */
    :root {
        --bs-success: #5a9f6e;
        --bs-success-rgb: 90, 159, 110;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(90, 159, 110, 0.05);
    }
    
    .btn-danger {
        --bs-btn-bg: #dc3545;
        --bs-btn-border-color: #dc3545;
        --bs-btn-hover-bg: #bb2d3b;
        --bs-btn-hover-border-color: #b02a37;
    }
    
    .card {
        border-radius: 0.5rem;
    }
</style>
@endsection