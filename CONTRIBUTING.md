# Contributing to Anima Theme

Thank you for your interest in contributing to the Anima OpenCart Theme! This document provides guidelines for contributing to the project.

## Table of Contents

- [Code of Conduct](#code-of-conduct)
- [How Can I Contribute?](#how-can-i-contribute)
- [Development Setup](#development-setup)
- [Coding Standards](#coding-standards)
- [Commit Guidelines](#commit-guidelines)
- [Pull Request Process](#pull-request-process)
- [Reporting Bugs](#reporting-bugs)
- [Suggesting Enhancements](#suggesting-enhancements)

## Code of Conduct

### Our Pledge

We are committed to making participation in this project a harassment-free experience for everyone, regardless of age, body size, disability, ethnicity, gender identity and expression, level of experience, nationality, personal appearance, race, religion, or sexual identity and orientation.

### Our Standards

- Be respectful and inclusive
- Accept constructive criticism gracefully
- Focus on what is best for the community
- Show empathy towards other community members

## How Can I Contribute?

### 1. Reporting Bugs

Before creating bug reports, please check existing issues to avoid duplicates.

**When reporting bugs, include:**
- OpenCart version
- PHP version
- Browser and version
- Steps to reproduce
- Expected behavior
- Actual behavior
- Screenshots (if applicable)
- Error messages (if any)

### 2. Suggesting Enhancements

Enhancement suggestions are welcome! Please provide:
- Clear description of the enhancement
- Use case and benefits
- Possible implementation approach
- Screenshots or mockups (if applicable)

### 3. Code Contributions

We welcome code contributions! See the [Pull Request Process](#pull-request-process) below.

## Development Setup

### Prerequisites

- OpenCart 4.1.0.3 development environment
- PHP 8.0 or higher
- MySQL 5.7 or higher
- Git
- Text editor or IDE (VS Code, PhpStorm recommended)

### Setup Steps

1. **Fork the repository**
   ```bash
   # Click the Fork button on GitHub
   ```

2. **Clone your fork**
   ```bash
   git clone https://github.com/YOUR-USERNAME/anima.git
   cd anima
   ```

3. **Create a branch**
   ```bash
   git checkout -b feature/your-feature-name
   # or
   git checkout -b fix/your-bug-fix
   ```

4. **Set up OpenCart**
   - Install OpenCart 4.1.0.3
   - Copy theme files to OpenCart directories
   - Install the theme

5. **Make your changes**
   - Edit files as needed
   - Test thoroughly

## Coding Standards

### PHP Standards

Follow **PSR-12** coding standard:

```php
<?php
namespace Opencart\Catalog\Controller\Theme;

/**
 * Class name in PascalCase
 */
class Anima extends \Opencart\System\Engine\Controller {
    
    /**
     * Method in camelCase with return type
     */
    public function index(): string {
        // Code here
        return $this->load->view('template', $data);
    }
    
    /**
     * Private methods with descriptive names
     */
    private function prepareData(): array {
        // Code here
    }
}
```

**PHP Best Practices:**
- Use type hints for parameters and return types
- Add PHPDoc comments for all methods
- Use meaningful variable names
- Keep methods focused and small
- Follow SOLID principles
- Use proper namespaces

### Twig Template Standards

```twig
{# Use proper indentation #}
<div class="container">
  {% if products %}
    {% for product in products %}
      <div class="product">
        {{ product.name }}
      </div>
    {% endfor %}
  {% endif %}
</div>

{# Use descriptive variable names #}
{{ heading_title }}

{# Add comments for complex logic #}
{# Loop through categories and display with subcategories #}
```

### CSS Standards

Follow **BEM methodology** where applicable:

```css
/* Use meaningful class names */
.product-card {
  /* Properties */
}

.product-card__title {
  /* Element properties */
}

.product-card--featured {
  /* Modifier properties */
}

/* Use comments to separate sections */
/* ==========================================================================
   Product Cards
   ========================================================================== */

/* Keep selectors specific but not overly nested */
.product-card .product-image {
  /* Good - 2 levels */
}

/* Avoid deep nesting */
.container .row .col .product .image .overlay .button {
  /* Bad - too deep */
}
```

### JavaScript Standards

```javascript
// Use modern ES6+ syntax
const myFunction = (param) => {
  // Function body
};

// Use descriptive variable names
const productId = 123;
const isActive = true;

// Add comments for complex logic
/**
 * Update cart total and display
 * @param {number} quantity - Product quantity
 */
function updateCart(quantity) {
  // Implementation
}

// Use jQuery consistently with OpenCart
$('#button-cart').on('click', function() {
  // Event handler
});
```

## Commit Guidelines

### Commit Message Format

```
<type>(<scope>): <subject>

<body>

<footer>
```

### Types

- **feat**: New feature
- **fix**: Bug fix
- **docs**: Documentation changes
- **style**: Code style changes (formatting, etc.)
- **refactor**: Code refactoring
- **test**: Adding tests
- **chore**: Maintenance tasks

### Examples

```bash
feat(product): add product zoom functionality

Implemented image zoom on hover for product detail pages.
Uses magnific popup library for zoom effect.

Closes #123

fix(cart): correct quantity calculation

Fixed issue where cart quantity was not updating correctly
when using the increment/decrement buttons.

Fixes #456

docs(readme): update installation instructions

Added detailed steps for manual installation via FTP.
Includes troubleshooting section.
```

## Pull Request Process

### Before Submitting

1. **Test your changes**
   - Test on clean OpenCart install
   - Test in multiple browsers
   - Test RTL layout if applicable
   - Test mobile responsiveness

2. **Update documentation**
   - Update README.md if needed
   - Update CHANGELOG.md
   - Add code comments

3. **Follow coding standards**
   - Run PHP linter
   - Check CSS formatting
   - Validate HTML/Twig

### Submitting PR

1. **Push to your fork**
   ```bash
   git push origin feature/your-feature-name
   ```

2. **Create Pull Request**
   - Go to GitHub
   - Click "New Pull Request"
   - Select your branch
   - Fill in the template:

```markdown
## Description
Brief description of changes

## Type of Change
- [ ] Bug fix
- [ ] New feature
- [ ] Documentation update
- [ ] Code refactoring

## Testing
- [ ] Tested on OpenCart 4.1.0.3
- [ ] Tested in Chrome, Firefox, Safari
- [ ] Tested mobile responsive
- [ ] Tested RTL layout

## Screenshots
(if applicable)

## Checklist
- [ ] Code follows project style guidelines
- [ ] Documentation updated
- [ ] CHANGELOG.md updated
- [ ] No console errors
```

3. **Wait for review**
   - Maintainers will review your PR
   - Address any requested changes
   - PR will be merged when approved

## Reporting Bugs

### Before Reporting

1. Check existing issues
2. Verify it's not a configuration issue
3. Test on clean OpenCart install
4. Gather required information

### Bug Report Template

```markdown
**Describe the bug**
A clear description of what the bug is.

**To Reproduce**
Steps to reproduce:
1. Go to '...'
2. Click on '...'
3. Scroll down to '...'
4. See error

**Expected behavior**
What you expected to happen.

**Screenshots**
Add screenshots if applicable.

**Environment:**
- OpenCart Version: [e.g., 4.1.0.3]
- PHP Version: [e.g., 8.1]
- Browser: [e.g., Chrome 120]
- Theme Version: [e.g., 1.0.0]

**Additional context**
Any other relevant information.
```

## Suggesting Enhancements

### Enhancement Template

```markdown
**Is your feature request related to a problem?**
A clear description of the problem.

**Describe the solution you'd like**
Clear description of what you want.

**Describe alternatives you've considered**
Other approaches you've thought about.

**Additional context**
Mockups, examples, or additional information.
```

## Questions?

If you have questions about contributing:

- Open a GitHub Discussion
- Email: info@sportakw.com
- Create an issue with the "question" label

## License

By contributing, you agree that your contributions will be licensed under the MIT License.

---

Thank you for contributing to Anima Theme! 🎉
