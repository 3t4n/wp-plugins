<?php echo $args['before_widget']; ?>
<?php if ( ! empty( $widget->title ) ): ?>
	<?php echo $args['before_title'] . apply_filters( 'widget_title', $widget->title ) . $args['after_title']; ?>
<?php endif; ?>
<iframe class="<?php echo $widget->class ?>" src="<?php echo $widget->url; ?>" style="<?php echo $widget->style; ?>">
</iframe>
<?php echo $args['after_widget']; ?>
