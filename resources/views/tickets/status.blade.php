@extends('layouts.app')

@section('content')

    <div class="card border-0 rounded-3 shadow-sm">
        <div class="card-body p-4">

            <h5 class="fw-bold mb-1">Edit Ticket TCK-{{ str_pad($ticket->id, 4, '0', STR_PAD_LEFT) }}</h5>
            <p class="text-muted small mb-4">Update the status for this support request.</p>

            <hr class="mb-4">

            <form method="POST" action="/tickets/{{ $ticket->id }}">
                @csrf
                @method('PUT')

                {{-- Title --}}
                {{-- <div class="mb-3">
                    <label class="form-label fw-medium small">Title</label>
                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $ticket->title) }}"
                        class="form-control @error('title') is-invalid @enderror"
                    >
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}

                {{-- Description --}}
                {{-- <div class="mb-3">
                    <label class="form-label fw-medium small">Description</label>
                    <textarea
                        name="description"
                        rows="5"
                        class="form-control @error('description') is-invalid @enderror"
                    >{{ old('description', $ticket->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}

                {{-- Category + Priority --}}
                {{-- <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-medium small">Category</label>
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $ticket->category_id) == $category->id ? 'selected' : '' }}>
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
                            <option value="low"      {{ old('priority', $ticket->priority) == 'low'      ? 'selected' : '' }}>Low</option>
                            <option value="medium"   {{ old('priority', $ticket->priority) == 'medium'   ? 'selected' : '' }}>Medium</option>
                            <option value="high"     {{ old('priority', $ticket->priority) == 'high'     ? 'selected' : '' }}>High</option>
                            <option value="critical" {{ old('priority', $ticket->priority) == 'critical' ? 'selected' : '' }}>Critical</option>
                        </select>
                        @error('priority')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}

                {{-- Status --}}
                <div class="mb-4">
                    <label class="form-label fw-medium small">Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="open"        {{ old('status', $ticket->status) == 'open'        ? 'selected' : '' }}>Open</option>
                        <option value="in_progress" {{ old('status', $ticket->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="resolved"    {{ old('status', $ticket->status) == 'resolved'    ? 'selected' : '' }}>Resolved</option>
                        <option value="closed"      {{ old('status', $ticket->status) == 'closed'      ? 'selected' : '' }}>Closed</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="mb-4">

                {{-- Actions --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="/tickets" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                </div>

            </form>
        </div>
    </div>

@endsection