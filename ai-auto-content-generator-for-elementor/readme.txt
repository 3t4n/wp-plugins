=== AI Content Generator For Elementor ===  
Contributors: narinder-singh, satindersingh, coolplugins  
Tags: AI content generator, Chrome AI, Elementor, content creation, grammar correction  
Requires at least: 5.0  
Tested up to: 6.7  
Stable tag: 1.1.0 
Requires PHP: 7.2
Elementor tested up to: 3.27.0  
Elementor Pro tested up to: 3.27.0 
License: GPLv2 or later  
License URI: http://www.gnu.org/licenses/gpl-2.0.html  

Improve the quality of your Elementor website pages content with Chrome's built-in AI. Generate and rewrite your content to ensure every section of your website is engaging and professional.  

== Description ==  

The **AI Content Generator For Elementor** helps you maintain consistent and **engaging content** across your website. 

The AI Content Generator makes it easy to create engaging content that suits your audience. It helps you refine your writing quickly by:

- Expanding or shortening content.
- Correcting spelling and grammar.
- Simplifying or enhancing writing styles.

https://www.youtube.com/watch?v=5qvJtAupz7M

<h3>Why Choose AI Content Generator for Elementor?</h3>  
This plugin is perfect for bloggers, marketers, and website owners. Here’s why:  

- **Free and Fast:** No subscriptions required!
- **Secure and Private:** Your data stays local.
- **Save Time:** Automate content creation and editing.
- **User-Friendly:** Easy to use for all skill levels.
-  **Versatile:** Supports various content needs.
== Key Features ==  
* **Chrome's Built-in AI:** Quickly generate accurate content using Chrome’s built-in AI, which adapts to different writing styles and understands context.  
* **Automatic Content Generation:** Create high-quality paragraphs, blogs, product descriptions, and stories within minutes.  
* **Summarize Articles:** Turn lengthy articles into concise summaries to highlight key information.  
* **Create TL;DR Summaries:** Generate short, engaging summaries for posts and articles.  
* **Content Ideas:** Provide a prompt to the AI and get unique topic ideas.  
* **Grammar Correction:** Fix errors, from simple typos to complex grammar issues, for polished content.  
* **Adjust Content Length:** Expand or shorten content to fit your website’s design and tone.  
* **No Paid Subscription:** Fully free to use.  
* **Elementor Compatibility:** Seamless integration with Elementor page builder.  

== Enable Chrome AI Models ==  
To enable the AI Content Generator features:  
1. Update your Chrome browser to the latest version.  
2. Open Chrome and enable these flags:  

   - **chrome://flags/#optimization-guide-on-device-model** (set to Enabled BypassPerfRequirement).  
   - **chrome://flags/#prompt-api-for-gemini-nano**.  
   - **chrome://flags/#summarization-api-for-gemini-nano**.  

3. Use this code to confirm the Summarizer API is enabled:  
<pre>if ('ai' in self && 'summarizer' in self.ai) {
console.log("Model Exists");
}</pre>
4. Restart Chrome to apply changes.  

Here are some helpful resources to learn more about the APIs used in this plugin:

