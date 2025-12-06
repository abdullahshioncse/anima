# Anima Theme for OpenCart 4.1.0.3

![Anima Theme](catalog/view/theme/anima/image/rectangle-5-1.png)

A modern, RTL-ready e-commerce theme designed specifically for Arabic markets. Anima features a clean design, fully responsive layout, and complete OpenCart 4.1.0.3 compatibility.

## 🌟 Features

### Core Features
- ✅ **Full RTL Support** - Perfect Arabic right-to-left layout
- ✅ **OpenCart 4.1.0.3 Compatible** - Built with latest OpenCart standards
- ✅ **Fully Responsive** - Works flawlessly on all devices
- ✅ **Modern UI/UX** - Clean, contemporary design
- ✅ **Multi-language** - English and Arabic language files included
- ✅ **Performance Optimized** - Fast loading times
- ✅ **SEO Friendly** - Optimized for search engines

### Design Elements
- 🎨 Poppins font for modern typography
- 🖼️ High-quality Iconly Sharp icon set
- 🎯 Clean product cards with hover effects
- 💳 Payment method icons (Visa, Mastercard, Apple Pay)
- 📱 Mobile-first responsive design
- 🔄 Smooth animations and transitions

### E-commerce Features
- 🛒 Advanced shopping cart
- ❤️ Wishlist functionality
- 🔍 Advanced product search
- 📦 Product filtering and sorting
- ⭐ Product reviews and ratings
- 🏷️ Sale badges and labels
- 📊 Category management
- 👤 User account management

## 📋 Requirements

- OpenCart 4.1.0.3 or higher
- PHP 8.0 or higher
- MySQL 5.7 or higher
- Modern web browser

## 🚀 Installation

### Method 1: Extension Installer (Recommended)

1. **Download the theme** as a ZIP file
2. **Login to your OpenCart admin panel**
3. Navigate to **Extensions > Installer**
4. Click **Upload** and select the downloaded ZIP file
5. Wait for the installation to complete
6. Go to **Extensions > Extensions**
7. Select **Themes** from the extension type dropdown
8. Find **Anima Theme** and click **Install**
9. Click **Edit** to configure theme settings
10. Enable the theme and save

### Method 2: Manual Installation

1. **Extract the ZIP file**
2. **Upload files via FTP/SFTP**:
   - Upload `catalog/` folder to your OpenCart `catalog/` directory
   - Upload `admin/` folder to your OpenCart `admin/` directory
   - Upload `extension.json` to your OpenCart root directory

3. **Set permissions**:
   ```bash
   chmod 755 -R catalog/view/theme/anima/
   ```

4. **Activate the theme**:
   - Login to admin panel
   - Go to **Extensions > Extensions**
   - Select **Themes** from the dropdown
   - Find **Anima** and click **Install**
   - Click **Edit** to configure

## ⚙️ Configuration

### Theme Settings

Access theme settings via: **Extensions > Extensions > Themes > Anima > Edit**

#### General Settings
- **Status**: Enable/disable the theme
- **Phone Number**: Display phone in header
- **Email**: Store contact email
- **Sale Banner Text**: Top banner promotional text

#### Social Media Links
- **Facebook URL**: Link to your Facebook page
- **Twitter URL**: Link to your Twitter profile
- **Instagram URL**: Link to your Instagram account

### Store Configuration

Configure your store settings via **System > Settings > Edit Store**:

1. **Store Name**: Your store name
2. **Store Logo**: Upload your logo (recommended size: 200x50px)
3. **Currency**: Set your preferred currency (KWD, USD, etc.)
4. **Language**: Set default language (Arabic/English)

## 📁 File Structure

```
anima/
├── admin/
│   ├── controller/
│   │   └── theme/
│   │       └── anima.php
│   ├── language/
│   │   ├── en-gb/
│   │   │   └── theme/
│   │   │       └── anima.php
│   │   └── ar/
│   │       └── theme/
│   │           └── anima.php
│   └── view/
│       └── template/
│           └── theme/
│               └── anima.twig
│
├── catalog/
│   ├── controller/
│   │   └── theme/
│   │       └── anima.php
│   ├── model/
│   │   └── theme/
│   │       └── anima.php
│   ├── language/
│   │   ├── en-gb/
│   │   │   └── theme/
│   │   │       └── anima.php
│   │   └── ar/
│   │       └── theme/
│   │           └── anima.php
│   └── view/
│       └── theme/
│           └── anima/
│               ├── template/
│               │   ├── common/
│               │   │   ├── header.twig
│               │   │   ├── footer.twig
│               │   │   ├── home.twig
│               │   │   └── menu.twig
│               │   ├── product/
│               │   │   ├── product.twig
│               │   │   ├── category.twig
│               │   │   └── search.twig
│               │   ├── checkout/
│               │   │   └── cart.twig
│               │   ├── account/
│               │   │   ├── account.twig
│               │   │   ├── login.twig
│               │   │   └── register.twig
│               │   └── information/
│               │       ├── contact.twig
│               │       └── information.twig
│               ├── stylesheet/
│               │   ├── anima.css (main stylesheet)
│               │   ├── desktop-1.css
│               │   ├── desktop-2.css
│               │   ├── desktop-3.css
│               │   ├── desktop-4.css
│               │   ├── globals.css
│               │   ├── styleguide.css
│               │   └── fonts/
│               │       └── PlusJakartaDisplay-Medium.ttf
│               └── image/
│                   └── (169 image files)
│
└── extension.json
```

## 🎨 Customization

### Colors

Edit `catalog/view/theme/anima/stylesheet/styleguide.css`:

```css
:root { 
  --black: #000000;      /* Primary color */
  --ffffff: #ffffff;     /* Background/text */
  --ff7c17: #ff7c17;     /* Accent color */
  --a4a4a4: #a4a4a4;     /* Secondary text */
  --d7d7d7: #d6d6d6;     /* Borders */
}
```

### Fonts

The theme uses:
- **Poppins** (from Google Fonts) - Main font
- **Plus Jakarta Display** (included) - Secondary font

To change fonts, edit `catalog/view/theme/anima/stylesheet/globals.css`

### Layout

All layout modifications should be done in the respective Twig template files located in:
`catalog/view/theme/anima/template/`

### Adding Custom CSS

Add custom styles to `catalog/view/theme/anima/stylesheet/anima.css` at the end of the file.

## 🌐 RTL (Right-to-Left) Support

The theme automatically detects the language direction and applies RTL styles when Arabic is selected.

To enable RTL:
1. Go to **System > Localisation > Languages**
2. Edit Arabic language
3. Set **Direction** to **Right to Left**
4. Save changes

## 📱 Responsive Breakpoints

- **Desktop**: 1440px and above
- **Tablet**: 768px - 1439px
- **Mobile**: Below 768px

Responsive styles are included in individual CSS files:
- `iphone-13-u38-14-*.css` for mobile views

## 🛠️ Troubleshooting

### Theme Not Appearing
1. Clear OpenCart cache: **Dashboard > Developer Settings > Refresh**
2. Check file permissions (755 for directories, 644 for files)
3. Verify theme is enabled in Extensions

### CSS Not Loading
1. Check browser console for errors
2. Verify stylesheet paths in `header.twig`
3. Clear browser cache
4. Check server permissions

### Images Not Displaying
1. Verify image paths in templates
2. Check `catalog/view/theme/anima/image/` directory permissions
3. Ensure images were uploaded correctly

### RTL Issues
1. Verify language direction setting
2. Check `[dir="rtl"]` styles in `anima.css`
3. Clear cache and refresh browser

## 🔧 Developer Notes

### OpenCart 4.1.0.3 Compatibility

The theme follows OpenCart 4.x standards:
- Uses PHP 8.0+ namespaces
- Compatible with Twig 3.x template engine
- Follows MVC architecture
- Uses OpenCart's event system

### Controller Structure

```php
namespace Opencart\Catalog\Controller\Theme;

class Anima extends \Opencart\System\Engine\Controller {
    public function index(): string {
        // Controller logic
    }
}
```

### Model Structure

```php
namespace Opencart\Catalog\Model\Theme;

class Anima extends \Opencart\System\Engine\Model {
    // Model methods
}
```

## 📝 Changelog

### Version 1.0.0 (2025-01-04)
- Initial release
- Full OpenCart 4.1.0.3 compatibility
- Complete RTL support
- Arabic and English language files
- Responsive design
- All core pages implemented
- Admin theme settings panel

## 🤝 Support

For support, questions, or feature requests:

- **GitHub Issues**: [Create an issue](https://github.com/abdullahshioncse/anima/issues)
- **Email**: info@sportakw.com
- **Phone**: 965-22091914

## 📄 License

This theme is licensed under the MIT License. See the LICENSE file for details.

## 👨‍💻 Credits

- **Developer**: Abdullah Shion
- **Repository**: [github.com/abdullahshioncse/anima](https://github.com/abdullahshioncse/anima)
- **OpenCart Version**: 4.1.0.3
- **Theme Version**: 1.0.0

## 🙏 Acknowledgments

- OpenCart team for the amazing platform
- Poppins font by Google Fonts
- Iconly icon set

---

**Made with ❤️ for Arabic e-commerce markets**
