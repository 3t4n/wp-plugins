<?php
/**
 * @copyright   Copyright (c) 2015, Addendio.com
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function awpp_search_plugins() {

?>


<div class="wrap" id="addplus_searchpage"> <!-- START WRAP DIV -->
	<h2>Search Plugins with Addendio</h2>	
		<div class="row"></div>
	<br>
						<div role="tabpanel">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#search-tab" aria-controls="search" role="tab" data-toggle="tab"><?php echo __('Search Plugins', 'addendio'); ?></a></li>
								<li role="presentation"><a href="<?php echo AWPPT_ADMIN_FOLDER;?>themes.php?page=addendio-search-themes" aria-controls="themes" role="tab" ><?php echo __('Search Themes', 'addendio'); ?></a></li>						  
							</ul>

						<!-- START TAB-CONTENT DIV -->
						<div class="tab-content">

								<!-- START SEARCH TAB -->
								<div role="tabpanel" class="tab-pane active" id="search-tab">
									<?php 
										require_once  dirname(__FILE__) . '/parts/awppt-templ-search-plugins.php';
									?>
									
								</div> <!-- END SEARCH TAB -->
							
						</div>
						<!-- END TAB-CONTENT DIV -->
					</div>
					<!-- END TABPANEL DIV -->

	
</div>
<?php		
	
}
