<?php

/**
 * Get Pro page
 *
 * Provides an admin area view for the plugin. This file is used to markup the admin-facing Get Pro page in the admin area.
 *
 * @link       https://codealtdel.com/
 * @since      1.0.0
 * @see        class Age_Okay_Admin method partials_age_okay_getpro
 *
 * @package    Age_Okay
 * @subpackage Age_Okay/admin/partials
 */

?>
<div class="wrap">
	<h2></h2>
	<div id='age_okay_wrap'>
		<h1 class="wp-heading-inline">Age Okay - <?php _e( 'Get PRO', 'age-okay' ); ?></h1>
		<div id='age_okay_docs_container'>
			<section id='age_okay_pro_table'>
				<ul>
					<li class='age_okay_pro_active'>
						<button><?php _e( 'FREE', 'age-okay' ); ?></button>
					</li>
					<li>
						<button><?php _e( 'PRO', 'age-okay' ); ?></button>
					</li>
				</ul>
				<table>
					<thead>
						<tr>
							<th class="age_okay_pro_hide"></th>
							<th class="age_okay_pro_txtb"><?php _e( 'FREE', 'age-okay' ); ?></th>
							<th class="age_okay_pro_txtb"><?php _e( 'PRO', 'age-okay' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php _e( 'One-off cost', 'age-okay' ); ?></td>
							<td class='age_okay_pro_default'><span class="age_okay_pro_txt"><?php _e( 'N/A', 'age-okay' ); ?></span></td>
							<td><span class="age_okay_pro_txt">£10</span></td>
						</tr>
						<tr>
							<td><?php _e( 'Automatic updates (unlike many paid plugins)', 'age-okay' ); ?></td>
							<td class='age_okay_pro_default'><span class="age_okay_pro_tick">&#10004;</span></td>
							<td><span class="age_okay_pro_tick">&#10004;</span></td>
						</tr>
						<tr>
							<td><?php _e( '5 background styles and container styling', 'age-okay' ); ?></td>
							<td class='age_okay_pro_default'><span class="age_okay_pro_tick">&#10004;</span></td>
							<td><span class="age_okay_pro_tick">&#10004;</span></td>
						</tr>
						<tr>
							<td><?php _e( '3 verification types', 'age-okay' ); ?></td>
							<td class='age_okay_pro_default'><span class="age_okay_pro_tick">&#10004;</span></td>
							<td><span class="age_okay_pro_tick">&#10004;</span></td>
						</tr>
						<tr>
							<td><?php _e( 'Live preview', 'age-okay' ); ?></td>
							<td class='age_okay_pro_default'><span class="age_okay_pro_tick">&#10004;</span></td>
							<td><span class="age_okay_pro_tick">&#10004;</span></td>
						</tr>
						<tr>
							<td><?php _e( 'Customisable exit button', 'age-okay' ); ?></td>
							<td class='age_okay_pro_default'><span class="age_okay_pro_tick">&#10004;</span></td>
							<td><span class="age_okay_pro_tick">&#10004;</span></td>
						</tr>
						<tr>
							<td><?php _e( 'SEO friendly', 'age-okay' ); ?></td>
							<td class='age_okay_pro_default'><span class="age_okay_pro_tick">&#10004;</span></td>
							<td><span class="age_okay_pro_tick">&#10004;</span></td>
						</tr>
						<tr>
							<td><?php _e( '3 load types', 'age-okay' ); ?></td>
							<td class='age_okay_pro_default'><?php _e( 'Cache only', 'age-okay' ); ?></td>
							<td><span class="age_okay_pro_tick">&#10004;</span></td>
						</tr>
						<tr>
							<td><?php _e( 'Multilingual verification screen', 'age-okay' ); ?></td>
							<td class='age_okay_pro_default'></td>
							<td><span class="age_okay_pro_tick">&#10004;</span></td>
						</tr>
						<tr>
							<td><?php _e( 'Shortcode to set specific pages to display or hide verification screen', 'age-okay' ); ?></td>
							<td class='age_okay_pro_default'></td>
							<td><span class="age_okay_pro_tick">&#10004;</span></td>
						</tr>
						<tr>
							<td><?php _e( 'Filter for developers to overwrite display settings', 'age-okay' ); ?></td>
							<td class='age_okay_pro_default'></td>
							<td><span class="age_okay_pro_tick">&#10004;</span></td>
						</tr>
						<tr>
							<td><?php _e( 'Settings to display on or hide on specific IDs and URLs', 'age-okay' ); ?></td>
							<td class='age_okay_pro_default'></td>
							<td><span class="age_okay_pro_tick">&#10004;</span></td>
						</tr>
						<tr>
							<td><?php _e( 'Future PRO features', 'age-okay' ); ?></td>
							<td class='age_okay_pro_default'></td>
							<td><span class="age_okay_pro_tick">&#10004;</span></td>
						</tr>
					</tbody>
				</table>
			</section>
			<a href='https://codealtdel.com/demo/wp-login.php?autologin=1' style='display: inline-block; padding: 20px 60px; color: black; background: #e4e4e4; border-radius: 50px; font-weight: bold; text-decoration: none; margin-right: 20px; margin-bottom: 20px;'><?php _e( 'Preview PRO Admin', 'age-okay' ); ?></a>
			<a href='https://codealtdel.com/' style='display: inline-block; padding: 20px 60px; color: white; background: #0e7bc1; border-radius: 50px; font-weight: bold; text-decoration: none; margin-right: 20px;'><?php _e( 'Purchase PRO Plugin', 'age-okay' ); ?></a>
			<span style='display: inline-block;'><?php echo sprintf( __( 'or you can <a href="%s">donate</a>', 'age-okay' ), esc_url( 'https://paypal.me/codealtdel' ) );?></span>
		</div>
	</div>
</div>
