<?php if (!defined('ABSPATH')) exit; ?>

<div id="rankology-stats-platforms-widget">
    <div data-top-platforms-chart='true' data-platforms-names='<?php echo esc_attr(json_encode($platforms_name)) ?>' data-platforms-values='<?php echo esc_attr(json_encode($platforms_value)); ?>'></div>
</div>