- [Chrome Built-in AI APIs Documentation](https://developer.chrome.com/docs/ai/built-in-apis)  
- [Chrome Summarizer API Documentation](https://developer.chrome.com/docs/ai/summarizer-api)  
- [Chrome Prompt API Documentation for Extensions](https://developer.chrome.com/docs/extensions/ai/prompt-api)

== Installation ==

1. Download the plugin ZIP file.  
2. In your WordPress admin dashboard, go to **Plugins > Add New**.  
3. Click **Upload Plugin** and select the ZIP file.  
4. Click **Install Now** and then **Activate** the plugin.  
5. Open your pages with Elementor and start using AI-powered content creation.  

<h3> Enable Chrome AI Models  </h3>
To enable the AI Content Generator features:  
1. Update your Chrome browser to the latest version.  
2. Open Chrome and enable these flags:  
   - **chrome://flags/#optimization-guide-on-device-model** (set to Enabled BypassPerfRequirement).  
   - **chrome://flags/#prompt-api-for-gemini-nano**.  
   - **chrome://flags/#summarization-api-for-gemini-nano**.  
3. Use this code to confirm the Summarizer API is enabled:  

<pre>if ('ai' in self && 'summarizer' in self.ai) {
console.log("Model Exists");
}</pre>

4. Restart Chrome to apply changes.  
Here are some helpful resources to learn more about the APIs used in this plugin:

- [Chrome Built-in AI APIs Documentation](https://developer.chrome.com/docs/ai/built-in-apis)  
- [Chrome Summarizer API Documentation](https://developer.chrome.com/docs/ai/summarizer-api)  
- [Chrome Prompt API Documentation for Extensions](https://developer.chrome.com/docs/extensions/ai/prompt-api)

== Screenshots ==
1. Adjust Content Make it shorter, longer, or more professional
2. Generate New Idea for content.
3. Correcting spelling and grammar.

== Frequently Asked Questions ==  

**1. Can I use this plugin on multiple websites?**  
Yes, you can use the plugin on multiple websites without any restrictions.  

**2. Does the plugin require an active internet connection?**  
Yes, an internet connection is required for Chrome's built-in AI features to function properly.  

**3. What happens if I don't enable the required Chrome flags?**  
If the Chrome flags are not enabled, the AI features like content generation and summarization will not work. Follow the setup instructions to enable these flags.
1. Update your Chrome browser to the latest version.  
2. Open Chrome and enable these flags:  
   - **chrome://flags/#optimization-guide-on-device-model** (set to Enabled BypassPerfRequirement).  
   - **chrome://flags/#prompt-api-for-gemini-nano**.  
   - **chrome://flags/#summarization-api-for-gemini-nano**.  
3. Use this code to confirm the Summarizer API is enabled:  
<pre>if ('ai' in self && 'summarizer' in self.ai) {
console.log("Model Exists");
}</pre>
4. Restart Chrome to apply changes.    

**4. Is this plugin compatible with Elementor Pro?**  
Yes, the plugin works seamlessly with both the free and Pro versions of Elementor.  

**5. Can I generate content in languages other than English?**  
Currently, the plugin primarily supports English, but Chrome's AI might offer limited functionality for other languages depending on availability.  

**6. Does this plugin work on mobile devices?**  
The plugin is designed for desktop usage, as Chrome's AI features require a desktop environment.  

**7. Will this plugin slow down my website?**  
No, since all the AI processing happens locally in the browser, it doesn't impact your website's performance.  

**8. Can I use this plugin with custom Elementor widgets?**  
Yes, the plugin can be used with custom widgets, as long as they support text editing.  

**9. How often do I need to update Chrome to ensure compatibility?**  
It's recommended to always use the latest version of Chrome to ensure compatibility with the AI features and the plugin.  

**10. What should I do if the AI-generated content isn't accurate?**  
You can provide more specific prompts or manually edit the content to better suit your needs.  

**11. Does this plugin store any of my data?**  
No, the plugin doesn't store any of your data. All processing happens locally in your browser.  

**12. Can I disable AI features for specific pages?**  
Currently, there's no option to disable AI features for specific pages, but you can choose not to use the AI tools on those pages.  

**13. Are there any plans to support other browsers like Firefox or Edge?**  
At the moment, the plugin is optimized for Google Chrome and its built-in AI features. There are no immediate plans for supporting other browsers.  

**14. Can I adjust the tone of the AI-generated content?**  
Yes, you can adjust the tone by providing specific instructions or editing the generated content manually.  

**15. Does the plugin support accessibility standards?**  
Yes, the plugin is designed to adhere to accessibility standards and works with Elementor's accessible components. 

== Changelog ==  
**Version 1.1.0 (28/01/2025)**  

* Added: This update integrates Google Chrome's built-in AI. Now, you can enjoy AI-powered features without paying for any external API services.
* Added: Integrated Google Chrome's built-in AI for enhanced functionality.  
* Removed: Open OpenAI API support.  

**Version 1.0.1 (15/02/2023)**  

* Improved: Updated SweetAlert library version.  
* Improved: Minor textual changes.  

**Version 1.0.0 (10/02/2023)**  

* Initial release.  

 == Upgrade Notice == 
**Version 2.0.0 (25/01/2025)** 

This update removes OpenAI API support and integrates Google Chrome's built-in AI. Now, you can enjoy AI-powered features without paying for any external API services.