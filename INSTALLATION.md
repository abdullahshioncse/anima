# Anima Theme Installation Guide

## Quick Start Guide

This document provides detailed instructions for installing and configuring the Anima theme for OpenCart 4.1.0.3.

## Prerequisites

Before installing the theme, ensure your system meets the following requirements:

- **OpenCart Version**: 4.1.0.3 or higher
- **PHP Version**: 7.4 or higher (8.0+ recommended)
- **MySQL Version**: 5.7 or higher
- **Web Server**: Apache 2.4+ or Nginx 1.18+
- **Required PHP Extensions**:
  - mysqli
  - gd or imagick
  - curl
  - zip
  - mbstring
  - xml

## Installation Methods

### Method 1: Extension Installer (Recommended)

1. **Create Installation Package**
   ```bash
   cd extension
   zip -r anima-theme-1.0.0.zip anima/
   ```

2. **Upload via Admin Panel**
   - Log in to your OpenCart Admin Panel
   - Navigate to `Extensions` → `Installer`
   - Click the "Upload" button
   - Select the `anima-theme-1.0.0.zip` file
   - Wait for the upload and extraction to complete
   - You should see a success message

3. **Install the Theme**
   - Navigate to `Extensions` → `Extensions`
   - From the "Choose the extension type" dropdown, select "Themes"
   - Find "Anima Theme" in the list
   - Click the green "+" (Install) button
   - Once installed, click the pencil icon to edit settings

4. **Configure Theme Settings**
   - Set Status to "Enabled"
   - Update Contact Phone Number (default: 965-22091914)
   - Customize Sale Banner Text
   - Edit Newsletter Subscription Text
   - Click "Save"

5. **Set as Active Theme** (if not already)
   - Navigate to `System` → `Settings`
   - Click "Edit" on your store
   - Go to the "Store" tab
   - In the "Theme" dropdown, select "Anima"
   - Save settings

### Method 2: Manual Installation

1. **Copy Files**
   ```bash
   # Copy the entire extension folder to your OpenCart installation
   cp -r extension/anima /path/to/opencart/extension/
   ```

2. **Set Permissions**
   ```bash
   # Ensure proper file permissions
   chmod -R 755 /path/to/opencart/extension/anima
   chown -R www-data:www-data /path/to/opencart/extension/anima
   ```

3. **Follow steps 3-5 from Method 1** to enable and configure the theme

## Post-Installation Configuration

### 1. Theme Settings

Access theme settings at `Extensions` → `Extensions` → `Themes` → `Anima Theme` (Edit button)

**Available Settings:**
- **Status**: Enable/Disable the theme
- **Contact Phone**: Phone number displayed in header
- **Sale Banner**: Promotional text at top of site
- **Newsletter Text**: Footer newsletter subscription invitation

### 2. Logo Upload

To upload your custom logo:
1. Navigate to `System` → `Settings`
2. Click "Edit" on your store
3. Go to the "Image" section
4. Upload your logo (recommended size: 200x60 pixels)
5. Save settings

### 3. Configure Categories

The theme supports the following main categories (update to match your store):
- Men's Clothing (ملابس رجالية)
- Women's Clothing (ملابس نسائية)
- Accessories (إكسسوارات)
- Sale (تخفيضات)

Create these categories in `Catalog` → `Categories`

### 4. Set Up Featured Products

1. Navigate to `Extensions` → `Extensions`
2. Select "Modules" from the dropdown
3. Install and configure "Featured Products"
4. Add products to display in the "You May Like" section

### 5. Configure Latest Products

1. Navigate to `Extensions` → `Extensions`
2. Select "Modules" from the dropdown
3. Install and configure "Latest Products"
4. These will appear in the "New In" section on homepage

### 6. Arabic Language Configuration

To enable Arabic/RTL support:

1. **Install Arabic Language Pack**
   - Navigate to `System` → `Localisation` → `Languages`
   - Click "Add New" if Arabic is not already installed
   - Set the following:
     - Language Name: Arabic
     - Code: ar
     - Locale: ar_AE.UTF-8,ar_AE,ar
     - Status: Enabled
     - Sort Order: 2

2. **Set RTL Direction**
   - The theme automatically detects Arabic language and applies RTL layout
   - Ensure `direction` is set to "rtl" in language settings

3. **Arabic Language Files**
   - Arabic translations are included in:
     ```
     extension/anima/catalog/language/ar-ar/theme/anima.php
     ```

## Verification Steps

After installation, verify the theme is working correctly:

### 1. Check Homepage
- Visit your store's homepage
- Verify the hero banner is displayed
- Check that the "You May Like" products section appears
- Verify the "New In" products section with category tabs
- Confirm footer displays correctly with payment icons

### 2. Test Product Pages
- Navigate to a category page
- Click on a product
- Verify product detail page displays correctly
- Test "Add to Cart" functionality

### 3. Test Cart and Checkout
- Add a product to cart
- View cart page
- Verify cart items display correctly
- Test checkout process

### 4. Test Account Pages
- Try registering a new account
- Test login functionality
- Access account dashboard
- Add products to wishlist
- View order history

### 5. Test Mobile Responsiveness
- Open site on mobile device or use browser dev tools
- Verify responsive layouts work correctly
- Test mobile navigation menu
- Check mobile product cards display properly

### 6. Test RTL/Arabic
- Switch language to Arabic (if configured)
- Verify text direction changes to right-to-left
- Check Arabic text displays correctly
- Verify layout remains intact in RTL mode

