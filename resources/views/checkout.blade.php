@extends('main')

@section('content')
<div class="container py-5 mt-4" style="min-height: 60vh;">
    <h2 class="fw-bold font-family-sans-serif text-center mb-4">Checkout</h2>
    
    <div class="row m-0 p-0 justify-content-between">
        <!-- Order Summary side -->
        <div class="col-md-5 mb-4 mb-md-0">
            <div class="shadow rounded p-4 bg-light h-100">
                <h4 class="mb-4 d-flex justify-content-between align-items-center">
                    <span class="text-primary">Order Summary</span>
                    <span class="badge bg-primary rounded-pill">{{ count($carts) }}</span>
                </h4>
                @php $totalPrice = 0; @endphp
                
                @if(count($carts) > 0)
                <ul class="list-group mb-3">
                    @foreach($carts as $item)
                    @php 
                        $cleanPrice = str_replace(['$', ','], '', $item->product_price ?? '0');
                        $totalPrice += floatval($cleanPrice); 
                    @endphp
                    <li class="list-group-item d-flex justify-content-between lh-sm p-3">
                        <div class="d-flex align-items-center">
                            @if($item->product_photo)
                            <img src="{{ $item->product_photo }}" class="img-thumbnail me-3" style="width: 50px; height: 50px; object-fit: cover;">
                            @endif
                            <div>
                                <h6 class="my-0 fw-bold">{{ $item->product_name }}</h6>
                                <small class="text-muted">{{ $item->description }}</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <span class="fw-bold" style="color: var(--primary-pink);">${{ number_format(floatval($item->product_price ?? 0), 2) }}</span>
                            <form action="/cart/remove" method="POST" class="m-0">
                                @csrf
                                <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-sm text-danger border-0 bg-transparent p-0"><i class="bi bi-x-circle fs-5"></i></button>
                            </form>
                        </div>
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between p-3 bg-white fw-bold">
                        <span>Total (USD)</span>
                        <span>${{ number_format($totalPrice, 2) }}</span>
                    </li>
                </ul>
                @else
                <div class="text-center py-5">
                    <i class="bi bi-cart-x fs-1 text-muted"></i>
                    <p class="mt-3 text-muted">Your cart is completely empty.</p>
                    <a href="/home" class="btn btn-outline-primary theme-btn mt-2">Browse Store</a>
                </div>
                @endif
            </div>
        </div>

        <!-- Billing side -->
        <div class="col-md-7">
            <div class="shadow rounded p-4 p-md-5 bg-white h-100">
                <h4 class="mb-4">Billing Details</h4>
                <form action="{{ route('payment.initiate') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control" value="{{ Auth::user()->firstname }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control" value="{{ Auth::user()->lastname }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Shipping Address</label>
                        <input type="text" name="address" class="form-control" placeholder="1234 Main St" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h5 class="mb-3">Payment Method</h5>
                    <div class="my-3">
                        <div class="form-check d-flex align-items-center gap-3 p-3 border rounded mb-3 bg-light" style="cursor: pointer;">
                            <input id="esewa" name="paymentMethod" type="radio" class="form-check-input" value="esewa" checked required>
                            <label class="form-check-label d-flex align-items-center gap-2 w-100" for="esewa" style="cursor: pointer;">
                                <img src="/assets/48.jpg" alt="eSewa" style="height: 30px;">
                                <span class="fw-bold">Pay with eSewa</span>
                            </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-3 p-3 border rounded mb-3" style="cursor: pointer;">
                            <input id="cod" name="paymentMethod" type="radio" class="form-check-input" value="cod">
                            <label class="form-check-label d-flex align-items-center gap-2 w-100" for="cod" style="cursor: pointer;">
                                <i class="bi bi-truck fs-4 text-primary"></i>
                                <span class="fw-bold">Cash on Delivery</span>
                            </label>
                        </div>
                    </div>

                    <hr class="my-4">
                    
                    <button type="submit" class="btn btn-primary theme-btn w-100 py-3 fs-5 fw-bold" @if(count($carts) == 0) disabled @endif>
                        <i class="bi bi-shield-lock-fill me-2"></i> Place Order (${{ number_format($totalPrice, 2) }})
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
