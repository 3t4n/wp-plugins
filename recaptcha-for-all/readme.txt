=== Cloudflare Turnstile or reCAPTCHA For any Pages, to Block Spam and Hackers Attack. ===

Plugin Name: reCAPTCHA For All
Plugin URI: https://BillMinozzi.com/support/
Description: reCAPTCHA For All WordPress Plugin Protect ALL pages of your site against Spam and Hackers bots with reCAPTCHA Version 3.
Tags:  turnstile, cloudflare turnstile, add google recaptcha, recaptcha, recaptcha for blog
Author: Bill Minozzi
Author URI: https://BillMinozzi.com/
Contributors: sminozzi
Requires at least: 5.4
Tested up to: 6.7
Stable tag: 2.22
Version: 2.22
Requires PHP: 5.6.20
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Revolutionize reCAPTCHA or Cloudflare Turnstile. Enjoy an analytics chart. Protect all or selected pages against spam and bots.Free!

== Description ==
★★★★★<br>

This plugin provides advanced protection against bots, spam, hackers, fake users, and other types of automated abuse **on any selected Page** on your site. Utilize invisible reCaptcha V3 (Google) or Turnstile (Cloudflare) to secure your site without disrupting the user experience. **Customize the template (Appearance) and messages/language to fit your needs**. The plugin also allows you to block visitors from China. Translation ready. Files included: Dutch, English, French, Italian, Portuguese, Spanish, and German.
 **Additionally, it features analytics charts to monitor your site’s protection.**
Installing and getting started with the plugin is quick and easy—even for beginners. Just a few simple steps and you're up and running!

<a href="https://recaptchaforall.com/espanol/" target="_self">Spanish</a>
<a href="https://recaptchaforall.com/it/italiano-home/" target="_self">Italiano</a>
<a href="https://recaptchaforall.com/pt/portugues-iniciar/" target="_self">Portuguese</a>


**Revolutionize reCAPTCHA:**
<li>Free for commercial use. Turnstyle is 100% free, while Google has certain usage limits.</li>
<li>Test Button to easily check your keys.</li>
<li>Only reveal page content to humans, preventing bots from stealing content and damaging your SEO.</li>
<li>Customize the box design: color, text, background, image, and more.</li>
<li>Display the box exclusively during the initial visit for a seamless user experience.</li>
<li>Identify humans and bots right from the first visit.</li>
<li>Choose specific pages for protection or opt to secure all pages.</li>
<li>If using Cloudflare Turnstile, select from three types (Managed, Non-interactive, Invisible).</li>


**Enhanced User Experience:**
The box, featuring a tailored message and button, appears only once during the user's initial site visit. Manage the message's design, text, and button – ideal for introducing cookie policies or any initial communication.

For example:
<li> By continuing to browse, you consent to our use of cookies for a better website experience.</li>
<li> Click 'OK' to verify browser compatibility.</li>
<li> Human? Simply click 'Yes'...</li>
<li> Click Yes if you have more than X years old ... </li>
<li> Subscribe to our newsletter for the latest updates and stay informed! Click ... </li>
<li> Connect with us on social media and stay tuned for exciting updates and content! </li>
<li> After your visit, kindly share your feedback with us.</li>
<li> Sorry, we just need to make sure you're not a robot. For best results, please make sure your browser is accepting cookies.</li>
<li> And anything else you'd like to write...</li>

If you choose Google Recaptcha, after the user click the button, the plugin will send a request to google check that visitor reputation and google sends a immediate response with an score*.
(*) Cloudflare don't have the score feature.
Then, the plugin will allow the user with required score (the score filter rate is up to you) load the page otherwise will block with a forbidden error. 

The user browser needs accept cookies and be with javascript enabled. WordPress system also request that, then, it is not a big deal.

**This can avoid the bots from stealing your content, consume your bandwidth and overload your server.**

