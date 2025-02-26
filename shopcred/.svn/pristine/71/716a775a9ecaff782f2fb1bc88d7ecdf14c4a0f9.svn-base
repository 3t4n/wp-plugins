<div
	class="shopcred-dashboard-shopcred-admin-category"
	:class="{ 'proccesing-state': proccesingState }"
>
	<div class="spc-plugin-settings">
		<h4 class="spc-plugin-settings-heading">
			<?php echo esc_html__( 'Plugin Settings', 'shopcred') ;?>
		</h4>
		<div class="subpage-category-list">
			<plugin-settings-toggle
                v-for="( categoryData, index ) in categoryList"
                :key="`category-${ categoryData.slug }`"
                :config="categoryData"
            ></plugin-settings-toggle>
		</div>
	</div>
</div>