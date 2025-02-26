<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$refund_requests = addlly_get_refund_requests( $article_id );
?>
<div id="refundsList" class="profile-page w-100" data-id="<?php echo absint($article_id); ?>">
    <div class="accountCardContainer">
        <div class="accountCard padding-0 border-0">
            <div class="card-note">
                <b><?php esc_html_e('NOTE:', 'addlly'); ?></b> <?php esc_html_e('Refunds are only available for credits used within the past 24 hours. Please ensure your posts are less than a day old to be eligible for a refund request.', 'addlly'); ?>
            </div>
            <?php if(isset($refund_requests['data']) && !empty($refund_requests['data'])){ ?>
                <div class="cardBody">
                    <div class="historyTableBlock mt-2">
                        <div class="custom-data-table">
                            <div class="tableBlock no-checkbox">
                                <div class="tableHead">
                                    <div class="tableRow">
                                        <div class="tableColumn">
                                            <p class="px-3"><?php esc_html_e('Type', 'addlly'); ?></p>
                                        </div>
                                        <div class="tableColumn">
                                            <p class="px-3"><?php esc_html_e('Credit', 'addlly'); ?></p>
                                        </div>
                                        <div class="tableColumn">
                                            <p class="px-3"><?php esc_html_e('Comment', 'addlly'); ?></p>
                                        </div>
                                        <div class="tableColumn">
                                            <p class="px-3"><?php esc_html_e('Admin Comment', 'addlly'); ?></p>
                                        </div>
                                        <div class="tableColumn">
                                            <p class="px-3"><?php esc_html_e('Refund Status', 'addlly'); ?></p>
                                        </div>
                                        <div class="tableColumn">
                                            <p><?php esc_html_e('Created At', 'addlly'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tableBody">
                                    <?php 
                                    $pageNum = isset($pageNum) ? $pageNum : 1;
                                    foreach($refund_requests['data'] as $key => $refund_request){
                                        $start_limit = (( $pageNum - 1)*10) + 1;
                                        $end_limit = $pageNum*10;
                                        if( ($key+1) >= $start_limit && ($key+1) <= $end_limit ){
                                            set_query_var('refund_request', $refund_request);
                                            addlly_get_template_part('one-click-blog-writer/edit/refund-requests-content');
                                        }
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php if( isset($refund_requests['data']) && count($refund_requests['data']) > 10 ){ ?>
                    <div class="pagenation listing-pagination">
                        <?php echo wp_kses_post(addlly_pagination( array( 'total_posts' => count($refund_requests['data']), 'posts_per_page' => 10, 'action' => 'refund_list' ) )); ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>