=== Altruly simple DIY Fundraising for charities and nonprofits ===
Contributors: yhmblogger
Tags: fundraising, fundraiser, diy, donations, donate, charity, nonprofit
Donate link: https://altruly.com/wordpress-fundraising-plugin
Requires at least: 3.0
Tested up to: 4.9
Requires PHP: 5.6
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The easiest way to connect your users to your Altruly profile so that they can start building their own DIY fundraisers that raise donations for your cause.

== Description ==
([Altruly](https://altruly.com/)) is a platform that helps the supporters of your charity or nonprofit host their own 3rd party do-it-yourself (DIY) fundraisers in support of your organization. For nonprofits who are looking to encourage people to host events like parties with a purpose or sports related fundraising, creating a profile on Altruly is the solution.

*Altruly works for both organizations that are able to issue tax-receipts, as well as those that cannot*. So if your nonprofit organization does not have exempt status, you can still maintain a profile on the Altruly platform. If you are unsure about whether or not your organization qualifies, [contact us](https://altruly.com/contact).

Here are some of the benefits of using Altruly for your supporters:

*Parties with a Purpose*
+   Host a party with a purpose with full RSVP management all from the convenience of a mobile phone
+   Free beautiful and colorful e-card invitations
+   Free electronic thank-you note for donors
+   Event reminders
+   Guests receive invitations with a built in donation form
+   Social integration for easy sharing of the fundraiser
+   Secure donation payment processing with immediate tax-receipt issuance
+   Ad-free

*Sports Event Fundraising*
+   Create fundraising pages for any sports event, even ones that you personally host yourself
+   No limitations on the sport
+   Social integration for easy sharing of the fundraising page

Here are some of the benefits of using Altruly for your organization:

+   Automatic tax-receipt issuance
+   Optimized for mobile, tablet and desktop
+   Download donor data to your CRM
+   Automatic transfer of funds raised to your bank account in as little as 1 day
+   You can even use the platform to host your own events
+   Respectfully encourage a no-gift policy, with donations in lieu of gift giving


== Installation ==
If you already have an Altruly profile created, proceed to step 4:

1.   Create an Altruly organization profile here: [Nonprofit registration](https://altruly.com/nonprofitregister). Take note of the "slug" value you use to associate with your account. You'll need it later. Await validation of your organization (usually less than 24 hours).
2.   Complete your organization profile (including linking your [Stripe](https://stripe.com) account, uploading your authorized signature for tax receipts, choosing your receipt serial number)
3.   [Choose a plan](https://altruly.com/plans) to enable fundraising on your account.
4.   Upload the folder `altruly-simple-diy-fundraising-for-charities-and-nonprofits` to the `/wp-content/plugins/` directory
5.   Activate the plugin through the 'Plugins' menu in WordPress
6.   Place the shortcode `[altruly slug="your-slug-from-altruly" color="blue"]` on the post or page you would like (other color options are: green, orange, purple, red, yellow). *Please ensure that the slug attribute is set correctly, or your supporters may not be directed to the right profile page*.
7.   Preview the page or post to ensure that the text renders properly. The button created at the bottom of the text will point to https://altruly.com/diy/your-slug-from-altruly

== Frequently Asked Questions ==
= Do I need an Altruly account to enable this plugin? =

Yes. Charities and nonprofits can [sign up here](https://altruly.com/nonprofitregister)

= What does the plugin do? =

The plugin allows you to add a shortcode into any page or post on your WordPress website, which creates some text describing how your supporters can use Altruly to create fundraisers that benefit your cause and a button that creates an external link to your Altruly organization page.

= What is a slug? =

When you create your Altruly account, you'll choose a slug that identifies with your organization. You'll need it for using this shortcode because it will create hyperlink that will direct your readers to the correct Altruly fundraising profile.

= What are the required arguments for the shortcode? =

There are two arguments for the shortcode: `slug` and `color`. The `slug` argument is used to ensure that your readers are able to link to the correct Altruly organization profile. You will need your Altruly profile slug, which you selected when you created your Altruly account. The `color` argument is optional. It will default to blue, but can also be green, orange, purple red or yellow.

== Screenshots ==
1. Sample of how to insert the shortcode in your page or post
2. Sample of how the shortcode renders on your page or post

== Changelog ==
= 1.0 =
*   Initial release

== Upgrade Notice ==
None
