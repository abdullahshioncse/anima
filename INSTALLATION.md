# Installation Guide - Anima Theme for OpenCart 4.1.0.3

This guide provides detailed step-by-step instructions for installing the Anima Theme on your OpenCart 4.1.0.3 store.

## Prerequisites

Before you begin, ensure you have:

1. ✅ OpenCart 4.1.0.3 (or higher) installed and running
2. ✅ Admin access to your OpenCart store
3. ✅ FTP/SFTP access to your server (for manual installation)
4. ✅ Basic knowledge of OpenCart administration

## Installation Methods

Choose one of the following installation methods:

### Method 1: Extension Installer (Recommended)

This is the easiest method and recommended for most users.

#### Step 1: Prepare the Extension Package

1. Download or clone this repository
2. Navigate to the repository root directory
3. Create a ZIP file of the extension folder:

   **On Linux/Mac:**
   ```bash
   cd extension
   zip -r anima.ocmod.zip anima/
   ```

   **On Windows:**
   - Right-click on the `extension/anima` folder
   - Select "Send to" > "Compressed (zipped) folder"
   - Rename to `anima.ocmod.zip`

#### Step 2: Upload to OpenCart

1. Log in to your OpenCart Admin Panel
2. Navigate to `Extensions > Installer`
3. Click the "Upload" button
4. Select the `anima.ocmod.zip` file
5. Wait for the upload to complete
6. You should see a success message

#### Step 3: Install the Extension

1. Navigate to `Extensions > Extensions`
2. From the dropdown, select `Themes`
3. Find "Anima Theme" in the list
4. Click the green "Install" button (+ icon)
5. Wait for the installation to complete

#### Step 4: Activate the Theme

1. Navigate to `Design > Themes`
2. Find "Anima" in the themes list
3. Click "Edit"
4. Set as default theme
5. Save your changes

#### Step 5: Configure Theme Settings

1. Navigate to `Extensions > Extensions > Themes`
2. Find "Anima Theme" and click "Edit"
3. Configure your desired settings:
   - Set status to "Enabled"
   - Configure product limits
   - Set image dimensions
4. Save your changes

#### Step 6: Clear Cache

1. Navigate to `Dashboard`
2. Click the blue "Refresh" button next to "Cache"
3. Clear your browser cache as well

### Method 2: Manual Installation via FTP

Use this method if you prefer direct file access or if the installer method doesn't work.

#### Step 1: Upload Files

1. Connect to your server via FTP/SFTP
2. Navigate to your OpenCart installation directory
3. Upload the entire `extension/anima` folder to `[opencart-root]/extension/`

   Your final path should be:
   ```
   [opencart-root]/extension/anima/
   ```

#### Step 2: Set Permissions

Set the following permissions:

```bash
chmod -R 755 [opencart-root]/extension/anima
```

On most servers, these permissions should be:
- Folders: 755
- Files: 644

#### Step 3: Install via Admin Panel

Follow Steps 3-6 from Method 1 above.

### Method 3: Command Line Installation

For developers comfortable with the command line.

#### Step 1: Clone Repository

```bash
cd /path/to/opencart/extension
git clone https://github.com/abdullahshioncse/anima.git
```

#### Step 2: Set Permissions

```bash
chmod -R 755 /path/to/opencart/extension/anima
chown -R www-data:www-data /path/to/opencart/extension/anima
```

*Note: Replace `www-data` with your web server user*

#### Step 3: Install via Admin Panel

Follow Steps 3-6 from Method 1 above.

## Post-Installation Configuration

### 1. Configure Store Settings

Navigate to `System > Settings > [Your Store]` and verify:

- **Store Name**: Set your store name (displayed in theme)
- **Store Owner**: Your business information
- **Email**: Contact email for customer inquiries
- **Telephone**: Display phone number (shown in header)
- **Meta Data**: SEO information

### 2. Configure Languages

The theme supports multiple languages out of the box:

1. Navigate to `System > Localisation > Languages`
2. Ensure Arabic (ar) is installed if you need RTL support
3. Set default language if needed

### 3. Upload Logo

1. Navigate to `Design > Themes > [Anima] > Edit`
2. Upload your store logo
3. Recommended size: 200x60px (PNG with transparency)

### 4. Set Up Categories

1. Navigate to `Catalog > Categories`
2. Create your product categories
3. They will automatically appear in the header navigation

### 5. Add Products

1. Navigate to `Catalog > Products`
2. Add products with:
   - Good quality images (recommended: 800x800px minimum)
   - Complete descriptions
   - Prices
   - SKU/Model numbers
   - Categories