**Widely Trusted Compatibility:**
The plugin seamlessly accommodates major search engine bots, including Google, Bing (Microsoft), Facebook, Slurp (Yahoo), and Twitter, ensuring uninterrupted access for these reputable entities.
Expand the whitelist beyond major search engines to include essential services such as site uptime monitoring, PayPal, Stripe, and more. Tailor the whitelist table to suit your specific needs.

Note: This plugin requires Google or CloudFlare site key and secret key to work. 
Look the FAQ how to get that. 
This plugin conveniently provides a "Manage keys" tab within the plugin dashboard, enabling you to effortlessly test your keys.

[youtube https://www.youtube.com/watch?v=VY9cbONlrJo]

<a href="https://recaptchaforall.com/" target="_self">Plugin Site</a></li>


== Block visitors from China ==
If you are getting a lot of spam and malicious traffic from China, with our plugin 
you can block it without worry about install (and mantain) huge databases of IP address.
Just let our plugin take care that.  

This plugin is multi language ready. It also include files for Italian and Portuguese languages.
If you like to translate the plugin on your language, please, visit:
https://make.wordpress.org/polyglots/handbook/translating/glotpress-translate-wordpress-org/


== Screenshots ==
1. Initial Page box
2. Other Page box 
3. Other Page box 
4. Dashboard
5. Analytics

== FAQ ==

= Where Can I get My Google Site Key and Secret Key? = 
Visit Google:
https://www.google.com/recaptcha/admin

= Where Can I get My CloudFlare Turnstile Site Key and Secret Key? = 
Visit Cloudflare:
https://www.cloudflare.com/products/turnstile/

= How can I test my site keys?
To test your keys, navigate to the "Manage keys" tab in the plugin dashboard. Look for Test Keys button.

= Can I configurate the design of the initial page? =
Yes, you can go to Design tab on our dashboard.
You can also edit the file template.php on plugin root:
/wp-content/plugins/recaptcha-for-all/

= How to remove the plugin if I'm blocked? =
Just erase the plugin from:
/wp-content/plugins/recaptcha-for-all/

= Where Can I see the number of requests and score distribution? =
You can see that on google site.
https://www.google.com/recaptcha/admin/

= Is Google reCAPTCHA free? =
Yes, it is free up to a limited number of calls per month. However, it's advisable to check with Google for the latest details and updates before integrating the service. 
For more information, visit https://developers.google.com/recaptcha/docs/faq

= Is Turnstile Cloudflare free? =
Yes. Anyway, check with Cloudflare for details and updates about that before to begin to use the service.
https://www.cloudflare.com/products/turnstile/ 

= What is score? =
For each interaction, google return a IP score.
1.0 is very likely a good interaction, 0.0 is very likely a bot. 

= Where can I find more information about Google reCAPTHA? =
Visit Google site:
https://www.google.com/recaptcha/about/

= Where can I find more information about Turnstile Cloudflare?
Visit Cloudflare site:
https://www.cloudflare.com/products/turnstile/ 


= How To use Spanish for Mexico or Uruguai, for example =
If you want to use, for example, Mexico Spanish Language file, you need to make a copy of the Spanish file (included) and rename it. Look the example below:

Directory: /wp-content/plugins/recaptcha-for-all/language/
name: recaptcha-for-all-es_ES.mo
to: recaptcha-for-all-es_MX.mo
 
To know your country code, run this search on google:
wordpress complete list locale codes


= How can I see my initial page after activate the plugin? =
To see your initial page, try to access your site from other device (different IP) and where you never logged in.
<br>
Or try disable the cookies on your browser.



= If the plugin is not translated in my language? =

If the plugin is not translated in your language or if you want to change the translation, take a look at this link:
https://translate.wordpress.org/projects/wp-plugins/recaptcha-for-all/
You will find also the Translator Handbook there.
Current language files:
English, Italian, Portuguese and Spanish.

Please, contact us at our support page if you want we pre translate the plugin with one automatic tool. Then, you need just make small adjustments.


= Troubleshooting Question =
After install, check your initial page and if some preload image it is not stuck.
Look the previous FAQ.
For more about troubleshooting, visit:
https://siterightaway.net/troubleshooting/


=How do I set up reCAPTCHA on my WordPress site?=

This FAQ page also addresses the following questions: recaptcha on website, plugin recaptcha wordpress, wordpress captcha plugin, captcha plugin wordpress, recaptcha google, google recaptcha wordpress, recaptcha for wordpress, setup recaptcha wordpress, add google recaptcha, wp recaptcha, wordpress recaptcha, simple recaptcha, wordpress captcha plugin for contact form 7, best wordpress captcha plugin, wordpress captcha plugin for custom form, wordpress captcha plugin free download, wordpress captcha plugin download, best free captcha plugin for wordpress, add recaptcha to form, inserir recaptcha no site.

To set up reCAPTCHA on your WordPress site, install and activate our plugin "recaptcha for all." This plugin provides easy integration with various forms and ensures robust spam protection across your site.

=How can I integrate Cloudflare Turnstile CAPTCHA into my WordPress site?=

This FAQ page also addresses the following questions: cloudflare turnstile captcha on all wordpress page, how to show cloudflare turnstile captcha on any wo, wordpress plugin for cloudflare turnstile captcha, best wordpress plugin for cloudflare turnstile cap, how to fix cloudflare turnstile captcha not workin, how to set up cloudflare turnstile captcha in word, how to customize cloudflare turnstile captcha in w, recaptcha vs turnstile wordpress, cloudflare turnstile wordpress, wordpress cloudflare turnstile plugin, cloudflare turnstile plugin, cloudflare turnstile wp, cloudflare turnstile free plugin, cloudflare turnstile plugin for login, cloudflare turnstile plugin for comments, cloudflare turnstile plugin for signup forms, cloudflare turnstile plugin for woocommerce, cloudflare turnstile plugin for elementor, cloudflare turnstile plugin for buddypress, cloudflare turnstile plugin for gravity forms, turnstile for wordpress.

To integrate Cloudflare Turnstile CAPTCHA into your WordPress site, use our "recaptcha for all" plugin. This plugin supports multiple CAPTCHA methods, including Cloudflare Turnstile, and ensures seamless functionality across various forms and pages.

=What is the best way to protect my WordPress site from spam and bots?=

This FAQ page also addresses the following questions: fake user detection, detect fake users, block fake users, prevent automated content scraper, wordpress spam protection, wordpress bot protection, spam protection for wordpress, anti spam for wordpress, anti spam contact form wordpress, anti spam download free, comment spam protection wordpress, contact form spam protection, wordpress plugin to prevent spam comments.

To protect your WordPress site from spam and bots, we recommend using our "recaptcha for all" plugin. It provides comprehensive protection by detecting and blocking fake users, as well as offering advanced anti-spam features for your site.

=How do I secure my WordPress forms and ensure they are protected from spam?=

This FAQ page also addresses the following questions: wordpress security plugin, easy captcha wordpress, customizable captcha wordpress, best captcha plugin for wordpress, free captcha plugin wordpress, lightweight captcha plugin wordpress, how to add captcha to wordpress contact form, wordpress form protection, proteggere form dallo spam, proteggere form, protezione contro lo spam, proteger formulários web, how to show google recaptcha on any wordpress page, how to customize google recaptcha in wordpress, how to use google recaptcha with contact forms in, how to use google recaptcha with comments in wordp.

To secure your WordPress forms and protect them from spam, install our "recaptcha for all" plugin. It provides customizable CAPTCHA options and integrates seamlessly with all form types to enhance security.

=How can I set up and use reCAPTCHA for general security purposes?=

This FAQ page also addresses the following questions: recaptcha online, recaptcha explained, recaptcha code, recaptcha upgrade, recaptcha to block hackers att, recaptcha to block spam, recaptcha score, recaptcha demo, recaptcha cost, recaptcha test, recaptcha language, best recaptcha, recaptcha how to, recaptcha is not set, recaptcha anti spam, recaptcha not working, recaptcha protect all pages, recaptcha gratuito, protezione recaptcha, proteger site com recaptcha, recaptcha plugin, install recaptcha, setup recaptcha, implement recaptcha, how install recaptcha, how to get recaptcha v3.

To set up and use reCAPTCHA for general security on your website, we recommend using our "recaptcha for all" plugin. This plugin allows you to easily integrate reCAPTCHA for various security needs, ensuring that your site is protected from threats and spam.

=How can I prevent fake users from registering on my site or submitting forms?=

This FAQ page also addresses the following question: discord fake users, how to use google recaptcha with contact forms infree google recaptcha, nocaptcha, free wordpress captcha plugin, cloudflare turnstile plugin for contact forms, setup recaptcha wordpress, add google recaptcha, add google recaptcha, how to use google recaptcha with contact forms in, setup recaptcha wordpress

To prevent fake users from registering on your site or submitting forms, use our "recaptcha for all" plugin. It includes advanced detection and blocking features that help secure your site against fraudulent activity.

=Como instalar recaptcha ou Cloudflare Turnstile no wordpress? (Portuguese Question)=
Para **proteger seu site WordPress** e garantir **segurança wordpress** contra spams e ataques, é essencial usar ferramentas adequadas, como o reCAPTCHA e o Cloudflare Turnstile. Se você está se perguntando **como instalar recaptcha no WordPress** ou **como configurar Cloudflare Turnstile no WordPress**, a solução é mais simples do que parece.

Com o plugin **reCAPTCHA for All**, você pode facilmente **integrar recaptcha no WordPress** e configurar o **Cloudflare Turnstile para comentários no WordPress**. Este plugin é considerado o **melhor plugin reCAPTCHA WordPress** e o **melhor plugin Cloudflare Turnstile WordPress**, oferecendo uma **proteção contra spam WordPress** robusta e eficiente.

Além disso, o **reCAPTCHA for All** também é um **plugin de segurança para contato WordPress** e **plugin de segurança para comentários WordPress**, garantindo que todas as áreas do seu site estejam seguras. Ele é a escolha perfeita para quem busca um **recaptcha gratuito WordPress** ou um **Cloudflare Turnstile gratuito WordPress**.

Portanto, se o seu objetivo é **aumentar a segurança do WordPress** e **proteger site WordPress** de ameaças, o plugin **reCAPTCHA for All** é a solução ideal para você!


=Come fare per Bloccare spam nel mio sito web? (Italian Question)=
Questa risposta incui anche: Protezione bot, Verifica utente e Soluzioni antispam
Per bloccare spam nel tuo sito web utilizzando il plugin "reCAPTCHA for All", puoi implementare soluzioni antispam come la protezione contro spam e bot. Il plugin ti permette di utilizzare autenticazione CAPTCHA e verifica reCAPTCHA per migliorare la prevenzione spam. Inoltre, puoi configurare CAPTCHA invisibile per una protezione meno invasiva. Il plugin offre anche opzioni per la personalizzazione reCAPTCHA e il controllo accessi per ottimizzare la riduzione spam.


= ¿Cómo se puede reducir el spam en los formularios de contacto de un sitio web? (Spanish Question) =

Esta pregunta también aborda las siguientes preguntas:  
Evitar spam en comentarios, Protección contra spam y bots, Anti-bots para WordPress, Captcha para formularios de contacto, Protección de formularios de registro.

Para bloquear el spam en formularios y proteger su sitio de bots, nuestro plugin "Recaptcha For All" es la solución perfecta. Con este plugin, puede agregar un Captcha eficaz a sus formularios de contacto y de registro en WordPress, asegurando que solo usuarios humanos puedan interactuar con su sitio.

= ¿Cuál es el proceso para una instalación rápida de reCAPTCHA en un sitio web? (Spanish Question) =

Esta pregunta también aborda las siguientes preguntas:  
Instalar reCAPTCHA en WordPress, reCAPTCHA para formularios de contacto, Personalización de reCAPTCHA, Opciones avanzadas de reCAPTCHA, Configuración personalizada de reCAPTCHA, Ajustes de Captcha en WordPress, Personaliza tu reCAPTCHA, Captcha flexible para WordPress.

"Recaptcha For All" facilita una instalación rápida y personalizada de reCAPTCHA en su sitio WordPress. Ofrece opciones avanzadas y flexibles para ajustar el Captcha según las necesidades específicas de su sitio, mejorando la seguridad de los formularios de contacto y otras áreas clave.

= ¿Cómo mejora la seguridad web la implementación de reCAPTCHA en formularios? (Spanish Question) =

Esta pregunta también aborda las siguientes preguntas:  
Seguridad de formularios WordPress, Verificación de usuarios WordPress, Autenticación de usuarios con reCAPTCHA, Confirmación de usuario real, Verificación humana en formularios, ReCaptcha para autenticación de usuarios, Alternativas a Google reCAPTCHA, Mejor alternativa a reCAPTCHA, Plugin Turnstile para WordPress, Alternativa a reCAPTCHA para formularios.

Para mejorar la seguridad web y la autenticación de usuarios en su sitio WordPress, "Recaptcha For All" es la mejor opción. Este plugin verifica que los usuarios sean humanos antes de que puedan acceder o interactuar con el sitio, protegiendo de forma efectiva contra bots y accesos no deseados.

== Legal Advise about Cookies ==
We can't give legal advise about Cookies (neither other things). We suggest you contact a lawyer regards that.



== Installation ==

1) Install via wordpress.org
o
2) Activate the plugin through the 'Plugins' menu in WordPress

