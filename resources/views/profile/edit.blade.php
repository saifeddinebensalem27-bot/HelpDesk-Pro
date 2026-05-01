@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="card border-0 rounded-4 shadow-sm" style="width: 100%; max-width: 560px;">
            <div class="card-body p-4">

                <h5 class="fw-bold mb-1">Edit Profile</h5>
                <p class="text-muted small mb-4">Update your name, email, password and role.</p>

                <hr class="mb-4">

                <form method="POST" action="/profile">
                    @csrf
                    @method('POST')

                    {{-- Name --}}
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
                        <label class="form-label fw-medium small">Email Address</label>
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

                    {{-- Password (optional) --}}
                    <div class="mb-3">
                        <label class="form-label fw-medium small">New Password</label>
                        <input
                            type="password"
                            name="password"
                            placeholder="Leave empty to keep current password"
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
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="agent" {{ old('role', $user->role) == 'agent' ? 'selected' : '' }}>Agent</option>
                            <option value="user"  {{ old('role', $user->role) == 'user'  ? 'selected' : '' }}>User</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="mb-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="/profile" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                    </div>

                    {{-- Change Password --}}
                    {{-- <hr class="mt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="fw-medium small mb-0">Password</p>
                            <p class="text-muted" style="font-size: 12px;">Change your account password</p>
                        </div>
                        <a href="/profile/password" class="btn btn-outline-secondary btn-sm px-3">
                            <i class="bi bi-lock me-1"></i> Change Password
                        </a>
                    </div> --}}

                </form>
            </div>
        </div>
    </div>

@endsection