### 6. Configure Home Page

#### Option A: Using Layout Builder

1. Navigate to `Design > Layouts > Home`
2. Add modules to positions:
   - `content_top`: Banner/Slideshow
   - `content_bottom`: Featured products, latest products

#### Option B: Direct Template Modification

Edit `extension/anima/catalog/view/template/common/home.twig`

### 7. Test RTL Support

If you're using Arabic:

1. Switch store language to Arabic
2. Verify:
   - Text direction is right-to-left
   - Navigation aligns correctly
   - Product cards display properly
   - Cart and checkout work correctly

## Verification Checklist

After installation, verify the following:

- [ ] Theme appears in `Extensions > Themes`
- [ ] Homepage displays correctly
- [ ] Header shows logo, navigation, and icons
- [ ] Footer displays properly
- [ ] Product pages load correctly
- [ ] Add to cart works
- [ ] Wishlist functions properly
- [ ] Search works
- [ ] Cart page displays correctly
- [ ] Checkout process works
- [ ] Account pages are accessible
- [ ] RTL mode works (if using Arabic)
- [ ] Mobile responsive design works
- [ ] All images load correctly

## Common Issues and Solutions

### Issue 1: "Permission Denied" Error

**Solution:**
```bash
chmod -R 755 extension/anima
chown -R www-data:www-data extension/anima
```

### Issue 2: Theme Not Showing in List

**Solution:**
1. Check that files are in correct location: `extension/anima/`
2. Verify `install.json` exists and is valid
3. Clear OpenCart cache
4. Refresh modifications in admin

### Issue 3: Styles Not Loading

**Solution:**
1. Check CSS file exists: `extension/anima/catalog/view/stylesheet/anima.css`
2. Clear browser cache (Ctrl+F5)
3. Verify file permissions
4. Check console for 404 errors

### Issue 4: Images Not Displaying

**Solution:**
1. Verify images exist in: `extension/anima/catalog/view/image/`
2. Check file permissions: `chmod 644 [image-files]`
3. Clear image cache in OpenCart admin

### Issue 5: JavaScript Not Working

**Solution:**
1. Check browser console for errors
2. Verify jQuery is loaded before theme JS
3. Clear browser cache
4. Check file: `extension/anima/catalog/view/javascript/anima.js`

### Issue 6: Arabic/RTL Not Working

**Solution:**
1. Ensure Arabic language is installed
2. Check language direction setting in `System > Localisation > Languages`
3. Verify RTL CSS is loading
4. Clear template cache

### Issue 7: Products Not Showing on Homepage

**Solution:**
1. Add products to your store
2. Assign products to categories
3. Check module configuration in `Design > Layouts`
4. Verify products are enabled and in stock

## Updating the Theme

To update to a newer version:

1. **Backup your store** (database and files)
2. **Backup your customizations** (if any)
3. Download the new version
4. **Method 1 (Recommended):**
   - Uninstall old version via Extensions > Extensions
   - Install new version using installer
5. **Method 2:**
   - Replace files via FTP
   - Re-apply your customizations
6. Clear all caches
7. Test thoroughly

## Uninstallation

To remove the theme:

1. **Switch to another theme** first
   - Navigate to `Design > Themes`
   - Activate a different theme (e.g., default theme)

2. **Uninstall the extension**
   - Navigate to `Extensions > Extensions > Themes`
   - Find "Anima Theme"
   - Click "Uninstall" (red minus icon)

3. **Delete files** (optional)
   - Via FTP, delete: `extension/anima/`
   - Or keep files for future use

## Support and Help

If you encounter issues:

1. **Check documentation**: README.md
2. **Search existing issues**: GitHub Issues
3. **Create new issue**: Include:
   - OpenCart version
   - PHP version
   - Error messages
   - Steps to reproduce
   - Screenshots if applicable

## Additional Resources

- **OpenCart Documentation**: https://docs.opencart.com/
- **Theme Repository**: https://github.com/abdullahshioncse/anima
- **OpenCart Forum**: https://forum.opencart.com/

## Next Steps

After successful installation:

1. 📝 Read the [README.md](README.md) for full documentation
2. 🎨 Customize colors and fonts in `anima.css`
3. 📱 Test on mobile devices
4. 🔍 Configure SEO settings
5. 📊 Set up analytics
6. 🛒 Test complete checkout process
7. 🌐 Configure multi-language if needed

---

**Congratulations! Your Anima Theme is now installed and ready to use.**

Need help? Open an issue on GitHub or refer to the main documentation.
