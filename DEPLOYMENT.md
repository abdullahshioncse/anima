# Deployment Guide - Anima Theme

This guide explains how to package and deploy the Anima theme for OpenCart 4.0.1.3.

## Packaging for Distribution

### Files to Include in Distribution Package

When creating a distribution package (ZIP file) for users to install, include ONLY these directories and files:

```
anima-theme-v1.0.0/
├── admin/
│   ├── controller/
│   │   └── theme/
│   │       └── theme_anima.php
│   ├── language/
│   │   └── en-gb/
│   │       └── theme/
│   │           └── theme_anima.php
│   └── view/
│       ├── image/
│       │   └── theme_anima.png
│       └── template/
│           └── theme/
│               └── theme_anima.twig
├── catalog/
│   ├── controller/
│   │   └── startup/
│   │       └── theme_anima.php
│   └── view/
│       ├── fonts/
│       │   └── PlusJakartaDisplay-Medium.ttf
│       ├── image/
│       │   └── (all image files)
│       ├── javascript/
│       │   └── anima.js
│       ├── stylesheet/
│       │   ├── desktop-1.css
│       │   ├── desktop-2.css
│       │   ├── desktop-3.css
│       │   ├── desktop-4.css
│       │   ├── globals.css
│       │   ├── styleguide.css
│       │   ├── responsive.css
│       │   └── iphone-13-u38-14-*.css
│       └── template/
│           ├── account/
│           ├── checkout/
│           ├── common/
│           ├── information/
│           └── product/
├── system/
│   ├── helper/
│   └── library/
├── install.json
├── README.md
├── INSTALLATION.md
└── CHANGELOG.md
```

### Files to EXCLUDE from Distribution

Do NOT include these files in the distribution package:
- `.git/` - Git repository files
- `.gitignore` - Git ignore configuration
- `.html` - Original static HTML files (desktop-*.html, iphone-*.html)
- `css/` - Original CSS directory (already copied to catalog/)
- `img/` - Original img directory (already copied to catalog/)
- `fonts/` - Original fonts directory (already copied to catalog/)
- Any temporary or backup files

### Creating Distribution Package

#### Method 1: Manual ZIP Creation

1. **Create a clean directory:**
   ```bash
   mkdir anima-theme-v1.0.0
   ```

2. **Copy required files:**
   ```bash
   # Copy directories
   cp -r admin/ anima-theme-v1.0.0/
   cp -r catalog/ anima-theme-v1.0.0/
   cp -r system/ anima-theme-v1.0.0/
   
   # Copy documentation
   cp install.json anima-theme-v1.0.0/
   cp README.md anima-theme-v1.0.0/
   cp INSTALLATION.md anima-theme-v1.0.0/
   cp CHANGELOG.md anima-theme-v1.0.0/
   ```

3. **Create ZIP archive:**
   ```bash
   zip -r anima-theme-v1.0.0.zip anima-theme-v1.0.0/
   ```

#### Method 2: Using Script (Linux/Mac)

Create a deployment script `package.sh`:

```bash
#!/bin/bash

VERSION="1.0.0"
PACKAGE_NAME="anima-theme-v${VERSION}"
TEMP_DIR="${PACKAGE_NAME}"

# Create temporary directory
mkdir -p "${TEMP_DIR}"

# Copy directories
cp -r admin/ "${TEMP_DIR}/"
cp -r catalog/ "${TEMP_DIR}/"
mkdir -p "${TEMP_DIR}/system/helper"
mkdir -p "${TEMP_DIR}/system/library"

# Copy files
cp install.json "${TEMP_DIR}/"
cp README.md "${TEMP_DIR}/"
cp INSTALLATION.md "${TEMP_DIR}/"
cp CHANGELOG.md "${TEMP_DIR}/"

# Create ZIP
zip -r "${PACKAGE_NAME}.zip" "${TEMP_DIR}/"

# Cleanup
rm -rf "${TEMP_DIR}"

echo "Package created: ${PACKAGE_NAME}.zip"
```

Run with:
```bash
chmod +x package.sh
./package.sh
```

## Upload to OpenCart Marketplace

### Prerequisites
- OpenCart Marketplace account
- Theme tested on OpenCart 4.0.1.3
- All documentation completed
- Screenshots prepared

### Marketplace Requirements

1. **Theme Package Structure**
   - Follow OpenCart Extension structure
   - Include install.json with correct metadata
   - All paths must be relative

2. **Documentation**
   - Installation guide (✓ INSTALLATION.md)
   - Feature list (✓ README.md)
   - Changelog (✓ CHANGELOG.md)
   - Screenshots (at least 3-5 images)

3. **Screenshots Needed**
   - Homepage
   - Category page
   - Product page
   - Shopping cart
   - Mobile view

