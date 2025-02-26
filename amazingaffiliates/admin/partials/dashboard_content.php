<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php if( (float) get_option('amazingaffiliates_setup_status') >= 0.75 ) : ?>

    <a class="dashboard_menu_item insert" 	href="?page=amazingaffiliates_workshop" >
    	<h2><big>Insert</big><br><i>new products</i></h2>
    	<p><b>Bulk import & update</b> products into your database</p>
    </a>
    
    <a class="dashboard_menu_item edit" 	href="?page=amazingaffiliates_warehouse" >
    	<h2><big>Edit</big><br><i>custom details</i></h2>
    	<p><b>Edit & customize</b> product details and specifics</p>
    </a>
    
<?php else: ?>

	<a class="dashboard_menu_item setup" 	href="?page=amazingaffiliates_setup" >
		<h2><big>Set</big><br><i>up</i></h2>
		<p><b>Add</b> your affiliate <b>IDs</b> and <b>API keys</b></p>
	</a>

<?php endif; ?>

<a class="dashboard_menu_item learn" 	href="?page=amazingaffiliates_handbook" >
	<h2><big>Learn</big><br><i>more</i></h2>
	<p><b>Master</b> the plugin's functionalities or <b>troubleshoot</b> any issues with the FAQs</p>
</a>


<?php if( (float) get_option('amazingaffiliates_setup_status') >= 0.75 ) : ?>

	<a class="dashboard_menu_item settings" 	href="?page=amazingaffiliates_settings" >
		<h2><big>Set</big><br><i>things</i></h2>
		<p><b>Check</b> your affiliate <b>IDs</b> and <b>API keys</b> and adjust the <b>advanced settings</b></p>
	</a>

<?php endif; ?>