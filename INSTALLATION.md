# Anima Theme Installation Guide

## Quick Start Guide

This guide will help you install the Anima theme on your OpenCart 4.1.0.3 store.

## Prerequisites

Before installing, ensure you have:
- ✅ OpenCart 4.1.0.3 or higher installed
- ✅ PHP 8.0 or higher
- ✅ MySQL 5.7 or higher  
- ✅ Admin access to your OpenCart store
- ✅ FTP/SFTP access (for manual installation)

## Installation Steps

### Option 1: Extension Installer (Easiest)

1. **Prepare the Theme**
   - Download or create a ZIP file of the theme
   - Ensure the ZIP contains the correct structure

2. **Access Admin Panel**
   - Login to your OpenCart admin panel
   - URL typically: `https://yourdomain.com/admin`

3. **Upload Theme**
   - Navigate to: **Extensions → Installer**
   - Click the **Upload** button
   - Select the theme ZIP file
   - Wait for upload to complete (progress bar will show)

4. **Install Extension**
   - Go to: **Extensions → Extensions**
   - From the dropdown, select: **Themes**
   - Find **Anima Theme** in the list
   - Click the green **Install** button (+ icon)

5. **Configure Theme**
   - Click the blue **Edit** button next to Anima Theme
   - Configure your settings:
     - Enable the theme
     - Add phone number
     - Set sale banner text
     - Add social media links
   - Click **Save**

6. **Clear Cache**
   - Go to: **Dashboard → Settings Developer**
   - Click **Refresh** button for:
     - Theme
     - SASS
     - Cache

7. **Verify Installation**
   - Visit your store frontend
   - Confirm Anima theme is active

### Option 2: Manual Installation via FTP

1. **Extract Theme Files**
   ```bash
   unzip anima-theme.zip
   cd anima
   ```

2. **Connect via FTP**
   - Use FileZilla, WinSCP, or command line
   - Connect to your server
   - Navigate to OpenCart root directory

3. **Upload Files**
   
   Upload these directories to your OpenCart root:
   
   ```
   Local → Server
   ────────────────────────────────────
   catalog/  → /public_html/catalog/
   admin/    → /public_html/admin/
   extension.json → /public_html/extension.json
   ```

4. **Set Permissions**
   
   Using SSH:
   ```bash
   cd /path/to/opencart
   chmod 755 -R catalog/view/theme/anima/
   chmod 755 -R catalog/controller/theme/
   chmod 755 -R catalog/model/theme/
   chmod 755 -R admin/controller/theme/
   chmod 755 -R admin/view/template/theme/
   ```
   
   Or via FTP: Set all folders to 755, files to 644

5. **Refresh Modifications**
   - Login to admin panel
   - Go to: **Extensions → Modifications**
   - Click **Refresh** button

6. **Install Theme**
   - Go to: **Extensions → Extensions**
   - Select: **Themes** from dropdown
   - Find **Anima** and click **Install**

7. **Configure and Enable**
   - Click **Edit** next to Anima
   - Enable the theme
   - Configure settings
   - Save changes

### Option 3: Using cPanel File Manager

1. **Access cPanel**
   - Login to your hosting cPanel
   - Open **File Manager**
   - Navigate to OpenCart directory (usually `public_html`)

2. **Upload ZIP**
   - Click **Upload** button
   - Select theme ZIP file
   - Wait for upload to complete

3. **Extract Files**
   - Select the uploaded ZIP file
   - Click **Extract**
   - Extract to current directory

4. **Move Files**
   - Move extracted folders to correct locations:
     - Move `catalog/` contents to merge with existing `catalog/`
     - Move `admin/` contents to merge with existing `admin/`
     - Move `extension.json` to root

5. **Continue from Step 5** in Manual Installation

## Post-Installation Configuration

### 1. Basic Theme Settings

Navigate to: **Extensions → Extensions → Themes → Anima → Edit**

```
┌─────────────────────────────────────┐
│ General Settings                    │
├─────────────────────────────────────┤
│ Status: [✓] Enabled                 │
│ Phone: 965-22091914                 │
│ Email: info@yourstore.com           │
│ Sale Banner: Get 20% off!           │
└─────────────────────────────────────┘
```

