<?php

$filePath = "c:\\Users\\suchi\\Downloads\\LaravelProjects\\skincare\\resources\\views\\home.blade.php";
$content = file_get_contents($filePath);

// Find each product block and inject triggerCart
$content = preg_replace_callback('/<div class="col-12 shadow rounded p-0 product-card.*?<\/div>\s*<\/div>\s*<\/div>/s', function($matches) {
    $block = $matches[0];
    
    // Extract name
    preg_match('/<h4[^>]*>\s*(.*?)\s*<\/h4>/s', $block, $nameMatch);
    $name = isset($nameMatch[1]) ? trim(preg_replace('/\s+/', ' ', $nameMatch[1])) : '';
    
    // Extract photo
    preg_match('/src="(.*?)"/s', $block, $photoMatch);
    $photo = isset($photoMatch[1]) ? trim($photoMatch[1]) : '';
    
    // Extract description
    preg_match('/<p[^>]*>\s*(.*?)\s*<\/p>/s', $block, $descMatch);
    $desc = isset($descMatch[1]) ? trim(preg_replace('/\s+/', ' ', $descMatch[1])) : '';
    
    // Replace checkout link
    $newBlock = preg_replace(
        '/<a href="\/checkout" class="btn btn-primary theme-btn"><i class="bi bi-bag"><\/i>\s*Checkout<\/a>/s',
        '<a href="#" onclick="event.preventDefault(); triggerCart(\''.addslashes($name).'\', \''.addslashes($photo).'\', \''.addslashes($desc).'\')" class="btn btn-primary theme-btn"><i class="bi bi-bag"></i> Checkout</a>',
        $block
    );
    
    return $newBlock;
}, $content);

// Add the JS logic
$jsLogic = <<<HTML

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
HTML;

$content = str_replace('@endsection', $jsLogic, $content);

file_put_contents($filePath, $content);

// Update wishlist.blade.php checkout buttons as well
$wishlistPath = "c:\\Users\\suchi\\Downloads\\LaravelProjects\\skincare\\resources\\views\\wishlist.blade.php";
$wcontent = file_get_contents($wishlistPath);

$wcontent = preg_replace(
    '/<a href="\/checkout" class="btn btn-primary theme-btn w-100 mb-2"><i class="bi bi-bag"><\/i> Checkout<\/a>/s',
    '<a href="#" onclick="event.preventDefault(); triggerCart(\'{{ $item->product_name }}\', \'{{ $item->product_photo }}\', \'{{ $item->description }}\')" class="btn btn-primary theme-btn w-100 mb-2"><i class="bi bi-bag"></i> Checkout</a>',
    $wcontent
);

$wcontent = str_replace('@endsection', $jsLogic, $wcontent);
file_put_contents($wishlistPath, $wcontent);

echo "Replaced occurrences.\n";
