<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class Mfp_Create_Feed
{
    public function __construct()
    {
        return Mfp_Feeds_Init();
    }
}
$mfp_export = new Mfp_Create_Feed();  //  class object

function Mfp_Feeds_Init()
{
    echo "<h2>Miinto Feed Generator</h2>";

    // Check if the form is submitted and verify the nonce
    if (isset($_POST["mfpmiinto"]) && isset($_POST['mfp_miinto_nonce'])) {
        // Unsplash and sanitize the nonce input
        $nonce = sanitize_text_field(wp_unslash($_POST['mfp_miinto_nonce']));  // Remove slashes and sanitize

        // Verify the nonce
        if (wp_verify_nonce($nonce, 'mfp_miinto_nonce_action')) {
            // Process the form if the nonce is valid
            $dir = plugin_dir_path(__FILE__);
            include($dir . 'classes/mfp-selected-products.php');  // MFP_Selected_Products
            Mfp_Selected_Products::Mfp_Export_Miinto_Feed();  // MIINTO text file ends
        } else {
            echo 'Invalid nonce.';
        }
    }
}



// Button on plugin page
echo '<br/>';
echo '<form name="form1" method="post">';
wp_nonce_field('mfp_miinto_nonce_action', 'mfp_miinto_nonce');
echo '<input type="submit" name="mfpmiinto" value="Create Feeds">';
echo '</form>';
echo '<br/>';