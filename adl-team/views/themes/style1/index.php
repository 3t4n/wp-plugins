<?php
// get the adl-post object and other values from the $args var
$loop = (array_key_exists('loop', $args) && !empty($args['loop'])) ? $args['loop'] : array();
(array_key_exists('general_info', $args) && !empty($args['general_info'])) ? extract($args['general_info']) : array();
$chuck_four = array_chunk($loop->posts, 4);// at first chunk,  it will have 1 dummy item and 3 members. and the rest chunks will have 4 members.
$themeID = 'ID-'.rand(1, 9999);
// add some items to the style array to pass to the style.php
$st1['themeID'] = $themeID;
// data to be sent css and fonts to the partials/style.php
$data = array(
    'st1' => $st1,
    'fs'  => $fs,
);

?>
<!--Theme: Elegant Square Grid-->
<?php
    $ADL_team->loadTheme('style1/partials/style', array('data' => $data)); // loads style with dynamic data
?>
<div class="atp-container" id="<?= $themeID; ?>">
<?php

    //First Loop Starts
    foreach ( $chuck_four as $key=> $four_members ) {
        echo '<div class="adl-row">';
            // Second Loop start
            foreach ($four_members  as $member  ) {
                $member_info = $ADL_team->get_all_info_of_member($member);
                $member_info['show_member_detail'] = !empty($show_member_detail) ? $show_member_detail: '';
                $member_info['crop_image'] = !empty($crop_image) ? $crop_image: '';
                $member_info['image_upscale'] = !empty($image_upscale) ? $image_upscale: '';
                $member_info['popup_show'] = !empty($popup_show) ? $popup_show: '';
                $member_info['image_width'] = !empty($st1['image_width']) ? $st1['image_width']: '270';
                $member_info['image_height'] = !empty($st1['image_height']) ? $st1['image_height']: '260';

                $ADL_team->loadTheme( 'style1/partials/member', [ 'member_info' => $member_info ] );


            } // Ends Second Loop

        echo '</div>'; // Ends adl-row
    } // Ends First Loop

?>
</div> <!-- END container-->

