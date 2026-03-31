@extends('main')

@section('content')
<div class="container py-5 mt-4" style="min-height: 60vh;">
    <h2 class="fw-bold font-family-sans-serif text-center mb-4">Your Wishlist</h2>
    
    <div class="row m-0 p-0 justify-content-center">
        @if(count($wishlists) == 0)
        <div class="col-12 text-center p-5 shadow rounded bg-white">
            <i class="bi bi-heart fs-1 text-danger"></i>
            <h4 class="mt-3">Your wishlist is currently empty.</h4>
            <p class="text-muted">Save items you love here to easily find them later!</p>
            <a href="/home" class="btn btn-primary theme-btn mt-3 px-4">Continue Shopping</a>
        </div>
        @else
        <div class="col-12">
            <div class="row text-center mt-3 p-3">
                @foreach($wishlists as $item)
                <div class="col-md-3 mb-4">
                    <div class="card product-card p-3 shadow-sm border-0 h-100">
                        @if($item->product_photo)
                        <img src="{{ $item->product_photo }}" class="card-img-top rounded" style="width:100%; aspect-ratio:3/2; object-fit:cover;">
                        @endif
                        <div class="card-body p-2 d-flex flex-column">
                            <h5 class="card-title mt-2">{{ $item->product_name }}</h5>
                            <p class="card-text text-muted small">{{ $item->description }}</p>
                            
                            <div class="mt-auto pt-3">
                                <a href="#" onclick="event.preventDefault(); triggerCart('{{ $item->product_name }}', '{{ $item->product_photo }}', '{{ $item->description }}')" class="btn btn-primary theme-btn w-100 mb-2"><i class="bi bi-bag"></i> Checkout</a>
                                <form action="/wishlist/remove" method="POST">
                                    @csrf
                                    <input type="hidden" name="wishlist_id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-outline-danger theme-btn w-100"><i class="bi bi-trash"></i> Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

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
