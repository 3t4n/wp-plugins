=== AI Chat Simulator ===
Contributors: bozdogan
Tags: chatgpt, openai, chatbot, education
Requires at least: 5.0
Tested up to: 6.5
Requires PHP: 7.0
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

AI Chat Simulator allows you to simulate conversations with OpenAI's ChatGPT directly on your WordPress site, enhancing learning experiences.

== Description ==

AI Chat Simulator brings the power of OpenAI's ChatGPT directly to your website, allowing users to engage & explore with AI. Host interactive chat sessions, bypassing the need for external access to OpenAI's platform.

Key Features:
- Shortcode integration for easy placement on any page or post.
- Sessions management to keep the conversation flow even after page refreshes.
- Customizable to use your OpenAI API key for seamless chat experiences.

== Installation ==

1. Upload the `ai-chat-simulator` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to Settings > AI Chat Simulator to configure the plugin and set your OpenAI API key.
4. Use the shortcode `[boai_chatgpt_simulator]` in your pages or posts where you want the ChatGPT chat interface to appear.
5. Make any page password protected by editing the page visibility settings in WordPress to restrict access to authorized users only.

== Open AI ==

AI Chat Simulator utilizes API from [OpenAI](https://platform.openai.com/). This plugin does not gather any information from your OpenAI account except for the number of tokens utilized. The data transmitted to the OpenAI servers primarily consists of the content of your messages. The usage shown in the plugin's settings is just for reference. It is important to check your usage on the [OpenAI website](https://platform.openai.com/account/usage) for accurate information. Please also review their [Privacy Policy](https://openai.com/privacy/) and [Terms of Service](https://openai.com/terms/) for further information.

== Frequently Asked Questions ==

= How do I obtain an OpenAI API key? =
Visit [https://openai.com/api/] to sign up for an API key. You'll need to create an account and subscribe to a plan that suits your needs.

= Can I customize the appearance of the chat interface? =
The plugin comes with a default style, but don't worry as we are working on this feature in order to let you override these styles in your theme's stylesheet for further customization.

= Is the chat history saved? =
Yes, chat history is stored in the user's session, allowing for continuity in the conversation even if the page is refreshed. Note that chat history is cleared when the browser session ends and we do not store your data in our servers.

== Screenshots ==

1. The chat interface on a page.
2. Settings page where you can enter your OpenAI API key.

== Changelog ==

= 1.0.0 =
* Initial release. Provides basic chat functionality with ChatGPT using OpenAI API.

== Upgrade Notice ==

= 1.0.0 =
Initial release. Please report any bugs or feedback to [Your Support Contact Information].

