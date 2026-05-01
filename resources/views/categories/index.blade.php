@extends('layouts.app')

@section('content')

    <div class="card border-0 rounded-3 shadow-sm">
        <div class="card-body p-4">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="fw-bold mb-1">Categories</h5>
                    <p class="text-muted small mb-0">Manage ticket categories</p>
                </div>
                <a href="/categories/create" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> Add Category
                </a>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr class="text-uppercase text-muted" style="font-size: 11px; letter-spacing: 0.05em;">
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td class="text-muted small">{{ $loop->iteration }}</td>
                                <td class="fw-medium">{{ $category->name }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="/categories/{{ $category->id }}/edit" class="text-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="/categories/{{ $category->id }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0 text-danger"
                                                onclick="return confirm('Delete this category?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-5">No categories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection