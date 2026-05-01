@extends('layouts.app')

@section('content')

    {{-- Success Alert --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 py-2 px-3 mb-4" role="alert">
            <i class="bi bi-check-circle-fill text-success"></i>
            <span class="small">{{ session('success') }}</span>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-center">
        <div class="card border-0 rounded-4 shadow-sm" style="width: 100%; max-width: 560px;">
            <div class="card-body p-0">

                {{-- Top Section: Avatar + Name + Email + Role --}}
                <div class="text-center py-4 px-4">

                    {{-- Avatar or Initials --}}
                    @if ($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" class="rounded-circle mb-3" style="width: 90px; height: 90px; object-fit: cover;">
                    @else
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 90px; height: 90px; background-color: #e0e7ff;">
                            <span style="font-size: 28px; font-weight: 700; color: #4361ee;">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </span>
                        </div>
                    @endif

                    <h5 class="fw-bold mb-1">{{ $user->name }}</h5>
                    <p class="text-muted small mb-2">{{ $user->email }}</p>

                    {{-- Role Badge --}}
                    @if ($user->role === 'admin')
                        <span class="badge rounded-pill px-3 py-2" style="background-color: #f0e6ff; color: #7c3aed;">Admin</span>
                    @elseif ($user->role === 'agent')
                        <span class="badge rounded-pill px-3 py-2" style="background-color: #e0f0ff; color: #2563eb;">Agent</span>
                    @else
                        <span class="badge rounded-pill px-3 py-2" style="background-color: #f0f0f0; color: #6c757d;">User</span>
                    @endif

                </div>

                <hr class="m-0">

                {{-- Info Rows --}}
                <div class="px-4 py-3">

                    <div class="d-flex justify-content-between align-items-center py-2">
                        <span class="text-muted small">Name</span>
                        <span class="fw-semibold small">{{ $user->name }}</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center py-2">
                        <span class="text-muted small">Email</span>
                        <span class="fw-semibold small">{{ $user->email }}</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center py-2">
                        <span class="text-muted small">Role</span>
                        <span class="fw-semibold small">{{ ucfirst($user->role) }}</span>
                    </div>

                </div>

                <hr class="m-0">

                {{-- Buttons --}}
                <div class="px-4 py-4 d-flex flex-column gap-2">
                    <a href="/profile/edit" class="btn btn-primary fw-semibold py-2">
                        Edit Profile
                    </a>
                </div>

            </div>
        </div>
    </div>

@endsection