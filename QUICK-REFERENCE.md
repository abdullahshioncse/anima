# Anima Theme - Quick Reference

## Theme Structure Overview

```
anima/
├── admin/                          # Admin panel files
│   ├── controller/theme/          # Theme controller
│   ├── language/en-gb/theme/      # Language files
│   └── view/                      # Admin templates & images
├── catalog/                        # Front-end files
│   ├── controller/startup/        # Startup controller
│   └── view/
│       ├── fonts/                 # Theme fonts
│       ├── image/                 # Theme images
│       ├── javascript/            # Theme JS
│       ├── stylesheet/            # Theme CSS
│       └── template/              # Twig templates
├── system/                         # System extensions
│   ├── helper/                    # Helper functions
│   └── library/                   # Library classes
├── install.json                    # Theme metadata
└── [Documentation files]
```

## Key Files

### Admin
- `admin/controller/theme/theme_anima.php` - Admin controller
- `admin/view/template/theme/theme_anima.twig` - Admin settings page

### Catalog
- `catalog/controller/startup/theme_anima.php` - Asset loader
- `catalog/view/javascript/anima.js` - Cart/wishlist functions

### Templates (Twig)
```
catalog/view/template/
├── account/
│   ├── login.twig              # Login page
│   └── register.twig           # Registration page
├── checkout/
│   └── cart.twig               # Shopping cart
├── common/
│   ├── header.twig             # Site header
│   ├── footer.twig             # Site footer
│   └── home.twig               # Homepage
├── information/
│   ├── contact.twig            # Contact form
│   └── information.twig        # Info pages
└── product/
    ├── category.twig           # Category listing
    ├── product.twig            # Product detail
    └── search.twig             # Search results
```

## Common Variables (Twig)

### Header Template
```twig
{{ heading_title }}         - Page title
{{ name }}                  - Store name
{{ telephone }}             - Store phone
{{ categories }}            - Navigation categories
{{ home }}                  - Home URL
{{ account }}               - Account URL
{{ shopping_cart }}         - Cart URL
{{ wishlist }}              - Wishlist URL
{{ search }}                - Search URL
```

### Product Variables
```twig
{{ product.product_id }}    - Product ID
{{ product.name }}          - Product name
{{ product.price }}         - Product price
{{ product.special }}       - Special price
{{ product.thumb }}         - Thumbnail image
{{ product.href }}          - Product URL
{{ product.model }}         - Product model
```

### Category Variables
```twig
{{ heading_title }}         - Category name
{{ products }}              - Product array
{{ categories }}            - Sub-categories
{{ pagination }}            - Pagination HTML
{{ product_total }}         - Total products
```

## CSS Classes

### Layout
- `.screen` - Main container
- `.container` - Content wrapper
- `.header` - Header section
- `.footer` - Footer section

### Typography
- `.poppins-semi-bold-eerie-black-40px` - Large headings
- `.poppins-semi-bold-eerie-black-24px` - Section headings
- `.poppins-medium-eerie-black-16px` - Body text
- `.poppins-normal-eerie-black-12px` - Small text

### Components
- `.card` - Product card
- `.button` - Action button
- `.navbar` - Navigation bar
- `.menu-1` - Icon menu
- `.info-2` - Info bar

### Colors (CSS Variables)
```css
--a4a4a4     /* Grey */
--black      /* Black */
--d7d7d7     /* Light grey */
--ececec     /* Very light grey */
--ff7c17     /* Orange */
--ffffff     /* White */
--x1c1c1c    /* Dark grey */
```

## JavaScript Functions

### Cart Operations
```javascript
cart.add(product_id, quantity)      // Add to cart
cart.remove(key)                    // Remove from cart
cart.update(key, quantity)          // Update quantity
```

### Wishlist Operations
```javascript
wishlist.add(product_id)            // Add to wishlist
wishlist.remove(product_id)         // Remove from wishlist
```

### Compare Operations
```javascript
compare.add(product_id)             // Add to compare
```

## Customization Quick Tips

### Change Colors
Edit `catalog/view/stylesheet/styleguide.css`:
```css
:root {
  --ff7c17: #YOUR_COLOR;
}
```

### Change Fonts
Edit `catalog/view/stylesheet/globals.css`:
```css
@import url("https://fonts.googleapis.com/css?family=YOUR_FONT");
```

### Modify Layout
Edit respective template in:
`catalog/view/template/[section]/[template].twig`

### Add Custom CSS
Add to `catalog/view/stylesheet/desktop-1.css` (or appropriate file)

### Add Custom JavaScript
Add to `catalog/view/javascript/anima.js`

## Route Mapping

| Route | Template | CSS File |
|-------|----------|----------|
| `common/home` | `common/home.twig` | `desktop-1.css` |
| `product/category` | `product/category.twig` | `desktop-2.css` |
| `product/product` | `product/product.twig` | `desktop-2.css` |
| `information/*` | `information/*.twig` | `desktop-4.css` |

## RTL Support

Theme automatically supports RTL (Right-to-Left) for Arabic:
- Set language direction in OpenCart admin
- All layouts auto-adjust
- Text alignment reverses
- Navigation flows right-to-left

## Responsive Breakpoints

```css
/* Mobile */
@media (max-width: 768px) { }

/* Tablet */
@media (min-width: 769px) and (max-width: 1024px) { }

/* Desktop */
@media (min-width: 1025px) { }
```

## Common Tasks

### Enable Theme
1. Admin → Extensions → Extensions
2. Select "Themes" 
3. Install "Anima Theme"
4. System → Settings → Store Tab
5. Select "Anima Theme"

### Clear Cache
```
Admin → System → Maintenance → Clear Cache
```
Or delete: `system/storage/cache/*`

### Debug Mode
In `config.php` and `admin/config.php`:
```php
define('ERROR_DISPLAY', '1');
```

### Check Logs
View: `system/storage/logs/error.log`

## File Permissions

### Linux/Unix
```bash
find . -type f -exec chmod 644 {} \;
find . -type d -exec chmod 755 {} \;
```

### Required Permissions
- Files: 644 (rw-r--r--)
- Directories: 755 (rwxr-xr-x)

## Browser Dev Tools

### Inspect Elements
- Chrome/Firefox: F12
- Safari: Cmd+Option+I
- Edge: F12

### Console Commands
```javascript
// Debug cart
console.log(cart);

// Test add to cart
cart.add('42', 1);

// Check loaded scripts
console.log(document.scripts);
```

## Version Info

- **Theme Version**: 1.0.0
- **OpenCart Version**: 4.0.1.3+
- **PHP Version**: 7.4+
- **Twig Version**: 3.x

## Support Resources

- **Documentation**: See README.md
- **Installation**: See INSTALLATION.md
- **Changelog**: See CHANGELOG.md
- **Deployment**: See DEPLOYMENT.md

## Quick Links

- OpenCart Docs: https://docs.opencart.com/
- Twig Docs: https://twig.symfony.com/
- GitHub Repo: https://github.com/abdullahshioncse/anima

---

**Author**: Abdullah Shion  
**Version**: 1.0.0  
**Updated**: December 2024
