<?php
/*
Plugin Name: Article Forecast
Plugin URI: http://shangning.net/article-forecast/
Description: It recording the articles you plan to write and show the titles in your blog buttom.
Author: jvyyuie
Version: 0.0.1
Author URI: http://shangning.net
*/
/*  Copyright 2007 Article Forecast (email : jvyyuie@gmail.com)

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

class articleforecast{

function articleforecast()
{
  add_action('admin_menu', array(&$this, 'af_add_pages'));
  add_filter('the_content', array(&$this, 'af_forecast'));
}

function af_forecast($content)
{
	if(is_single() || is_page())
  {
    $af1title= str_replace("\\", "", get_option("af1title"));
    $af2title= str_replace("\\", "", get_option("af2title"));
    $af3title= str_replace("\\", "", get_option("af3title"));
    $af1desc= str_replace("\\", "", get_option("af1desc"));
    $af2desc= str_replace("\\", "", get_option("af2desc"));
    $af3desc= str_replace("\\", "", get_option("af3desc"));

    $tmp="<b>I plan to write the following articles:</b><br/>";  
    $list="";
    if ($af1title!="")
    {
      $list.="<li>$af1title";
      if ($af1desc!="") $list.=" - $af1desc";
      $list.="</li>";
    }
    if ($af2title!="")
    {
      $list.="<li>$af2title";
      if ($af2desc!="") $list.=" - $af2desc";
      $list.="</li>";
    }
    if ($af3title!="")
    {
      $list.="<li>$af3title";
      if ($af3desc!="") $list.=" - $af3desc";
      $list.="</li>";
    }
    if($list!="")
    {
      $content=$content.$tmp."<ul>".$list."</ul>";
    }
    else
    {
      $content=$content;
    }
  }
  return $content;
}

function af_add_pages()
{
  add_menu_page('Forecast', 'Forecast', 8, __FILE__, array(&$this, 'af_write_forecast'));
  add_submenu_page(__FILE__, 'Options', 'Options', 8, 'af_options_forecast', array(&$this, 'af_options_forecast'));
  add_submenu_page(__FILE__, 'Introduced ', 'Introduced', 8, 'af_introduced_forecast', array(&$this, 'af_introduced_forecast'));
}

function af_write_forecast()
{
  if(isset($_POST['postforecast']))
  {
    echo "<div id=\"message\" class=\"updated fade\"><p><strong>Forecast saved</strong></p></div>";
    update_option("af1title", $_POST['af1title']);
    update_option("af2title", $_POST['af2title']);
    update_option("af3title", $_POST['af3title']);
    update_option("af1desc", $_POST['af1desc']);
    update_option("af2desc", $_POST['af2desc']);
    update_option("af3desc", $_POST['af3desc']);
  }
  $af1title= str_replace("\\", "", get_option("af1title"));
  $af2title= str_replace("\\", "", get_option("af2title"));
  $af3title= str_replace("\\", "", get_option("af3title"));
  $af1desc= str_replace("\\", "", get_option("af1desc"));
  $af2desc= str_replace("\\", "", get_option("af2desc"));
  $af3desc= str_replace("\\", "", get_option("af3desc"));

  if ($af1title=="") $af1title="Title";
  if ($af2title=="") $af2title="Title";
  if ($af3title=="") $af3title="Title";

  if ($af1desc=="") $af1desc="Description";
  if ($af2desc=="") $af2desc="Description";
  if ($af3desc=="") $af3desc="Description";

  echo "<div class=\"wrap\"><form method=\"post\">";
  echo "<input size=55 name=\"af1title\" value=\"$af1title\"/><br/>";
  echo "<textarea name=\"af1desc\" cols=60 rows=3>$af1desc</textarea><br/>";
  echo "<hr size=1>";
  echo "<input size=55 name=\"af2title\" value=\"$af2title\"/><br/>";
  echo "<textarea name=\"af2desc\" cols=60 rows=3>$af2desc</textarea><br/>";
  echo "<hr size=1>";
  echo "<input size=55 name=\"af3title\" value=\"$af3title\"/><br/>";
  echo "<textarea name=\"af3desc\" cols=60 rows=3>$af3desc</textarea><br/>";
  echo "<hr size=1>";
  echo "<input type=\"submit\" name=\"postforecast\" value=\"Publish\"/>";
  echo "</form></div>";
}

function af_options_forecast() {
  echo "<div class=\"wrap\">";
  echo "more functions in the future version...";
  echo "</div>";
}

function af_introduced_forecast() {
  echo "<div class=\"wrap\">";
?>
<p>Article Forecast is a plugin for Wordpress, it recording the articles you plan to write and show the titles in your blog buttom.</p>
<p>Reader reading your blog, see your planing, they would be back to your blog in some days later, so you get more traffic and more returning pageviews.</p>
<p>If you have any problem or proposal, please email me: <a href="mailto:jvyyuie@gmail.com">jvyyuie@gmail.com</a></p>
<p>Or, you can find more about Article-Forecase follow address: <a href="http://shangning.net/article-forecast/">http://shangning.net/article-forecast/</a></p>
<?php
  echo "</div>";
}


}

$af &= new articleforecast();
?>
