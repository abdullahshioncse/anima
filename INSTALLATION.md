# Anima Theme Installation Guide for OpenCart 4.0.1.3

## Prerequisites

- OpenCart 4.0.1.3 installed and running
- FTP/SFTP access or file manager access to your server
- Access to OpenCart admin panel

## Installation Steps

### Step 1: Upload Theme Files

1. Download or clone the Anima theme repository
2. Upload the following directories to your OpenCart root directory:
   - `admin/` → Upload to your OpenCart's `admin/` directory
   - `catalog/` → Upload to your OpenCart's `catalog/` directory
   - `system/` → Upload to your OpenCart's `system/` directory (if there are any files)

**Important**: Do not replace existing OpenCart files. Only add the Anima theme files.

### Step 2: Set File Permissions

Ensure proper file permissions are set:
```bash
chmod 644 admin/controller/theme/anima.php
chmod 644 admin/language/en-gb/theme/anima.php
chmod 644 admin/view/template/theme/anima.twig
chmod 644 catalog/controller/startup/anima.php
chmod -R 644 catalog/view/template/*
chmod -R 644 catalog/view/stylesheet/*
chmod -R 644 catalog/view/javascript/*
chmod -R 644 catalog/view/image/*
```

### Step 3: Install Theme from Admin Panel

1. Log in to your OpenCart admin panel
2. Navigate to **Extensions** → **Extensions**
3. From the dropdown, select **Themes**
4. Find **Anima Theme** in the list
5. Click the **Install** button (green plus icon)
6. Once installed, click the **Edit** button (blue pencil icon)
7. Set **Status** to **Enabled**
8. Click **Save**

### Step 4: Set as Default Theme

1. Go to **System** → **Settings**
2. Click **Edit** for your store
3. Go to the **Server** tab
4. In the **Theme** dropdown, select **Anima**
5. Click **Save**

### Step 5: Clear Cache

1. Go to **Dashboard** → **Developer Settings**
2. Click the **Refresh** button for:
   - Theme Cache
   - SASS Cache (if applicable)
3. You may also want to clear your browser cache

### Step 6: Verify Installation

1. Visit your store's front-end
2. You should see the Anima theme with:
   - Arabic RTL layout
   - Orange/black color scheme
   - Modern product cards
   - Icon-based navigation

## Configuration

### Customizing Colors

Edit `catalog/view/stylesheet/styleguide.css`:
```css
:root { 
  --a4a4a4: #a4a4a4;      /* Gray */
  --black: #000000;        /* Black */
  --d7d7d7: #d6d6d6;      /* Light Gray */
  --ececec: #ebebeb;      /* Very Light Gray */
  --ff7c17: #ff7c17;      /* Primary Orange - CHANGE THIS */
  --ffffff: #ffffff;       /* White */
  --x1c1c1c: #1c1c1c;     /* Dark Gray */
}
```

### Customizing Layout

The theme uses multiple CSS files:
- `desktop-1.css` - Homepage styles
- `desktop-2.css` - Product listing styles
- `desktop-3.css` - Category page styles
- `desktop-4.css` - Information page styles

### Adding Categories to Navigation

The navigation menu automatically displays categories from OpenCart. To manage:
1. Go to **Catalog** → **Categories**
2. Add or edit categories
3. Set **Status** to **Enabled**
4. Set **Top** to **Yes** for categories you want in the main navigation

### Configuring Homepage Products

The homepage displays two product sections:
1. **You May Like** - Recommended products
2. **New Arrivals** - Latest products

These need to be configured in the home controller or through OpenCart modules.

## Troubleshooting

### Theme Not Appearing

1. Clear OpenCart cache (Dashboard → Developer Settings → Refresh)
2. Check file permissions
3. Verify theme is enabled in Extensions → Themes
4. Verify theme is selected in System → Settings → Server tab

### CSS Not Loading

1. Check that CSS files exist in `catalog/view/stylesheet/`
2. Verify file permissions (should be 644)
3. Clear browser cache
4. Check browser console for 404 errors

### Images Not Displaying

1. Verify images are in `catalog/view/image/`
2. Check file permissions (should be 644)
3. Verify image paths in templates

### JavaScript Cart Functions Not Working

1. Ensure `catalog/view/javascript/anima.js` is loaded
2. Check browser console for JavaScript errors
3. Verify OpenCart's native cart functions are available

## Mobile Responsive

The theme includes responsive CSS files:
- `iphone-13-u38-14-1.css` - Mobile homepage
- `iphone-13-u38-14-4.css` - Mobile category
- `iphone-13-u38-14-5.css` - Mobile product
- `iphone-13-u38-14-6.css` - Mobile information

These should automatically apply on mobile devices.

## RTL (Right-to-Left) Support

The theme is designed for Arabic (RTL) language:
1. Go to **System** → **Localisation** → **Languages**
2. Edit your language
3. Set **Direction** to **Right to Left**
4. Save changes

## Support & Updates

For issues, questions, or feature requests:
1. Check the README.md file for documentation
2. Review the troubleshooting section above
3. Contact the theme developer

## Uninstallation

To remove the theme:
1. Go to **Extensions** → **Extensions** → **Themes**
2. Find **Anima Theme**
3. Click the **Uninstall** button (red minus icon)
4. Optionally, delete the theme files from your server

**Note**: Always backup your store before uninstalling themes.

## Credits

- Original Design: Anima
- OpenCart Conversion: Abdullah Shion
- Icons: Iconly Sharp Icon Set
- Fonts: Poppins (Google Fonts), Plus Jakarta Display

## License

This theme is provided as-is for use with OpenCart 4.0.1.3.
