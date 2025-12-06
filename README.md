# Anima Theme for OpenCart 4.x

A modern, RTL-ready e-commerce theme for OpenCart 4.1.x, converted from Anima static HTML design.

## Features

- ✅ Full RTL (Right-to-Left) support for Arabic language
- ✅ Responsive design for desktop and mobile
- ✅ Modern, clean UI with Poppins font
- ✅ Product cards with hover effects
- ✅ Add to cart functionality
- ✅ Wishlist integration
- ✅ Product image gallery
- ✅ Category filters and sorting
- ✅ Newsletter subscription form
- ✅ Payment method icons (Visa, Mastercard, Apple Pay)
- ✅ Mobile-friendly navigation

## Requirements

- OpenCart 4.1.x or higher
- PHP 8.1 or higher
- MySQL 5.7 or higher

## Installation

### Method 1: Manual Installation

1. **Download the theme files**
   - Download or clone this repository

2. **Upload theme files**
   - Copy the entire `catalog/view/theme/anima/` folder to your OpenCart installation
   - The path should be: `YOUR_OPENCART/catalog/view/theme/anima/`

3. **Activate the theme**
   - Log in to your OpenCart Admin panel
   - Navigate to `System > Settings`
   - Click `Edit` on your store
   - Go to the `Option` tab
   - Under `Theme`, select `anima` from the dropdown
   - Click `Save`

4. **Clear cache**
   - Go to `Dashboard`
   - Click the blue refresh icon to clear the cache

### Method 2: Using Extension Installer (Recommended)

1. Package the theme as a `.ocmod.zip` file
2. Go to `Extensions > Installer` in admin
3. Upload the package
4. Go to `Extensions > Extensions > Themes`
5. Install and configure the Anima theme

## File Structure

```
catalog/view/theme/anima/
├── stylesheet/
│   ├── desktop-1.css       # Homepage styles
│   ├── desktop-2.css       # Product page styles
│   ├── desktop-3.css       # Category page styles
│   ├── desktop-4.css       # Information page styles
│   ├── styleguide.css      # Typography and variables
│   ├── globals.css         # Global styles
│   └── custom.css          # Custom overrides
├── javascript/
│   └── common.js           # Theme JavaScript
├── image/
│   └── (icons and images)
├── fonts/
│   └── PlusJakartaDisplay-Medium.ttf
└── template/
    ├── common/
    │   ├── header.twig
    │   ├── footer.twig
    │   ├── home.twig
    │   ├── column_left.twig
    │   ├── column_right.twig
    │   └── menu.twig
    ├── product/
    │   ├── product.twig
    │   ├── category.twig
    │   ├── search.twig
    │   └── special.twig
    ├── information/
    │   └── information.twig
    ├── account/
    │   ├── account.twig
    │   ├── login.twig
    │   └── register.twig
    ├── checkout/
    │   ├── cart.twig
    │   ├── checkout.twig
    │   └── success.twig
    └── extension/module/
        ├── featured.twig
        ├── latest.twig
        ├── bestseller.twig
        ├── carousel.twig
        └── banner.twig
```

## Configuration

### Setting Up the Homepage

1. Navigate to `Design > Layouts`
2. Edit the `Home` layout
3. Add the following modules to `Content Top`:
   - Banner (for hero slider)
   - Featured Products
   - Latest Products

### Configuring Categories

1. Go to `Catalog > Categories`
2. Add your categories
3. The menu will automatically display top-level categories

### Setting Up Banners

1. Navigate to `Design > Banners`
2. Create a banner group named "Homepage Slideshow"
3. Add banner images with links

## Customization

### Changing Colors

Edit `catalog/view/theme/anima/stylesheet/styleguide.css`:

```css
:root { 
    --ff7c17: #ff7c17;      /* Primary color (orange) */
    --x1c1c1c: #1c1c1c;     /* Dark color */
    --ffffff: #ffffff;       /* White */
    --d7d7d7: #d6d6d6;      /* Light gray */
}
```

### Adding Custom Styles

Add your custom CSS to `catalog/view/theme/anima/stylesheet/custom.css`

### Modifying JavaScript

Edit `catalog/view/theme/anima/javascript/common.js` for theme functionality

## RTL Support

The theme is designed with full RTL support for Arabic:
- All text is right-aligned
- Navigation flows right-to-left
- Product cards align correctly
- Forms work with RTL input

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Troubleshooting

### Images not loading

1. Check file permissions (755 for folders, 644 for files)
2. Ensure all images are in `catalog/view/theme/anima/image/`
3. Clear OpenCart cache

### CSS not applying

1. Clear browser cache
2. Clear OpenCart cache
3. Check browser console for errors

### Theme not appearing in dropdown

1. Ensure folder is named exactly `anima`
2. Check folder permissions
3. Verify OpenCart version compatibility

## Support

For issues and feature requests, please open an issue on GitHub.

## License

This theme is provided as-is for educational and commercial use.

## Credits

- Design: Anima App
- Conversion: OpenCart 4.x Theme
- Icons: Iconly Sharp icon set
- Fonts: Poppins (Google Fonts), Plus Jakarta Display
