=== AI Sports Writer ===
Contributors: maoshield
Tags: sports, ai, content generation, automation
Tested up to: 6.7
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

An AI-powered WordPress plugin that generates engaging match articles from sports data, with customizable content scheduling for bloggers.

== Description ==

AI Sports Writer is a powerful WordPress plugin designed to automate the creation of sports-related content. By harnessing the power of AI and upcoming sports events data, this plugin generates engaging match articles, saving time for sports bloggers and content creators.

Key Features:

* Automated Content Generation: Utilizes AI to create unique and engaging sports articles.
* Upcoming Sports Events Data Integration: Pulls data for upcoming sports events to ensure timely and accurate content generation.
* Customizable Content Scheduling: Set your preferred publishing times for a consistent content flow.
* User-friendly Interface: Easy-to-use dashboard for managing all aspects of content generation.
* Multiple Sports Coverage: Supports various sports for diverse content creation.

Whether you're running a sports blog, news website, or just want to keep your audience updated with the latest sports news, AI Sports Writer is the perfect solution to streamline your content creation process.

== External Services ==

This plugin uses the following external services:

1. **OpenAI**:
   - **Purpose**: Used for generating AI-powered sports articles and AI-generated images.
   - **API Endpoints**:
     - `https://api.openai.com/v1/chat/completions`: For generating AI-based text content.
     - `https://api.openai.com/v1/images/generations`: For generating AI-based images (if enabled).
   - **Data Sent**:
     - Text prompts provided by the plugin for text content generation.
     - Image generation prompts if DALL-E functionality is enabled.
   - **This service is provided by "OpenAI":**:
     - [Terms of Service](https://openai.com/terms/)
     - [Privacy Policy](https://openai.com/privacy/)

2. **ScaleSP**:
   - **Purpose**: Used to fetch sports event data for generating accurate and timely content.
   - **API Endpoint**:
     - `https://api.scalesp.com/api/v1/football`
   - **Data Sent**:
     - API requests using the region and sport type configuration provided by the user in plugin settings.
   - **This service is provided by "ScaleSp":**:
     - [Terms of Service](https://scalesp.com/terms/)
     - [Privacy Policy](https://scalesp.com/privacy-policy/)

**Note**:
- These services are critical for the plugin's functionality. The data sent is limited to what is required for the intended purpose.
- Users are encouraged to review the respective terms and privacy policies for compliance.


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/ai-sports-writer` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the Settings->AI Sports Writer screen to configure the API keys and options.

== Frequently Asked Questions ==

= Does this plugin require any external API keys? =

Yes, the plugin requires API keys for sports data from https://scalesp.com and OpenAI services. You can enter these in the plugin settings.

= How often does the plugin generate content? =

Content generation frequency is customizable. You can set it up in the plugin's scheduling settings.

= Can I edit the generated content before publishing? =

Absolutely! The plugin generates future/scheduled posts which you can review and edit before publishing.

= Can I disable AI-generated images? =
Yes, there's a checkbox to enable or disable DALL-E image generation.


== Screenshots ==

1. Screenshot 1: A screenshot of the API Configuration page, showing fields for the Sport API Key, OpenAI API Key, OpenAI Model selection, and sports region configuration.
   Screenshot URL: ./assets/screenshot1.png

2. Screenshot 2: A screenshot of the Post Configuration page, displaying settings for Maximum Games Per Day, Maximum Games Per Hour, Post Intervals, Default Post Author, Default Post Category, AI Content Generation Prompt, Featured Image, and an option to toggle DALL-E Image Generation on or off.
   Screenshot URL: ./assets/screenshot2.png

3. Screenshot 3: A screenshot of the WordPress blog post listing, showcasing the AI-generated match articles, including title, content, and featured image.
   Screenshot URL: ./assets/screenshot3.png

== Changelog ==

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.0.0 =
This is the first version of the plugin. Install and start automating your sports content creation!

== Privacy Policy ==

AI Sports Writer uses external APIs to generate content and fetch sports data. We do not collect any personal data from your website visitors. However, please be aware that the external services we use may have their own privacy policies.