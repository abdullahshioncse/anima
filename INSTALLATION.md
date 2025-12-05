# Anima Theme Installation Guide

## Prerequisites

Before installing the Anima theme, ensure you have:
- OpenCart 4.0.1.3 or higher installed and running
- FTP/SFTP access to your server or file manager access
- Admin panel access to your OpenCart store
- Basic understanding of OpenCart structure

## Installation Steps

### Step 1: Download Theme Files

Clone or download this repository:
```bash
git clone https://github.com/abdullahshioncse/anima.git
```

Or download as ZIP and extract the files.

### Step 2: Upload Theme Files

Using FTP/SFTP or your hosting file manager:

1. Navigate to your OpenCart installation root directory
2. Upload the following directories:
   - `admin/` → Upload to your OpenCart `admin/` directory
   - `catalog/` → Upload to your OpenCart `catalog/` directory
   - `system/` → Upload to your OpenCart `system/` directory (if needed)
   - `install.json` → Upload to your OpenCart root directory

**Important**: Make sure to merge directories, not replace them!

### Step 3: Verify File Structure

After upload, verify these files exist:
```
[OpenCart Root]/
├── admin/
│   ├── controller/theme/anima.php
│   ├── language/en-gb/theme/anima.php
│   └── view/template/theme/anima.twig
├── catalog/
│   └── view/
│       ├── javascript/PlusJakartaDisplay-Medium.ttf
│       ├── stylesheet/
│       │   ├── anima.css
│       │   ├── anima-home.css
│       │   ├── anima-product.css
│       │   └── anima-responsive.css
│       ├── template/
│       │   ├── common/
│       │   ├── product/
│       │   └── information/
│       └── theme/anima/image/ (172 images)
└── install.json
```

### Step 4: Clear Cache

1. Delete all files in `system/storage/cache/`
2. Delete all files in `system/storage/modification/`

Or use this command (if you have SSH access):
```bash
cd /path/to/opencart
rm -rf system/storage/cache/*
rm -rf system/storage/modification/*
```

### Step 5: Install Theme via Admin Panel

1. Log in to your OpenCart admin panel
2. Navigate to **Extensions** → **Extensions**
3. Choose **Themes** from the extension type dropdown
4. Find **Anima Theme** in the list
5. Click the **Install** button (green plus icon)
6. After installation, click the **Edit** button (blue pencil icon)
7. Set **Status** to **Enabled**
8. Click **Save** (blue disk icon)

### Step 6: Set as Default Theme

1. Navigate to **System** → **Settings**
2. Click **Edit** next to your store
3. Go to the **Store** tab
4. In the **Theme** section, select **Anima**
5. Click **Save** at the top right

### Step 7: Configure Store Settings

#### Update Store Name and Logo
1. Go to **System** → **Settings**
2. Click **Edit** next to your store
3. In the **General** tab:
   - Set your **Store Name**
   - Upload your **Logo** (recommended size: 200x60px)
4. Click **Save**

