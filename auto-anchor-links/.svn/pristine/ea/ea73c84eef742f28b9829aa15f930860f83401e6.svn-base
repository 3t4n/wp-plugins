<?php
/**
 * mwm_aalAdminPanel - Admin Section for Auto Anchor List
 * 
 * @package Auto Anchor List
 * @author MindWireMedia
 * @copyright 2009
 * @since 1.0.0
 */
if (!class_exists('mwm_aal')) {
	class mwm_aal{
			
		var $links= array();
		
		var $findh = true;
		var $findAnchor = true;
		var $options = "";
		var $tag = "mwm-aal-display";
		var $htmltag = "<!--mwm_aal_display-->";
		var $isTagUsed = false;
			
		function mwm_aal(){
			$this->options = get_option('mwm_aal_options');
			add_action('wp_print_styles', array(&$this, 'load_styles'));
			add_filter('the_content', array(&$this,'find_content_links'));
			add_filter('the_excerpt', array(&$this,'remove_excerpt_display'));
			add_shortcode($this->tag, array(&$this,'output_content_links'));
			add_shortcode($this->htmltag, array(&$this,'output_content_links')); 
		}
		
		function load_styles() {
		
			if ($this->options['activateCSS']){
				wp_enqueue_style('MWM-AAL-FRONT-CSS', MWMAAL_URLPATH.'css/mwm-aal.css', false, '1.0.0', 'screen');
			}
		}
		
		function find_content_links($content){
		
			$this->find_content_name_links($content);
			$content= $this->add_anchors_to_content($content);
			
			if($this->options['autoDisplayInContent'] and !$this->isTagUsed){
			
				if ((is_home()     and $this->options['is_home']) or
				    (is_single()   and $this->options['is_single']) or
				    (is_page()     and $this->options['is_page']) or
				    (is_category() and $this->options['is_category']) or
					(is_tag() 	   and $this->options['is_tag']) or
				    (is_date()     and $this->options['is_date']) or
					(is_author()   and $this->options['is_author']) or
				    (is_search()   and $this->options['is_search'])) {
				  
					$content = $this->auto_output_content_links($content);
				}
			}
	
			return $content;
		}
		
		function find_content_name_links($content){
			preg_match_all('#<h([1-6])>(.+?)</h\1>#is',$content, $matches, PREG_SET_ORDER);
			$this->links = $matches;
			
			if(strpos($content, $this->tag)){
				$this->isTagUsed = true;
			}
			
			return $content;
		}
		
		function add_anchors_to_content($content){
			if(count($this->links) >= 1){
				foreach ($this->links as $val) {
					$rtext='<a name="'.urlencode(strip_tags($val[2])).'"></a>';
					$pos = strpos($content, $val[0]);
					$content = substr_replace($content, $rtext, $pos, 0);
				}
			}
			return $content;
		
		}
		
		function auto_output_content_links($content){
			if(count($this->links) >= 1){
				$output = $this->output_content_links();
				if(strpos($content, $this->htmltag)){
					$content = $output.$content;
				} else {
					$content = $output.$content;
				}
			}
			return $content;
		}
		
		function output_content_links(){
			$info = "";
			if(count($this->links) >= 1){
			$title = $this->options['displayTitle'];
			$info = '<div class="mwm-aal-container">';
			$info.= "<div class='mwm-aal-title'>$title</div><ol>";
			foreach ($this->links as $val) {
				$urlval = urlencode(strip_tags($val[2]));
				$info.='<li><a href="#'.$urlval.'">'.strip_tags($val[2]).'</a></li>';
			}
			$info .= '</ol></div>';
			}
			return $info;
		}
		
		function output_sidebar_links(){
			
			if ((count($this->links) >= 1) and	((is_single()   and $this->options['is_single']) or
				    (is_page()     and $this->options['is_page']))){
				    $title = $this->options['displayTitle'];
			$info = '<div class="mwm-aal-sidebar-container">';
			$info .= "<li><h2>$title</h2><ul>";
			foreach ($this->links as $val) {
			$urlval = urlencode(strip_tags($val[2]));
				$info.='<li><a href="#'.$urlval.'">'.strip_tags($val[2]).'</a></li>';
			}
			$info .= '</ul></li></div>';
			echo $info;
			}
		}
		
		function remove_excerpt_display($excerpt){
			$data = $this->options['displayTitle'];
			foreach ($this->links as $val) {
				$data .= strip_tags($val[2]);
			}
			
			$excerpt = str_replace($data, '', $excerpt);
			$excerpt = str_replace($tag, '', $excerpt);
			$excerpt = str_replace($htmltag, '', $excerpt);
			return $excerpt;
		}
	
	}
	
	//Start Loader
	global $mwm_aal;
	$mwm_aal = new mwm_aal();
	
}
?>