=== Reoon Email Verifier ===
Contributors: reoon
Tags: email verifier, email validator, block spam registration, form email validation, temporary email blocker
Requires at least: 4.7
Tested up to: 6.5.2
Requires PHP: 5.4
Stable tag: 1.2.5
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: reoon-email-verifier

Safeguard your online forms against invalid, temporary, disposable, and harmful email addresses with real-time verification.


== Description ==

Reoon Email Verifier offers a robust solution for verifying email addresses in real-time, protecting your site from spam registrations and enhancing email campaign effectiveness. With over 99% accuracy, our verification service integrates seamlessly with popular WordPress forms, offering broad compatibility and exceptional reliability.

**Key Features:**
- Check email address during the form submission.
- Can detect valid, invalid, temporary, catch-all, inbox-full, spamtrap addresses.
- Quick mode verification checks an email within 0.5 seconds.
- Dynamic detection of disposable and temporary email addresses.
- Supports most of the free email providers and business/professional emails.
- Live API for instant verification during user registration (within 0.5 seconds).
- Verification mode and custom filters can be selected.
- GDPR compliant, ensuring user data protection and privacy.

**Supported WordPress Forms:**
- Formiddable Form
- Gravity Form
- Default WordPress Registration Form
- WooCommerce Checkout Form
- Contact Form 7
- Ninja Forms
- WPForms
- Elementor Forms
- Fluent Forms
- Forminator Forms
- HappyForms
- Mail Mint Form
- Contact Form by BestWebSoft
- WordPress Comment Form
- Support for more forms will be added

To learn about the list of features and detailed benefits, please visit https://www.reoon.com/email-verifier/.


== Installation ==

1. Upload `reoon-email-verifier` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Configure as needed under the plugin's settings section.


== Frequently Asked Questions ==

= How does it work? =
When one of your users try to submit a protected form, Reoon Email Verifier will check the email address against various validation criteria without sending any email, offering a non-intrusive verification process and will block any invalid, temporary or harmful image. It will also notify the submitter to use a different email address.

= How long it can take to verify an email address? =
Verification will take less than 0.5 second in Quick mode. On the other hand, the verification time for the Power mode depends on the response time of their email server, which can also be limited by providing a timeout value.

= What will happen if the account run out of credits? =
In such cases email submissions will not be checked by the plugin and every submitted email addresses will be accepted (as like our plugin is not installed).

= Is it GDPR compliant? =
Yes, all data is encrypted and automatically deleted after 15 days of submission, ensuring compliance with GDPR regulations.



== Changelog ==

= 1.2.3 =
* Initial release version.

== Upgrade Notice ==

= 1.2.3 =
Initial release. Ensure compatibility with your WordPress version.

= 1.2.4 =
Bug fix: Plus sign in email was causing invalid results due to url-encode issue.

= 1.2.5 =
Bug fix and security updates.



== Screenshots ==

1. Temporary email blocked during Elementor Pro Form submission.
2. Temporary email blocked during Fluent Form submission.
3. Stat section of the plugin dashboard.
4. Some settings of the plugin.
5. Some settings of the plugin.



== Third-Party Service Usage ==

This plugin integrates with the Reoon Email Verifier service (https://www.reoon.com/email-verifier/) to provide real-time email verification functionality. Through API calls to Reoon Technology's servers, it verifies email addresses and retrieves account information, using the following endpoints:

    Verify email addresses: https://emailverifier.reoon.com/api/v1/verify?email=[email]&mode=[mode]&key=[your_api_key]
    Retrieve account information: https://emailverifier.reoon.com/api/v1/get-account-info?key=[your_api_key]

By installing and activating this plugin, you consent to the transmission of email addresses to these URLs for the purpose of verification.

Data Privacy and Security Commitment: We prioritize your privacy and the security of your data. All submitted email addresses are automatically deleted from our servers after 15 days, ensuring that your data is not stored indefinitely. Furthermore, we do not sell or use the submitted emails for marketing purposes. This practice is part of our commitment to maintaining your trust and complying with data protection regulations.

The use of the Reoon Email Verifier service is subject to Reoon's Terms of Service and Privacy Policy, available at:

    Terms of Service: https://www.reoon.com/terms-and-conditions/
    Privacy Policy: https://www.reoon.com/privacy-policy/

We encourage you to review these documents to understand how Reoon Technology handles and protects your data. It is crucial to ensure that the use of this plugin complies with your website's privacy policy and any applicable legal obligations concerning data protection and privacy.

