<?php

$products = [
    ['name' => 'Moisturizer', 'photo' => '/images/image.png', 'description' => 'Rice water with Niacinamide', 'price' => '$25', 'star' => '⭐⭐⭐⭐', 'review' => 'Great product'],
    ['name' => 'Hyaluronic Serum', 'photo' => '/images/image copy.png', 'description' => 'dewy and plumpy skin', 'price' => '$30', 'star' => '⭐⭐⭐⭐⭐', 'review' => 'Very hydrating'],
    ['name' => 'Sunscreen', 'photo' => '/images/image copy 2.png', 'description' => 'spf50 and pa++++', 'price' => '$20', 'star' => '⭐⭐⭐⭐', 'review' => 'No white cast'],
    ['name' => 'Oil cleanser', 'photo' => '/images/25.avif', 'description' => 'lightweight and non-comodegenic', 'price' => '$22', 'star' => '⭐⭐⭐⭐⭐', 'review' => 'Removes all makeup'],
    ['name' => 'Eye cream', 'photo' => '/images/1.png', 'description' => 'reduce puffiness and dark circle', 'price' => '$18', 'star' => '⭐⭐⭐⭐', 'review' => 'Works well'],
    ['name' => 'Sunscreen', 'photo' => '/images/8.jpg', 'description' => 'gel based spf50', 'price' => '$25', 'star' => '⭐⭐⭐⭐⭐', 'review' => 'Loving the texture'],
    ['name' => 'Retinal serum', 'photo' => '/images/2.png', 'description' => 'for anti-aging and brightening', 'price' => '$40', 'star' => '⭐⭐⭐⭐⭐', 'review' => 'Glowy skin']
];

foreach ($products as $p) {
    if (!\App\Models\Product::where('name', $p['name'])->where('description', $p['description'])->exists()) {
        $m = new \App\Models\Product;
        $m->name = $p['name'];
        $m->photo = $p['photo'];
        $m->description = $p['description'];
        $m->price = $p['price'];
        $m->star = $p['star'];
        $m->review = $p['review'];
        $m->save();
    }
}
echo 'Products added!';
