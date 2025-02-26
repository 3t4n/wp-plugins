=== Conditional discount / bulk discounts for WooCommerce ===
Contributors: rajeshsingh520
Donate link: piwebsolution.com
Tags: woocommerce discount, bulk discounts, category discount, dynamic discounts, woocommerce coupon generator, product category discount
Requires at least: 3.0.1
Tested up to: 6.7.1
Stable tag: 1.9.37.49
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add conditional discount on the checkout for WooCommerce based on Conditional discount / bulk discounts woocommerce / dynamic pricing rule like product discount, product category discounts, bulk discounts etc..

== Description ==

== Future Discount Coupon to be used for future order ==
Plugin can generate coupons automatically for customer based on the coupon template, this coupons are generated for the customer when they satisfies specific conditions in there present order. The generated coupon can be used in there next order and this coupon is added in the customer email.

Few example of the coupon generated:

* If a Customer buy more the $100 product, such customer will get a Discount coupon of 15% for there next order 

* If customer buys a specific product he will get 10% off discount coupon for that product that can be used in there next order

* If customer from specific country places a order plugin will given him a coupon for there next order

https://www.youtube.com/watch?v=SJGS0666rv0&cc_load_policy=1

== Direct discount in present order ==

This plugin helps you to Create a dynamic discount for your store, based on various conditions

This plugin is very simple to use, and you can create complex discounts very quickly

Few of the conditions that you can use to create discount rules are:

<ul>
 	<li><strong>Country-based discount</strong>: Assign a discount for the customer of the specific country</li>
	<li><strong>State-based discount</strong>: Assign different discount as per the State/County of your customer</li>
	<li><strong>Zone-based discount</strong>: Assign different discount as per the Shipping zone of your customer</li>
 	<li><strong>Product based discount</strong>: offer discount when user buys some specific product or set of specific product</li>
 	<li><strong>Product Category based discount</strong>: offer discount when user buys some product from specific category</li>
	<li><strong>Cart Sub Total (Before discount) based discount</strong>: If the Cart total reaches some specific value then you can offer him a different discount, E.g: if the user is buying 1000$ worth of product then you want to offer him fast shipping for free</li>
	<li><strong>Quantity based discount</strong>: If you want to offer a different discount based on the number of units purchased by the customer then you can do that using this rule</li>
	<li><strong>User-based discount</strong>: As the name suggests, you can offer some discount to some specific user on your site</li>
	<li><strong>Weight-based discount</strong>: If your want to offer different discount based on the total weight of the product in the order or cart then you can do this using this rule, it calculates the total weight of the product in the cart and then based on the set value in the rule it assigns a discount</li>
 	<li><strong>Product Width based discount</strong>: It finds the maximum width of the product in the cart and uses that as the width of the cart and compares with width value set by you in the rule and as per the logic set in the rule it assign a discount</li>
 	<li><strong>Product Height based discount</strong>: It's working is same as the Width working</li>
 	<li><strong>Product Length based discount</strong>: It's working is same as the Width working</li>
 	<li><strong>Coupon based discount</strong>: Using this you can show a discount if the customer has applied some specific coupon code</li>
 	<li><strong>Shipping class-based discount</strong>: Show a specific discount, if the user buys a product that belongs to some specific category of shipping class</li>
	<li><strong>Exact set of product or set of category of product</strong> Add a discount when exact set of product or product belonging to exact set of category are present in the cart.</li>
	<li><strong>Exact set of product or set of category of product not present in the cart</strong> Add a discount when exact set of product or product belonging to exact set of category are <strong>NOT</strong> present in the cart.</li>
</ul>

