<?php
/*
Plugin Name: GNUPlot
Plugin URI: http://wordpress.org/extend/plugins/gnuplot-wordpress-plugin/
Description: Adds GNUPlot functionality to wordpress
Version: 1.0
Author: Mohamed Ibrahim
Author URI: http://www.clker.com/
*/

function do_post_request($url, $data, $optional_headers = null)
{
  $params = array('http' => array(
				  'method' => 'POST',
				  'content' => $data
				  ));
  if ($optional_headers!== null) $params['http']['header'] = $optional_headers;
  $ctx = stream_context_create($params);
  $fp = @fopen($url, 'rb', false, $ctx);
  if (!$fp) return false;
  $response = @stream_get_contents($fp);
  if ($response === false) return false;
  return $response;
}


function gplot($script)
{
  $Response=do_post_request("http://www.clker.com/apis/gplot.html","todo=".bin2hex($script));

  if ($Response[0]=='E')
    return array(result => False, data => $Response);
  else
    return array(result => True, data => $Response);
}

class gnuplot {
  // parsing the text to display tex by putting tex-images-tags into the code created by createTex
  function parseTex ($toParse) {
    // tag specification (which tags are to be replaced)
    $regex = '#\[gplot\](.*?)\[/gplot\]#si';
        
    return preg_replace_callback($regex, array(&$this, 'createPlot'), $toParse);
  }
    
  // reading the tex-expression and create an image and a image-tag representing that expression
  function createPlot($toTex) {
    $toTex[1]=ereg_replace('&#8220;|&#8221;|&#8243;','"',$toTex[1]);
    $toTex[1]=ereg_replace('&#8216;|&#8217;',"'",$toTex[1]);
    $formula_text .= strip_tags($toTex[1],ENT_QUOTES);
    $formula_hash = md5($formula_text);
    $formula_filename = 'plot_'.$formula_hash.'.png';

    $cache_path = ABSPATH . '/wp-content/cache/';
    $cache_formula_path = $cache_path . $formula_filename;
    $cache_url = get_bloginfo('wpurl') . '/wp-content/cache/';
    $cache_formula_url = $cache_url . $formula_filename;
    
    echo "<!--GNUPLOT code:\n$formula_text\n-->";
    if (!is_file($cache_formula_path)) {
      // Execute gnuplot with the file
      $res=gplot($formula_text);

      if ($res[result])
	file_put_contents($cache_formula_path,$res[data]);
      else
	return "<p><h1>GNUPLOT error:</h1><pre>$res[data]</pre></p>";
    }
        
    // returning the image-tag, referring to the image in your cache folder 
    return "<center><a href='http://www.clker.com/blog/2008/07/16/gnuplot-wordpress-plugin/'><img src=\"$cache_formula_url\" style=\"border:none;\"/></a></center>";
  }
  }

$mimetex_object = new gnuplot;
// this specifies where parsing should be done. one can look up further information on wordpress.org
add_filter('the_title', array($mimetex_object, 'parseTex'));
add_filter('the_content', array($mimetex_object, 'parseTex'));
add_filter('the_excerpt', array($mimetex_object, 'parseTex'));
add_filter('comment_text', array($mimetex_object, 'parseTex'));
?>
