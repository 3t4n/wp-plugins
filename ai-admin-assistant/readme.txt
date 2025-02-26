=== AI Admin Assistant ===
Contributors: proteczone
Tags: ai, claude, artificial intelligence, content generation, wordpress ai
Requires at least: 6.0
Tested up to: 6.7
Stable tag: 1.0.0
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Get intelligent assistance for writing, SEO, and technical tasks using Claude AI technology.

== Description ==

AI Admin Assistant revolutionizes WordPress content management by bringing Claude AI's capabilities directly into your dashboard. Whether you're writing blog posts, optimizing content for SEO, or managing technical aspects of your site, this plugin provides intelligent assistance every step of the way.

**Why Choose AI Admin Assistant?**

* Seamless Integration: Works directly within your WordPress dashboard
* Time-Saving: Generate ideas, draft content, and solve problems faster
* Versatile: Helps with content, technical issues, and site optimization
* Security-Focused: Secure API key storage and role-based access

**Technical Requirements:**

* WordPress 6.0 or higher
* PHP 7.4 or higher
* Claude AI API key (sign up at https://console.anthropic.com/)
* Stable internet connection

== Third-Party Libraries ==

This plugin uses the following third-party libraries:

= JavaScript Libraries =
* Marked.js (v4.0.2): Markdown parsing library
  - Source: https://github.com/markedjs/marked
  - License: MIT License
* Highlight.js (v11.5.1): Code syntax highlighting library
  - Source: https://github.com/highlightjs/highlight.js
  - License: BSD 3-Clause License

The minified versions of these libraries are included in the `/assets/js/` directory. 
Source files can be found in their respective GitHub repositories.

== External Services ==

= Claude AI API =
* Service: Anthropic Claude AI
* Purpose: Providing AI-powered assistance within the WordPress admin dashboard
* Data Sent: 
  - User queries are sent to the Claude AI API
  - No personal identifying information is transmitted
* When Data is Sent: 
  - Each time a user sends a message in the AI Assistant interface
* Service Links:
  - Terms of Service: https://www.anthropic.com/terms
  - Privacy Policy: https://www.anthropic.com/privacy

Users must obtain their own API key from Anthropic to use this plugin.

== Build Process ==
No complex build process is used for this plugin. Minification is done manually for performance.

== Installation ==

1. **Plugin Installation**
    * Method 1: Upload `ai-assistant` folder to `/wp-content/plugins/`
    * Method 2: Install via WordPress plugin repository

2. **Configuration**
    * Activate plugin through WordPress 'Plugins' menu
    * Navigate to 'AI Assistant > Settings'
    * Enter your Claude API key
    * Configure access permissions

3. **First Use**
    * Access AI Assistant from the main menu
    * Start with a test query to verify connection
    * Review available features and commands

(Rest of the file remains the same as in the original version)
