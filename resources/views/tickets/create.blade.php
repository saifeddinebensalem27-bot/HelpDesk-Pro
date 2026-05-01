@extends('layouts.app')

@section('content')

    {{-- Welcome Banner --}}
    <div class="alert border-0 rounded-3 mb-4" style="background-color: #eff6ff;">
        <span class="text-muted">Hello, <strong>{{ Auth::user()->name }}</strong> 👋 — What problem can we fix for you today?</span>
    </div>

    {{-- Form Card --}}
    <div class="card border-0 rounded-3 shadow-sm">
        <div class="card-body p-4">

            <h5 class="fw-bold mb-1">Submit a Ticket</h5>
            <p class="text-muted small mb-4">Provide details about the issue you are facing.</p>

            <hr class="mb-4">

            <form method="POST" action="/tickets">
                @csrf

                {{-- Title --}}
                <div class="mb-3">
                    <label class="form-label fw-medium small">Title</label>
                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Brief summary of the issue"
                        class="form-control @error('title') is-invalid @enderror"
                    >
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label class="form-label fw-medium small">Description</label>
                    <textarea
                        name="description"
                        rows="5"
                        placeholder="Detailed description of what is happening..."
                        class="form-control @error('description') is-invalid @enderror"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Category + Priority --}}
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-medium small">Category</label>
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                            <option value="">Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-medium small">Priority</label>
                        <select name="priority" class="form-select @error('priority') is-invalid @enderror">
                            <option value="">Select priority</option>
                            <option value="low"      {{ old('priority') == 'low'      ? 'selected' : '' }}>Low</option>
                            <option value="medium"   {{ old('priority') == 'medium'   ? 'selected' : '' }}>Medium</option>
                            <option value="high"     {{ old('priority') == 'high'     ? 'selected' : '' }}>High</option>
                            <option value="critical" {{ old('priority') == 'critical' ? 'selected' : '' }}>Critical</option>
                        </select>
                        @error('priority')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Status (read only) --}}
                <div class="mb-4">
                    <label class="form-label fw-medium small">Status</label>
                    <div>
                        <span class="badge rounded-pill bg-warning text-dark px-3 py-2">In Progress</span>
                    </div>
                </div>

                <hr class="mb-4">

                {{-- Actions --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="/tickets" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Submit Ticket</button>
                </div>

            </form>
        </div>
    </div>

@endsection