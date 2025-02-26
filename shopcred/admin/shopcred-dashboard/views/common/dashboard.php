<?php
/**
 * Main dashboard template
 */
?>
   <div class="spc-elements-dashboard-wrapper">
   		<div class="spc-dbrd-panel-header-content" style="margin-left: 30px; margin-bottom: 40px;">
			<h2 class="panel-header-title" style="display: none;"><?php _e( 'Welcome to ShopCred', 'shopcred' ); ?></h2>
			<span class="panel-header-desc" style="display: none;"><?php _e( 'Advanced plugins for Gutenberg', 'shopcred' ); ?></span>
		</div>
<div
	id="shopcred-dashboard-page"
	class="shopcred-dashboard-page"
	ref="shopcredDashboardPage"
>

	<div class="shopcred-dashboard-page__body">

		<shopcred-dashboard-alert-list
			:alert-list="alertNoticeList"
		></shopcred-dashboard-alert-list>

		<shopcred-dashboard-before-content
			:config="beforeContentConfig"
		></shopcred-dashboard-before-content>

		<div class="shopcred-dashboard-page__content">

			<shopcred-dashboard-header
				:config="headerConfig"
			></shopcred-dashboard-header>

			<div class="shopcred-dashboard-page__component">

				<shopcred-dashboard-before-component
					:config="beforeComponentConfig"
				></shopcred-dashboard-before-component>

				<component
					:is="pageModule"
					:subpage="subPageModule"
				></component>
				
			</div>

		</div>

	</div>

</div>
</div>
