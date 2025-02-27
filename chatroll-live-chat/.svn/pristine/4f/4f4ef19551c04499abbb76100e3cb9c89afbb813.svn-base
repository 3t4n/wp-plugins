<?php
/**
 * Chatroll Live Chat platform extension
 * License: GPLv2
 */
class Chatroll
{
    /**
     * Render Chatroll HTML from shortcode
     * e.g. [chatroll id="" name="" apikey=""]
     */
    public function renderChatrollHtmlFromShortcode($shortcode) {
        return preg_replace_callback('/'.self::$shortcode_pattern.'/s', array($this, 'do_shortcode_tag'), $shortcode);
    }

    /**
     * OVERRIDE this method with platform specific implementation!
     *  - Set user parameters for SSO integration
     */
    public function appendPlatformDefaultAttr($attr) {
        return $attr;
    }

    /**
     * Render Chatroll HTML from attributes array
     */
    public function renderChatrollHtml($attr) {
        $defaults = array(
            'domain'        => 'chatroll.com',
            'platform'      => '',          // Reference platform
            'id'            => '',          // Chatroll ID
            'name'          => '',          // Chatroll name
            'apikey'        => '',          // API key for SSO
            'width'         => '450',       // Standard embed parameters
            'height'        => '350',
            'bgcolor'       => '',          // Appearance values (optional; overrides server-side config)
            'fgcolor'       => '',
            'textbgcolor'   => '',
            'textfgcolor'   => '',
            'border'        => '',
            'sound'         => '',
            'uid'           => '',          // SSO parameters (optional; overrides generated values)
            'uname'         => '',
            'upic'          => '',
            'ulink'         => '',
            'ismod'         => '',
        );
        $defaults = $this->appendPlatformDefaultAttr($defaults);       // Generate default parameters, based on platform specific user info
        $attr = $this->shortcode_atts($defaults, $attr);   // Merge specified parameter values w/ defaults

        // Format width and height attributes
        if (is_numeric($attr['width'])) {
            $attr['width'] = $attr['width'] . "px";
        }
        if (is_numeric($attr['height'])) {
            $attr['height'] = $attr['height'] . "px";
        }

        // Generate embed URL
        $url = "https://" . $attr['domain'] . "/embed/chat/" . $attr['name'] . '?platform=' . $attr['platform'];

        // Add standard GET parameters
        if (!empty($attr['id'])) {
            $url .= '&id=' . $attr['id'];
        }
        if (!empty($attr['fgcolor'])) {
            $url .= '&fgcolor=' . $attr['fgcolor'];
        }
        if (!empty($attr['bgcolor'])) {
            $url .= '&bgcolor=' . $attr['bgcolor'];
        }
        if (!empty($attr['textfgcolor'])) {
            $url .= '&textfgcolor=' . $attr['textfgcolor'];
        }
        if (!empty($attr['textbgcolor'])) {
            $url .= '&textbgcolor=' . $attr['textbgcolor'];
        }
        if (!empty($attr['sound']) || $attr['sound'] == '0') {
            $url .= '&sound=' . $attr['sound'];
        }
        if (!empty($attr['border']) || $attr['border'] == '0') {
            $url .= '&border=' . $attr['border'];
        }

        // Add SSO parameters
        $url .= '&uid=' . $attr['uid']; // Always append uid to indicate SSO request; empty uid or uid=0 indicates sign out
        if (!empty($attr['uname'])) {
            // Convert usernames to Chatroll compatible format:
            // 1) Trim whitespaces from begin/end
            // 2) Limit length to 64 
            $attr['uname'] = trim($attr['uname']);
            if (strlen($attr['uname']) > 64) {
                $attr['uname'] = substr($attr['uname'], 0, 64);
            }
            $url .= '&uname=' . urlencode($attr['uname']);
        }

        if (!empty($attr['ismod']) || $attr['ismod'] == '0') {
            $url .= '&ismod=' . $attr['ismod'];
        }

        if (!empty($attr['upic'])) {
            $url .= '&upic=' . urlencode($attr['upic']);
        }
        if (!empty($attr['ulink'])) {
            $url .= '&ulink=' . urlencode($attr['ulink']);
        }
        $url .= '&sig=' . md5($attr['uid'] . $attr['uname'] . $attr['ismod'] . $attr['apikey']);

        $url .= '&w=$0';

        // Generate iframe
        $output = "<iframe width='" . esc_attr($attr['width']) . "' height='" . esc_attr($attr['height']) . "'";
        $output .= " frameborder='0' scrolling='no' marginheight='0' marginwidth='0' allowtransparency='true' src='";
        $output .= esc_url($url);
        $output .= "'></iframe>";

        return $output;
    }


    //-----------------------------------------------------------------------
    // Shortcode functions
    //-----------------------------------------------------------------------

    // Chatroll shortcode regex pattern
    // e.g. [chatroll width="500" height="400" name="" id="" apikey=""]
    static $shortcode_pattern = '\[chatroll\b(.*?)(?:(\/))?\]';
    static $shortcode_atts_pattern = '/(\w+)\s*=\s*"([^"]*)"(?:\s|$)|(\w+)\s*=\s*\'([^\']*)\'(?:\s|$)|(\w+)\s*=\s*([^\s\'"]+)(?:\s|$)|"([^"]*)"(?:\s|$)|(\S+)(?:\s|$)/';

    // Parase shortcode attributes
    public function shortcode_parse_atts($text) {
        $atts = array();
        $text = preg_replace("/[\x{00a0}\x{200b}]+/u", " ", $text);
        if ( preg_match_all(self::$shortcode_atts_pattern, $text, $match, PREG_SET_ORDER) ) {
            foreach ($match as $m) {
                if (!empty($m[1]))
                    $atts[strtolower($m[1])] = stripcslashes($m[2]);
                elseif (!empty($m[3]))
                    $atts[strtolower($m[3])] = stripcslashes($m[4]);
                elseif (!empty($m[5]))
                    $atts[strtolower($m[5])] = stripcslashes($m[6]);
                elseif (isset($m[7]) and strlen($m[7]))
                    $atts[] = stripcslashes($m[7]);
                elseif (isset($m[8]))
                    $atts[] = stripcslashes($m[8]);
            }
        } else {
            $atts = ltrim($text);
        }
        return $atts;
    }

    // Combine default values w/ extracted attributes array
    public function shortcode_atts($pairs, $atts) {
        $atts = (array)$atts;
        $out = array();
        foreach($pairs as $name => $default) {
            if ( array_key_exists($name, $atts) )
                $out[$name] = $atts[$name];
            else
                $out[$name] = $default;
        }
        return $out;
    }

    public function do_shortcode_tag($m) {
        $attr = $this->shortcode_parse_atts($m[1]);
        return $this->renderChatrollHtml($attr);
    }
}
?>
