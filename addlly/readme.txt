=== Addlly AI - AI Content Writer and 1 Click AI Blog Generator ===
Contributors: addlly  
Tags: AI Content, Content Generator, AI Writer, SEO Optimization, Content Creation  
Requires at least: 5.0  
Requires PHP: 7.4  
Tested up to: 6.7  
Stable tag: 1.0.2  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

Create SEO-optimized blogs in one click with the best AI writer for WordPress. Get topic suggestions, keywords, meta tags, FAQ schema.

== Description ==
Take your WordPress website to the next level with **Addlly AI**, the smartest and most advanced **1 Click AI Blog Writer** and **AI Content Generator**. 🎯 Whether you’re a blogger, marketer, or business owner, this plugin makes creating awesome, SEO-friendly content a breeze. No more struggling with writer’s block or wasting hours on repetitive tasks—just sit back and let Addlly AI do the heavy lifting! 💪 

== What Can Addlly AI Do for You? ==
✅ **1-Click Blog Writer:** Instantly create a complete blog post with proper structure, headings, and SEO optimization - just by clicking a button. 🖱️
✅ **9 Powerful AI Models:** Pick from cutting-edge AI models like **GPT 3.5, GPT 4, Claude 3,** and more. Customize your content exactly how you want it. 🧠
✅ **Write in 8 Different Languages:** From **English** to **Mandarin** and **Arabic**, create content for a global audience with ease. 🌍
✅ **Geo-Targeted Content:** Generate content tailored to your audience’s location. Perfect for local businesses and targeted marketing campaigns! 📍
✅ **AI Social Media Post Generator:** Turn your blog posts into ready-to-go **Facebook, Instagram, LinkedIn,** and **X** updates in just one click. Boost your online presence in seconds! 📱✨
✅ **Google Ads Copy Generator:** Need an ad that grabs attention? Create high-converting **Google Ads copy** in no time. 🛒
✅ **High-Quality AI Images:** Add stunning visuals to your content without lifting a finger. AI-generated images are added automatically to match your blog theme. 🎨📸
✅ **FAQs with Schema in 1 Click:** Answer your audience’s questions and improve your SEO with auto-generated FAQs that come with FAQ Schema. 📝💡
✅ **Auto Meta Tags:** Let Addlly AI handle your **meta titles** and **meta descriptions** for better search engine visibility. 🚦

== Why Choose Addlly AI? ==
Addlly AI is your ultimate content partner. Whether it’s blogs, social media posts, FAQs, or even ad copy, this plugin saves you time, effort, and energy while giving you professional results every time. 🏆

Perfect for beginners and pros alike, Addlly AI makes content creation fun, fast, and super easy. With just a few clicks, you’ll have engaging, high-quality content that ranks well on search engines and connects with your audience.

✨ **Start using Addlly AI today and let your content shine brighter than ever!** 🌟

== AWS Lambda Integration ==
This plugin connects to AWS Lambda functions created by addlly.ai to dynamically create and fetch content for your WordPress site using various AI tools. No personal data which was not provided at the time of account creation is used for this generations.
== Content and SEO Management ==
The plugin uses APIs hosted on domains like https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com and https://geykspiywxmc7m5tf6kqgxpml40pmjun.lambda-url.ap-southeast-1.on.aws to manage articles, FAQs, schema markup, and SEO scores. Data such as article IDs, user IDs, and metadata is transmitted to generate, edit, archive, and evaluate content performance.

== Social Media Post Creation ==
APIs on domains such as https://yogafegrxm2qjh3jrommo5zffq0htlus.lambda-url.ap-southeast-1.on.aws facilitate the creation of posts tailored for LinkedIn, Facebook, Twitter, and Instagram. The plugin processes data like article IDs, user details (e.g., username), and post types to generate and save social media content, including hashtag suggestions.

== Image Management ==
AI-generated and royalty-free images are created or fetched using APIs hosted on domains such as https://4clzwsr7wovizhmefo4edpald40vauzx.lambda-url.ap-southeast-1.on.aws and https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com. These APIs receive data like user IDs, article IDs, and image types to provide images suited for blog posts and social media.

== Ad Copy Management ==
The plugin employs APIs hosted on https://ivypyewc4nadrtgh75pmaxxbyu0jzvww.lambda-url.ap-southeast-1.on.aws and https://34dy5cqczxarietmlhjuvnpfba0weckh.lambda-url.ap-southeast-1.on.aws to generate and manage Google Ad copy. Keywords, article IDs, and user-specific details are transmitted to ensure optimized and targeted ad content.

== User Authentication and Management ==
Authentication processes rely on APIs hosted on https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com. The plugin securely transmits the user’s name, username, email, and domain details for login, token generation, and user detail retrieval, ensuring personalized and secure access to plugin features.

== Refund Requests ==
Refund requests are managed through APIs on https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com. These endpoints process details such as article IDs, refund request IDs, and user-provided comments to retrieve refund histories and handle new requests.

== Saving Generated Articles ==
The domain https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api is specifically used to save the articles generated by the plugin into Addlly’s database. Data sent includes the article ID, user ID, and the content of the generated article to maintain a history and facilitate further content management.

**How It Works:**  
1. Sends predefined parameters (e.g., user input or page context) to AWS Lambda when the shortcode/widget is executed.  
2. Uses customizable endpoints and parameters for seamless integration.  

Ensure compliance with your AWS account terms and privacy policies.

== Features ==
- **AI-Powered Content Generation:** Generate unique and engaging content effortlessly.  
- **SEO Optimization:** Create keyword-rich, search engine-friendly content.  
- **Customizable Prompts:** Match content to your brand voice and style.  
- **Multilingual Support:** Reach audiences globally.  
- **Seamless Integration:** Directly integrated with the WordPress editor.

== Installation ==
1. **Download the Plugin:** Search for "Addlly AI" in the WordPress plugin directory.  
2. **Upload to WordPress:** Upload files to the `/wp-content/plugins/` directory.  
3. **Activate Plugin:** Activate through the 'Plugins' menu in WordPress.  
4. **Configure Settings:** Navigate to *Settings > Addlly AI* to enter your API key and preferences.  
5. **Start Generating Content:** Use the Addlly AI toolbar in your editor.

== Source Code and Build Instructions ==
This plugin includes compressed CSS and JavaScript files for production. The original source code is available in the `/assets/lib/src` directory of the plugin.

== Frequently Asked Questions ==
**Q: Is Addlly AI free to use?**  
A: The plugin is free to install. A subscription is required for AI content generation.

**Q: Can I edit the AI-generated content?**  
A: Yes, you can modify content to suit your needs.

**Q: Does Addlly AI support other languages?**  
A: Absolutely! Addlly AI supports multiple languages for a global audience.

**Q: How does Addlly AI help with SEO?**  
A: It generates content optimized with keywords, meta tags, and structure for better search engine visibility.

== Screenshots ==
1. **Addlly AI in Action:** Easily generate content with a click.  
2. **Settings Page:** Simple and intuitive configuration.  
3. **Content Editor Integration:** Fully integrated with the WordPress editor.

== Changelog ==

**Version 1.0.2**  

- Minor changes.

**Version 1.0.1**  

- Fix the issue with regenerating the modal box.

**Version 1.0.0**  

- Initial release with AI content generation, SEO optimization, and multilingual support.

== Support ==
Need help? Visit our [Support Page](https://addlly.ai/support) or contact us at support@addlly.ai.
