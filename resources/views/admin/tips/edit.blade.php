@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/admin/tips" class="text-decoration-none">
                                <i class="bi bi-arrow-left me-1"></i>Tips
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                
                <h1 class="display-5 fw-bold text-dark mb-2">
                    <i class="bi bi-pencil-square me-2"></i>Edit Tip
                </h1>
                <p class="text-muted">Update the details for this energy-saving tip</p>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    
                    <form method="POST" action="/admin/tips/{{ $tip->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="form-label fw-semibold">
                                <i class="bi bi-lightbulb me-1"></i>Title
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="title" 
                                   id="title"
                                   class="form-control form-control-lg @error('title') is-invalid @enderror" 
                                   placeholder="e.g., Switch to LED Bulbs"
                                   value="{{ old('title', $tip->title) }}"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Create a clear, actionable title for your energy-saving tip
                            </small>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">
                                <i class="bi bi-text-paragraph me-1"></i>Description
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="description" 
                                      id="description"
                                      class="form-control @error('description') is-invalid @enderror" 
                                      rows="4"
                                      placeholder="Describe the energy-saving tip in detail..."
                                      required>{{ old('description', $tip->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Provide a comprehensive description of the tip
                            </small>
                        </div>

                        <div class="mb-4">
                            <label for="benefits" class="form-label fw-semibold">
                                <i class="bi bi-check-circle me-1"></i>Benefits
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="benefits" 
                                      id="benefits"
                                      class="form-control @error('benefits') is-invalid @enderror" 
                                      rows="5"
                                      placeholder="Lower energy bills&#10;Reduced carbon emissions&#10;Longer appliance lifespan"
                                      required>{{ old('benefits', $tip->benefits) }}</textarea>
                            @error('benefits')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                <i class="bi bi-info-circle me-1"></i>
                                Enter each benefit on a new line
                            </small>
                        </div>

                        <div class="mb-4">
                            <label for="energy_saving" class="form-label fw-semibold">
                                <i class="bi bi-lightning-charge me-1"></i>Energy Saving
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="energy_saving" 
                                   id="energy_saving"
                                   class="form-control form-control-lg @error('energy_saving') is-invalid @enderror" 
                                   placeholder="e.g., Save up to 75% compared to incandescent bulbs"
                                   value="{{ old('energy_saving', $tip->energy_saving) }}"
                                   required>
                            @error('energy_saving')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Specify the potential energy savings (e.g., percentage, kWh, cost)
                            </small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-image me-1"></i>Current Image
                            </label>
                            @if($tip->image)
                                <div class="card bg-light">
                                    <div class="card-body p-3">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img src="{{ asset('storage/' . $tip->image) }}" 
                                                     class="rounded shadow-sm" 
                                                     style="max-width: 200px; height: auto;"
                                                     alt="Current tip image">
                                            </div>
                                            <div class="col">
                                                <p class="mb-0 text-muted small">
                                                    <i class="bi bi-check-circle-fill text-success me-1"></i>
                                                    Image uploaded
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-info mb-0">
                                    <i class="bi bi-info-circle me-2"></i>No image currently uploaded
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label fw-semibold">
                                <i class="bi bi-image me-1"></i>Change Image
                                <span class="badge bg-secondary">Optional</span>
                            </label>
                            <input type="file" 
                                   name="image" 
                                   id="image"
                                   class="form-control @error('image') is-invalid @enderror"
                                   accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                <i class="bi bi-info-circle me-1"></i>
                                Upload a new image to replace the current one (JPG, PNG, max 2MB)
                            </small>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex gap-2 justify-content-between align-items-center">
                            <a href="/admin/tips" class="btn btn-outline-secondary btn-lg">
                                <i class="bi bi-x-circle me-2"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-check-circle me-2"></i>Update Tip
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
                        Once you delete this tip, there is no going back. Please be certain.
                    </p>
                    <form action="/admin/tips/{{ $tip->id }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to permanently delete this tip? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash3 me-2"></i>Delete Tip
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