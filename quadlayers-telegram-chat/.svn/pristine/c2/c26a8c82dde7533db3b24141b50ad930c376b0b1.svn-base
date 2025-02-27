<div class="wrap about-wrap full-width-layout qlwrap">
	<form method="post" id="qltgm_display_form"> 
		<table class="form-table">
		<tbody>
			<tr>
			<th scope="row"><?php esc_html_e( 'Devices', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<select name="devices" style="width:350px" data-placeholder="<?php echo esc_html__( 'Choose target&hellip;', 'quadlayers-telegram-chat' ); ?>" aria-label="<?php echo esc_html__( 'Posts', 'quadlayers-telegram-chat' ); ?>" class="qltgm-select2">
				<option value="all" <?php selected( 'all', $display['devices'] ); ?>><?php esc_html_e( 'Show in all devices', 'quadlayers-telegram-chat' ); ?></option>
				<option value="mobile" <?php selected( 'mobile', $display['devices'] ); ?>><?php esc_html_e( 'Show in mobile devices', 'quadlayers-telegram-chat' ); ?></option>
				<option value="desktop" <?php selected( 'desktop', $display['devices'] ); ?>><?php esc_html_e( 'Show in desktop devices', 'quadlayers-telegram-chat' ); ?></option>
				<option value="hide" <?php selected( 'hide', $display['devices'] ); ?>><?php esc_html_e( 'Hide in all devices', 'quadlayers-telegram-chat' ); ?></option>
				</select>
			</td>
			</tr>
			<tr>
			<th scope="row"><?php esc_html_e( 'Target', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<select style="width:80px" name="target[include]" class="qltgm-select2"> 
				<option value="1" 
				<?php
				if ( isset( $display['target']['include'] ) && $display['target']['include'] === '1' ) {
	echo 'selected';}
				?>
					>Include</option>
				<option value="0" 
				<?php
				if ( isset( $display['target']['include'] ) && $display['target']['include'] === '0' ) {
	echo 'selected';}
				?>
					>Exclude</option>
				</select>  
				<?php
				$ids = array( '' );
				if ( isset( $display['target']['ids'] ) ) {
				$ids = (array) $display['target']['ids'];
				}
				?>
				<select multiple="multiple" name="target[ids][]" style="width:350px" data-placeholder="<?php echo esc_html__( 'Choose target&hellip;', 'quadlayers-telegram-chat' ); ?>" aria-label="<?php echo esc_html__( 'Posts', 'quadlayers-telegram-chat' ); ?>" class="qltgm-select2">
				<option value="all"   <?php echo selected( true, in_array( 'all', $ids ) ); ?>><?php echo esc_html__( 'All', 'quadlayers-telegram-chat' ); ?></option>
				<option value="home"   <?php echo selected( true, in_array( 'home', $ids ) ); ?>><?php echo esc_html__( 'Home', 'quadlayers-telegram-chat' ); ?></option>
				<option value="blog"   <?php echo selected( true, in_array( 'blog', $ids ) ); ?>><?php echo esc_html__( 'Blog', 'quadlayers-telegram-chat' ); ?></option>
				<option value="search" <?php echo selected( true, in_array( 'search', $ids ) ); ?>><?php echo esc_html__( 'Search', 'quadlayers-telegram-chat' ); ?></option>
				<option value="error"  <?php echo selected( true, in_array( 'error', $ids ) ); ?>><?php echo esc_html( '404' ); ?></option>
				</select>
				<p class="description hidden"><?php esc_html_e( 'If you select an option all the other will be excluded', 'quadlayers-telegram-chat' ); ?></p>
			</td>
			</tr>  
			<!--
			<?php

			foreach ( $post_types as $type ) {
				if ( ! isset( $display['entries'][ $type->name ] ) ) {
				$display['entries'][ $type->name ] = array();
				}
				if ( $count = wp_count_posts( $type->name ) ) {
					?>
				<tr class="qltgm-premium-field">
				<th scope="row"><?php esc_html_e( ucwords( $type->label ) ); ?></th>
				<td>
					<select style="width:80px"  name="entries[<?php echo esc_attr( $type->name ); ?>][include]" class="qltgm-select2"> 
					<option value="1" 
					<?php
					if ( isset( $display['entries'][ $type->name ]['include'] ) && $display['entries'][ $type->name ]['include'] === '1' ) {
	echo 'selected';}
					?>
						>Include</option>
					<option value="0" 
					<?php
					if ( isset( $display['entries'][ $type->name ]['include'] ) && $display['entries'][ $type->name ]['include'] === '0' ) {
	echo 'selected';}
					?>
						>Exclude</option>
					</select> 
					<select id="qltgm_select2_<?php echo esc_attr( $type->name ); ?>" multiple="multiple" name="entries[<?php echo esc_attr( $type->name ); ?>][ids][]" style="width:350px" data-placeholder="<?php printf( esc_html__( 'Select for %s&hellip;', 'quadlayers-telegram-chat' ), $type->label ); ?>" aria-label="<?php echo esc_attr( $type->label ); ?>"  data-name="<?php echo esc_attr( $type->name ); ?>" class="qltgm-select2-search">
					<option value="all" 
					<?php
					if ( isset( $display['entries'][ $type->name ]['ids'] ) ) {
	echo selected( true, in_array( 'all', (array) $display['entries'][ $type->name ]['ids'] ) );}
					?>
						><?php echo esc_html__( 'All', 'quadlayers-telegram-chat' ); ?></option>
					<?php
						// -------------------------------------------------------------
						// Print selected posts
					if ( isset( $display['entries'][ $type->name ]['ids'] ) && count( $display['entries'][ $type->name ]['ids'] ) ) {
						foreach ( $display['entries'][ $type->name ]['ids'] as $post_id ) {
							if ( ! $post = get_post( $post_id ) ) {
								// backward compatibility for $post->post_name
								$post = get_page_by_path( $post_id );
							}
							if ( isset( $post->ID ) ) {
								?>
															
							<option value="<?php echo esc_attr( $post->ID ); ?>" selected="selected"><?php echo esc_html( mb_substr( $post->post_title, 0, 49 ) ); ?></option>
								<?php
							}
						}
					}
					?>
					</select>
					<p class="description hidden"><small><?php esc_html_e( 'This is a premium feature', 'quadlayers-telegram-chat' ); ?></small></p>    
				</td>
				</tr>       
				<?php

				}
			}
			?>
			-->
			<?php
			foreach ( $taxonomies as $key => $taxonomy ) {
				if ( ! isset( $display['taxonomies'][ $key ] ) ) {
				$display['taxonomies'][ $key ] = array();
				}

			$terms = get_terms(
				array(
					'taxonomy'   => $key,
					'hide_empty' => false,
				)
			);

				if ( count( $terms ) ) {
					?>
				<tr>
				<th scope="row"><?php esc_html_e( ucwords( $taxonomy->label ) ); ?></th>
				<td>
					<select style="width:80px"  name="taxonomies[<?php echo esc_attr( $key ); ?>][include]" class="qltgm-select2">
					<option value="1" 
					<?php
					if ( isset( $display['taxonomies'][ $key ]['include'] ) && $display['taxonomies'][ $key ]['include'] === '1' ) {
	echo 'selected';}
					?>
						>Include</option>
					<option value="0" 
					<?php
					if ( isset( $display['taxonomies'][ $key ]['include'] ) && $display['taxonomies'][ $key ]['include'] === '0' ) {
	echo 'selected';}
					?>
						>Exclude</option>
					</select>  
					<?php
					$ids = array( '' );
					if ( isset( $display['taxonomies'][ $key ]['ids'] ) ) {
					$ids = (array) $display['taxonomies'][ $key ]['ids'];
					}
					?>
					
					<select multiple="multiple" name="taxonomies[<?php echo esc_attr( $key ); ?>][ids][]" style="width:350px" data-placeholder="<?php echo esc_html__( 'Choose target&hellip;', 'quadlayers-telegram-chat' ); ?>" aria-label="<?php echo esc_html__( $taxonomy->label ); ?>" class="qltgm-select2">
					<option value="all" <?php echo selected( true, in_array( 'all', $ids ) ); ?>><?php echo esc_html__( 'All', 'quadlayers-telegram-chat' ); ?></option>
					<?php
					foreach ( $terms as $term ) {
						?>
							
						<option value="<?php echo esc_html__( $term->term_id ); ?>" <?php echo selected( true, in_array( $term->term_id, $ids ) || in_array( $term->name, $ids ) ); ?>><?php echo esc_html( $term->name ); ?></option>
						<?php
					}
					?>
					</select>
				</td>
				</tr>       
				<?php
				}
			}
			?>
		</tbody>
		</table>  
		<?php wp_nonce_field( 'qltgm_save_display', 'qltgm_display_form_nonce' ); ?>  
		<p class="submit">
		<?php submit_button( esc_html__( 'Save', 'quadlayers-telegram-chat' ), 'primary', 'submit', false ); ?>
		<span class="settings-save-status">  
			<span class="saved"><?php esc_html_e( 'Saved successfully!' ); ?></span>
			<span class="spinner"></span>
		</span>
		</p>
	</form>
</div>
