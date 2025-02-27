<?php

/**
 * Provide a editor area view for the plugin
 * *
 * @link       https://plugin.nl/en/
 * @since      1.0.0
 *
 * @package    Websitescanner_Custom_Schema
 * @subpackage Websitescanner_Custom_Schema/admin/partials
 */

//Grab all options
$options = get_post_meta(get_the_ID(), 'websitescanner_custom_schema_post_data', true);

if (empty($options)) {
  $options = array();
  $options['custom_schema_0'] = false;
  $options['custom_schema_1'] = false;
  $options['custom_schema_2'] = false;
}

$custom_schema_0 = $options['custom_schema_0'];
$custom_schema_1 = $options['custom_schema_1'];
$custom_schema_2 = $options['custom_schema_2'];

function prettyPrint( $json )
{
    $result = '';
    $level = 0;
    $in_quotes = false;
    $in_escape = false;
    $ends_line_level = NULL;
    $json_length = strlen( $json );

    for( $i = 0; $i < $json_length; $i++ ) {
        $char = $json[$i];
        $new_line_level = NULL;
        $post = "";
        if( $ends_line_level !== NULL ) {
            $new_line_level = $ends_line_level;
            $ends_line_level = NULL;
        }
        if ( $in_escape ) {
            $in_escape = false;
        } else if( $char === '"' ) {
            $in_quotes = !$in_quotes;
        } else if( ! $in_quotes ) {
            switch( $char ) {
                case '}': case ']':
                    $level--;
                    $ends_line_level = NULL;
                    $new_line_level = $level;
                    break;

                case '{': case '[':
                    $level++;
                    break;

                case ',':
                    $ends_line_level = $level;
                    break;

                case ':':
                    $post = " ";
                    break;

                case " ": case "\t": case "\n": case "\r":
                    $char = "";
                    $ends_line_level = $new_line_level;
                    $new_line_level = NULL;
                    break;
                default:
                    break;

            }
        } else if ( $char === '\\' ) {
            $in_escape = true;
        }
        if( $new_line_level !== NULL ) {
            $result .= "\n".str_repeat( "\t", $new_line_level );
        }
        $result .= $char.$post;
    }

    return $result;
}


?>
<p>
  <?php esc_attr_e( 'Write down your JSON-ld Schema markup for this page without the &lt;script&gt; tags. For more info about schema visit ', $this->plugin_name ); ?> <a target="_blank" href="https://schema.org">Schema.org</a>.</p><p>
  <?php esc_attr_e( 'To check if your Schema is correct you can use the ', $this->plugin_name ); ?> <a target="_blank" href="https://search.google.com/structured-data/testing-tool/u/0/<?php if ( get_post_status ( get_the_ID() ) == 'publish' ) { echo "#url=" . urlencode(get_permalink(get_the_ID())); } ?>">Google Structured Data Testing Tool</a>
  <?php esc_attr_e( '(Your page/post has to be published for this) ', $this->plugin_name ); ?>.
</p><br>

<textarea name="<?php echo esc_attr($this->plugin_name); ?>[custom_schema_0]" data-id="0" id="webs-custom-schema-0" class="webs-custom-schema widefat" cols="50" rows="5"><?php if (isset($custom_schema_0)){ echo prettyPrint(wp_unslash(json_decode($custom_schema_0)));} ?></textarea>
<label for="webs-custom-schema-0" class="webs-custom-schema-error" id="webs-custom-schema-errors-0" class=""><?php esc_attr_e('Unchanged', $this->plugin_name); ?></label></br><br>

<?php if(!$custom_schema_1 && !$custom_schema_2){ ?>
<div class="webs-more-link">
<a href="#" class="show-custom-schema-fields components-button is-button is-default is-large">Show more JSON-ld fields</a>
</div>
<?php } ?>
<span class="webs-schema-1 <?php if(!$custom_schema_1 && !$custom_schema_2){echo "hidden";}?>">
<textarea name="<?php echo esc_attr($this->plugin_name); ?>[custom_schema_1]" data-id="1" id="webs-custom-schema-1" class="webs-custom-schema widefat" cols="50" rows="5"><?php if (isset($custom_schema_1)){echo prettyPrint(wp_unslash(json_decode($custom_schema_1)));} ?></textarea>
<span class="webs-custom-schema-error" id="webs-custom-schema-errors-1" class=""><?php esc_attr_e('Unchanged', $this->plugin_name); ?></span></br><br>
</span>
<span class="webs-schema-2 <?php if(!$custom_schema_1 && !$custom_schema_2){echo "hidden";}?>">
<textarea name="<?php echo esc_attr($this->plugin_name); ?>[custom_schema_2]" data-id="2" id="webs-custom-schema-2" class="webs-custom-schema widefat" cols="50" rows="5"><?php if (isset($custom_schema_2)){echo prettyPrint(wp_unslash(json_decode($custom_schema_2)));} ?></textarea>
<span class="webs-custom-schema-error" id="webs-custom-schema-errors-2" class=""><?php esc_attr_e('Unchanged', $this->plugin_name); ?></span></br><br>
</span>
<span class="webs-more-link hidden">
<a href="#" class="show-custom-schema-fields components-button is-button is-default is-large">Show less JSON-ld fields</a>
</span>
