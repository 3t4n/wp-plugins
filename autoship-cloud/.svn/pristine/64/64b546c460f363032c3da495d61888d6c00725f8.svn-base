<?php

// Retrieve all the Autoship fields into an array.
$autoship_settings = autoship_get_settings_fields ();

// Get the current settings page tabs and associated callback functions.
// The tab array and be modified by the autoship_admin_settings_tabs filter
$tabs = autoship_retain_and_grow_tabs();
$active_tab = isset( $_GET[ 'tab' ] ) && isset( $tabs[$_GET[ 'tab' ]] )? $_GET[ 'tab' ] : apply_filters('autoship_admin_settings_default_tab', key($tabs) );

?>

<div id="asc-settings" class="wrap">

  <?php do_action('autoship_after_admin_retain_and_grow_header', $active_tab, $tabs ); ?>

  <h2 class="nav-tab-wrapper">

    <?php foreach ($tabs as $tab => $values) { ?>

      <a href="<?php echo admin_url( 'admin.php?page=retain-and-grow&tab='. $tab ); ?>" class="nav-tab <?php echo $values['link_class']; ?> <?php echo $active_tab == $tab ? 'nav-tab-active' : ''; ?>"><?php echo $values['label'];?></a>

    <?php } ?>

  </h2>

  <?php
  // Loop through the tabs and add in content
  foreach ($tabs as $tab => $values ) { ?>

  <div id="<?php echo $tab; ?>" class="wrap" style="display:<?php echo $active_tab == $tab ? 'block' : 'none';?>;">

    <?php
    $function = $values['callback'];
    if ( function_exists( $function ) && $active_tab == $tab )
    $function($active_tab);
    ?>

  </div>

  <?php } ?>

</div>
