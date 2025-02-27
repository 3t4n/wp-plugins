<?php
  if (isset($_POST['BtnSubmit'])) {
    $retrieved_nonce = $_REQUEST['tock_domain'];
    if (!current_user_can('manage_options') || !wp_verify_nonce($retrieved_nonce, 'add_tock_domain')) {
      wp_die('Failed security check');
    }
    $domainName = !empty($_POST['tock-domain']) ? sanitize_text_field($_POST['tock-domain']) : '';

    // Global domain name used to initialize tock widget
    $is_save_successful = update_option('tock_domain_name', $domainName);

    if ($is_save_successful) {
      show_message('Successfully updated domain to: ' . $domainName);
    } else {
      show_message('An error occurred please try again or contact hospitality@tockhq.com');
    }
  } else {
?>

<div class="wrap" style="width:800px;">
  <h1>Configure the Tock widget</h1>
  <p>To use the widget you will need to add your Tock business name. This can be found in the url of your public Tock page. For example, www.exploretock.com/roister, the Tock business name is the name after the “/ “, in this case it would be <b>roister</b>. Copy your Tock business name directly from your URL and add it below. </p>
  <img style="width:800px;" src="<?php echo esc_attr(plugin_dir_url( __FILE__ )) . 'assets/roister.jpg'; ?>">

  <form action="" method="POST">
  <?php wp_nonce_field( 'add_tock_domain', 'tock_domain' ); ?>
  <label for="tock-domain">Enter Tock business name: <input id="tock-domain" type="text" name="tock-domain" placeholder="domain" value='<?php echo esc_attr(get_option('tock_domain_name')) ?>' /> </label>
  <input type="submit" name="BtnSubmit" value="Save" />

  </form>
</div>
<?php
}
?>
