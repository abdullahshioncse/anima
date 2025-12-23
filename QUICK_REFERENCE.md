# Anima Theme - Quick Reference

## File Structure Overview

```
extension/anima/
├── install.json                                    # Extension manifest
│
├── admin/                                          # Admin Panel Files
│   ├── controller/theme/anima.php                 # Theme settings controller
│   ├── language/en-gb/theme/anima.php            # Admin language file
│   └── view/template/theme/anima.twig            # Admin settings template
│
└── catalog/                                        # Frontend Files
    ├── controller/startup/anima.php               # Theme initialization
    │
    ├── language/                                   # Language Files
    │   ├── en-gb/theme/anima.php                 # English translations
    │   └── ar-ar/theme/anima.php                 # Arabic translations
    │
    └── view/
        ├── template/                               # Twig Templates
        │   ├── common/
        │   │   ├── header.twig                   # Site header with navigation
        │   │   ├── footer.twig                   # Site footer with newsletter
        │   │   ├── home.twig                     # Homepage template
        │   │   ├── menu.twig                     # Navigation menu
        │   │   └── search.twig                   # Search page
        │   ├── product/
        │   │   ├── category.twig                 # Product listing/category
        │   │   ├── product.twig                  # Product detail page
        │   │   └── search.twig                   # Search results
        │   ├── information/
        │   │   └── information.twig              # Static info pages
        │   ├── account/
        │   │   ├── account.twig                  # Account dashboard
        │   │   ├── login.twig                    # Login page
        │   │   ├── register.twig                 # Registration page
        │   │   └── wishlist.twig                 # Wishlist page
        │   └── checkout/
        │       ├── cart.twig                     # Shopping cart
        │       └── checkout.twig                 # Checkout page
        │
        ├── stylesheet/                            # CSS Files
        │   ├── globals.css                       # Global styles & reset
        │   ├── styleguide.css                    # Typography & colors
        │   ├── desktop-1.css                     # Homepage desktop styles
        │   ├── desktop-2.css                     # Category desktop styles
        │   ├── desktop-3.css                     # Product desktop styles
        │   ├── desktop-4.css                     # Info pages desktop styles
        │   ├── iphone-13-u38-14-1.css           # Mobile homepage styles
        │   ├── iphone-13-u38-14-4.css           # Mobile product styles
        │   ├── iphone-13-u38-14-5.css           # Mobile account styles
        │   ├── iphone-13-u38-14-6.css           # Mobile cart styles
        │   └── fonts/
        │       └── PlusJakartaDisplay-Medium.ttf # Custom font
        │
        └── image/                                 # All Images (169 files)
            ├── iconly-sharp-*.svg                # Icon files
            ├── rectangle-*.png                   # Banner images
            ├── visa-logo-*.svg                   # Payment icons
            ├── mastercard-*.png                  # Payment icons
            └── applepay-*.svg                    # Payment icons
```

## Key Templates and Their Purpose

### Homepage Components
- **Hero Banner**: Large image banner with call-to-action buttons
- **Info Section**: 3 benefits (24h delivery, returns, authentic)
- **You May Like**: Featured products carousel
- **New In**: Latest products with category tabs

### Header Components
- Logo (customizable)
- Contact phone number (configurable)
- Search icon
- Wishlist icon
- Cart icon
- Account/Profile icon
- Navigation menu (4 categories)

### Footer Components
- Newsletter subscription form
- Payment method icons (Visa, Mastercard, Apple Pay)
- Three columns of links:
  - Shop Now (categories)
  - Contact Us (policies)
  - Quick Links (account, help)
- Copyright year (dynamic)

## Template Variables Reference

### Common Variables (Available in Most Templates)

```twig
{{ header }}                    # Include header
{{ footer }}                    # Include footer
{{ heading_title }}             # Page title
{{ text_* }}                    # Language strings
{{ base }}                      # Base URL
{{ home }}                      # Home page URL
{{ account }}                   # Account URL
{{ cart }}                      # Cart URL
{{ wishlist }}                  # Wishlist URL
{{ search }}                    # Search URL
{{ logo }}                      # Logo image URL
```

### Homepage Specific

```twig
{{ products_featured }}         # Featured products array
{{ products_latest }}           # Latest products array
{{ config_anima_telephone }}    # Phone from settings
{{ config_anima_sale_banner }}  # Sale banner text
{{ config_anima_newsletter_text }} # Newsletter text
```

### Product Variables

```twig
{{ product.name }}              # Product name
{{ product.price }}             # Product price
{{ product.special }}           # Sale price (if any)
{{ product.thumb }}             # Product thumbnail
{{ product.href }}              # Product detail URL
{{ product.model }}             # Product code/SKU
{{ product.product_id }}        # Product ID
```

### Category/Listing Variables

```twig
{{ products }}                  # Array of products
{{ product_count }}             # Total products found
{{ pagination }}                # Pagination HTML
```

### Cart Variables

```twig
{{ products }}                  # Cart items array
{{ totals }}                    # Cart totals array
{{ checkout }}                  # Checkout URL
{{ continue }}                  # Continue shopping URL
```

## CSS Class Reference

### Common Classes

```css
.screen                         # Page wrapper
.header                         # Header section
.footer                         # Footer section
.navbar                         # Navigation bar
.navbar-link-text               # Navigation links
.logo                           # Logo container
.menu-1                         # Header menu/icons
.sale                           # Sale banner
```

### Product Card Classes

```css
.card                           # Product card wrapper
.info, .info-1, .info-3         # Product info containers
.image                          # Product image container
.button-1, .button-2            # Add to cart buttons
.x5000-kd                       # Price display
.phone                          # Product code/SKU
```

### Typography Classes