4. **Testing Checklist**
   - [ ] Fresh OpenCart 4.0.1.3 installation
   - [ ] Theme installation works
   - [ ] All pages render correctly
   - [ ] No JavaScript errors
   - [ ] No CSS conflicts
   - [ ] Mobile responsive
   - [ ] RTL support works
   - [ ] All links functional
   - [ ] Cart operations work
   - [ ] Checkout process works

### Submission Steps

1. **Login to OpenCart Marketplace**
   - Visit: https://www.opencart.com/index.php?route=account/login

2. **Submit Extension**
   - Go to "Sell Extensions"
   - Click "Add Extension"
   - Fill in details:
     - Name: Anima Theme
     - Category: Themes
     - OpenCart Version: 4.0.1.3
     - License: Choose appropriate license
     - Price: Set price or free

3. **Upload Files**
   - Upload the ZIP package
   - Upload screenshots
   - Upload preview image

4. **Submit for Review**
   - Review all information
   - Submit for OpenCart team review
   - Wait for approval

## Direct Server Deployment

For deploying directly to a server:

### Via FTP/SFTP

1. **Connect to Server**
   ```
   Host: your-server.com
   Port: 22 (SFTP) or 21 (FTP)
   Username: your-username
   Password: your-password
   ```

2. **Navigate to OpenCart Root**
   - Usually: `/public_html/` or `/var/www/html/`

3. **Upload Directories**
   - Upload `admin/` → merge with existing
   - Upload `catalog/` → merge with existing
   - Upload `system/` → merge with existing (if needed)
   - Upload `install.json` to root

4. **Set Permissions**
   ```bash
   find admin/ -type f -exec chmod 644 {} \;
   find admin/ -type d -exec chmod 755 {} \;
   find catalog/ -type f -exec chmod 644 {} \;
   find catalog/ -type d -exec chmod 755 {} \;
   ```

### Via SSH/Shell

```bash
# Navigate to OpenCart root
cd /path/to/opencart/

# Extract theme package
unzip anima-theme-v1.0.0.zip -d temp/

# Copy files
cp -r temp/anima-theme-v1.0.0/admin/* admin/
cp -r temp/anima-theme-v1.0.0/catalog/* catalog/
cp -r temp/anima-theme-v1.0.0/system/* system/
cp temp/anima-theme-v1.0.0/install.json .

# Set permissions
chmod 644 install.json
find admin/controller/theme/ -type f -exec chmod 644 {} \;
find catalog/view/ -type f -exec chmod 644 {} \;

# Cleanup
rm -rf temp/

# Clear cache
rm -rf system/storage/cache/*
```

## Version Updates

When releasing a new version:

1. **Update Version Numbers**
   - `install.json` - version field
   - `README.md` - version references
   - `CHANGELOG.md` - add new version section

2. **Test Thoroughly**
   - Test on clean OpenCart installation
   - Test upgrade from previous version
   - Verify all features work

3. **Update Documentation**
   - Document new features
   - Update screenshots if UI changed
   - Update CHANGELOG.md

4. **Create New Package**
   - Follow packaging steps above
   - Use new version number
   - Test installation of new package

5. **Release**
   - Tag in Git: `git tag v1.0.1`
   - Push tag: `git push origin v1.0.1`
   - Create GitHub release
   - Upload to marketplace (if applicable)

## Backup Before Deployment

Always backup before deploying to production:

```bash
# Backup database
mysqldump -u username -p database_name > backup_$(date +%Y%m%d).sql

# Backup files
tar -czf opencart_backup_$(date +%Y%m%d).tar.gz /path/to/opencart/

# Or use OpenCart backup tools
# Admin → System → Maintenance → Backup / Restore
```

## Rollback Plan

If something goes wrong:

1. **Quick Rollback via Admin**
   - Switch to default theme
   - Disable Anima theme

2. **File Rollback**
   - Restore from backup
   - Remove theme files if needed

3. **Database Rollback** (if needed)
   - Restore database backup
   - Note: Only if database changes were made

## Post-Deployment Checklist

After deployment:
- [ ] Clear OpenCart cache
- [ ] Clear browser cache
- [ ] Test homepage
- [ ] Test product pages
- [ ] Test cart operations
- [ ] Test checkout process
- [ ] Test on mobile device
- [ ] Check for console errors
- [ ] Verify image loading
- [ ] Test search functionality
- [ ] Test account pages
- [ ] Verify RTL support (if applicable)

## Support

For deployment issues:
- Check INSTALLATION.md troubleshooting section
- Review OpenCart logs: `system/storage/logs/`
- Check server error logs
- Contact: [Your support email/forum]

---

**Version**: 1.0.0  
**Last Updated**: December 2024  
**Author**: Abdullah Shion
