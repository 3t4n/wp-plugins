<?php
if ( ! defined( 'ABSPATH' ) || ! current_user_can( 'manage_options' ) ) exit;
$tzcustom_version = tzcustom_plugin_get_version();
?>
<div class="tzpost-col-right">
  <h2>Custom Post Slider<?php echo esc_attr($tzcustom_version);?></h2>

  <ul class="info_author">
    <li><a href="http://www.templaza.com/forum/14-wordpress-plugin-discussion.html" target="_blank">Plugin Homepage</a></li>
    <li><a href="http://www.templaza.com/forum/14-wordpress-plugin-discussion.html" target="_blank">Help / Support</a></li>
    <li><a href="http://www.templaza.com" target="_blank">Document</a></li>
  </ul>
  <h3>Thanks for using Custom Post Slider Plugin</h3>

  <ul class="info_author">
    <li><a href="http://wordpress.org/support/view/plugin-reviews/custom-post-slider" target="_blank">Give it a good rating and review</a></li>
    <li><a href="http://wordpress.org/plugins/custom-post-slider/" target="_blank">Vote that it work</a></li>
  </ul>
</div>
<?php
$tcount = $wpdb->get_results("SHOW TABLE STATUS WHERE name = '".$wpdb->prefix."tzcustom_optionset'");
foreach( $res1 as $dset){
	$plist = unserialize($dset->plist);
	$query = unserialize($dset->query);
	$slider = unserialize($dset->slider);
	$container = unserialize($dset->container);
	$content = unserialize($dset->content);
	$navigation = unserialize($dset->navigation);
	
	if( !isset($content['tzcustom_link_rel'] )) $content['tzcustom_link_rel'] = 'none';
?>


<div class="metabox-holder" style="margin-top:20px;">
  <div class="postbox-container" style="width:100%">
    <div class="postbox closed">
      <div class="handlediv down" title="Click to toggle"> <br>
      </div>
      <h3 style="cursor:pointer; text-align:center" class="tzcustom-expand <?php if(isset($_POST['tzcustom_submit']) && $_POST['tzcustom_submit'] == 'Add new slideshow' && $_POST['nextoptid'] == $dset->id){echo 'tzcustom-highlight';}?>" id="tzcustomtxt<?php echo $dset->id;?>">
        <?php if(get_option('optset'.$dset->id)){echo get_option('optset'.$dset->id);}else{echo 'Slider '.$dset->id;}?>
      </h3>
      <div class="inside">
        <fieldset>
          <legend class="tzcustom-legend" style="width:97px;"><strong>Label & Usage</strong></legend>
          <table class="form-table">
            <tr>
              <th scope="row">Label</th>
              <td><input type="text"  value="<?php if(get_option('optset'.$dset->id)){echo get_option('optset'.$dset->id);}else{echo 'Slider '.$dset->id;}?>" name="optset<?php echo $dset->id;?>" class="tzcustom-optset-label" onchange="tzcustomUpdateLabel(this.name,this.value,<?php echo $dset->id;?>)" />
                <span id="tzcustombox<?php echo $dset->id;?>" style="padding-left:10px; display:none;"><img src="<?php echo tzcustom_url;?>/images/ajax-loader.gif" /></span></td>
            </tr>
            <tr>
              <th scope="row">Usage</th>
              <td><input style="width:200px; font-size:12px; text-align:left;" type="text" value='[tzcustom-slideshow optset="<?php echo $dset->id;?>"]' readonly="readonly"  /></td>
            </tr>
          </table>
        </fieldset>
        <fieldset>
          <legend class="tzcustom-legend tzcustomsm" style="width:80px; background-position:79px 6px;"><strong>Select Post</strong></legend>
          <div id="tzcustom-sel<?php echo $dset->id;?>">
            <table class="form-table">
              <tr>
                <th scope="row">Select post using</th>
                <td><select name="tzcustomsmethod<?php echo $dset->id?>" onchange="tzupdateSm(this,<?php echo $dset->id;?>);">
                    <option value="plist" <?php if(get_option('tzcustomsmethod'.$dset->id) == 'plist'){echo 'selected="selected"';}?>>Post list</option>
                    <option value="query" <?php if(get_option('tzcustomsmethod'.$dset->id) == 'query'){echo 'selected="selected"';}?>>Query</option>
                  </select>
                  <span id="smudtsts<?php echo $dset->id;?>" style="padding-left:10px; display:none;"><img src="<?php echo tzcustom_url;?>/images/ajax-loader.gif" /></span></td>
              </tr>
            </table>
            <form method="post" onsubmit="return false" id="plist<?php echo $dset->id;?>">
              <table class="form-table <?php if(get_option('tzcustomsmethod'.$dset->id) == 'query'){echo 'tzcustom-hide';}?>">
                <tr>
                  <th scope="row">Listing option</th>
                  <td><select title="Post type" name="tzcustom_post_stypes">
                      <option value="post" <?php if($plist['tzcustom_post_stypes'] == 'post'){echo 'selected="selected"';}?>>post</option>
                      <option value="page" <?php if($plist['tzcustom_post_stypes'] == 'page'){echo 'selected="selected"';}?>>page</option>
                      <?php
                              foreach ($customPostTypes  as $post_type ) {
                          ?>
                      <option value="<?php echo $post_type;?>" <?php if($plist['tzcustom_post_stypes'] == $post_type){echo 'selected="selected"';}?>><?php echo $post_type;?></option>
                      <?php		
                              }
                          ?>
                    </select>
                    <span style="padding-left:10px;">
                    <input type="text" name="tzcustom_plistmax" value="<?php echo $plist['tzcustom_plistmax'];?>" style="width:40px;" onkeypress="return onlyNum(event);" title="Max number of post to list" />
                    </span> <span style="padding-left:10px;">
                    <select name="tzcustom_plistorder_by" title="Order by">
                      <option value="date" <?php if($plist['tzcustom_plistorder_by'] == 'date'){echo 'selected="selected"';}?>>Date</option>
                      <option value="ID" <?php if($plist['tzcustom_plistorder_by'] == 'ID'){echo 'selected="selected"';}?>>ID</option>
                      <option value="author" <?php if($plist['tzcustom_plistorder_by'] == 'author'){echo 'selected="selected"';}?>>Author</option>
                      <option value="title" <?php if($plist['tzcustom_plistorder_by'] == 'title'){echo 'selected="selected"';}?>>Title</option>
                      <option value="name" <?php if($plist['tzcustom_plistorder_by'] == 'name'){echo 'selected="selected"';}?>>Name</option>
                      <option value="rand" <?php if($plist['tzcustom_plistorder_by'] == 'rand'){echo 'selected="selected"';}?>>Random</option>
                      <option value="menu_order" <?php if($plist['tzcustom_plistorder_by'] == 'menu_order'){echo 'selected="selected"';}?>>Menu order</option>
                      <option value="comment_count" <?php if($plist['tzcustom_plistorder_by'] == 'comment_count'){echo 'selected="selected"';}?>>Comment count</option>
                    </select>
                    </span> <span style="padding-left:10px;">
                    <select name="tzcustom_plistorder" title="Order">
                      <option value="ASC" <?php if($plist['tzcustom_plistorder'] == 'ASC'){echo 'selected="selected"';}?>>Ascending</option>
                      <option value="DESC" <?php if($plist['tzcustom_plistorder'] == 'DESC'){echo 'selected="selected"';}?>>Descending</option>
                    </select>
                    </span> <span style="padding-left:10px;">
                    <button class="button-secondary" value="" onclick="listPost(<?php echo $dset->id;?>)">List</button>
                    </span> <span class="ajx-loaderp" style="padding-left:12px; display:none;"><img src="<?php echo tzcustom_url;?>/images/ajax-loader.gif" /></span></td>
                </tr>
                <tr>
                  <th scope="row">Select post from list</th>
                  <td><select name="tzcustom_plist[]" multiple="multiple" style="min-height:250px; min-width:300px;" id="tzcustom-plist-field<?php echo $dset->id;?>">
                      <?php 
						$lpargs = array(
								'post_type'      => ($plist['tzcustom_post_stypes']) ? $plist['tzcustom_post_stypes'] : 'post',
								'posts_per_page' => ($plist['tzcustom_plistmax']) ? $plist['tzcustom_plistmax'] : 99,
								'orderby'		 => ($plist['tzcustom_plistorder_by']) ? $plist['tzcustom_plistorder_by'] : 'date',
								'order'			 => ($plist['tzcustom_plistorder']) ? $plist['tzcustom_plistorder'] : 'DESC'
						);
					 	$pl_query = new WP_Query($lpargs); while ($pl_query->have_posts()) : $pl_query->the_post();?>
                      <option value="<?php the_id();?>" <?php if(isset($plist['tzcustom_plist']) && in_array(get_the_id(),$plist['tzcustom_plist'])){echo 'selected="selected"';}?>>
                      <?php the_title();?>
                      </option>
                      <?php endwhile;wp_reset_query();?>
                    </select>
                    <span style="padding-left:10px; font-size:10px; font-style:italic; vertical-align:top;">[ * You can select multiple ]</span></td>
                </tr>
                <tr>
                  <th scope="row">&nbsp;</th>
                  <td><input type="submit" name="tzcustom_submit" value="Save changes" class="button-primary" onclick="tzcustomupdateOptionSet('plist<?php echo $dset->id;?>')" />
                    <span class="ajx-loader" style="padding-left:15px; display:none;"><img src="<?php echo tzcustom_url;?>/images/ajax-loader.gif" /></span><span class="ajx-sts"></span></td>
                </tr>
              </table>
              <input type="hidden" name="opt_field" value="plist" />
              <input type="hidden" value="<?php echo $dset->id;?>" name="opt_id" />
            </form>
            <form method="post" onsubmit="return false" id="query<?php echo $dset->id;?>">
              <table class="form-table <?php if(!get_option('tzcustomsmethod'.$dset->id) || get_option('tzcustomsmethod'.$dset->id) == 'plist'){echo 'tzcustom-hide';}?>">
                <tr>
                  <th scope="row">Post Type</th>
                  <td><select name="tzcustom_post_types" onchange="advpsCheckCat(this.value,<?php echo $dset->id;?>)">
                      <option value="post" <?php if($query['tzcustom_post_types'] == 'post'){echo 'selected="selected"';}?>>post</option>
                      <option value="page" <?php if($query['tzcustom_post_types'] == 'page'){echo 'selected="selected"';}?>>page</option>
                      <?php
                              foreach ($customPostTypes  as $post_type ) {
                          ?>
                      <option value="<?php echo $post_type;?>" <?php if($query['tzcustom_post_types'] == $post_type){echo 'selected="selected"';}?>><?php echo $post_type;?></option>
                      <?php		
                              }
                          ?>
                    </select></td>
                </tr>
                <tr id="tzcustom-cat-field<?php echo $dset->id;?>">
                  <?php  
					$posttypeobj = get_post_type_object($query['tzcustom_post_types']);
					if($query['tzcustom_post_types'] != "page" && ($query['tzcustom_post_types'] == 'post' || in_array('category',$posttypeobj->taxonomies))){
				?>
                  <th scope="row">Category</th>
                  <td><select name="tzcustom_category[]" multiple="multiple">
                      <?php 
					  	$catList = get_categories();
						foreach($catList as $scat){
					  ?>
                      <option value="<?php echo $scat->term_id;?>" <?php if(isset($query['tzcustom_category']) && in_array($scat->term_id,$query['tzcustom_category'])){echo 'selected="selected"';}?>><?php echo $scat->name;?></option>
                      <?php }?>
                    </select>
                    <span style="padding-left:10px; font-size:10px; font-style:italic; vertical-align:top;">[ * You can select multiple category ]</span></td>
                  <?php }?>
                </tr>
                <tr>
                  <th scope="row">Max. Number of post</th>
                  <td><input type="text" name="tzcustom_maxpost" value="<?php echo $query['tzcustom_maxpost'];?>" style="width:60px;" onkeypress="return onlyNum(event);" /></td>
                </tr>
                <tr>
                  <th scope="row">Post Format</th>
                  <td><select name="tzcustom_post_format">
                      <option value="all" <?php if($query['tzcustom_post_format'] == 'all'){echo 'selected="selected"';}?>>All</option>
                      <option value="aside" <?php if($query['tzcustom_post_format'] == 'aside'){echo 'selected="selected"';}?>>Aside</option>
                      <option value="gallery" <?php if($query['tzcustom_post_format'] == 'gallery'){echo 'selected="selected"';}?>>Gallery</option>
                      <option value="link" <?php if($query['tzcustom_post_format'] == 'link'){echo 'selected="selected"';}?>>Link</option>
                      <option value="image" <?php if($query['tzcustom_post_format'] == 'image'){echo 'selected="selected"';}?>>Image</option>
                      <option value="quote" <?php if($query['tzcustom_post_format'] == 'quote'){echo 'selected="selected"';}?>>Quote</option>
                      <option value="status" <?php if($query['tzcustom_post_format'] == 'status'){echo 'selected="selected"';}?>>Status</option>
                      <option value="video" <?php if($query['tzcustom_post_format'] == 'video'){echo 'selected="selected"';}?>>Video</option>
                      <option value="audio" <?php if($query['tzcustom_post_format'] == 'audio'){echo 'selected="selected"';}?>>Audio</option>
                      <option value="chat" <?php if($query['tzcustom_post_format'] == 'chat'){echo 'selected="selected"';}?>>Chat</option>
                    </select></td>
                </tr>
                <tr>
                  <th scope="row">Order by</th>
                  <td><select name="tzcustom_order_by">
                      <option value="date" <?php if($query['tzcustom_order_by'] == 'date'){echo 'selected="selected"';}?>>Date</option>
                      <option value="ID" <?php if($query['tzcustom_order_by'] == 'ID'){echo 'selected="selected"';}?>>ID</option>
                      <option value="author" <?php if($query['tzcustom_order_by'] == 'author'){echo 'selected="selected"';}?>>Author</option>
                      <option value="title" <?php if($query['tzcustom_order_by'] == 'title'){echo 'selected="selected"';}?>>Title</option>
                      <option value="name" <?php if($query['tzcustom_order_by'] == 'name'){echo 'selected="selected"';}?>>Name</option>
                      <option value="rand" <?php if($query['tzcustom_order_by'] == 'rand'){echo 'selected="selected"';}?>>Random</option>
                      <option value="menu_order" <?php if($query['tzcustom_order_by'] == 'menu_order'){echo 'selected="selected"';}?>>Menu order</option>
                      <option value="comment_count" <?php if($query['tzcustom_order_by'] == 'comment_count'){echo 'selected="selected"';}?>>Comment count</option>
                    </select></td>
                </tr>
                <tr>
                  <th scope="row">Order</th>
                  <td><select name="tzcustom_order">
                      <option value="ASC" <?php if($query['tzcustom_order'] == 'ASC'){echo 'selected="selected"';}?>>Ascending</option>
                      <option value="DESC" <?php if($query['tzcustom_order'] == 'DESC'){echo 'selected="selected"';}?>>Descending</option>
                    </select></td>
                </tr>
                <tr>
                  <th scope="row">&nbsp;</th>
                  <td><input type="submit" name="tzcustom_submit" value="Save changes" class="button-primary" onclick="tzcustomupdateOptionSet('query<?php echo $dset->id;?>')" />
                    <span class="ajx-loader" style="padding-left:15px; display:none;"><img src="<?php echo tzcustom_url;?>/images/ajax-loader.gif" /></span><span class="ajx-sts"></span></td>
                </tr>
              </table>
              <input type="hidden" name="opt_field" value="query" />
              <input type="hidden" value="<?php echo $dset->id;?>" name="opt_id" />
            </form>
          </div>
        </fieldset>
        <fieldset>
          <legend class="tzcustom-legend" style="width:50px; background-position:49px 6px;"><strong>Slider Options</strong></legend>
          <form method="post" id="slider<?php echo $dset->id;?>" onsubmit="return false">
            <table class="form-table">
              <tr>
                <th scope="row">Auto play</th>
                <td><select name="tzcustom_autoplay">
                    <option value="true" <?php if($slider['tzcustom_autoplay'] == 'true'){echo 'selected="selected"';}?>>Yes</option>
                    <option value="false" <?php if($slider['tzcustom_autoplay'] == 'false'){echo 'selected="selected"';}?>>No</option>
                  </select></td>
              </tr>
              <tr>
                <th scope="row">Items</th>
                <td><input type="text" name="tzcustom_items" value="<?php echo $slider['tzcustom_items'];?>" style="width:60px;" onkeypress="return onlyNum(event);" /></td>
              </tr>
              <tr>
                <th scope="row">Slide Speed</th>
                <td><input type="text" name="tzcustom_slidespeed" value="<?php echo $slider['tzcustom_slidespeed'];?>" style="width:60px;" onkeypress="return onlyNum(event);" /></td>
              </tr>
              <tr>
                <th scope="row">Rewind Speed</th>
                <td><input type="text" name="tzcustom_rewindspeed" value="<?php echo $slider['tzcustom_rewindspeed'];?>" style="width:60px;" onkeypress="return onlyNum(event);" /></td>
              </tr>
              <tr>
                <th scope="row">Enable pause on hover</th>
                <td><select name="tzcustom_ps_hover">
                    <option value="true" <?php if($slider['tzcustom_ps_hover'] == 'true'){echo 'selected="selected"';}?>>Yes</option>
                    <option value="false" <?php if($slider['tzcustom_ps_hover'] == 'false'){echo 'selected="selected"';}?>>No</option>
                  </select></td>
              </tr>
              <tr>
                <th scope="row">&nbsp;</th>
                <td><input type="submit" name="tzcustom_submit" value="Save changes" class="button-primary" onclick="tzcustomupdateOptionSet('slider<?php echo $dset->id;?>')" />
                  <span class="ajx-loader" style="padding-left:15px; display:none;"><img src="<?php echo tzcustom_url;?>/images/ajax-loader.gif" /></span><span class="ajx-sts"></span></td>
              </tr>
            </table>
            <input type="hidden" name="opt_field" value="slider" />
            <input type="hidden" value="<?php echo $dset->id;?>" name="opt_id" />
          </form>
        </fieldset>

        <fieldset>
          <legend class="tzcustom-legend" style="width:155px; background-position:154px 6px;"><strong>Container & Thumbnail</strong></legend>
          <form method="post" onsubmit="return false" id="container<?php echo $dset->id;?>">
            <table class="form-table">
              <tr>
                <th scope="row">Select Thumbnail</th>
                <td><select name="tzcustom_thumbnail">
                    <option value="thumbnail" <?php if($container['tzcustom_thumbnail'] == 'thumbnail'){echo 'selected="selected"';}?>>thumbnail</option>
                    <option value="medium" <?php if($container['tzcustom_thumbnail'] == 'medium'){echo 'selected="selected"';}?>>medium</option>
                    <option value="large" <?php if($container['tzcustom_thumbnail'] == 'large'){echo 'selected="selected"';}?>>large</option>
                    <option value="full" <?php if($container['tzcustom_thumbnail'] == 'full'){echo 'selected="selected"';}?>>full</option>
                  </select></td>
              </tr>
              <tr>
                <th scope="row">Default image url</th>
                <td><input type="text" name="tzcustom_default_image" value="<?php if(isset($container['tzcustom_default_image'])){ echo $container['tzcustom_default_image'];}?>" style="width:250px;" />
                  <span style="padding-left:10px; font-size:10px; font-style:italic;"> [ N.B. If any post doesn't have featured image then default image will be shown.]</span></td>
              </tr>
              <tr>
                <th scope="row">Slide Container Width</th>
                <td><input type="text" name="tzcustom_sld_width" value="<?php echo $container['tzcustom_sld_width'];?>" style="width:45px;" onkeypress="return onlyNum(event);" />
                  &nbsp;px</td>
              </tr>

              <tr>
                <th scope="row">Background Color</th>
                <td><input id="advpscolor<?php echo ++$flg?>" class="tzcustom-color-picker" type="text" name="tzcustom_bgcolor" value="<?php echo $container['tzcustom_bgcolor'];?>" style="width:100px;" />
                  <div class="tzcustomfarb" style="padding-left:22%"></div></td>
              </tr>

              <tr>
                <th scope="row">Slider Layout</th>
                <?php
                $theme_part = get_template_directory();
                $directory = "" . $theme_part . "/custom-post-slider/";
                $directory_plg = TZ_CUSTOM_POST_SLIDER_DIR."/tpl_views/";
                $tzcustoms_theme_layout = glob($directory . "*.php");
                $tzcustoms_plg_layout = glob($directory_plg . "*.php");
                if(!empty($tzcustoms_theme_layout)){
                  $tzcustom_layouts = $tzcustoms_theme_layout;
                }else{
                  $tzcustom_layouts = $tzcustoms_plg_layout;
                }
                ?>
                <td>
                  <select name="tzcustom_layout">
                  <?php foreach($tzcustom_layouts as $tzcustom_layout  ){
                    $filename = substr( $tzcustom_layout, ( strrpos( $tzcustom_layout, "/" ) +1 ) );
                    $filenames = str_replace('.php','',$filename);
                    ?>
                    <option value="<?php echo esc_attr($filenames);?>" <?php if($container['tzcustom_layout'] == $filenames){echo 'selected="selected"';}?>><?php echo esc_attr($filenames);?></option>
                    <?php } ?>
                  </select>
              </tr>

              <tr>
                <th scope="row">&nbsp;</th>
                <td><input type="submit" name="tzcustom_submit" value="Save changes" class="button-primary" onclick="tzcustomupdateOptionSet('container<?php echo $dset->id;?>')" />
                  <span class="ajx-loader" style="padding-left:15px; display:none;"><img src="<?php echo tzcustom_url;?>/images/ajax-loader.gif" /></span><span class="ajx-sts"></span></td>
              </tr>
            </table>
            <input type="hidden" name="opt_field" value="container" />
            <input type="hidden" value="<?php echo $dset->id;?>" name="opt_id" />
          </form>
        </fieldset>
        <fieldset>
          <legend class="tzcustom-legend" style="width:102px; background-position:101px 6px;"><strong>Title & Excerpt</strong></legend>
          <form method="post" onsubmit="return false" id="content<?php echo $dset->id;?>">
            <table class="form-table">
              <tr>
                <th scope="row">Overlay size</th>
                <td>Width&nbsp;
                  <input type="text" name="tzcustom_overlay_width" value="<?php echo $content['tzcustom_overlay_width'];?>" style="width:80px;" onkeypress="return onlyNum(event);" />
                  %&nbsp;&nbsp;&nbsp;Height&nbsp;
                  <input type="text" name="tzcustom_overlay_height" value="<?php echo $content['tzcustom_overlay_height'];?>" style="width:80px;" onkeypress="return onlyNum(event);" />
                  %</td>
              </tr>
              <tr>
                <th scope="row">Overlay color</th>
                <td><input type="text" name="tzcustom_overlay_color" value="<?php echo $content['tzcustom_overlay_color'];?>" style="width:100px;" class="tzcustom-color-picker" id="advpscolor<?php echo ++$flg?>" />
                  <div class="tzcustomfarb" style="padding-left:22%"></div></td>
              </tr>
              <tr>
                <th scope="row">Overlay opacity</th>
                <td><input type="text" name="tzcustom_overlay_opacity" value="<?php echo $content['tzcustom_overlay_opacity'];?>" style="width:50px;" />
                  &nbsp;<span style="padding-left:10px; font-size:10px; font-style:italic;">[ 0 - 1 ]</span></td>
              </tr>

              <tr>
                <th scope="row">Overlay visibility</th>
                <td><select name="tzcustom_excpt_visibility">
                    <option value="show on hover" <?php if($content['tzcustom_excpt_visibility'] == 'show on hover'){echo 'selected="selected"';}?>>Show on hover</option>
                    <option value="always show" <?php if($content['tzcustom_excpt_visibility'] == 'always show'){echo 'selected="selected"';}?>>Always show</option>
                  </select></td>
              </tr>
              <tr>
                <th scope="row">Text align</th>
                <td><select name="tzcustom_text_align">
                    <option value="center" <?php if($content['tzcustom_text_align'] == 'center'){echo 'selected="selected"';}?>>Center</option>
                    <option value="left" <?php if($content['tzcustom_text_align'] == 'left'){echo 'selected="selected"';}?>>Left</option>
                    <option value="right" <?php if($content['tzcustom_text_align'] == 'right'){echo 'selected="selected"';}?>>Right</option>
                  </select></td>
              </tr>

              <tr>
                <th scope="row">Title font Color</th>
                <td><input type="text" name="tzcustom_titleFcolor" value="<?php echo $content['tzcustom_titleFcolor'];?>" style="width:100px;" class="tzcustom-color-picker" id="advpscolor<?php echo ++$flg?>" />
                  <div class="tzcustomfarb" style="padding-left:22%"></div></td>
              </tr>
              <tr>
                <th scope="row">Title hover Color</th>
                <td><input type="text" name="tzcustom_titleHcolor" value="<?php echo $content['tzcustom_titleHcolor'];?>" style="width:100px;" class="tzcustom-color-picker" id="advpscolor<?php echo ++$flg?>" />
                  <div class="tzcustomfarb" style="padding-left:22%"></div></td>
              </tr>
              <tr>
                <th scope="row">Title font size</th>
                <td><input type="text" name="tzcustom_titleFsizeL" value="<?php if(isset($content['tzcustom_titleFsizeL'])){ echo $content['tzcustom_titleFsizeL'];}else{echo 20;}?>" style="width:40px;" onkeypress="return onlyNum(event);" title="For desktop, laptop and larger width device." />

                </td>
              </tr>

              <tr>
                <th scope="row">Excerpt font color</th>
                <td><input class="tzcustom-color-picker" type="text" name="tzcustom_excptFcolor" value="<?php echo $content['tzcustom_excptFcolor'];?>" style="width:100px;" id="advpscolor<?php echo ++$flg?>" />
                  <div class="tzcustomfarb" style="padding-left:22%"></div></td>
              </tr>
              <tr>
                <th scope="row">Excerpt font size</th>
                <td><input type="text" name="tzcustom_excptFsizeL" value="<?php if(isset($content['tzcustom_excptFsizeL'])){ echo $content['tzcustom_excptFsizeL'];}else{echo 14;}?>" style="width:40px;" onkeypress="return onlyNum(event);" title="For desktop, laptop and larger width device." />
                </td>
              </tr>

              <tr>
                <th scope="row">Excerpt length</th>
                <td><input type="text" name="tzcustom_excerptlen" value="<?php echo $content['tzcustom_excerptlen'];?>" style="width:60px;" onkeypress="return onlyNum(event);" />
                  &nbsp;words</td>
              </tr>
              <tr>
                <th scope="row">Show image</th>
                <td><select name="tzcustom_image_display">
                    <option value="yes" <?php if($content['tzcustom_image_display'] == 'yes'){echo 'selected="selected"';}?>>Yes</option>
                    <option value="no" <?php if($content['tzcustom_image_display'] == 'no'){echo 'selected="selected"';}?>>No</option>
                  </select></td>
              </tr>
              <tr>
                <th scope="row">Show Title</th>
                <td><select name="tzcustom_title_display">
                    <option value="yes" <?php if($content['tzcustom_title_display'] == 'yes'){echo 'selected="selected"';}?>>Yes</option>
                    <option value="no" <?php if($content['tzcustom_title_display'] == 'no'){echo 'selected="selected"';}?>>No</option>
                  </select></td>
              </tr>
              <tr>
                <th scope="row">Show Excerpt</th>
                <td><select name="tzcustom_excerpt_display">
                    <option value="yes" <?php if($content['tzcustom_excerpt_display'] == 'yes'){echo 'selected="selected"';}?>>Yes</option>
                    <option value="no" <?php if($content['tzcustom_excerpt_display'] == 'no'){echo 'selected="selected"';}?>>No</option>
                  </select></td>
              </tr>
              <tr>
                <th scope="row">link target</th>
                <td><select name="tzcustom_link_target">
                    <option value="_self" <?php if($content['tzcustom_link_target'] == '_self'){echo 'selected="selected"';}?>>_self</option>
                    <option value="_blank" <?php if($content['tzcustom_link_target'] == '_blank'){echo 'selected="selected"';}?>>_blank</option>
                    <option value="_new" <?php if($content['tzcustom_link_target'] == '_new'){echo 'selected="selected"';}?>>_new</option>
                    <option value="_top" <?php if($content['tzcustom_link_target'] == '_top'){echo 'selected="selected"';}?>>_top</option>
                    <option value="_parent" <?php if($content['tzcustom_link_target'] == '_parent'){echo 'selected="selected"';}?>>_parent</option>
                  </select></td>
              </tr>
              <tr>
                <th scope="row">&nbsp;</th>
                <td><input type="submit" name="tzcustom_submit" value="Save changes" class="button-primary" onclick="tzcustomupdateOptionSet('content<?php echo $dset->id;?>')" />
                  <span class="ajx-loader" style="padding-left:15px; display:none;"><img src="<?php echo tzcustom_url;?>/images/ajax-loader.gif" /></span><span class="ajx-sts"></span></td>
              </tr>
            </table>
            <input type="hidden" name="opt_field" value="content" />
            <input type="hidden" value="<?php echo $dset->id;?>" name="opt_id" />
          </form>
        </fieldset>
        <fieldset>
          <legend class="tzcustom-legend" style="width:79px; background-position:78px 6px;"><strong>Navigation</strong></legend>
          <form method="post" onsubmit="return false" id="navigation<?php echo $dset->id;?>">
            <table class="form-table">

              <tr>
                <th scope="row">Show Next/Previous</th>
                <td><select name="tzcustom_show_nxtprev">
                    <option value="true" <?php if($navigation['tzcustom_show_nxtprev'] == 'true'){echo 'selected="selected"';}?>>Yes</option>
                    <option value="false" <?php if($navigation['tzcustom_show_nxtprev'] == 'false'){echo 'selected="selected"';}?>>No</option>
                  </select></td>
              </tr>
              <tr>
                <th scope="row">Show Pagination</th>
                <td><select name="tzcustom_show_pagination">
                    <option value="true" <?php if($navigation['tzcustom_show_pagination'] == 'true'){echo 'selected="selected"';}?>>Yes</option>
                    <option value="false" <?php if($navigation['tzcustom_show_pagination'] == 'false'){echo 'selected="selected"';}?>>No</option>
                  </select></td>
              </tr>
              <tr>
                <th scope="row">&nbsp;</th>
                <td><input type="submit" name="tzcustom_submit" value="Save changes" class="button-primary" onclick="tzcustomupdateOptionSet('navigation<?php echo $dset->id;?>')" />
                  <span class="ajx-loader" style="padding-left:15px; display:none;"><img src="<?php echo tzcustom_url;?>/images/ajax-loader.gif" /></span><span class="ajx-sts"></span></td>
              </tr>
            </table>
            <input type="hidden" name="opt_field" value="navigation" />
            <input type="hidden" value="<?php echo $dset->id;?>" name="opt_id" />
          </form>
        </fieldset>
        <!-- </form>-->
        <form method="post" id="frmOptDel<?php echo $dset->id;?>" onsubmit="return false">
          <input type="hidden" value="<?php echo $dset->id;?>" name="optset-id" />
          <input type="hidden" value="<?php echo $tcount[0]->Auto_increment;?>" name="nextoptid" />
          <p>
            <input type="submit" name="del-optset" value="Delete" class="button-secondary" onclick="tzcustomdeleteOptSet(<?php echo $dset->id;?>)" style="width:12%;" />
             </p>
          <?php wp_nonce_field('tzcustom-checkauthnonce','tzcustom_wpnonce'); ?>
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
}
?>
<div style="position:relative; float:left; width:72%">
  <form method="post">
    <input type="hidden" name="template" value="owl" />
    <input type="hidden" name="nextoptid" id="nextoptid" value="<?php echo $tcount[0]->Auto_increment;?>" />
    <?php wp_nonce_field('tzcustom-checkauthnonce','tzcustom_wpnonce'); ?>
    <input type="submit" name="tzcustom_submit" value="Add new slideshow" class="button-primary" style="font-weight:bold" />
  </form>
</div>
