@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="card border-0 rounded-4 shadow-sm" style="width: 100%; max-width: 420px;">
            <div class="card-body p-0">

                {{-- Header --}}
                <div class="text-center py-4 border-bottom">
                    <h5 class="fw-bold mb-0">Settings</h5>
                </div>

                {{-- Buttons --}}
                <div class="p-4 d-flex flex-column gap-3">

                    {{-- Logout --}}
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger fw-semibold py-2 w-100">
                            Logout
                        </button>
                    </form>
                    <p class="text-muted small text-center mt-0">You will be logged out of your account.</p>

                    <hr>

                    {{-- Delete Account --}}
                    <form action="/profile" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="btn btn-outline-danger fw-semibold py-2 w-100"
                            onclick="return confirm('Are you sure? This will permanently delete your account.')">
                            Delete Account
                        </button>
                    </form>
                    <p class="text-muted small text-center mt-0">This action is permanent and cannot be undone.</p>

                </div>

            </div>
        </div>
    </div>

@endsection