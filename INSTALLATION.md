# Anima Theme - Installation Guide

## Table of Contents
1. [Pre-Installation Requirements](#pre-installation-requirements)
2. [Installation Steps](#installation-steps)
3. [Configuration](#configuration)
4. [Verification](#verification)
5. [Troubleshooting](#troubleshooting)

## Pre-Installation Requirements

### Server Requirements
- **OpenCart Version**: 4.0.1.3 or higher
- **PHP Version**: 7.4 or higher
- **MySQL**: 5.7+ or MariaDB 10.2+
- **Web Server**: Apache 2.4+ or Nginx 1.10+
- **Required PHP Extensions**:
  - curl
  - gd
  - json
  - mbstring
  - mysqli
  - openssl
  - zip

### File System Requirements
- Write permissions on `system/storage/` directory
- Write permissions on `image/` directory
- File upload limit: Minimum 20MB

## Installation Steps

### Step 1: Download and Extract

Download the Anima theme package and extract it to your local computer.

### Step 2: Upload Files via FTP/SFTP

Upload the entire theme directory structure to your OpenCart installation root:

```
your-opencart-root/
├── admin/
│   ├── controller/theme/anima.php
│   ├── language/en-gb/theme/anima.php
│   └── view/
│       ├── image/ (all theme images)
│       └── template/theme/anima.twig
├── catalog/
│   ├── controller/startup/anima.php
│   └── view/
│       ├── stylesheet/ (all CSS files)
│       └── template/ (all Twig templates)
├── system/
│   ├── helper/
│   └── library/
└── install.json
```

**FTP Commands:**
```bash
# Connect to your server
ftp your-server.com
# or
sftp user@your-server.com

# Navigate to OpenCart root
cd /public_html/

# Upload directories
put -r admin
put -r catalog
put -r system
put install.json
```

### Step 3: Set Correct Permissions

After uploading, set proper file permissions:

```bash
# SSH into your server
ssh user@your-server.com

# Navigate to OpenCart root
cd /path/to/opencart/

# Set permissions
chmod 755 -R admin/controller/theme/
chmod 755 -R admin/language/en-gb/theme/
chmod 755 -R admin/view/template/theme/
chmod 644 -R admin/view/image/

chmod 755 -R catalog/controller/startup/
chmod 755 -R catalog/view/stylesheet/
chmod 755 -R catalog/view/template/
chmod 644 -R catalog/view/theme/anima/image/

chmod 755 -R system/helper/
chmod 755 -R system/library/
```

Or using a simpler approach:
```bash
find admin/controller/theme/ -type d -exec chmod 755 {} \;
find admin/controller/theme/ -type f -exec chmod 644 {} \;
find catalog/view/template/ -type d -exec chmod 755 {} \;
find catalog/view/template/ -type f -exec chmod 644 {} \;
```

### Step 4: Install Theme via Admin Panel

1. **Login to Admin Panel**
   - URL: `https://your-store.com/admin/`
   - Enter your admin credentials

2. **Navigate to Extensions**
   - Click on: **Extensions** → **Extensions**
   - From the "Choose the extension type" dropdown, select: **Themes**

3. **Install Anima Theme**
   - Locate "Anima" in the theme list
   - Click the green **"+"** (Install) button
   - Wait for confirmation message: "Success: You have modified themes!"

4. **Configure Theme**
   - Click the blue **"Edit"** button (pencil icon) next to Anima
   - Set **Status** to **"Enabled"**
   - Review settings (RTL support is enabled by default)
   - Click **"Save"** button

### Step 5: Set as Default Theme

1. **Navigate to Store Settings**
   - Go to: **System** → **Settings**
   - Click **"Edit"** button next to your store

2. **Configure Store**
   - Click on the **"Store"** tab
   - In the **"Theme"** dropdown, select: **"Anima"**
   - Click **"Save"** button (top-right)

3. **Confirm Changes**
   - You should see: "Success: You have modified settings!"

### Step 6: Clear Cache

Clear all caches to ensure the theme loads properly:

**Via Admin Panel:**
1. Go to: **Dashboard**
2. Look for **"System"** section
3. Click **"Clear Cache"** or similar option

**Via SSH:**
```bash
cd /path/to/opencart/
rm -rf system/storage/cache/*
```

**Via FTP:**
1. Navigate to `system/storage/cache/`
2. Delete all files and folders inside (keep the directory itself)

## Configuration

### Basic Configuration

#### 1. Logo Upload
1. Go to: **System** → **Settings** → **Edit**
2. Click on the **"Image"** tab
3. Upload your logo image
4. Recommended size: 200px × 50px (PNG with transparent background)
5. Save changes

#### 2. Store Information
1. Go to: **System** → **Settings** → **Edit**
2. Update:
   - Store Name
   - Store Owner
   - Address
   - Email
   - Telephone
3. Save changes

#### 3. Categories Setup
1. Go to: **Catalog** → **Categories**
2. Create/Edit categories:
   - Men's Clothing (ملابس رجالية)
   - Women's Clothing (ملابس نسائية)
   - Accessories (إكسسوارات)
   - Sale (تخفيضات)
3. Categories will automatically appear in the navigation menu

### Advanced Configuration

#### RTL (Right-to-Left) Support
RTL is enabled by default for Arabic. To modify:
1. Edit: `catalog/controller/startup/anima.php`
2. Look for: `$this->config->set('theme_anima_rtl', 1);`
3. Set to `0` to disable, `1` to enable

#### Custom Colors
To change the color scheme:
1. Edit: `catalog/view/stylesheet/styleguide.css`
2. Modify CSS variables:
```css
:root {
  --x1c1c1c: #1c1c1c;  /* Primary dark - change to your color */
  --ff7c17: #ff7c17;    /* Accent orange - change to your color */
  --ffffff: #ffffff;    /* White */
  --ececec: #ebebeb;    /* Border gray */
}
```
3. Save and clear cache

#### Sale Banner
To customize the top sale banner:
1. Edit header template: `catalog/view/template/common/header.twig`
2. Find line with sale banner text
3. Change the default text or disable by setting `config_theme_anima_sale_banner` to empty

## Verification

### Check Theme Installation

1. **Visit Your Store**
   - Open: `https://your-store.com/`
   - You should see the Anima theme loaded

2. **Verify Elements**
   - ✅ Header with logo and navigation
   - ✅ Sale banner at top
   - ✅ Feature information bar
   - ✅ Product cards displaying correctly
   - ✅ Footer with newsletter and menus
   - ✅ All icons loading properly

3. **Test Responsive Design**
   - Open Developer Tools (F12)
   - Toggle device toolbar
   - Test on different screen sizes:
     - Desktop: 1440px+
     - Tablet: 768px - 1439px
     - Mobile: < 768px

4. **Test Functionality**
   - ✅ Navigation menu works
   - ✅ Search button appears
   - ✅ Cart icon visible
   - ✅ Wishlist icon visible
   - ✅ Product "Add to Cart" buttons work
   - ✅ Category pages load correctly
   - ✅ Product pages display properly

## Troubleshooting

### Theme Not Showing

**Problem**: Old theme still displays after installation

**Solutions**:
1. Clear browser cache (Ctrl+Shift+Delete)
2. Clear OpenCart cache
3. Check theme is set in System → Settings → Store tab
4. Verify theme status is "Enabled" in Extensions → Themes

### Styles Not Loading

**Problem**: Page loads but without styles/broken layout

**Solutions**:
1. Check CSS file paths in `catalog/view/template/common/header.twig`
2. Verify all CSS files exist in `catalog/view/stylesheet/`
3. Check file permissions (should be 644)
4. Clear cache
5. Check browser console for 404 errors

### Images Not Displaying

**Problem**: Icons or images showing broken links

**Solutions**:
1. Verify images exist in `catalog/view/theme/anima/image/`
2. Check image paths in templates
3. Verify file permissions (644 for files, 755 for directories)
4. Check image URLs in browser console

### Permission Errors

**Problem**: "Warning: You do not have permission to modify..."

**Solutions**:
1. Log in with admin account
2. Go to: **System** → **Users** → **User Groups**
3. Edit administrator group
4. Check all "Access Permission" and "Modify Permission" boxes
5. Save changes

### 500 Internal Server Error

**Problem**: Server error when accessing pages

**Solutions**:
1. Check PHP error logs
2. Verify PHP version is 7.4+
3. Check file permissions
4. Verify all required PHP extensions are installed
5. Check Apache/Nginx error logs

### Mobile Menu Not Working

**Problem**: Mobile hamburger menu doesn't appear or work

**Solutions**:
1. Clear cache
2. Check JavaScript console for errors
3. Verify mobile CSS files are loaded
4. Test on actual mobile device, not just browser emulation

## Support and Updates

### Getting Help

- **Email**: Info@sportakw.com
- **Phone**: 00965 22091914
- **Documentation**: See README.md for feature details

### Backup Before Updates

Always backup before making changes:
```bash
# Backup current theme files
cd /path/to/opencart/
tar -czf anima-backup-$(date +%Y%m%d).tar.gz admin/controller/theme/anima.php catalog/view/template/ catalog/view/stylesheet/anima.css
```

### Version Compatibility

This theme is specifically designed for:
- OpenCart 4.0.1.3 and higher (4.0.x series)
- May require updates for OpenCart 5.x or higher

## Additional Resources

- [OpenCart Documentation](https://docs.opencart.com/)
- [Twig Template Documentation](https://twig.symfony.com/doc/)
- [CSS Grid Guide](https://css-tricks.com/snippets/css/complete-guide-grid/)

---

**Last Updated**: December 2024
**Version**: 1.0.0
**Compatibility**: OpenCart 4.0.1.3+
