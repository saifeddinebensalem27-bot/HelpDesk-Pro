@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="card border-0 rounded-4 shadow-sm" style="width: 100%; max-width: 560px;">
            <div class="card-body p-0">

                {{-- Header --}}
                <div class="p-4 border-bottom">
                    <h5 class="fw-bold mb-1">Add New User</h5>
                    <p class="text-muted small mb-0">Create a new user account with specific permissions.</p>
                </div>

                {{-- Form --}}
                <div class="p-4">
                    <form method="POST" action="/users">
                        @csrf

                        {{-- Full Name --}}
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Full Name</label>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                autofocus
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
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                            >
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Role --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium small">Role</label>
                            <select name="role" class="form-select @error('role') is-invalid @enderror">
                                <option value="user"  {{ old('role') == 'user'  ? 'selected' : '' }}>User</option>
                                <option value="agent" {{ old('role') == 'agent' ? 'selected' : '' }}>Agent</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="mb-4">

                        <div class="d-flex justify-content-end gap-2">
                            <a href="/users" class="btn btn-outline-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary px-4">Create User</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection