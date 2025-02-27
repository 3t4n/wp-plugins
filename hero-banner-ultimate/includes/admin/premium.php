<?php
/**
 * Plugin Premium Offer Page
 *
 * @package Hero Banner Ultimate
 * @since 1.1.2
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="wrap">

	<h2 style="text-align: center;"><?php esc_html_e( 'Hero Banner Ultimate Features', 'hero-banner-ultimate' ); ?></h2><br />

	<style>
		.wpos-plugin-pricing-table thead th h2{font-weight: 400; font-size: 2.4em; line-height:normal; margin:0px; color: #2ECC71;}
		.wpos-plugin-pricing-table thead th h2 + p{font-size: 1.25em; line-height: 1.4; color: #999; margin:5px 0 5px 0;}

		table.wpos-plugin-pricing-table{width:100%; text-align: left; border-spacing: 0; border-collapse: collapse; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}

		.wpos-plugin-pricing-table th, .wpos-plugin-pricing-table td{font-size:14px; line-height:normal; color:#444; vertical-align:middle; padding:12px;}

		.wpos-plugin-pricing-table colgroup:nth-child(1) { width: 31%; border: 0 none; }
		.wpos-plugin-pricing-table colgroup:nth-child(2) { width: 22%; border: 1px solid #ccc; }
		.wpos-plugin-pricing-table colgroup:nth-child(3) { width: 25%; border: 10px solid #2ECC71; }

		/* Tablehead */
		.wpos-plugin-pricing-table thead th {background-color: #fff; background:linear-gradient(to bottom, #ffffff 0%, #ffffff 100%); text-align: center; position: relative; border-bottom: 1px solid #ccc; padding: 1em 0 1em; font-weight:400; color:#999;}
		.wpos-plugin-pricing-table thead th:nth-child(1) {background: transparent;}
		.wpos-plugin-pricing-table thead th:nth-child(3) p{color:#000;}

		/* welcome-screen-css start -M */
		.hbu-sf-btn{display: inline-block; font-size: 18px; padding: 10px 25px; border-radius: 100px;  background-color: #ff5d52; border-color: #ff5d52; color: #fff !important; font-weight: 600; text-decoration: none;}
		.hbu-sf-btn:hover,
		.hbu-sf-btn:focus{background-color: #ff5d52; border-color: #ff5d52;}
		.hbu-inner-Bonus-class{background: #46b450;
		  border-radius: 20px;
		  font-weight: 700;
		  padding: 5px 10px;
		  color: #fff;
		    line-height: 1;
		  font-size: 12px;}

		.hbu-black-friday-feature{padding: 30px 40px;
		  background: #fafafa;
		  border-radius: 20px 20px 0 0;
		  gap: 60px;
		  align-items: center;
		  flex-direction: row;
		  display: flex;}
		.hbu-black-friday-feature .hbu-inner-deal-class{flex-direction: column;
		  gap: 15px;
		  display: flex;
		  align-items: flex-start;}
		.hbu-black-friday-feature ul li{text-align: left;}
		.hbu-black-friday-feature .hbu-inner-list-class {
		  display: grid;
		  grid-template-columns: repeat(4,1fr);
		  gap: 10px;
		}
		.hbu-black-friday-feature .hbu-list-img-class {
		  min-height: 95px;
		  display: flex;
		  align-items: center;
		  background: #fff;
		  border-radius: 20px;
		  flex-direction: column;
		  gap: 10px;
		  justify-content: center;
		  padding: 10px;color: #000;
		  font-size: 12px;
		}
		.hbu-black-friday-banner-wrp .hbu-list-img-class img {
		  width: 100%;
		  flex: 0 0 40px;
		  font-size: 20px;
		  height: 40px;
		  width: 40px;
		  box-shadow: inset 0px 0px 15px 2px #c4f2ac;
		  border-radius: 14px;
		  display: flex;
		  justify-content: center;
		  align-items: center;
		  padding: 10px;
		}

		.hbu-main-feature-item{background: #fafafa;
		  padding: 20px 15px 40px;
		  border-radius: 0 0 20px 20px;margin-bottom: 40px;}
		.hbu-inner-feature-item{display: flex;
		  gap: 30px;
		  padding: 0 15px;}
		.hbu-list-feature-item {
		  border: 1px solid #ddd;
		  padding: 10px 15px;
		  border-radius: 8px;text-align: left;
		}
		.hbu-list-feature-item img {
		  width: 36px !important;
		  padding: 5px;
		  border: 1px solid #ccc;
		  border-radius: 50%;margin-bottom: 5px;
		}
		.hbu-list-feature-item h5{margin: 0;
		  font-weight: bold;font-size: 16px;
		  text-decoration: underline;
		  text-underline-position: under;
		  color: #000;}
		.hbu-list-feature-item p {
		  color: #505050;
		  font-size: 12px;
		  margin-bottom: 0;
		}

		/* welcome-screen-css end -M */

		/* Tablebody */
		.wpos-plugin-pricing-table tbody th{background: #fff; border-left: 1px solid #ccc; font-weight: 600;}
		.wpos-plugin-pricing-table tbody th span{font-weight: normal; font-size: 87.5%; color: #999; display: block;}

		.wpos-plugin-pricing-table tbody td{background: #fff; text-align: center;}
		.wpos-plugin-pricing-table tbody td .dashicons{height: auto; width: auto; font-size:30px;}
		.wpos-plugin-pricing-table tbody td .dashicons-no-alt{color: #ff2700;}
		.wpos-plugin-pricing-table tbody td .dashicons-yes{color: #2ECC71;}

		.wpos-plugin-pricing-table tbody tr:nth-child(even) th,
		.wpos-plugin-pricing-table tbody tr:nth-child(even) td { background: #f5f5f5; border: 1px solid #ccc; border-width: 1px 0 1px 1px; }
		.wpos-plugin-pricing-table tbody tr:last-child td {border-bottom: 0 none;}

		/* Table Footer */
		.wpos-plugin-pricing-table tfoot th, .wpos-plugin-pricing-table tfoot td{text-align: center; border-top: 1px solid #ccc;}
		.wpos-plugin-pricing-table tfoot a, .wpos-plugin-pricing-table thead a{font-weight: 600; color: #fff; text-decoration: none; text-transform: uppercase; display: inline-block; padding: 1em 2em; background: #ff2700; border-radius: .2em;}

		.wpos-epb{color:#ff2700 !important;}
	</style>

	<!-- <div class="hbu-black-friday-banner-wrp">
		<a href="<?php // echo esc_url( HBU_PLUGIN_LINK_UPGRADE ); ?>" target="_blank"><img style="width: 100%;" src="<?php // echo esc_url( HBU_URL ); ?>assets/images/black-friday-banner.png" alt="black-friday-banner" /></a>
	</div> -->

	<div class="hbu-black-friday-banner-wrp" style="background:#e1ecc8;padding: 20px 20px 40px; border-radius:5px; text-align:center;margin-bottom: 40px;">
		<h2 style="font-size:30px; margin-bottom:10px;"><span style="color:#0055fb;">Hero Banner Ultimate</span> is included in <span style="color:#0055fb;">Essential Plugin Bundle</span> </h2> 
		<h4 style="font-size: 18px;margin-top: 0px;color: #ff5d52;margin-bottom: 24px;">Now get Designs, Optimization, Security, Backup, Migration Solutions @ one stop. </h4>

		<div class="hbu-black-friday-feature">

			<div class="hbu-inner-deal-class" style="width:40%;">
				<div class="hbu-inner-Bonus-class">Bonus</div>
				<div class="hbu-image-logo" style="font-weight: bold;font-size: 26px;color: #222;"><img style="width: 34px; height:34px;vertical-align: middle;margin-right: 5px;" class="hbu-img-logo" src="<?php echo esc_url( HBU_URL ); ?>assets/images/essential-logo-small.png" alt="essential-logo" /><span class="hbu-esstial-name" style="color:#0055fb;">Essential </span>Plugin</div>
				<div class="hbu-sub-heading" style="font-size: 16px;text-align: left;font-weight: bold;color: #222;margin-bottom: 10px;">Includes All premium plugins at no extra cost.</div>
				<a class="hbu-sf-btn" href="<?php echo esc_url( HBU_PLUGIN_LINK_UPGRADE ); ?>" target="_blank">Grab The Deal</a>
			</div>

			<div class="hbu-main-list-class" style="width:60%;">
				<div class="hbu-inner-list-class">
					<div class="hbu-list-img-class"><img src="<?php echo esc_url( HBU_URL ); ?>assets/images/logo-image/img-slider.png" alt="essential-logo" /> Image Slider</li></div>

					<div class="hbu-list-img-class"><img src="<?php echo esc_url( HBU_URL ); ?>assets/images/logo-image/advertising.png" alt="essential-logo" /> Publication</li></div>

					<div class="hbu-list-img-class"><img src="<?php echo esc_url( HBU_URL ); ?>assets/images/logo-image/marketing.png" alt="essential-logo" /> Marketing</li></div>

					<div class="hbu-list-img-class"><img src="<?php echo esc_url( HBU_URL ); ?>assets/images/logo-image/photo-album.png" alt="essential-logo" /> Photo album</li></div>

					<div class="hbu-list-img-class"><img src="<?php echo esc_url( HBU_URL ); ?>assets/images/logo-image/showcase.png" alt="essential-logo" /> Showcase</li></div>

					<div class="hbu-list-img-class"><img src="<?php echo esc_url( HBU_URL ); ?>assets/images/logo-image/shopping-bag.png" alt="essential-logo" /> WooCommerce</li></div>

					<div class="hbu-list-img-class"><img src="<?php echo esc_url( HBU_URL ); ?>assets/images/logo-image/performance.png" alt="essential-logo" /> Performance</li></div>

					<div class="hbu-list-img-class"><img src="<?php echo esc_url( HBU_URL ); ?>assets/images/logo-image/security.png" alt="essential-logo" /> Security</li></div>

					<div class="hbu-list-img-class"><img src="<?php echo esc_url( HBU_URL ); ?>assets/images/logo-image/forms.png" alt="essential-logo" /> Pro Forms</li></div>

					<div class="hbu-list-img-class"><img src="<?php echo esc_url( HBU_URL ); ?>assets/images/logo-image/seo.png" alt="essential-logo" /> SEO</li></div>

					<div class="hbu-list-img-class"><img src="<?php echo esc_url( HBU_URL ); ?>assets/images/logo-image/backup.png" alt="essential-logo" /> Backups</li></div>

					<div class="hbu-list-img-class"><img src="<?php echo esc_url( HBU_URL ); ?>assets/images/logo-image/White-labeling.png" alt="essential-logo" /> Migration</li></div>
				</div>
			</div>
		</div>
		<div class="hbu-main-feature-item">
			<div class="hbu-inner-feature-item">
				<div class="hbu-list-feature-item">
					<img src="<?php echo esc_url( HBU_URL ); ?>assets/images/logo-image/layers.png" alt="layer" />
					<h5>Site management</h5>
					<p>Manage, update, secure & optimize unlimited sites.</p>
				</div>
				<div class="hbu-list-feature-item">
					<img src="<?php echo esc_url( HBU_URL ); ?>assets/images/logo-image/risk.png" alt="backup" />
					<h5>Backup storage</h5>
					<p>Secure sites with auto backups and easy restore.</p>
				</div>
				<div class="hbu-list-feature-item">
					<img src="<?php echo esc_url( HBU_URL ); ?>assets/images/logo-image/support.png" alt="support" />
					<h5>Support</h5>
					<p>Get answers on everything WordPress at anytime.</p>
				</div>
			</div>
		</div>
		<a class="hbu-sf-btn" href="<?php echo esc_url( HBU_PLUGIN_LINK_UPGRADE ); ?>" target="_blank">Grab The Deal</a>
	</div>


	<div id="poststuff">
		<div id="post-body" class="metabox-holder">
			<div id="post-body-content">
				<table class="wpos-plugin-pricing-table">
					<colgroup></colgroup>
					<colgroup></colgroup>
					<colgroup></colgroup>
						<thead>
						<tr>
							<th></th>
							<th>
								<h2>Free</h2>
							</th>
							<th>
								<h2 class="wpos-epb">Premium</h2>
								<p>Gain access to <strong>Hero Banner Ultimate</strong> </p>

								<a href="<?php echo esc_url(HBU_PLUGIN_LINK_UPGRADE); ?>" target="_blank">Upgrade To PRO</a>
							</th>
						</tr>
					</thead>

					<tfoot>
						<tr>
							<th></th>
							<td></td>
							<td><p>Gain access to <strong>Hero Banner Ultimate</strong> </p>
							<a href="<?php echo esc_url(HBU_PLUGIN_LINK_UPGRADE); ?>" target="_blank">Upgrade To PRO</a></td>
						</tr>
					</tfoot>
					<tbody>
						<tr>
							<th>Layout  <span class="subtext">Select Layout and make website better.</span></th>
							<td>4 </td>
							<td>10</td>
						</tr>
						<tr>
							<th>Banner Type<span>You can set Banner Type.</span></th>
							<td><i class="dashicons dashicons-yes"></i></td>
							<td><i class="dashicons dashicons-yes"></i></td>
						</tr>
						<tr>
							<th>Background Color & Image <span>You can set background color and image for slider.</span></th>
							<td><i class="dashicons dashicons-yes"></i></td>
							<td><i class="dashicons dashicons-yes"></i></td>
						</tr>
						<tr>
							<th>Background Video and Poster <span>You can upload video background in slider.</span></th>
							<td><i class="dashicons dashicons-yes"></i></td>
							<td><i class="dashicons dashicons-yes"></i></td>
						</tr>
						<tr>
							<th>Banner Width, Font Size  <span>Set Slider banner width and font size.</span></th>
							<td><i class="dashicons dashicons-yes"></i></td>
							<td><i class="dashicons dashicons-yes"></i></td>
						</tr>
						
						<tr>
							<th>Uppercase Title and Sub-Title  <span class="subtext">Make Title and Sub-Title Uppercase or not.</span></th>
							<td><i class="dashicons dashicons-no-alt"> </i></td>
							<td><i class="dashicons dashicons-yes"> </i></td>
						</tr>
						<tr>
							<th>Banner Title & Content Color  <span>Set Banner Title and Content color.</span></th>
							<td><i class="dashicons dashicons-yes"></i></td>
							<td><i class="dashicons dashicons-yes"></i></td>
						</tr>
						<tr>
							<th>Call to Action Button  <span>Set call to action button link and class. </span></th>
							<td><i class="dashicons dashicons-yes"></i></td>
							<td><i class="dashicons dashicons-yes"></i></td>
						</tr>
						<tr>
							<th>Mobile Responsive Settings   <span class="subtext">You can set font size and set image size for mobile.</span></th>
							<td><i class="dashicons dashicons-no-alt"> </i></td>
							<td><i class="dashicons dashicons-yes"> </i></td>
						</tr>
						<tr>
							<th>Automatic Update <span>Get automatic  plugin updates </span></th>
							<td>Lifetime</td>
							<td>Lifetime</td>
						</tr>
						<tr>
						<th>Support <span class="subtext">Get support for plugin</span></th>
						<td>Limited</td>
						<td>1 Year</td>
						</tr>
						</tbody>
				</table>
			</div>
		</div>
	</div>
</div>