<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$acemount_auth = $acemount_auth ? $acemount_auth : '';

$response = wp_remote_post( 'https://api.acemountmedia.com/sms/statistic', array(
    'headers' => array(
        'Authorization' => 'Bearer ' . $acemount_auth,
    ),
) );

$result = json_decode($response['body']);

?>


<table>
    <thead>
    <tr>
        <th>#</th>
        <th> Telephone number</th>
        <th> Date </th>
        <th> Sms status </th>

    </tr>
    </thead>

    <tbody>

        <?php
        $num = 1;
            foreach ($result->successful_request as $key => $value ){
                echo '<tr> <td>'.esc_textarea($num).' </td> <td>'.esc_textarea($value[2]).' </td>  <td>'.esc_textarea($value[1]).' </td> <td>';

                if($value[0] == 0){
                    echo esc_textarea('sent');
                }elseif ($value[0] == 1){
                    echo esc_textarea('delivered');
                }elseif ($value[0] == 2){
                    echo esc_textarea('not delivered');
                }elseif ($value[0] == 3){
                    echo esc_textarea('Expired');
                }

                echo ' </td> </tr>' ;
                $num = $num + 1;
            }

        ?>


    </tbody>

</table>
