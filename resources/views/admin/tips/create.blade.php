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
                        <li class="breadcrumb-item active" aria-current="page">Add New</li>
                    </ol>
                </nav>
                
                <h1 class="display-5 fw-bold text-dark mb-2">
                    <i class="bi bi-plus-circle me-2"></i>Add New Tip
                </h1>
                <p class="text-muted">Share an energy-saving tip to help users reduce their carbon footprint</p>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    
                    <form method="POST" action="/admin/tips" enctype="multipart/form-data">
                        @csrf

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
                                   value="{{ old('title') }}"
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
                                      placeholder="Describe the energy-saving tip in detail. Explain what users need to do and why it's effective..."
                                      required>{{ old('description') }}</textarea>
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
                                      required>{{ old('benefits') }}</textarea>
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
                                   value="{{ old('energy_saving') }}"
                                   required>
                            @error('energy_saving')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Specify the potential energy savings (e.g., percentage, kWh, cost)
                            </small>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label fw-semibold">
                                <i class="bi bi-image me-1"></i>Image
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
                                Upload an image to make your tip more engaging (JPG, PNG, max 2MB)
                            </small>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="/admin/tips" class="btn btn-outline-secondary btn-lg">
                                <i class="bi bi-x-circle me-2"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-check-circle me-2"></i>Save Tip
                            </button>
                        </div>

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