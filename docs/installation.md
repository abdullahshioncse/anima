# Anima Theme Installation Guide for OpenCart 4.x

## Table of Contents

1. [Prerequisites](#prerequisites)
2. [Installation Steps](#installation-steps)
3. [Post-Installation Configuration](#post-installation-configuration)
4. [Module Setup](#module-setup)
5. [Customization](#customization)
6. [Troubleshooting](#troubleshooting)

---

## Prerequisites

Before installing the Anima theme, ensure you have:

- OpenCart 4.1.x or higher installed and running
- PHP 8.1 or higher
- MySQL 5.7 or MariaDB 10.2+
- FTP/SFTP access or File Manager access to your hosting
- Admin access to your OpenCart installation

---

## Installation Steps

### Step 1: Download the Theme

Download the Anima theme files from the repository. The theme is located in the `catalog/view/theme/anima/` directory.

### Step 2: Upload Files

Using FTP/SFTP or your hosting's File Manager:

1. Navigate to your OpenCart installation root directory
2. Upload the entire `catalog/view/theme/anima/` folder
3. Ensure the folder structure is:
   ```
   your-opencart/
   └── catalog/
       └── view/
           └── theme/
               └── anima/
                   ├── fonts/
                   ├── image/
                   ├── javascript/
                   ├── stylesheet/
                   └── template/
   ```

### Step 3: Set File Permissions

Set the following permissions:
- Folders: 755
- Files: 644

```bash
chmod -R 755 catalog/view/theme/anima/
find catalog/view/theme/anima/ -type f -exec chmod 644 {} \;
```

### Step 4: Activate the Theme

1. Log in to your OpenCart Admin panel
2. Navigate to **System > Settings**
3. Click the **Edit** button on your store
4. Go to the **Option** tab
5. Scroll down to the **Theme** section
6. Select **anima** from the dropdown menu
7. Click **Save**

### Step 5: Clear Cache

1. Go to **Dashboard**
2. Click the blue **Refresh** icon in the top right
3. This clears all OpenCart caches

---

## Post-Installation Configuration

### Configure Store Information

1. Go to **System > Settings > Edit**
2. Fill in the **General** tab:
   - Store Name: Your store name
   - Store Owner: Your name
   - Address, Email, Telephone
3. Save changes

### Set Up Homepage Layout

1. Go to **Design > Layouts**
2. Edit the **Home** layout
3. Add modules:
   - **Content Top**: Banner, Featured Products, Latest Products
   - **Content Bottom**: (optional modules)

### Configure Categories

1. Go to **Catalog > Categories**
2. Create your category structure
3. For each category:
   - Add name (in Arabic for RTL)
   - Set Parent Category
   - Add image
   - Enable status

---

## Module Setup

### Banner/Carousel Module

1. Go to **Design > Banners**
2. Click **Add New**
3. Name: "Homepage Slideshow"
4. Add banner images:
   - Image: Upload banner image
   - Title: Banner title
   - Link: Destination URL
5. Save

6. Go to **Extensions > Extensions > Modules**
7. Install and edit the **Carousel** module
8. Select your banner group
9. Set dimensions: Width 1440px, Height 500px
10. Save

### Featured Products Module

1. Go to **Extensions > Extensions > Modules**
2. Install and edit **Featured**
3. Configure:
   - Name: منتجات قد تعجبك
   - Products: Select products to feature
   - Limit: 4-8 products
   - Width/Height: 300x300
4. Save

### Latest Products Module

1. Go to **Extensions > Extensions > Modules**
2. Install and edit **Latest**
3. Configure:
   - Name: وصل حديثًا
   - Limit: 4-8 products
   - Width/Height: 300x300
4. Save

### Bestseller Module (Optional)

1. Install and edit **Bestsellers** module
2. Configure similar to Featured module
3. Add to layout

### Newsletter Module (Optional)

The theme includes a newsletter subscription form in the footer. To enable full functionality:

1. Install a newsletter extension from the OpenCart marketplace
2. The extension should provide a route at `extension/module/newsletter.subscribe`
3. The theme will gracefully fall back to showing a success message if no extension is installed

**Note**: OpenCart doesn't include built-in newsletter functionality. Without a newsletter extension, the form will show a success message but won't actually store subscriptions.

---

## Customization

### Changing the Logo

The theme uses text logo by default. To use an image logo:

1. Edit `catalog/view/theme/anima/template/common/header.twig`
2. Find the logo section:
   ```twig
   <a href="{{ home }}" class="logo poppins-medium-eerie-black-20px">{{ logo_text|default('LOGO') }}</a>
   ```
3. Replace with:
   ```twig
   <a href="{{ home }}" class="logo">
       <img src="{{ logo }}" alt="{{ name }}" />
   </a>
   ```

### Changing Colors

Edit `catalog/view/theme/anima/stylesheet/styleguide.css`:

```css
:root { 
    --ff7c17: #ff7c17;      /* Primary color - change to your brand color */
    --x1c1c1c: #1c1c1c;     /* Dark/text color */
    --ffffff: #ffffff;       /* Background color */
}
```

### Adding Custom CSS

Add styles to `catalog/view/theme/anima/stylesheet/custom.css`:

```css
/* Your custom styles here */
.your-custom-class {
    /* styles */
}
```

### Modifying Templates

Templates are in `catalog/view/theme/anima/template/`. Common customizations:

- `common/header.twig` - Header, navigation, sale banner
- `common/footer.twig` - Footer, payment icons, links
- `common/home.twig` - Homepage layout
- `product/product.twig` - Product page
- `product/category.twig` - Category listing

---

## Troubleshooting

### Theme Not Appearing in Dropdown

**Problem**: The anima theme doesn't appear in the theme selection dropdown.

**Solution**:
1. Verify folder is named exactly `anima` (lowercase)
2. Check it's in the correct path: `catalog/view/theme/anima/`
3. Ensure folder has correct permissions (755)
4. Clear OpenCart cache

### Images Not Loading

**Problem**: Theme images don't display.

**Solution**:
1. Check all images are in `catalog/view/theme/anima/image/`
2. Verify image file permissions (644)
3. Check for correct paths in CSS files
4. Look for 404 errors in browser console

### CSS Styles Not Applying

**Problem**: Theme looks broken or unstyled.

**Solution**:
1. Clear browser cache (Ctrl+F5)
2. Clear OpenCart cache
3. Check stylesheet files exist in `catalog/view/theme/anima/stylesheet/`
4. Check browser console for CSS loading errors

### RTL Layout Issues

**Problem**: Arabic text or layout not displaying correctly.

**Solution**:
1. Ensure `dir="rtl"` is in the HTML tag
2. Check CSS direction properties
3. Add RTL-specific styles in custom.css

### JavaScript Errors

**Problem**: Add to cart, wishlist, or other features not working.

**Solution**:
1. Check browser console for JavaScript errors
2. Ensure jQuery is loaded before theme JS
3. Verify `common.js` is in `catalog/view/theme/anima/javascript/`
4. Check AJAX URLs are correct

### Mobile Menu Not Working

**Problem**: Hamburger menu doesn't open on mobile.

**Solution**:
1. Check mobile menu HTML structure in header.twig
2. Verify JavaScript event handlers in common.js
3. Add missing mobile-specific CSS

---

## Support

For additional help:
- Check OpenCart documentation: https://docs.opencart.com/
- OpenCart forums: https://forum.opencart.com/
- Open an issue on GitHub

---

## Version History

- **1.0.0** - Initial release
  - Full OpenCart 4.x compatibility
  - RTL Arabic support
  - Core templates converted
  - Module templates created
