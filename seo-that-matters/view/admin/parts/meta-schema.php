<?php

namespace SeoThatMatters;
use function SeoThatMatters\plugin_instance;

?>

<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-body-wrapper">
    <?php plugin_instance()->admin_view('parts/partials/meta-schema/meta'); ?>
    <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-spacer"></div>
    <div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-spacer"></div>
    <?php plugin_instance()->admin_view('parts/partials/meta-schema/schema'); ?>
</div>

<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-spacer <?php echo esc_attr(SEOTM_PREFIX); ?>-spacer-medium"></div>
<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-spacer <?php echo esc_attr(SEOTM_PREFIX); ?>-spacer-medium"></div>