<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $wpdb;

if ( isset( $_GET[ 'message' ] ) && $_GET[ 'message' ] != '' ) {
    ?>
    <div class='appts-message'>
        <?php
        $msgid = $_GET[ 'message' ];
        switch ( $msgid ) {
            case '1':
                ?>
                <span class='appts-success'><?php _e( 'Table deleted Successfully.', 'ap-pricing-tables-lite' ); ?></span>
                <?php
                break;

            case '2':
                ?>
                <span class='appts-error'><?php _e( 'Table deletion failed. Please try again.', 'ap-pricing-tables-lite' ); ?></span>
                <?php
                break;

            case '3':
                ?>
                <span class='appts-success'><?php _e( 'Table copied Successfully.', 'ap-pricing-tables-lite' ); ?></span>
                <?php
                break;

            case '4':
                ?>
                <span class='appts-error'><?php _e( 'Table copy failed. Please try again.', 'ap-pricing-tables-lite' ); ?></span>
                <?php
                break;

            default:
                ?>
                <span class='appts-error'><?php _e( 'Something went wrong. Please try again.', 'ap-pricing-tables-lite' ); ?></span>
                <?php
                break;
        }
        ?>
    </div>
<?php } ?>
<?php
$table_name = $wpdb -> prefix . 'appts_tables_data';
$all_rows = $wpdb -> get_results( " SELECT id, name, table_data, sid, created_date, last_modified_date FROM $table_name ORDER BY id DESC" );
?>
<div class="appts-tables-wrapper">
    <?php if ( ! empty( $all_rows ) ) { ?>
        <div class="appts-tables-inner-wrap appts-clearfix">
            <?php
            $count = 0;
            foreach ( $all_rows as $row ):
                $shortcode_id = $row -> sid;
                $table_data = maybe_unserialize( $row -> table_data );
                $template_selection = $table_data[ 'template-selection' ];
                $count ++;
                ?>
                <div class="appts-table">
                    <div class="appts-table-inner-wrap">
                        <div class="appts-image-wrap"><img src="<?php echo APPTS_IMAGE_DIR . "/templates/$template_selection.jpg"; ?>"></div>
                        <div class='appts-table-name-wrapper'>
                            <label><?php _e( 'Table Name', 'ap-pricing-tables-lite' ); ?></label>
                            <div class="appts-thumb-title"><?php echo $row -> name; ?></div>
                        </div>
                        <div class='appts-table-shortcode-wrapper'>
                            <label><?php _e( 'Shortcode', 'ap-pricing-tables-lite' ); ?></label>
                            <div class="appts-shortcode-readonly"><input type="text" readonly="readonly" value="[appts_pricing_table sid='<?php echo $row -> sid; ?>']"></div>
                        </div>
                        <div class="appts-list-nav">
                            <a href="<?php echo esc_url(admin_url('admin.php?page=ap-pricing-tables-lite-add-new&postid='.intval($row -> id))); ?>" title="Edit">
                                <span style="opacity: 1;">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </span>
                            </a>
                            <a href="<?php echo site_url(); ?>?appts_form_preview=true&appts_sid=<?php echo $shortcode_id; ?>" target='_blank' title='View'>
                                <span style="opacity: 1;">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </span>
                            </a>
                            <a href="javascript:void(0);" class="appts-table-action" data-action_to_perform='copy_table'  data-postid="<?php echo intval($row -> id); ?>" data-confirm="Are you sure you want to copy the selected table?" title="Copy">
                                <span style="opacity: 1;">
                                    <i class="fa fa-clone" aria-hidden="true"></i>
                                </span>
                            </a>
                            <a href="javascript:void(0);" class="appts-table-action" data-action_to_perform="delete_table" data-postid="<?php echo intval($row -> id); ?>" data-confirm="Are you sure you want to delete the selected table?" title="Delete">
                                <span style="opacity: 1;">
                                    <i class="fa fa-trash"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php }else { ?>
        <div class="appts-tables-inner-wrap appts-clearfix">
            <div class='appts-table'><?php _e( 'Pricing table listing appears here. Since you haven"t created any pricing table yet. Please create', 'ap-pricing-tables-lite' ); ?> <a href='<?php echo admin_url( 'admin.php?page=ap-pricing-tables-add-new' ); ?>'><?php _e( 'one', 'ap-pricing-tables-lite' ); ?></a> <?php _e( 'or You can import some pricing tables by going to export/import section', 'ap-pricing-tables-lite' ); ?>.
            </div>
        </div>
    <?php } ?>
</div>
<div class="appts-submit">
    <a class="appts-button" title="Add New Table" href="<?php echo admin_url( 'admin.php?page=ap-pricing-tables-lite-add-new' ); ?>"><?php _e( 'Add New Table', 'ap-pricing-tables-lite' ); ?></a>
</div>