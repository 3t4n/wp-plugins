<?php
$aboutWidgetContent = apply_filters('rankology_stats_about_widget_content', false);
if ($aboutWidgetContent) {
    echo wp_kses_post($aboutWidgetContent);
    return;
}
?>
