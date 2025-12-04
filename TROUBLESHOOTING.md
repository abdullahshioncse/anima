# Anima Theme - OpenCart 4.1.0.3 Installation Troubleshooting

## If You're Getting "Page Not Found" Error

### Step 1: Verify Extension Installation
1. Go to **Extensions > Installer** in your OpenCart admin
2. Upload the theme ZIP file
3. After installation, go to **Extensions > Extensions**
4. Select **Themes** from the dropdown
5. Find "Anima Theme" and click the **Install** button (green plus icon)
6. After installation, click the **Edit** button (pencil icon)

### Step 2: Correct Access Route
The theme settings should be accessible at:
```
admin/index.php?route=extension/theme/anima&user_token=YOUR_TOKEN&store_id=0
```

**NOT** at:
```
admin/index.php?route=extension/anima/theme/anima  (WRONG!)
```

### Step 3: Manual Installation (Alternative)
If the installer doesn't work, manually upload via FTP:

1. Extract the ZIP file
2. Upload the entire contents to your OpenCart root directory, maintaining the folder structure:
   - `admin/` folder → `your-opencart/admin/`
   - `catalog/` folder → `your-opencart/catalog/`
   - `extension.json` → `your-opencart/extension/anima/extension.json`
   - `install.json` → `your-opencart/extension/anima/install.json`

3. After uploading, go to OpenCart admin:
   - **Extensions > Extensions**
   - Select **Themes** from dropdown
   - Click **Install** on Anima Theme
   - Click **Edit** to configure

### Step 4: Enable the Theme
1. Go to **Design > Themes**
2. Click **Add New** or edit your store
3. Select "Anima" as the theme
4. Save changes

### Step 5: Clear Cache
1. Go to **Dashboard**
2. Click the gear icon (Settings) in the top right
3. Click **Refresh** buttons for Theme and SASS cache

## File Structure Verification
Ensure these files exist in your OpenCart installation:

```
admin/
└── controller/
    └── extension/
        └── theme/
            └── anima.php  ← MUST BE HERE

admin/
└── language/
    └── en-gb/
        └── extension/
            └── theme/
                └── anima.php  ← MUST BE HERE

admin/
└── view/
    └── template/
        └── extension/
            └── theme/
                └── anima.twig  ← MUST BE HERE
```

## Common Issues

### Issue: "Page Not Found" in Admin
**Cause**: Incorrect route or extension not installed
**Solution**: 
- Make sure you've clicked "Install" in Extensions > Extensions > Themes
- Use correct route: `extension/theme/anima`

### Issue: Theme Not Listed
**Cause**: Files not uploaded correctly
**Solution**: 
- Verify file structure matches above
- Check file permissions (755 for directories, 644 for files)

### Issue: Blank Page
**Cause**: PHP errors
**Solution**: 
- Enable error reporting in OpenCart
- Check PHP error logs
- Ensure PHP 8.0+ is installed

## Support
If issues persist:
1. Check your PHP error logs
2. Verify OpenCart version is 4.1.0.3
3. Ensure proper file permissions
4. Try reinstalling via Extensions > Installer

## Database Tables
This theme doesn't require custom database tables. All settings are stored using OpenCart's standard settings system with prefix `theme_anima_`.
