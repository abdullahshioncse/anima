# Anima Theme for OpenCart 4.0.1.3

This is a conversion of the Anima static HTML theme to OpenCart 4.0.1.3 compatible theme.

## Structure

The theme follows the OpenCart 4.0.1.3 standard directory structure:

```
├── admin/
│   ├── controller/theme/          # Admin theme controller
│   ├── language/en-gb/theme/      # Admin language files
│   └── view/template/theme/       # Admin template files
├── catalog/
│   ├── controller/startup/        # Theme initialization
│   └── view/
│       ├── image/                 # Theme images and icons
│       ├── javascript/fonts/      # Custom fonts
│       ├── stylesheet/            # CSS files
│       └── template/              # Twig template files
│           ├── account/           # Account pages
│           ├── common/            # Common templates (header, footer, home)
│           └── product/           # Product pages
└── system/
    ├── helper/                    # Helper functions
    └── library/                   # Library files
```

## Features

- 100% copy of the static Anima theme design
- Right-to-left (RTL) Arabic language support
- Responsive design for desktop and mobile
- Product listings with grid layout
- Product detail pages
- Category pages
- Information pages (Return Policy, Privacy Policy, etc.)
- Modern, clean interface

## Installation

1. Copy all theme files to your OpenCart installation directory
2. Log in to your OpenCart admin panel
3. Navigate to Extensions > Themes
4. Find "Anima Theme" and click Install
5. Click Edit to enable the theme
6. Set Status to "Enabled"
7. Save the settings

## Assets

- **CSS Files**: All CSS files are located in `catalog/view/stylesheet/`
  - `globals.css` - Global styles and fonts
  - `styleguide.css` - Style guide and color scheme
  - `desktop-*.css` - Page-specific styles

- **Images**: All images are located in `catalog/view/image/`
  - Product images
  - Icons (Iconly Sharp icon set)
  - Payment method icons

- **Fonts**: Custom fonts are located in `catalog/view/javascript/fonts/`
  - Plus Jakarta Display Medium

## Template Files

### Common Templates
- `header.twig` - Site header with navigation
- `footer.twig` - Site footer with newsletter and links
- `home.twig` - Homepage with hero section and product sections
- `information.twig` - Information pages (policies, etc.)

### Product Templates
- `category.twig` - Product category listing
- `product.twig` - Product detail page

### Account Templates
- `account.twig` - Customer account pages

## Customization

### Colors
Main colors are defined in `styleguide.css`:
- Primary: #ff7c17
- Black: #1c1c1c
- White: #ffffff
- Gray: #a4a4a4, #d6d6d6, #ebebeb

### Fonts
- Primary Font: Poppins (Google Fonts)
- Secondary Font: Plus Jakarta Display

## Support

For issues or questions, please contact the theme developer.

## Version

- Theme Version: 1.0.0
- OpenCart Version: 4.0.1.3
- Release Date: 2025

## Credits

Original static theme design: Anima
OpenCart conversion: Abdullah Shion
