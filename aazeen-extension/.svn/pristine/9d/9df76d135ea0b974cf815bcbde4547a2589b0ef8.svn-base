<?php
$btn_clr = isset( $instance['styling']['btn-clr'] ) ? $instance['styling']['btn-clr'] : '#2f4052';
$btn_clr_f = isset( $instance['featured']['btn-clr-f'] ) ? $instance['featured']['btn-clr-f'] : '#2f4052';
 $id= $this->id;
?>
<style>
#<?php echo $id;?> .aazeen-pricing .card-pricing.card-plain .btn.btn-rose
{
box-shadow:0 2px 2px 0 <?php echo Kirki_Color::get_rgba($btn_clr, 0.14) ?>,0 3px 1px -2px <?php echo Kirki_Color::get_rgba($btn_clr, 0.2) ?>,0 1px 5px 0 <?php echo Kirki_Color::get_rgba($btn_clr, 0.12) ?>;
}
#<?php echo $id;?> .aazeen-pricing .card-pricing.card-plain .btn.btn-rose:hover
{
	box-shadow:0 14px 26px -12px <?php echo Kirki_Color::get_rgba($btn_clr, .42) ?>, 0 4px 23px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(156, 39, 176, .2);

}
#<?php echo $id;?> .aazeen-pricing .card-pricing.card-raised .btn.btn-rose
{
box-shadow:0 2px 2px 0 <?php echo Kirki_Color::get_rgba($btn_clr_f, 0.14) ?>,0 3px 1px -2px <?php echo Kirki_Color::get_rgba($btn_clr_f, 0.2) ?>,0 1px 5px 0 <?php echo Kirki_Color::get_rgba($btn_clr_f, 0.12) ?>;
}
#<?php echo $id;?> .aazeen-pricing .card-pricing.card-raised .btn.btn-rose:hover
{
	box-shadow:0 14px 26px -12px <?php echo Kirki_Color::get_rgba($btn_clr_f, .42) ?>, 0 4px 23px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(156, 39, 176, .2);

}

</style>

<div class="aazeen-pricing padding-vertical-2">
<div class="grid-container align-center text-center">
	<div class="grid-x  grid-margin-x">

	<?php foreach( $instance['plans'] as $i => $plan ) { ?>
		<div class="cell large-auto small-24 medium-12">
			<div class="card card-pricing <?php echo ( $plan['featured'] ? ' card-raised' : 'card-plain' ); ?> ">
				<div class="card-body">
					<h6 class="card-category text-info">
            <?php echo esc_html( $plan['title'] ); ?>
          </br>
					<small><?php echo esc_html( $plan['title-tag'] ); ?></small>
					</h6>
					<h1 class="card-title">
						<small><?php echo esc_html( $plan['price-prefix'] ); ?></small>
						<?php echo esc_html( $plan['price'] ); ?>
						<small><?php echo esc_html( $plan['price-suffix'] ); ?></small>
					</h1>
          <p class="pricing-tag"> <?php echo esc_html( $plan['price-tag'] ); ?></p>

					<ul class="no-bullet">
						<?php foreach( $plan['points'] as $i => $feature ) { ?>
						<li>
							<?php echo wp_kses_post( $feature['text'] ); ?>
						</li>
					<?php }?>
					</ul>
					<?php
					if( !empty( $plan['btn-window'] ) ) $button_attributes['target'] = '_blank';
					if( !empty( $plan['btn-url'] ) ) $button_attributes['href'] = sow_esc_url( $plan['btn-url'] );
					if( !empty( $plan['btn-id'] ) ) $button_attributes['id'] = esc_attr( $plan['btn-id'] );
					if( !empty( $plan['btn-title'] ) ) $button_attributes['title'] = esc_attr( $plan['btn-title'] );
					if( !empty( $plan['btn-onclick'] ) ) $button_attributes['onclick'] = esc_attr( $plan['btn-onclick'] );
					?>
					<?php if ( $plan['btn'] ): ?>
					<a <?php foreach($button_attributes as $name => $val) echo $name . '="' . $val . '" ' ?> class="btn btn-rose btn-raised btn-round">
						<?php echo esc_html( $plan['btn'] ); ?>
					</a>
				<?php endif; ?>
				</div>
			</div>
		</div>

		<?php } ?>
	</div>
</div>
</div>
