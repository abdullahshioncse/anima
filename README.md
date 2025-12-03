# Anima Theme for OpenCart 4.1.0.3

A modern, responsive e-commerce theme with full Arabic RTL (Right-to-Left) support, converted from Anima design tool mockups into a fully functional OpenCart 4.1.0.3 compatible theme.

## Features

- ✅ **OpenCart 4.1.0.3 Compatible** - Built specifically for OpenCart 4.x
- ✅ **Arabic RTL Support** - Full right-to-left layout support for Arabic language
- ✅ **Responsive Design** - Mobile-first approach, works on all devices
- ✅ **Modern UI/UX** - Clean, contemporary design with Poppins font
- ✅ **Product Showcase** - Beautiful product cards with hover effects
- ✅ **Info Bar** - Prominent top information bar for shipping, returns, and authenticity
- ✅ **Newsletter Integration** - Built-in newsletter subscription form
- ✅ **Payment Icons** - Display for Visa, Mastercard, Apple Pay
- ✅ **Multi-language** - English and Arabic language support
- ✅ **SEO Friendly** - Proper semantic HTML structure
- ✅ **AJAX Cart** - Add to cart without page reload

## Design Elements

### Color Scheme
- **Primary Color**: `#1c1c1c` (Black)
- **Secondary/Accent**: `#ff7c17` (Orange)
- **Background**: `#ffffff` (White)
- **Text**: `#1c1c1c` (Black)
- **Light Text**: `#a4a4a4` (Gray)

### Typography
- **Font Family**: Poppins (Google Fonts)
- **Weights**: 400 (Regular), 500 (Medium), 600 (Semi-Bold), 700 (Bold)

## Installation

### Method 1: Extension Installer (Recommended)

1. **Compress the extension folder** into a ZIP file:
   ```bash
   cd extension
   zip -r anima.ocmod.zip anima/
   ```

2. **Upload via OpenCart Admin**:
   - Go to `Extensions > Installer`
   - Click "Upload" and select `anima.ocmod.zip`
   - Wait for upload to complete

3. **Install the theme**:
   - Go to `Extensions > Extensions`
   - Choose extension type: `Themes`
   - Find "Anima Theme" and click "Install" (green plus icon)

4. **Activate the theme**:
   - Go to `Design > Themes`
   - Set Anima as default theme
   - Clear cache if needed

### Method 2: Manual Installation

1. **Copy extension files** to OpenCart root:
   ```bash
   cp -r extension/anima /path/to/opencart/extension/
   ```

2. **Set permissions**:
   ```bash
   chmod -R 755 /path/to/opencart/extension/anima
   ```

3. **Install via Admin Panel** (same as steps 3-4 above)

## Configuration

### Admin Settings

Navigate to `Extensions > Extensions > Themes > Anima Theme` to configure:

#### General Settings
- **Status**: Enable/Disable theme
- **Product Limit**: Default products per page (default: 15)
- **Description Length**: Product description character limit in listings (default: 100)

#### Image Dimensions
Configure image sizes for different areas:
- **Category Image**: 80x80px
- **Product Thumb**: 228x228px
- **Product Popup**: 500x500px
- **Product List**: 228x228px
- **Additional Images**: 74x74px
- **Related Products**: 200x200px
- **Compare**: 90x90px
- **Wishlist**: 47x47px
- **Cart**: 47x47px
- **Store Location**: 268x50px

### Theme Customization

#### Modifying Colors

Edit `extension/anima/catalog/view/stylesheet/anima.css`:

```css
:root {
  --primary-color: #1c1c1c;       /* Main theme color */
  --secondary-color: #ff7c17;      /* Accent color */
  --text-color: #1c1c1c;          /* Primary text */
  --text-light: #a4a4a4;          /* Secondary text */
}
```

#### Customizing Fonts

The theme uses Poppins from Google Fonts. To change:

```css
@import url('https://fonts.googleapis.com/css2?family=Your+Font:wght@400;500;600;700&display=swap');

:root {
  --font-family: 'Your Font', Helvetica, Arial, sans-serif;
}
```

#### Modifying Layout

Template files are located in:
```
extension/anima/catalog/view/template/
├── common/           # Header, footer, home page
├── product/          # Product pages
├── checkout/         # Cart, checkout
├── account/          # User account pages
└── information/      # Static pages
```

## Template Structure

### Key Templates

#### Header (`common/header.twig`)
- Top information bar (shipping, returns, original products)
- Sale banner
- Logo and navigation menu
- User icons (search, wishlist, cart, account)
- Phone number display

#### Footer (`common/footer.twig`)
- Newsletter subscription
- Footer menus (Shop Now, Contact Us, Quick Links)
- Payment method icons
- Copyright information

#### Home Page (`common/home.twig`)
- Hero banner/slider
- "Products You May Like" section
- "New Arrivals" section with category tabs
- Product cards with wishlist and add-to-cart buttons

#### Product Page (`product/product.twig`)
- Product image gallery
- Product information
- Price display
- Add to cart functionality
- Product tabs (description, specifications, reviews)

## RTL (Right-to-Left) Support

The theme fully supports Arabic and other RTL languages:

### Automatic RTL Detection
The theme automatically detects RTL languages and applies appropriate styles:

