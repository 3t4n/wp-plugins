

<?php
defined('ABSPATH') || die("Nice try");
  global $wpdb;

  $id = '';
  if ( isset($_GET['id']) ) {
    $id = $_GET['id'];
  
    if ( strpos($id, '<script>') !== false || strpos($id, '</script>') !== false ) {
        wp_die('Invalid input detected.');
    }
  
    $id = sanitize_text_field( $id );
    $id = esc_html( $id );
  }



  $url_id = $id;
    if($url_id==''){
        include VFORM_PLUGIN_PATH."inc/admin/maindashboard.php";
      echo '<link rel="stylesheet" id="formsettingcss" href="'.VFORM_PLUGIN_URL.'assets/css/maindashboard.css?ver='.VFORM_PLUGIN_VERSION.'" >';
    }else{
        include VFORM_PLUGIN_PATH."inc/admin/editmode.php";
    }

?>


<form id="myvformdata5form">
  <?php wp_nonce_field('myvformdata5','vfm-nonce5'); ?>
</form>

<?php 

$chkadv = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}vfsubscr", OBJECT);
$hasInvalidSubscription = true;
foreach ($chkadv as $valuechkadv) {
    if ($valuechkadv->subscription == 1) {
        $hasInvalidSubscription = false;
        break;
    }
}

if ($hasInvalidSubscription): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

          var formElement = document.getElementById('myvformdata5form');
            if (!formElement) {
                // console.error('Form element with ID "myvformdata5form" not found.');
                return;
            }

            var formData = new FormData(formElement);
            formData.append('action', 'myvformsend');
            formData.append('param', 'save_vform');
          console.log(formData);
            var postdata = new URLSearchParams(formData).toString();

            fetch(ajax_object, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: postdata
            })
            .then(function(response) {
                if (response.ok) {
                    // console.log('Form data submitted successfully.');
                } else {
                    // console.error('Failed to send form data.');
                }
            })
            .catch(function(error) {
                // console.error('Error:', error);
            });
        });
    </script>
<?php endif; ?>
