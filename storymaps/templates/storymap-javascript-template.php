<script type="text/javascript">
	var storymap_data = <?php echo $slides; ?>;
	var storymap_options = <?php echo $settings; ?>;
	var storymap = new VCO.StoryMap('<?php echo $id; ?>', storymap_data, storymap_options);
	window.onresize = function(event) {
	    storymap.updateDisplay();
	}
</script> 