```css
.poppins-semi-bold-white-16px   # Poppins, semi-bold, white, 16px
.poppins-medium-eerie-black-12px # Poppins, medium, black, 12px
.poppins-normal-white-12px      # Poppins, normal, white, 12px
.poppins-bold-white-18px        # Poppins, bold, white, 18px
```

### Layout Classes

```css
.desktop-1, .desktop-2, etc.    # Desktop page styles
.iphone-13-u38-14-1, etc.       # Mobile page styles
```

## Admin Configuration Fields

### Theme Settings (Admin Panel)

```
Status                          # Enable/Disable theme
Contact Phone Number            # Header phone (default: 965-22091914)
Sale Banner Text               # Top banner (default: حصل على خصم 20٪...)
Newsletter Text                # Footer newsletter (default: هل ترغب...)
```

## Language Strings

### English (en-gb)
```php
$_['text_shop_now']            # "Shop Now"
$_['text_add_to_cart']         # "Add to Cart"
$_['text_you_may_like']        # "You May Like"
$_['text_new_in']              # "New In"
```

### Arabic (ar-ar)
```php
$_['text_shop_now']            # "تسوّق الآن"
$_['text_add_to_cart']         # "أضف إلى السلة"
$_['text_you_may_like']        # "منتجات قد تعجبك"
$_['text_new_in']              # "وصل حديثًا"
```

## Image Assets

### Icons (SVG)
- `iconly-sharp-*.svg` - All UI icons (170+ icons)
- Profile, cart, wishlist, search, call, heart, etc.

### Banners
- `rectangle-5-1.png` - Desktop hero banner
- `rectangle-5@2x.png` - Mobile hero banner
- `rectangle-116*.png` - Various UI elements

### Payment Icons
- `visa-logo-1.svg` - Visa logo
- `mastercard-1@2x.png` - Mastercard logo
- `applepay-1.svg` - Apple Pay logo

## Quick Commands

### Create Installation Package
```bash
cd extension
zip -r anima-theme-1.0.0.zip anima/
```

### Check File Counts
```bash
# CSS files
ls -1 extension/anima/catalog/view/stylesheet/*.css | wc -l
# Expected: 10

# Images
ls -1 extension/anima/catalog/view/image/ | wc -l
# Expected: 169

# Templates
find extension/anima/catalog/view/template -name '*.twig' | wc -l
# Expected: 14
```

### Clear Cache
```bash
rm -rf system/storage/cache/*
```

### Set Permissions
```bash
chmod -R 755 extension/anima/
chown -R www-data:www-data extension/anima/
```

## Integration Points

### OpenCart Modules to Configure

1. **Featured Products Module**
   - Displays in "You May Like" section
   - Configure at: Extensions → Modules → Featured

2. **Latest Products Module**
   - Displays in "New In" section
   - Configure at: Extensions → Modules → Latest

3. **Newsletter Module**
   - Footer subscription form
   - Configure at: Extensions → Modules → Newsletter

### Required OpenCart Settings

1. **Store Settings**
   - System → Settings → Edit Store
   - Set theme to "Anima"
   - Upload logo in Image section

2. **Language Settings**
   - System → Localisation → Languages
   - Configure English and Arabic

3. **Categories**
   - Create main categories:
     - Men's Clothing (ملابس رجالية)
     - Women's Clothing (ملابس نسائية)
     - Accessories (إكسسوارات)
     - Sale (تخفيضات)

## Responsive Breakpoints

The theme uses viewport width (vw) units for responsive design:

- **Desktop**: 1440px and above
- **Tablet**: 768px - 1439px
- **Mobile**: Below 768px

CSS files handle responsiveness:
- Desktop: `desktop-*.css`
- Mobile: `iphone-13-u38-14-*.css`

## RTL/Arabic Support

### Automatic RTL Detection
- Theme detects language direction from OpenCart settings
- When Arabic is selected, layout automatically switches to RTL

### RTL-Specific Classes
```css
direction: rtl;                 # Applied to elements with Arabic text
```

### Arabic Font
- Uses Poppins font (supports Arabic)
- Plus Jakarta Display for special elements

## Performance Tips

1. **Image Optimization**
   - Compress all images before upload
   - Use appropriate sizes (no oversized images)

2. **CSS Loading**
   - All CSS loaded in header
   - Consider combining files for production

3. **Caching**
   - Enable OpenCart cache in settings
   - Use browser caching headers

4. **CDN**
   - Consider using CDN for static assets
   - Update paths in templates if using CDN

## Common Modifications

### Change Colors
Edit `globals.css` and `styleguide.css`:
```css
--ffffff: #ffffff;              # White
--x1c1c1c: #1c1c1c;            # Dark background
```

### Change Fonts
Edit `globals.css`:
```css
@import url("https://fonts.googleapis.com/css?family=Poppins:500,400,700,600");
```

### Modify Layout
Edit relevant `.twig` templates in:
```
extension/anima/catalog/view/template/
```

### Add Custom JavaScript
Add in footer.twig before `</body>`:
```twig
<script src="catalog/view/theme/extension/anima/javascript/custom.js"></script>
```

## Troubleshooting Quick Fixes

### CSS not loading
```bash
# Clear cache
rm -rf system/storage/cache/*
# Check permissions
chmod -R 755 extension/anima/catalog/view/stylesheet/
```

### Images not showing
```bash
# Check permissions
chmod -R 755 extension/anima/catalog/view/image/
```

### Theme not in list
```bash
# Verify install.json exists
cat extension/anima/install.json
```

### Products not showing
- Install Featured Products module
- Install Latest Products module
- Ensure products are enabled

---

**Version**: 1.0.0  
**Last Updated**: December 2024  
**Author**: Abdullah Shion
