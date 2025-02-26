<div class="wrap">
	<h2>База агентов настройки</h2>

	<form method="post">
		<table class="form-table">
			<tr valign="top">
				<th scope="row">ID в БазеАгентов</th>
				<td>
					<select name="bazaagentov_num_items" id="bazaagentov_num_items">
						<?php for ($i=1; $i<=20; $i++) { ?>
							<option <?php if ($settings['num_items'] == $i) { echo 'selected'; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>	
						<?php } ?>
					</select>
					<select name="bazaagentov_type" id="bazaagentov_type">
						<option <?php if($settings['type'] == 'user') { echo 'selected'; } ?> value="user">user</option>
						<option <?php if($settings['type'] == 'set') { echo 'selected'; } ?> value="set">set</option>
						<option <?php if($settings['type'] == 'favorite') { echo 'selected'; } ?> value="favorite">favorite</option>
						<option <?php if($settings['type'] == 'group') { echo 'selected'; } ?> value="group">group</option>
						<option <?php if($settings['type'] == 'public') { echo 'selected'; } ?> value="public">community</option>
					</select>
					photos.
				</td> 
			</tr>
			<tr valign="top" id="userid">
				<th scope="row" id="userid_label">ID в БазеАгентов</th>
				<td><input name="bazaagentov_id" type="text" id="bazaagentov_id" value="<?php echo $settings['id']; ?>" size="20" />
					<a href="#" id="idgetter">найти мой id</a></td>
			</tr>
			<tr valign="top" id="set">
				<th scope="row">Set ID</th>
				<td><input name="bazaagentov_set" type="text" id="bazaagentov_set" value="<?php echo $settings['set']; ?>" size="40" /> Use number from the set url</p>
			</tr>
			<tr valign="top" id="tags">
				<th scope="row">ID в БазеАгентов</th>
				<td><input name="bazaagentov_tags" type="text" id="bazaagentov_tags" value="<?php echo $settings['tags']; ?>" size="40" /> Comma separated, no spaces</p>
			</tr>
			<tr valign="top">
				<th scope="row">HTML редактор</th>
				<td>
					<table style="margin-left: -10px">
						<tr>
							<td colspan="2" valign="top" style="border-width: 0px;">
								<label for="bazaagentov_before_list">До списка:</label><br/><input name="bazaagentov_before_list" type="text" id="bazaagentov_before_list" value="<?php echo htmlspecialchars(stripslashes($settings['before_list'])); ?>" style="width:400px;" />
							</td>
						</tr>
						<tr>
							<td valign="top" style="border-width: 0px;">
								<label for="bazaagentov_html">Item HTML:</label><br/> <textarea name="bazaagentov_html" type="text" id="bazaagentov_html" style="width:400px;" rows="28"><?php echo htmlspecialchars(stripslashes($settings['html'])); ?></textarea>
							</td>
							<td valign="top" style="border-width: 0px;">
								<div>
									<h4>"Объект HTML" метатеги:</h4>
									<ul>
										<li><code>%id%</code> - номер объекта в общей базе</li>
										<li><code>%date%</code> - дата публикации объекта</li>
										<li><code>%type%</code>  - тип объекта: квартира/комната и тд</li>
										<li><code>%adress%</code> - адрес объекта</li>
										<li><code>%metro%</code>  - станция метро</li>
										<li><code>%metro_dist%</code>  - расстояние до метро</li>
										<li><code>%so%</code> - общая площадь</li>
										<li><code>%sj%</code> - жилая площадь</li>
										<li><code>%sk%</code> - площадь кухни</li>
										<li><code>%sun_uzel%</code> - тип санузла</li>
										<li><code>%telephone%</code> - наличие телефона</li>
										<li><code>%mebel%</code> - наличие мебели</li>
										<li><code>%holod%</code> - наличие холодильника</li>
										<li><code>%washingmachine%</code> - наличие стиральной машины</li>
										<li><code>%price%</code> - стоимость в рублях</li>
										<li><code>%about%</code> - описание объекта</li>
										<li><code>%komnat%</code> - колличество сдаваемых комнат</li>
										<li><code>%komnat_all%</code> - общее колличество комнат</li>
										<li><code>%photo%</code> - фотография</li>
										<li><code>%floar%</code> - этаж</li>
										<li><code>%floars%</code> - этажей в здании</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="top" colspan="2" style="border-width: 0px;">
								<label for="bazaagentov_after_list">После списка:</label><br/> <input name="bazaagentov_after_list" type="text" id="bazaagentov_after_list" value="<?php echo htmlspecialchars(stripslashes($settings['after_list'])); ?>" style="width:400px;" />
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<h3>Настройки кеширования</h3>
		<p>This allows you to store the images on your server and reduce the load on Flickr. Make sure the plugin works without the cache enabled first. If you're still having
			trouble, try visiting the <a href="http://groups.google.com/group/bazaagentov/">bazaagentov forum</a> for help.</p>
		<table class="form-table">
			<tr valign="top">
				<th scope="row" colspan="2" class="th-full">
				<input name="bazaagentov_do_cache" type="checkbox" id="bazaagentov_do_cache" value="true" <?php if ($settings['do_cache'] == 'true') { echo 'checked="checked"'; } ?> />  
				<label for="use_image_cache">Включить кеширование объектов</label></th>
			</tr>
			<tr valign="top" class="cachesettings">
				<th scope="row">Image sizes to cache</th>
				<td>
					<?php
						foreach (array("small", "square", "thumbnail", "medium", "large") as $size) {
							echo '<input type="checkbox" name="bazaagentov_cache_'.$size.'" id="cache_'.$size.'" value="1"';
							if (is_array($settings['cache_sizes']) && in_array($size, $settings['cache_sizes'])) echo ' checked="checked" ';
							echo ' /> '.ucfirst($size).'<br/>';
						} 
					?>
				</td>
			</tr>
			<tr valign="top" class="cachesettings">
				<th scope="row">URL</th>
				<td><input name="bazaagentov_cache_uri" type="text" id="bazaagentov_cache_uri" value="<?php echo $settings['cache_uri']; ?>" size="50" /><br/>
					Could be <code><?php echo trailingslashit(get_option('siteurl')); ?>wp-content/cache/</code> ?</td>
			</tr>
			<tr valign="top" class="cachesettings">
				<th scope="row">Full Path</th>
				<td><input name="bazaagentov_cache_path" type="text" id="bazaagentov_cache_path" value="<?php echo $settings['cache_path']; ?>" size="50" /><br/>
					Could be <code><?php echo trailingslashit(realpath("../wp-content/cache")); ?></code> ?</td>
			</tr>
		</table>
		<div class="submit">
			<input type="submit" name="reset_bazaagentov_settings" value="<?php _e('Reset') ?>" />
			<input type="submit" name="save_bazaagentov_settings" value="<?php _e('Сохранить изменения') ?>" class="button-primary" />
		</div>
		<script>
			(function() {
				var $ = jQuery;
				$(document).ready(function(){
					function uiChange() {
						$("#set, #tags, #userid").hide();
						var sel = $("#bazaagentov_type").val();
						if (sel == "set") {
							$("#set").show();
						}
						if (sel.match(/(user|public)/)) {
							$("#tags").show();
						}
						if (sel.match(/(user|favorite|set|group)/)) {
							$("#userid").show();
							$("#userid_label").text(sel=="group"?"Group ID":"User ID");
						}
						$(".cachesettings")[ $("#bazaagentov_do_cache").attr("checked")?'show':'hide' ]();
					}
					$("#bazaagentov_type").change(uiChange);
					$("#bazaagentov_do_cache").change(uiChange);
					uiChange();
					
					$("#idgetter").click(function(event){
						var group = $("#bazaagentov_type").val()=="group";
						
						var x = prompt(
							group?"Enter here the URL of the Group pool:":"Enter here the URL of your Profile or photo pool:", 
							group?"http://flickr.com/groups/your_group/":"http://flickr.com/photos/your_username/"
						);
						if (!x) {
							return false;
						}
						var url = "http://api.flickr.com/services/rest/?"+
						"method="+(group?"flickr.urls.lookupGroup&":"flickr.urls.lookupUser&")+
						"api_key=bed56c11a80c6b68fa62f25ad393a94a&"+
						"format=json&"+
						"jsoncallback=?&"+
						"url="+x;
						$.getJSON(url,
							function(result) {
								if (result.stat != "ok") {
									alert("It seems that there is some kind of problem with the URL you provided. Please, try again.");
									return false;
								}
								$("#bazaagentov_id").val(group?result.group.id:result.user.id);
							}
						);
						return false;
					});
				});
			})();
		</script>
	</form>
</div>
