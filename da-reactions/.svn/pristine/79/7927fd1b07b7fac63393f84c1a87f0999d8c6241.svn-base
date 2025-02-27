<table id="da-reactions-list">
    <caption>
        <p><?php echo esc_html_x( 'Use the handler in the first column to drag and reorder Reactions.', 'Reactions Table Instructions', 'da-reactions' ); ?>
			<?php echo esc_html_x( 'Click on an icon to change the image.', 'Reactions Table Instructions', 'da-reactions' ); ?>
			<?php echo esc_html_x( 'Utilize the color picker to change the primary color of an SVG.', 'Reactions Table Instructions', 'da-reactions' ); ?>
			<?php echo esc_html_x( 'Insert arbitrary text as a label.', 'Reactions Table Instructions', 'da-reactions' ); ?>
			<?php echo esc_html_x( 'Delete existing Reactions by clicking the trash can icon on the right.', 'Reactions Table Instructions', 'da-reactions' ); ?>
			<?php echo esc_html_x( 'To add a new Reaction, use the button at the bottom.', 'Reactions Table Instructions', 'da-reactions' ); ?></p>
        <p>
            <strong><?php echo esc_html_x( "Don't forget saving your Reactions before closing this page.", 'Reactions Table Instructions', 'da-reactions' ); ?></strong>
        </p>
    </caption>
    <thead>
    <tr>
        <th scope="col" class="da-reactions-list-column-sort-head">
			<?php echo esc_html_x( 'Sort', 'Table column heading', 'da-reactions' ) ?>
        </th>
        <th scope="col" class="da-reactions-list-column-icon-head">
			<?php echo esc_html_x( 'Icon', 'Table column heading', 'da-reactions' ) ?>
        </th>
        <th scope="col" class="da-reactions-list-column-color-head">
			<?php echo esc_html_x( 'Color', 'Table column heading', 'da-reactions' ) ?>
        </th>
        <th scope="col" class="da-reactions-list-column-label-head">
			<?php echo esc_html_x( 'Label', 'Table column heading', 'da-reactions' ) ?>
        </th>
        <th scope="col" class="da-reactions-list-column-tools-head">
			<?php echo esc_html_x( 'Tools', 'Table column heading', 'da-reactions' ) ?>
        </th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th scope="col" class="da-reactions-list-column-sort-foot">
			<?php echo esc_html_x( 'Sort', 'Table column heading', 'da-reactions' ) ?>
        </th>
        <th scope="col" class="da-reactions-list-column-icon-foot">
			<?php echo esc_html_x( 'Icon', 'Table column heading', 'da-reactions' ) ?>
        </th>
        <th scope="col" class="da-reactions-list-column-color-foot">
			<?php echo esc_html_x( 'Color', 'Table column heading', 'da-reactions' ) ?>
        </th>
        <th scope="col" class="da-reactions-list-column-label-foot">
			<?php echo esc_html_x( 'Label', 'Table column heading', 'da-reactions' ) ?>
        </th>
        <th scope="col" class="da-reactions-list-column-tools-foot">
			<?php echo esc_html_x( 'Tools', 'Table column heading', 'da-reactions' ) ?>
        </th>
    </tr>
    </tfoot>
	<?php
	/**
	 * @var array $reactions
	 */
	$iMax = count( $reactions );
	if ( $iMax > 0 ) {
		?>
        <tbody class="sortable">
		<?php
		foreach ( $reactions as $reaction ) {
			?>
            <tr>
                <td class="da-reactions-list-column-sort">
                    <span class="dashicons dashicons-menu handle"></span>
                    <input type="hidden" class="input_position"
                           name="<?php echo esc_attr( $reaction['sort_field_name'] ) ?>"
                           value="<?php echo esc_attr( $reaction['sort_order'] ) ?>"/>
                </td>
                <td class="da-reactions-list-column-icon">
                    <a href="javascript:" data-id="<?php echo esc_attr( $reaction['ID'] ) ?>"
                       class="change-image">
                        <img alt="<?php echo esc_attr( $reaction['label'] ) ?>"
                             src="<?php echo esc_attr( $reaction['image_file_url'] ) ?>"
                             width="64"
                             data-fill="<?php echo esc_attr( $reaction['color'] ) ?>"/>
                        <input type="hidden"
                               name="<?php echo esc_attr( $reaction['image_field_name'] ) ?>"
                               value=""/>
                    </a>
                </td>
                <td class="da-reactions-list-column-color">
                    <label for="da-reactions-color-picker-<?php echo esc_attr( $reaction['ID'] ) ?>"
                           class="screen-reader-text"><?php echo esc_attr__( 'Color', 'da-reactions' ) ?></label>
                    <input id="da-reactions-color-picker-<?php echo esc_attr( $reaction['ID'] ) ?>"
                           type="color"
                           name="<?php echo esc_attr( $reaction['color_field_name'] ) ?>"
                           value="<?php echo esc_attr( $reaction['color'] ) ?>"/>
                </td>
                <td class="da-reactions-list-column-label">
                    <label for="da-reactions-label-input-<?php echo esc_attr( $reaction['ID'] ) ?>"
                           class="screen-reader-text"><?php echo esc_attr__( 'Label', 'da-reactions' ) ?></label>
                    <input id="da-reactions-label-input-<?php echo esc_attr( $reaction['ID'] ) ?>"
                           type="text"
                           name="<?php echo esc_attr( $reaction['label_field_name'] ) ?>"
                           value="<?php echo esc_attr( $reaction['label'] ) ?>"/>
                </td>
                <td class="da-reactions-list-column-tools">
                    <a href="#" class="delete" data-id="<?php echo esc_attr( $reaction['ID'] ) ?>">
                        <span class="dashicons dashicons-trash"></span>
                    </a>
                </td>
            </tr>
			<?php
		}
		?>
        </tbody>
		<?php
	} else {
		?>
        <tbody>
            <tr class="no-results">
                <td colspan="5">
				<?php esc_html_e( 'There are no reactions', 'da-reactions' ); ?>
                </td>
            </tr>
        </tbody>
		<?php
	}
	?>
</table>
<?php include_once(DA_REACTIONS_PATH . 'templates/admin/buttons-settings-add-new.php'); ?>
