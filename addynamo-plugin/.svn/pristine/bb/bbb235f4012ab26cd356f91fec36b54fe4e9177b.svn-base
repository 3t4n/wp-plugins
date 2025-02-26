<?php
/*
Plugin Name: Addynamo
Plugin URI: http://www.addynamo.com
Description: Inserts the Addynamo embedding code into your blog. After you activate the plugin you can view the settings by going to Addynamo on the settings menu
Version: 1
Author: Addynamo
Author URI: http://www.addynamo.com
*/

/*	Copyright 2008  Addynamo

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
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

define('POST_LAYOUT', true);

$pstl_options = get_option('pstl');

add_action('the_content', 'pstl_the_content');
function pstl_the_content(&$content)
{
    global $pstl_options;

	if (is_feed()) return $content;
	
    $title = get_the_title();
    $title_encoded = urlencode($title);
    $link = get_permalink();
    $link_encoded = urlencode($link);

    if (is_single())
    {
        if ($pstl_options['post_home'])
        {
			if ($pstl_options['home_before'] != "") {
				$before_start = '<script type="text/javascript">';
				$before_start = $before_start . 'var _adynamo_client = "';
				$before_start = $before_start . $pstl_options['home_before']; //ID
				$before_end = '";';
				$before_end = $before_end . 'var _adynamo_width = ';
				$before_end = $before_end . $pstl_options['home_before_width']; //WIDTH
				$before_end = $before_end . ';';
				$before_end = $before_end . 'var _adynamo_height = ';
				$before_end = $before_end . $pstl_options['home_before_height']; //HEIGHT
				$before_end = $before_end . ';';
				$before_end = $before_end . '</script>';
				$before_end = $before_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$before = $before_start . $before . $before_end;
			}
			if ($pstl_options['home_after'] != "") {
				$after_start = '<script type="text/javascript">';
				$after_start = $after_start . 'var _adynamo_client = "';
				$after_start = $after_start . $pstl_options['home_after']; //ID
				$after_end = '";';
				$after_end = $after_end . 'var _adynamo_width = ';
				$after_end = $after_end . $pstl_options['home_after_width']; //WIDTH
				$after_end = $after_end . ';';
				$after_end = $after_end . 'var _adynamo_height = ';
				$after_end = $after_end . $pstl_options['home_after_height']; //HEIGHT
				$after_end = $after_end . ';';
				$after_end = $after_end . '</script>';
				$after_end = $after_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$after = $after_start . $after . $after_end;
			}
        }
        else
        {
			if ($pstl_options['post_before'] != "") {
				$before_start = '<script type="text/javascript">';
				$before_start = $before_start . 'var _adynamo_client = "';
				$before_start = $before_start . $pstl_options['post_before']; //ID
				$before_end = '";';
				$before_end = $before_end . 'var _adynamo_width = ';
				$before_end = $before_end . $pstl_options['post_before_width']; //WIDTH
				$before_end = $before_end . ';';
				$before_end = $before_end . 'var _adynamo_height = ';
				$before_end = $before_end . $pstl_options['post_before_height']; //HEIGHT
				$before_end = $before_end . ';';
				$before_end = $before_end . '</script>';
				$before_end = $before_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$before = $before_start . $before . $before_end;
			}
			if ($pstl_options['post_after'] != "") {
				$after_start = '<script type="text/javascript">';
				$after_start = $after_start . 'var _adynamo_client = "';
				$after_start = $after_start . $pstl_options['post_after']; //ID
				$after_end = '";';
				$after_end = $after_end . 'var _adynamo_width = ';
				$after_end = $after_end . $pstl_options['post_after_width']; //WIDTH
				$after_end = $after_end . ';';
				$after_end = $after_end . 'var _adynamo_height = ';
				$after_end = $after_end . $pstl_options['post_after_height']; //HEIGHT
				$after_end = $after_end . ';';
				$after_end = $after_end . '</script>';
				$after_end = $after_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$after = $after_start . $after . $after_end;
			}
        }
        //$more = $pstl_options['post_more'];
    }
    else if (is_page())
    {
        if ($pstl_options['post_home'])
        {
			if ($pstl_options['home_before'] != "") {
				$before_start = '<script type="text/javascript">';
				$before_start = $before_start . 'var _adynamo_client = "';
				$before_start = $before_start . $pstl_options['home_before']; //ID
				$before_end = '";';
				$before_end = $before_end . 'var _adynamo_width = ';
				$before_end = $before_end . $pstl_options['home_before_width']; //WIDTH
				$before_end = $before_end . ';';
				$before_end = $before_end . 'var _adynamo_height = ';
				$before_end = $before_end . $pstl_options['home_before_height']; //HEIGHT
				$before_end = $before_end . ';';
				$before_end = $before_end . '</script>';
				$before_end = $before_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$before = $before_start . $before . $before_end;
			}
			if ($pstl_options['home_after'] != "") {
				$after_start = '<script type="text/javascript">';
				$after_start = $after_start . 'var _adynamo_client = "';
				$after_start = $after_start . $pstl_options['home_after']; //ID
				$after_end = '";';
				$after_end = $after_end . 'var _adynamo_width = ';
				$after_end = $after_end . $pstl_options['home_after_width']; //WIDTH
				$after_end = $after_end . ';';
				$after_end = $after_end . 'var _adynamo_height = ';
				$after_end = $after_end . $pstl_options['home_after_height']; //HEIGHT
				$after_end = $after_end . ';';
				$after_end = $after_end . '</script>';
				$after_end = $after_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$after = $after_start . $after . $after_end;
			}
        }
        else if ($pstl_options['page_post'])
        {
			if ($pstl_options['post_before'] != "") {
				$before_start = '<script type="text/javascript">';
				$before_start = $before_start . 'var _adynamo_client = "';
				$before_start = $before_start . $pstl_options['post_before']; //ID
				$before_end = '";';
				$before_end = $before_end . 'var _adynamo_width = ';
				$before_end = $before_end . $pstl_options['post_before_width']; //WIDTH
				$before_end = $before_end . ';';
				$before_end = $before_end . 'var _adynamo_height = ';
				$before_end = $before_end . $pstl_options['post_before_height']; //HEIGHT
				$before_end = $before_end . ';';
				$before_end = $before_end . '</script>';
				$before_end = $before_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$before = $before_start . $before . $before_end;
			}
			if ($pstl_options['post_after'] != "") {
				$after_start = '<script type="text/javascript">';
				$after_start = $after_start . 'var _adynamo_client = "';
				$after_start = $after_start . $pstl_options['post_after']; //ID
				$after_end = '";';
				$after_end = $after_end . 'var _adynamo_width = ';
				$after_end = $after_end . $pstl_options['post_after_width']; //WIDTH
				$after_end = $after_end . ';';
				$after_end = $after_end . 'var _adynamo_height = ';
				$after_end = $after_end . $pstl_options['post_after_height']; //HEIGHT
				$after_end = $after_end . ';';
				$after_end = $after_end . '</script>';
				$after_end = $after_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$after = $after_start . $after . $after_end;
			}
        }
        else
        {
			if ($pstl_options['page_before'] != "") {
				$before_start = '<script type="text/javascript">';
				$before_start = $before_start . 'var _adynamo_client = "';
				$before_start = $before_start . $pstl_options['page_before']; //ID
				$before_end = '";';
				$before_end = $before_end . 'var _adynamo_width = ';
				$before_end = $before_end . $pstl_options['page_before_width']; //WIDTH
				$before_end = $before_end . ';';
				$before_end = $before_end . 'var _adynamo_height = ';
				$before_end = $before_end . $pstl_options['page_before_height']; //HEIGHT
				$before_end = $before_end . ';';
				$before_end = $before_end . '</script>';
				$before_end = $before_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$before = $before_start . $before . $before_end;
			}
			if ($pstl_options['page_after'] != "") {
				$after_start = '<script type="text/javascript">';
				$after_start = $after_start . 'var _adynamo_client = "';
				$after_start = $after_start . $pstl_options['page_after']; //ID
				$after_end = '";';
				$after_end = $after_end . 'var _adynamo_width = ';
				$after_end = $after_end . $pstl_options['page_after_width']; //WIDTH
				$after_end = $after_end . ';';
				$after_end = $after_end . 'var _adynamo_height = ';
				$after_end = $after_end . $pstl_options['paeg_after_height']; //HEIGHT
				$after_end = $after_end . ';';
				$after_end = $after_end . '</script>';
				$after_end = $after_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$after = $after_start . $after . $after_end;
			}
        }
    }
    else if (is_home())
    {
		if ($pstl_options['home_before'] != "") {
			$before_start = '<script type="text/javascript">';
			$before_start = $before_start . 'var _adynamo_client = "';
			$before_start = $before_start . $pstl_options['home_before']; //ID
			$before_end = '";';
			$before_end = $before_end . 'var _adynamo_width = ';
			$before_end = $before_end . $pstl_options['home_before_width']; //WIDTH
			$before_end = $before_end . ';';
			$before_end = $before_end . 'var _adynamo_height = ';
			$before_end = $before_end . $pstl_options['home_before_height']; //HEIGHT
			$before_end = $before_end . ';';
			$before_end = $before_end . '</script>';
			$before_end = $before_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
			$before = $before_start . $before . $before_end;
		}
		if ($pstl_options['home_after'] != "") {
			$after_start = '<script type="text/javascript">';
			$after_start = $after_start . 'var _adynamo_client = "';
			$after_start = $after_start . $pstl_options['home_after']; //ID
			$after_end = '";';
			$after_end = $after_end . 'var _adynamo_width = ';
			$after_end = $after_end . $pstl_options['home_after_width']; //WIDTH
			$after_end = $after_end . ';';
			$after_end = $after_end . 'var _adynamo_height = ';
			$after_end = $after_end . $pstl_options['home_after_height']; //HEIGHT
			$after_end = $after_end . ';';
			$after_end = $after_end . '</script>';
			$after_end = $after_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
			$after = $after_start . $after . $after_end;
		}
    }


    else if (is_category())
    {
        if ($pstl_options['post_home'])
        {
			if ($pstl_options['home_before'] != "") {
				$before_start = '<script type="text/javascript">';
				$before_start = $before_start . 'var _adynamo_client = "';
				$before_start = $before_start . $pstl_options['home_before']; //ID
				$before_end = '";';
				$before_end = $before_end . 'var _adynamo_width = ';
				$before_end = $before_end . $pstl_options['home_before_width']; //WIDTH
				$before_end = $before_end . ';';
				$before_end = $before_end . 'var _adynamo_height = ';
				$before_end = $before_end . $pstl_options['home_before_height']; //HEIGHT
				$before_end = $before_end . ';';
				$before_end = $before_end . '</script>';
				$before_end = $before_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$before = $before_start . $before . $before_end;
			}
			if ($pstl_options['home_after'] != "") {
				$after_start = '<script type="text/javascript">';
				$after_start = $after_start . 'var _adynamo_client = "';
				$after_start = $after_start . $pstl_options['home_after']; //ID
				$after_end = '";';
				$after_end = $after_end . 'var _adynamo_width = ';
				$after_end = $after_end . $pstl_options['home_after_width']; //WIDTH
				$after_end = $after_end . ';';
				$after_end = $after_end . 'var _adynamo_height = ';
				$after_end = $after_end . $pstl_options['home_after_height']; //HEIGHT
				$after_end = $after_end . ';';
				$after_end = $after_end . '</script>';
				$after_end = $after_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$after = $after_start . $after . $after_end;
			}
        }
        else if ($pstl_options['page_post'])
        {
			if ($pstl_options['post_before'] != "") {
				$before_start = '<script type="text/javascript">';
				$before_start = $before_start . 'var _adynamo_client = "';
				$before_start = $before_start . $pstl_options['post_before']; //ID
				$before_end = '";';
				$before_end = $before_end . 'var _adynamo_width = ';
				$before_end = $before_end . $pstl_options['post_before_width']; //WIDTH
				$before_end = $before_end . ';';
				$before_end = $before_end . 'var _adynamo_height = ';
				$before_end = $before_end . $pstl_options['post_before_height']; //HEIGHT
				$before_end = $before_end . ';';
				$before_end = $before_end . '</script>';
				$before_end = $before_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$before = $before_start . $before . $before_end;
			}
			if ($pstl_options['post_after'] != "") {
				$after_start = '<script type="text/javascript">';
				$after_start = $after_start . 'var _adynamo_client = "';
				$after_start = $after_start . $pstl_options['post_after']; //ID
				$after_end = '";';
				$after_end = $after_end . 'var _adynamo_width = ';
				$after_end = $after_end . $pstl_options['post_after_width']; //WIDTH
				$after_end = $after_end . ';';
				$after_end = $after_end . 'var _adynamo_height = ';
				$after_end = $after_end . $pstl_options['post_after_height']; //HEIGHT
				$after_end = $after_end . ';';
				$after_end = $after_end . '</script>';
				$after_end = $after_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$after = $after_start . $after . $after_end;
			}
        }
		else if ($pstl_options['page_before'] != "") {
			$before_start = '<script type="text/javascript">';
			$before_start = $before_start . 'var _adynamo_client = "';
			$before_start = $before_start . $pstl_options['page_before']; //ID
			$before_end = '";';
			$before_end = $before_end . 'var _adynamo_width = ';
			$before_end = $before_end . $pstl_options['page_before_width']; //WIDTH
			$before_end = $before_end . ';';
			$before_end = $before_end . 'var _adynamo_height = ';
			$before_end = $before_end . $pstl_options['page_before_height']; //HEIGHT
			$before_end = $before_end . ';';
			$before_end = $before_end . '</script>';
			$before_end = $before_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
			$before = $before_start . $before . $before_end;
		}
		if ($pstl_options['page_after'] != "") {
			$after_start = '<script type="text/javascript">';
			$after_start = $after_start . 'var _adynamo_client = "';
			$after_start = $after_start . $pstl_options['page_after']; //ID
			$after_end = '";';
			$after_end = $after_end . 'var _adynamo_width = ';
			$after_end = $after_end . $pstl_options['page_after_width']; //WIDTH
			$after_end = $after_end . ';';
			$after_end = $after_end . 'var _adynamo_height = ';
			$after_end = $after_end . $pstl_options['paeg_after_height']; //HEIGHT
			$after_end = $after_end . ';';
			$after_end = $after_end . '</script>';
			$after_end = $after_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
			$after = $after_start . $after . $after_end;
		}
		else
		{
			if ($pstl_options['cat_before'] != "") {
				$before_start = '<script type="text/javascript">';
				$before_start = $before_start . 'var _adynamo_client = "';
				$before_start = $before_start . $pstl_options['cat_before']; //ID
				$before_end = '";';
				$before_end = $before_end . 'var _adynamo_width = ';
				$before_end = $before_end . $pstl_options['cat_before_width']; //WIDTH
				$before_end = $before_end . ';';
				$before_end = $before_end . 'var _adynamo_height = ';
				$before_end = $before_end . $pstl_options['cat_before_height']; //HEIGHT
				$before_end = $before_end . ';';
				$before_end = $before_end . '</script>';
				$before_end = $before_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$before = $before_start . $before . $before_end;
			}
			if ($pstl_options['cat_after'] != "") {
				$after_start = '<script type="text/javascript">';
				$after_start = $after_start . 'var _adynamo_client = "';
				$after_start = $after_start . $pstl_options['cat_after']; //ID
				$after_end = '";';
				$after_end = $after_end . 'var _adynamo_width = ';
				$after_end = $after_end . $pstl_options['cat_after_width']; //WIDTH
				$after_end = $after_end . ';';
				$after_end = $after_end . 'var _adynamo_height = ';
				$after_end = $after_end . $pstl_options['cat_after_height']; //HEIGHT
				$after_end = $after_end . ';';
				$after_end = $after_end . '</script>';
				$after_end = $after_end . '<script type="text/javascript" src="http://www.addynamo.com/javascripts/deliverAds.js"></script>';
				$after = $after_start . $after . $after_end;
			}
		}
    }

    return $before . $content . $after;
}

add_action('admin_head', 'pstl_admin_head');
function pstl_admin_head()
{
    add_options_page('Addynamo', 'Addynamo', 'manage_options', 'addynamo/addynamo_options.php');
}

?>
