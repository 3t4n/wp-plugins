<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die("Don't try to access directly :-( ");
}
/**
* @param $section_id
* @param $Section_title
* @paran Section callback Function
* @param setting section ID
* 
* Particle Events Settings Section
*
*/

add_settings_section("particles_events_section_id", " ", "maher_particles_events_section_callback_function", "particlejs-banner");

/**
* @param $field_id
* @param $title_name
* @paran Field callback Function
* @param setting section ID
* @param Settings Section ID
* 
* Particle Events Settings Field
*
* Register Settings
* @param $section_id
* @param $field_id
*/

function maher_particles_settings_fields($fields){
    
    foreach( $fields as $field ){
        add_settings_field( $field[0], $field[1], function() use ($field) {echo '<input id="field-'.$field[0].'" type="text" class="regular-text" name="'.$field[0].'" value="'.get_option( $field[0], $field[2]).'" placeholder="'.$field[3].'">';}, "particlejs-banner", "particles_events_section_id");
        register_setting("particles_events_section_id", $field[0]);
    }
}
    
$mhFields = [
    ['background_color_of_banner', 'Banner Background Color', '#000', 'Color name or Hexadecimal code'],
    ['background_image_of_banner', 'Banner Background Image', 'https://image.com/particle.jpg', 'Banner Image URL'],
    ['height_of_banner', 'Banner Height', 600, 'Banner height in numbers only'],
    ['banner_header_title', 'Banner Header Title', 'Welcome to the Particles world!', 'Title of the Banner'],
    ['banner_header_title_color', 'Header Title Color', '#FFF', 'Color name or Hexadecimal code'],
    ['banner_header_title_font_size', 'Header Title Font Size', 40, 'Number only without px'],
    ['banner_description', 'Banner Description', 'MH ParticleJS is a powerful light weight animated Banner', 'Description of the Banner'],
    ['banner_description_text_color', 'Description Text Color', '#F1F1F1', 'Color name or Hexadecimal code'],
    ['banner_description_text_size', 'Description Text Font Size', 18, 'Number only without px'],
    ['banner_call_to_action', 'Banner Button Label', 'View Demos', 'Button Text'],
    ['banner_call_to_action_url', 'Button URL', '', 'contact'],
    ['banner_call_to_action_bg', 'Button Background Color', '#4CAF50', 'Color name or Hexadecimal code'],
    ['banner_call_to_action_color', 'Button Text Color', '#FFF', 'Color name or Hexadecimal code'],
    ['type_of_particle', 'Particles Type', 'circle', 'Particle type (circle, polygon, edge, triangle, star, image)'],
    ['polygon_sides_of_particles', 'Polygon Particles Side No', 6, 'Polygon particles sides number'],
    ['image_as_particle', 'Image as Particle', 'https://image.com/particle.jpg', 'Image URL'],
    ['number_of_particles', 'Particle Count', 160, 'Number of Particles on the Slider'],
    ['size_of_particles', 'Particle Size', 3, 'Particle Size( Numbers only)'],
    ['opacity_of_particles', 'Particles Opacity', 0.8, 'Transparency of particles (0.1 to 1)'],
    ['random_opacity_of_particles', 'Randomize Particles Opacity', true, 'true or false'],
    ['color_of_particles', 'Particle Color', '#FFF', 'Color name or Hexadecimal code'],
    ['border_color_of_particles', 'Particles Border Color', '#0984e3', 'Color name or Hexadecimal code'],
    ['border_width_of_particles', 'Particles Border Width', 3, 'Border Width (Number only)'],
    ['line_linked_color_of_particles', 'Line Color Between Particles', '#FFF', 'Color name or Hexadecimal code'],
    ['opacity_of_particles_line', 'Line Opacity Between Particles', 0, 'Line Transparency of particles (0.1 to 1)'],
    ['line_width_between_particles', 'Line Width Between Particles', 0, 'Line Width (Number only)'],
    ['speed_of_particles', 'Particle Movement Speed', 1, 'Number only(3, 4, 5, ...)'],
    ['direction_of_particles', 'Particle Movement Direction', 'top', 'none, top, top-right, right, bottom-right, bottom, bottom-left, left, top-left'],
    ['random_movement_of_particles', 'Particle Random Movement', true, 'truc or false'],
    ['out_mode_of_particles', 'Particle Out Mode', 'out', 'out or bounce'],
    ['bounce_between_particles', 'Bounce between Particles', true, 'true or false'],
    ['enable_click_on_particles', 'Click Event Particles', true, 'true or false'],
    ['click_mode_on_particles', 'Click Mode of Particles', 'repulse', 'push, remove, bubble, repulse'],
    ['push_nb_particles', 'Push Number of Particle on Click', 4, 'Number of particles Push'],
    ['remove_number_on_click_particles', 'OncLick Number of Particle Remove', 10, 'Number of particles remove on click'],
    ['repulse_distance_on_particles', 'Repulse Distance', 250 , 'Repulse distance (Number only)'],
    ['repulse_duration_on_particles', 'Repulse Duration', 4, 'Duration of Repulse (Number only)'],
    ['enable_hover_on_particles', 'Hover Option Particles', true, 'true or false'],
    ['hover_mode_on_particles', 'Hover Mode Particles', 'bubble', 'grab, bubble, repulse'],
    ['grab_distance_on_particles', 'Hover Grab Distance', 100, 'Grab Distance (Number only)'],
    ['grab_line_opacity_on_particles', 'Grab Line Opacity on Hover', 0.5, 'Transparency of Grab line (0.1 to 1)'],
    ['bubble_distance_on_particles', 'Hover Bubble Distance', 250, 'Hover Bubble Distance (Number only)'],
    ['bubble_line_opacity_on_particles', 'Bubble Line Opacity on Hover', 0, 'Transparency of Bubble line (0.1 to 1)'],
    ['bubble_size_on_hover_particles', 'Hover Bubble Size', 0, 'Bubble Size (Number Only)'],
    ['hover_event_duration_particles', 'Hover Duration', 2, 'Hover Duration (Number Only)'],
    ['speed_on_hover_particles', 'Hover Speed', 1, 'Number only']
];

maher_particles_settings_fields($mhFields);


/**
*
* Section Description
*
*/
function maher_particles_events_section_callback_function(){
    return;
}



