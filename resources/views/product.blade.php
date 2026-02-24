@extends('main')


@section('content')
    <section class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold font-family-sans-serif">Our Products</h2>
            <p class="text-muted">Trusted skincare made with love by Anease</p>
        </div>

        <div class="row g-4">
            <!-- Product 1 -->
            <form action="/product/save" method="post">
                @csrf
                <div class=" col-lg-4 d-flex flex-column gap-2">
                    <input type="text" name="photo" placeholder="photo">
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="description" placeholder="Description">
                    <input type="text" name="price" placeholder="price">
                    <input type="text" name="star" placeholder="Star">
                    <input type="text" name="review" placeholder="Review">


                    <div class="col-md-2 ">
                        <button class=" btn btn-danger" type="submit">Submit</button>
                    </div>
                </div>

            </form>
            @foreach ($products as $product)
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
            @endforeach
            
        </div>
    </section>
@endsection
