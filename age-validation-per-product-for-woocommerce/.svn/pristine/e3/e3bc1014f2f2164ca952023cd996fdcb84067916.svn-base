=== Age Validation Per Product for Woo ===
Contributors: asynadak
Tags: woocommerce, age-check, date-of-birth, validation, adult-products
Requires at least: 5.0
Tested up to: 6.7
Requires PHP: 7.0
Requires Plugins: woocommerce
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Validate customers' date of birth on a per-product basis in WooCommerce. Allows age restrictions for both simple and variable products.

== Description ==

**WooCommerce Age Validation Per Product** gives you fine-grained control over who can purchase restricted items in your WooCommerce store based on date-of-birth (DOB) settings. Shop owners can:
* Set a minimum or maximum DOB on simple products.
* Globally define DOB restrictions for variable products, or set them per variation.
* Prompt users for DOB at checkout only if restricted items are in the cart.
* Block checkout if the entered DOB does not satisfy the product(s) restrictions.

**Key Features:**
* Per-product or per-variation DOB range (e.g., only allow customers with birthdates in 01-01-1980 to 31-12-2005).
* Global fields for variable products that override each variation’s settings.
* Conditional DOB field at checkout (shown only if restricted items are in the cart).
* Client-side datepicker in the admin (so store managers can pick min/max dates) and in the checkout for users.
* Automatic validation to block purchase if the DOB is outside the allowed range.
* Optionally show notices on the product page or in the cart for restricted items.

**Use Cases:**
* Alcohol, tobacco, vaping, or adult content requiring age gating.
* Specialty products requiring a specific DOB range (e.g., child tickets vs. adult tickets).
* Special subscription products that require age segmentation (i.e. summer camps for children of different ages).
* Any scenario needing a user’s date-of-birth for compliance.

== Installation ==
1. Download the plugin zip file.
2. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
3. Activate the plugin through the 'Plugins' screen in WordPress.
4. Make sure WooCommerce is installed and activated.
5. Go to any WooCommerce product and configure the DOB fields in the “Product Data” box:
   - **Simple products**: You will see “DOB Minimum” and “DOB Maximum” in the General tab.
   - **Variable products**: You’ll see “Global DOB Minimum/Maximum” in the General tab, plus individual “DOB Minimum/Maximum” fields in each variation, if you want to override the global values.

== Frequently Asked Questions ==

= 1) Why is the DOB field not appearing on checkout? =
- If there are no restricted products in the cart, the DOB field will not appear (by design).  
- Ensure you have set a min or max date for at least one product or variation.  
- Check for theme or plugin conflicts that might remove or rename the `billing_date_of_birth` field.

= 2) How do I set an “18 years old minimum” instead of a date range? =
- Currently, the plugin relies on a date range. If you want a simple “minimum age,” set the “Minimum DOB” to a date that corresponds to being 18 (for today’s date). For example, if today is 2024, you can set the min DOB to `01-01-2006` to enforce an 18+ rule (adjust as needed over time). Or modify the code to compute from a numeric “Min Age.”

= 3) Can I store or reuse the user’s DOB for future orders? =
- By default, the plugin checks DOB every time. If you want to store it in the user profile, you can add custom code to copy `_billing_date_of_birth` to user meta. Make sure to comply with privacy laws.

= 4) Why do my variation fields always appear empty? =
- If the “Global” fields are set, variation fields are intentionally disabled and do not save their own data. If you want to override that, edit the logic to allow both global and variation-level data.

= 5) Can I display a notice on the product page or the cart if the item is restricted? =
- Yes. See the plugin’s helper or your theme’s hooks to display a short message like “This product is age-restricted” on single product pages and in the cart for any restricted item.

== Screenshots ==
1. **Simple Product** – Min/Max DOB fields in the product’s General tab.
2. **Variable Product** – Global DOB fields.
3. **Variable Product** – Per-variation overrides.
4. **Checkout DOB Field** – Shown only when restricted products are in the cart.

== Changelog ==
= 1.0 =
* Initial release with date-of-birth-based validation for WooCommerce products and variations.
* Conditional display of DOB field on checkout for restricted items.
* jQuery UI datepicker in admin & checkout for easy date selection.
* Basic inline error messages for incorrect date format.

== Upgrade Notice ==
= 1.0 =
- This is the first release. No immediate upgrade steps required.

== Usage ==
1. Activate the plugin.  
2. For **Simple Products**:
   - Go to the “General” tab in “Product Data,” fill in **DOB Minimum** or **DOB Maximum** in `dd-mm-yyyy` format.  
3. For **Variable Products**:
   - In the “General” tab, fill in **Global DOB Minimum** or **Global DOB Maximum**.  
   - (Optionally) Edit each variation to set specific DOB fields if the global fields are empty or need overriding.  
4. Optionally adjust **JavaScript** to handle date format or display if your store uses different date formats.  

If you have any questions, see the “FAQ” section or contact us at https://socialmind.gr/contact. 
