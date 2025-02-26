=== AZRULAT ===
Contributors: Redaksiya  
Tags: Azerbaijani, Russian, transliteration, slug, permalink  
Tested up to: 6.7  
Stable tag: 1.1  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

Convert Azerbaijani and Russian characters in slugs and filenames to Latin for SEO-friendly and readable permalinks.

== Description ==

AZRULAT is a lightweight free WordPress plugin that transliterates Azerbaijani and Russian characters into Latin equivalents, ensuring clean, SEO-optimized, and readable slugs and filenames. It also removes unwanted symbols, special punctuation, and excessive whitespace.

This plugin works automatically and is particularly beneficial for websites targeting Azerbaijani and Russian-speaking audiences. It helps improve search engine indexing and user-friendly URLs.

== Features ==

1. **Transliteration of Azerbaijani Characters**  
   Converts Azerbaijani-specific letters into Latin equivalents:  
   - `ə` → `e`, `ü` → `u`, `ı` → `i`, `ç` → `c`, `ş` → `s`, `ğ` → `g`  
   - `Ə` → `E`, `Ü` → `U`, `İ` → `I`, `Ç` → `C`, `Ş` → `S`, `Ğ` → `G`  

2. **Transliteration of Russian Cyrillic Characters**  
   Converts Russian Cyrillic letters to Latin equivalents:  
   - Examples:  
     - `А` → `A`, `а` → `a`, `Б` → `B`, `б` → `b`, `В` → `V`, `в` → `v`  
     - `Ж` → `Zh`, `ж` → `zh`, `Ч` → `Ch`, `ч` → `ch`, `Ш` → `Sh`, `ш` → `sh`  
     - `Щ` → `Shh`, `щ` → `shh`, `Ю` → `Yu`, `ю` → `yu`, `Я` → `Ya`, `я` → `ya`  

3. **Special Characters and Symbols Handling**  
   - Decodes HTML entities to prevent unwanted symbols (`8220`, `8221`, `8222`, etc.).
   - Converts spaces to hyphens (`-`).
   - Removes non-ASCII characters not defined in the transliteration table.
   - Replaces multiple hyphens with a single hyphen.

4. **Filename Sanitization**  
   - Ensures uploaded file names are transliterated and cleaned, following the same rules as post slugs.

5. **Automatic Integration**  
   - Hooks into WordPress filters to automatically apply transliteration to:
     - Post titles (slugs).
     - Term names.
     - Uploaded filenames.

== Example ==

**Input Title**: `Azərbaycan və Русский язык — 2025`  
**Output Slug**: `azerbaycan-ve-russkiy-yazyk-2025`  

**Input Title**: `Ağ rəngli kağız — alarsan`  
**Output Slug**: `ag-rengli-kagiz-alarsan`  

**Input Filename**: `Тестовые_данные_и_символы.JPG`  
**Output Filename**: `testovye-dannye-i-simvoly.jpg`  

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/azrulat` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. The plugin will automatically transliterate slugs and filenames.

== Frequently Asked Questions ==

**Q: Does the plugin support file uploads?**  
A: Yes, the plugin automatically applies transliteration to filenames when files are uploaded via the WordPress Media Library. This ensures that uploaded files have clean, SEO-friendly names.

**Q: Will the plugin work with custom post types, taxonomies, and pages?**  
A: Yes, the plugin seamlessly integrates with all post types (including pages), taxonomies, and file uploads, ensuring consistent transliteration across your WordPress site.

**Q: Can I exclude certain characters from being replaced?**  
A: No, the plugin uses a predefined transliteration table to replace Azerbaijani and Russian characters for better consistency and SEO optimization.

**Q: Does the plugin require any configuration?**  
A: No, AZRULAT works out-of-the-box and applies transliteration automatically to post slugs, filenames, and other supported content types.

== Changelog ==

= 1.1 =  
* Fixed an issue where symbols (e.g., `8220`, `8221`, `8222`) were being included in slugs due to HTML entity encoding.  
* Improved UTF-8 encoding consistency for slugs and filenames.  

= 1.0 =  
* Initial release with Azerbaijani and Russian character transliteration for slugs and filenames.

== Upgrade Notice ==

= 1.1 =  
- Fixed an issue with HTML entity encoding to ensure proper slug formatting on remote websites.  
- Improved UTF-8 encoding handling.  

= 1.0 =  
- Initial release, no upgrade required.
