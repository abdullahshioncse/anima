# Anima OpenCart 4.1.0.3 Theme

A fully responsive OpenCart 4.1.0.3 compatible theme based on Anima design export, featuring Arabic/RTL support and modern e-commerce functionality.

## Features

- ✅ **Fully Responsive Design**: Desktop and mobile layouts preserved from original Anima design
- ✅ **RTL/Arabic Support**: Complete right-to-left language support with Arabic translations
- ✅ **OpenCart 4.1.0.3 Compatible**: Built for OpenCart 4.1.0.3 standards
- ✅ **Modern Design**: Clean, professional design with smooth animations
- ✅ **Product Showcases**: 
  - "You May Like" featured products section
  - "New In" latest products with category tabs
  - Product carousel with navigation
- ✅ **Complete E-commerce Functionality**:
  - Product listing and detail pages
  - Shopping cart and checkout
  - User account management
  - Wishlist functionality
  - Search functionality
- ✅ **Newsletter Subscription**: Footer newsletter signup form
- ✅ **Payment Icons**: Visa, Mastercard, and Apple Pay support display
- ✅ **Benefits Section**: Highlight key store benefits (24h delivery, returns, authentic products)
- ✅ **Customizable**: Admin panel settings for phone number, sale banner, newsletter text

## Installation

### Requirements
- OpenCart Version: 4.1.0.3 or higher
- PHP Version: 7.4 or higher
- MySQL Version: 5.7 or higher

### Installation Steps

1. **Download the Theme Package**
   - Clone or download this repository

2. **Install via Extension Installer**
   - Log in to your OpenCart Admin Panel
   - Navigate to `Extensions` → `Installer`
   - Click "Upload" and select the theme ZIP file
   - Wait for the upload and installation to complete

3. **Enable the Theme**
   - Navigate to `Extensions` → `Extensions`
   - From the "Choose the extension type" dropdown, select "Themes"
   - Find "Anima Theme" in the list
   - Click the "Install" button (green plus icon)
   - Click the "Edit" button to configure theme settings

4. **Configure Theme Settings**
   - Set the theme status to "Enabled"
   - Update the contact phone number (default: 965-22091914)
   - Customize the sale banner text
   - Edit the newsletter subscription text
   - Save your changes

5. **Set as Default Theme** (if applicable)
   - Navigate to `System` → `Settings`
   - Click "Edit" for your store
   - Go to the "Store" tab
   - Select "Anima Theme" as your theme
   - Save changes

## File Structure

```
extension/anima/
├── install.json                           # Extension manifest
├── admin/                                 # Admin panel files
│   ├── controller/theme/anima.php        # Theme configuration controller
│   ├── language/en-gb/theme/anima.php    # Admin language file
│   └── view/template/theme/anima.twig    # Admin configuration template
└── catalog/                               # Frontend files
    ├── controller/startup/anima.php      # Theme initialization
    ├── language/                          # Language files
    │   ├── en-gb/theme/anima.php         # English translations
    │   └── ar-ar/theme/anima.php         # Arabic translations
    └── view/
        ├── template/                      # Twig templates
        │   ├── common/                    # Common templates
        │   │   ├── header.twig           # Site header
        │   │   ├── footer.twig           # Site footer
        │   │   ├── home.twig             # Homepage
        │   │   ├── menu.twig             # Navigation menu
        │   │   └── search.twig           # Search page
        │   ├── product/                   # Product templates
        │   │   ├── category.twig         # Category listing
        │   │   ├── product.twig          # Product detail
        │   │   └── search.twig           # Search results
        │   ├── information/               # Information pages
        │   │   └── information.twig      # Static pages (policies, etc.)
        │   ├── account/                   # Account templates
        │   │   ├── account.twig          # Account dashboard
        │   │   ├── login.twig            # Login page
        │   │   ├── register.twig         # Registration page
        │   │   └── wishlist.twig         # Wishlist page
        │   └── checkout/                  # Checkout templates
        │       ├── cart.twig             # Shopping cart
        │       └── checkout.twig         # Checkout page
        ├── stylesheet/                    # CSS files (all original Anima CSS)
        │   ├── globals.css
        │   ├── styleguide.css
        │   ├── desktop-1.css
        │   ├── desktop-2.css
        │   ├── desktop-3.css
        │   ├── desktop-4.css
        │   ├── iphone-13-u38-14-1.css
        │   ├── iphone-13-u38-14-4.css
        │   ├── iphone-13-u38-14-5.css
        │   ├── iphone-13-u38-14-6.css
        │   └── fonts/                     # Font files
        │       └── PlusJakartaDisplay-Medium.ttf
        └── image/                         # All original Anima images
```

