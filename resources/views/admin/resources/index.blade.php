@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="display-5 fw-bold text-dark mb-3">
                <i class="bi bi-file-earmark-text me-2"></i>Manage Resources
            </h1>
            <p class="text-muted">Add, edit, and organize educational resources about clean energy</p>
        </div>
        <div class="col-md-4 text-md-end align-self-center">
            <a href="/admin/resources/create" class="btn btn-success btn-lg shadow-sm">
                <i class="bi bi-plus-circle me-2"></i>Add New Resource
            </a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="ps-4 py-3 fw-semibold text-secondary">Title</th>
                            <th scope="col" class="py-3 fw-semibold text-secondary">Type</th>
                            <th scope="col" class="py-3 fw-semibold text-secondary">URL</th>
                            <th scope="col" class="pe-4 py-3 fw-semibold text-secondary text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($resources as $resource)
                        <tr class="align-middle">
                            <td class="ps-4 py-3">
                                <span class="fw-medium text-dark">{{ $resource->title }}</span>
                            </td>
                            <td class="py-3">
                                @php
                                    $typeColors = [
                                        'article' => 'primary',
                                        'video' => 'danger',
                                        'tool' => 'warning',
                                        'guide' => 'info'
                                    ];
                                    $color = $typeColors[strtolower($resource->type)] ?? 'secondary';
                                @endphp
                                <span class="badge bg-{{ $color }} rounded-pill px-3 py-2">
                                    @if(strtolower($resource->type) == 'article')
                                        <i class="bi bi-file-text me-1"></i>
                                    @elseif(strtolower($resource->type) == 'video')
                                        <i class="bi bi-play-circle me-1"></i>
                                    @elseif(strtolower($resource->type) == 'tool')
                                        <i class="bi bi-tools me-1"></i>
                                    @else
                                        <i class="bi bi-bookmark me-1"></i>
                                    @endif
                                    {{ ucfirst($resource->type) }}
                                </span>
                            </td>
                            <td class="py-3">
                                <a href="{{ $resource->url }}" target="_blank" 
                                   class="text-decoration-none d-inline-flex align-items-center"
                                   title="Open resource in new tab">
                                    <i class="bi bi-box-arrow-up-right me-2"></i>
                                    <span class="text-primary">View Resource</span>
                                </a>
                            </td>
                            <td class="pe-4 py-3 text-end">
                                <div class="btn-group" role="group">
                                    <a href="/admin/resources/{{ $resource->id }}/edit" 
                                       class="btn btn-outline-primary btn-sm"
                                       title="Edit resource">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    
                                    <form action="/admin/resources/{{ $resource->id }}" method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this resource?');" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" 
                                                title="Delete resource">
                                            <i class="bi bi-trash3"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-folder2-open fs-1 d-block mb-3"></i>
                                    <p class="mb-3">No resources available yet</p>
                                    <a href="/admin/resources/create" class="btn btn-success">
                                        <i class="bi bi-plus-circle me-2"></i>Add Your First Resource
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
    
    .btn-success {
        --bs-btn-bg: #5a9f6e;
        --bs-btn-border-color: #5a9f6e;
        --bs-btn-hover-bg: #4a8f5e;
        --bs-btn-hover-border-color: #4a8f5e;
    }
    
    .btn-outline-primary {
        --bs-btn-color: #0d6efd;
        --bs-btn-border-color: #0d6efd;
        --bs-btn-hover-bg: #0d6efd;
        --bs-btn-hover-border-color: #0d6efd;
    }
    
    .btn-outline-danger {
        --bs-btn-color: #dc3545;
        --bs-btn-border-color: #dc3545;
        --bs-btn-hover-bg: #dc3545;
        --bs-btn-hover-border-color: #dc3545;
    }
    
    .card {
        border-radius: 0.5rem;
    }
    
    .btn-group .btn {
        border-radius: 0;
    }
    
    .btn-group .btn:first-child {
        border-top-left-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
    }
    
    .btn-group .btn:last-child {
        border-top-right-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem;
    }
</style>
@endsection