<?php
defined('ABSPATH') or die('No direct access permitted');

    // get and show follow buttons
    function sfbl_show_follow_buttons($content, $booShortCode = false)
    {
        // get sfbl settings
        $sfbl_settings = get_sfbl_settings();

        // variables
        $buttons = '';

        // placement on pages/posts/categories/archives/homepage
        if ((! is_home() && ! is_front_page() && is_page() && $sfbl_settings['pages'] == 'Y') || (is_single() && $sfbl_settings['posts'] == 'Y') || $booShortCode == true) {
            // sfbl comment
            $buttons.= '<!-- Simple Follow Buttons Light (v'.SFBL_VERSION.') simplefollowbuttons.com/light -->';

            // get wrap
            $buttons.= '<div class="sfbl-wrap">';

                // sfbl div
                $buttons.= '<div class="sfbl-container">';

                    // if there is some follow text
                    if ($sfbl_settings['follow_text'] != '') {
                        // add follow text
                        $buttons.= '<span class="sfbl-follow-text">'.$sfbl_settings['follow_text'].'</span>';
                    }

                    // initiate class and get buttons
                    $sfblButtons = new SFBL_Buttons($sfbl_settings);

                    // add the buttons
                    $buttons.= $sfblButtons->get_buttons();

                // close container div
                $buttons.= '</div>';

            // close wrap div
            $buttons.= '</div>';

            // adding shortcode buttons
            if ($booShortCode == true) {
                return $buttons;
            } else {
                // return buttons after content
                return $content.$buttons;
            }
        } else {
            // no buttons
            return $content;
        }
    }

    // shortcode for adding buttons
    function sfbl_buttons($atts)
    {
        // get buttons - NULL for $content, TRUE for shortcode flag
        return sfbl_show_follow_buttons(null, true, $atts);
    }

    // shortcode for hiding buttons
    function sfbl_hide($content)
    {
        // nothing to do here
    }

    /**
    * Simple Follow Buttons Light
    */
    class SFBL_Buttons {

        // variables
        public $buttons;
        public $images;
        public $return;

    	function __construct($settings)
    	{
        	// prepare class variables
        	$this->settings = $settings;

        	// include the images needed ready
            $this->images = include_once SFBL_ROOT.'/buttons/'.$settings['image_set'].'.php';

            // prepare array of buttons
            $this->buttons = json_decode(get_option('sfbl_buttons'), true);
    	}

    	// get all buttons
    	function get_buttons()
    	{
        	// explode saved include list and add to a new array
            $selected = explode(',', $this->settings['selected_buttons']);

            // for each included button
            foreach ($selected as $button) {
                // prepare function name
                $function = 'sfbl_' . $button;

                // add each follow button
                $this->return .= $this->$function();
            }

            // return the buttons
            return $this->return;
    	}

        // get diggit button
        function sfbl_diggit()
        {
            // diggit follow link
            $return = '<a target="_blank" class="sfbl_diggit_follow sfbl_follow_link" href="'.$this->buttons['diggit']['url_prefix'].$this->settings['url_diggit'].'">';

            // show sfbl image
            $return .= '<img src="'.$this->images['diggit'].'" title="Digg" class="sfbl sfbl-img" alt="Follow on Diggit" />';

            // close href
            $return .= '</a>';

            // return follow buttons
            return $return;
        }

        // get email button
        function sfbl_email()
        {
            // email follow link
            $return = '<a class="sfbl_email_follow" href="mailto:'.$this->settings['url_email'].'?subject=&amp;body=">';

            // show sfbl image
            $return .= '<img src="'.$this->images['email'].'" title="Email" class="sfbl sfbl-img" alt="Email us" />';

            // close href
            $return .= '</a>';

            // return follow buttons
            return $return;
        }

        // get facebook button
        function sfbl_facebook()
        {
            // facebook follow link
            $return = '<a target="_blank" class="sfbl_facebook_follow" href="'.$this->buttons['facebook']['url_prefix'].$this->settings['url_facebook'].'">';

                // show selected sfbl image
                $return .= '<img src="'.$this->images['facebook'].'" title="Facebook" class="sfbl sfbl-img" alt="Follow on Facebook" />';

            // close href
            $return .= '</a>';

            // return follow button
            return $return;
        }

        // get google+ button
        function sfbl_google()
        {
            // google follow link
            $return = '<a target="_blank" class="sfbl_google_follow" href="'.$this->buttons['google']['url_prefix'].$this->settings['url_google'].'">';

            // show sfbl image
            $return .= '<img src="'.$this->images['google'].'" title="Google+" class="sfbl sfbl-img" alt="Follow on Google+" />';

            // close href
            $return .= '</a>';

            // return follow buttons
            return $return;
        }

        // get linkedin button
        function sfbl_linkedin()
        {
            // linkedin follow link
            $return = '<a target="_blank" class="sfbl_linkedin_follow sfbl_follow_link" href="'.$this->buttons['linkedin']['url_prefix'].$this->settings['url_linkedin'].'">';

            // show sfbl image
            $return .= '<img src="'.$this->images['linkedin'].'" title="LinkedIn" class="sfbl sfbl-img" alt="Follow on LinkedIn" />';

            // close href
            $return .= '</a>';

            // return follow buttons
            return $return;
        }

        // get pinterest button
        function sfbl_pinterest()
        {
            // pinterest follow link
            $return = '<a target="_blank" class="sfbl_pinterest_follow sfbl_follow_link" href="'.$this->buttons['pinterest']['url_prefix'].$this->settings['url_pinterest'].'">';

            // show sfbl image
            $return .= '<img src="'.$this->images['pinterest'].'" title="Pinterest" class="sfbl sfbl-img" alt="Follow on Pinterest" />';

            // close href
            $return .= '</a>';

            // return follow buttons
            return $return;
        }

        // get reddit button
        function sfbl_reddit()
        {
            // reddit follow link
            $return = '<a target="_blank" class="sfbl_reddit_follow" href="'.$this->buttons['reddit']['url_prefix'].$this->settings['url_reddit'].'">';

                // show sfbl image
                $return .= '<img src="'.$this->images['reddit'].'" title="Reddit" class="sfbl sfbl-img" alt="Follow on Reddit" />';

            // close href
            $return .= '</a>';

            // return follow buttons
            return $return;
        }

        // get tumblr button
        function sfbl_tumblr()
        {
            // tumblr follow link
            $return = '<a target="_blank" class="sfbl_tumblr_follow" href="'.$this->buttons['tumblr']['url_prefix'].$this->settings['url_tumblr'].$this->buttons['tumblr']['url_suffix'].'">';

            // show sfbl image
            $return .= '<img src="'.$this->images['tumblr'].'" title="tumblr" class="sfbl sfbl-img" alt="Follow on Tumblr" />';

            // close href
            $return .= '</a>';

            // return follow buttons
            return $return;
        }

        // get twitter button
        function sfbl_twitter()
        {
            // twitter follow link
            $return = '<a target="_blank" class="sfbl_twitter_follow" href="'.$this->buttons['twitter']['url_prefix'].$this->settings['url_twitter'].'">';

            // show sfbl image
            $return .= '<img src="'.$this->images['twitter'].'" title="Twitter" class="sfbl sfbl-img" alt="Follow on Twitter" />';

            // close href
            $return .= '</a>';

            // return follow button
            return $return;
        }

        // get vk button
        function sfbl_vk()
        {
            // vk follow link
            $return = '<a target="_blank" class="sfbl_vk_follow sfbl_follow_link" href="'.$this->buttons['vk']['url_prefix'].$this->settings['url_vk'].'">';

                // show sfbl image
                $return .= '<img src="'.$this->images['vk'].'" title="VK" class="sfbl sfbl-img" alt="Follow on VK" />';

            // close href
            $return .= '</a>';

            // return follow buttons
            return $return;
        }

        // get yummly button
        function sfbl_yummly()
        {
            // yummly follow link
            $return = '<a target="_blank" class="sfbl_yummly_follow sfbl_follow_link" href="'.$this->buttons['yummly']['url_prefix'].$this->settings['url_yummly'].'">';

                // show sfbl image
                $return .= '<img src="'.$this->images['yummly'].'" title="Yummly" class="sfbl sfbl-img" alt="Follow on Yummly" />';

            // close href
            $return .= '</a>';

            // return follow buttons
            return $return;
        }
    }

