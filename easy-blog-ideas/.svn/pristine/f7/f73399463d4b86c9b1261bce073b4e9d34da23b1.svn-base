<?php
global $pro, $_search_type;
?>

<?php
    if (isset($pro) && $pro) {
?>
                <td scope="row">
                    <label for="search-range"><?php _e("Search duration", PIG_PLUGIN_SLUG__);?></label>
                    <select name="search-range" id="search-range" class="refresh-form">
<?php
        $range       = array(
                        "6m"        => "Past 6 Months",
                        "24h"       => "Last 24 Hours",
                        "1w"        => "Past Week",
                        "1m"        => "Past Month",
                        "1y"        => "Past Year",
        );
        foreach ($range as $key=>$label) {
            $selected       = isset($_POST["search-range"]) && $_POST["search-range"] == $key ? "selected" : "";
?>
                        <option value="<?php echo $key;?>" <?php echo $selected;?>><?php _e($label, PIG_PLUGIN_SLUG__);?></option>
<?php
        }
?>
                    </select>
                </td>
<?php
    }

    if (isset($pro) && $pro) {
?>
                <td scope="row">
                    <label for="search-sort"><?php _e("Sort by", PIG_PLUGIN_SLUG__);?></label>
                    <select name="search-sort" id="search-sort" class="<?php echo (isset($pro) && $pro) ? "refresh-form" : ""?>">
<?php
        $sort       = array(
                        "engagement"    => "Engagement",
                        "applause"      => "Applause",
                        "shares"        => "Shares",
                        "relevance"     => "Relevance",
                        "facebook"      => "Facebook",
                        "linkedin"      => "LinkedIn",
                        "googleplus"    => "Google+",
        );
        foreach ($sort as $key=>$label) {
            $selected       = isset($_POST["search-sort"]) && $_POST["search-sort"] == $key ? "selected" : "";
?>
                        <option value="<?php echo $key;?>" <?php echo $selected;?>><?php _e($label, PIG_PLUGIN_SLUG__);?></option>
<?php
        }
?>
                    </select>
                </td>
<?php
    }

    if (isset($pro) && $pro) {
?>
                <td scope="row">
                    <label for="search-type"><?php _e("Search for", PIG_PLUGIN_SLUG__);?></label>
                    <select name="search-type" id="search-type" class="<?php echo (isset($pro) && $pro) ? "refresh-form" : ""?>">
<?php
        $type       = array(
                        ""              => "Any",
                        "audio"         => "Audio",
                        "article"       => "Blog posts",
                        "casestudy"     => "Case Study",
                        "ebook"         => "eBook",
                        "image"         => "Image",
                        "infographic"   => "Infographics",
                        "podcast"       => "Podcast",
                        "slideshow"     => "Slideshow",
                        "video"         => "Videos",
                        "webinar"       => "Webinar",
                        "whitepaper"    => "Whitepaper",
        );
        foreach ($type as $key=>$label) {
            $selected       = isset($_POST["search-type"]) && $_POST["search-type"] == $key ? "selected" : "";
?>
                        <option value="<?php echo $key;?>" <?php echo $selected;?>><?php _e($label, PIG_PLUGIN_SLUG__);?></option>
<?php
        }
?>
                    </select>
                </td>
<?php
    }
?>
                <td scope="row">
                    <input type="checkbox" name="show-images" id="show-images" value="1" <?php echo $show_images ? "checked" : "" ?> class="refresh-form">
                    <label for="show-images"><?php _e("Show images", PIG_PLUGIN_SLUG__);?></label>
                    <input type="hidden" name="show-images-old" value="1">
                </td>
