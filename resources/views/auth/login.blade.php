<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelpDesk Pro — Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light min-vh-100 d-flex align-items-center justify-content-center">

    <div class="card shadow-sm border-0 rounded-3" style="width: 100%; max-width: 420px;">
        <div class="card-body p-5">

            {{-- Header --}}
            <div class="text-center mb-4">
                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px;">
                    <i class="bi bi-headset text-primary fs-4"></i>
                </div>
                <h4 class="fw-semibold text-dark mb-1">HelpDesk Pro</h4>
                <p class="text-muted small mb-0">Sign in to your account to continue</p>
            </div>

            {{-- Error Alert --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 py-2 px-3" role="alert">
                    <i class="bi bi-exclamation-circle-fill text-danger"></i>
                    <span class="small">{{ $errors->first('email') }}</span>   
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button> 
                </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="/login">
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label fw-medium small">Email address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-envelope text-muted"></i>
                        </span>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror"
                            required
                            autofocus
                        >
                    </div>
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label for="password" class="form-label fw-medium small">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-lock text-muted"></i>
                        </span>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror"
                            required
                        >
                    </div>
                </div>

                {{-- Submit --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary fw-medium">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                    </button>
                </div>

            </form>

        </div>

        {{-- Footer --}}
        <div class="card-footer bg-transparent border-0 text-center py-3">
            <span class="text-muted small">HelpDesk Pro &copy; {{ date('Y') }}</span>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>