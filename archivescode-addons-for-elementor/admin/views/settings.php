<div class="afe-settings">
		<div class="wrap">
	<h2><?php echo $this->_plugin_data['Name']; ?></h2>
	<ul class="subsubsub">
		<li class="all"><a href="<?php echo add_query_arg(array('page' => AFE_SLUG), admin_url( 'admin.php' )) ;?>">All <span class="count">(<?php echo count($this->_afe_widget->_widgets_installed); ?>)</span></a> |</li>
		<li class="active"><a href="<?php echo add_query_arg(array('page' => AFE_SLUG, 'filter' => 'active'), admin_url( 'admin.php' )) ;?>">Active <span class="count">(<?php echo count($this->_afe_widget->_widgets_activated); ?>)</span></a> |</li>
		<li class="inactive"><a href="<?php echo add_query_arg(array('page' => AFE_SLUG, 'filter' => 'inactive'), admin_url( 'admin.php' )) ;?>">Inactive <span class="count">(<?php echo (count($this->_afe_widget->_widgets_installed) - count($this->_afe_widget->_widgets_activated)); ?>)</span></a></li>
	</ul>
	<table class="wp-list-table widefat plugins">
		<thead>
		<tr>
			<th scope="col" id="name" class="manage-column column-name" style=""><?php _e('widget', AFE_SLUG); ?></th>
			<th scope="col" id="description" class="manage-column column-description" style=""><?php _e('Description', AFE_SLUG); ?></th>
		</tr>
		</thead>
		<tbody id="the-list">
			<?php
			//echo '<pre>' .print_r($this->_afe_widget->_widgets_installed, true) . '</pre>';
			foreach ($this->_afe_widget->_widgets_installed as $key => $widget) {
				$show = true;
				$filter = isset($_GET['filter']) ? $_GET['filter'] : false;
				if($filter){
					switch ($filter) {
						case 'active':
								if(FALSE === $this->_afe_widget->is_widget_active($key)){
									$show = FALSE;
								}
							break;

						case 'inactive':
								if(TRUE === $this->_afe_widget->is_widget_active($key)){
									$show = FALSE;
								}
							break;
						
						default:
							# code...
							break;
					}
				}
				if(!$show){
					continue;
				}

				$name = (!empty($widget['data']['name'])) ? $widget['data']['name'] : $key;
				$description = (!empty($widget['data']['description'])) ? $widget['data']['description'] : __('No description available', AFE_SLUG);

				$row_actions = array();
				if($this->_afe_widget->is_widget_active($key)){
					$row_actions['deactivate'] = sprintf('<span class="deactivate"><a href="%s">%s</a></span>', 
						wp_nonce_url( 
							add_query_arg( 
								array(
									'page' => AFE_SLUG,
									'widget' => $key,
									'action' => 'deactivate_widget'
								),
								admin_url( 'admin.php' )
							), 
							'deactivate_widget'
						), 
						__('Deactivate', AFE_SLUG) 
					);
					$row_class = 'active';
				}else{
					$row_actions['activate'] = sprintf('<span class="activate"><a href="%s">%s</a></span>', 
						wp_nonce_url( 
							add_query_arg( 
								array(
									'page' => AFE_SLUG,
									'widget' => $key,
									'action' => 'activate_widget',
								),
								admin_url( 'admin.php' )
							), 
							'activate_widget'
						), 
						__('Activate', AFE_SLUG) 
					);
					$row_class = 'inactive';
				}
				if($this->_afe_widget->is_widget_active($key)){
					$row_actions = apply_filters('afe_widget_row_actions', $row_actions, $key);
				}
				
				$row_metas = array();
				$version = (!empty($widget['data']['version'])) ? $widget['data']['version'] : false;
				if($version){
					$row_metas['version'] = sprintf('<span class="version">%s %s</span>', 
						__('Version', AFE_SLUG),
						$version
					);
				}
				$author_name = (!empty($widget['data']['author_name'])) ? $widget['data']['author_name'] : false;
				$author_url = (!empty($widget['data']['author_url'])) ? $widget['data']['author_url'] : false;
				if($author_name){
					if($author_url){
						$row_metas['author'] = sprintf('<span class="author">%s <a href="%s">%s</a></span>', 
							__('By', AFE_SLUG),
							$author_url, 
							$author_name
						);
					}else{
						$row_metas['author'] = sprintf('<span class="author">%s %s</span>', 
							__('By', AFE_SLUG),
							$author_name
						);
					}
				}
				$row_metas = apply_filters('afe_widget_row_metas', $row_metas, $key);
			?>
			<tr id="archivescode-for-elementor" class="<?php echo $row_class; ?>" data-slug="">
				<td class="plugin-title"><strong><?php echo $name; ?></strong>
				<div class="row-actions visible">
				<?php echo implode( " | ", $row_actions ); ?>
				</div>
				</td>
				<td class="column-description desc">
					<div class="plugin-description"><p><?php echo $description; ?></p></div>
					<div class="row-metas visible">
					<?php echo implode( " | ", $row_metas ); ?>
					</div>
				</td>
			</tr>
			<?php
			}
			?>
		</tbody>
		<tfoot>
		<tr>
			<th scope="col" class="manage-column column-name" style=""><?php _e('widget', AFE_SLUG); ?></th>
			<th scope="col" class="manage-column column-description" style=""><?php _e('Description', AFE_SLUG); ?></th>
		</tr>
		</tfoot>
	</table>
	</div>
</div>