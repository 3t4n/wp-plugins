<div id="sdi-timer" 
	 data-id="<?php echo $campaignId; ?>" 
	 data-timer-start="<?php echo $timerStart; ?>" 
	 data-timer-end="<?php echo $timerEnd; ?>"
	 class="hidden">

	<div class="time-remaining">
		<?php if (!empty($redirect)) : ?> <a href="<?php echo $redirect; ?>"> <?php endif; ?>
		<?php if ($headline_placement == "top" || $headline_placement == "left") : ?>
			<span><?php echo $headline; ?></span>
			<?php if ($headline_placement == "top") : ?><br><?php endif; ?>
		<?php endif; ?>
		<span class="sdi-d hidden"><span></span> days :</span> <span class="sdi-h hidden"><span></span> hrs :</span> <span class="sdi-m hidden"><span></span> mins :</span> <span class="sdi-s hidden"><span></span> secs</span>
		<?php if ($headline_placement == "bottom" || $headline_placement == "right") : ?>
			<?php if ($headline_placement == "bottom") : ?><br><?php endif; ?>
			<span><?php echo $headline; ?></span>
		<?php endif; ?>
		<?php if (!empty($redirect)) : ?></a><?php endif; ?>
	</div>
</div>