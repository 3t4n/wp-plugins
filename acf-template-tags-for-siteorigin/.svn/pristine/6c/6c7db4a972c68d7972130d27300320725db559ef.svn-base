<?php

global $acftt;

if (!empty($instance['field']['is_sub'])) {
    $sub = true;
} else {
    $sub = false;
}

$uid = 'eso_' . uniqid();

?>

<?php if ($fo = $acftt->get_acf_field_object($instance, $sub)) { ?>
    
    <div id="<?php echo $uid; ?>"></div>
    
    <style type="text/css">
    #<?php echo $uid; ?> {
        min-height: <?php echo $instance['map']['container_height']; ?>;
    }
    </style>
    
    <script>
    
    function initMap() {
        
        var myLatLng = {lat: <?php echo esc_js($fo['field_object']['value']['lat']); ?>, lng: <?php echo esc_js($fo['field_object']['value']['lng']); ?>};
        
        var map = new google.maps.Map(document.getElementById('<?php echo $uid; ?>'), {
            zoom: <?php echo esc_js($instance['map']['zoom_level']); ?>,
            center: myLatLng
        });
        
        <?php if ( !empty($instance['map']['info_window']) ) : ?>
        <?php $info_window = $instance['map']['info_window']; ?>
        var infowindow = new google.maps.InfoWindow({
            content: <?php echo json_encode($info_window); ?>
        });
        
        <?php endif; ?>
        
        <?php if ( !empty($instance['map']['marker_image']) ) : ?>
        
        var image = '<?php echo wp_get_attachment_url( $instance['map']['marker_image'] ); ?>'
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: image,
            title: <?php echo ( !empty($instance['map']['marker_title']) ? json_encode($instance['map']['marker_title']) : json_encode($fo['field_object']['value']['address']) ); ?>
        });
        
        <?php else : ?>
        
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: <?php echo ( !empty($instance['map']['marker_title']) ? json_encode($instance['map']['marker_title']) : json_encode($fo['field_object']['value']['address']) ); ?>
        });
        
        <?php endif; ?>
        
        <?php if ( !empty($instance['map']['info_window']) ) : ?>
        
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
        
        <?php endif; ?>
    }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=<?php echo siteorigin_panels_setting( 'eso_acf_google_api_key' ); ?>&callback=initMap">
</script>


<?php } ?>
