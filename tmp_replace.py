import re

file_path = "c:\\Users\\suchi\\Downloads\\LaravelProjects\\skincare\\resources\\views\\home.blade.php"

with open(file_path, 'r', encoding='utf-8') as f:
    content = f.read()

# I need to find each product card and replace the wishlist button
# A product card starts with `product-card` and contains an img with src, an h4 with name, and a p with desc.

def replace_card(match):
    block = match.group(0)
    
    # Extract details
    src_match = re.search(r'src="(.*?)"', block)
    photo = src_match.group(1) if src_match else ''
    
    name_match = re.search(r'<h4[^>]*>\s*(.*?)\s*</h4>', block, re.DOTALL)
    name = re.sub(r'\s+', ' ', name_match.group(1)).strip() if name_match else ''
    
    desc_match = re.search(r'<p[^>]*>\s*(.*?)\s*</p>', block, re.DOTALL)
    desc = re.sub(r'\s+', ' ', desc_match.group(1)).strip() if desc_match else ''
    
    # Replace the Wishlist link with the dynamic JS call
    # Find: <a href="/wishlist" class="btn btn-primary theme-btn"><i class="bi bi-heart"></i>\s*Wishlist</a>
    # Replace: <a href="#" onclick="event.preventDefault(); triggerWishlist('{name}', '{photo}', '{desc}')" class="btn btn-primary theme-btn"><i class="bi bi-heart"></i> Wishlist</a>

    new_link = f'<a href="#" onclick="event.preventDefault(); triggerWishlist(\'{name}\', \'{photo}\', \'{desc}\')" class="btn btn-primary theme-btn"><i class="bi bi-heart"></i> Wishlist</a>'
    
    new_block = re.sub(r'<a href="/wishlist" class="btn btn-primary theme-btn"><i class="bi bi-heart"></i>\s*Wishlist</a>', new_link, block)
    
    return new_block

# Find all blocks from `<div class="col-12 shadow rounded p-0 product-card` to `</div>\s*</div>\s*</div>` loosely
new_content = re.sub(r'<div class="col-12 shadow rounded p-0 product-card.*?(?:<a href="/checkout".*?</a>\s*<a href="/wishlist".*?</a>\s*</div>\s*</div>\s*</div>)', replace_card, content, flags=re.DOTALL)

# Add the JS logic at the end before </body> or inside @endsection if extending
js_logic = """
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
"""

new_content = new_content.replace("@endsection", js_logic + "\n@endsection")

with open(file_path, 'w', encoding='utf-8') as f:
    f.write(new_content)

print(f"Replaced {len(re.findall('triggerWishlist', new_content))} occurrences.")
