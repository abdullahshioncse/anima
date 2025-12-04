# Anima Theme for OpenCart 4.1.0.3

Modern, responsive Arabic RTL e-commerce theme for OpenCart 4.1.0.3

## Description

Anima is a professionally designed theme converted from a static HTML/CSS template into a fully functional OpenCart 4.1.0.3 theme. It features a modern, clean design with full Arabic/RTL support, making it perfect for Middle Eastern e-commerce stores.

## Features

- ✅ **OpenCart 4.1.0.3 Compatible** - Built specifically for the latest OpenCart version
- ✅ **RTL (Right-to-Left) Support** - Full Arabic language and RTL layout support
- ✅ **Responsive Design** - Mobile-first design that works on all devices
- ✅ **Modern UI** - Clean, contemporary design with smooth animations
- ✅ **Easy Customization** - Admin panel settings for colors, fonts, and layout
- ✅ **Product Grid Layout** - Beautiful product cards with hover effects
- ✅ **Custom CSS Support** - Add your own CSS without modifying theme files
- ✅ **Font Customization** - Choose your preferred font family
- ✅ **Image Settings** - Configure product image dimensions
- ✅ **Layout Options** - Adjust products per page and per row

## Installation

### Method 1: Extension Installer (Recommended)

1. Download the `anima.ocmod.zip` file
2. Log in to your OpenCart admin panel
3. Navigate to **Extensions → Installer**
4. Click **Upload** and select the `anima.ocmod.zip` file
5. Wait for the upload to complete
6. Navigate to **Extensions → Extensions**
7. Select **Themes** from the extension type dropdown
8. Find **Anima Theme** and click **Install**
9. Click **Edit** to configure theme settings

### Method 2: Manual Installation

1. Extract the `anima.ocmod` folder
2. Upload the contents to your OpenCart root directory:
   - `admin/` folder → `[opencart_root]/admin/`
   - `catalog/` folder → `[opencart_root]/catalog/`
   - `image/` folder → `[opencart_root]/image/`
3. Log in to your OpenCart admin panel
4. Navigate to **Extensions → Extensions**
5. Select **Themes** from the extension type dropdown
6. Find **Anima Theme** and click **Install**
7. Click **Edit** to configure theme settings

## Configuration

After installation, configure the theme from the admin panel:

### General Settings

- **Status**: Enable/disable the theme
- **Phone Number**: Display phone number in header (default: 965-22091914)
- **Sale Banner Text**: Promotional banner text (Arabic supported)

### Image Settings

Configure image dimensions for:
- Category images (default: 300x300)
- Product images (default: 800x800)
- Thumbnail images (default: 100x100)

### Product Display

- **Products Per Page**: Number of products to display (default: 16)
- **Products Per Row**: Grid columns (2-6, default: 4)

### Style & Colors

- **Primary Color**: Main theme accent color (default: #ff7c17 - Orange)
- **Secondary Color**: Secondary theme color (default: #1c1c1c - Dark Gray)
- **Font Family**: Main font (default: Poppins)
- **Custom CSS**: Add custom CSS rules

## Theme Structure

```
anima.ocmod/
├── install.json                          # Extension metadata
├── admin/
│   ├── controller/extension/theme/anima.php   # Admin controller
│   ├── model/extension/theme/anima.php        # Admin model
│   ├── language/en-gb/extension/theme/anima.php  # Admin language
│   └── view/template/extension/theme/anima.twig  # Admin settings page
├── catalog/
│   ├── controller/extension/theme/anima.php   # Catalog controller
│   ├── model/extension/theme/anima.php        # Catalog model
│   ├── language/en-gb/extension/theme/anima.php  # Catalog language
│   └── view/theme/anima/
│       ├── template/              # Twig templates
│       │   ├── common/           # Header, footer, menu, etc.
│       │   ├── product/          # Product pages
│       │   ├── account/          # Account pages
│       │   ├── checkout/         # Checkout pages
│       │   ├── information/      # Info pages
│       │   ├── extension/module/ # Module templates
│       │   └── error/            # Error pages
│       ├── stylesheet/           # CSS files
│       │   ├── globals.css      # Global styles
│       │   ├── styleguide.css   # Style guide
│       │   └── stylesheet.css   # Main stylesheet
│       ├── image/                # Theme images
│       └── font/                 # Theme fonts
└── image/anima/                  # Additional images
```

## Customization

### Adding Custom CSS

1. Go to **Extensions → Extensions → Themes**
2. Click **Edit** on Anima Theme
3. Navigate to **Style & Colors** tab
4. Add your CSS in the **Custom CSS** field
5. Click **Save**

### Changing Colors

Use the color pickers in the **Style & Colors** tab to change:
- Primary color (buttons, links, accents)
- Secondary color (text, backgrounds)

### Modifying Templates

Templates are located in:
```
catalog/view/theme/anima/template/
```

To override a template:
1. Copy the template file you want to modify
2. Edit the file
3. Clear OpenCart cache (System → Maintenance → Refresh)

## Design Features

The Anima theme includes:

- **Hero Banner** - Large, eye-catching homepage banner with call-to-action buttons
- **Info Bar** - Highlight key features (returns, delivery, authenticity)
- **Sale Banner** - Promotional banner at the top of every page
- **Product Cards** - Modern card design with image, name, price, and add to cart
- **Wishlist Integration** - Heart icon on every product
- **Responsive Navigation** - Mobile-friendly menu
- **Footer** - Multi-column footer with payment icons and links
- **Newsletter Signup** - Footer newsletter subscription form

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Requirements

- OpenCart 4.1.0.3 or higher
- PHP 8.0 or higher
- MySQL 5.7 or higher

## Support

For issues, questions, or feature requests:
- GitHub: https://github.com/abdullahshioncse/anima
- Create an issue on the repository

## Credits

- **Designer/Developer**: Abdullah Shion
- **Original Template**: Static Anima HTML/CSS template
- **Framework**: OpenCart 4.1.0.3

## License

GPL-3.0 License

## Changelog

### Version 1.0.0 (Initial Release)
- Converted static HTML/CSS template to OpenCart 4.1.0.3 theme
- Full RTL/Arabic support
- Responsive design for all devices
- Admin panel configuration
- Complete template coverage for all OpenCart pages
- Image and layout customization options
- Color scheme customization
- Custom CSS support

---

© 2025 Abdullah Shion. All rights reserved.
