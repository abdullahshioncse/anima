# Anima - OpenCart 4.0.1.3 Theme

An Arabic RTL e-commerce theme for OpenCart 4.0.1.3, converted from a static HTML/CSS design.

## Features

- **Arabic RTL Support**: Full right-to-left layout optimized for Arabic content
- **Modern Design**: Clean and contemporary design with focus on product presentation
- **Responsive Layout**: Optimized for desktop and mobile devices
- **Product Display**: Beautiful product cards with wishlist and cart functionality
- **Custom Styling**: Unique color scheme and typography using Poppins and Plus Jakarta Display fonts

## Installation

1. **Upload Theme Files**
   - Upload the entire theme directory to your OpenCart installation root directory
   - Make sure to maintain the folder structure:
     - `admin/` - Admin panel files
     - `catalog/` - Frontend theme files
     - `system/` - System files (if any)
   - All files should merge with existing OpenCart directories

2. **Install the Theme Extension**
   - Go to **Extensions → Extensions** in your OpenCart admin panel
   - Filter by **Themes**
   - Find **Anima Theme** in the list
   - Click the **Install** button (green plus icon)
   - After installation, click **Edit** to enable the theme

3. **Set as Default Theme**
   - Go to **System → Settings**
   - Click **Edit** on your store
   - Go to the **Server** tab
   - In the **Theme** dropdown, select **Anima Theme** (or **theme_anima**)
   - Click **Save**

4. **Verify Installation**
   - Clear your browser cache
   - Visit your store's frontend
   - You should see the Anima theme with Arabic RTL layout and custom styling

**Troubleshooting:**
- If the frontend still shows the default theme after installation:
  - Make sure you selected the theme in System → Settings → Server tab
  - Clear OpenCart cache: System → Maintenance → Clear cache
  - Check that the startup entry exists in System → Maintenance → Startup
  - Verify theme status is enabled in Extensions → Themes → Anima Theme → Edit

## Directory Structure

```
├── admin
│   ├── controller
│   │   └── theme
│   │       └── theme_anima.php
│   ├── language
│   │   └── en-gb
│   │       └── theme
│   │           └── theme_anima.php
│   └── view
│       ├── image
│       │   └── theme_anima.png
│       └── template
│           └── theme
│               └── theme_anima.twig
├── catalog
│   ├── controller
│   │   └── startup
│   │       └── theme_anima.php
│   └── view
│       ├── image
│       │   └── [all theme images]
│       ├── javascript
│       ├── stylesheet
│       │   ├── fonts
│       │   │   └── PlusJakartaDisplay-Medium.ttf
│       │   ├── globals.css
│       │   ├── styleguide.css
│       │   └── [page-specific CSS files]
│       └── template
│           ├── extension
│           │   └── oc_theme_anima
│           │       ├── common
│           │       │   ├── header.twig
│           │       │   ├── footer.twig
│           │       │   └── home.twig
│           │       └── product
│           │           ├── category.twig
│           │           └── product.twig
│           └── account
└── system
    ├── helper
    └── library
```

## Theme Components

### Header
- Top information bar with delivery, return, and authenticity guarantees
- Sale banner
- Main navigation with logo, categories menu, search, wishlist, cart, and account icons
- Contact phone number display

### Footer
- Newsletter subscription form
- Payment method icons (Visa, Mastercard, Apple Pay)
- Three-column menu structure:
  - Shop categories
  - Contact links
  - Quick links
- Copyright notice

### Homepage
- Hero banner with call-to-action buttons
- "You May Like" product section
- "New Arrivals" product section with category filtering
- Carousel navigation arrows

### Product Category Page
- Category title and product count
- Product grid layout
- Product cards with wishlist and add-to-cart functionality
- Pagination support

### Product Detail Page
- Product images
- Product information (name, model, price)
- Product description
- Add to cart button
- Related products section

## Customization

### Colors
The theme uses a custom color palette defined in `styleguide.css`:
- Primary: `#ff7c17` (orange)
- Background: `#ffffff` (white)
- Text: `#1c1c1c` (dark gray)
- Accent colors defined in CSS variables

### Fonts
- **Poppins**: Main font family (Google Fonts)
- **Plus Jakarta Display**: Display font for headings

### CSS Files
- `globals.css`: Global styles and resets
- `styleguide.css`: Typography and color definitions
- `desktop-1.css`, `desktop-2.css`, etc.: Page-specific styles

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Version History

- **1.0.0** - Initial release
  - Converted static HTML/CSS to OpenCart 4.0.1.3 theme
  - Arabic RTL support
  - Homepage, category, and product templates
  - Admin panel integration

## Credits

- **Author**: Abdullah Shion
- **Repository**: https://github.com/abdullahshioncse/anima
- **Design**: Based on Anima static design

## License

This theme is released under the MIT License.

## Support

For issues, questions, or contributions, please visit the GitHub repository:
https://github.com/abdullahshioncse/anima
