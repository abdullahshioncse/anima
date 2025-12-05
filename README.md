# Anima Theme for OpenCart 4.0.1.3

A modern, RTL-compatible e-commerce theme for OpenCart 4.0.1.3, converted from a static design with full preservation of the original design, layout, colors, and styling.

## Features

- **RTL Support**: Full right-to-left language support (Arabic)
- **Responsive Design**: Mobile, tablet, and desktop layouts
- **Modern Design**: Clean, professional e-commerce design
- **100% Original Styling**: All colors, fonts, and layouts preserved from static theme
- **Product Features**: Product cards, category pages, product detail pages
- **Custom Icons**: Complete icon set for UI elements

## Installation

1. Download or clone this repository
2. Copy all theme files to your OpenCart installation root directory
3. Log in to your OpenCart admin panel
4. Navigate to Extensions → Themes
5. Find "Anima Theme" and click Install
6. Click Edit to configure the theme
7. Enable the theme by setting Status to "Enabled"
8. Save your changes

## Directory Structure

```
├── admin/
│   ├── controller/theme/anima.php
│   ├── language/en-gb/theme/anima.php
│   └── view/template/theme/anima.twig
├── catalog/
│   ├── view/
│   │   ├── javascript/
│   │   │   └── PlusJakartaDisplay-Medium.ttf
│   │   ├── stylesheet/
│   │   │   ├── anima.css (base styles)
│   │   │   ├── anima-home.css (homepage styles)
│   │   │   ├── anima-product.css (product/category styles)
│   │   │   └── anima-responsive.css (mobile styles)
│   │   ├── template/
│   │   │   ├── common/
│   │   │   │   ├── header.twig
│   │   │   │   ├── footer.twig
│   │   │   │   └── home.twig
│   │   │   ├── product/
│   │   │   │   ├── product.twig
│   │   │   │   └── category.twig
│   │   │   └── information/
│   │   │       └── information.twig
│   │   └── theme/anima/image/
│   │       └── (172 image files)
├── system/
│   ├── helper/
│   └── library/
└── install.json
```

## Templates

### Common Templates
- **header.twig**: Site header with navigation, search, cart, wishlist
- **footer.twig**: Site footer with newsletter signup, payment methods, and links
- **home.twig**: Homepage with hero banner and featured products

### Product Templates
- **product.twig**: Product detail page with images, options, and add to cart
- **category.twig**: Category listing page with product grid

### Information Templates
- **information.twig**: Content pages (policies, about us, etc.)

## Stylesheets

- **anima.css**: Base styles including typography, colors, and layout
- **anima-home.css**: Homepage-specific styles
- **anima-product.css**: Product and category page styles
- **anima-responsive.css**: Mobile and tablet responsive styles

## Typography

- **Primary Font**: Poppins (Google Fonts)
- **Secondary Font**: Plus Jakarta Display (included)

## Color Scheme

- **Primary**: #FF7C17 (Orange)
- **Text**: #1C1C1C (Dark Gray)
- **Background**: #FFFFFF (White)
- **Accent**: #EBEBEB (Light Gray)

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Requirements

- OpenCart 4.0.1.3 or higher
- PHP 7.4 or higher
- Modern web browser with CSS3 support

## Customization

### Changing Colors
Edit the CSS variables in `catalog/view/stylesheet/anima.css`:

```css
:root { 
  --ff7c17: #ff7c17;  /* Primary color */
  --x1c1c1c: #1c1c1c; /* Text color */
  --ffffff: #ffffff;  /* Background color */
  --ececec: #ebebeb;  /* Border/accent color */
}
```

### Modifying Templates
All Twig templates are located in `catalog/view/template/`. Edit these files to customize the layout and structure.

### Adding Custom CSS
Add your custom styles to a new file in `catalog/view/stylesheet/` and link it in the header.twig template.

## Support

For issues, questions, or contributions, please visit:
https://github.com/abdullahshioncse/anima

## License

This theme is provided as-is for use with OpenCart 4.0.1.3.

## Credits

- **Original Design**: Anima static theme
- **OpenCart Conversion**: Abdullah Shion
- **Icons**: Iconly icon set
- **Fonts**: Google Fonts (Poppins), Plus Jakarta Display

## Version History

### 1.0.0 (2025-12-05)
- Initial release
- Full OpenCart 4.0.1.3 compatibility
- Complete conversion from static theme
- RTL support
- Responsive design
- All original styling preserved
