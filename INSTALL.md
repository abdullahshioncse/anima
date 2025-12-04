# Anima Theme - Installation Guide

## Prerequisites

Before installing the Anima Theme, ensure you have:

- OpenCart 4.1.0.3 or higher installed
- PHP 8.0 or higher
- MySQL 5.7 or higher
- FTP/SFTP access or file manager access to your server
- Admin access to your OpenCart store

## Installation Methods

### Method 1: Extension Installer (Recommended)

This is the easiest method for installing the Anima theme.

1. **Prepare the Theme Package**
   ```bash
   cd /path/to/anima
   zip -r anima.ocmod.zip anima.ocmod/
   ```

2. **Upload via Admin Panel**
   - Log in to your OpenCart admin panel
   - Navigate to **Extensions → Installer**
   - Click the **Upload** button
   - Select the `anima.ocmod.zip` file
   - Wait for the upload to complete (may take 1-2 minutes due to size)

3. **Install the Extension**
   - Navigate to **Extensions → Extensions**
   - From the dropdown, select **Themes**
   - Find **Anima Theme** in the list
   - Click the **Install** button (green plus icon)
   - Wait for the success message

4. **Enable the Theme**
   - Click the **Edit** button (blue pencil icon) next to Anima Theme
   - Set **Status** to **Enabled**
   - Configure other settings as needed (see Configuration section)
   - Click **Save**

5. **Set as Active Theme**
   - Navigate to **System → Settings**
   - Click **Edit** for your store
   - Go to the **General** tab
   - In the **Theme** dropdown, select **Anima**
   - Click **Save**

6. **Clear Cache**
   - Navigate to **Dashboard**
   - Click the **Settings** gear icon in the top right
   - Click **Refresh** button to clear the cache
   - Or manually: **System → Maintenance → Refresh**

### Method 2: Manual FTP Installation

Use this method if you have FTP/SFTP access to your server.

1. **Upload Files**
   - Connect to your server via FTP/SFTP
   - Navigate to your OpenCart installation directory
   - Upload the contents of `anima.ocmod/` to the corresponding directories:
     ```
     anima.ocmod/admin/          → upload/admin/
     anima.ocmod/catalog/        → upload/catalog/
     anima.ocmod/image/          → upload/image/
     anima.ocmod/install.json    → (not needed for manual install)
     ```

2. **Set Permissions**
   - Ensure proper file permissions (typically 644 for files, 755 for directories)
   - Specific directories may need write permissions for cache and logs

3. **Install via Admin**
   - Log in to OpenCart admin panel
   - Navigate to **Extensions → Extensions**
   - Select **Themes** from dropdown
   - Find **Anima Theme**
   - Click **Install** then **Edit**
   - Enable the theme and configure settings
   - Click **Save**

4. **Activate Theme**
   - Go to **System → Settings**
   - Edit your store settings
   - Select **Anima** as the theme
   - Save changes

5. **Clear Cache**
   - Clear OpenCart cache via **System → Maintenance → Refresh**

## Configuration

After installation, configure the theme settings:

### General Settings

1. Navigate to **Extensions → Extensions → Themes**
2. Click **Edit** on Anima Theme
3. Configure the following:

**General Tab:**
- **Status**: Enable/disable the theme
- **Phone Number**: Display phone number in header (default: 965-22091914)
- **Sale Banner Text**: Promotional banner text (supports Arabic)

**Image Settings Tab:**
- **Category Image Width/Height**: Default 300x300
- **Product Image Width/Height**: Default 800x800
- **Thumbnail Width/Height**: Default 100x100

**Product Display Tab:**
- **Products Per Page**: Number of products shown per page (default: 16)
- **Products Per Row**: Grid columns 2-6 (default: 4)

**Style & Colors Tab:**
- **Primary Color**: Main theme color (default: #ff7c17)
- **Secondary Color**: Secondary theme color (default: #1c1c1c)
- **Font Family**: Main font (default: Poppins)
- **Custom CSS**: Add custom CSS rules

4. Click **Save**

## Verification

After installation, verify the theme is working:

1. **Frontend Check**
   - Visit your store's frontend
   - Verify the Anima theme is displaying correctly
   - Check responsive design on mobile devices
   - Test RTL layout if using Arabic language

2. **Test Key Features**
   - Browse product categories
   - View product details
   - Add items to cart
   - Test checkout process
   - Verify account pages

3. **Check Assets**
   - Ensure images are loading
   - Verify fonts are displaying correctly
   - Check CSS is applied properly

## Troubleshooting

### Theme Not Appearing

**Problem**: Theme doesn't show in Extensions list
**Solution**: 
- Clear cache: **System → Maintenance → Refresh**
- Check file permissions
- Verify all files were uploaded correctly

### Images Not Loading

**Problem**: Theme images don't display
**Solution**:
- Check image paths in templates
- Verify images are in `image/anima/` and `catalog/view/theme/anima/image/`
- Clear browser cache
- Check server permissions

### CSS Not Applied

**Problem**: Theme looks unstyled
**Solution**:
- Clear OpenCart cache
- Clear browser cache
- Check CSS files in `catalog/view/theme/anima/stylesheet/`
- Verify file permissions

### White Screen / Errors

**Problem**: White screen or PHP errors after installation
**Solution**:
- Enable error reporting in PHP
- Check error logs in `system/storage/logs/`
- Verify OpenCart version compatibility (4.1.0.3+)
- Check PHP version (8.0+)

### Theme Settings Not Saving

**Problem**: Changes in admin panel don't save
**Solution**:
- Check file permissions on `system/storage/` directory
- Verify database connection
- Clear cache after saving
- Check for JavaScript errors in browser console

## Uninstallation

To remove the Anima theme:

1. **Switch to Another Theme**
   - Go to **System → Settings**
   - Edit your store
   - Select a different theme (e.g., default)
   - Save changes

2. **Uninstall Extension**
   - Navigate to **Extensions → Extensions → Themes**
   - Find Anima Theme
   - Click **Uninstall** (red minus icon)

3. **Remove Files (Optional)**
   - Via FTP/File Manager, delete:
     ```
     admin/controller/extension/theme/anima.php
     admin/model/extension/theme/anima.php
     admin/language/en-gb/extension/theme/anima.php
     admin/view/template/extension/theme/anima.twig
     catalog/controller/extension/theme/anima.php
     catalog/model/extension/theme/anima.php
     catalog/language/en-gb/extension/theme/anima.php
     catalog/view/theme/anima/
     image/anima/
     ```

## Support

For issues or questions:
- GitHub: https://github.com/abdullahshioncse/anima
- Create an issue on the repository

## Next Steps

After successful installation:
1. Configure theme settings to match your brand
2. Set up your product catalog
3. Configure payment and shipping methods
4. Test the complete checkout process
5. Optimize images for better performance
6. Set up SSL certificate for secure checkout

---

**Installation Date**: ___________
**Installed By**: ___________
**OpenCart Version**: ___________
**PHP Version**: ___________
