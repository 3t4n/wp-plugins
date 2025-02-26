<?php
    $defaults = [
        'user' => '',
        'title' => 'Last.fm RPS',
        'size' => 10,
        'position' => 'left',
        'footer_text' => '',
        'header_text' => '',
        'showbadge' => true,
        'badgeposition' => 'top',
        "showavatar" => true,
        "showrealname" => true,
        "showgender" => true,
        "showage" => true,
        "showcountry" => true,
        "showregister" => true,
        "showtrackcount" => true,
        'color' => "black",
        'caching' => "true",
        'cache_duration' => 7200
    ];
    $options = array_merge($defaults, $instance);
?>
    <p>
        <b><?php echo __("Widget Title: ", "lastfmrps");?></b><br>
        <input type="text" class="widefat" name="lastfm_recent_title" value="<?php echo $options['title']; ?>" />
    </p>
    <p>
        <b><?php _e("Logo Color: ", "lastfmrps");?></b><br>
        <select name="lastfm_recent_color" class="widefat">
            <option value="red" <?php if ("crimson" == $options["color"]) echo "selected"; ?>><?php _e("Red", "lastfmrps");?></option>
            <option value="black" <?php if ("black" == $options["color"]) echo "selected"; ?>><?php _e("Black", "lastfmrps");?></option>
            <option value="white" <?php if ("white" == $options["color"]) echo "selected"; ?>><?php _e("White", "lastfmrps");?></option>
        </select>
    </p>
    <p>
        <b><?php _e("Last.fm Username:", "lastfmrps");?></b><br>
        <input type="text" class="widefat" name="lastfm_recent_user" value="<?php echo $options['user']; ?>" />
        <input type="hidden" name="lastfm_recent_submit" value="1" />
    </p>
    <p>
        <b><?php _e("List size: ", "lastfmrps");?></b><br>
        <select name="lastfm_recent_size" class="widefat">
        <?php for ($i = 1; $i < 51; $i++) { ?>
            <option value="<?= $i ?>" <?php if ($i == $options["size"]) echo "selected"; ?>><?= $i ?></option>
        <?php } ?>
        </select>
    </p>
    <p>
        <b><?php _e("Image Position: ", "lastfmrps");?></b><br>
        <select name="lastfm_recent_position" class="widefat">
            <option value="left" <?php if ("left" == $options["position"]) echo "selected"; ?>><?php _e("Left", "lastfmrps");?></option>
            <option value="right" <?php if ("right" == $options["position"]) echo "selected"; ?>><?php _e("Right", "lastfmrps");?></option>
        </select>
    </p>
    <p>
        <label>
            <b><?php _e("Show Badge? ", "lastfmrps");?></b>
            <input type="checkbox" <?php echo ($options[ "showbadge"]) ? "checked" : ""; ?> name="lastfm_recent_showbadge" />
        </label>
    </p>
    <p>
        <b><?php _e("Badge Position:", "lastfmrps");?></b><br>
        <select name="lastfm_recent_badgeposition" class="widefat">
            <option value="top" <?php if ("top" == $options["badgeposition"]) echo "selected"; ?>><?php _e("Top", "lastfmrps");?></option>
            <option value="bottom" <?php if ("bottom" == $options["badgeposition"]) echo "selected"; ?>><?php _e("Bottom", "lastfmrps");?></option>
        </select>
    </p>
    <p>
        <b><?php _e("Badge Options: ", "lastfmrps");?></b><br>
        <label><input type="checkbox" class="checkbox" <?php echo ($options[ "showavatar"]) ? "checked" : ""; ?> name="lastfm_recent_showavatar" />
        <?php _e("Show Picture", "lastfmrps");?></label><br>
        <label><input type="checkbox" class="checkbox" <?php echo ($options[ "showrealname"]) ? "checked" : ""; ?> name="lastfm_recent_showrealname" />
        <?php _e("Show Real Name", "lastfmrps");?></label><br>
        <label><input type="checkbox" class="checkbox" <?php echo ($options[ "showgender"]) ? "checked" : ""; ?> name="lastfm_recent_showgender" />
        <?php _e("Show Gender", "lastfmrps");?></label><br>
        <label><input type="checkbox" class="checkbox" <?php echo ($options[ "showage"]) ? "checked" : ""; ?> name="lastfm_recent_showage" />
        <?php _e("Show Age", "lastfmrps");?></label><br>
        <label><input type="checkbox" class="checkbox" <?php echo ($options[ "showcountry"]) ? "checked" : ""; ?> name="lastfm_recent_showcountry" />
        <?php _e("Show Country", "lastfmrps");?></label><br>
        <label><input type="checkbox" class="checkbox" <?php echo ($options[ "showregister"]) ? "checked" : ""; ?> name="lastfm_recent_showregister" />
        <?php _e("Show Registration Date", "lastfmrps");?></label><br>
        <label><input type="checkbox" class="checkbox" <?php echo ($options[ "showtrackcount"]) ? "checked" : ""; ?> name="lastfm_recent_showtrackcount" />
        <?php _e("Show Track Count", "lastfmrps");?></label><br>
    </p>
    <p>
        <label>
            <b><?php _e("Enable Caching?", "lastfmrps");?> </b>
            <input type="checkbox" <?php echo ($options[ "caching"]) ? "checked" : ""; ?> name="lastfm_recent_caching" />
        </label>
    </p>
    <p>
        <b><?php _e("Cache Duration (seconds)", "lastfmrps");?></b><br>
        <input type="number" name="lastfm_recent_cache_duration" class="widefat" min="0" step="1" value="<?php echo intval($options['cache_duration']); ?>" >
    </p>
    <p>
        <b><?php _e("Optional Header Text:", "lastfmrps");?> </b><br>
        <textarea class="widefat" name="lastfm_recent_header_text" rows=5 cols=25><?php echo stripslashes($options["header_text"]) ?></textarea>
        <br><small><?php _e("Optional text to be displayed at the top of the widget. You can use html.", "lastfmrps");?></small>
    </p>
    <p>
        <b><?php _e("Optional Footer Text:", "lastfmrps");?> </b><br>
        <textarea class="widefat" name="lastfm_recent_footer_text" rows=5 cols=25><?php echo stripslashes($options["footer_text"]) ?></textarea>
        <br><small><?php _e("Optional text to be displayed at the bottom of the widget. You can use html.", "lastfmrps");?></small>
    </p>