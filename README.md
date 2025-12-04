# Anima Theme for OpenCart 4.0.1.3

A modern, responsive e-commerce theme for OpenCart with full RTL (Arabic) support. This theme features a clean design, intuitive navigation, and mobile-first approach.

## Features

- ✅ Full OpenCart 4.0.1.3 compatibility
- ✅ RTL (Right-to-Left) language support for Arabic
- ✅ Responsive design for all devices
- ✅ Clean and modern UI
- ✅ Product grid and list views
- ✅ Category navigation
- ✅ Shopping cart integration
- ✅ Wishlist functionality
- ✅ User account pages
- ✅ Newsletter subscription
- ✅ Multiple payment method icons

## Directory Structure

```
anima/
├── admin/
│   ├── controller/theme/theme_anima.php
│   ├── language/en-gb/theme/theme_anima.php
│   ├── view/
│   │   ├── image/theme_anima.png
│   │   └── template/theme/theme_anima.twig
├── catalog/
│   ├── controller/startup/theme_anima.php
│   ├── view/
│   │   ├── fonts/PlusJakartaDisplay-Medium.ttf
│   │   ├── image/          (all theme images)
│   │   ├── javascript/anima.js
│   │   ├── stylesheet/     (all CSS files)
│   │   └── template/
│   │       ├── account/
│   │       │   ├── login.twig
│   │       │   └── register.twig
│   │       ├── common/
│   │       │   ├── header.twig
│   │       │   ├── footer.twig
│   │       │   └── home.twig
│   │       └── product/
│   │           ├── category.twig
│   │           └── product.twig
├── system/
│   ├── helper/
│   └── library/
└── install.json
```

## Installation

1. **Upload Theme Files**
   - Upload all files to your OpenCart installation directory
   - Ensure file permissions are set correctly (644 for files, 755 for directories)

2. **Enable the Theme**
   - Log in to your OpenCart admin panel
   - Navigate to Extensions → Extensions
   - Select "Themes" from the extension type dropdown
   - Find "Anima Theme" in the list
   - Click the green "+" button to install
   - Click the edit button to configure theme settings

3. **Set as Default Theme**
   - Go to System → Settings
   - Click Edit on your store
   - Go to the "Store" tab
   - Select "Anima Theme" from the Theme dropdown
   - Save your changes

## Theme Customization

### Admin Panel Settings

Access theme settings from: Extensions → Extensions → Themes → Anima Theme

Available settings:
- Theme status (Enable/Disable)
- Additional configuration options

### CSS Customization

CSS files are located in `catalog/view/stylesheet/`:
- `globals.css` - Global styles and font definitions
- `styleguide.css` - Design system variables and common classes
- `desktop-1.css` - Homepage styles
- `desktop-2.css` - Category and product listing styles
- `desktop-3.css` - Footer and additional page styles
- `desktop-4.css` - Policy and information pages
- `iphone-13-u38-14-*.css` - Mobile responsive styles

### RTL Support

The theme includes full RTL (Right-to-Left) support for Arabic language:
- Navigation direction is reversed
- Text alignment is right-aligned
- Layout flows from right to left
- All UI elements are mirrored appropriately

### Mobile Responsive

The theme automatically loads mobile-specific CSS for devices:
- Responsive breakpoints
- Touch-friendly interface
- Optimized images
- Mobile navigation

## Page Templates

### Homepage (`common/home.twig`)
- Hero banner section
- Featured products carousel
- New arrivals section
- Category navigation
- Newsletter subscription

### Category Page (`product/category.twig`)
- Product grid layout
- Category filtering
- Product count display
- Pagination
- Sort options

### Product Page (`product/product.twig`)
- Image gallery with thumbnails
- Product details
- Price display with special pricing
- Add to cart functionality
- Quantity selector
- Product options (size, color, etc.)
- Related products

### Account Pages
- Login page (`account/login.twig`)
- Registration page (`account/register.twig`)

## Assets

### Fonts
- Plus Jakarta Display Medium
- Poppins (Light, Normal, Medium, Semi-Bold, Bold)

### Icons
- Iconly Sharp icon set (SVG)
- Payment method icons (Visa, Mastercard, Apple Pay)

### Images
- Product placeholders
- UI elements and decorative graphics
- Banner images

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Technical Details

### OpenCart Version
- Designed for OpenCart 4.0.1.3
- Follows OpenCart theme structure standards
- Uses Twig templating engine

### Dependencies
- jQuery (included with OpenCart)
- OpenCart core JavaScript libraries

### JavaScript Functionality
- Cart operations (add, remove, update)
- Wishlist management
- Product comparison
- Image gallery navigation

## Support

For issues or questions about this theme:
- Author: Abdullah Shion
- Repository: [abdullahshioncse/anima](https://github.com/abdullahshioncse/anima)

## License

This theme is provided as-is for use with OpenCart stores.

## Changelog

### Version 1.0.0 (Initial Release)
- OpenCart 4.0.1.3 theme structure implementation
- Full RTL Arabic support
- Responsive design for all devices
- Core page templates (home, category, product, account)
- Shopping cart and wishlist integration
- Admin theme settings panel
