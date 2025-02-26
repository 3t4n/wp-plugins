<!--Shortcode usage template-->
<div class="adl-team-shortcode">
    <h2><?php esc_html_e('Shortcode For Displaying Team Members', ADL_TEAM_TEXTDOMAIN); ?> </h2>
    <p><?php esc_html_e('Use following shortcode to display the Team Members  anywhere:', ADL_TEAM_TEXTDOMAIN); ?></p>
    <textarea cols="40" rows="1" onClick="this.select();" >[adl-team id=<?php echo $post->ID;?>]</textarea> <br />

    <p><?php esc_html_e('If you need to put the shortcode in code/theme file, use this:', ADL_TEAM_TEXTDOMAIN); ?></p>
    <textarea cols="65" rows="1" onClick="this.select();" ><?php echo "<?php adl_team({$post->ID}); ?>"; ?></textarea>
</div>