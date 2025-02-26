<div id="accordion">
<h2><?php echo esc_html__("Step", 'free-forms-and-crm') .' 1: ' .esc_html__("Create a free account if you don't have already", 'free-forms-and-crm'); ?></h2>
<div>
<p><a class="button button-primary"  href="<?php echo $this->gratisUrl ; ?>" target="blank"><?php echo esc_html__("Create new account", 'free-forms-and-crm'); ?></a>
</p>
<p><a onclick="javascript:jQuery('#whyaccount').toggle();" href="#"><?php esc_html_e("Why I nedd an account?", 'free-forms-and-crm'); ?></a></p>
<div id="whyaccount" style="display:none">
<?php echo esc_html__("The plugin is offering a higher security of the clients' (CRM) data. That's why you are required to create an account for which you have your own credentials.", 'free-forms-and-crm'); ?><br/>
</div>
<div>
<?php echo esc_html__("After creating a WBS account, you will receive the credentials by e-mail.", 'free-forms-and-crm'); ?><br/>

</div>
<p><a class="button button-primary nextpanel"><?php esc_html_e('Next', 'free-forms-and-crm') ?></a></p><br/>
</div>

<h2><?php echo esc_html__("Step", 'free-forms-and-crm') .' 2: ' . esc_html__("Allow current application to connect to you account", 'free-forms-and-crm'); ?></h2>
<div>
<script>var wbsappname = "<?php echo $this->createName(); ?>"</script>
<p><button class="button button-primary apppermission"><?php esc_html_e('Give Permissions to your app', 'free-forms-and-crm'); ?></button></p>
<p><?php echo esc_html__("It is necessary to connect this plugin with your WBS accounts. The plugin will get only the minimum rights required for adding the forms on your WordPress website. Please click the button in order to give the necessary rights.", 'free-forms-and-crm'); ?></p>
<div class="inst notice error" style="display:none" id="resulte"><p></p></div>
<div class="inst notice error" style="display:none" id="regenerate">
	<p><?php esc_html_e("If you don't remember your credentials for the app, you can regenerate them", 'free-forms-and-crm'); ?></p>
	<p><button class="button button-primary" id="regenerateKeys"><?php esc_html_e('Regenerate credentials', 'free-forms-and-crm'); ?></button></p>
</div>
<div class="inst notice notice-success " style="display:none" id="results"><p></p></div>
<p id="next2" style="display:none"><button class="button button-primary nextpanel"><?php esc_html_e('Next', 'free-forms-and-crm') ?></button></p>
</div>
<h2><?php echo esc_html__("Step", 'free-forms-and-crm') .' 3: ' . esc_html__("Test your app", 'free-forms-and-crm'); ?></h2>
<div>
<div class="inst notice notice-success " style="display:none" id="finish"><p>
<?php esc_html_e("You have successfully installed your app. Congratulations!", 'free-forms-and-crm'); ?>
</p></div>
<p></p>
</div>
</div>

