@extends('main')

@section('content')
    <section class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold font-family-sans-serif">Search Results</h2>
            <p class="text-muted">Showing results for: <strong>"{{ $query }}"</strong></p>
        </div>

        @if ($items->isEmpty())
            <div class="alert alert-warning text-center">
                No products found matching your search.
            </div>
        @else
            <div class="row m-0 p-0 justify-content-center g-3">
                @foreach ($items as $item)
                    <div class="col-6 col-md-3 p-1 p-md-3">
                        <div class="card h-100 shadow-sm border-0 rounded product-card">
                            <img src="{{ $item->photo }}" class="card-img-top rounded-top"
                                style="width: 100%; aspect-ratio: 1/1; object-fit: cover;" alt="">
                            <div class="card-body d-flex flex-column p-3 text-center">
                                <h5 class="card-title text-dark fw-bold mb-1" style="font-size: 16px;">
                                    {{ $item->name }}</h5>
                                <p class="card-text text-muted mb-3" style="font-size: 13px;">
                                    {{ $item->description }}</p>
                                
                                <div class="mt-auto d-flex flex-column flex-xl-row justify-content-between gap-2">
                                    <a href="#"
                                        onclick="event.preventDefault(); triggerCart('{{ $item->name }}', '{{ $item->photo }}', '{{ addslashes($item->description) }}')"
                                        class="btn btn-primary theme-btn w-100" style="font-size: 13px;"><i class="bi bi-bag me-1"></i> Cart</a>
                                    <a href="#"
                                        onclick="event.preventDefault(); triggerWishlist('{{ $item->name }}', '{{ $item->photo }}', '{{ addslashes($item->description) }}')"
                                        class="btn btn-outline-danger theme-btn w-100" style="font-size: 13px;"><i class="bi bi-heart me-1"></i> Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



                
            </div>
        @endif
    </section>

    <form id="wishlistForm" method="POST" action="/wishlist/add" class="d-none">
        @csrf
        <input type="hidden" name="product_name" id="wl_name">
        <input type="hidden" name="product_photo" id="wl_photo">
        <input type="hidden" name="description" id="wl_desc">
    </form>
    <script>
        function triggerWishlist(name, photo, desc) {
            document.getElementById('wl_name').value = name;
            document.getElementById('wl_photo').value = photo;
            document.getElementById('wl_desc').value = desc;
            document.getElementById('wishlistForm').submit();
        }
    </script>

    <form id="cartForm" method="POST" action="/cart/add" class="d-none">
        @csrf
        <input type="hidden" name="product_name" id="cart_name">
        <input type="hidden" name="product_photo" id="cart_photo">
        <input type="hidden" name="description" id="cart_desc">
    </form>
    <script>
        function triggerCart(name, photo, desc) {
            document.getElementById('cart_name').value = name;
            document.getElementById('cart_photo').value = photo;
            document.getElementById('cart_desc').value = desc;
            document.getElementById('cartForm').submit();
        }
    </script>
@endsection
