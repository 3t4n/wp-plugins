<?php
// Working
function roRokuFreeMenu() { 
 add_submenu_page('rovidx-options', 'Roku Addon', 'Roku Addon', 'manage_options', 'roroku', 'rovidx_roku_page');
}
add_action('admin_menu', 'roRokuFreeMenu');

function rovidx_roku_page() {

ob_start();
?>
<div class="wrap"><h3>Instructions for setting up RoVidX Roku Addon</h3>
<h5>Feed: <a href="<?php echo get_feed_link('rokucat'); ?>" target="_blank">Roku Category Feed</a></h5>
<ol>
  <li>Install <strong>Eclipse</strong> and the <strong>Roku plugin</strong> (<a href="http://sdkdocs.roku.com/display/sdkdoc/Eclipse+Plugin+Guide">Instructions here</a>)</li>
  <li>Enable &quot;Developer Mode&quot; on your Roku device (<a href="http://sdkdocs.roku.com/display/sdkdoc/Developer+Guide#DeveloperGuide-71EnablingDevelopmentModeonyourbox">Instructions here</a>)</li>
  <li>Click<strong> File &gt; New &gt; BrightScript Project</strong></li>
  <li>Fill in a Project name.</li>
  <li>Under &quot;<strong>Template</strong>&quot; select &quot;<strong>VideoPlayer</strong>&quot;</li>
  <li>Click <strong>&quot;Next&quot; </strong>then<strong> &quot;Finish&quot;</strong></li>
  <li>Under <strong>&quot;Project Explorer&quot;</strong> double-click the <strong>&quot;Source&quot;</strong> folder.</li>
  <li>Locate<strong> categoryFeed.brs</strong> and go to<strong> line 15</strong> &amp; find the following code:
    <pre><strong>conn.UrlPrefix   = "http://rokudev.roku.com/rokudev/examples/videoplayer/xml"<br>
conn.UrlCategoryFeed = conn.UrlPrefix + "/categories.xml"</strong></pre>
  </li>
  <li>Change the code to:
    <pre><strong>conn.UrlPrefix   = "http://websiteURL.com/feed/rokucat"<br>
conn.UrlCategoryFeed = conn.UrlPrefix + "/"</strong></pre>
  </li>
  <li>Click<strong> File &gt; Export</strong></li>
  <li>Select <strong>&quot;BrightScript&quot; </strong>folder and then select <strong>&quot;BrighScript Deployment&quot;</strong></li>
  <li>Click<strong> &quot;Next&quot;</strong></li>
  <li>Select options for your build. Under deployment click<strong> &quot;Install on Roku Box&quot;</strong> and fill in the <em><strong>Username, Password, IP Address</strong></em> and click <strong>&quot;Finish&quot;</strong></li>
  <li>Test your application on your Roku device. </li>
  <li>If you are satisfied run<strong> &quot;File &gt; Export&quot; </strong>again</li>
  <li>Enable  <strong>&quot;Create Package (.pkg) file&quot;</strong></li>
  <li>Click<strong> &quot;New Keys&quot;</strong> if this is your first time creating a PKG file on your Roku device </li>
  <li>Enter the <strong>&quot;App Name/Version&quot;</strong></li>
  <li>Click Finish. </li>
  <li>You will now have a .pkg file in your &quot;Out&quot; directory. You can upload this to <a href="https://owner.roku.com/Developer"><strong>Roku's channel store</strong></a><strong>.</strong></li>
</ol>

</div>
<?php
echo ob_get_clean();

}