```html
<html dir="rtl" lang="ar">
```

### RTL-Specific Styles
All layout elements adjust for RTL:
- Navigation alignment
- Text direction
- Float directions
- Margin/padding adjustments

### Language Switching
Users can switch between languages using the language selector in the header.

## JavaScript Functions

### Cart Management
```javascript
cart.add(product_id, quantity);      // Add product to cart
cart.update(cart_id, element);       // Update cart item quantity
cart.remove(cart_id);                // Remove item from cart
```

### Wishlist Management
```javascript
wishlist.add(product_id);            // Add to wishlist
wishlist.remove(product_id);         // Remove from wishlist
```

### Product Comparison
```javascript
compare.add(product_id);             // Add to comparison
compare.remove(product_id);          // Remove from comparison
```

## Responsive Breakpoints

- **Desktop**: ≥1200px (4 products per row)
- **Laptop**: ≥992px & <1200px (3 products per row)
- **Tablet**: ≥768px & <992px (2 products per row)
- **Mobile**: <768px (1 product per row)

## Browser Compatibility

- ✅ Chrome 90+
- ✅ Firefox 88+
- ✅ Safari 14+
- ✅ Edge 90+
- ✅ Opera 76+
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

## Requirements

### Server Requirements
- **PHP**: 8.0 or higher
- **OpenCart**: 4.1.0.3 or higher
- **MySQL**: 5.7 or higher
- **Web Server**: Apache 2.4+ or Nginx 1.18+

### PHP Extensions
- mysqli
- gd or imagick
- curl
- zip
- xml
- mbstring

## File Structure

```
extension/anima/
├── install.json                      # Extension manifest
├── admin/
│   ├── controller/theme/
│   │   └── anima.php                # Admin controller
│   ├── language/
│   │   ├── en-gb/theme/anima.php   # English admin language
│   │   └── ar/theme/anima.php      # Arabic admin language
│   └── view/template/theme/
│       └── anima.twig              # Admin settings template
├── catalog/
│   ├── controller/theme/
│   │   └── anima.php               # Catalog controller
│   ├── language/
│   │   ├── en-gb/theme/anima.php  # English catalog language
│   │   └── ar/theme/anima.php     # Arabic catalog language
│   └── view/
│       ├── template/               # Twig templates
│       │   ├── common/            # Header, footer, home
│       │   ├── product/           # Product pages
│       │   ├── checkout/          # Cart, checkout
│       │   ├── account/           # Account pages
│       │   └── information/       # Info pages
│       ├── stylesheet/
│       │   └── anima.css          # Main stylesheet
│       ├── javascript/
│       │   └── anima.js           # Theme JavaScript
│       └── image/                 # Theme images
```

## Troubleshooting

### Theme Not Appearing in Admin

1. Check file permissions:
   ```bash
   chmod -R 755 extension/anima
   ```

2. Clear OpenCart cache:
   - Go to `Dashboard > Developer Settings`
   - Click "Refresh" button for Modification

### Styles Not Loading

1. Check CSS file path in header.twig
2. Clear browser cache
3. Verify file exists: `extension/anima/catalog/view/stylesheet/anima.css`

### Images Not Displaying

1. Verify image paths are correct
2. Check image permissions
3. Ensure images exist in: `extension/anima/catalog/view/image/`

### RTL Not Working

1. Verify language direction is set correctly in OpenCart admin
2. Check HTML `dir` attribute is set to "rtl"
3. Clear template cache

## Development

### Testing the Theme

1. **Install on test server** first
2. **Test all pages**: home, category, product, cart, checkout, account
3. **Test RTL mode** by switching to Arabic language
4. **Test responsive design** on different screen sizes
5. **Test all interactive features**: cart, wishlist, search

### Customization Best Practices

1. **Don't modify core files** - Create custom CSS/JS files instead
2. **Use child themes** for major customizations
3. **Keep backups** before making changes
4. **Test thoroughly** after modifications
5. **Document changes** for future reference

## Support

For issues, questions, or feature requests:
- **Repository**: https://github.com/abdullahshioncse/anima
- **Issues**: https://github.com/abdullahshioncse/anima/issues

## License

This theme is released under the **GPL-3.0 License**.

See the [LICENSE](LICENSE) file for details.

## Credits

- **Design Tool**: Anima (www.animaapp.com)
- **Font**: Poppins by Google Fonts
- **Icons**: Iconly Icon Set
- **Framework**: OpenCart 4.1.0.3

## Changelog

### Version 1.0.0 (Initial Release)
- ✅ Complete OpenCart 4.1.0.3 theme conversion
- ✅ Arabic RTL support
- ✅ Responsive design
- ✅ All essential templates included
- ✅ Admin configuration panel
- ✅ AJAX cart functionality
- ✅ Product carousel/slider
- ✅ Newsletter integration
- ✅ Multi-language support (English & Arabic)

## Future Enhancements

Planned features for future releases:
- [ ] Product quick view modal
- [ ] Advanced product filtering
- [ ] Mega menu support
- [ ] Additional color schemes
- [ ] More customization options in admin
- [ ] Additional language packs
- [ ] Animation effects
- [ ] Advanced homepage builder

---

**Made with ❤️ for OpenCart**
