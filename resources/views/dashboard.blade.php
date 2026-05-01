@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-semibold mb-0">Dashboard</h5>
            <span class="text-muted small">Welcome back, {{ Auth::user()->name }} 👋🏾 </span>
        </div>
    </div>

    {{-- Stat Cards --}}
    <div class="row g-3 mb-4">

        {{-- Total Tickets --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="stat-icon bg-primary bg-opacity-10">
                        <i class="bi bi-ticket-perforated text-primary"></i>
                    </div>
                </div>
                <div class="text-muted small mb-1">Total Tickets</div>
                <div class="fw-bold fs-4">{{ $totalTickets }}</div>
            </div>
        </div>

        {{-- Open Tickets --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="stat-icon bg-danger bg-opacity-10">
                        <i class="bi bi-exclamation-circle text-danger"></i>
                    </div>
                </div>
                <div class="text-muted small mb-1">Open Tickets</div>
                <div class="fw-bold fs-4">{{ $openTickets }}</div>
            </div>
        </div>

        {{-- In Progress --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="stat-icon bg-warning bg-opacity-10">
                        <i class="bi bi-clock text-warning"></i>
                    </div>
                </div>
                <div class="text-muted small mb-1">In Progress</div>
                <div class="fw-bold fs-4">{{ $inProgressTickets }}</div>
            </div>
        </div>

        {{-- Resolved --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="stat-icon bg-success bg-opacity-10">
                        <i class="bi bi-check-circle text-success"></i>
                    </div>
                </div>
                <div class="text-muted small mb-1">Resolved</div>
                <div class="fw-bold fs-4">{{ $resolvedTickets }}</div>
            </div>
        </div>

    </div>

@endsection