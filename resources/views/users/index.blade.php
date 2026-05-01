@extends('layouts.app')

@section('content')

    <div class="card border-0 rounded-3 shadow-sm">
        <div class="card-body p-4">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="fw-bold mb-1">Manage Users</h5>
                    <p class="text-muted small mb-0">View and manage system users</p>
                </div>
                <a href="/users/create" class="btn btn-primary btn-sm px-3">
                    + Add User
                </a>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr class="text-uppercase text-muted border-bottom"
                            style="font-size: 11px; letter-spacing: 0.05em;">
                            <th class="pb-3">User</th>
                            <th class="pb-3">Role</th>
                            <th class="pb-3 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="border-bottom">

                                {{-- Avatar + Name + Email --}}
                                <td class="py-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px; background-color: #e0e7ff;">
                                            <span class="fw-semibold" style="font-size: 13px; color: #4361ee;">
                                                {{ strtoupper(substr($user->name, 0, 2)) }}
                                            </span>
                                        </div>
                                        <div>
                                            <div class="fw-semibold small">{{ $user->name }}</div>
                                            <div class="text-muted" style="font-size: 12px;">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>

                                {{-- Role Badge --}}
                                <td>
                                    @if ($user->role === 'admin')
                                        <span class="badge rounded-pill px-3 py-2" style="background-color: #f0e6ff; color: #7c3aed;">Admin</span>
                                    @elseif ($user->role === 'agent')
                                        <span class="badge rounded-pill px-3 py-2" style="background-color: #e0f0ff; color: #2563eb;">Agent</span>
                                    @else
                                        <span class="badge rounded-pill px-3 py-2" style="background-color: #f0f0f0; color: #6c757d;">User</span>
                                    @endif
                                </td>

                                {{-- Actions --}}
                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-3">
                                        <a href="/users/{{ $user->id }}/edit" class="text-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="/users/{{ $user->id }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-link p-0 text-danger"
                                                onclick="return confirm('Delete this user?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-5">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection