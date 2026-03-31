<?php

$filePath = "c:\\Users\\suchi\\Downloads\\LaravelProjects\\skincare\\resources\\views\\home.blade.php";
$content = file_get_contents($filePath);

// Find each product block and inject triggerWishlist
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
    
    // Replace wishlist link
    $search = '<a href="/wishlist" class="btn btn-primary theme-btn"><i class="bi bi-heart"></i>
                                        Wishlist</a>';
    
    // Since whitespace might vary, let's use a regex to replace the a tag
    $newBlock = preg_replace(
        '/<a href="\/wishlist" class="btn btn-primary theme-btn"><i class="bi bi-heart"><\/i>\s*Wishlist<\/a>/s',
        '<a href="#" onclick="event.preventDefault(); triggerWishlist(\''.addslashes($name).'\', \''.addslashes($photo).'\', \''.addslashes($desc).'\')" class="btn btn-primary theme-btn"><i class="bi bi-heart"></i> Wishlist</a>',
        $block
    );
    
    return $newBlock;
}, $content);

// Add the JS logic
$jsLogic = <<<HTML

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

@endsection
HTML;

$content = str_replace('@endsection', $jsLogic, $content);

file_put_contents($filePath, $content);
echo "Replaced occurrences.\n";
