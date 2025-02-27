<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die("Don't try to access directly :-( ");
}
?>
<div class="container">
    <h2 style="text-align: center; font-size: 30px;">ParticleJS Banner Settings</h2>
    <?php settings_errors(); ?>
    <form action="options.php" method="POST" id="field-design">
        <?php do_settings_sections("particlejs-banner"); ?>
        
        <?php settings_fields("particles_events_section_id"); ?>
   
        <?php submit_button(); ?>
    </form>

</div>