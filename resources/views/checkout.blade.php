@extends('main')
@section('style')
<style>
    .text-brown { color: #5d4037 !important; }
    .bg-brown { background-color: #5d4037 !important; color: white !important; }
    .btn-brown { background-color: #5d4037 !important; border-color: #5d4037 !important; color: white !important; }
    .btn-brown:hover { background-color: #4e342e !important; border-color: #4e342e !important; color: white !important; }
    .btn-outline-brown { color: #5d4037 !important; border-color: #5d4037 !important; background-color: transparent !important; }
    .btn-outline-brown:hover { background-color: #5d4037 !important; color: white !important; }
    .border-brown { border-color: #5d4037 !important; }
    .form-check-input:checked { background-color: #5d4037 !important; border-color: #5d4037 !important; }
    .form-control:focus { border-color: #5d4037 !important; box-shadow: 0 0 0 0.25rem rgba(93, 64, 55, 0.25) !important; }
</style>
@endsection

@section('content')
<div class="container py-5 mt-4" style="min-height: 60vh;">
    <h2 class="fw-bold font-family-sans-serif text-center mb-4">Checkout</h2>
    
    <div class="row m-0 p-0 justify-content-between">
        <!-- Order Summary side -->
        <div class="col-md-5 mb-4 mb-md-0">
            <div class="shadow rounded p-4 bg-light h-100">
                <h4 class="mb-4 d-flex justify-content-between align-items-center">
                    <span class="text-brown">Order Summary</span>
                    <span class="badge bg-brown rounded-pill">{{ $carts->sum('quantity') }}</span>
                </h4>
                @php $totalPrice = 0; @endphp
                
                @if(count($carts) > 0)
                <ul class="list-group mb-3">
                    @foreach($carts as $item)
                    @php 
                        $cleanPrice = str_replace(['$', ','], '', $item->product_price ?? '0');
                        $itemTotal = floatval($cleanPrice) * ($item->quantity ?? 1);
                        $totalPrice += $itemTotal; 
                    @endphp
                    <li class="list-group-item d-flex justify-content-between lh-sm p-3 position-relative border-0 shadow-sm mb-3 rounded">
                        <div class="d-flex align-items-center">
                            @if($item->product_photo)
                            <img src="{{ $item->product_photo }}" class="img-thumbnail me-3" style="width: 80px; height: 80px; object-fit: cover; border-radius: 12px;">
                            @endif
                            <div>
                                <h6 class="my-0 fw-bold fs-5">{{ $item->product_name }}</h6>
                                <small class="text-muted d-block mb-1">{{ $item->description }}</small>
                                <span class="fw-bold fs-6" style="color: var(--primary-pink);">${{ number_format(floatval($cleanPrice), 2) }}</span>
                            </div>
                        </div>
                        
                        <div class="d-flex flex-column align-items-end justify-content-between">
                            <form action="/cart/remove" method="POST" class="m-0">
                                @csrf
                                <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-sm text-muted border-0 bg-transparent p-0" title="Remove"><i class="bi bi-x fs-4"></i></button>
                            </form>

                            <div class="d-flex align-items-center mt-3 bg-light rounded" style="overflow: hidden; border: 1px solid #eee;">
                                <form action="/cart/update-quantity" method="POST" class="m-0">
                                    @csrf
                                    <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                    <input type="hidden" name="action" value="decrease">
                                    <button type="submit" class="btn btn-sm py-1 px-3 border-0" style="background-color: #f1c40f; color: white; border-radius: 0;"><i class="bi bi-dash-lg"></i></button>
                                </form>
                                <span class="px-3 fw-bold bg-white h-100 d-flex align-items-center" style="min-width: 40px; justify-content: center;">{{ $item->quantity }}</span>
                                <form action="/cart/update-quantity" method="POST" class="m-0">
                                    @csrf
                                    <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                    <input type="hidden" name="action" value="increase">
                                    <button type="submit" class="btn btn-sm py-1 px-3 border-0" style="background-color: #f1c40f; color: white; border-radius: 0;"><i class="bi bi-plus-lg"></i></button>
                                </form>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between p-3 bg-white fw-bold border-0 mt-2 shadow-sm rounded">
                        <span class="fs-5">Total (USD)</span>
                        <span class="fs-5 text-brown">${{ number_format($totalPrice, 2) }}</span>
                    </li>
                </ul>
                @else
                <div class="text-center py-5">
                    <i class="bi bi-cart-x fs-1 text-muted"></i>
                    <p class="mt-3 text-muted">Your cart is completely empty.</p>
                    <a href="/home" class="btn btn-outline-brown theme-btn mt-2">Browse Store</a>
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
                                <i class="bi bi-truck fs-4 text-brown"></i>
                                <span class="fw-bold">Cash on Delivery</span>
                            </label>
                        </div>
                    </div>

                    <hr class="my-4">
                    
                    <button type="submit" class="btn btn-brown theme-btn w-100 py-3 fs-5 fw-bold" @if(count($carts) == 0) disabled @endif>
                        <i class="bi bi-shield-lock-fill me-2"></i> Place Order (${{ number_format($totalPrice, 2) }})
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
