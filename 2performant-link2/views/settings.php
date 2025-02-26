<style>
.stuffbox .inside {
    padding: 0 10px;
}
</style>
<div class="wrap">
    <h2><?php echo $this->plugin->displayName; ?> &raquo; <?php _e( 'Settings', $this->plugin->name ); ?></h2>

    <?php if ( isset( $this->message ) ) { ?>
        <div class="updated fade"><p><?php echo $this->message; ?></p></div>
    <?php } if ( isset( $this->errorMessage ) ) { ?>
        <div class="error fade"><p><?php echo $this->errorMessage; ?></p></div>
    <?php } ?>
	<div class="stuffbox metabox-holder">
		<h3 class="hndle">Settings Link2</h3>
		<div class="inside">
			<p>
                2Performant affiliates: use this plugin to automatically transform the regular links in your blog into affiliate links.<br/><br/>

                - Make sure you are accepted into the advertisers’ affiliate programs that you want to promote<br/>
                - Configure what links you want to transform automatically in the <a href="https://network.2performant.com/affiliate/tools/link2" target="_blank">2Performant platform</a> and copy the generated ID to the field below<br/>
                - Create great content!
            </p>
			<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">
				<?php if($this->settings['link2id']) { echo '<b>Current Link2 ID:</b> ' . $this->settings['link2id'] . '<br/>'; } ?>
				<input type="text" name="link2id" id="link2id" placeholder="<?php echo 'Enter your ' . ($this->settings['link2id'] ? 'new ' : '') . 'Link2 ID here';?>">
		                	
				<?php wp_nonce_field( $this->plugin->name, $this->plugin->name.'_nonce' ); ?>        
				<input name="submit" type="submit" name="Submit" class="button button-primary" value="<?php _e( 'Save', $this->plugin->name ); ?>" />
			</form>

			<p>Pro tip: it's a pity not to use Link2 if you have a user-generated content site</p>
		</div>
	</div>
    			
	<div class="stuffbox metabox-holder">
		<h3 class="hndle">Affiliate marketing tutorials</h3>

		<div class="inside">
			<p>
				Thank you for using <b>2Performant affiliate marketing platform</b>. If you want to learn more about affiliate marketing, we recommend reading the following: <br/>	
			</p>
			<ul>
				<li><a href="https://2performant.com/blog/generating-affiliate-commissions-a-step-by-step-guide/" target="_blank">A step by step guide on how to generate affiliate commissions</a></li>
				<li><a href="https://2performant.com/blog/affiliate-marketing-with-blog-or-website/" target="_blank">6 things you need to know about affiliate marketing with a blog or website</a></li>
				<li><a href="https://2performant.com/blog/3-secrets-on-how-to-be-successful-in-affiliate-marketing/" target="_blank">Some tips on how to become a sucesfull affiliate marketer</a></li>
				<li><a href="https://2performant.com/blog/affiliate-marketing/" target="_blank">General information about affiliate marketing</a></li>
			</ul>
		</div>
	</div>

    <div class="stuffbox metabox-holder">
        <h3 class="hndle">Terms & conditions, data privacy and cookie policy</h3>

        <div class="inside">
            <ul>
                <li><a href="https://2performant.com/terms-conditions/" target="_blank">Terms & conditions</a></li>
                <li><a href="https://2performant.com/privacy-policy/" target="_blank">Privacy policy</a></li>
                <li><a href="https://2performant.com/cookie-policy/" target="_blank">Cookie policy</a></li>
            </ul>
        </div>
    </div>
</div>