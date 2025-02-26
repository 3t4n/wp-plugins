<script type="text/javascript">
	jQuery(document).ready(function($) {
	    $( '#free-forms-crm-update-button' ).on('click', function(e){
	        $.ajax({
				type: "POST",
				url:'admin-ajax.php',
				dataType: 'text',
				data: {action: 'wbs_update_forms'},
				success : function(responseText) {
					$('#free-forms-crm-update-success').show();
				}	
			});
	        e.preventDefault();
	    });
		
		
	});
</script>

<div class="wrap">
    <h2><?php esc_html_e('Free Forms &amp; CRM - Connexion Settings', 'free-forms-and-crm'); ?></h2>
	<?php $this-> wizard_notification() ; ?>
    <form method="POST" action="options.php">
        <?php
        settings_fields('wbs_options_group');
        do_settings_sections('wbs-settings');
        submit_button();
        ?>
    </form>
	<h2> <?php esc_html_e('Tools', 'free-forms-and-crm'); ?></h2>
	<p><button class="wbs-login button-primary" id="free-forms-crm-update-button"><?php esc_html_e('Update forms definitions', 'free-forms-and-crm'); ?></button>
	<div class="inst notice notice-success" id="free-forms-crm-update-success" style="display:none">
		<p><?php esc_html_e('Form definitions updated', 'free-forms-and-crm'); ?></p>
	</div>
</div>