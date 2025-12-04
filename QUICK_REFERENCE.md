# Anima Theme - Quick Reference

## Essential Files

### Admin Files
```
admin/controller/theme/anima.php      - Theme configuration controller
admin/language/en-gb/theme/anima.php  - Admin language strings
admin/view/template/theme/anima.twig  - Admin settings interface
```

### Catalog Files
```
catalog/controller/startup/anima.php         - Theme initialization
catalog/view/stylesheet/anima.css            - Main stylesheet
catalog/view/template/common/header.twig     - Site header
catalog/view/template/common/footer.twig     - Site footer
catalog/view/template/common/home.twig       - Homepage
catalog/view/template/product/category.twig  - Category listing
catalog/view/template/product/product.twig   - Product detail
catalog/view/template/information/information.twig - Info pages
```

## Color Palette

```css
--x1c1c1c: #1c1c1c  /* Primary dark (Eerie Black) */
--ff7c17: #ff7c17   /* Accent orange */
--ffffff: #ffffff   /* White */
--ececec: #ebebeb   /* Border gray */
--a4a4a4: #a4a4a4   /* Text gray */
```

## Typography

```css
Font Family: Poppins (400, 500, 600, 700)
Font Family: Plus Jakarta Display-Medium (500)

Font Sizes:
--font-size-xxs: 12px
--font-size-xs: 14px
--font-size-s: 16px
--font-size-m: 18px
--font-size-l: 20px
--font-size-xl: 24px
--font-size-xxl: 32px
```

## Breakpoints

```css
Desktop:  min-width: 1440px
Tablet:   768px - 1439px
Mobile:   max-width: 767px
```

## Key Directories

```
admin/controller/theme/     - Admin controllers
admin/language/en-gb/theme/ - Admin language files
admin/view/template/theme/  - Admin templates
admin/view/image/           - Admin images

catalog/controller/startup/              - Theme initialization
catalog/view/stylesheet/                 - CSS files
catalog/view/template/common/            - Common templates
catalog/view/template/product/           - Product templates
catalog/view/template/information/       - Information templates
catalog/view/theme/anima/image/          - Theme images
```

## Common Template Variables

### Product Variables
```twig
{{ product.name }}           - Product name
{{ product.price }}          - Product price
{{ product.special }}        - Sale price
{{ product.thumb }}          - Product image
{{ product.href }}           - Product URL
{{ product.product_id }}     - Product ID
{{ product.model }}          - Product model/SKU
```

### Category Variables
```twig
{{ heading_title }}          - Page title
{{ description }}            - Category description
{{ products }}               - Products array
{{ breadcrumbs }}            - Breadcrumb array
```

### System Variables
```twig
{{ base }}                   - Base URL
{{ direction }}              - Text direction (ltr/rtl)
{{ lang }}                   - Language code
{{ account }}                - Account URL
{{ shopping_cart }}          - Cart URL
{{ wishlist }}               - Wishlist URL
{{ cart_total }}             - Cart item count
```

## Installation Commands

### SSH Upload
```bash
cd /path/to/opencart/
# Upload files
# Set permissions
chmod 755 -R admin/controller/theme/
chmod 755 -R catalog/view/template/
chmod 644 -R catalog/view/stylesheet/
```

### Clear Cache
```bash
rm -rf system/storage/cache/*
```

## Admin URLs

```
Theme Extensions:  /admin/index.php?route=marketplace/extension&type=theme
Theme Settings:    /admin/index.php?route=theme/anima
Store Settings:    /admin/index.php?route=setting/store
```

## Customization

### Change Colors
Edit: `catalog/view/stylesheet/styleguide.css`
```css
:root {
  --x1c1c1c: #your-color;
  --ff7c17: #your-color;
}
```

### Change Logo
1. System → Settings → Edit
2. Image tab → Upload logo
3. Save

### Add Menu Items
1. Catalog → Categories
2. Add/Edit categories
3. Menu updates automatically

### Modify Sale Banner
Edit: `catalog/view/template/common/header.twig`
Find: `config_theme_anima_sale_banner`

## Troubleshooting

### Theme not showing
```
1. Check: Extensions → Themes → Anima is installed
2. Check: System → Settings → Theme is "Anima"
3. Clear cache
4. Clear browser cache
```

### Styles broken
```
1. Check CSS file paths in header.twig
2. Verify files exist in catalog/view/stylesheet/
3. Check file permissions (644)
4. Check browser console for 404s
```

### Images missing
```
1. Verify: catalog/view/theme/anima/image/ exists
2. Check file permissions (644 files, 755 dirs)
3. Check image paths in templates
```

## File Permissions

```bash
Files:       644 (rw-r--r--)
Directories: 755 (rwxr-xr-x)
```

## Support

- **Email**: Info@sportakw.com
- **Phone**: 00965 22091914
- **Docs**: README.md, INSTALLATION.md

## Version Info

- **Theme**: Anima 1.0.0
- **OpenCart**: 4.0.1.3+
- **PHP**: 7.4+

## Key Features

✓ Responsive design (desktop/tablet/mobile)
✓ RTL support for Arabic
✓ Product listings with filters
✓ Product detail pages
✓ Shopping cart integration
✓ Wishlist support
✓ Newsletter signup
✓ Payment method icons
✓ Admin configuration panel

---

**Quick Start**: Upload → Install → Configure → Activate → Clear Cache → Done!
