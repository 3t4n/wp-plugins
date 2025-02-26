	<!-- ADDENDIO SEARCH  -->
			<header class="content-wrapper">
			<div class="fleft col-md-2 no-padding hidden-sm hidden-xs">
				<a href="https://addendio.com/contact/?utm_source=pluginlite&utm_medium=plugins&utm_campaign=searchpage_logo" target="_blank">
					<img src="<?php echo esc_url(AWPPT_PLUGIN_URL.'assets/img/addendio_logo_bw.png');  ?>">
				</a>
			</div>
			<div class="fright col-md-10 no-padding col-xs-12">			
				<div class="input-group">
					<input type="text" class="form-control" id="q" />
					<span class="input-group-btn">
						<button class="btn btn-primary"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</div>	
    </header>
	<div class="content-wrapper"> <!-- CONTENT-WRAPPER  -->

		<div class="fleft col-md-2 no-padding hidden-sm hidden-xs">
			<aside>
					<section class="facet-wrapper">
<!--						<div class="facet-category-title">Refine by</div> -->


						<?php if(!awppt_get_show_only_wp()) {?>
						<div id="sources" class="facet"></div>
						<?php } ?>
						<div id="installs" class="facet"></div>
						<div id="languages" class="facet"></div>
						<div id="last_update_ranges" class="facet"></div>
						<div id="ratings" class="facet"></div>
					</section>
				<div id="clear-all"></div>
      </aside>
		</div>

				<div class="fright col-md-10 no-padding col-xs-12">			
				<div class="results-wrapper">
	
					<section id="results-topbar">
						<div class="sort-by">
							<div id="sort-by-selector"></div>
						</div>
						<div id="stats" class="text-muted"></div>
					</section>
					<main id="hits"></main>
					<section id="pagination"></section>
				</div>
			</div>

	</div><!-- // CONTENT-WRAPPER  -->
	<!-- // ADDENDIO SEARCH  -->
		