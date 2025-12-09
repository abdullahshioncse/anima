# Anima Theme - Installation Guide for OpenCart 4.0.1.3

## Prerequisites

Before installing the Anima theme, ensure you have:
- OpenCart 4.0.1.3 installed and running
- FTP/SFTP access to your server
- Admin access to your OpenCart store
- Basic understanding of file management

## Installation Steps

### Step 1: Backup Your Store

**Important:** Always backup your store before making any changes.

1. Backup your database through phpMyAdmin or your hosting control panel
2. Backup all OpenCart files via FTP

### Step 2: Upload Theme Files

1. **Download the theme package** from the repository
2. **Extract the archive** to a temporary location on your computer
3. **Upload via FTP/SFTP:**
   - Connect to your server
   - Navigate to your OpenCart root directory
   - Upload the following directories from the theme package:
     - `admin/` → merge with existing `admin/` directory
     - `catalog/` → merge with existing `catalog/` directory
     - `system/` → merge with existing `system/` directory (if applicable)
     - `install.json` → upload to root directory

4. **Verify file permissions:**
   - Files: 644 (rw-r--r--)
   - Directories: 755 (rwxr-xr-x)

### Step 3: Install Theme via Admin Panel

1. **Log in to OpenCart Admin Panel**
   - URL: `http://yourstore.com/admin`

2. **Navigate to Extensions**
   - Go to: Extensions → Extensions
   - Select "Themes" from the dropdown

3. **Install Anima Theme**
   - Find "Anima Theme" in the list
   - Click the green "Install" button (+ icon)
   - Wait for confirmation message

4. **Enable the Theme**
   - After installation, click the "Edit" button
   - Set Status to "Enabled"
   - Click "Save"

### Step 4: Set as Default Theme

1. **Go to Store Settings**
   - Navigate to: System → Settings
   - Click "Edit" on your store

2. **Configure Theme**
   - Go to the "Store" tab
   - Find "Theme" dropdown
   - Select "Anima Theme"
   - Click "Save" (top right)

3. **Clear Cache**
   - System → Maintenance → Clear Cache
   - Or manually delete files in: `system/storage/cache/`

### Step 5: Configure Theme Settings (Optional)

1. **Access Theme Settings**
   - Extensions → Extensions → Themes
   - Click "Edit" on Anima Theme

2. **Available Settings:**
   - Theme Status (Enabled/Disabled)
   - Additional customization options

3. **Save Changes**

## Post-Installation Configuration

### Configure Store Information

Update your store details for proper display in the theme:

1. **System → Settings → Edit Store → Store Tab**
   - Store Name: Your store name (appears in header)
   - Store Owner: Your name
   - Address: Physical address
   - Email: Contact email
   - Telephone: Contact phone (displays in header)

### Set Up Categories

1. **Catalog → Categories**
   - Create/edit your product categories
   - These will appear in the navigation menu

### Add Products

1. **Catalog → Products**
   - Add your products with:
     - Product images
     - Descriptions
     - Prices
     - Model numbers
     - Categories

### Configure Homepage

1. **Design → Layouts → Home**
   - Configure modules for homepage
   - Add featured products
   - Add latest products

## Troubleshooting

### Theme Not Appearing

1. **Clear cache:**
   ```
   System → Maintenance → Clear Cache
   ```

2. **Check file permissions:**
   - Ensure all theme files are readable
   - Files: 644, Directories: 755

3. **Verify theme is selected:**
   - System → Settings → Store Tab
   - Check "Theme" is set to "Anima Theme"

### Images Not Loading

1. **Check image paths:**
   - Ensure all images are in: `catalog/view/image/`
   - Verify image permissions (644)

2. **Clear browser cache:**
   - Hard refresh: Ctrl+F5 (Windows) or Cmd+Shift+R (Mac)

### CSS Not Applying

1. **Clear OpenCart cache:**
   - System → Maintenance → Clear Cache

2. **Check CSS file paths:**
   - Verify files exist in: `catalog/view/stylesheet/`

3. **Check browser console:**
   - F12 → Console tab
   - Look for 404 errors

### RTL (Arabic) Not Working

1. **Check language settings:**
   - System → Localisation → Languages
   - Edit Arabic language
   - Set "Direction" to "Right to Left"
   - Set "Status" to "Enabled"

2. **Set as default language:**
   - System → Settings → Store Tab
   - Set "Language" to Arabic

## Customization

### Modify Colors

Edit the CSS variables in:
```
catalog/view/stylesheet/styleguide.css
```

Change color values in the `:root` section:
```css
:root {
  --a4a4a4: #a4a4a4;  /* Grey */
  --black: #000000;    /* Black */
  --ff7c17: #ff7c17;   /* Orange */
  --ffffff: #ffffff;   /* White */
  --x1c1c1c: #1c1c1c;  /* Dark Grey */
}
```

### Modify Fonts

Edit font imports in:
```
catalog/view/stylesheet/globals.css
```

### Modify Layout

Edit Twig templates in:
```
catalog/view/template/
├── common/
├── product/
├── account/
└── ...
```

## Support & Documentation

- **Repository:** https://github.com/abdullahshioncse/anima
- **Issues:** Report bugs or request features via GitHub Issues
- **OpenCart Documentation:** https://docs.opencart.com/

## Security Notes

1. **Keep OpenCart Updated**
   - Regularly update to latest version
   - Check for security patches

2. **Secure Admin Panel**
   - Use strong passwords
   - Enable 2FA if available
   - Rename admin directory

3. **File Permissions**
   - Never set 777 permissions
   - Use 644 for files, 755 for directories

## Uninstallation

If you need to remove the theme:

1. **Switch to another theme:**
   - System → Settings → Store Tab
   - Select a different theme
   - Save changes

2. **Uninstall via admin:**
   - Extensions → Extensions → Themes
   - Click "Uninstall" on Anima Theme

3. **Remove files (optional):**
   - Delete theme files via FTP
   - Keep backup before deleting

## Additional Resources

- OpenCart Community Forum: https://forum.opencart.com/
- OpenCart Marketplace: https://www.opencart.com/index.php?route=marketplace/extension
- Theme Documentation: See README.md

---

**Version:** 1.0.0  
**Last Updated:** December 2024  
**Author:** Abdullah Shion
