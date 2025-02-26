<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include 'header.php';

$aa_position = azoads_get_list_position();
$aa_type = azoads_get_list_type();
$aa_network = azoads_get_list_network();
?>
<div class="azo-ads-main">

    <div class="azo-ads-card">

        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <span class="search-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"/><path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"/></svg>
                </span>
                <input type="text" data-azo-ads-filter="search" class="search-text azo-ads-form-control" placeholder="<?php esc_html_e( 'Search Ads', 'azo-ads' ); ?>" />
            </div>
            <!--end::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <div class="filter-hook-position-wrapper">
                    <!--begin::Select2-->
                    <select class="filter-hook-position" data-control="select2" data-hide-search="true" data-placeholder="Position" data-azo-ads-filter="position">
                        <option></option>
                        <option value="all">All</option>
                        <?php foreach ( $aa_position as $position ) : ?>
                        <option value="<?php echo esc_html( $position ); ?>"><?php echo esc_html( $position ); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!--end::Select2-->
                </div>

                <!--begin::Create Ad-->
                <a href="admin.php?page=<?php echo esc_html( AZOADS_SLUG ); ?>-manage" class="azo-ads-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M112 32c8.8 0 16 7.2 16 16s-7.2 16-16 16H88c-30.9 0-56 25.1-56 56v24c0 8.8-7.2 16-16 16s-16-7.2-16-16V120C0 71.4 39.4 32 88 32h24zM0 304V208c0-8.8 7.2-16 16-16s16 7.2 16 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16zm16 48c8.8 0 16 7.2 16 16v24c0 30.9 25.1 56 56 56h24c8.8 0 16 7.2 16 16s-7.2 16-16 16H88c-48.6 0-88-39.4-88-88V368c0-8.8 7.2-16 16-16zM433.3 192.6c-9.1 .8-17.3-6.1-17.3-15.3V120c0-30.9-25.1-56-56-56H336c-8.8 0-16-7.2-16-16s7.2-16 16-16h24c48.6 0 88 39.4 88 88v57.4c0 8.1-6.7 14.6-14.7 15.2zM160 464c0-8.8 7.2-16 16-16h96c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16zM272 64H176c-8.8 0-16-7.2-16-16s7.2-16 16-16h96c8.8 0 16 7.2 16 16s-7.2 16-16 16zM544 368a112 112 0 1 0 -224 0 112 112 0 1 0 224 0zm-256 0a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm160-64v48h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V384H368c-8.8 0-16-7.2-16-16s7.2-16 16-16h48V304c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg>
                    <?php esc_html_e( 'Create Ad', 'azo-ads' ); ?>
                </a>
                <!--end::Create Ad-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Table-->
            <table id="azo-ads-table" class="azo-ads-table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="azo-ads-text-400">
                        <th>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="checkAll" value="0" />
                            </div>
                        </th>
                        <th><?php esc_html_e( 'Name', 'azo-ads' ); ?></th>
                        <th><?php esc_html_e( 'Position', 'azo-ads' ); ?></th>
                        <th><?php esc_html_e( 'Type', 'azo-ads' ); ?></th>
                        <th><?php esc_html_e( 'Last Modified', 'azo-ads' ); ?></th>
                        <th><?php esc_html_e( 'Active', 'azo-ads' ); ?></th>
                        <th><?php esc_html_e( 'Action', 'azo-ads' ); ?></th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->

                <!--begin::Table body-->
                <tbody class="azo-ads-text-600">

                    <?php
                    $aa_args = array(
                        'post_type'             => 'azo-ads',
                        'posts_per_page'        => -1,
                        'orderby'               => 'ID',
                        'order'                 => 'DESC'
                    );
                    $aa_query = new WP_Query( $aa_args );
                    if ( $aa_query->have_posts() ) :
                        while ( $aa_query->have_posts() ) :
                            $aa_query->the_post();

                            $position = get_post_meta( get_the_ID(), 'aa_position', true );
                            $type = get_post_meta( get_the_ID(), 'aa_type', true );
                            $expire = get_post_meta( get_the_ID(), 'aa_expire_datetime', true );
                            $show_by_days = get_post_meta( get_the_ID(), 'aa_show_by_days', true );

                            if ( isset( $aa_type[$type] ) ) {
                                $type_name = $aa_type[$type];
                                $type_slug = 'type';
                            }
                            else {
                                $type_name = $aa_network[$type];
                                $type_slug = 'network';
                            }
                    ?>
                    <tr data-id="<?php the_ID(); ?>">
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" name="id" value="<?php the_ID(); ?>" />
                            </div>
                        </td>

                        <td>
                            <div class="ads-name-wrapper">
                                <a href="admin.php?page=azo-ads-manage&id=<?php the_ID(); ?>">
                                    <span class="symbol-label azo-tooltip" style="background-image:url(<?php echo esc_html( AZOADS_BASE_URL ) . '/assets/images/position/' . esc_html( $position ) . '.svg'; ?>);" data-azo-tooltip="<?php echo esc_html( $aa_position[$position] ); ?>"></span>
                                </a>
                                <a href="admin.php?page=azo-ads-manage&id=<?php the_ID(); ?>" class="ads-name" data-azo-ads-filter="product_name"><?php the_title(); ?></a>
                            </div>
                        </td>

                        <td>
                            <span class="position-label"><?php echo esc_html( $aa_position[$position] ); ?></span>
                        </td>
                        
                        <td data-order="<?php echo esc_attr( $type ); ?>">
                            <span class="symbol-label type-label azo-tooltip" style="background-image:url(<?php echo esc_html( AZOADS_BASE_URL ) . '/assets/images/' . esc_html( $type_slug ) . '/' . esc_html( $type ) . '.svg'; ?>);" data-azo-tooltip="<?php echo esc_html( $type_name ); ?>"></span>
                        </td>

                        <td>       
                            <span class="time-label"><?php echo esc_html( get_the_modified_date( 'Y-m-d H:i' ) ); ?></span>
                        </td>

                        <td>
                            <input class="form-check-box" type="checkbox" name="active" role="switch"<?php echo ( get_post_status() == 'publish' ) ? ' checked="checked"' : ''; ?>>
                            <?php if ( $expire ) : ?>
                            <div class="azo-ads-expire edit azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Expiration', 'azo-ads' ); ?>">
                                <span class="azo-ads-expire-status<?php echo ( strtotime( $expire ) < current_time( 'timestamp' ) ) ? ' expired' : ''; ?>">
                                    <?php if ( strtotime( $expire ) < current_time( 'timestamp' ) ) : ?>
                                    <?php esc_html_e( 'Expired', 'azo-ads' ); ?>
                                    <?php else : ?>
                                    <?php esc_html_e( 'Expires', 'azo-ads' ); ?>
                                    <?php endif; ?>
                                </span>
                                <span class="azo-ads-expire-time"><?php echo esc_html( $expire ); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php if ( defined( 'AZOADS_PRO_VERSION' ) && azoads_activated_pro() && $show_by_days ) : ?>
                            <div class="azo-ads-show-up-days edit azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Show Up Days', 'azo-ads' ); ?>">
                                <span class="azo-ads-show-up-days-label"><?php esc_html_e( 'Shows up', 'azo-ads' ); ?></span>
                                <span class="azo-ads-expire-time"><?php echo esc_html( str_replace( ',', ' ', $show_by_days ) ); ?></span>
                            </div>
                            <?php endif; ?>
                        </td>

                        <td class="ads-action-wrapper">
                            <div class="ads-action">
                                <a href="admin.php?page=azo-ads-manage&id=<?php the_ID(); ?>" class="edit azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Edit', 'azo-ads' ); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M58.57 323.5L362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C495.8 61.87 498.5 65.24 500.9 68.79C517.3 93.63 514.6 127.4 492.7 149.3L188.5 453.4C187.2 454.7 185.9 455.1 184.5 457.2C174.9 465.7 163.5 471.1 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L58.57 323.5zM82.42 374.4L59.44 452.6L137.6 429.6C143.1 427.7 149.8 424.2 154.6 419.5L383 191L320.1 128.1L92.51 357.4C91.92 358 91.35 358.6 90.8 359.3C86.94 363.6 84.07 368.8 82.42 374.4L82.42 374.4z"/></svg>
                                </a>
                                <a href="javascript:void(0);" class="clone azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Duplicate', 'azo-ads' ); ?>" data-id="<?php the_ID(); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M64 464H288C296.8 464 304 456.8 304 448V384H352V448C352 483.3 323.3 512 288 512H64C28.65 512 0 483.3 0 448V224C0 188.7 28.65 160 64 160H128V208H64C55.16 208 48 215.2 48 224V448C48 456.8 55.16 464 64 464zM160 64C160 28.65 188.7 0 224 0H448C483.3 0 512 28.65 512 64V288C512 323.3 483.3 352 448 352H224C188.7 352 160 323.3 160 288V64zM224 304H448C456.8 304 464 296.8 464 288V64C464 55.16 456.8 48 448 48H224C215.2 48 208 55.16 208 64V288C208 296.8 215.2 304 224 304z"/></svg>
                                </a>
                                <a href="javascript:void(0);" class="delete azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Delete', 'azo-ads' ); ?>" data-id="<?php the_ID(); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M424 80C437.3 80 448 90.75 448 104C448 117.3 437.3 128 424 128H412.4L388.4 452.7C385.9 486.1 358.1 512 324.6 512H123.4C89.92 512 62.09 486.1 59.61 452.7L35.56 128H24C10.75 128 0 117.3 0 104C0 90.75 10.75 80 24 80H93.82L130.5 24.94C140.9 9.357 158.4 0 177.1 0H270.9C289.6 0 307.1 9.358 317.5 24.94L354.2 80H424zM177.1 48C174.5 48 171.1 49.34 170.5 51.56L151.5 80H296.5L277.5 51.56C276 49.34 273.5 48 270.9 48H177.1zM364.3 128H83.69L107.5 449.2C108.1 457.5 115.1 464 123.4 464H324.6C332.9 464 339.9 457.5 340.5 449.2L364.3 128z"/></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                </tbody>
                <!--end::Table body-->
            </table>
        </div>
        <!--end::Card body-->

        <?php wp_nonce_field( 'azoads-manage-ad', '_wpnonce' ); ?>

    </div>

</div>
<?php include 'footer.php'; ?>