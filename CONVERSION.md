# Anima Theme Conversion Documentation

## Overview
This document describes the conversion process from the static Anima theme to OpenCart 4.0.1.3 compatible theme.

## Original Static Files

### HTML Pages
- **desktop-1.html**: Homepage with hero banner, product showcase, info bar
- **desktop-2.html**: Product detail page with images, options, and add to cart
- **desktop-3.html**: Category page with product grid
- **desktop-4.html**: Content/Policy page (Return Policy)
- **iphone-13-u38-14-*.html**: Mobile responsive versions

### CSS Files
- **globals.css**: Base CSS reset and common styles
- **styleguide.css**: Typography and color variables
- **desktop-1.css**: Homepage styles
- **desktop-2.css**: Product detail page styles
- **desktop-3.css**: Category page styles
- **desktop-4.css**: Content page styles
- **iphone-13-u38-14-*.css**: Mobile responsive styles

### Assets
- **172 images**: Icons, logos, product images, UI elements
- **1 font**: PlusJakartaDisplay-Medium.ttf

## Conversion Mapping

### HTML to Twig Templates

| Static File | OpenCart Template | Description |
|-------------|------------------|-------------|
| desktop-1.html (header) | catalog/view/template/common/header.twig | Site header with navigation |
| desktop-1.html (main) | catalog/view/template/common/home.twig | Homepage content |
| desktop-3.html (footer) | catalog/view/template/common/footer.twig | Site footer |
| desktop-2.html | catalog/view/template/product/product.twig | Product detail page |
| desktop-3.html | catalog/view/template/product/category.twig | Category listing |
| desktop-4.html | catalog/view/template/information/information.twig | Content pages |

### CSS Organization

| Original CSS | OpenCart CSS | Purpose |
|--------------|--------------|---------|
| globals.css + styleguide.css | catalog/view/stylesheet/anima.css | Base styles and typography |
| desktop-1.css | catalog/view/stylesheet/anima-home.css | Homepage styles |
| desktop-2.css + desktop-3.css | catalog/view/stylesheet/anima-product.css | Product/category styles |
| iphone-13-u38-14-*.css | catalog/view/stylesheet/anima-responsive.css | Mobile responsive styles |

### Asset Migration

| Original Location | OpenCart Location | Notes |
|------------------|------------------|-------|
| /img/*.* | catalog/view/theme/anima/image/*.* | All images moved |
| /fonts/*.ttf | catalog/view/javascript/*.ttf | Font moved to standard location |

## Key Features Preserved

### Design Elements
✓ All original colors maintained
✓ Typography unchanged (Poppins, Plus Jakarta Display)
✓ Layout structure preserved
✓ Spacing and sizing intact
✓ Icon set complete
✓ RTL (right-to-left) support maintained

### Interactive Elements
✓ Product cards with wishlist
✓ Add to cart functionality
✓ Size and color options
✓ Quantity selector
✓ Navigation menu
✓ Search functionality
✓ Newsletter signup

### Responsive Design
✓ Desktop layout (1440px+)
✓ Tablet layout (768px-1439px)
✓ Mobile layout (<768px)
✓ Touch-friendly controls

## OpenCart Integration

### Twig Variables Used

#### Common Variables
- `{{ header }}` - Header template include
- `{{ footer }}` - Footer template include
- `{{ base }}` - Base URL
- `{{ name }}` - Store name
- `{{ logo }}` - Store logo URL
- `{{ telephone }}` - Store phone number

#### Navigation
- `{{ categories }}` - Category menu items
- `{{ account }}` - Account page URL
- `{{ shopping_cart }}` - Cart page URL
- `{{ wishlist }}` - Wishlist page URL
- `{{ search }}` - Search page URL

#### Product Variables
- `{{ products }}` - Product array
- `{{ product.name }}` - Product name
- `{{ product.price }}` - Product price
- `{{ product.special }}` - Special price
- `{{ product.thumb }}` - Product thumbnail
- `{{ product.href }}` - Product URL
- `{{ product.model }}` - Product model/SKU

#### Product Detail Variables
- `{{ heading_title }}` - Product title
- `{{ description }}` - Product description
- `{{ images }}` - Product images array
- `{{ options }}` - Product options
- `{{ stock }}` - Stock status
- `{{ minimum }}` - Minimum quantity

#### Category Variables
- `{{ heading_title }}` - Category title
- `{{ product_total }}` - Total products count
- `{{ pagination }}` - Pagination HTML

### JavaScript Integration
- AJAX add to cart
- Wishlist functionality
- Quantity selectors
- Option selection
- Form validation

## Administrative Files

### Controller
- **admin/controller/theme/anima.php**: Theme settings controller
  - Install method
  - Uninstall method
  - Configuration save method

### Language
- **admin/language/en-gb/theme/anima.php**: English language strings
  - Heading texts
  - Success messages
  - Error messages

### Template
- **admin/view/template/theme/anima.twig**: Admin configuration interface
  - Theme status toggle
  - Save/back buttons
  - Breadcrumb navigation

## Metadata
- **install.json**: Theme metadata
  - Theme name
  - Version
  - Description
  - Author
  - Link

## Testing Recommendations

### Visual Testing
1. Homepage layout and hero banner
2. Product grid display
3. Product detail page
4. Category listings
5. Footer links and newsletter
6. Mobile responsive views
7. RTL text rendering

### Functional Testing
1. Add to cart functionality
2. Wishlist add/remove
3. Product option selection
4. Quantity increase/decrease
5. Navigation menu clicks
6. Search functionality
7. Newsletter form submission

### Cross-browser Testing
- Chrome (desktop/mobile)
- Firefox (desktop/mobile)
- Safari (desktop/mobile)
- Edge (desktop)

### Performance Testing
- Image loading
- CSS loading order
- Font loading
- JavaScript execution
- Mobile performance

## Customization Guide

### Changing Store Name/Logo
Edit `catalog/view/template/common/header.twig`:
```twig
<div class="logo poppins-medium-eerie-black-20px">
  {% if logo %}
  <a href="{{ home }}"><img src="{{ logo }}" title="{{ name }}" alt="{{ name }}" /></a>
  {% else %}
  <a href="{{ home }}">{{ name }}</a>
  {% endif %}
</div>
```

### Modifying Colors
Edit `catalog/view/stylesheet/anima.css`:
```css
:root { 
  --ff7c17: #ff7c17;  /* Change primary color */
  --x1c1c1c: #1c1c1c; /* Change text color */
  --ffffff: #ffffff;  /* Change background color */
  --ececec: #ebebeb;  /* Change border color */
}
```

### Adding Custom Sections
1. Create new Twig template in `catalog/view/template/`
2. Add corresponding CSS in `catalog/view/stylesheet/`
3. Link template in parent template using `{{ include() }}`

### Modifying Product Display
Edit `catalog/view/template/product/category.twig` or `home.twig` to change product card layout.

## Known Limitations

1. **Static Content**: Some text content is hardcoded in Arabic and should be moved to language files
2. **Hero Image**: Hero banner image is static and should be made configurable
3. **Info Bar**: The top info bar content is hardcoded
4. **Sale Banner**: Sale percentage is hardcoded

## Future Enhancements

- [ ] Move all Arabic text to language files
- [ ] Add theme configuration options for colors
- [ ] Make hero banner configurable
- [ ] Add multiple layout options
- [ ] Implement theme customizer
- [ ] Add more page templates (blog, contact, etc.)
- [ ] Create theme widget system
- [ ] Add product quick view
- [ ] Implement mega menu

## Version Control

### v1.0.0 (2025-12-05)
- Initial conversion from static theme
- All templates created
- All styles converted
- Full asset migration
- OpenCart 4.0.1.3 compatibility
- RTL support maintained
- Responsive design implemented

## Support and Maintenance

For issues or questions:
- GitHub: https://github.com/abdullahshioncse/anima
- Email: Contact repository owner

## License
This theme follows OpenCart license requirements.