[Full support for Order delivery date and time plugin](https://wordpress.org/plugins/pi-woocommerce-order-date-time-and-type/)

* Offer discount based on the selected delivery date: you can start offering discount for future delivery order which are placed in advance. E.g: Offer 10$ discount for all the order where user selected delivery date as 25 May 2021 
* Offer discount based on the selected delivery day: Offer discount when user selected Saturday as delivery date.
* Offer discount based on Customer opting for Pickup or delivery


== Short Code to make complex discount ==

https://www.youtube.com/watch?v=bI3DwNi4L08

`
[selected_product_qty] => use this to get quantity of product (selected by product rule) in cart
supported attributes max_qty and max_product_qty

[selected_product_qty max_qty="2" max_product_qty="4" excluded_products="65,23"]
[qty] => use this to get quantity of all the product in cart
supported attributes max_qty and max_product_qty

[qty max_qty="2" max_product_qty="4" excluded_products="65,23"]

(Pro short code)

[selected_product_weight] => use this to get weight of product (selected by product rule) in cart
supported attributes max_weight and max_product_weight

[selected_product_weight max_weight="2" max_product_weight="4" excluded_products="65,23"]

`

== Pro rules ==

[Try Pro on demo website](https://websitemaintenanceservice.in/con_discount_demo/)

<ul>
	<li><strong>Offer coupon to customer for future use</strong> based on there present purchase</li>
	<li>Limit the <strong>number of times</strong> a discount can be applied</li>
    <li>Control how many times a same discount can be applied to an <strong>individual user</strong>. Uses billing email for guests, and user ID for logged in users.</li>
	<li><strong>Local pickup discount</strong>: Offer discount if user is opting for Local pickup so you don't have to ship the product to user and you save of shipping so you offer him extra discount on local pickup</li>
 	
 	<li><strong>Postcode/Zip code based discount</strong>: If the user comes from a specific postcode, you can even assign rage of postcode like 9011...9090, this will assign the discount to all the customer whose postcode falls in 9011 to 9090</li>
 	
 	<li><strong>Product-based discount</strong>: Assign different discount if the customer is purchasing a specific product, say if he is purchasing some very large item that needs different discount then you can do that using this rule, this will even work with the variable product</li>

	<li><strong>Product-tag discount</strong>: Apply discount based on the product tags.</li>

	<li><strong>Product category discount</strong>: Apply discount based on the product category.</li>
 	
 	<li><strong>Payment method based discount</strong>: Show a specific discount, if the user buys select a specific payment gateway</li>

 	<li><strong>User role-based discount</strong>: Using this you can assign a different discount as per the user role. E.g: you can offer a different discount to a registered customer and different discount to those who are doing a Guest checkout</li>

	<li><strong>Day based discount</strong>: You can make the discount run only on certain days of the week</li>

	<li>Offer discount based on the <strong>shipping method selected</strong> by the customer</li>

	<li><strong>Apply only one discount offer at a time</strong> even when user is qualified for multiple discount offers</li>

	<li>Option to <strong>remove other WooCommerce based coupon</strong> discount</li>

	<li>Set a message to <strong>describe the offer</strong> like what customer has to do to get the discount</li>

    <li>Set a <strong>different offer message</strong> for each offer</li>

    <li>Select <strong>location</strong> to show the offer message</li>

    <li>You can set <strong>condition</strong> who will be shown the offer message</li>

	<li>First order discount: Offer discount to those customer that buying for the first time from your website</li>

	<li>Total of Last order: Offer discount based on the amount purchased by the customer in there last order</li>

	<li>Number of order placed during a period: Offer a discount to the customer if they have placed 5 orders in the current month</li>

	<li>Total amount spend during a period: Offer a discount to customer if they have purchased 1000$ from your website in the present month</li>

	<li>Offer a discount when the customer is purchasing the same product again in the specified time period</li>
</ul>

== Example of discount offer your can create ==

* **bulk discounts:** Buy 10 unit and get 2% discount

* **Product Specific discount:** Buy $500 work of product and get 2% discount on Product A 
* **Product Specific discount:** Buy product A at 10% discount 

* **Product category discount :** Buy any product from category T-shirt and get 10% off

* **Category based discount:** Get 20% discount on product from category A
* **Category based discount:** Get 10% discount on total bill if customer buy a product from Category A and Category B

* **Country based discount:** 20% discount to all US customer
* **Country based discount:** 10% discount to all US customer on purchase of above 500$

* **Local pickup discount:** Offer 10% discount when user decides to pickup his order from the store

* **bulk discounts:** Buy $500 worth of product and get 5% off on total purchase a bulk discounts deal

* **Run discount only on Weekends (or specif days of the week):** Run discount only during the weekends 

* **Product Category Discounts for WooCommerce** allows you to offer bulk discounts at the category level. Offer a percentage or a flat discount for products in one or multiple categories

* Get a 10% discounts for **Product Category Accessories**.

* Get 25% discount on **Category A and Category B**

* Shoes get 10% and Bags get 20% OFF

* $10 discount for any products in Category A

* **bulk discounts:** Buy 10 unit of product get get 5% bulk discounts

* Apply 2% discount on product A when when customer is purchasing the product A again in last one year time

== Automatically create future coupon for the customer (PRO) ==

https://www.youtube.com/watch?v=SJGS0666rv0&cc_load_policy=1

* Offer coupon to customer based on there present purchase condition, this can increases chances of future order from that customer.

E.g: Say a customer purchased $1000 product from your site, so you auto offer such customer a discount coupon of 10% for there next order (the discount coupon can be linked to the customer email).

* You can set the order status when the coupon will be given to the customer

* The coupon will be added in the email send to the customer (if the coupon has been activated based on the order state set by you)


You can offer them future coupon based on this conditions:

* If customer purchases a specific product A you give then a discount coupon of 5% for there next purchase

* If customer purchases from category A you give then a 5% discount coupon for there next order that same category a

* If customer purchase more then $1000 give them a 10% discount coupon on there next order 

* Offer a coupon to customer for there future purchase based on there country

* Offer a discount coupon to specific country customer 

* Offer a discount coupon to customer that will expire after x days from creation 

* 20% discount to customers who belong to the user role “Subscriber”.


== WHY YOU SHOULD PROVIDE PRODUCT CATEGORY DISCOUNT? ==
By offering Product category discount on your top-selling product categories can boost your revenue 3x times than providing a coupon based discounts. 

== Frequently Asked Questions ==

= I want to set postal code range in the condition =
In the pro version you can set range of the postal code in the shipping method rule

= I want to offer discount when any one of the rule is satisfied =
Yes you can do that you can make the discount apply, when all the rules are satisfied or you can apply discount even when any one rule is satisfied

= I want to offer discount when user is opting for Local pickup =
You can do that in the pro version, when the user will select the local pickup shipping method (WooCommerce provided local pickup shipping method) then the user will be offer a discount 

= I want to offer discount based on the shipping method selected by customer =
Yes you can do that in the pro version of the plugin

= I want to offer a discount when customer opt for some specific payment method =
Yes you can do that in the pro version, it has a rule to apply discount when specific payment method is selected

= Discount are applied as WooCommerce coupon code =
From the version 1.7.11 we have made the discount to be applied as WooCommerce coupon code. We have given the option to use old way of applying the discount as well, you have to enable that from the Old setting tab 

= Only apply one discount at a time even when user qualifies for more then one offer =
Pro version gives you the option to only apply one discount based on the priority of the discount rule (you can set discount rule priority in pro version)

= Don't want user to apply WooCommerce coupon when this plugin discount is applied =
Yes you can do that in the pro version

= I want to offer discount based on the delivery date selected by the customer =
For that you will need to install the our Order date and time plugin that will add an option of delivery date in your checkout form and once this plugin is installed you can use delivery delivery date rule to create a offer.

= I want to show the offer message to the customer =
Pro version allows you to set a message to describe the offer. 

= Can I offer product category discounts = 
Yes you can offer discount based on the product category

= Can I apply multiple discount rules =
Yes you can create multiple discount rules, e.g: you can create one product category discount and another a product tag based discount rule and both can be applied at the same time

= I want to limit the discount to be applied 10 time only =
You can do that in pro version

= I want to apply the discount only once for each customer and if they come in future the same discount should not be applied =
Yes that can be done in the pro version, if you limit a discount to be applied only 1 for each customer and if they purchased once and got that discount once then they will not get that discount in future order 

= Is it HPOS compatible =
Yes the Free version and PRO version both are HPOS compatible

== Changelog ==

= 1.9.37.49 =
* Tested for WC 9.6.0

= 1.9.37.46 =
* Tested for WC 9.5.0
* UX improved

= 1.9.37.44 =
* improvement in the code

= 1.9.37.41 =
* Tested for WC 9.4.0

= 1.9.37.40 =
* Tested for WP 6.7.0

= 1.9.37.34 =
* Tested for WC 9.2.3

= 1.9.37.33 =
* support date and time plugin with block

= 1.9.37.32 =
* Tested for WC 9.2.0

= 1.9.37.31 =
* Tested for WP 6.6.1 and WC 9.1.4

= 1.9.37.30 =
* Added option to show the offer message to the customer
* tested for WP 6.6

== 1.9.37.4 ==
* option of Limit usage to X items added in future coupon template

= 1.7.44 =
* made compatible with https://wordpress.org/plugins/woo-multi-currency/



