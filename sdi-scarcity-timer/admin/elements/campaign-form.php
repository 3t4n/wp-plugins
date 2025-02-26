<div class="fieldset">
<form method="post" action="" name="new-campaign">
		<?php if (!empty($campaign['id'])) : ?>
			<input type="hidden" name="id" value="<?php echo $campaign['id']; ?>">
		<?php endif; ?>
		<table class="wp-list-table widefat striped">
			<tr>
				<td><label>Campaign Name </label></td>
				<td><input type="text" name="name" required class="regular-text" value="<?php echo !empty($campaign['name']) ? $campaign['name'] : ''; ?>"></td>
			</tr>
			<tr>
				<td><label>Start date </label></td>
				<td><input type="date" name="start_datetime" required class="regular-text"  value="<?php echo !empty($campaign['start_datetime']) ? date('Y-m-d', strtotime($campaign['start_datetime'])) : ''; ?>"></td>
			</tr>
			<tr>
				<td><label>End date </label></td>
				<td><input type="date" name="end_datetime" class="regular-text"  value="<?php echo !empty($campaign['end_datetime']) ? date('Y-m-d', strtotime($campaign['end_datetime'])) : ''; ?>"></td>
			</tr>
			<tr>
				<td>Headline</td>
				<td>
					<input type="text" name="headline" class="regular-text" value="<?php echo !empty($campaign['headline']) ? $campaign['headline'] : ''; ?>">
					<span>use <b>{products}</b> for e.g <em>Hurry! 2 items left.</em></span>
				</td>
			</tr>
			<tr>
				<td>Headline Placement</td>
				<td>
					<ul>
						<li><input type="radio" name="headline_placement" value="top"  <?php echo (!empty($campaign['headline_placement']) && $campaign['headline_placement'] == "top") ? 'checked' : '' ?>> Top</li>
						<li><input type="radio" name="headline_placement" value="left"  <?php echo (!empty($campaign['headline_placement']) && $campaign['headline_placement'] == "left") ? 'checked' : '' ?>> Left</li>
						<li><input type="radio" name="headline_placement" value="right"  <?php echo (!empty($campaign['headline_placement']) && $campaign['headline_placement'] == "right") ? 'checked' : '' ?>> Right</li>
						<li><input type="radio" name="headline_placement" value="bottom"  <?php echo (!empty($campaign['headline_placement']) && $campaign['headline_placement'] == "bottom") ? 'checked' : '' ?>> Bottom</li>
					</ul> 
					<small>Default to <strong>Top</strong> if not set.</small>
				</td>
			</tr>
			<tr>
				<td>Choose display</td>
				<td>
					<ul>
						<li>
							<input type="radio" name="display" value="plain" <?php echo (!empty($campaign['display']) && $campaign['display'] == "plain") ? 'checked' : '' ?>> <strong>Plain</strong><br>
							<?php /*<a  data-fancybox="images" href="<?php echo SDI_PLUGIN_URL . '/admin/img/plain.png'; ?>">
								<img src="<?php echo SDI_PLUGIN_URL . '/admin/img/plain.png'; ?>" width="200">
							</a>*/ ?>
						</li>
						<li>
							<input type="radio" name="display" value="military" <?php echo (!empty($campaign['display']) && $campaign['display'] == "military") ? 'checked' : '' ?>> <strong>Military</strong><br>
							<?php /*<a  data-fancybox="images" href="<?php echo SDI_PLUGIN_URL . '/admin/img/military.png'; ?>">
								<img src="<?php echo SDI_PLUGIN_URL . '/admin/img/military.png'; ?>" width="200">
							</a>*/ ?>
						</li>
						<li>
							<input type="radio" name="display" value="sports"  <?php echo (!empty($campaign['display']) && $campaign['display'] == "sports") ? 'checked' : '' ?>> <strong>Sports</strong><br>
							<?php /*<a  data-fancybox="images" href="<?php echo SDI_PLUGIN_URL . '/admin/img/sports.png'; ?>">
								<img src="<?php echo SDI_PLUGIN_URL . '/admin/img/sports.png'; ?>" width="200">
							</a>*/ ?>
						</li>
						<li>
							<input type="radio" name="display" value="ultimate"  <?php echo (!empty($campaign['display']) && $campaign['display'] == "ultimate") ? 'checked' : '' ?>> <strong>Ultimate</strong><br>
							<?php /*<a  data-fancybox="images" href="<?php echo SDI_PLUGIN_URL . '/admin/img/ultimate.png'; ?>">
								<img src="<?php echo SDI_PLUGIN_URL . '/admin/img/ultimate.png'; ?>" width="200">
							</a>*/ ?>
						</li>
					</ul>
				</td>
			</tr>
			<tr>
				<td>Redirect URL <small>(Optional)</small></td>
				<td>
					<input type="text" name="redirect" required class="regular-text" value="<?php echo !empty($campaign['redirect']) ? $campaign['redirect'] : ''; ?>"><br>
					<small>Set where you want to redirect your visitors upon clicking the timer.</small>
				</td>
			</tr>
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
				<tr>
					<td colspan="2"><strong>WooCommerce Product Integration</strong></td>
				</tr>
				<tr>
					<td>Choose Product</td>
					<td>
						<select name="product_id" class="regular-text">
							<option value="">None</option>
							<?php
							 $args = array(
						        'post_type'      => 'product',
						        'posts_per_page' => -1
						    );

						    $loop = new WP_Query( $args );

						    while ( $loop->have_posts() ) : $loop->the_post();
						        global $product;
						        echo '<option value="'.get_the_ID().'" '.((!empty($campaign['product_id']) && $campaign['product_id'] == get_the_ID())?'selected':'').'>' .get_the_title().'</option>';
						    endwhile;

						    wp_reset_query();
							?>
						</select>
						<br>
						<small>Example: Hurry! There are only 26 items left!</small>
					</td>
				</tr>
			<?php endif ?>
			<tr>
				<td></td>
				<td>
					<br><br>
					<button type="submit" name="submit" class="button action button-primary">Save Campaign</button>
					<br><br>
				</td>
			</tr>
		</table>
	</form>
</div>