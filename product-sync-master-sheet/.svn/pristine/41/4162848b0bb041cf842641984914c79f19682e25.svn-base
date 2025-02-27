<?php
if (! defined('ABSPATH')) exit; // Exit if accessed directly  
$prefix = __NAMESPACE__ . '_sflpricing_';
include $this->topbar_file;
wp_enqueue_style($prefix . '-pricing-table', plugin_dir_url(__FILE__) . 'pricing-table-style.css', [], '1.0.0');
wp_enqueue_script($prefix . '-pricing-table', plugin_dir_url(__FILE__) . 'pricing-table-script.js', [], '1.0.0');

//Include config-data.php file for pricing variables
include plugin_dir_path(__FILE__) . 'pricing-functions.php';
include plugin_dir_path(__FILE__) . 'manage-data.php';
//Available variables: $pricing_variables, $product_id, $final_data
?>
<div class="wrap pssg_wrap pssg-content">

    <h1 class="wp-heading "></h1>
    <div class="fieldwrap">

    </div>
</div>
<div class="wrap pssg_wrap pssg-content sflpricing-pricing-wrapper-main-wrapper">
    <div class="my-pricing-wrapper-loader" style="color: #000;font-size: 25px;font-weight: bold;">Loading...</div>
    <div class="pssg-pricing-wrapper" style="display: none;">
        <div class="pricing-header-section">
            <h2 class="pricing-title"><?php esc_html_e('Our Pricing and Plans', 'product-sync-master-sheet'); ?></h2>
            <p class="pricing-subtitle">
                <?php esc_html_e('Choose the perfect plan for your business needs with our flexible pricing options.', 'product-sync-master-sheet'); ?>
                <a title="You can try premium demo here before purchase." href="<?php echo esc_url( $premum_try_demo ); ?>" target="_blank"><?php esc_html_e('Try Premium Demo', 'product-sync-master-sheet'); ?></a>
            </p>

            <!-- Toggle Switch -->
            <div class="pricing-toggle">
                <span class="toggle-option yearly active"><?php esc_html_e('Yearly', 'product-sync-master-sheet'); ?></span>
                <label class="switch">
                    <input type="checkbox" id="pricing-toggle">
                    <span class="slider round"></span>
                </label>
                <span class="toggle-option lifetime"><?php esc_html_e('Lifetime', 'product-sync-master-sheet'); ?></span>
            </div>
        </div>

        <!-- Pricing Tables Container -->
        <div class="pricing-plans">
            <!-- Yearly Plans -->
            <div class="pricing-period yearly active">
                <?php include plugin_dir_path(__FILE__) . 'yearly.php'; ?>
            </div>

            <!-- Lifetime Plans -->
            <div class="pricing-period lifetime">
                <?php include plugin_dir_path(__FILE__) . 'lifetime.php'; ?>
            </div>
        </div>
    </div>
</div>