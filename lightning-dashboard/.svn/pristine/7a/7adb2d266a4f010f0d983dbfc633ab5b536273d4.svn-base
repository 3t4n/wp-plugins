<?php

/**
 * Options html file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
} ?>

<div id="ldash-options" class="ldash-options">

	<?php if( $tab == 'settings' ) { ?>
		<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&option=general"<?php echo ( $option == 'general' ? ' class="ldash-current"' : '' ); ?>><?php _e( 'General', 'lightning-dashboard' ); ?></a>
		<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&option=orders"<?php echo ( $option == 'orders' ? ' class="ldash-current"' : '' ); ?>><?php _e( 'Orders', 'lightning-dashboard' ); ?></a>
		<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&option=products"<?php echo ( $option == 'products' ? ' class="ldash-current"' : '' ); ?>><?php _e( 'Products', 'lightning-dashboard' ); ?></a>
		<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&option=customers"<?php echo ( $option == 'customers' ? ' class="ldash-current"' : '' ); ?>><?php _e( 'Customers', 'lightning-dashboard' ); ?></a>
		<?php
		if( !empty( ldash_add_ons() ) ) {
			foreach( ldash_add_ons() as $add_on_id => $add_on_name ) { ?>
				<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&option=<?php echo $add_on_id; ?>"<?php echo ( $option == $add_on_id ? ' class="ldash-current"' : '' ); ?>><?php echo $add_on_name . ' ' . __( '(Add-On)', 'lightning-dashboard' ); ?></a>
			<?php }
		}
	} else { ?>

		<div class="ldash-options-left">

			<?php if( $tab == 'orders' ) {

				// Set by user status
				
				$by_user = false; 

				if( isset( $_GET['user_id'] ) ) {

					$by_user = true; 
				
				} ?>

				<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&option=last-7-days"<?php echo ( $option == 'last-7-days' && $by_user == false ? ' class="ldash-current"' : '' ); ?>><?php _e( 'Last 7 Days', 'lightning-dashboard' ); ?></a>
				<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&option=last-30-days"<?php echo ( $option == 'last-30-days' && $by_user == false ? ' class="ldash-current"' : '' ); ?>><?php _e( 'Last 30 Days', 'lightning-dashboard' ); ?></a> 
				<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&option=this-month"<?php echo ( $option == 'this-month' && $by_user == false ? ' class="ldash-current"' : '' ); ?>><?php _e( 'This Month', 'lightning-dashboard' ); ?></a> 
				<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&option=last-month"<?php echo ( $option == 'last-month' && $by_user == false ? ' class="ldash-current"' : '' ); ?>><?php _e( 'Last Month', 'lightning-dashboard' ); ?></a> 
				<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&option=this-year"<?php echo ( $option == 'this-year' && $by_user == false ? ' class="ldash-current"' : '' ); ?>><?php _e( 'This Year', 'lightning-dashboard' ); ?></a> 
				<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&option=last-year"<?php echo ( $option == 'last-year' && $by_user == false ? ' class="ldash-current"' : '' ); ?>><?php _e( 'Last Year', 'lightning-dashboard' ); ?></a> 
				<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&option=custom"<?php echo ( $option == 'custom' && $by_user == false ? ' class="ldash-current"' : '' ); ?>><?php _e( 'Custom', 'lightning-dashboard' ); ?></a>
				<?php if( $by_user == true ) { ?>
					<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&user_id=<?php echo $_GET['user_id']; ?>"<?php echo ( isset( $_GET['user_id'] ) ? ' class="ldash-current"' : '' ); ?>><?php _e( 'All By User', 'lightning-dashboard' ); ?></a>
				<?php }

			} elseif( $tab == 'products' ) { ?>

				<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&option=all-products"<?php echo ( $option == 'all-products' ? ' class="ldash-current"' : '' ); ?>><?php _e( 'All Products', 'lightning-dashboard' ); ?></a>
				<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&option=all-inc-variations"<?php echo ( $option == 'all-inc-variations' ? ' class="ldash-current"' : '' ); ?>><?php _e( 'All Products (inc Variations)', 'lightning-dashboard' ); ?></a>

			<?php } elseif( $tab == 'customers' ) { ?>

				<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>&option=all-customers"<?php echo ( $option == 'all-customers' ? ' class="ldash-current"' : '' ); ?>><?php _e( 'All Customers', 'lightning-dashboard' ); ?></a>

			<?php } ?>

		</div>
		<div class="ldash-options-right">
			<form method="post">
				<!-- Form inputs can get appended here dynamically -->
				<?php if( $tab == 'orders' ) { ?>
					<a href="post-new.php?post_type=shop_order" id="ldash-add-new" class="button button-primary button-small" target="_blank"><?php _e( 'Add New', 'lightning-dashboard' ); ?></a>
				<?php } elseif( $tab == 'products' ) { ?>
					<a href="post-new.php?post_type=product" id="ldash-add-new" class="button button-primary button-small" target="_blank"><?php _e( 'Add New', 'lightning-dashboard' ); ?></a>
				<?php } elseif( $tab == 'customers' ) { ?>
					<a href="user-new.php?customer=1" id="ldash-add-new" class="button button-primary button-small" target="_blank"><?php _e( 'Add New', 'lightning-dashboard' ); ?></a>
				<?php }
				if( get_option( 'ldash_general_misc_save_state' ) == 'on' ) { ?>
					<a href="admin.php?page=lightning-dashboard&tab=<?php echo $tab; ?>" id="ldash-save-state-reset" class="button button-small"><?php _e( 'Save State Reset', 'lightning-dashboard' ); ?></a>
				<?php } ?>
				<input type="hidden" id="ldash-selected" name="ldash_selected" value="">
			</form>
		</div>
		<div class="ldash-clear"></div>
	<?php } ?>
</div>
<?php if( $tab == 'orders' && $option == 'custom' ) { ?>
	<div id="ldash-sub-options">
		<form method="post">
			<label><?php _e( 'Date from:', 'lightning-dashboard' ); ?><?php LDASH_Markup::field_input( 'text', 'date-from', 'datepicker', 'Date from', $_POST['date_from'], false ); ?></label>
			<label><?php _e( 'Date to:', 'lightning-dashboard' ); ?><?php LDASH_Markup::field_input( 'text', 'date-to', 'datepicker', 'Date to', $_POST['date_to'], false ); ?></label>
			<button type="submit" class="button button-small button-primary"><?php _e( 'Go', 'lightning-dashboard' ); ?></button>
		</form>
	</div>
<?php } ?>