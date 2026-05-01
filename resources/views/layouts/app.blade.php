<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelpDesk Pro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: #1a1a2e;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar .brand {
            font-size: 18px;
            font-weight: 600;
            color: #ffffff;
            padding: 24px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.6);
            padding: 10px 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-left: 3px solid transparent;
            transition: all 0.2s;
        }

        .sidebar .nav-link:hover {
            color: #ffffff;
            background-color: rgba(255,255,255,0.05);
        }

        .sidebar .nav-link.active {
            color: #ffffff;
            background-color: rgba(255,255,255,0.08);
            border-left: 3px solid #4361ee;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #e9ecef;
            height: 100%;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar d-flex flex-column">
        <div class="brand">
            <i class="bi bi-headset me-2"></i>HelpDesk Pro
        </div>

        <nav class="mt-2 flex-grow-1">
            <a href="/dashboard"   class="nav-link {{ request()->is('dashboard')   ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="/tickets/create" class="nav-link {{ request()->is('tickets/create') ? 'active' : '' }}">
                <i class="bi bi-plus-circle"></i> New Ticket
            </a>
            <a href="/tickets"     class="nav-link {{ request()->is('tickets')     ? 'active' : '' }}">
                <i class="bi bi-ticket-perforated"></i> Tickets
            </a>
            <a href="/users"       class="nav-link {{ request()->is('users')       ? 'active' : '' }}">
                <i class="bi bi-people"></i> Users
            </a>
            {{-- <a href="/agents"      class="nav-link {{ request()->is('agents')      ? 'active' : '' }}">
                <i class="bi bi-person-badge"></i> Agents
            </a> --}}
            <a href="/categories"  class="nav-link {{ request()->is('categories')  ? 'active' : '' }}">
                <i class="bi bi-tags"></i> Categories
            </a>
            <a href="/profile"     class="nav-link {{ request()->is('profile')     ? 'active' : '' }}">
                <i class="bi bi-person-circle"></i> Profile
            </a>
            <a href="/settings"    class="nav-link {{ request()->is('settings')    ? 'active' : '' }}">
                <i class="bi bi-gear"></i> Settings
            </a>
        </nav>
    </div>

    {{-- Main Content --}}
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>