or

Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.




== External service ==
This WordPress plugin works with Google reCAPTCHA and Cloudflare Turnstile to protect your site from bots and spam.
Visitor's IP address data will be sent to the following websites, depending on the chosen option.
Google reCAPTCHA: A free service that helps distinguish between humans and bots, protecting your site from spam and abuse. https://developers.google.com/recaptcha
Cloudflare Turnstile: A cloud security platform that offers enhanced protection against bot attacks. https://developers.cloudflare.com/turnstile/
In return, the chosen service above will return whether the visitor's IP address is a regular user or a spammer.


== External Service 2 ==

The Recaptcha For All plugin will retrieve tips and news from our site BillMinozzi.com. This information will be displayed in the plugin dashboard, in the right-hand column under the title "Tips and News." No data is sent to our server. 

These are the terms of use for <a href="https://siterightaway.net/terms-of-use-of-our-plugins-and-themes/">our plugins</a>.

== Changelog ==
= 2.22 = 2025-02-21- Improved memory warnings.
= 2.21 = 2025-02-11- Improved.
= 2.17/19 = 2025-01-08- Updated Lanaguage files IA.
= 2.17/18 = 2025-01-06- Updated Lanaguage files IA.
= 2.15/16 = 2024-12-29- Updated Lanaguage files IA.
= 2.14 = 2024-12-29- Added auto-checkup with IA.
= 2.11/13 = 2024-12-27- Added chat with IA.
= 2.10 = 2024-11-27- Fixed warning $_SERVER['SERVER_ADDR'] not defined  when hosting not enable it.
= 2.09 = 2024-10-23- error handle improvements.
= 2.08 = 2024-09-26- button improvements.
= 2.06/07 = 2024-09-23- button improvements.
= 2.04/05 =  2024-09-06 - Language Files Updated.
= 2.02/03 =  2024-09-05 - Language Files Updated.
= 2.01 =  2024-08-21 - Small improvements with Tips.
= 2.00 =  2024-08-20 - Small improvements with Tips.
= 1.82 =  2024-08-20 - Small improvements with Tips.
= 1.81 =  2024-08-18 - Dashboard Small improvements with Tips.
= 1.80 =  2024-08-12 - Dashboard Small improvements with Tips.
= 1.75 =  2024-07-31 - Small improvements.
= 1.73/74 =  2024-07-30 - Small improvements.
= 1.72 =  2024-07-22 - Small improvements.
= 1.67/68 =  2024-07-03 - Small improvements.
= 1.66 =  2024-07-02 - Cached User Agent  of Search Engine...
= 1.65 =  2024-07-01 - Avoid Load js in other pages...
= 1.64 =  2024-06-26 - Installed Framework.
= 1.60/61 =  2024-06-23 - Small improvements.
= 1.59 =  2024-06-04 - Small improvements.
= 1.57/58 =  2024-05-31 - Fixed readme file and small security improvements.
= 1.55 =  2024-05-20 - Fixed readme file.
= 1.54 =  2024-03-18 - Fixed Small Bug on Uninstall.
= 1.53 =  2024-02-12 - Updated Translations files.
= 1.51/52 =  2024-02-09 - Improved admin panel, design options and management.
= 1.50 =  2024-01-30 - Help Improved.
= 1.48/1.49 =  2024-01-19 - Add analytics.
= 1.46/1.47 =  2024-01-17 - Add keys test button at dashboard.
= 1.45 =  2024-01-03 - Small improvements.
= 1.44 =  2023-12-05 - Small improvements.
= 1.41/43 =  2023-11-04 - Small improvements.
= 1.40 =  2023-10-21 - Small improvements.
= 1.38/39 =  2023-10-20 - Small improvements.
= 1.37 =  2023-10-17 - Small improvements.
= 1.36 =  2023-09-28 - Small improvements.
= 1.35 =  2023-09-27 - Small improvements.
= 1.31/34 =  2023-09-04 - Small improvements.
= 1.29/30 =  2023-08-30 - Small improvements.
= 1.25/27 =  2023-08-28 - Interface Improvements.
= 1.24 =  2023-07-12 - Small improvements.
= 1.23 =  2023-05-13 - Be Sure user is admin before replace the background image of recaptcha page.
= 1.21/1.22 =  2023-05-10 - Improved security by block any LOGGED admin to improperly change the background image URL that will be displayed as background image.
= 1.20 =  2023-03-30 - Improved smartfone system with turnstile. 
= 1.19 =  2023-03-29 - Improved smartfone system. 
= 1.18 =  2023-03-25 - Fixed Load Image system 
= 1.17 =  2023-03-25 - Small improvements.
= 1.16 =  2023-03-24 - User now can choose the image background.
= 1.15 =  2023-03-20 - Added support to Cloudflare Turnstile.
= 1.13/14 =  2023-03-09 - Template fixed (button).
= 1.12 =  2023-02-24 - Help Improvements.
= 1.11 =  2023-02-24 - Help Improvements.
= 1.10 =  2022-06-03 - Help Improvements.
= 1.09 =  2022-05-11 - Minor Improvements.
= 1.08 =  2022-02-25 - Improved documentation and now is multilanguage ready.Included language Italian and Portuguese
= 1.07 =  2021-10-15 - Design improvement.
= 1.06 =  2021-07-26 - Now you can choose pages/posts to enable reCAPTCHA
= 1.05 =  2021-06-27 - Minor Improvements.
= 1.04 =  2021-06-27 - Minor Bug Fixed
= 1.03 =  2021-06-19 - Minor Bug Fixed
= 1.02 =  2021-06-18 - Added Block China Visitors (optional)
= 1.01 =  2021-06-10 - Minor Improvements
= 1.00 =  2021-06-08 - Initial release.
