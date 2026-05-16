<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Anease</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #d36856;
            --sidebar-bg: #3c3630;
            --bg-light: #f9f7f5;
            --text-dark: #3c3630;
            --text-muted: #857e77;
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
            background-color: var(--sidebar-bg);
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
            color: var(--primary-color);
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

        /* Stat Cards */
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
        }

        .stat-card.primary-bg {
            background: var(--primary-color);
            color: white;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .primary-bg .stat-value, .primary-bg .stat-label {
            color: white;
        }

        .stat-label {
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 500;
        }

        .stat-icon {
            color: var(--primary-color);
            font-size: 24px;
        }

        .primary-bg .stat-icon {
            color: white;
        }

        /* Tables and Lists */
        .content-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
            height: 100%;
        }

        .card-header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-title-main {
            font-size: 16px;
            font-weight: 600;
        }

        .btn-see-all {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 20px;
            padding: 4px 16px;
            font-size: 12px;
            font-weight: 500;
        }

        /* Table specific */
        .table > :not(caption) > * > * {
            padding: 12px 0;
            border-bottom-color: #f0f2f5;
        }
        
        .table th {
            font-size: 12px;
            color: var(--text-muted);
            font-weight: 500;
            border-bottom: none;
        }

        .table td {
            font-size: 14px;
            font-weight: 500;
            vertical-align: middle;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }

        .status-active { background-color: var(--primary-color); }
        .status-pending { background-color: #f59e0b; }

        /* User List */
        .user-list-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0f2f5;
        }
        .user-list-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--bg-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-weight: 600;
            margin-right: 15px;
        }

        .user-info h6 {
            margin: 0 0 2px 0;
            font-size: 14px;
            font-weight: 600;
        }

        .user-info small {
            color: var(--text-muted);
            font-size: 12px;
        }

        .user-action {
            margin-left: auto;
            color: var(--text-muted);
            cursor: pointer;
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
            <a href="/admin/dashboard" class="nav-item active">
                <i class="bi bi-grid-fill"></i> Dashboard
            </a>
            <a href="/admin/customers" class="nav-item">
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
                Dashboard
            </div>
            
            <div class="search-bar d-none d-md-flex">
                <i class="bi bi-search text-muted"></i>
                <input type="text" placeholder="Search here...">
            </div>

            <div class="profile-sec">
                <div class="text-end d-none d-md-block">
                    <div class="fw-bold" style="font-size: 14px;">{{ auth()->user()->firstname ?? 'Admin' }}</div>
                    <div class="text-muted" style="font-size: 12px;">Super admin</div>
                </div>
                <div class="user-avatar" style="background-color: var(--primary-color); color: white; width: 45px; height: 45px; font-size: 18px; margin-right: 0;">
                    {{ strtoupper(substr(auth()->user()->firstname ?? 'S', 0, 1)) }}
                </div>
            </div>
        </div>

        <!-- Filter Row -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="content-card">
                    <form action="/admin/dashboard" method="GET" class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size: 13px; color: var(--text-muted);">Select Month</label>
                            <select name="month" class="form-select border-0 bg-light rounded-3 shadow-sm">
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ sprintf('%02d', $i) }}" {{ $month == sprintf('%02d', $i) ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size: 13px; color: var(--text-muted);">Select Year</label>
                            <select name="year" class="form-select border-0 bg-light rounded-3 shadow-sm">
                                @for ($i = date('Y'); $i >= date('Y') - 5; $i--)
                                    <option value="{{ $i }}" {{ $year == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary w-100 rounded-3 shadow-sm py-2" style="background-color: var(--primary-color); border: none; font-weight: 600;">
                                <i class="bi bi-filter me-2"></i> Apply Filter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if($errors->any())
            <div class="alert alert-danger border-0 shadow-sm rounded-3 mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Stat Cards Row -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="stat-card">
                    <div>
                        <div class="stat-value">{{ $totalUsers }}</div>
                        <div class="stat-label">New Customers</div>
                    </div>
                    <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div>
                        <div class="stat-value">{{ $totalProducts }}</div>
                        <div class="stat-label">Total Products</div>
                    </div>
                    <div class="stat-icon"><i class="bi bi-box-seam-fill"></i></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div>
                        <div class="stat-value">{{ $totalOrders }}</div>
                        <div class="stat-label">Monthly Orders</div>
                    </div>
                    <div class="stat-icon"><i class="bi bi-bag-fill"></i></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card primary-bg">
                    <div>
                        <div class="stat-value">${{ number_format($totalRevenue ?? 0, 2) }}</div>
                        <div class="stat-label">Monthly Revenue</div>
                    </div>
                    <div class="stat-icon"><i class="bi bi-currency-dollar"></i></div>
                </div>
            </div>
        </div>

        <!-- Tables Row -->
        <div class="row g-4">
            <!-- Recent Orders -->
            <div class="col-md-8">
                <div class="content-card">
                    <div class="card-header-flex">
                        <div class="card-title-main">Recent Orders</div>
                        <button class="btn-see-all">See all</button>
                    </div>
                    
                    @if($recentOrders->isEmpty())
                        <div class="alert alert-warning border-0 shadow-sm rounded-3">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i> No orders have been completed yet.
                        </div>
                    @else
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Order Details</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentOrders as $order)
                                <tr>
                                    <td>
                                        Order #{{ $order->id }}<br>
                                        <span class="text-muted" style="font-size: 12px; display: block; max-width: 200px; overflow: hidden; text-truncate: ellipsis; white-space: nowrap;">{{ $order->product_details }}</span>
                                        <span class="fw-bold" style="font-size: 13px; color: var(--primary-color);">${{ number_format($order->amount, 2) }}</span>
                                    </td>
                                    <td>{{ $order->user->firstname ?? 'Unknown' }} {{ $order->user->lastname ?? '' }}</td>
                                    <td>
                                        <span class="status-dot {{ $order->status === 'completed' ? 'status-active' : 'status-pending' }}"></span>{{ ucfirst($order->status) }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Checkout Customer List -->
            <div class="col-md-4">
                <div class="content-card">
                    <div class="card-header-flex">
                        <div class="card-title-main">Checkout Customers</div>
                        <button class="btn-see-all">See all</button>
                    </div>

                    @if($checkoutCustomers->isEmpty())
                        <div class="alert alert-warning border-0 shadow-sm rounded-3">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i> No customers have checked out yet.
                        </div>
                    @else
                    <div class="user-list">
                        @foreach($checkoutCustomers as $customer)
                        <div class="user-list-item">
                            <div class="user-avatar">
                                {{ strtoupper(substr($customer->firstname ?? 'U', 0, 1)) }}
                            </div>
                            <div class="user-info">
                                <h6>{{ $customer->firstname }} {{ $customer->lastname }}</h6>
                                <small>Checked out</small>
                            </div>
                            <div class="user-action">
                                <i class="bi bi-telephone"></i>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
