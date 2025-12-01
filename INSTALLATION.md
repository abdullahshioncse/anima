# Anima Theme - Installation Guide

## Overview

Anima is a modern Arabic RTL (Right-to-Left) e-commerce theme for OpenCart 4.0.1.3. This theme features a beautiful, responsive design with full support for Arabic language and RTL layouts.

## Requirements

- OpenCart 4.0.1.3 or higher
- PHP 8.0 or higher
- MySQL 5.7 or higher

## Installation Steps

### Step 1: Upload Theme Files

Upload all files from this package to your OpenCart installation directory, maintaining the folder structure:

```
/catalog/controller/extension/anima/
/catalog/model/extension/anima/
/catalog/view/theme/anima/
/catalog/language/en-gb/extension/anima/
/admin/controller/extension/theme/
/admin/view/template/extension/theme/
/admin/language/en-gb/extension/theme/
```

### Step 2: Install Theme via Admin Panel

1. Log in to your OpenCart admin panel
2. Go to **Extensions > Extensions**
3. Select **Themes** from the dropdown
4. Find **Anima Theme** in the list
5. Click the **Install** button (green + icon)
6. After installation, click **Edit** (pencil icon)
7. Set **Status** to **Enabled**
8. Configure other settings as desired
9. Click **Save**

### Step 3: Set Anima as Default Theme

1. Go to **System > Settings**
2. Click **Edit** on your store
3. Go to the **Option** tab
4. Under **Theme**, select **Anima**
5. Click **Save**

### Step 4: Clear Cache

1. Go to **Dashboard**
2. Click the **Refresh** buttons for:
   - Theme cache
   - SASS cache
   - Modification cache (if applicable)

## Configuration Options

### General Settings

- **Status**: Enable/disable the theme
- **Sale Banner Enabled**: Show/hide the sale banner at the top
- **Sale Banner Text**: Customize the sale banner message

### Color Settings

- **Primary Color**: Main accent color (default: #ff7c17 - orange)
- **Secondary Color**: Secondary color (default: #1c1c1c - dark)
- **Background Color**: Page background color
- **Text Color**: Main text color

### Product Settings

- **Products Per Page**: Number of products to show per page
- **Description Length**: Maximum characters for product description

### Image Settings

Configure image dimensions for various display contexts:
- Category images
- Thumbnail images
- Popup images
- Product images
- Additional images
- Related product images
- Compare page images
- Wishlist images
- Cart images

### Social Media

Add your social media links:
- Facebook URL
- Twitter URL
- Instagram URL
- YouTube URL
- WhatsApp Number

### Banner Settings

- **Home Banner**: Select a banner to display on the homepage

## Theme Features

### RTL Support

The theme fully supports Right-to-Left layouts for Arabic language. The direction is automatically detected based on the selected language.

### Responsive Design

The theme is fully responsive and works on:
- Desktop (1440px and above)
- Tablet (768px - 1439px)
- Mobile (below 768px)

### Product Labels

Products automatically display labels:
- **New**: Products added within the last 30 days
- **Sale**: Products with special prices
- **Out of Stock**: Products with zero quantity
- **Bestseller**: Top-selling products

### Info Bar

The info bar displays:
- Return & Exchange policy
- 24-hour delivery information
- 100% Original products guarantee

### Newsletter

Built-in newsletter subscription form in the footer.

### Payment Icons

Displays payment method icons:
- Visa
- MasterCard
- Apple Pay

## Customization

### CSS Customization

Add your custom styles to:
```
/catalog/view/theme/anima/stylesheet/custom.css
```

### JavaScript Customization

Add your custom JavaScript to:
```
/catalog/view/theme/anima/javascript/common.js
```

### Template Customization

Templates are located in:
```
/catalog/view/theme/anima/template/
```

## Troubleshooting

### Theme Not Appearing

1. Make sure all files are uploaded correctly
2. Check file permissions (755 for directories, 644 for files)
3. Clear all OpenCart caches
4. Refresh browser cache

### CSS Not Loading

1. Check that CSS files exist in `/catalog/view/theme/anima/stylesheet/`
2. Verify image paths in CSS files are correct (`../image/` not `../img/`)
3. Clear browser cache

### Images Not Displaying

1. Ensure images are copied to `/catalog/view/theme/anima/image/`
2. Check image file permissions
3. Verify image paths in templates

### JavaScript Errors

1. Check browser console for errors
2. Ensure jQuery is loaded (should be included by OpenCart)
3. Verify no conflicts with other extensions

## Database Events (Advanced)

If events are not registered automatically, you can manually add them via SQL:

```sql
INSERT INTO `oc_event` (`code`, `description`, `trigger`, `action`, `status`, `sort_order`) VALUES
('theme_anima', 'Anima Theme - Header Event', 'catalog/view/common/header/before', 'extension/anima/event.headerBefore', 1, 0),
('theme_anima', 'Anima Theme - Footer Event', 'catalog/view/common/footer/before', 'extension/anima/event.footerBefore', 1, 0),
('theme_anima', 'Anima Theme - Product Event', 'catalog/view/product/product/before', 'extension/anima/event.productBefore', 1, 0),
('theme_anima', 'Anima Theme - Category Event', 'catalog/view/product/category/before', 'extension/anima/event.categoryBefore', 1, 0),
('theme_anima', 'Anima Theme - Startup Event', 'catalog/controller/startup/before', 'extension/anima/startup.index', 1, 0);
```

Replace `oc_` with your actual database prefix if different.

## Testing Checklist

After installation, verify:

- [ ] Homepage displays correctly
- [ ] Sale banner appears (if enabled)
- [ ] Header navigation works
- [ ] Search functionality works
- [ ] Product cards display correctly
- [ ] Add to cart works
- [ ] Add to wishlist works
- [ ] Product page displays correctly
- [ ] Category page displays correctly
- [ ] Cart page works
- [ ] Checkout process works
- [ ] Account pages work
- [ ] Footer displays correctly
- [ ] Mobile responsive design works
- [ ] RTL layout works (test with Arabic language)

## Support

For issues or questions:
- GitHub: https://github.com/abdullahshioncse/anima/issues

## License

This theme is released under the GPL-3.0 License.

## Credits

- Design: Anima App
- Development: Converted for OpenCart 4.0.1.3
- Icons: Iconly Sharp icon set
- Fonts: Poppins, Plus Jakarta Display

---

**Enjoy your new Anima theme!**