## Troubleshooting

### CSS Not Loading

**Problem**: Styles not applied, site looks broken

**Solutions**:
1. Clear OpenCart cache:
   ```bash
   rm -rf system/storage/cache/*
   ```
2. Check file permissions:
   ```bash
   chmod -R 755 extension/anima/catalog/view/stylesheet/
   ```
3. Verify CSS paths in browser console (F12)

### Images Not Displaying

**Problem**: Images show as broken links

**Solutions**:
1. Verify image folder permissions:
   ```bash
   chmod -R 755 extension/anima/catalog/view/image/
   ```
2. Check image paths in browser console
3. Ensure all images were copied correctly:
   ```bash
   ls -la extension/anima/catalog/view/image/ | wc -l
   # Should show 169 files
   ```

### Theme Not Appearing in Extensions List

**Problem**: Can't find theme in Extensions → Themes

**Solutions**:
1. Verify `install.json` exists:
   ```bash
   cat extension/anima/install.json
   ```
2. Check file structure is correct
3. Re-upload the extension package
4. Clear OpenCart cache

### Admin Configuration Page Not Working

**Problem**: Can't access theme settings

**Solutions**:
1. Verify admin controller exists:
   ```bash
   ls -la extension/anima/admin/controller/theme/anima.php
   ```
2. Check file permissions
3. Review OpenCart error logs in `system/storage/logs/`

### Products Not Displaying on Homepage

**Problem**: Homepage shows no products in featured/latest sections

**Solutions**:
1. Install and configure "Featured Products" module
2. Install and configure "Latest Products" module
3. Ensure products exist in your catalog
4. Verify products are marked as "Enabled"
5. Check product images are uploaded

### Arabic/RTL Not Working

**Problem**: Arabic text displays but layout is still LTR

**Solutions**:
1. Verify Arabic language is installed and enabled
2. Check language code is set to "ar" or "ar-ar"
3. Clear browser cache
4. Clear OpenCart cache
5. Verify RTL CSS files are loaded

## Customization

### Modifying Colors

To change theme colors:

1. Edit the CSS files:
   ```
   extension/anima/catalog/view/stylesheet/desktop-1.css
   extension/anima/catalog/view/stylesheet/globals.css
   ```

2. Search for color values (e.g., `#1c1c1c`, `#ffffff`)
3. Replace with your preferred colors
4. Clear cache to see changes

### Adding Custom CSS

Create a new file:
```
extension/anima/catalog/view/stylesheet/custom.css
```

Add your custom styles, then include it in the header template:
```twig
<link rel="stylesheet" type="text/css" href="catalog/view/theme/extension/anima/stylesheet/custom.css" />
```

### Modifying Templates

All templates are located in:
```
extension/anima/catalog/view/template/
```

Edit the `.twig` files to customize layout and structure.

**Important**: Always backup files before editing!

## Performance Optimization

### 1. Enable Caching
- Navigate to `System` → `Settings` → `Edit Store`
- Go to "Server" tab
- Enable "Use Cache"

### 2. Image Optimization
- Optimize all product images before upload
- Recommended formats: WebP or optimized JPEG
- Use appropriate image sizes (don't upload oversized images)

### 3. CSS/JS Minification
- Consider using a minification extension
- Combine CSS files if possible
- Enable Gzip compression on server

### 4. CDN Integration
- Use a CDN for static assets
- Configure CDN URL in OpenCart settings

## Backup and Maintenance

### Creating Backups

Before making any changes, create a backup:

```bash
# Backup theme files
tar -czf anima-theme-backup-$(date +%Y%m%d).tar.gz extension/anima/

# Backup database
mysqldump -u username -p database_name > opencart-backup-$(date +%Y%m%d).sql
```

### Regular Maintenance

1. **Weekly**:
   - Check error logs
   - Test checkout process
   - Verify payment gateway functionality

2. **Monthly**:
   - Update OpenCart core (if updates available)
   - Review and optimize database
   - Check for broken links or images

3. **Quarterly**:
   - Review theme performance
   - Update any customizations
   - Test on latest browsers

## Updating the Theme

When a new version is released:

1. **Backup current version** (see above)
2. **Download new version**
3. **Review changelog** for breaking changes
4. **Test on staging site** first
5. **Upload and install** new version
6. **Clear all caches**
7. **Test thoroughly** before going live

## Support and Resources

- **Documentation**: See README.md in root folder
- **GitHub Repository**: https://github.com/abdullahshioncse/anima
- **Issue Tracker**: https://github.com/abdullahshioncse/anima/issues
- **OpenCart Forums**: https://forum.opencart.com/

## Additional Notes

### Browser Compatibility

The theme has been tested on:
- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+
- Mobile Safari (iOS 13+)
- Chrome Mobile (Android 10+)

### Known Limitations

1. Theme is optimized for OpenCart 4.1.0.3
2. Some third-party extensions may require CSS adjustments
3. Custom modifications should be documented for future updates

### Best Practices

1. Always test changes on a staging site first
2. Keep detailed records of customizations
3. Use version control (Git) for theme files
4. Regularly backup theme files and database
5. Monitor site performance after theme activation
6. Test thoroughly on mobile devices

## License

This theme is released under the MIT License. See LICENSE file for details.

## Credits

- **Original Design**: Anima Export
- **Developer**: Abdullah Shion
- **OpenCart Version**: 4.1.0.3
- **Theme Version**: 1.0.0

---

Last Updated: December 2024
Version: 1.0.0
