@extends('layouts.app')

@section('content')

    <div class="card border-0 rounded-3 shadow-sm">
        <div class="card-body p-4">

            <h5 class="fw-bold mb-1">Edit Category</h5>
            <p class="text-muted small mb-4">Update the category name.</p>

            <hr class="mb-4">

            <form method="POST" action="/categories/{{ $category->id }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fw-medium small">Category Name</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $category->name) }}"
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
                    <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                </div>

            </form>
        </div>
    </div>

@endsection