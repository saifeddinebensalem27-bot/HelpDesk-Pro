@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="card border-0 rounded-4 shadow-sm" style="width: 100%; max-width: 560px;">
            <div class="card-body p-0">

                {{-- Header --}}
                <div class="p-4 border-bottom">
                    <h5 class="fw-bold mb-1">Edit User</h5>
                    <p class="text-muted small mb-0">Update user account details.</p>
                </div>

                {{-- Form --}}
                <div class="p-4">
                    <form method="POST" action="/users/{{ $user->id }}">
                        @csrf
                        @method('PUT')

                        {{-- Full Name --}}
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Full Name</label>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', $user->name) }}"
                                class="form-control @error('name') is-invalid @enderror"
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Email</label>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                                class="form-control @error('email') is-invalid @enderror"
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Role --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium small">Role</label>
                            <select name="role" class="form-select @error('role') is-invalid @enderror">
                                <option value="user"  {{ old('role', $user->role) == 'user'  ? 'selected' : '' }}>User</option>
                                <option value="agent" {{ old('role', $user->role) == 'agent' ? 'selected' : '' }}>Agent</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="mb-4">

                        <div class="d-flex justify-content-end gap-2">
                            <a href="/users" class="btn btn-outline-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection