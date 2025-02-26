<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$isSubscribe = $this->getModule()->getModel()->isSubscribe();
$isRating = $this->getModule()->getModel()->isRating();
if (!$isSubscribe || !$isRating) {
	?>
	<div class="row afsw-overview-block-row">
		<?php if (!$isSubscribe) { ?>
			<div class="col-sm-<?php echo $isRating ? 12 : 6; ?>">
				<div class="afsw-overview-block">
					<div class="afsw-overview-block-header">
						<div class="afsw-overview-header-title">
							<?php esc_html_e('Help improve WBW', 'advanced-fuzzy-search'); ?>
						</div>
						<div class="afsw-overview-header-desc">
							<?php esc_html_e('Stay up to date with news, life hacks, and new features from WBW. And also participate in surveys to improve plugins.', 'advanced-fuzzy-search'); ?>
						</div>
					</div>
					<div class="afsw-overview-block-body">
						<div class="afsw-overview-center">
							<input type="text" class="afsw-overview-input" name="afsw-email" value="" placeholder="<?php esc_html_e('Enter your email', 'advanced-fuzzy-search'); ?>">
							<button id="afswSubscribeSubmit" class="afsw-overview-button afsw-overview-submit button" href="https://woobewoo.com/" target="_blank">
								<?php esc_html_e('SUBSCRIBE', 'advanced-fuzzy-search'); ?>
							</button>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (!$isRating) { ?>
			<div class="col-sm-<?php echo $isSubscribe ? 12 : 6; ?>">
				<div class="afsw-overview-block">
					<div class="afsw-overview-block-header">
						<div class="afsw-overview-header-title">
							<?php esc_html_e('Rate the plugin', 'advanced-fuzzy-search'); ?>
						</div>
						<div class="afsw-overview-header-desc">
							<?php esc_html_e('Liked the plugin? Help us become even better by rating the plugin.', 'advanced-fuzzy-search'); ?>
						</div>
					</div>
					<div class="afsw-overview-block-body">
						<div class="afsw-overview-center afswLineStarsRating">
							<div class="afswStarsRatingLine active">
								<input type="radio" name="afswStarInput" class="afswStarInput" id="afswLineStar1" value="1">
								<input type="radio" name="afswStarInput" class="afswStarInput" id="afswLineStar2" value="2">
								<input type="radio" name="afswStarInput" class="afswStarInput" id="afswLineStar3" value="3">
								<input type="radio" name="afswStarInput" class="afswStarInput" id="afswLineStar4" value="4">
								<input type="radio" name="afswStarInput" class="afswStarInput" id="afswLineStar5" value="5">
								<label class="afswStarItem active" for="afswLineStar1"><svg class="afswRatingStar"><use xlink:href="#afswStar"></use></svg></label>
								<label class="afswStarItem active" for="afswLineStar2"><svg class="afswRatingStar"><use xlink:href="#afswStar"></use></svg></label>
								<label class="afswStarItem active" for="afswLineStar3"><svg class="afswRatingStar"><use xlink:href="#afswStar"></use></svg></label>
								<label class="afswStarItem active" for="afswLineStar4"><svg class="afswRatingStar"><use xlink:href="#afswStar"></use></svg></label>
								<label class="afswStarItem active" for="afswLineStar5"><svg class="afswRatingStar"><use xlink:href="#afswStar"></use></svg></label>
							</div>
						</div>
						<svg class="afswStarDefault" xmlns="http://www.w3.org/2000/svg">
							<symbol id="afswStar" viewBox="0 0 26 28">
								<path d="M26 10.109c0 .281-.203.547-.406.75l-5.672 5.531 1.344 7.812c.016.109.016.203.016.313 0 .406-.187.781-.641.781a1.27 1.27 0 0 1-.625-.187L13 21.422l-7.016 3.687c-.203.109-.406.187-.625.187-.453 0-.656-.375-.656-.781 0-.109.016-.203.031-.313l1.344-7.812L.39 10.859c-.187-.203-.391-.469-.391-.75 0-.469.484-.656.875-.719l7.844-1.141 3.516-7.109c.141-.297.406-.641.766-.641s.625.344.766.641l3.516 7.109 7.844 1.141c.375.063.875.25.875.719z"></path>
							</symbol>
						</svg>
						<div class="afsw-overview-rating afsw-overview-hidden">
							<div class="afsw-overview-body-text">
								<?php esc_html_e('Please help us improve our products and features. Describe what exactly you didn\'t like?', 'advanced-fuzzy-search'); ?>
							</div>
							<div class="afsw-overview-center">
								<input type="text" class="afsw-overview-input" name="afsw-email" value="" placeholder="<?php esc_html_e('Enter your email', 'advanced-fuzzy-search'); ?>">
								<input type="text" class="afsw-overview-input" name="afsw-problem" value="" placeholder="<?php esc_html_e('Describe ideas and problems', 'advanced-fuzzy-search'); ?>">
								<button id="afswRatingSubmit" class="afsw-overview-button afsw-overview-submit button" href="https://woobewoo.com/" target="_blank">
									<?php esc_html_e('SEND', 'advanced-fuzzy-search'); ?>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
<?php } ?>
