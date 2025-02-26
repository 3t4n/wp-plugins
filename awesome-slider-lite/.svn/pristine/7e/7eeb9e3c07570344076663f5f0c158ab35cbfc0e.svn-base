<?php
if(!isset($_POST['id'])) {
    echo '-1';
    exit();
}
$id=awescape($_POST['id']);
if($id=='' or $id=='0') {
    echo '-1';
    exit();
}

$previewdata = explode(':', $id);

if($previewdata[0] == 'preview') {
    $sliderObj = json_decode('{"aw_loadon":"1","aw_border_width":"1","aw_border_color":"#ffffff","aw_slider_loop":"0","aw_slider_action":"stop","aw_redirect_url":"","aw_padding":"0","aw_margin":"0","aw_left_right_nav":"","aw_left_right_custom_class":"","aw_paging_style":"dot","aw_paging_size":"2","aw_paging_custom_class":"","aw_autoplay_timing":"2000"}');
    $sliderObj->slides = array();
    
    $slidepost = get_post($previewdata[1]);
    $sliderObj->slides[] = json_decode(stripslashes($slidepost->post_content));
    echo json_encode($sliderObj);
    exit();
}

$sliderpost = get_post($id);
$sliderObj = json_decode(stripslashes($sliderpost->post_content));

if(!isset($sliderObj->{'aw_slides[]'}) or !count($sliderObj->{'aw_slides[]'})) {
    echo '0';
    exit();
}else {
    $sliderObj->slides = array();
    if(is_array($sliderObj->{'aw_slides[]'})) {
        foreach($sliderObj->{'aw_slides[]'} as $sid) {
            $slidepost = get_post($sid);
            $sliderObj->slides[] = json_decode(stripslashes($slidepost->post_content));
        }
    }else if(is_string($sliderObj->{'aw_slides[]'}) and $sliderObj->{'aw_slides[]'}!='') {
        $slidepost = get_post($sliderObj->{'aw_slides[]'});
        $sliderObj->slides[] = json_decode(stripslashes($slidepost->post_content));
    }
}
echo json_encode($sliderObj);
?>