@extends('main')
{{-- @foreach ($products as $product) --}}
    <div class="col-md-3">

        <div class="card product-card p-3">
            <img src="{{ $product->photo }}" class="card-img-top" alt="Glow Serum"
                style="width: 100%;  aspect-ratio:2/2; object-fit:cover">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text text-muted">{{ $product->description }}</p>
                <p class="fw-bold">{{ $product->price }}</p>
                <div class="stars mb-2">{{ $product->star }}</div>
                <p class="review">{{ $product->review }}</p>
            </div>
        </div>
    </div>
{{-- @endforeach --}}
