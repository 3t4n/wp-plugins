<?php defined('ABSPATH') or die(); ?>

<div id="_<?php print_r(@$VARS["name"]["code"]); ?>-<?php print_r($VARS['id_rnd']); ?>-popup-container">
	
	<div class="_<?php print_r(@$VARS["name"]["code"]); ?>-<?php print_r($VARS['id_rnd']); ?>-popup-wrap _<?php print_r(@$VARS["name"]["code"]); ?>-<?php print_r($VARS['id_rnd']); ?>-popup-open">
		
		<div class="_<?php print_r(@$VARS["name"]["code"]); ?>-<?php print_r($VARS['id_rnd']); ?>-popup">
			
			<div class="_<?php print_r(@$VARS["name"]["code"]); ?>-<?php print_r($VARS['id_rnd']); ?>-popup-content">
				
				<div class="_<?php print_r(@$VARS["name"]["code"]); ?>-<?php print_r($VARS['id_rnd']); ?>-popup-description"><?php if (isset($SETTINGS["popup_description"]["description"])) { ?><?php echo wp_kses_post($SETTINGS["popup_description"]["description"]); ?><?php } ?></div>
				
				<div class="_<?php print_r(@$VARS["name"]["code"]); ?>-<?php print_r($VARS['id_rnd']); ?>-popup-btns-wrap">
					
					<div class="_<?php print_r(@$VARS["name"]["code"]); ?>-<?php print_r($VARS['id_rnd']); ?>-popup-btn _<?php print_r(@$VARS["name"]["code"]); ?>-<?php print_r($VARS['id_rnd']); ?>-popup-btn_apply" id="_<?php print_r(@$VARS["name"]["code"]); ?>-<?php print_r($VARS['id_rnd']); ?>-popup-btn_apply">
						<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
						<span>&nbsp;<?php print_r(@$SETTINGS["popup_description"]["btn_apply"]); ?></span>
					</div>
					<div class="_<?php print_r(@$VARS["name"]["code"]); ?>-<?php print_r($VARS['id_rnd']); ?>-popup-btn _<?php print_r(@$VARS["name"]["code"]); ?>-<?php print_r($VARS['id_rnd']); ?>-popup-btn_deny" id="_<?php print_r(@$VARS["name"]["code"]); ?>-<?php print_r($VARS['id_rnd']); ?>-popup-btn_deny">
						<svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
						<span>&nbsp;<?php print_r(@$SETTINGS["popup_description"]["btn_deny"]); ?></span>
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>
