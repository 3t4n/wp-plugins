<?php

/**
 * @author Fukuro
 * @created 2018/09/13
 */
 
$this_dir_path = plugin_dir_url(__FILE__);

/// Start HTML?>
<h3>Usage-1 : Copy and Paste multiple widgets</h3>

First, Select multiple widgets you want to copy.<br>
<img src="<?php echo $this_dir_path; ?>usage_1_1_multidup_check_widgets.png"><br>

Then drag and drop "<b>Coied Widget</b>" to any position.<br>
<img src="<?php echo $this_dir_path; ?>usage_1_2_multidup_drag_and_drop_copied_widgets.png"><br>

Selected widgets is duplicated at that location.<br>
<img src="<?php echo $this_dir_path; ?>usage_1_3_multidup_pasted_widgets.png"><br>

<h3>Usage-2 : Copy and Paste single widget</h3>

First, Click "<b>Duplicate this widget</b>" link.<br>
<img src="<?php echo $this_dir_path; ?>usage_2_1_singledup_click_duplicate_link.png"><br>

A duplicate of the widget will be created under it.<br>
<img src="<?php echo $this_dir_path; ?>usage_2_2_singledup_click_duplicated_widget.png"><br>

<?php /// End HTML