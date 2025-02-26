<?php


/*
    H E L P   T A B
    ===============
*/

add_action('load-post.php','aFSHelpTab');
function aFSHelpTab() {
  function aFSHTShortcodes(){
    $sldsets = get_terms('slidesets');
    if (!empty($sldsets) && !is_wp_error($sldsets)){
      ob_start();
      echo '<p>'.__( 'Here are the shortcodes to use for your current Slidesets:' ).'</p>
      <div style="max-height:100px;overflow:auto;">';
      foreach ($sldsets as $sldset){
        echo '
        <div><strong>'.$sldset->name.'</strong>: <code>[slides slideset='.$sldset->slug.']</code></div>';
      }
      echo '</div>';
      return ob_get_clean();
    } else {
      ob_start();
      echo '
      <p>'.__( 'You currently have no Slidesets. You can create one by clicking on Slidesets in the Slides menu (or <a href="/wp-admin/edit-tags.php?taxonomy=slidesets&post_type=slides" target="_blank">here</a><span class="dashicons dashicons-welcome-add-page" style="opacity:0.4;"></span>) or by adding a Slide to a Slideset when editing it.' ).'</p>';
      return ob_get_clean();
    }
  }
  $screen = get_current_screen();
  $screen->add_help_tab( array(
    'id'      => 'aFSHelpTab',
    'title'   => __('Slideshows'),
    'content' => '<p>'.__( 'You can display all<span style="color:#c30;">*</span> of your Slides by adding [slides] to any Page, Post or anywhere else your theme and plugins let you add a <a href="http://support.wordpress.com/shortcodes/" target="_blank">shortcode</a><span class="dashicons dashicons-external" style="opacity:0.4;"></span>. To display a specific Slideset, use [slides slideset=my-slideset] (replacing "my-slideset" with your Slideset\'s slug*).' ).'</p>'
    .aFSHTShortcodes().'
    <p>'.__( 'There are more parameters (settings) you can add to your shortcode to change it\'s end result (e.g. [slides slideset=my-slideset prevnext=false] will remove the slideshow\'s "Previous" and "Next" buttons). No parameters are required unless customization is necessary. Here is a list of all parameters (in the convention: <code>parameter</code> "default value" — <span class="description">Description; optional values</span>):' ).'</p>
    <!-- <span class="dashicons dashicons-arrow-up" style="background:#f6fbfd;color:#aeb1b3;line-height: 0;height: 1px;margin: 0 auto -14px;display:block;position: relative;"></span> -->
    <!-- <div style="background:#e1e1e1;color:#aeb1b3;line-height: 0;width: auto;height: 1px;margin: 0 auto -14px;box-shadow: inset 0 0 20px #f6fbfd;display:block;position: relative;"></div> -->
    <ul style="max-height:173px;border-top:1px solid #e1e1e1;border-bottom:1px solid #e1e1e1;overflow-y:scroll;"><!--  -->
      <li style="padding-top:0.5em;"><code>slideset</code> "" — <span class="description">Selects a specific Slideset; slideset-slug or all (shows all slides)</span></li>
      <li><code>auto</code> false — <span class="description">Automate Slide transitioning; true or false</span></li>
      <li><code>speed</code> 7000 (7 seconds) — <span class="description">Duration each Slide is displayed; number of milliseconds (no commas)</span></li>
      <li><code>prevnext</code> true — <span class="description">Adds "Previous" and "Next" buttons; true or false</span></li>
      <li><code>pause</code> false — <span class="description">Adds Pause button; true or false</span></li>
      <li><code>tabs</code> false — <span class="description">Adds tabs/pager; true, false, thumbnails, labels, all or full</span></li>
      <li><code>tabsfirst</code> false — <span class="description">Outputs tabs before the slideshow; true or false</span></li>
      <li><code>stoppable</code> true — <span class="description">Stops automated transition upon user interaction; true or false</span></li>
      <li><code>pauseonhover</code> true — <span class="description">Pause on hover/mouseover; true or false</span></li>
      <li><code>fullscreen</code> false — <span class="description">Adds Fullscreen button (note <a href="http://caniuse.com/#search=fullscreen" target="_blank">limited browser support</a><span class="dashicons dashicons-external" style="opacity:0.4;"></span>); true or false</span></li>
      <li><code>swipe</code> true (horizontal) — <span class="description">Adds touchscreen swipe capability;</span>
        <ul>
          <li style="list-style-type:circle"><span class="description">true or horizontal, leftright: left = next Slide, right = previous Slide</span></li>
          <li style="list-style-type:circle"><span class="description">vertical or updown: up = next Slide, down = previous Slide</span></li>
          <li style="list-style-type:circle"><span class="description">both or all: up and/or left = next Slide, down and/or right = previous Slide</span></li>
          <li style="list-style-type:circle"><span class="description">any: up and/or left = next Slide, down and/or right = previous Slide, normal page scrolling functions simultaniously (note: in practice, upward and downward swipe only results in normal page scrolling, making this option rarely useful)</span></li>
          <li style="list-style-type:circle"><span class="description">false: removes swiping capability (scrolling is unaffected)</span></li>
        </ul>
      </li>
      <li><code>class</code> "" — <span class="description">Adds CSS class(es) to the slideset, "any css-classes"</span></li>
      <li><code>tabsclass</code> "" — <span class="description">Adds CSS class(es) to the tabs. Note: doesn\'t work if "tabs" is "true" unless "tabsfirst" is also "true". Works with all other options ("labels", "thumbnails", etc.)</span></li>
      <li><code>color</code> (inherited) — <span class="description">Sets the color of the controls (may affect text in Slides as well). Examples: #fff, rgb(255,135,125), orange</span></li>
      <li><code>size</code> (inherited) — <span class="description">Sets the size of the controls (may affect text in Slides as well). Examples: 22px, 1.6em, 110%</span></li>
      <li><code>order</code> asc — <span class="description">The order in which Slides are displayed; asc (ascending), desc (descending) </span></li>
      <li><code>orderby</code> priority — <span class="description">What the display order is based upon; date (date of Slide), priority (if set in Slide options), name (Slide name), ID (Slide ID), rand (random order)</span></li>
      <li><code>meta_key</code> "" — <span class="description">For advanced users to specify a meta_key (experimental—may eventually be removed)</span></li>
    </ul>
    <!-- <div style="background:#e1e1e1;color:#aeb1b3;line-height: 0;width: auto;height: 1px;margin: 0 auto -14px;box-shadow: inset 0 0 20px #f6fbfd;display:block;position: relative;"></div> -->
    <!-- <span class="dashicons dashicons-arrow-down" style="background:#f6fbfd;color:#aeb1b3;line-height: 0;height: 1px;margin: -14px auto 0;display:block;position: relative;"></span> -->
    <p style="color:#c30;">'.__( '*WARNING: Depending on the number of Slides this website has, adding <em>all</em> of them to a single slideshow can drastically slow down the website\'s load time when outputting the slideshow.' ).'</p>
    <p>'.__( '*Slugs: You can obtain the slug of any of your slidesets by visiting the <a href="/wp-admin/edit-tags.php?taxonomy=slidesets&post_type=slides" target="_blank">Slidesets&nbsp;page</a><span class="dashicons dashicons-welcome-add-page" style="opacity:0.4;"></span>. To learn more about slugs in general, <a href="http://codex.wordpress.org/Glossary#Slug" target="_blank">go here</a><span class="dashicons dashicons-external" style="opacity:0.4;"></span>.' ).'</p>
    <p>'.__( '<span class="dashicons dashicons-welcome-add-page" style="color:#aeb1b3;"></span> = Opens in a new tab/window.' ).'</p>
    <p>'.__( '<span class="dashicons dashicons-external" style="opacity:0.4;"></span> = Links to an external website.' ).'</p>'
  ));
}
