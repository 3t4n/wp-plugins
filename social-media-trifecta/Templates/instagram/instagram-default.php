<div id="trifecta-instagram-main-wrapper" class="clearfix">
	<div class="center">
		<span class=" fa fa-instagram"></span>
		<span class="text-holder"> <?php echo __( 'Instagram', 'social-meida-trifecta' ) ?></span>
	</div>
	<div id="trifecta-instagram-holder-default" class="trifecta-instagram-holder-default ">
		<?php
		foreach ( $instagram_data->data as $data ) {
			?>
			<div class="tirfecta-instagram-item-wrapper">

				<?php
				$image_link     = $data->link;
				$image_standard = $data->images->standard_resolution;
				$img_url        = $image_standard->url;
				$total_likes    = $data->likes->count;
				$total_comment  = $data->comments->count;

				?>
				<img class="trefecta-instagram-image" src="<?php echo $img_url ?>"/>

				<div class="instagram-overlay">
					<ul class="instagram-count-like">
						<li>
							<span class="fa fa-heart"></span> <span
								class="instagram-comment-count "><?php echo $total_comment ?></span>
						</li>
						<li>
							<span class=" fa  fa-comment-o"></span> <span
								class="instagram-like-count "><?php echo $total_likes ?></span>
						</li>
					</ul>


				</div>
			</div>
			<?php
		}

		?>
	</div>
	<?php if ( $shortcode_elements[ 'show_scroll_bar' ] == 'false' ) { ?>
		<div id="instagram-scroll-holder">
			<a id="instagram-scroll-up" href="javascript:void(0) "><span class="fa fa-angle-up"> </span> </a>
			<a id="instagram-scroll-down" href="javascript:void(0) "><span class="fa fa-angle-down"> </span> </a>
		</div>
	<?php } ?>
</div>
