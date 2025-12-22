@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/admin/resources" class="text-decoration-none">
                                <i class="bi bi-arrow-left me-1"></i>Resources
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                
                <h1 class="display-5 fw-bold text-dark mb-2">
                    <i class="bi bi-pencil-square me-2"></i>Edit Resource
                </h1>
                <p class="text-muted">Update the details for this resource</p>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    
                    <form method="POST" action="/admin/resources/{{ $resource->id }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="form-label fw-semibold">
                                <i class="bi bi-pencil me-1"></i>Title
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="title" 
                                   id="title"
                                   class="form-control form-control-lg @error('title') is-invalid @enderror" 
                                   placeholder="Enter resource title"
                                   value="{{ old('title', $resource->title) }}"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Choose a clear, descriptive title for your resource
                            </small>
                        </div>

                        <div class="mb-4">
                            <label for="type" class="form-label fw-semibold">
                                <i class="bi bi-tag me-1"></i>Type
                                <span class="text-danger">*</span>
                            </label>
                            <select name="type" 
                                    id="type"
                                    class="form-select form-select-lg @error('type') is-invalid @enderror" 
                                    required>
                                <option value="">-- Select Type --</option>
                                <option value="article" {{ old('type', $resource->type) == 'article' ? 'selected' : '' }}>
                                    📄 Article
                                </option>
                                <option value="video" {{ old('type', $resource->type) == 'video' ? 'selected' : '' }}>
                                    🎥 Video
                                </option>
                                <option value="tool" {{ old('type', $resource->type) == 'tool' ? 'selected' : '' }}>
                                    🔧 Tool
                                </option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                What kind of resource is this?
                            </small>
                        </div>

                        <div class="mb-4">
                            <label for="url" class="form-label fw-semibold">
                                <i class="bi bi-link-45deg me-1"></i>URL
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group input-group-lg">
                                <input type="url" 
                                       name="url" 
                                       id="url"
                                       class="form-control @error('url') is-invalid @enderror" 
                                       placeholder="https://example.com/resource"
                                       value="{{ old('url', $resource->url) }}"
                                       required>
                                <a href="{{ $resource->url }}" 
                                   target="_blank" 
                                   class="btn btn-outline-secondary"
                                   title="Open current URL in new tab">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                                @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">
                                Provide the full web address (URL) of the resource
                            </small>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">
                                <i class="bi bi-text-paragraph me-1"></i>Description
                                <span class="badge bg-secondary">Optional</span>
                            </label>
                            <textarea name="description" 
                                      id="description"
                                      class="form-control @error('description') is-invalid @enderror" 
                                      rows="5"
                                      placeholder="Provide a brief description of what this resource covers...">{{ old('description', $resource->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Help others understand what they'll learn from this resource
                            </small>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex gap-2 justify-content-between align-items-center">
                            <a href="/admin/resources" class="btn btn-outline-secondary btn-lg">
                                <i class="bi bi-x-circle me-2"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-check-circle me-2"></i>Update Resource
                            </button>
                        </div>

                    </form>

                </div>
            </div>

            <div class="card shadow-sm border-0 mt-3 border-danger">
                <div class="card-body p-4">
                    <h5 class="text-danger mb-3">
                        <i class="bi bi-exclamation-triangle me-2"></i>Danger Zone
                    </h5>
                    <p class="text-muted mb-3">
                        Once you delete this resource, there is no going back. Please be certain.
                    </p>
                    <form action="/admin/resources/{{ $resource->id }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to permanently delete this resource? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash3 me-2"></i>Delete Resource
                        </button>
                    </form>
                </div>
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
    
    .btn-success {
        --bs-btn-bg: #5a9f6e;
        --bs-btn-border-color: #5a9f6e;
        --bs-btn-hover-bg: #4a8f5e;
        --bs-btn-hover-border-color: #4a8f5e;
    }
    
    .form-control:focus,
    .form-select:focus {
        border-color: #5a9f6e;
        box-shadow: 0 0 0 0.25rem rgba(90, 159, 110, 0.25);
    }
    
    .card {
        border-radius: 0.5rem;
    }
    
    .breadcrumb-item + .breadcrumb-item::before {
        content: "›";
    }
    
    .breadcrumb-item a {
        color: #5a9f6e;
    }
    
    .breadcrumb-item a:hover {
        color: #4a8f5e;
    }
</style>
@endsection