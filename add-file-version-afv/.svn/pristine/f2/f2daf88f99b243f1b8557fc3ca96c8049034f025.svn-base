<?php
function afv_admin_page()
{
    global $afv_inner_ver;

    ?>
		<script type="text/javascript">
			var wpHomeUrl = '<?php echo get_home_url(); ?>';
		</script>
	<?php
    wp_enqueue_script('afv_script', plugin_dir_url(__FILE__) . 'js/script-afv.js?' . $afv_inner_ver);
    wp_enqueue_script('afv_script');

    $plugData = get_plugin_data(__DIR__ . '/index.php', false, false);

    ?>

<div class="wrap" id="afv" v-cloak>
    <h1><strong><?php echo esc_html($plugData['Name']) . " <small>v-" . esc_html($plugData['Version']) . '</small>'; ?></strong></h1>

    <form method="POST">
        <div v-show='form.isInitDataLoaded'>
            <div class="crow" :class='form.autoVerVal == "enabled" ? "active" : ""'>
                <div class="coverAjax" v-show='form.isDoingAjax'></div>
                <label for="auto_ver_afv_cbox">
                    <input id="auto_ver_afv_cbox" type="checkbox" :checked='afvIsInArray("afv_auto_ver_enabled", form.autoVerArr)' @click='afvToggleAutoVer'>
                    <strong>AUTO file version</strong>
                </label>
                <p class="description">Note: AUTO add file version based on PHP file modification time to CSS/JS files that were enqueued using wp_enqueue_style and wp_enqueue_script, admin_enqueue_style and admin_enqueue_script.</p>
                <div v-show='form.autoVerVal == "enabled"'>
                    <label>Files to add version: </label>
                    <select v-model="form.verTargetFile">
                        <option v-for="item, key in form.verTargetFileArr" :value="item.value">
                            {{item.name}}
                        </option>
                    </select>
                </div>
            </div>

            <div class="crow" :class='form.manualVerVal == "enabled" ?"active" : ""'>
                <div class="coverAjax" v-show='form.isDoingAjax'></div>
                <label for="manual_ver_afv_cbox">
                    <input id="manual_ver_afv_cbox" type="checkbox" :checked='afvIsInArray("afv_manual_ver_enabled", form.manualVerArr)' @click='afvToggleManualVer'>
                    <strong>MANUAL file version</strong>
                </label>
                <p class="description">Note: MANUALLY add file version to CSS/JS files that were enqueued using wp_enqueue_style and wp_enqueue_script, admin_enqueue_style and admin_enqueue_script.</p>
                <div v-show='form.manualVerVal == "enabled"'>
                    <span>Files to add version: </span>
                    <select v-model="form.verTargetFile">
                        <option v-for="item, key in form.verTargetFileArr" :value="item.value">
                            {{item.name}}
                        </option>
                    </select>
                    <div class="manualFileVerInputBox">
                        <span>Manual file version: </span>
                        <input type="text" v-model='form.manualVerInput'>
                        <p class="description">Note: You can put something like 0.0.1 and increment it to become different from the previous input.</p>
                    </div>
                </div>
            </div>


        </div>
    </form>

    <div class="submit" v-show='this.form.isInitDataLoaded'>
        <button class="button button-primary" @click="afvSaveChanges" v-show='!this.form.isDoingAjax'>Save Changes</button>
        <span class="pleaseWait" v-show='this.form.isDoingAjax'>Please wait..</span>
    </div>

    <div><a href="http://www.theydreamer.com/" target="_blank">Theydreamer Apps</a> &amp; Joemakev &copy; <?php echo date("Y"); ?></div>
    
</div>

<?php

} //end of afv_admin_page()




