<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

if ($links) {
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline"><?php esc_html_e('Capture URL', 'a-testimonial-builder'); ?></h1>
        <table class="wp-list-table widefat fixed striped table-view-list pages table table-link">
            <input type="hidden" class="copy-input" />
            <?php foreach ($links as $i => $link) {
                $i += 1;
                ?>
                <tr>
                    <th width="5%"><?php echo esc_attr($i) ?></th>
                    <td width="5%">
                        <img class="table-link-img" src="<?php echo esc_attr($link['icon']) ?>" alt="<?php echo esc_attr($link['title']) ?>" />
                    </td>
                    <td>
                        <a id="table-link-href-<?php echo esc_attr($i) ?>" href="<?php echo esc_attr($link['url']) ?>" target="_blank"><?php echo esc_attr($link['url']) ?></a>
                    </td>
                    <td>
                        <button class="btn btn-secondary btn-hover-brand vocalreferences-btn-copy-to-clipboard" data-id="<?php echo esc_attr($i) ?>">
                            <svg class="svg-inline--fa fa-copy fa-w-14" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z"></path></svg><!-- <i class="fa fa-copy"></i> -->
                        </button>
                    </td>
                </tr>
    <?php } ?>
        </table>
    </div>
    <?php
}