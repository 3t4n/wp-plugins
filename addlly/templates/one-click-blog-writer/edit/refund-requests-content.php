<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div class="tableRow">
    <div class="tableColumn">
        <p class="px-3"><?php echo isset($refund_request->sub_type) ? esc_html($refund_request->sub_type) : '-'; ?></p>
    </div>
    <div class="tableColumn">
        <div class="d-flex align-items-center gap-2">
            <span class="debit-status">
              <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="fs-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 11h14v2H5z"></path>
              </svg>
              <?php echo isset($refund_request->debit) ? esc_html($refund_request->debit) : '-'; ?>
            </span>
        </div>
    </div>
    <div class="tableColumn">
        <p class="px-3"><?php echo isset($refund_request->comment) ? esc_html($refund_request->comment) : '-'; ?></p>
    </div>
    <div class="tableColumn">
        <p class="px-3"><?php echo isset($refund_request->admin_comment) ? esc_html($refund_request->admin_comment) : '-'; ?></p>
    </div>
    <div class="tableColumn">
        <div>
            <?php
            $refund_status = isset($refund_request->refund_status) ? $refund_request->refund_status : '';
            $created_date  = isset($refund_request->created_date) ? $refund_request->created_date : '';
            
            if( $refund_status == '' && strtotime(gmdate('Y-m-d H:i:s')) <= strtotime('+24 hours', strtotime($created_date)) ){
                echo '<button class="refund-button" type="button" data-refund_id="'. absint($refund_request->id) .'" data-article_id="'. absint($article_id) .'" data-subtype="'. esc_attr($refund_request->sub_type) .'">'. esc_html__('Refund', 'addlly') .'</button>';
            }else if($refund_status != '' ){
                ?>
                <div class="d-flex align-items-center">
                    <div class="dotStatus">
                      <span class="d-block" style="width: 8px; height: 8px; border-radius: 50%; background-color: rgb(245, 158, 11);"></span>
                    </div>
                    <?php esc_html_e('Pending', 'addlly'); ?>
                </div>
                <?php
            }else if($refund_status == '' ){
                echo '-';
            }
            ?>
        </div>
    </div>
    <div class="tableColumn">
        <p><?php echo isset($refund_request->created_date) ? esc_html(gmdate('Y-m-d H:i:s', strtotime($refund_request->created_date))) : ''; ?></p>
    </div>
</div>