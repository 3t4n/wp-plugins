
jQuery(document).ready(function(){

	setTimeout(function(){
		apspider_wordpresspagesgutenberg_js();
	},2000);


	function apspider_wordpresspagesgutenberg_js() {


		var listofitems = `
    <div>
			<style> .is-fullscreen-mode #apspp-wordpresspagesgutenberg-editor-adminbar{display:inline-block !important;}</style>
        <div id="apspp-wordpresspagesgutenberg-editor-adminbar" style="display: none;" title="Admin Page Spider">
            <span>
                <input id="inspector-checkbox-control-0" class="components-checkbox-control__input" type="checkbox" style="height:20px;width:20px;" value="1" onclick="var wpadminbar = document.getElementById('wpadminbar'); var interfaceSkeleton = document.querySelector('.interface-interface-skeleton'); if (this.checked) { wpadminbar.style.display = 'block';     interfaceSkeleton.style.top = wpadminbar.offsetHeight + 'px'; } else { wpadminbar.removeAttribute('style'); interfaceSkeleton.removeAttribute('style'); }">
            </span>
            <label for="inspector-checkbox-control-0"><?php echo esc_attr(get_option('apspider_gutenberg_editmenu_name'))?></label>
        </div></div>`

        jQuery('.edit-post-header .edit-post-header__settings, .edit-post-header .editor-header__settings').prepend(listofitems);

}
});
