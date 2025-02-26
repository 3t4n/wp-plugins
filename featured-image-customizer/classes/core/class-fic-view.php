<?php

namespace FIC\Featured_Image_Customizer;

! defined( ABSPATH ) || exit;

if ( ! class_exists( 'FIC_View' ) ) {

	class FIC_View extends Featured_Image_Customizer {
		public function __construct() {
			parent::__construct();
		}

		public function load_featured_image_customizer_modal() {
			global $post;
			?>
				<div class="fic">
					<div class="fic-modal" tabindex="-1" role="dialog">
						<div class="fic-modal-dialog" role="document">
							<div class="fic-modal-content">
								<div class="fic-modal-header">
									<h5 class="fic-modal-title">Featured Image Customizer</h5>
									<a href="#" class="close fic-close-modal-window" title="Close Featured Image Customizer...">
										<i class="dashicons dashicons-no-alt"></i>
									</a>
								</div>
								<div class="fic-modal-body">
									<div class="fic-notice-container"></div>
									<form method="post" action="" id="featured-image-customizer">
										<input type="hidden" name="post_id" value="<?php echo esc_attr( $post->ID ); ?>" />
										<p>
											<label for="logo_a">
												<span>Logo 1</span>
												<span><input list="brand-logos" type="text" name="logo_a" value="" placeholder="html-5" /></span>
											</label>
										</p>
										<p>
											<label for="conjunction">
												<span>Conjunction <br /><small>(html entities are accpeted, e.g. &amp;rarr;)</small></span>
												<span><input type="text" name="conjunction" value="" placeholder="&rarr;" /></span>
											</label>
										</p>
										<p>
											<label for="logo_b">
												<span>Logo 2</span>
												<span><input list="brand-logos" type="text" name="logo_b" value="" placeholder="css-3" /></span>
											</label>
										</p>
										<p>
											<label for="bgcolor">
												<span>Background Color</span>
												<span><input type="color" value="#ffffff" name="bgcolor" /></span>
											</label>
										</p>
										<p>
											<a href="#" class="fic-advanced-options-toggle" title="See advanced options...">
												<i class="dashicons dashicons-arrow-right"></i>
												Advanced Options...
											</a>
										</p>
										<div class="fic-advanced-options" id="fic-advanced-options">
											<small>Currently, all advanced options are predefined and cannot be modified, once we get out of alpha we will enable and implement all of them.</small>
											<p>
												<label for="source">
													<span>Source (fic.developry.com)</span>
													<span>
														<input type="radio" name="source" checked /> Logos<br />
														<input type="radio" name="source" disabled /> Socials<br />
														<input type="radio" name="source" disabled /> Logos<br />
														<input type="radio" name="source" disabled /> Software Development
													</span>
												</label>
											</p>
											<p>
												<label for="filename">
													<span>File Name</span>
													<span>
														<input type="text" name="filename" value="<?php echo esc_attr( $post->post_name ) . '-featured-image_' . bin2hex( random_bytes( 10 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" readonly />
														<input type="submit" class="button button-primary" value="Edit..." disabled />
													</span>
												</label>
											</p>
											<p>
												<label for="canvas-width">
													<span>Canvas (dimentions)</span>
													<spam>
														<input type="text" size="2" value="800" placeholder="width" name="canvas-width" disabled /> x <input type="text"  size="2" value="600" placeholder="height" name="canvas-height" disabled />&nbsp;px
													</span>
												</label>
											</p>
											<p>
												<label for="logo-size">
													<span>Logo Size</span>
													<span>
														<input type="checkbox" name="logo-size" value="150x150" checked /> 150x150<br />
														<input type="checkbox" name="logo-size" value="300x300" disabled /> 300x300<br />
														<input type="checkbox" name="logo-size" value="768x768" disabled /> 768x768<br />
														<input type="checkbox" name="logo-size" value="1024x1024" disabled /> 1024x1024<br />
														<input type="text" size="2" value="" placeholder="width" name="logo-size-custom-width" disabled /> x <input type="text"  size="2" value="" placeholder="height" name="logo-size-custom-height" disabled /> (custom)
													</span>
												</label>
											</p>
											<p>
												<label for="font-family">
													<span>Font Family (conjunction)</span>
													<span>
														<select name="font-family" disabled>
															<option>Fira Code</option>
														</select>
													</span>
												</label>
											</p>
											<p>
												<label for="font-size">
													<span>Font Size (conjunction)</span>
													<span><input  type="text" size="2" name="" value="64" name="font-size" disabled />&nbsp;px</span>
												</label>
											</p>
										</div>
										<div class="fic-preview" id="fic-preview">
											<button type="submit" name="preview-featured-image" class="button button-primary">
												<i class="dashicons dashicons-welcome-view-site"></i>
												Preview featured image
											</button>
										</div>
										<p>
											<button type="submit" name="create-featured-image" class="button button-primary" disabled>
												<i class="dashicons dashicons-yes-alt"></i>
												Set featured image
											</button>
										</p>
									</form>

									<datalist id="brand-logos">
										<?php $this->load_brand_logos(); ?>
									</datalist>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
		}

		private function load_brand_logos() {
			foreach ( json_decode( FIC12_BRAND_LOGOS ) as $logo ) {
				?>
					<option value="<?php echo esc_attr( $logo ); ?>">
				<?php
			}
		}
	}
}
