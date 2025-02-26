<?php echo $before_widget; ?>
<?php echo $before_title . $title . $after_title; ?>

<?php if ($view->widgetText): ?>
<p><?php echo esc_html($view->widgetText) ?></p>
<?php else: ?>
<p><?php echo $this->__('Schedule an appointment with us online.') ?></p>
<?php endif ?>

<div id="appointmind-CalendarLink">
	<a
		href="<?php echo esc_html($view->calendarUrl) ?>"
		style="display:block; text-align:center; width:140px;border-radius:8px; background-color:#fff; background-image:url(<?php echo WP_CONTENT_URL ?>/plugins/appointmind/images/calendar.png); background-repeat:no-repeat; background-position:center 10px;padding:90px 0px 10px 0px;margin:10px auto;"
		target="appointmind-Calendar"
		onclick="window.open('', 'appointmind-Calendar', 'width=<?php echo esc_html($view->popupWidth) ?>,height=<?php echo esc_html($view->popupHeight) ?>, status, resizable, scrollbars');"
		><?php echo $this->__('Show Calendar') ?></a>
</div>

<?php echo $after_widget; ?>