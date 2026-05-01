@extends('layouts.app')

@section('content')

    <div class="card border-0 rounded-3 shadow-sm">
        <div class="card-body p-4">

            <h5 class="fw-bold mb-1">Add Category</h5>
            <p class="text-muted small mb-4">Create a new ticket category.</p>

            <hr class="mb-4">

            <form method="POST" action="/categories">
                @csrf

                <div class="mb-4">
                    <label class="form-label fw-medium small">Category Name</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="e.g. Network, Hardware, Software"
                        class="form-control @error('name') is-invalid @enderror"
                        autofocus
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="mb-4">

                <div class="d-flex justify-content-end gap-2">
                    <a href="/categories" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Save Category</button>
                </div>

            </form>
        </div>
    </div>

@endsection