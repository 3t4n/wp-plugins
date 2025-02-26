<?php
namespace FlamixLocal\Exchange\Settings;

use FlamixLocal\Exchange\Helpers;
use Flamix\CommerceML\Operations\Files;
?>
<?php echo Helpers::adminMessage('Install the Products sync interceptor <a href="https://flamix.solutions/bitrix24/integrations/site/products/woocommerce.php" target="_blank">module in Bitrix24</a>!'); ?>
<div class="wrap">
    <h2>Bitrix24 and WooCommerce Products sync</h2>

    <form method="post" action="options.php">
        <?php settings_fields(Setting::getOptionName('group')); ?>
        <table class="form-table">
            <?php Helpers::markup_input(Setting::getOptionName('lead_domain'), [
                'value' => Setting::getOption('lead_domain'),
                'label' => 'Bitrix24 Portal Domain',
                'placeholder' => 'company.bitrix24.com',
                'description' => 'Your Bitrix24 portal domain',
            ]); ?>

            <?php Helpers::markup_input(Setting::getOptionName('lead_api'), [
                'value' => Setting::getOption('lead_api'),
                'label' => 'Flamix Plugin Secret Key',
                'placeholder' => 'xxxxxx.....xxxxx',
                'description' => 'Your Flamix Secret KEY (Do not confuse with License Key). Read FAQ <a href="https://flamix.solutions/about/contacts.php#FAQ" target="_blank">Where can I get the secret integration key</a>',
            ]); ?>

            <?php Helpers::markup_select(Setting::getOptionName('product_find_by'), [
                'value' => Setting::getOption('product_find_by'),
                'options' => [
                        'EXTERNAL_ID' => 'EXTERNAL_ID (Recommended)',
                        'SKU' => 'Product SKU',
                        'ID' => 'Product ID (Not recommended)',
                ],
                'label' => 'Product find by',
                'description' => 'We have already created the EXTERNAL_ID field and will fill it in automatically. We recommend using this field!',
            ]); ?>
        </table>

        <input type="submit" class="button-primary" value="<?php _e('Save') ?>"/>
    </form>

    <h2>Configurations</h2>
    <ul>
        <li><?php echo Helpers::checkParams('Product find by', (bool)Setting::getOption('product_find_by', false), [
                Setting::getOption('product_find_by', false),
                'Not selected! Please, select "Product find by" options!'
            ]); ?></span></li>
        <li><?php echo Helpers::checkParams('WooCommerce Plugin activated', Helpers::isPluginActive('woocommerce/woocommerce.php'), [
                'Yes',
                'No. You must install <a href="https://ru.wordpress.org/plugins/woocommerce/" target="_blank">plugin</a>!',
            ]); ?></li>
        <li><?php echo Helpers::checkParams('CURL', extension_loaded('curl')); ?></li>
        <li><?php echo Helpers::checkParams('SSL', is_ssl()); ?></li>
        <li><?php echo Helpers::checkParams('PHP version 7.2+', version_compare(PHP_VERSION, '7.2.0') >= 0, [
                'PHP version ' . PHP_VERSION,
                'Bad PHP version (' . PHP_VERSION . ') Update PHP version on your hosting!',
            ]); ?></li>
        <li><?php echo Helpers::checkParams('PHP param "max_execution_time"', function () {
                ini_set('max_execution_time', 240);
                if(ini_get('max_execution_time') >= 240)
                    return true;

                return false;
            }, [
                ini_get('max_execution_time'),
                ini_get('max_execution_time') . '. We try to increase by set_time_limit(240), but it doesn\'t work. This is a hosting issue!',
            ]); ?></li>
        <li><?php echo Helpers::checkParams('post_max_size', function () {
                ini_set('PHP param "post_max_size"', '512M');
                if(ini_get('post_max_size') >= '512M' || ini_get('post_max_size') > 512000)
                    return true;

                return false;
            }, [
                ini_get('post_max_size'),
                ini_get('post_max_size') . '. We try to increase by ini_set(\'post_max_size\', \'512M\'), but it doesn\'t work. This is a hosting issue!',
            ]); ?></li>
        <li><?php echo Helpers::checkParams('Upload path (for debug)', true, [Files::exchange()->getPath()]); ?></li>
    </ul>
</div>