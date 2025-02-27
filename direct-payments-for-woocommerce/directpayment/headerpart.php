<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
?>
<div class="tumaz-direct-container">


<div class='wrap'>
    <div class="">
    	<div class="tablenav top"> 
				<div class="alignleft bulkactions">
			<label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>

            <select name="bulk_action">
<option value="">Bulk Actions</option>
<option value="mark_processing">Change status to processing</option>
<option value="mark_on-hold">Change status to on-hold</option>
<option value="mark_completed">Change status to completed</option>
<option value="mark_cancelled">Change status to cancelled</option>
<option value="trash">Move to Trash</option>
</select>
<input type="submit" class="button action" name="digages_desktop_form_submitted" value="Apply"> 


		</div>

        
			<div class="alignleft"> 
    <select name="year" id="filter-year" class="digages_dp_date_filter" >
                <option value=" ">All dates</option>
             </select> 
 <input type="text" id="search-box" class="wc-customer-search setd" placeholder="Filter by customer">
      
        <button id="filter-button" class="button">Filter</button>
       </div>
       
       
<div class='tablenav-pages'>
<?php
   $totalpage = ceil($all_orders_count/$items_per_page); ?>
<span class="displaying-num"><?php echo wp_kses_post($all_orders_count);?> items</span>

<span class='pagination-links'>
    <?php if ($current_page > 1) : ?>

        <a href="<?php echo esc_url(add_query_arg('paged', $current_page - 1)); ?>">
            <span class="tablenav-pages-navspan button" aria-hidden="true">&lsaquo;</span>
        </a>
        <a href="<?php echo esc_url(add_query_arg('paged', 1)); ?>">
            <span class="tablenav-pages-navspan button" aria-hidden="true">&laquo;</span>
        </a>
    <?php else : ?>
        <a href="<?php echo esc_url(add_query_arg('paged', $current_page - 1)); ?>">
            <span class="tablenav-pages-navspan button disabled" aria-hidden="true">&lsaquo;</span>
        </a>
        <a href="<?php echo esc_url(add_query_arg('paged', 1)); ?>">
            <span class="tablenav-pages-navspan button disabled" aria-hidden="true">&laquo;</span>
        </a>
    <?php endif; ?>

    <?php echo esc_html($current_page); ?> of <?php echo esc_html($totalpage); ?>

    <?php if ($current_page < $totalpage) : ?>

        <a href="<?php echo esc_url(add_query_arg('paged', $current_page + 1)); ?>">
            <span class="next-page button" aria-hidden="true">&rsaquo;</span>
        </a>
        <a href="<?php echo esc_url(add_query_arg('paged', $totalpage)); ?>">
            <span class="last-page button" aria-hidden="true">&raquo;</span>
        </a>
    <?php else : ?>

        <a href="<?php echo esc_url(add_query_arg('paged', $current_page + 1)); ?>">
            <span class="next-page button disabled" aria-hidden="true">&rsaquo;</span>
        </a>

        <a href="<?php echo esc_url(add_query_arg('paged', $totalpage)); ?>">
            <span class="last-page button disabled" aria-hidden="true">&raquo;</span>
        </a>
    <?php endif; ?>
</span>

    </div>
    

		<br class="clear" />
		<br class="clear" />
	</div>
<br/>
    </div>
    </div>