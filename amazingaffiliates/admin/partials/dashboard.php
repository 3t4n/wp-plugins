<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php $amazingaffiliates_page = "home";  ?>

<main class="amazingaffiliates_admin_page" >
	
	<nav id="amazingaffiliates_navbar">
		<?php do_action('amazingaffiliates_navbar', $amazingaffiliates_page ); ?>
	</nav>
	
	<?php do_action('amazingaffiliates_setupnotice' ); ?>
	
	<div id="header" style="display:none;">
        
        <h1 class="amazingaffiliates_admin_page_title" >Dashboard</h1>
		
	</div>
	
	<br>
	
	<h2>Dashboard:</h2>
	<div id="dashboard" >
        
        <?php if(has_action('amazingaffiliates_dashboard')) do_action('amazingaffiliates_dashboard'); ?>
        
	</div>
	
	<br>
	
	<h2>Notifications:</h2>
        <details
            style="background-color: #ffd460; text-align: left; width: calc(100% - 70px); padding: 25px; font-size:120%;"
    >
            
            <summary style="font-size:125%;font-weight:bold;">Hello! Please read the following <span style="text-decoration:underline;color:#5533ff;">instructions</span> before using the plugin.</summary>
            <br>
            <div>
                <h2><big><strong>Setting up the Amazon Product APIs</strong></big></h2>
                <ol>
                    <li>First of all, you have to set up your Amazon Affiliate PAAPI5 credentials in order to start using the plugin.</li>
                    <li>Click the red banner above (the one telling you that the plugin is not set up) or click the <b>"Setup"</b> menu in the navbar</li>
                    <li>Now insert the required information (operating Country, Partner Tag, Access Key and Secret Key).<br>
                    <i>If you do not know where to find these data, you can find detailed explanations on our <b><a href="/wp-admin/admin.php?page=amazingaffiliates_handbook">FAQ section</a></b>.</i></li>
					<li>After data compilation, hit the <b>"Save"</b> button and wait for a page refresh<br>
					<i>The progress should be at 80% and the plugin is already unlocked but it is recomended to test the APIs before starting.</i></li>
					<li>Hit the <b>"Test the API"</b> button and wait for a successful response</li>
                </ol>
            
                <big>If all the data was correct, setup is complete you can start enjoying the plugin.<br>
					<i>Otherwise you need to check your Amazon API credentials and retry.</i></big>
            </div>
            <br>
            <div>
                <h2><big><strong>How to insert a product into your website database</strong></big></h2>
                <ol>
                    <li>Click the <b>"Insert - Workshop"</b> Button and copy paste the product ASIN or url on the dedicated field.</li>
                    <li>Click the <b>"Insert Products"</b> button to create the product block.<br>
                    <i>You can insert one or even more products in bulk.</i></li>
                    <li>Click the <b>"Clear"</b> Button to clear the data field.</li>
                </ol>
                
                <big>Congratulations! You have now created a product block that can be displayed wherever you like to on your blog post.</big>
            </div>
            <br>
            <div>
                <h2><big><strong>How to insert a product into a post</strong></big></h2>
                <ol>
                    <li>Click on the Product ID and it will be automatically copied.</li>
                    <li>Now go on the blog post where you want to display the product and use the Gutenberg Block Editor.</li>
                    <li>Search for <b>"Amazing Product"</b> Block and select it.</li>
                    <li>You will see a control Panel on the right side of the screen where you must insert the Product ID of the product that you want to display.<br>
                    <i>If you copied it from the <b>"Insert - Workshop"</b> Section, then you can simply paste it there. Otherwise you can use the search field integrated in the "Amazing Product" Block to find the ID of the product that you'd like to insert.</i></li>
                </ol>
                
                <big>Hit save and preview. Congratulations! Now you can enjoy your post with a beautiful affiliate product block displayed inside!</big>
            </div>
            <br>
            <div>
                <h2><big><strong>How to customize the product information</strong></big></h2>
                <br>
                <strong>Locally, in the post</strong>
                <ol>
                    <li>From the Control Panel of the "Amazing Product" Block you can customize the title and description, hide some elements and attach a "wapper" to make the product display even more eye-catching!<br>
                    <i>Or you can keep the standard product information from Amazon APIS and adjust the number of bullet lines to be displayed.</i></li>
                </ol>
                <big>Please notice that all these customized information will be displayed on that specific blog post where you decided to insert the product block.</big>
                <br><br>
                <strong>Sitewide, changing the default data displayed</strong>
                <ol>
                    <li>On the <b>"Edit- Warehouse"</b> section you can edit the product title and it will become the new "default" title of that product on all the blog posts where that product is inserted.</li>
                </ol>
                <big>Now you should be ready to use the plugin! Thank you for your attention and enjoy!</big>
            </div>
            
            <br><br>
            <i>P.S.: We would really love to know if you like the plugin! <b>Your opinion is important for us!</b> Please let us know with a <b><a href="https://wordpress.org/plugins/amazingaffiliates/#reviews" target="_blank" rel="noopener">review</a></b>! Thank you for the support!</i>
            
        </details>
        
	<br>
	
</main>