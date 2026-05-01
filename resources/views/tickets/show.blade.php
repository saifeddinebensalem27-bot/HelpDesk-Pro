@extends('layouts.app')

@section('content')

    <a href="/tickets" class="text-decoration-none text-muted small d-inline-flex align-items-center gap-1 mb-4">
        <i class="bi bi-arrow-left"></i> Back to Tickets
    </a>

    <div class="card border-0 rounded-3 shadow-sm">
        <div class="card-body p-4">

            {{-- Title --}}
            <h5 class="fw-bold mb-3">{{ $ticket->title }}</h5>

            {{-- Badges --}}
            <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
                <span class="badge rounded-pill" style="background-color:#eff6ff; color:#4361ee;">
                    {{ $ticket->category->name }}
                </span>

                @if ($ticket->priority === 'critical')
                    <span class="badge rounded-pill" style="background-color:#ffe4e4; color:#dc3545;">Priority: Critical</span>
                @elseif ($ticket->priority === 'high')
                    <span class="badge rounded-pill" style="background-color:#fff0e0; color:#fd7e14;">Priority: High</span>
                @elseif ($ticket->priority === 'medium')
                    <span class="badge rounded-pill" style="background-color:#fff9e0; color:#d4a017;">Priority: Medium</span>
                @else
                    <span class="badge rounded-pill" style="background-color:#f0f0f0; color:#6c757d;">Priority: Low</span>
                @endif

                @if ($ticket->status === 'open')
                    <span class="badge rounded-pill" style="background-color:#ffe4e4; color:#dc3545;">Status: Open</span>
                @elseif ($ticket->status === 'in_progress')
                    <span class="badge rounded-pill" style="background-color:#fff9e0; color:#d4a017;">Status: In Progress</span>
                @elseif ($ticket->status === 'resolved')
                    <span class="badge rounded-pill" style="background-color:#e4f9e4; color:#28a745;">Status: Resolved</span>
                @else
                    <span class="badge rounded-pill" style="background-color:#f0f0f0; color:#6c757d;">Status: Closed</span>
                @endif

                <span class="text-muted small">Submitted on {{ $ticket->created_at->format('Y-m-d') }}</span>
            </div>

            <hr>

            {{-- Description --}}
            <div class="mb-4">
                <p class="text-uppercase text-muted fw-semibold mb-2" style="font-size: 11px; letter-spacing: 0.08em;">Description</p>
                <p class="text-dark mb-0">{{ $ticket->description }}</p>
            </div>

            <hr>

            {{-- Submitted By --}}
            <div>
                <p class="text-uppercase text-muted fw-semibold mb-2" style="font-size: 11px; letter-spacing: 0.08em;">Submitted By</p>
                <p class="fw-bold mb-0">{{ $ticket->submitter->name }}</p>
            </div>

        </div>
    </div>

@endsection