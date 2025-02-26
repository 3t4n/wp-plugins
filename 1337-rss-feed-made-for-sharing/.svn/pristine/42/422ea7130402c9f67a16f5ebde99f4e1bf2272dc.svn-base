<?php
/*
Plugin Name: 1337 RSS Feed | Made for sharing
Plugin URI: https://wordpress.org/plugins/1337-rss-feed-made-for-sharing/
Description: Most Advanced RSS Feed Made for Sharing! - Highly Customizable ( 34 Possible Configurations ) - <a href="https://wordpress.org/support/plugin/1337-rss-feed-made-for-sharing/" target="_blank">*<strong>Technical Support</strong>*</a>!
Version: 0.5.8
Author: codelyfe@gmail.com
Author URI: https://codelyfe.github.io
Text Domain: LightWRSSFeed
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Network: True

Copyright 2018 - 2022  Randal C. Burger
 
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.
 
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/ 

// DISPLAY NOTICE

    function display_custom_admin_notice1337() {
        ?>
        <div class="notice notice-info is-dismissible">
            <p style="color:black;">Check out our new plugin! <a href="https://github.com/codelyfe/1337-CDN-PLUGIN" class="button" target="_blank">1337 CDN PLUGIN</a></p>
            <img src="https://imageupload.io/ib/HKTfvZh3Ayq49tE_1699138182.png" width="100%" />
        </div>
        <?php
    }
    add_action('admin_notices', 'display_custom_admin_notice1337');

// DISPLAY NOTICE

//function wporg_shortcodes_init()
//{
    //function wporg_shortcode($atts = [], $content = null)
    //{
        // do something to $content
 
        // always return
        //return $content;
    //}
    //add_shortcode('wporg', 'wporg_shortcode');
//}
//add_action('init', 'wporg_shortcodes_init');

class eliterssfeed_widget extends WP_Widget {
 
    public function __construct() {
     
        parent::__construct(
            'eliterssfeed_widget',
            __( '1337 RSS Feed | Made for sharing', 'LightWRSSFeed' ),
            array(
                'classname'   => 'eliterssfeed_widget',
                'description' => __( 'Made by an 1337 so the world can easily share an ( RSS FEED )', 'LightWRSSFeed' )
                )
        );
       
        load_plugin_textdomain( 'LightWRSSFeed', false, basename( dirname( __FILE__ ) ) . '/languages' );
       
    }
 
    /**  
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {    
         
        extract( $args );
        // 1
        $title      = apply_filters( 'widget_title', $instance['title'] ); // Default WP Title
        // 0
        $message    = $instance['message']; // Null 
		    // 1
        $rssurl    = $instance['rssurl']; // RSS Url
	    	// 1
        $rsstitle    = $instance['rsstitle']; // RSS Title
	    	// 1
        $socialbtntwitterhashtag    = $instance['socialbtntwitterhashtag']; // Twitter Hashtag
		    // 1
        $twittertext    = $instance['twittertext']; // Twitter Text
		    // 1
        $adspace    = $instance['adspace']; // Null
        // 1
        $postcount    = $instance['postcount']; // Post Count
        // 1
        $tcolor    = $instance['tcolor']; // Title Color
        // 1
        $tfsize    = $instance['tfsize']; // Title Font Size
        // 1
        $dcolor    = $instance['dcolor']; // Date Color
        // 1
        $dfsize    = $instance['dfsize']; // Date Font Size
        // 1
        $tff    = $instance['tff'];
        // 1
        $dff    = $instance['dff'];
        // 1
        $frssf    = $instance['frssf'];
        // 1
        $are4    = $instance['are4'];
        // 1
        $are5    = $instance['are5'];
        // 1
        $are6    = $instance['are6'];
        // 1
        $are7    = $instance['are7'];
        // 1  
        $are8    = $instance['are8'];
        // 1  
        $are9    = $instance['are9'];
        // 1  
        $are10    = $instance['are10'];
        // 1  
        $are11    = $instance['are11'];
        // 1
        $xx00    = $instance['xx00'];  
        // 1 
        $xx01    = $instance['xx01'];
        // 1
        $xx02    = $instance['xx02'];
        // 1
        $xx03    = $instance['xx03'];
        // 1
        $xx04    = $instance['xx04'];
        // 1
        $xx05    = $instance['xx05'];
        // 1
        $xx06    = $instance['xx06'];
        // 1
        $xx007    = $instance['xx007'];
        // 1 
        $hidedate    = $instance['hidedate']; // Hide Date
        // 1 
        $brad    = $instance['brad'];
        // 1 
        $aff    = $instance['aff']; // Aff.
        // 1
        $affl    = $instance['affl']; // Aff. Link
        // 1 
        $affh    = $instance['affh']; // Aff. Img Height
        // 1
        $affw    = $instance['affw']; // Aff. Img Width
        // 1
        $pageURL    = $instance['pageURL']; // Disqus Setting: 
        // 1 
        $pageIDENTIFIER     = $instance['pageIDENTIFIER']; // Disqus Setting:  
        // 1
        $embedJS     = $instance['embedJS']; // Disqus Setting:
        //1   
        echo $before_widget;
        //
        // WP TITLE
        // 
        if ( $title ) { echo $before_title . $title . $after_title; }
        //
        // WidgetWP - Start
        //
        //
        // RSS TITLE
        //

        echo '<h2 style="text-align:center;" class="'.$xx06.'" ><span>'.$rsstitle.'</span></h2>';
        //
        //echo '<br/>';
        //89//////////////////////////////////////////////////////////////////////
        if($xx00 == null){ echo '<span></span>'; }
        //
        else{ echo '<img src="'.$xx00.'" style="width:'.$xx01.';height:'.$xx02.'; border-radius:'.$xx03.' !important;" class="'.$xx04.'"  />'; }
        //89//////////////////////////////////////////////////////////////////////
        echo '<br/>';
        //77//////////////////////////////////////////////////////////////////////
		    echo'<a href="'.$rssurl.'" target="_blank" style="float:left;background: '.$frssf.';padding: 5px;border-radius: '.$are5.';text-decoration: none;color: '.$are4.';" class="'.$xx05.'" > Full RSS Feed</a><br/>';
        //77//////////////////////////////////////////////////////////////////////
        //
        //22//////////////////////////////////////////////////////////////////////
        $rss = new DOMDocument();
        $rss->load(''.$rssurl.'');
        $feed = array();
        foreach ($rss->getElementsByTagName('item') as $node) {
          $item = array ( 
            'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                    'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
            'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                    'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
            );
          array_push($feed, $item);
        }
        $limit = $postcount;
        for($x=0;$x<$limit;$x++) {
          $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
          $link = $feed[$x]['link'];
                $description = $feed[$x]['desc'];
          $date = date('l F d, Y', strtotime($feed[$x]['date']));
			  echo '<br/>';
        //22//////////////////////////////////////////////////////////////////////

        $socialStyle = '
        text-decoration: none;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);
        border: 1px solid rgba(204, 204, 204, 0);
        border-bottom-color: rgba(179, 179, 179, 0);
        background-color: rgba(245, 245, 245, 0);
        background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));
        ';
        
        $btn2nd = 'btn btn-secondary';

      if ($are11 == "colored") {
      //==//////////////////////////////////////////////////////////////////////
	    echo '<div class="btn-group" role="group" aria-label="hmm..." style="float:right;">';
			//
      echo '<a class="'.$btn2nd.'" style="'.$socialStyle.'" href="https://www.linkedin.com/shareArticle?mini=true&url='. $link .'&title='.$item->title.'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/Linkedin.png', __FILE__ ) . '" style="width:25px;height:25px;border-radius:'.$brad.';" > '; echo '</a>';
			//
      echo '<a class="'.$btn2nd.'" style="'.$socialStyle.'" href="https://twitter.com/intent/tweet?text='.$twittertext.'&hashtags='.$socialbtntwitterhashtag.'&url='. $link .'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/Twitter.png', __FILE__ ) . '" style="width:25px;height:25px;border-radius:'.$brad.';" > '; echo '</a>';
			//
      echo '<a class="'.$btn2nd.'" style="'.$socialStyle.'" href="https://www.facebook.com/sharer/sharer.php?app_id=113869198637480&sdk=joey&title='.$item->title.'&u='. $link .'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/Facebook.png', __FILE__ ) . '" style="width:25px;height:25px;border-radius:'.$brad.';" > '; echo '</a>';
			//
      echo '<a class="'.$btn2nd.'" style="'.$socialStyle.'" href="https://trello.com/add-card?mode=popup&url='. $item->link .'&name='.$item->title.'&desc='. $link .'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/Trello.png', __FILE__ ) . '" style="width:25px;height:25px;border-radius:'.$brad.';" > '; echo '</a>';
			//
      echo '</div>';
            //
      //==//////////////////////////////////////////////////////////////////////
      echo '<h4><strong><a style="color:'.$tcolor.';font-size:'.$tfsize.';font-family:'.$tff.';" href="'.$link.'" title="'.$title.'" target="_blank">'.$title.'</a></strong><br />';
      
      echo '<small style="" '.$hidedate.'><em style="color:'.$dcolor.';font-size:'.$dfsize.';font-style:'.$dff.';">'.$date.'</em></small></h4>';
      //
      
      //00///////////////////////////////////////////////////////////////////////
      if($xx007 == 'YES'){
        echo '<code style="width:100%;font-size:0px;">'.$description.'</code>';  
      }
      elseif($xx007 == 'NO'){
        echo '';
      }
      else{
        echo '';
      }
      //00//////////////////////////////////////////////////////////////////////

      echo '<a href="'.$affl.'" target="_blank"><img src="'.$aff.'" width="'.$affw.'" height="'.$affh.'" /></a>';
      
      echo '<hr style="width:'.$are6.';">';
      } 
    
      else {
      
      $iconstyle0214 = "
      text-decoration: none;
      box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);
      border: 1px solid rgba(204, 204, 204, 0);
      border-bottom-color: rgba(179, 179, 179, 0);
      background-color: rgba(245, 245, 245, 0);
      background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));
      ";

      echo '<div class="btn-group" role="group" aria-label="hmm..." style="float:right;">';
      //
      echo '<a class="'.$btn2nd.'" style="'.$iconstyle0214.'" href="https://www.linkedin.com/shareArticle?mini=true&url='. $link .'&title='.$item->title.'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/bLinkedin.png', __FILE__ ) . '" style="width:25px;height:25px;border-radius:'.$brad.';" > '; echo '</a>';
      //
      echo '<a class="'.$btn2nd.'" style="'.$iconstyle0214.'" href="https://twitter.com/intent/tweet?text='.$twittertext.'&hashtags='.$socialbtntwitterhashtag.'&url='. $link .'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/bTwitter.png', __FILE__ ) . '" style="width:25px;height:25px;border-radius:'.$brad.';" > '; echo '</a>';
      //
      echo '<a class="'.$btn2nd.'" style="'.$iconstyle0214.'" href="https://www.facebook.com/sharer/sharer.php?app_id=113869198637480&sdk=joey&title='.$item->title.'&u='. $link .'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/bFacebook.png', __FILE__ ) . '" style="width:25px;height:25px;border-radius:'.$brad.';" > '; echo '</a>';
      //
      echo '<a class="'.$btn2nd.'" style="'.$iconstyle0214.'" href="https://trello.com/add-card?mode=popup&url='. $item->link .'&name='.$item->title.'&desc='. $link .'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/bTrello.png', __FILE__ ) . '" style="width:25px;height:25px;border-radius:'.$brad.';" > '; echo '</a>';
      //
      echo '</div>';
      //
      echo '<h4><strong><a style="color:'.$tcolor.';font-size:'.$tfsize.';font-family:'.$tff.';" href="'.$link.'" title="'.$title.'" target="_blank">'.$title.'</a></strong><br />';
      //
      echo '<small '.$hidedate.'><em  style="color:'.$dcolor.';font-size:'.$dfsize.';font-style:'.$dff.';">Posted on '.$date.'</em></small></h4>';
      //000//////////////////////////////////////////////////////////////////////
      if($xx007 == 'YES'){
        echo '<code style="width:100%;font-size:0px;">'.$description.'</code>';  
      }
      elseif($xx007 == 'NO'){
        echo '';
      }
      else{
        echo '';
      }
      //000//////////////////////////////////////////////////////////////////////

      echo '<a href="'.$affl.'" target="_blank"><img src="'.$aff.'" width="'.$affw.'" height="'.$affh.'" /></a>';

      echo '<hr style="width:'.$are6.';">';

      }


		}
		// WidgetWP
      echo $after_widget;
      
      echo '
      <div id="disqus_thread"></div>
      <script>

      /**
      *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
      *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
      /*
      var disqus_config = function () {
      this.page.url = '.$pageURL.';  // Replace PAGE_URL with your pages canonical URL variable
      this.page.identifier = '.$pageIDENTIFIER.'; // Replace PAGE_IDENTIFIER with your pages unique identifier variable
      };
      */
      (function() { // DONT EDIT BELOW THIS LINE
      var d = document, s = d.createElement("script");
      s.src = "'.$embedJS.'";
      s.setAttribute("data-timestamp", +new Date());
      (d.head || d.body).appendChild(s);
      })();
      </script>
      <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    ';
      
      //
      $qrurl = 'https://chart.googleapis.com/chart?cht=qr&chl=http%3A%2F%2F';
      //
      echo '<center><a rel="nofollow" href="'.$rssurl.'" border="0" style="cursor:default" target="_blank">';
      //
      echo '<img src="'.$qrurl.''.$rssurl.'&chs='.$are7.'&choe=UTF-8&chld=L|2" alt="">';    
      //
      echo '</a>';
      //


      switch ($are10) {
          case "h1":
              echo '<'.$are10.' style="color:'.$are8.';">'.$are9.'</'.$are10.'>';
              break;
          case "h2":
              echo '<'.$are10.' style="color:'.$are8.';">'.$are9.'</'.$are10.'>';;
              break;
          case "h3":
              echo '<'.$are10.' style="color:'.$are8.';">'.$are9.'</'.$are10.'>';
              break;
          default:
              echo '<p style="color:'.$are8.';">'.$are9.'</p>';
      }

      
      //
      echo '</center>';
      //

    }
 
  
    /**
      * Sanitize widget form values as they are saved.
      *
      * @see WP_Widget::update()
      *
      * @param array $new_instance Values just sent to be saved.
      * @param array $old_instance Previously saved values from database.
      *
      * @return array Updated safe values to be saved.
      */
        public function update( $new_instance, $old_instance ) {        
         
        $instance = $old_instance;
        // 1 
        $instance['title'] = strip_tags( $new_instance['title'] );
        // 0
        $instance['message'] = strip_tags( $new_instance['message'] );
        // 1
        $instance['rssurl'] = strip_tags( $new_instance['rssurl'] );
        // 1
        $instance['rsstitle'] = strip_tags( $new_instance['rsstitle'] );
        // 1
		    $instance['socialbtntwitterhashtag'] = strip_tags( $new_instance['socialbtntwitterhashtag'] );
        // 1
		    $instance['twittertext'] = strip_tags( $new_instance['twittertext'] );
        // 1
        $instance['postcount'] = strip_tags( $new_instance['postcount'] );
        // 1
        $instance['tcolor'] = strip_tags( $new_instance['tcolor'] );
        // 1
        $instance['tfsize'] = strip_tags( $new_instance['tfsize'] );
        // 1
        $instance['dcolor'] = strip_tags( $new_instance['dcolor'] );
        // 1
        $instance['dfsize'] = strip_tags( $new_instance['dfsize'] );
        // 1
        $instance['dff'] = strip_tags( $new_instance['dff'] );
        // 1
        $instance['tff'] = strip_tags( $new_instance['tff'] );
        // 1
        $instance['frssf'] = strip_tags( $new_instance['frssf'] );
        // 1
        $instance['are4'] = strip_tags( $new_instance['are4'] );
        // 1
        $instance['are5'] = strip_tags( $new_instance['are5'] );
        // 1
        $instance['are6'] = strip_tags( $new_instance['are6'] );
        // 0
        $instance['are7'] = strip_tags( $new_instance['are7'] );
        // 0
        $instance['are8'] = strip_tags( $new_instance['are8'] );
        // 0
        $instance['are9'] = strip_tags( $new_instance['are9'] );
        // 0
        $instance['are10'] = strip_tags( $new_instance['are10'] );
        //
        $instance['are11'] = strip_tags( $new_instance['are11'] );
        //
        $instance['xx00'] = strip_tags( $new_instance['xx00'] );
        //
        $instance['xx01'] = strip_tags( $new_instance['xx01'] );
        //
        $instance['xx02'] = strip_tags( $new_instance['xx02'] );
        //
        $instance['xx03'] = strip_tags( $new_instance['xx03'] );
        //
        $instance['xx04'] = strip_tags( $new_instance['xx04'] );
        //
        $instance['xx05'] = strip_tags( $new_instance['xx05'] );
        //
        $instance['xx06'] = strip_tags( $new_instance['xx06'] );
        //
        $instance['xx007'] = strip_tags( $new_instance['xx007'] );
        //
        $instance['hidedate'] = strip_tags( $new_instance['hidedate'] );
        //
        $instance['brad'] = strip_tags( $new_instance['brad'] );
        //
        $instance['aff'] = strip_tags( $new_instance['aff'] );
        //
        $instance['affl'] = strip_tags( $new_instance['affl'] );
        //
        $instance['affh'] = strip_tags( $new_instance['affh'] );
        //
        $instance['affw'] = strip_tags( $new_instance['affw'] );
        //
        $instance['pageIDENTIFIER'] = strip_tags( $new_instance['pageIDENTIFIER'] );
        //
        $instance['pageURL'] = strip_tags( $new_instance['pageURL'] );
        //
        $instance['embedJS'] = strip_tags( $new_instance['embedJS'] );
        return $instance;
         
    }
  
    /**
      * Back-end widget form.
      *
      * @see WP_Widget::form()
      *
      * @param array $instance Previously saved values from database.
      */

    function wp_enqueue_style( $handle, $src = 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', $deps = array(), $ver = false, $media = 'all' ) {
    _wp_scripts_maybe_doing_it_wrong( __FUNCTION__ );
 

    $wp_styles = wp_styles();
 
    if ( $src ) {
        $_handle = explode('?', $handle);
        $wp_styles->add( $_handle[0], $src, $deps, $ver, $media );
    }
    $wp_styles->enqueue( $handle );
    } 
    public function form( $instance ) {    
        // 1 
        $title      = esc_attr( $instance['title'] );
        // 0
        $message    = esc_attr( $instance['message'] );
		    // 1
        $rssurl    = esc_attr( $instance['rssurl'] );
		    // 1
        $rsstitle    = esc_attr( $instance['rsstitle'] );
		    // 1
        $socialbtntwitterhashtag    = esc_attr( $instance['socialbtntwitterhashtag'] );
		    // 1
        $twittertext    = esc_attr( $instance['twittertext'] );
        // 1
        $postcount    = esc_attr( $instance['postcount'] );
        // 1
        $tcolor    = esc_attr( $instance['tcolor'] );
        // 1
        $tfsize    = esc_attr( $instance['tfsize'] );
        // 1
        $dcolor    = esc_attr( $instance['dcolor'] );
        // 1
        $dfsize    = esc_attr( $instance['dfsize'] );
        // 1
        $dff    = esc_attr( $instance['dff'] );
        // 1
        $tff    = esc_attr( $instance['tff'] );
        // 1
        $frssf    = esc_attr( $instance['frssf'] );
        // 1
        $are4    = esc_attr( $instance['are4'] );
        // 1
        $are5    = esc_attr( $instance['are5'] );
        // 1
        $are6    = esc_attr( $instance['are6'] );
        // 0
        $are7    = esc_attr( $instance['are7'] );
        // 0
        $are8    = esc_attr( $instance['are8'] );
        // 0
        $are9    = esc_attr( $instance['are9'] );
        //
        $are10    = esc_attr( $instance['are10'] );
        //
        $are11    = esc_attr( $instance['are11'] );
        //
        $xx00    = esc_attr( $instance['xx00'] );
        //
        $xx01    = esc_attr( $instance['xx01'] );
        //
        $xx02    = esc_attr( $instance['xx02'] );
        //
        $xx03    = esc_attr( $instance['xx03'] );
        //
        $xx04    = esc_attr( $instance['xx04'] );
        //
        $xx05    = esc_attr( $instance['xx05'] );
        //
        $xx06    = esc_attr( $instance['xx06'] );
        //
        $xx007    = esc_attr( $instance['xx007'] );
        //
        $hidedate    = esc_attr( $instance['hidedate'] );
        //
        $brad    = esc_attr( $instance['brad'] );
        //
        $aff    = esc_attr( $instance['aff'] );
        //
        $affl    = esc_attr( $instance['affl'] );
        //
        $affw    = esc_attr( $instance['affw'] );
        //
        $affh    = esc_attr( $instance['affh'] );

        //
        $pageIDENTIFIER    = esc_attr( $instance['pageIDENTIFIER'] );
        //
        $pageURL    = esc_attr( $instance['pageURL'] );
        //
        $embedJS    = esc_attr( $instance['embedJS'] );
        ?>

		<br/>
    <!--<i style="font-size:80px;" class="fa fa-grav" aria-hidden="true"></i>-->
    <?php echo '<center><img src="' . plugins_url( 'img/logo.png', __FILE__ ) . '" style="width:100px;height:100px;" ></center> '; ?>
    <span>FREE TECH SUPPORT<br/><br/><a href="https://support-desk.bss.design/index.html" target="_blank">Get Help Today!</a><br/></span>
   
	  <span>Consider a $1 Donation!<br/><br/><a href="https://www.paypal.me/codelyfe" target="_blank">My Paypal</a><br/><a href="https://codelyfe.github.io" target="_blank">Check Us Out!</a></span>
    <br/>  <br/> <br/>
    <center style="background: #006799;color: white;font-size: 15px;padding-top: 3px;padding-bottom: 3px;font-weight: bold;">WP DEFAULT TITLE</center>
    <p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"   placeholder="Default Unstyled"/>
    </p>
    
    <hr>
    <center style="background: #006799;color: white;font-size: 15px;padding-top: 3px;padding-bottom: 3px;font-weight: bold;">RSS FEED SETTINGS</center>
    <p>
    <label for="<?php echo $this->get_field_id('rssurl'); ?>"><?php _e('RSS Url:'); ?></label><input class="widefat" id="<?php echo $this->get_field_id('rssurl'); ?>" name="<?php echo $this->get_field_name('rssurl'); ?>" type="text" value="<?php echo $rssurl; ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('rsstitle'); ?>"><?php _e('RSS Title:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('rsstitle'); ?>" name="<?php echo $this->get_field_name('rsstitle'); ?>" type="text" value="<?php echo $rsstitle; ?>"  placeholder="John Doe's Blog" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('xx06'); ?>"><?php _e('RSS Title Custom Class:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('xx06'); ?>" name="<?php echo $this->get_field_name('xx06'); ?>" type="text" value="<?php echo $xx06; ?>"  placeholder="customClass" />
    </p>
    
    <p>
    <label for="<?php echo $this->get_field_id('postcount'); ?>"><?php _e('Feeds to show:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('postcount'); ?>" name="<?php echo $this->get_field_name('postcount'); ?>" type="text" value="<?php echo $postcount; ?>" placeholder="0-99 Must have #" />
    </p>   

    <hr>
    <center style="background: #006799;color: white;font-size: 15px;padding-top: 3px;padding-bottom: 3px;font-weight: bold;">RSS LOGO SETTINGS</center>

    <p>
    <label for="<?php echo $this->get_field_id('xx00'); ?>"><?php _e('RSS Logo:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('xx00'); ?>" name="<?php echo $this->get_field_name('xx00'); ?>" type="text" value="<?php echo $xx00; ?>"  placeholder="Image URL" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('xx01'); ?>"><?php _e('RSS Logo Width:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('xx01'); ?>" name="<?php echo $this->get_field_name('xx01'); ?>" type="text" value="<?php echo $xx01; ?>"  placeholder="100%" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('xx02'); ?>"><?php _e('RSS Logo Height:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('xx02'); ?>" name="<?php echo $this->get_field_name('xx02'); ?>" type="text" value="<?php echo $xx02; ?>"  placeholder="100%" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('xx03'); ?>"><?php _e('RSS Logo Border Radius:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('xx03'); ?>" name="<?php echo $this->get_field_name('xx03'); ?>" type="text" value="<?php echo $xx03; ?>"  placeholder="5px or 5px 5px 5px 5px" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('xx04'); ?>"><?php _e('RSS Logo Custom Class:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('xx04'); ?>" name="<?php echo $this->get_field_name('xx04'); ?>" type="text" value="<?php echo $xx04; ?>"  placeholder="customClass" />
    </p>

    <hr>
    <center style="background: #006799;color: white;font-size: 15px;padding-top: 3px;padding-bottom: 3px;font-weight: bold;">RSS FEED TITLE SETTINGS</center>

    <p>
    <label for="<?php echo $this->get_field_id('tcolor'); ?>"><?php _e('RSS Feed Title Color:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('tcolor'); ?>" name="<?php echo $this->get_field_name('tcolor'); ?>" type="text" value="<?php echo $tcolor; ?>" placeholder="#000000 or name" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('tfsize'); ?>"><?php _e('RSS Feed Title Font Size:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('tfsize'); ?>" name="<?php echo $this->get_field_name('tfsize'); ?>" type="text" value="<?php echo $tfsize; ?>" placeholder="0-99px" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('tff'); ?>"><?php _e('RSS Feed Title Font Style:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('tff'); ?>" name="<?php echo $this->get_field_name('tff'); ?>" type="text" value="<?php echo $tff; ?>" placeholder="normal" />
    </p>

    <hr>
    <center style="background: #006799;color: white;font-size: 15px;padding-top: 3px;padding-bottom: 3px;font-weight: bold;">RSS FEED DATE SETTINGS</center>

    <p>
    <label for="<?php echo $this->get_field_id('dcolor'); ?>"><?php _e('RSS Feed Date Color:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('dcolor'); ?>" name="<?php echo $this->get_field_name('dcolor'); ?>" type="text" value="<?php echo $dcolor; ?>" placeholder="#000000 or name" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('dfsize'); ?>"><?php _e('RSS Feed Date Font Size:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('dfsize'); ?>" name="<?php echo $this->get_field_name('dfsize'); ?>" type="text" value="<?php echo $dfsize; ?>" placeholder="0-99px" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('dff'); ?>"><?php _e('RSS Feed Date Font Style:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('dff'); ?>" name="<?php echo $this->get_field_name('dff'); ?>" type="text" value="<?php echo $dff; ?>" placeholder="italic" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('hidedate'); ?>"><?php _e('Hide Date / Time:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('hidedate'); ?>" name="<?php echo $this->get_field_name('hidedate'); ?>" type="text" value="<?php echo $hidedate; ?>" placeholder="hidden" />
    </p>

    <hr>
    <center style="background: #006799;color: white;font-size: 15px;padding-top: 3px;padding-bottom: 3px;font-weight: bold;">RSS FEED BUTTON SETTINGS</center>

    <!---->
    <p>
    <label for="<?php echo $this->get_field_id('frssf'); ?>"><?php _e('Full RSS Feed Button BG-C:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('frssf'); ?>" name="<?php echo $this->get_field_name('frssf'); ?>" type="text" value="<?php echo $frssf; ?>" placeholder="black or #000" />
    </p>
    <!---->

    <p>
    <label for="<?php echo $this->get_field_id('are4'); ?>"><?php _e('Full RSS Feed Button TXT-C:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('are4'); ?>" name="<?php echo $this->get_field_name('are4'); ?>" type="text" value="<?php echo $are4; ?>" placeholder="white or #fff" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('are5'); ?>"><?php _e('Full RSS Feed Button Border-radius:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('are5'); ?>" name="<?php echo $this->get_field_name('are5'); ?>" type="text" value="<?php echo $are5; ?>" placeholder="5px" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('xx05'); ?>"><?php _e('Full RSS Feed Button Custom Class:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('xx05'); ?>" name="<?php echo $this->get_field_name('xx05'); ?>" type="text" value="<?php echo $xx05; ?>"  placeholder="customClass" />
    </p>

    <hr>
    <center style="background: #006799;color: white;font-size: 15px;padding-top: 3px;padding-bottom: 3px;font-weight: bold;">TWITTER SETTINGS</center>
    <p>
    <label for="<?php echo $this->get_field_id('socialbtntwitterhashtag'); ?>"><?php _e('Twitter Hashtag:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('socialbtntwitterhashtag'); ?>" name="<?php echo $this->get_field_name('socialbtntwitterhashtag'); ?>" type="text" value="<?php echo $socialbtntwitterhashtag; ?>"  placeholder="#1337RSSFEED" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('twittertext'); ?>"><?php _e('Twitter Text:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('twittertext'); ?>" name="<?php echo $this->get_field_name('twittertext'); ?>" type="text" value="<?php echo $twittertext; ?>" placeholder="150 Charcters Only" />
    </p>

    <hr>

    <center style="background: #006799;color: white;font-size: 15px;padding-top: 3px;padding-bottom: 3px;font-weight: bold;">SOCIAL ICONS SETTINGS</center>

    <p>
    <label for="<?php echo $this->get_field_id('are11'); ?>"><?php _e('Social Icon Color:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('are11'); ?>" name="<?php echo $this->get_field_name('are11'); ?>" type="text" value="<?php echo $are11; ?>" placeholder="colored or leave empty for B/W" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('brad'); ?>"><?php _e('Social Icon Border Radius:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('brad'); ?>" name="<?php echo $this->get_field_name('brad'); ?>" type="text" value="<?php echo $brad; ?>" placeholder="0px" />
    </p>

    <center style="background: #006799;color: white;font-size: 15px;padding-top: 3px;padding-bottom: 3px;font-weight: bold;">Press "Save" to Preview</center><br/>

    <?php

      if ($are11 == "colored") {

      echo '<div class="btn-group" role="group" aria-label="hmm..." style="float:right;">';
      //
      echo '<a class="btn btn btn-secondary" style="text-decoration: none;box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://www.linkedin.com/shareArticle?mini=true&url='. $link .'&title='.$item->title.'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/Linkedin.png', __FILE__ ) . '" style="width:25px;height:25px;" > '; echo '</a>';
      //
      echo '<a class="btn btn-secondary" style="text-decoration: none;box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://twitter.com/intent/tweet?text='.$twittertext.'&hashtags='.$socialbtntwitterhashtag.'&url='. $link .'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/Twitter.png', __FILE__ ) . '" style="width:25px;height:25px;" > '; echo '</a>';
      //
      echo '<a class="btn btn-secondary" style="text-decoration: none;box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://www.facebook.com/sharer/sharer.php?app_id=113869198637480&sdk=joey&title='.$item->title.'&u='. $link .'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/Facebook.png', __FILE__ ) . '" style="width:25px;height:25px;" > '; echo '</a>';
      //
      echo '<a class="btn btn-secondary" style="text-decoration: none;box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://trello.com/add-card?mode=popup&url='. $item->link .'&name='.$item->title.'&desc='. $link .'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/Trello.png', __FILE__ ) . '" style="width:25px;height:25px;" > '; echo '</a>';
      //
      echo '</div>';
      echo '<br/>';
      echo '<br/>';
      echo '<br/>';
      //
      //echo '<h4><strong><a style="color:'.$tcolor.';font-size:'.$tfsize.';font-family:'.$tff.';" href="'.$link.'" title="'.$title.'" target="_blank">'.$title.'</a></strong><br />';
      //
      //echo '<small><em  style="color:'.$dcolor.';font-size:'.$dfsize.';font-style:'.$dff.';">Posted on '.$date.'</em></small></h4>';
      //
      //echo '<hr style="width:'.$are6.';">';
    } else {

            echo '<div class="btn-group" role="group" aria-label="hmm..." style="float:right;">';
      //
      echo '<a class="btn btn btn-secondary" style="text-decoration: none;box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://www.linkedin.com/shareArticle?mini=true&url='. $link .'&title='.$item->title.'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/bLinkedin.png', __FILE__ ) . '" style="width:25px;height:25px;" > '; echo '</a>';
      //
      echo '<a class="btn btn-secondary" style="text-decoration: none;box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://twitter.com/intent/tweet?text='.$twittertext.'&hashtags='.$socialbtntwitterhashtag.'&url='. $link .'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/bTwitter.png', __FILE__ ) . '" style="width:25px;height:25px;" > '; echo '</a>';
      //
      echo '<a class="btn btn-secondary" style="text-decoration: none;box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://www.facebook.com/sharer/sharer.php?app_id=113869198637480&sdk=joey&title='.$item->title.'&u='. $link .'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/bFacebook.png', __FILE__ ) . '" style="width:25px;height:25px;" > '; echo '</a>';
      //
      echo '<a class="btn btn-secondary" style="text-decoration: none;box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://trello.com/add-card?mode=popup&url='. $item->link .'&name='.$item->title.'&desc='. $link .'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/bTrello.png', __FILE__ ) . '" style="width:25px;height:25px;" > '; echo '</a>';
      //
      echo '</div>';
      echo '<br/>';
      echo '<br/>';
      echo '<br/>';
      //
      //echo '<h4><strong><a style="color:'.$tcolor.';font-size:'.$tfsize.';font-family:'.$tff.';" href="'.$link.'" title="'.$title.'" target="_blank">'.$title.'</a></strong><br />';
      //
      //echo '<small><em  style="color:'.$dcolor.';font-size:'.$dfsize.';font-style:'.$dff.';">Posted on '.$date.'</em></small></h4>';
      //
      //echo '<hr style="width:'.$are6.';">';

    }

    ?>    
    <hr>
    <center style="background: #006799;color: white;font-size: 15px;padding-top: 3px;padding-bottom: 3px;font-weight: bold;">EXPERIMENTAL: USE AT OWN RISK!</center>

    <p>
    <label for="<?php echo $this->get_field_id('xx007'); ?>"><?php _e('Show Images/Permalinks On RSS Feed:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('xx007'); ?>" name="<?php echo $this->get_field_name('xx007'); ?>" type="text" value="<?php echo $xx007; ?>" placeholder="YES (MUST BE IN ALL CAPS)" />
    </p>

    <hr>
    <center style="background: #006799;color: white;font-size: 15px;padding-top: 3px;padding-bottom: 3px;font-weight: bold;">OTHER SETTINGS</center>

    <p>
    <label for="<?php echo $this->get_field_id('are6'); ?>"><?php _e('Horizontal Rule Width:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('are6'); ?>" name="<?php echo $this->get_field_name('are6'); ?>" type="text" value="<?php echo $are6; ?>" placeholder="100px" />
    </p>
    <hr/>
    <center style="background: #006799;color: white;font-size: 15px;padding-top: 3px;padding-bottom: 3px;font-weight: bold;">AFFILIATE SETTINGS</center>
    <p>
    <label for="<?php echo $this->get_field_id('aff'); ?>"><?php _e('Affiliate Image URL:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('aff'); ?>" name="<?php echo $this->get_field_name('aff'); ?>" type="text" value="<?php echo $aff; ?>" placeholder="Image URL" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id('affl'); ?>"><?php _e('Affiliate URL Link:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('affl'); ?>" name="<?php echo $this->get_field_name('affl'); ?>" type="text" value="<?php echo $affl; ?>" placeholder="Redirect Image To URL" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id('affw'); ?>"><?php _e('Affiliate Image Width:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('affw'); ?>" name="<?php echo $this->get_field_name('affw'); ?>" type="text" value="<?php echo $affw; ?>" placeholder="100px" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id('affh'); ?>"><?php _e('Affiliate Image Height:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('affh'); ?>" name="<?php echo $this->get_field_name('affh'); ?>" type="text" value="<?php echo $affh; ?>" placeholder="100px" />
    </p>
    <hr/>
    <!--DISQUS-->
    <center style="background: #006799;color: white;font-size: 15px;padding-top: 3px;padding-bottom: 3px;font-weight: bold;">DISQUS COMMENT SETTINGS</center>
    <p><a href="https://help.disqus.com/installation/universal-embed-code">Find Your Code Here</a><br/>( We only need the embed.js url for this to work )</p>
    <p><a href="https://disqus.com">Dont forget to sign up for Disqus (FREE)(With ADs)</a></p>
    <p>
    <label for="<?php echo $this->get_field_id('pageURL'); ?>"><?php _e('Your Sites URL:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('pageURL'); ?>" name="<?php echo $this->get_field_name('pageURL'); ?>" type="text" value="<?php echo $pageURL; ?>" placeholder="DEVELOPER MODE COMING SOON" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id('pageIDENTIFIER'); ?>"><?php _e('Page Identifier:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('pageIDENTIFIER'); ?>" name="<?php echo $this->get_field_name('pageIDENTIFIER'); ?>" type="text" value="<?php echo $pageIDENTIFIER; ?>" placeholder="DEVELOPER MODE COMING SOON" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id('embedJS'); ?>"><?php _e('EmbedJS URL:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('embedJS'); ?>" name="<?php echo $this->get_field_name('embedJS'); ?>" type="text" value="<?php echo $embedJS; ?>" placeholder="https://VALID-ID.disqus.com/embed.js" />
    </p>
    <!---->
    <hr/>
    <center style="background: #006799;color: white;font-size: 15px;padding-top: 3px;padding-bottom: 3px;font-weight: bold;">QR CODE SETTINGS</center>
    <p>
    <label for="<?php echo $this->get_field_id('are7'); ?>"><?php _e('Scan QR Code Size:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('are7'); ?>" name="<?php echo $this->get_field_name('are7'); ?>" type="text" value="<?php echo $are7; ?>" placeholder="80x80" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('are8'); ?>"><?php _e('Scan QR code slogan color:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('are8'); ?>" name="<?php echo $this->get_field_name('are8'); ?>" type="text" value="<?php echo $are8; ?>" placeholder="red or #000 or #ffffff" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('are9'); ?>"><?php _e('Scan QR code slogan:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('are9'); ?>" name="<?php echo $this->get_field_name('are9'); ?>" type="text" value="<?php echo $are9; ?>" placeholder="Scan QR code for Full RSS Feed" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('are10'); ?>"><?php _e('Scan QR code slogan style:'); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id('are10'); ?>" name="<?php echo $this->get_field_name('are10'); ?>" type="text" value="<?php echo $are10; ?>" placeholder="h1 - h3 or LEAVE BLANK for p" />
    </p>

    <hr>
    <center style="background: #006799;color: white;font-size: 15px;padding-top: 3px;padding-bottom: 3px;font-weight: bold;">Press "Save" to Preview</center><br/>
    
    <?php
    //
    $qrurl = 'https://chart.googleapis.com/chart?cht=qr&chl=http%3A%2F%2F';
    //
    echo '<center><a rel="nofollow" href="'.$rssurl.'" border="0" style="cursor:default" target="_blank">';
    //
    echo '<img src="'.$qrurl.''.$rssurl.'&chs='.$are7.'&choe=UTF-8&chld=L|2" alt="">';    
    //
    echo '</a>';
    //
          switch ($are10) {
          case "h1":
              echo '<'.$are10.' style="color:'.$are8.';">'.$are9.'</'.$are10.'>';
              break;
          case "h2":
              echo '<'.$are10.' style="color:'.$are8.';">'.$are9.'</'.$are10.'>';;
              break;
          case "h3":
              echo '<'.$are10.' style="color:'.$are8.';">'.$are9.'</'.$are10.'>';
              break;
          default:
              echo '<p style="color:'.$are8.';">'.$are9.'</p>';
      }
    //
    echo '</center>';
    //
    ?>

    <?php 
    }
     
}
 
/* Register the widget */
add_action( 'widgets_init', function(){
     register_widget( 'eliterssfeed_widget' );
});






