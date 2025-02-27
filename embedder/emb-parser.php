<?php
/*  Copyright 2010  Michael J. Walker (email: mike@moztools.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
    
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('EMB_LOCAL', 'local');
define('EMB_GLOBAL', 'global');

require_once("nbbc-1.4.5/nbbc.php");

// Override the HTMLEncode function to prevent
// the parser from turning the HTML into entities.
class EmbBBCode extends BBCode {
    function HTMLEncode($string) {
        return $string;
    }
}

new EmbEmbedParser();

class EmbEmbedParser {
    
    var $filter_local = array('the_content', 'the_title', 'comment_text');
    var $filter_comment = array('comment_text');
    var $filter_strip = array('wp_title');

    var $parser;    // NBBC parser for processing embeds
    var $settings;  // All global embed settings 
    var $embeds;    // Local and global embed rules
    var $comments;  // List of locals and globals allowed in comments
    
    var $level = 0; // Current recursion level of parser (usually zero).
    
    function EmbEmbedParser() {

        $this->parser = $this->initialize_parser();
        
        // The parser needs to go ahead of the wptexturize function
        // so we have to prioritize the embed filters higher than
        // the default of 10.
        
        // Process auto embeds.
        add_filter('the_content', array(&$this, 'add_auto_embeds'), 8);
        
        // Hooks for setting up the global and local embeds.
        add_action('wp', array(&$this, 'add_global_embeds'));
        add_action('the_post', array(&$this, 'add_local_embeds'));
        
        // Add embed parsing to the following output text.
        add_filter('the_content', array(&$this, 'do_embeds'), 9);
        add_filter('the_title', array(&$this, 'do_embeds'), 8);
        add_filter('comment_text', array(&$this, 'do_embeds'), 8);
        add_filter('widget_title', array(&$this, 'do_embeds'), 8);
        add_filter('widget_text', array(&$this, 'do_embeds'), 8);
        
        // Add filter to remove the embed shortcodes from the window title.
        add_filter('wp_title', array(&$this, 'do_embeds'), 8);
    }

    function initialize_parser() {
        
        $parser = new EmbBBCode();
        $parser->SetAllowAmpersand(true);
        $parser->SetEnableSmileys(false);
        $parser->SetIgnoreNewlines(true);
        return $parser;
    }
    
    function add_global_embeds() {
        global $wpdb;
        $entries = $wpdb->get_results("SELECT * FROM ".EMB_TABLE);
        if (count($entries) != 0) {
            foreach ($entries as $entry) {
                $embed = emb_prepare($entry);
                $this->settings[$entry->embed] = $embed;
                $userfunction = null;
                if (emb_is_set('user-function', $embed) && function_exists($embed->userfunction)) {
                    $userfunction = $embed->userfunction;
                }
                $this->add_rule($embed->embed, $this->get_value($embed), EMB_GLOBAL, emb_is_set('allow-in-comments', $embed),
                                !emb_is_disabled($embed->options), $userfunction);
            }
        }
    }
    
    function add_rule($name, $value, $type, $in_comments, $enabled = true, $userfunction = null) {
        $rule = Array('mode' => BBCODE_MODE_ENHANCED,
                      'class' => 'block', 
                      'allow_in' => array('block'),
                      'default' => array(),
        			  'end_tag' => BBCODE_PROHIBIT,
        );
        $attrs = emb_get_embed_attributes($value);
        if (!empty($attrs)) {
            foreach($attrs as $attr => $default) {
                if (!empty($default)) {
                    $rule['default'][$attr] = $default;
                }
                if ($attr == 'content' || $attr == '_content' ) {
                    $attrs[$attr] = '{$_content}';
                    $rule['end_tag'] = BBCODE_OPTIONAL;
                } else {
                    $attrs[$attr] = '{$'.$attr.'}';
                }
            }
        }
        if ($enabled) {
            $value = $this->convert_attributes($value, $attrs);
            $rule['template'] = $value;
            if (!empty($userfunction)) {
                $rule['method'] = $userfunction;
            }
        } else {
            // Disable by removing template (except for content if any)
            $rule['template'] = $rule['end_tag'] == BBCODE_OPTIONAL ? '{$_content}' : '';
        }
        $this->embeds[$type][$name] = $rule;
        // Make sure to add allowed embeds to comments list.
        if ($in_comments) {
            $this->comments[$type][] = $name;
        }
    }
    
    function get_value($embed) {
        $value = @html_entity_decode($embed->value, ENT_COMPAT, 'UTF-8');
        if (emb_is_set('wrap', $embed)) {
            $value = '<'.$embed->wrapwith.' class="'.$embed->wrapclass.'" style="'.$embed->wrapstyle.'">'.$value.'</'.$embed->wrapwith.'>';
        }
        return $value;
    }

    /**
     * Call old embed code here -- eventually we need to 
     * move the entire auto embed processing into this class.
     */
    function add_auto_embeds($content) {
        return emb_add_post_auto_embeds($content, $this->settings);
    }
    
    /**
     * Process the embed's attributes.
     */
    function convert_attributes($value, $attrs) {
        $var = array();
        $val = array();

        // Convert old style attributes to new style and
        // strip the default values out of the embed.
        if (!empty($attrs)) {
            foreach ($attrs as $k => $v) {
                $var[] = '/((%'.$k.'='.emb_get_match_default().'%)|(%'.$k.'%)'        // Old style
                .'|(\{\$'.$k.'='.emb_get_match_default(true).'\})|(\{\$'.$k.'\}))/i'; // New style
                $val[] = $v;
            }
        }
        
        // Handle escaped (old-style) attributes.
        $var[] = '/%!!/';
        $val[] = '%';
                
        return preg_replace($var, $val, $value);
    }
    
    function add_local_embeds($post) {
        // First remove existing locals which are from a previous post.
        $this->remove_local_embeds();
        // Register local embeds in the post's custom fields.
        $fields = get_post_custom($post->ID);
        $in_comments = !empty($fields['embed-comments']);
        if (!empty($fields)) {
            foreach ($fields as $name => $value) {
                $name = strtolower(trim($name));
                if (strpos($name, '[') == 0 && strpos($name, ']') == strlen($name) - 1) {
                    $name = trim($name, '[] ');
                    $this->add_rule($name, $value[0], EMB_LOCAL, $in_comments);
                }
            }
        }
    }
    
    function remove_local_embeds() {
        unset($this->embeds[EMB_LOCAL]);
        unset($this->comments[EMB_LOCAL]);
    }
    
    function do_embeds($content) {
        
        if ($this->level > 0) {
            // We are being called recursively from an embed
            // which means we need to make a copy of the
            // parser before we can continue.
            if (version_compare(PHP_VERSION, '5.0.0', '>=')) {
                $parser = clone($this->parser);
            } else {
                $parser = unserialize(serialize($this->parser));
            }
        } else {
            $parser = $this->parser;
        }
        // Now add in the appropriate rules depending on the filter being called.
        $filter = current_filter();
        $parser->SetPlainMode(false); 
        $parser->SetDefaultRules();
        
        // Add the global rules and filter non-comment embeds if necessary.
        if (!empty($this->embeds[EMB_GLOBAL])) {
            $parser->AddRules($this->embeds[EMB_GLOBAL]);
            if (in_array($filter, $this->filter_comment) && !empty($this->comments[EMB_GLOBAL])) {
                $parser->FilterRules($this->comments[EMB_GLOBAL]);
            }
        }
    
        // Add the local rules (if in a post) and filter non-comment embeds if necessary.
        if (in_array($filter, $this->filter_local) && !empty($this->embeds[EMB_LOCAL])) {
            $parser->AddRules($this->embeds[EMB_LOCAL]);
            if (in_array($filter, $this->filter_comment) && !empty($this->comments[EMB_LOCAL])) {
                $parser->FilterRules($this->comments[EMB_LOCAL]);
            }
        }
        
        // Filter out all embeds if we want to strip the text of embeds.
        if (in_array($filter, $this->filter_strip)) {
            $parser->SetPlainMode(true); 
        }
        
        $this->level++;
        $content = $parser->Parse($content);
        $this->level--;
        $parser->ClearRules();
        return $content;
    }
}