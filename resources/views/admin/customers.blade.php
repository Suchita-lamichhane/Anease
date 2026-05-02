<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customers - Admin</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-pink: #df216e;
            --bg-light: #f4f6fa;
            --text-dark: #2d3748;
            --text-muted: #a0aec0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: var(--primary-pink);
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }

        .sidebar-brand {
            padding: 24px;
            font-size: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-items {
            flex: 1;
            padding: 0 16px;
            margin-top: 20px;
        }

        .nav-item {
            padding: 12px 16px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 15px;
            border-radius: 8px;
            margin-bottom: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-item:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-item.active {
            background-color: white;
            color: var(--primary-pink);
        }

        .sidebar-footer {
            padding: 24px;
        }

        .visit-site-btn {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            transition: background 0.3s;
        }

        .visit-site-btn:hover {
            background-color: rgba(255, 255, 255, 0.3);
            color: white;
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 250px;
            padding: 20px 30px;
        }

        /* Top Header */
        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 10px;
        }

        .header-title {
            font-size: 24px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .search-bar {
            background-color: white;
            border-radius: 20px;
            padding: 8px 20px;
            display: flex;
            align-items: center;
            width: 300px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }

        .search-bar input {
            border: none;
            outline: none;
            width: 100%;
            margin-left: 10px;
            font-size: 14px;
        }

        .profile-sec {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* Content Card */
        .content-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }

        /* Table */
        .table > :not(caption) > * > * {
            padding: 15px 0;
            border-bottom-color: #f0f2f5;
        }
        
        .table th {
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 600;
            border-bottom: 1px solid #f0f2f5 !important;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table td {
            font-size: 14px;
            font-weight: 500;
            vertical-align: middle;
        }
        
        .role-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .role-super-admin {
            background-color: rgba(223, 33, 110, 0.1);
            color: var(--primary-pink);
        }
        
        .role-consumer {
            background-color: rgba(45, 55, 72, 0.1);
            color: var(--text-dark);
        }

    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="bi bi-clouds-fill"></i> Anease
        </div>
        
        <div class="nav-items">
            <a href="/admin/dashboard" class="nav-item">
                <i class="bi bi-grid-fill"></i> Dashboard
            </a>
            <a href="/admin/customers" class="nav-item active">
                <i class="bi bi-people-fill"></i> Customers
            </a>
            <a href="/admin/products" class="nav-item">
                <i class="bi bi-box-seam-fill"></i> Products
            </a>
            <a href="#" class="nav-item">
                <i class="bi bi-bag-fill"></i> Orders
            </a>
            <a href="#" class="nav-item">
                <i class="bi bi-bar-chart-fill"></i> Inventory
            </a>
            <a href="#" class="nav-item">
                <i class="bi bi-wallet-fill"></i> Accounts
            </a>
        </div>

        <div class="sidebar-footer">
            <a href="/home" class="visit-site-btn">
                <i class="bi bi-box-arrow-up-right"></i> Visit site
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="top-header">
            <div class="header-title">
                <i class="bi bi-list fs-4 text-muted d-lg-none" style="cursor: pointer;"></i>
                Customers
            </div>
            
            <div class="search-bar d-none d-md-flex">
                <i class="bi bi-search text-muted"></i>
                <input type="text" placeholder="Search customers...">
            </div>

            <div class="profile-sec">
                <div class="text-end d-none d-md-block">
                    <div class="fw-bold" style="font-size: 14px;">{{ auth()->user()->firstname ?? 'Admin' }}</div>
                    <div class="text-muted" style="font-size: 12px;">Super admin</div>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="background-color: var(--primary-pink); color: white; width: 45px; height: 45px; font-size: 18px;">
                    {{ strtoupper(substr(auth()->user()->firstname ?? 'A', 0, 1)) }}
                </div>
            </div>
        </div>

        <div class="content-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 fw-bold">All Registered Users</h5>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Joined On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td class="fw-bold text-muted">#{{ $user->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="background-color: var(--bg-light); color: var(--primary-pink); width: 40px; height: 40px; font-weight: bold;">
                                        {{ strtoupper(substr($user->firstname ?? $user->name ?? 'U', 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold" style="color: var(--text-dark);">
                                            {{ $user->firstname ?? '' }} {{ $user->lastname ?? $user->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-muted">{{ $user->email ?? 'No email provided' }}</td>
                            <td>
                                <span class="role-badge {{ str_contains(strtolower($user->usertype), 'admin') ? 'role-super-admin' : 'role-consumer' }}">
                                    {{ ucfirst($user->usertype ?? 'consumer') }}
                                </span>
                            </td>
                            <td class="text-muted">{{ $user->created_at ? $user->created_at->format('M d, Y') : 'Unknown' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">No users registered yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
