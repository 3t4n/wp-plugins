<?php
	use \TyresAddict\TyreFilter\Plugin;
?>

<div class="taw-filter">
	<form method="get" action="<?=esc_attr( $form_url ) ?>">

	<div class="section section-top">
		<div class="title"><?=__('Tyre Size', Plugin::lang) ?></div>
	
		<select class="elem" name="width">
			<option value=""><?=__('Width', Plugin::lang) ?></option>
			<?php foreach ( $tyre_width as $width ) : ?>
				<option <?php selected( $width, $r_width ); ?>
					value="<?=esc_attr( $width ); ?>">
					<?php echo esc_html( $width ); ?></option>
			<?php endforeach ?>
		</select>

		<select class="elem" name="profile" class="dynamic" data-group="by-size">
			<option value=""><?=__('Profile', Plugin::lang) ?></option>
			<?php foreach ( $tyre_profile as $profile ) : ?>
				<option <?php selected( $profile, $r_profile ) ?>
					value="<?php echo esc_attr( $profile ); ?>">
					<?php echo esc_html( $profile ); ?></option>
			<?php endforeach ?>
		</select>

		<select class="elem" name="r" class="dynamic" data-group="by-size">
			<option value=""><?=__('Diameter', Plugin::lang) ?></option>
			<?php foreach ( $tyre_r as $r ) : ?>
				<option <?php selected( $r, $r_r ); ?>
					value="<?php echo esc_attr( $r ); ?>">
					R<?php echo esc_html( $r ); ?></option>
			<?php endforeach ?>
		</select>
	</div>

	<div class="section">
		<div class="title"><?=__('Season', Plugin::lang) ?></div>

		<div class="elem">
			<input class="js-season js-season-all" id="tw-season-all" 
						data-season_id="all"
						autocomplete="off" type="checkbox" 
						<?php checked( 'all', $r_season ); ?>
						name="season[]" value="all">
			<label for="tw-season-all"><?=__( 'All', Plugin::lang ); ?></label>
		</div>
		<?php foreach ( $seasons as $season_id => $season ) : ?>
			<div class="elem">
				<input class="js-season js-season-<?=esc_attr( $season_id ); ?>" id="tw-season-<?=esc_attr( $season_id ); ?>" 
											data-season_id="<?=esc_attr( $season_id ); ?>"
											autocomplete="off" type="checkbox" 
											<?php checked( $season_id, $r_season ); ?>
											name="season[]" value="<?=esc_attr( $season_id ); ?>">
				<label for="tw-season-<?=esc_attr( $season_id ); ?>">
					<?=esc_html( $season ); ?>
				</label>
			</div>
		<?php endforeach ?>
	</div>

	<div class="section">
		<div class="title"><?=__('Car Type', Plugin::lang) ?></div>

		<div class="elem">
			<input class="js-car-type js-car-type-all" id="tw-car-type-all" autocomplete="off" type="checkbox" 
						<?php checked( 'all', $r_car_type ); ?>
						name="car_type[]" value="all">
			<label for="tw-car-type-all"><?=__( 'All', Plugin::lang ); ?></label>
		</div>
		<?php foreach ( $car_types as $car_type ) : ?>
			<div class="elem">
				<input class="js-car-type" id="tw-car-type-<?=esc_attr( $car_type ); ?>" 
											autocomplete="off" type="checkbox" 
											<?php checked( $car_type, $r_car_type ); ?>
											name="car_type[]" value="<?=esc_attr( $car_type ); ?>">
				<label for="tw-car-type-<?=esc_attr( $car_type ); ?>">
					<?=esc_html( __( $car_type, Plugin::lang ) ); ?>
				</label>
			</div>
		<?php endforeach ?>
	</div>

	<div class="section">
		<div class="title"><?=__('Tyre Brand', Plugin::lang) ?></div>

		<div class="taw-brand-list">
		<div class="elem">
			<input class="js-brand js-brand-all" id="tw-brand-all" autocomplete="off" type="checkbox" 
						<?php \TyresAddict\TyreFilter\Woo::checked_multiple( 'all', $r_brand ); ?>
						name="brand[]" value="all">
			<label for="tw-brand-all"><?=__( 'All', Plugin::lang ) ?></label>
		</div>
		<?php foreach ( $brands as $brand ) : ?>
			<div class="elem">
				<input class="js-brand" id="tw-brand-<?=esc_attr( $brand ); ?>" 
											autocomplete="off" type="checkbox" 
											<?php \TyresAddict\TyreFilter\Woo::checked_multiple( $brand, $r_brand ); ?>
											name="brand[]" value="<?=esc_attr( $brand ); ?>">
				<label for="tw-brand-<?=esc_attr( $brand ); ?>"><?=esc_html( $brand ); ?></label>
			</div>
		<?php endforeach ?>
		</div>
	</div>


	<div class="taw-buttons">
		<button class="button tyre-filter"><?=__( 'Find Tyre', Plugin::lang ) ?></button>
		<button class="button js-twf-filter-reset" type="reset"><?=__( 'Reset', Plugin::lang ) ?></button>
	</div>

	</form>

</div>


