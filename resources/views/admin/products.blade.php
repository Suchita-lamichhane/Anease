<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - Admin</title>
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

        .btn-add {
            background: var(--primary-pink);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            transition: opacity 0.3s;
        }

        .btn-add:hover {
            opacity: 0.9;
            color: white;
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

        .btn-delete {
            color: #e53e3e;
            background: rgba(229, 62, 62, 0.1);
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-delete:hover {
            background: #e53e3e;
            color: white;
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
            <a href="/admin/customers" class="nav-item">
                <i class="bi bi-people-fill"></i> Customers
            </a>
            <a href="/admin/products" class="nav-item active">
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
                Products
            </div>
            
            <div class="search-bar d-none d-md-flex">
                <i class="bi bi-search text-muted"></i>
                <input type="text" placeholder="Search products...">
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

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="content-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 fw-bold">All Products</h5>
                <button type="button" class="btn-add" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="bi bi-plus-lg me-2"></i>New Product
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td style="width: 80px;">
                                <div style="width: 50px; height: 50px; border-radius: 10px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                    <img src="{{ $product->photo }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </td>
                            <td class="fw-bold" style="color: var(--text-dark);">{{ $product->name }}</td>
                            <td style="font-weight: 600;">${{ $product->price }}</td>
                            <td class="text-muted text-truncate" style="max-width: 250px;">{{ $product->description }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-sm" style="color: var(--primary-pink); background: rgba(223, 33, 110, 0.1); border: none; padding: 6px 12px; border-radius: 6px; font-size: 13px; font-weight: 600;" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>
                                    <form action="/admin/products/delete/{{ $product->id }}" method="POST" onsubmit="return confirm('Delete this product?');">
                                        @csrf
                                        <button type="submit" class="btn-delete">
                                            <i class="bi bi-trash3"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Edit Product Modal -->
                        <div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <div class="modal-header border-0 pb-0 mt-2 px-4">
                                        <h5 class="modal-title fw-bold" style="color: var(--text-dark);">Edit Product</h5>
                                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/admin/products/edit/{{ $product->id }}" method="POST">
                                        @csrf
                                        <div class="modal-body px-4 pt-4">
                                            <div class="mb-4">
                                                <label class="form-label text-muted fw-bold" style="font-size: 12px;">PRODUCT NAME</label>
                                                <input type="text" name="name" class="form-control form-control-lg border-0 bg-light fs-6" required value="{{ $product->name }}">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label text-muted fw-bold" style="font-size: 12px;">PRICE</label>
                                                <input type="text" name="price" class="form-control form-control-lg border-0 bg-light fs-6" required value="{{ $product->price }}">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label text-muted fw-bold" style="font-size: 12px;">PHOTO PATH</label>
                                                <input type="text" name="photo" class="form-control form-control-lg border-0 bg-light fs-6" required value="{{ $product->photo }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label text-muted fw-bold" style="font-size: 12px;">DESCRIPTION</label>
                                                <textarea name="description" class="form-control border-0 bg-light fs-6" rows="3" required>{{ $product->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0 pb-4 px-4">
                                            <button type="button" class="btn fw-bold text-muted" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-add px-4">Update Product</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">No products available. Add one above!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 pb-0 mt-2 px-4">
                    <h5 class="modal-title fw-bold" id="addProductModalLabel" style="color: var(--text-dark);">Add New Product</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/products/add" method="POST">
                    @csrf
                    <div class="modal-body px-4 pt-4">
                        <div class="mb-4">
                            <label class="form-label text-muted fw-bold" style="font-size: 12px;">PRODUCT NAME</label>
                            <input type="text" name="name" class="form-control form-control-lg border-0 bg-light fs-6" required placeholder="e.g. Hydrating Serum">
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-muted fw-bold" style="font-size: 12px;">PRICE</label>
                            <input type="text" name="price" class="form-control form-control-lg border-0 bg-light fs-6" required placeholder="e.g. 25.99">
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-muted fw-bold" style="font-size: 12px;">PHOTO PATH</label>
                            <input type="text" name="photo" class="form-control form-control-lg border-0 bg-light fs-6" value="assets/product.png" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted fw-bold" style="font-size: 12px;">DESCRIPTION</label>
                            <textarea name="description" class="form-control border-0 bg-light fs-6" rows="3" required placeholder="Enter product details..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pb-4 px-4">
                        <button type="button" class="btn fw-bold text-muted" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-add px-4">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
