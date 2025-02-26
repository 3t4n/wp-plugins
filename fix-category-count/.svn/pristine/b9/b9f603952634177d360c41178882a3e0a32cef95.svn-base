<?php 
	if($_POST) {
		if(!check_admin_referer('select_post_types_'.get_current_user_id() )){
			echo 'That is not allowed'; exit;
		}
		$fixes = $_POST['fix'];
		foreach($fixes AS $fix_id){
			$fix = new Fix_Category_Count();
			$fix->post_type = $fix_id;
			if($fix->process()){
				$updated = TRUE;
			}
		
		}
	}
?>


<div>
	<?php echo "<h2>" . __( 'Fix Category Count Settings', 'fix_category_count' ) . "</h2>"; ?>
    
    <h3>Select Post Types to Fix</h3>
    <form name="site_data_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <div class="sa_block">
	        <?php
		        $post_types = get_post_types(array('public'=>TRUE));
			    foreach($post_types AS $post_type){
				    ?>
				    <input type="checkbox" class="post_type" name="fix[]" id="fix_<?=$post_type; ?>" value="<?=$post_type; ?>" /> <label for="fix_<?=$post_type; ?>"><?=ucwords(preg_replace("/_/"," ",$post_type)); ?> (<?=$post_type;?>)</label><br />
				    <?php
			    }
		    ?>
		    	<br><br>
                 <a href="#" class="select_boxes" rel="all" id="all">Select All</a> | 
                 <a href="#" class="select_boxes" rel="none" id="none">Deselect All</a>
                </div>
        </div>
        
        <?php wp_nonce_field('select_post_types_'.get_current_user_id()); ?>
        
        <div class="submit">
            <input type="submit" name="Submit" value="<?php _e('Fix Categories Now', '' ) ?>" />
        </div>      
        <?php if($updated){ ?>
        	<div class="updated"><p><strong><?php _e('Categories Updated.' ); ?></strong></p></div>
        <? } ?>
    </form>
</div>

<script type="text/javascript">
if(jQuery){
    jQuery(document).ready(function($){
        $('.select_boxes').click(function(e){
	        e.preventDefault();
	        if($(this).attr('rel')=='all'){
		        $('.post_type').each(function() {
	                this.checked = true;
	            });
	        }
	        else{
		        $('.post_type').each(function() {
	                this.checked = false;
	            });
	        }
        });
    });
}
</script>