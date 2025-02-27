<?php
/*
 * rendering mailchimp subscription form
 */
$formStyles = get_option( 'nm_mailchimp_form_settings' );
$select = array('mc_forms' => 'form_meta');
$where  = array('%d'    => array('form_id' => $form_id));
$form_detail = $this -> get_row_data($select, $where);
$form_meta = json_decode( $form_detail->form_meta, true);

if(isset($form_meta['listid'])){
  include 'subscription.form.deprecated.php';
} else {
  include 'subscription.form.php';
}