## Configuration Options

The theme includes the following configurable options in the admin panel:

- **Status**: Enable or disable the theme
- **Contact Phone Number**: Phone number displayed in header (e.g., 965-22091914)
- **Sale Banner Text**: Promotional banner text at the top of the page
- **Newsletter Text**: Newsletter subscription invitation text in footer

## Design Preservation

This theme maintains **100% design fidelity** to the original Anima export:

- ✅ All CSS files preserved without modification
- ✅ All images and icons preserved
- ✅ All fonts preserved
- ✅ Exact HTML structure and CSS classes maintained
- ✅ Arabic/RTL layout preserved
- ✅ Responsive mobile design preserved
- ✅ All animations and interactions preserved

## Pages Included

### Desktop Pages
- **Homepage (desktop-1.html)**: Hero banner, benefits section, featured products, new arrivals
- **Category Listing (desktop-2.html)**: Product grid with filtering and pagination
- **Product Detail (desktop-3.html)**: Product images, information, add to cart
- **Information Pages (desktop-4.html)**: Return policy, terms, privacy policy

### Mobile Pages
- **Mobile Homepage (iphone-13-u38-14-1.html)**: Responsive homepage layout
- **Mobile Product Pages**: Mobile-optimized product views
- **Mobile Account**: Login, registration, account management
- **Mobile Cart**: Shopping cart and checkout

## Customization

### Adding Custom CSS
You can add custom CSS by creating a new file:
```
extension/anima/catalog/view/stylesheet/custom.css
```

Then include it in the header template.

### Modifying Templates
All Twig templates are located in:
```
extension/anima/catalog/view/template/
```

Edit these files to customize the layout and structure.

### Language Customization
Language files are located in:
```
extension/anima/catalog/language/en-gb/theme/anima.php  (English)
extension/anima/catalog/language/ar-ar/theme/anima.php  (Arabic)
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Credits

- **Design**: Anima Design Export
- **Developer**: Abdullah Shion
- **Platform**: OpenCart 4.1.0.3
- **License**: MIT

## Support

For issues, questions, or contributions:
- **GitHub**: https://github.com/abdullahshioncse/anima
- **Issues**: https://github.com/abdullahshioncse/anima/issues

## License

This theme is released under the MIT License. See LICENSE file for details.

## Changelog

### Version 1.0.0 (Initial Release)
- Complete OpenCart 4.1.0.3 theme structure
- All essential templates (home, category, product, cart, checkout, account)
- Arabic/RTL language support
- Responsive design for desktop and mobile
- Admin configuration panel
- Newsletter subscription integration
- Payment icons display
- Preserved all original Anima design elements

## Development

### Local Testing
1. Set up a local OpenCart 4.1.0.3 installation
2. Copy the `extension/anima` folder to your OpenCart installation
3. Install and configure via admin panel

### Creating ZIP Package
To create an installable ZIP package:
```bash
cd extension
zip -r anima-theme-1.0.0.zip anima/
```

## Notes

- The theme preserves the original Anima design exactly as exported
- All original HTML files are kept in the repository root for reference
- Original CSS, images, and fonts are preserved in the extension directory
- The theme is fully compatible with OpenCart 4.1.0.3 Extension Installer
