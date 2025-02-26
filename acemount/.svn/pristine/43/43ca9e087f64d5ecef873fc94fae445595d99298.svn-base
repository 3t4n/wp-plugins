<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}


$acemount_auth = $acemount_auth ? $acemount_auth : '';

$acemount_response = wp_remote_post( 'https://api.acemountmedia.com/sms/originator', array(
    'headers' => array(
        'Authorization' => 'Bearer ' . $acemount_auth ,
    ),
) );

$acemount_result = json_decode($acemount_response['body']);


?>



    <form name="$acemount_auth" method="post" action=<?=esc_url(wp_nonce_url( ACEMOUNT_POST, 'acemount_setting_save')) ?> >

        <strong> <?=!isset($acemount_auth) ? 'Please register your account on our <a href = "https://acemountmedia.com"> site </a>' :
                'Here is your setting. You can update them after change on our <a href = "https://acemountmedia.com"> site </a>' ?> </strong>
        <table>
            <tbody>
            <tr>
                <th>
                    <strong>Enter your Token</strong>
                </th>
                <td>
                    <input type="password" name="acemount_auth" value="<?=$acemount_auth ? esc_attr($acemount_auth) : ''?>">
                </td>
            </tr>

            <tr>
                <th>
                    <strong> Choose Sender Name </strong>
                </th>
                <td>
                    <select type="text" name="acemount_alpha" value="<?=$acemount_alpha ? esc_attr($acemount_alpha) : ''?>">
                        <option value="<?=esc_attr($acemount_alpha) ?>"> <?=esc_textarea($acemount_alpha) ?> </option>
                        <?php
                        for($i = 0; $i< count($acemount_result->successful_request); $i++){
                            if(isset($acemount_alpha) && $acemount_alpha == $acemount_result->successful_request[$i]->originator){
                                continue;
                            }
                            if($acemount_result->successful_request[$i]->state !== 'completed' ){
                                continue;
                            }
                            echo '<option value="'.esc_attr($acemount_result->successful_request[$i]->originator).'">'.esc_textarea($acemount_result->successful_request[$i]->originator).'</option>' ;
                        }

                        ?>
                    </select>
                </td>
            </tr>

            </tbody>
        </table>
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save changes">
    </form>