#### Configure Categories
1. Go to **Catalog** → **Categories**
2. Create or edit your main categories:
   - ملابس رجالية (Men's Clothing)
   - ملابس نسائية (Women's Clothing)
   - إكسسوارات (Accessories)
   - تخفيضات (Sales)

#### Configure Contact Information
1. Go to **System** → **Settings**
2. Click **Edit** next to your store
3. Update:
   - **Telephone**: 965-22091914 (or your number)
   - **Email**: Your store email
   - **Address**: Your store address

### Step 8: Test Theme

Visit your store's frontend and verify:
- [x] Homepage loads correctly with hero banner
- [x] Navigation menu displays categories
- [x] Product cards display properly
- [x] Product detail pages work
- [x] Category pages show products
- [x] Footer displays correctly
- [x] Mobile responsive design works
- [x] Add to cart functionality works
- [x] Wishlist functionality works

## Post-Installation Configuration

### Homepage Banner

To change the hero banner image:
1. Replace `catalog/view/theme/anima/image/rectangle-5-1.png` with your banner
2. Recommended size: 1440x600px
3. Clear cache

### Colors Customization

To change theme colors:
1. Edit `catalog/view/stylesheet/anima.css`
2. Modify CSS variables in the `:root` section:
```css
:root { 
  --ff7c17: #ff7c17;  /* Primary color (Orange) */
  --x1c1c1c: #1c1c1c; /* Text color (Dark Gray) */
  --ffffff: #ffffff;  /* Background (White) */
  --ececec: #ebebeb;  /* Borders (Light Gray) */
}
```
3. Clear cache

### Newsletter Configuration

1. Go to **Extensions** → **Extensions**
2. Choose **Modules** from dropdown
3. Find and configure **Newsletter** module
4. Set up your newsletter subscription settings

### Payment Methods

The theme displays payment icons in the footer. To configure:
1. Go to **Extensions** → **Extensions**
2. Choose **Payments** from dropdown
3. Install and configure your payment methods:
   - Visa
   - Mastercard
   - Apple Pay
   - etc.

## Troubleshooting

### Theme Not Showing After Installation

**Problem**: Theme doesn't appear in the themes list.

**Solution**:
1. Verify all files are uploaded correctly
2. Check file permissions (should be 644 for files, 755 for directories)
3. Clear cache
4. Reload the extensions page

### Images Not Loading

**Problem**: Images show as broken links.

**Solution**:
1. Verify images are in `catalog/view/theme/anima/image/`
2. Check file permissions
3. Clear browser cache
4. Check browser console for errors

### CSS Not Applied

**Problem**: Site looks broken or unstyled.

**Solution**:
1. Verify CSS files are in `catalog/view/stylesheet/`
2. Check file paths in `catalog/view/template/common/header.twig`
3. Clear OpenCart cache
4. Clear browser cache
5. Check browser console for CSS loading errors

### Font Not Loading

**Problem**: Plus Jakarta Display font not displaying.

**Solution**:
1. Verify font file exists at `catalog/view/javascript/PlusJakartaDisplay-Medium.ttf`
2. Check font path in `catalog/view/stylesheet/anima.css`
3. Clear cache

### RTL Issues

**Problem**: Arabic text not displaying right-to-left.

**Solution**:
1. Go to **System** → **Localisation** → **Languages**
2. Edit Arabic language
3. Set **Text Direction** to **Right to Left**
4. Clear cache

## Updating the Theme

To update to a newer version:

1. **Backup Current Theme**:
   ```bash
   cp -r admin/controller/theme/anima.php admin/controller/theme/anima.php.backup
   cp -r catalog/view/template/common catalog/view/template/common.backup
   # etc.
   ```

2. **Download New Version**

3. **Upload New Files** (same as installation)

4. **Clear Cache**:
   - Delete `system/storage/cache/*`
   - Delete `system/storage/modification/*`

5. **Test Thoroughly**

## Uninstallation

To remove the theme:

1. **Change Store Theme**:
   - Go to **System** → **Settings**
   - Edit your store
   - Change theme to another theme
   - Save

2. **Uninstall from Extensions**:
   - Go to **Extensions** → **Extensions** → **Themes**
   - Find Anima Theme
   - Click **Uninstall** (red minus icon)

3. **Delete Files** (optional):
   ```bash
   rm admin/controller/theme/anima.php
   rm admin/language/en-gb/theme/anima.php
   rm admin/view/template/theme/anima.twig
   rm -r catalog/view/theme/anima/
   rm catalog/view/stylesheet/anima*.css
   rm catalog/view/template/common/header.twig
   rm catalog/view/template/common/footer.twig
   # etc.
   ```

4. **Clear Cache**

## Support

If you encounter issues during installation:

1. Check this guide again
2. Review the [README.md](README.md) for theme overview
3. Check the [CONVERSION.md](CONVERSION.md) for technical details
4. Visit the GitHub repository: https://github.com/abdullahshioncse/anima
5. Check OpenCart community forums

## Additional Resources

- OpenCart Documentation: https://docs.opencart.com
- OpenCart Forums: https://forum.opencart.com
- Theme Repository: https://github.com/abdullahshioncse/anima

## Checklist

Use this checklist to ensure proper installation:

- [ ] Downloaded all theme files
- [ ] Uploaded to correct directories
- [ ] Verified file structure
- [ ] Cleared OpenCart cache
- [ ] Installed theme via admin panel
- [ ] Enabled theme
- [ ] Set as default theme
- [ ] Updated store name and logo
- [ ] Configured categories
- [ ] Updated contact information
- [ ] Tested homepage
- [ ] Tested product pages
- [ ] Tested category pages
- [ ] Tested mobile responsive
- [ ] Tested add to cart
- [ ] Configured payment methods
- [ ] Set up newsletter

## Next Steps

After successful installation:

1. Add your products
2. Configure shipping methods
3. Set up payment gateways
4. Test checkout process
5. Set up tax rules
6. Configure email templates
7. Set up SEO URLs
8. Test all functionality
9. Launch your store!

---

**Installation Complete!** Your Anima theme is now ready to use. Enjoy your beautiful new OpenCart store! 🎉
