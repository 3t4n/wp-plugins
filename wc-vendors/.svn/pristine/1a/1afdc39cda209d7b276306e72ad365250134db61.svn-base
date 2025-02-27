<?php

/**
 * Downloadable files template
 *
 * This file is used to load the download files data
 *
 * @link       http://www.wcvendors.com
 * @since      2.5.2
 * @version    2.5.2
 */

$downloadable_files = ! empty( $post_id ) ? wc_get_product( $post_id )->get_downloads( 'edit' ) : '';

?>

<div class="show_if_downloadable">
    <div class="form-field downloadable_files">
        <table class="download_file_table">
            <thead>
            <tr>
                <th class="sort">&nbsp;</th>
                <th><?php esc_html_e( 'Name', 'wc-vendors' ); ?> <span class="tips"
                                                                    data-tip="<?php esc_html_e( 'This is the name of the download shown to the customer.', 'wc-vendors' ); ?>"></span>
                </th>
                <th colspan="2"><?php esc_html_e( 'File ', 'wc-vendors' ); ?></th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php if ( $downloadable_files ) : ?>

                <?php foreach ( $downloadable_files as $key => $file ) : ?>

                    <?php $file_id = WCVendors_Pro::get_attachment_id( $key ); ?>
                    <?php
                    $download   = new WC_Product_Download( $file_id );
                    $file_hash  = $download->get_id();
                    $input_type = array(
                        'file_url'  => 'hidden',
                        'file_name' => 'text',
                    );
                    if ( 'file_url' === $file_display_type ) {
                        $input_type = array(
                            'file_url'  => 'text',
                            'file_name' => 'hidden',
                        );
                    }
                    ?>
                    <?php $file_display = ( 'file_url' === $file_display_type ) ? $file['file'] : basename( $file['file'] ); ?>

                    <tr class="download_file">
                        <td class="sort">
                            <svg class="wcv-icon wcv-icon-sm">
                                <use xlink:href="<?php echo WCV_ASSETS_URL; // phpcs:ignore ?>svg/wcv-icons.svg#wcv-icon-sort"></use>
                            </svg>
                        </td>
                        <td class="file_name">
                            <div class="control-group">
                                <div class="control">
                                    <input type="text" class="input_text"
                                            placeholder="<?php esc_html_e( 'File name', 'wc-vendors' ); ?>"
                                            name="_wc_file_names[]" value="<?php echo esc_attr( $file['name'] ); ?>"/>
                                </div>
                            </div>
                        </td>
                        <td class="file_url">
                            <input type="<?php echo esc_attr( $input_type['file_name'] ); ?>" class="input_text file_display"
                                    placeholder="<?php esc_html_e( 'http://', 'wc-vendors' ); ?>" name="_wc_file_display[]"
                                    value="<?php echo esc_attr( basename( $file['file'] ) ); ?>"/>
                            <input type="<?php echo esc_attr( $input_type['file_url'] ); ?>" class="file_url" name="_wc_file_urls[]"
                                    value="<?php echo esc_attr( $file['file'] ); ?>"/>
                            <input type="hidden" class="file_hash" name="_wc_file_hashes[]"
                                    value="<?php echo esc_attr( $key ); ?>"/>
                        </td>
                        <td class="file_url_choose" width="1%"><a href="#" class="button upload_file_button"
                                                                    data-choose="<?php esc_html_e( 'Choose file', 'wc-vendors' ); ?>"
                                                                    data-update="<?php esc_html_e( 'Insert file URL', 'wc-vendors' ); ?>"><?php echo esc_html( str_replace( ' ', '&nbsp;', __( 'Choose file', 'wc-vendors' ) ) ); ?></a>
                        </td>
                        <td width="1%">
                            <a href="#" class="delete">
                                <svg class="wcv-icon wcv-icon-sm">
                                    <use xlink:href="<?php echo WCV_ASSETS_URL; // phpcs:ignore ?>svg/wcv-icons.svg#wcv-icon-times"></use>
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="5">
                    <a href="#" class="button insert" data-row="
                        <?php
                        $file          = array(
                            'file' => '',
                            'name' => '',
                        );
                        $file_data_row = '<tr class="download_file"><td class="sort"><svg class="wcv-icon wcv-icon-sm">
							<use xlink:href="' . WCV_ASSETS_URL . 'svg/wcv-icons.svg#wcv-icon-sort"></use>
						</svg></td><td class="file_name"><div class="control-group"><div class="control"><input type="text" class="input_text" placeholder="' . __( 'File Name', 'wc-vendors' ) . '" name="_wc_file_names[]" value="' . esc_attr( $file['name'] ) . '" /></div></div></td>
	<td class="file_url"><div class="control-group"><div class="control"><input type="hidden" class="file_id" name="_wc_file_ids[]" value="" /><input type="text" class="file_url" name="_wc_file_urls[]" value="" /></div></div></td>
	<td class="file_url_choose" width="1%"><a href="#" class="button upload_file_button" data-choose="' . __( 'Choose file', 'wc-vendors' ) . '" data-update="' . __( 'Insert file URL', 'wc-vendors' ) . '">' . str_replace( ' ', '&nbsp;', __( 'Choose file', 'wc-vendors' ) ) . '</a></td>
	<td width="1%"><a href="#" class="delete"><svg class="wcv-icon wcv-icon-sm"><use xlink:href="' . WCV_ASSETS_URL . 'svg/wcv-icons.svg#wcv-icon-times"></use></svg></a></td></tr>';

                        echo esc_attr( $file_data_row );
                        ?>
                    "><?php esc_html_e( 'Add File', 'wc-vendors' ); ?></a>
                </th>
            </tr>
            </tfoot>
        </table>
    </div>


    <?php do_action( 'wcv_product_options_downloads' ); ?>

</div>
