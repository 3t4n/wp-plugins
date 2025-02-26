<?php
/**
 * Email Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<!-- Footer -->
    <tr>
        <td align="center" valign="top" style="background: #ffffff;">
            <table border="0" cellpadding="10" cellspacing="0" width="600">
                <tbody>
                    <tr>
                        <td valign="top" style="padding: 0; border-radius: 6px;">
                            <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td colspan="2" valign="middle" style="border-radius: 6px; border: 0; color: #c09bb9; font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 12px; line-height: 125%; text-align: center; padding: 20px;">
                                        <?php 
                                            $footer_text = apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) );
                                            $blog_name = get_bloginfo( 'name', 'display' );
                                            $footer_text = str_replace( '{site_title}', $blog_name, $footer_text );
                                            echo wpautop( wp_kses_post( wptexturize( $footer_text ) ) ); ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
<!-- End Footer -->
<!-- Clear Spacer : BEGIN -->
<tr>
    <td aria-hidden="true" height="40" style="font-size: 0; line-height: 0;">
        &nbsp;
    </td>
</tr>
<!-- Clear Spacer : END -->
</table>
<!-- Email Body : END -->
</center>
</body>
</html>