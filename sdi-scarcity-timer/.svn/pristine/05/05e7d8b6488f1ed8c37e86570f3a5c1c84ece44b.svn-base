<div id="sdi-timer" 
	 data-id="<?php echo $campaignId; ?>" 
	 data-timer-start="<?php echo $timerStart; ?>" 
	 data-timer-end="<?php echo $timerEnd; ?>"
	 class="hidden sdi-<?php echo $display; ?>">

	<div class="time-remaining">
		<?php if (!empty($redirect)) : ?> <a href="<?php echo $redirect; ?>"> <?php endif; ?>
		<?php if ($headline_placement == "top" || $headline_placement == "left") : ?>
			<span class="headline"><?php echo $headline; ?></span>
			<?php if ($headline_placement == "top") : ?><br><?php endif; ?>
		<?php endif; ?>
		<div class="sdi-d hidden timer-v">
			<span class="timeval"></span><br><small>DAYS</small>
		</div> 
		<div class="timer-v sep">:</div>
		<div class="sdi-h hidden timer-v">
			<span class="timeval"></span><br><small>HRS</small>
		</div> 
		<div class="timer-v sep">:</div>
		<div class="sdi-m hidden timer-v">
			<span class="timeval"></span><br><small>MINS</small>
		</div>
		<div class="timer-v sep">:</div>
		<div class="sdi-s hidden timer-v">
			<span class="timeval"></span><br><small>SECS</small>
		</div>
		<div class="clearboth"></div>
		<?php if ($headline_placement == "bottom" || $headline_placement == "right") : ?>
			<?php if ($headline_placement == "bottom") : ?><br><?php endif; ?>
			<span class="headline"><?php echo $headline; ?></span>
		<?php endif; ?>
		<?php if (!empty($redirect)) : ?></a><?php endif; ?>
		<div class="clearboth"></div>
	</div>
	<div class="clearboth"></div>
</div>