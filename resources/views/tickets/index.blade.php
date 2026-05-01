@extends('layouts.app')

@section('content')

    <div class="card border-0 rounded-3 shadow-sm">
        <div class="card-body p-4">

            <h5 class="fw-bold mb-1">All Tickets</h5>
            <p class="text-muted small mb-4">Complete list of all support requests</p>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr class="text-uppercase text-muted" style="font-size: 11px; letter-spacing: 0.05em;">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Submitted By</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tickets as $ticket)
                            <tr>
                                <td class="text-muted small">TCK-{{ str_pad($ticket->id, 4, '0', STR_PAD_LEFT) }}</td>
                                <td class="fw-medium">{{ $ticket->title }}</td>
                                <td class="text-muted small">{{ $ticket->category->name }}</td>

                                {{-- Priority --}}
                                <td>
                                    @if ($ticket->priority === 'critical')
                                        <span class="badge rounded-pill" style="background-color:#ffe4e4; color:#dc3545;">Critical</span>
                                    @elseif ($ticket->priority === 'high')
                                        <span class="badge rounded-pill" style="background-color:#fff0e0; color:#fd7e14;">High</span>
                                    @elseif ($ticket->priority === 'medium')
                                        <span class="badge rounded-pill" style="background-color:#fff9e0; color:#d4a017;">Medium</span>
                                    @else
                                        <span class="badge rounded-pill" style="background-color:#f0f0f0; color:#6c757d;">Low</span>
                                    @endif
                                </td>

                                {{-- Status --}}
                                <td>
                                    @if ($ticket->status === 'open')
                                        <span class="badge rounded-pill" style="background-color:#ffe4e4; color:#dc3545;">Open</span>
                                    @elseif ($ticket->status === 'in_progress')
                                        <span class="badge rounded-pill" style="background-color:#fff9e0; color:#d4a017;">In Progress</span>
                                    @elseif ($ticket->status === 'resolved')
                                        <span class="badge rounded-pill" style="background-color:#e4f9e4; color:#28a745;">Resolved</span>
                                    @else
                                        <span class="badge rounded-pill" style="background-color:#f0f0f0; color:#6c757d;">Closed</span>
                                    @endif
                                </td>

                                <td class="small">{{ $ticket->submitter?->name ?? 'Unknown' }}</td>
                                <td class="small text-muted">{{ $ticket->created_at->format('Y-m-d') }}</td>

                                {{-- Actions --}}
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="/tickets/{{ $ticket->id }}" class="text-secondary">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="/tickets/{{ $ticket->id }}/edit" class="text-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="/tickets/{{ $ticket->id }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0 text-danger"
                                                onclick="return confirm('Delete this ticket?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-5">No tickets found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection