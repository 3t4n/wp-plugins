Advanced Email Filter for Elementor Forms
=========================================

Table of Contents
-----------------

*   [Features](#features)
*   [Installation](#installation)
*   [Configuration](#configuration)
*   [Frequently Asked Questions](#faq)
*   [Hooks & Filters](#hooks)
*   [Translations](#translations)
*   [Contributing](#contributing)
*   [Changelog](#changelog)
*   [License](#license)

Features ✨
----------

*   **Global Blocklist/Whitelist**
    *   Manage site-wide email restrictions
    *   Override per-form settings
*   **Per-Form Control**
    *   Set form-specific filtering rules
    *   Combine with global settings
*   **Wildcard Support**
    *   Block domains: `@spamdomain.com`
    *   Restrict TLDs: `*.ru`
    *   Match patterns: `temp-*`

Installation 🛠️
----------------

1.  **Requirements**
    *   WordPress 5.6+
    *   Elementor Pro 3.0+
    *   PHP 7.4+
2.  **Install via WordPress**
    1.  Go to _Plugins → Add New_
    2.  Search for "Advanced Email Filter for Elementor Forms"
    3.  Install and activate

Configuration ⚙️
----------------

### Global Settings

1.  Navigate to _Email Filter → Settings_
2.  **Blocklist Section**
    
        @spamdomain.com, *.ru, fake-user@
    
3.  **Allowlist Section**
    
        @yourcompany.com, admin@, *.trusted.org
    

### Per-Form Settings

1.  Edit your Elementor Form widget
2.  Navigate to the _Email Filtering_ section
3.  Configure form-specific rules:
    
        # Blocklist (form-specific)
        @temp-domain.com, *.xyz
                    
        # Allowlist (form-specific)
        @client-domain.com, manager@
    

Frequently Asked Questions ❓
----------------------------

### Q: How do multiple patterns work?

A: Separate patterns with commas. Both global and form rules apply.

### Q: Which takes priority - global or form settings?

A: Allowlist rules always override blocklist. Form-specific settings combine with global rules.

Hooks & Filters 🔌
------------------
```php
// In your theme's functions.php or a custom plugin
// Modify validation error message
add_filter('aefe_validation_error', function($message, $email) {
    return sprintf(__('Error: %s is blocked', 'text-domain'), $email);
}, 10, 2);
```

Translations 🌍
---------------

Contribute translations:

1.  Clone repository
2.  Create pot files in `/languages/`

Contributing 🤝
---------------

We welcome contributions! Please follow:

*   WordPress coding standards
*   Semantic versioning
*   [WordPress documentation standards](https://developer.wordpress.org/coding-standards/)

Changelog 📜
------------

### 1.0.0 (27-01-2025)

*   Initial release
*   Global blocklist/allowlist

License 📄
----------

GPL-2.0+ | © 2025 Mahidul Islam Mukto