<?php
/**
 * @var array $reactions
 * @var string $item_id
 * @var string $nonce
 * @var string $item_type
 */
foreach ( $reactions as $reaction ) {
	/**
	 * @var array $reaction
	 * @var int $reaction ['ID']
	 * @var string $reaction ['label']
	 * @var string $reaction ['activeClass']
	 * @var string $reaction ['image']
	 * @var string $reaction ['count_badge']
	 */
	$reaction = array_merge( [
		'ID'          => 0,
		'label'       => '',
		'activeClass' => '',
		'image'       => '',
		'count_badge' => ''
	], $reaction );
	?>
<div
        class="
            da-reactions-data
            reaction
            reaction_<?php echo esc_attr( $reaction['ID'] ); ?>
            <?php echo esc_attr( $reaction['activeClass'] ); ?>
        "
            data-id="<?php echo esc_attr( $item_id ); ?>"
            data-nonce="<?php echo esc_attr( $nonce ); ?>"
            data-reaction="<?php echo esc_attr( $reaction['ID'] ); ?>"
            data-title="<?php echo esc_attr( $reaction['label'] ); ?>"
            data-type="<?php echo esc_attr( $item_type ); ?>">
	<?php echo wp_kses( $reaction['image'], 'da-r-img' ); ?>
	<?php echo wp_kses( $reaction['count_badge'], 'post' ); ?>
</div>
<?php
}