### 2. Configure Store Settings

Navigate to: **System → Settings → Edit Store**

- **Store Name**: Enter your store name
- **Store Logo**: Upload logo (recommended: 200x50px)
- **Store Email**: Your contact email
- **Telephone**: Your phone number

### 3. Set Up Languages

Navigate to: **System → Localisation → Languages**

For Arabic RTL:
- Edit Arabic language
- Set **Direction**: Right to Left
- Set **Status**: Enabled
- Click **Save**

### 4. Configure Products

1. **Add Products**
   - Go to: **Catalog → Products**
   - Add your products with images

2. **Set Featured Products**
   - Products will appear on homepage
   - Recommended: 8-12 featured products

3. **Configure Categories**
   - Go to: **Catalog → Categories**
   - Create your category structure
   - Add category images

### 5. Set Up Payment Methods

Navigate to: **Extensions → Extensions → Payment**

Enable payment methods matching your footer icons:
- Credit Card (Visa/Mastercard)
- Apple Pay
- Bank Transfer

## Verification Checklist

After installation, verify:

- [ ] Theme is enabled in admin
- [ ] Homepage loads correctly
- [ ] Header displays properly
- [ ] Footer shows all sections
- [ ] Navigation menu works
- [ ] Product pages display correctly
- [ ] Cart functionality works
- [ ] Search function operates
- [ ] Account pages accessible
- [ ] Contact form works
- [ ] RTL layout works (if Arabic)
- [ ] Mobile responsive view works
- [ ] All images load
- [ ] CSS styles apply correctly

## Common Issues and Solutions

### Issue 1: "Permission Denied" Error

**Solution:**
```bash
# Set correct permissions
chmod 755 -R catalog/view/theme/anima/
chown www-data:www-data -R catalog/view/theme/anima/
```

### Issue 2: Theme Not Appearing in List

**Solutions:**
1. Check `extension.json` is in root directory
2. Clear OpenCart cache
3. Refresh modifications
4. Check PHP error logs

### Issue 3: CSS Not Loading

**Solutions:**
1. Check file paths in `header.twig`
2. Verify CSS files exist in stylesheet directory
3. Clear browser cache (Ctrl+F5)
4. Check server permissions (644 for CSS files)

### Issue 4: Images Not Displaying

**Solutions:**
1. Check image directory permissions (755)
2. Verify images were uploaded to:
   `catalog/view/theme/anima/image/`
3. Check image paths in templates
4. Ensure GD library is enabled in PHP

### Issue 5: White Screen After Installation

**Solutions:**
1. Enable error reporting:
   - Edit `config.php`
   - Set `define('DISPLAY_ERROR', true);`
2. Check PHP error logs
3. Verify PHP version (8.0+)
4. Check file permissions

## Performance Optimization

### 1. Enable Caching

Navigate to: **Dashboard → Settings Developer**
- Enable theme cache
- Enable SASS compiler cache

### 2. Optimize Images

- Use WebP format when possible
- Compress images before upload
- Recommended tools:
  - TinyPNG
  - ImageOptim
  - Squoosh

### 3. Enable GZIP Compression

Add to `.htaccess`:
```apache
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript
</IfModule>
```

### 4. Browser Caching

Add to `.htaccess`:
```apache
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
</IfModule>
```

## Getting Help

If you encounter issues:

1. **Check Documentation**
   - Read README.md
   - Review this installation guide

2. **OpenCart Forums**
   - Visit: https://forum.opencart.com
   - Search for similar issues

3. **GitHub Issues**
   - Create issue: https://github.com/abdullahshioncse/anima/issues
   - Provide detailed error information

4. **Direct Support**
   - Email: info@sportakw.com
   - Phone: 965-22091914

## Next Steps

After successful installation:

1. ✅ Configure theme settings
2. ✅ Add your products
3. ✅ Set up payment methods
4. ✅ Configure shipping options
5. ✅ Test checkout process
6. ✅ Set up email templates
7. ✅ Configure SEO settings
8. ✅ Install SSL certificate
9. ✅ Set up backups
10. ✅ Launch your store!

---

**Congratulations! Your Anima theme is now installed and ready to use! 🎉**
