<?php
function dsgvo_youtube_inpage_shortcode($atts, $content = null ) {

    $values = shortcode_atts( array(
        'videoid'   	=> '#',
        'target'	=> '_self',
        'images'	=> '#',
        'alt'	=> '#',
        'width'	=> '#',
        'height'	=> '#',
    ), $atts );


    
$array = explode("=", $values['videoid']);

    // Überprüfen, ob das Array mindestens zwei Elemente enthält, bevor auf Index 1 zugegriffen wird
$youtubecode = isset($array[1]) ? $array[1] : '';
    
$images = $values['images'];
$alt = $values['alt'];
$width = $values['width'];
$height = $values['height'];

$images = preg_replace('/\sonerror=([^\s>]+)/i', '', $images);
$images = esc_url($images);
//esc_attr($values['url'])


    ob_start(); ?>
    <a href="#" id="loadVideoLink">
    <img src="<?php echo esc_url($values['images']); ?>" alt="<?php echo esc_attr($values['alt']); ?>" width="<?php echo esc_attr($values['width']); ?>" height="<?php echo esc_attr($values['height']); ?>">
</a>
<div id="videoContainer" style="width: <?php echo esc_attr($values['width']); ?>px; height: <?php echo esc_attr($values['height']); ?>px;"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var loadVideoLink = document.getElementById("loadVideoLink");
            var videoContainer = document.getElementById("videoContainer");

            loadVideoLink.addEventListener("click", function() {
                // Erstellen Sie das YouTube-IFrame erst, wenn der Link geklickt wurde
                var iframe = document.createElement("iframe");
                iframe.setAttribute("width", "<?php echo esc_attr($values['width']); ?>");
                iframe.setAttribute("height", "<?php echo esc_attr($values['height']); ?>");
                iframe.setAttribute("src", "https://www.youtube.com/embed/<?php echo esc_attr($values['videoid']); ?>");
                iframe.setAttribute("frameborder", "0");
                iframe.setAttribute("allowfullscreen", "");

                // Fügen Sie das IFrame zum Video-Container hinzu
                videoContainer.appendChild(iframe);

                // Deaktivieren Sie den Link, um das Video nur einmal zu laden
                loadVideoLink.style.pointerEvents = "none";
                loadVideoLink.style.textDecoration = "none";
                loadVideoLink.style.color = "gray";

                // Blenden Sie den Link aus
                loadVideoLink.style.display = "none";
            });
        });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('dsgvo-youtube-inpage', 'dsgvo_youtube_inpage_shortcode');
?>
