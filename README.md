# Anima Theme for OpenCart 4.0.1.3

A modern, responsive e-commerce theme with Arabic RTL support, converted from static HTML to a fully functional OpenCart theme.

## Features

- ✅ **Responsive Design**: Optimized for desktop (1440px) and mobile (iPhone 13) viewports
- ✅ **RTL Support**: Full Right-to-Left support for Arabic language
- ✅ **Modern UI**: Clean, minimalist design with custom color scheme
- ✅ **Product Showcase**: Beautiful product cards with wishlist and cart functionality
- ✅ **Category Listings**: Grid-based product displays with sorting and filtering
- ✅ **Information Pages**: Policy pages, about us, contact, etc.
- ✅ **Custom Icons**: Complete icon set from Iconly Sharp collection
- ✅ **Payment Icons**: Visa, Mastercard, Apple Pay support indicators

## Color Scheme

- **Primary Dark**: `#1C1C1C` (Eerie Black)
- **Accent Orange**: `#FF7C17`
- **White**: `#FFFFFF`
- **Border Gray**: `#EBEBEB`
- **Text Gray**: `#A4A4A4`

## Fonts

- **Primary**: Poppins (400, 500, 600, 700)
- **Secondary**: Plus Jakarta Display Medium

## Installation

### Requirements

- OpenCart 4.0.1.3 or higher
- PHP 7.4 or higher
- Modern web browser with CSS3 support

### Steps

1. **Upload Theme Files**
   ```bash
   # Upload the entire anima directory to your OpenCart installation root
   ```

2. **Set Permissions**
   ```bash
   chmod 755 -R admin/
   chmod 755 -R catalog/
   chmod 755 -R system/
   ```

3. **Install via Admin Panel**
   - Log in to your OpenCart admin panel
   - Navigate to: Extensions → Extensions → Themes
   - Find "Anima" in the list
   - Click the green "+" (Install) button
   - Click "Edit" to enable the theme
   - Set Status to "Enabled"
   - Click "Save"

4. **Configure System Settings**
   - Go to: System → Settings
   - Click "Edit" on your store
   - Navigate to the "Store" tab
   - Set "Theme" to "Anima"
   - Click "Save"

5. **Clear Cache**
   ```bash
   # Clear OpenCart cache
   rm -rf system/storage/cache/*
   ```

## Directory Structure

```
anima/
├── admin/                          # Admin panel files
│   ├── controller/theme/           # Theme settings controller
│   ├── language/en-gb/theme/       # Admin language files
│   └── view/
│       ├── image/                  # Admin images/icons
│       └── template/theme/         # Admin template (settings page)
├── catalog/                        # Frontend files
│   ├── controller/startup/         # Theme initialization
│   └── view/
│       ├── stylesheet/             # CSS files
│       │   ├── anima.css          # Main theme stylesheet
│       │   ├── globals.css        # Global styles
│       │   ├── styleguide.css     # Style guide
│       │   └── fonts/             # Custom fonts
│       ├── theme/anima/image/     # Theme images/icons
│       └── template/              # Twig templates
│           ├── common/            # Header, footer, home
│           ├── product/           # Product & category pages
│           └── information/       # Information pages
├── system/                         # System extensions
│   ├── helper/                    # Helper functions
│   └── library/                   # Custom libraries
└── install.json                   # Theme metadata
```

## Theme Structure

### Templates

- **common/header.twig**: Header with navigation, search, cart, wishlist
- **common/footer.twig**: Footer with newsletter, menus, payment icons
- **common/home.twig**: Homepage with hero section and featured products
- **product/category.twig**: Category product listings
- **product/product.twig**: Individual product detail pages
- **information/information.twig**: Information/policy pages

### Stylesheets

All CSS files maintain the original design colors and layouts:

- `anima.css`: Main consolidated stylesheet
- `globals.css`: Global styles and resets
- `styleguide.css`: Color variables and typography
- Page-specific: `desktop-1.css`, `desktop-2.css`, etc.
- Mobile: `iphone-13-*.css` files for responsive design

## Configuration

### Admin Settings

Access theme settings via:
```
Extensions → Extensions → Themes → Anima → Edit
```

Available settings:
- Enable/Disable theme
- RTL support toggle (enabled by default for Arabic)

### Language Support

The theme includes Arabic text by default. To customize:

1. Edit language files in: `admin/language/en-gb/theme/anima.php`
2. Add translations for other languages by creating corresponding language directories

## Customization

### Colors

Edit color variables in `catalog/view/stylesheet/styleguide.css`:

```css
:root {
  --x1c1c1c: #1c1c1c;  /* Primary dark */
  --ff7c17: #ff7c17;    /* Accent orange */
  --ffffff: #ffffff;    /* White */
  --ececec: #ebebeb;    /* Border gray */
}
```

### Logo

Replace the default "LOGO" text by:
1. Go to System → Settings → Edit Store
2. Upload your logo in the "Image" tab
3. Save changes

### Navigation Menu

The navigation automatically pulls categories from your OpenCart catalog. To customize:
1. Go to Catalog → Categories
2. Add/edit categories as needed
3. Categories will appear in the main navigation

## Features in Detail

### Sale Banner

The top banner displays promotional messages. Customize in theme settings or template files.

### Info Bar

Three-column feature section displaying:
- Returns & Exchange policy
- 24-hour delivery
- 100% Original products

### Product Cards

Each product card includes:
- Product image with hover effects
- Wishlist button
- Product name and model number
- Price (with sale price support)
- Add to cart button

### Responsive Design

- **Desktop (1440px+)**: Full layout with horizontal navigation
- **Tablet (768px-1439px)**: Adjusted grid, 2-column products
- **Mobile (< 768px)**: Single column, hamburger menu, touch-optimized

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Troubleshooting

### Theme not showing

1. Clear browser cache
2. Clear OpenCart cache: `system/storage/cache/`
3. Check file permissions
4. Verify theme is enabled in System → Settings

### Styles not loading

1. Check CSS file paths in templates
2. Verify files exist in `catalog/view/stylesheet/`
3. Check browser console for 404 errors
4. Clear cache and refresh

### Images not displaying

1. Verify images are in `catalog/view/theme/anima/image/`
2. Check image paths in templates
3. Ensure proper permissions (644 for files, 755 for directories)

## Support

For support, contact:
- **Email**: Info@sportakw.com
- **Phone**: 00965 22091914

## Credits

- **Design**: Generated with Anima
- **Theme Conversion**: OpenCart 4.0.1.3 compatible theme
- **Icons**: Iconly Sharp icon set
- **Fonts**: Google Fonts (Poppins), Plus Jakarta Display

## License

Commercial License - © 2025

## Version History

### Version 1.0.0 (2025-01-01)
- Initial release
- Full OpenCart 4.0.1.3 compatibility
- Responsive design (desktop and mobile)
- RTL support for Arabic
- Complete template set
- Admin configuration panel
