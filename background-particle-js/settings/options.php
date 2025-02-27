<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die("Don't try to access directly :-( ");
}
?>
<script>
const particlesJSON = {
    "particles": {
        "number": {
            "value": <?php echo get_option('number_of_particles'); ?>,
            "density": {
                "enable": false,
                "value_area": 0
            }
        },
        "color": {
            "value": "<?php echo get_option('color_of_particles'); ?>"
        },
        "shape": {
            "type": "<?php echo get_option('type_of_particle'); ?>",
            "stroke": {
                "width": <?php echo get_option('border_width_of_particles'); ?>,
                "color": "<?php echo get_option('border_color_of_particles'); ?>"
            },
            "polygon": {
                "nb_sides": <?php echo get_option('polygon_sides_of_particles'); ?>
            },
            "image": {
                "src": "<?php echo get_option('image_as_particle'); ?>",
                "width": 100,
                "height": 100
            }
        },
        "opacity": {
            "value": <?php echo get_option('opacity_of_particles'); ?>,
            "random": <?php echo get_option('random_opacity_of_particles'); ?>
        },
        "size": {
            "value": <?php echo get_option('size_of_particles'); ?>,
            "random": true,
            "anim" :{
                "speed" : 4,
                "size_min" : 0.3
            }
        },
        "line_linked": {
            "enable": true,
            "distance": 100,
            "color": "<?php echo get_option('line_linked_color_of_particles'); ?>",
            "opacity": <?php echo get_option('opacity_of_particles_line'); ?>,
            "width": <?php echo get_option('line_width_between_particles'); ?>
        },
        "move": {
            "enable": true,
            "speed": <?php echo get_option('speed_of_particles'); ?>,
            "direction": "<?php echo get_option('direction_of_particles'); ?>",
            "random": <?php echo get_option('random_movement_of_particles'); ?>,
            "straight": false,
            "out_mode": "<?php echo get_option('out_mode_of_particles'); ?>",
            "bounce": <?php echo get_option('bounce_between_particles'); ?>,
            "attract": {
                "enable": true,
                "rotateX": 400,
                "rotateY": 200
            }
        }
    },
    "interactivity": {
        "detect_on": "canvas",
        "events": {
            "onhover": {
                "enable": <?php echo get_option('enable_hover_on_particles'); ?>,
                "mode": "<?php echo get_option('hover_mode_on_particles'); ?>"
            },
            "onclick": {
                "enable": <?php echo get_option('enable_click_on_particles'); ?>,
                "mode": "<?php echo get_option('click_mode_on_particles'); ?>"
            },
            "resize": false
        },
        "modes": {
            "grab": {
                "distance": <?php echo get_option('grab_distance_on_particles'); ?>,
                "line_linked": {
                    "opacity": <?php echo get_option('grab_line_opacity_on_particles'); ?>
                }
            },
            "bubble": {
                "distance": <?php echo get_option('bubble_distance_on_particles'); ?>,
                "size": <?php echo get_option('bubble_size_on_hover_particles'); ?>,
                "duration": <?php echo get_option('hover_event_duration_particles'); ?>,
                "opacity": <?php echo get_option('bubble_line_opacity_on_particles'); ?>,
                "speed": <?php echo get_option('speed_on_hover_particles'); ?>
            },
            "repulse": {
                "distance": <?php echo get_option('repulse_distance_on_particles'); ?>,
                "duration": <?php echo get_option('repulse_duration_on_particles'); ?>
            },
            "push": {
                "particles_nb": <?php echo get_option('push_nb_particles'); ?>
            },
            "remove": {
                "particles_nb": <?php echo get_option('remove_number_on_click_particles'); ?>
            }
        }
    },
    "retina_detect": true
    }

    particlesJS("mh-particles-js", particlesJSON);

</script>
        
         

