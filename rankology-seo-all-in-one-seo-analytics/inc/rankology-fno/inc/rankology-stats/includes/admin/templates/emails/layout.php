<?php

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


$email_body = '<table role="presentation" class="body" style="background-color: #f6f6f6; border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" cellspacing="0" cellpadding="0" border="0">
    <tbody>
    <tr>
        <td class="container" style="Margin: 0 auto !important; display: block; font-size: 14px; max-width: 580px; padding: 10px; vertical-align: top; width: 580px;">
            <div class="content" style="Margin: 0 auto; box-sizing: border-box; display: block; max-width: 580px; padding: 10px;">
                <table class="logo" style="border-collapse: separate; margin: 20px auto; mso-table-lspace: 0pt; mso-table-rspace: 0pt; text-align: center; width: 40%;" data-style="HeaderTo100%">

                    <tr>
                        <td align="center" valign="top" style="white-space: nowrap;border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;padding-top: 20px;padding-bottom: 20px;color: #999999;font-family: Nunito;" class="footer">
                        ' . $email_title . '                        
                        </td>
                    </tr>
                </table>            
                
                ' . $email_header . '

                
                <!-- START CENTERED WHITE CONTAINER -->
                <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; mso-hide: all; opacity: 0; overflow: hidden; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
                <table role="presentation" class="main" style="background: #ffffff; border-collapse: separate; border-radius: 3px; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">

                    <!-- START MAIN CONTENT AREA -->
                    <tbody>
                    <tr>
                        <td class="wrapper" style="box-sizing: border-box; font-size: 14px; padding: 20px; vertical-align: top;">
                            <table role="presentation" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" cellspacing="0" cellpadding="0" border="0">
                                <tbody>
                                <tr>
                                    <td style="font-size: 14px; vertical-align: top;">
                                    ' . wp_kses_post($content) . '
			                        </td>
			                    </tr>
                                    
			                    </tbody>
			                </table>
			            </td>
			        </tr>
             <!-- END MAIN CONTENT AREA -->
                </tbody>
            </table>

           <!-- START FOOTER -->
                <div class="footer" style="margin-top: 10px; clear: both; width: 100%;">
                
    
               ' . $email_footer . $copyright . '

                </div>
                <!-- END FOOTER -->

         <!-- END CENTERED WHITE CONTAINER -->
            </div>
        </td>
    </tr>
    </tbody>
</table>';

echo $email_body;