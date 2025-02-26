<div class="multi-sidebar-outer sidebar-panel-close multi-sidebar-outer-glo">
    <div class="multi-sidebar-tab" style="padding-top: 4px;">
        <div class="multi-siderbar-content">
            <div class="sidebar-tab-normal">
                <div class="sidebar-tab sidebar-tab-generate-titles"><i class="fas fa-pen"></i> <span><?php _e( 'Generate Titles', 'text-domain' ); ?></span></div>
               <!-- <div class="sidebar-tab sidebar-tab-quick-articles"><i class="fas fa-file-alt"></i> <span><?php _e( 'Quick Articles', 'text-domain' ); ?></span></div>
                <div class="sidebar-tab sidebar-tab-rewrite-article"><i class="fas fa-edit"></i> <span><?php _e( 'Rewrite Article', 'text-domain' ); ?></span></a></div>
                <div class="sidebar-tab sidebar-tab-rewrite-grammar-check"><i class="fas fa-check"></i> <span><?php _e( 'Grammar Check', 'text-domain' ); ?></span></a></div> -->
             </div>
        </div>
    </div>
    <div class="multi-sidebar-plugins">
        <div class="multi-sidebar-inner">
            <h4 class="multi-sidebar-title"><?php _e( 'Generate articles/ Rewrite article / Grammar check', 'text-domain' ); ?></h4>
            <div class="sidebar-coupon-content sidebar-plugin-content">
                <div class="multi-plugin-nodata">
                      <form id="gptForm">
  <?php wp_nonce_field( 'gpt_form_nonce', 'gpt_form_nonce_field' ); ?>
  <input type="hidden" name="action" value="quick_chat_gpt">
  <input type="hidden" name="type" value="title">
  <input id="gptinput" name="gptinput" />
  <input id="submt-btn" type="submit" value="Submit">
  <input type="button" id="gtp-close" value="close">
</form>

<script>
jQuery(document).ready(function($){
        tinymce.init({
            selector: '#gptinput',
				toolbar: false,
				menubar: false,
				autoresize_bottom_margin: 0,
				autoresize_overflow_padding: 0,
				autoresize_on_init: true,
				forced_root_block : false
        });
  $('#gptForm').submit(function(e){
    e.preventDefault();
	$('#submt-btn').val('Loading..');
    var formData = new FormData(this);
	 $('#gpt-response').append('<p class="user-inpt">'+ $('#gptinput').val()+"</p>");
	 $('#gptinput').val('');
    $.ajax({
      type: 'POST',
      url: '<?php echo admin_url('admin-ajax.php'); ?>',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response){
		   var newNode = document.createElement("span");
			newNode.style.backgroundColor = "green";
			newNode.style.color = "#fff";
			newNode.innerHTML = "<br>"+ response + "<br />";
			tinymce.activeEditor.insertContent(newNode.outerHTML);
			 var br = document.createElement("br");;
			tinymce.activeEditor.insertContent(br.outerHTML);
			tinymce.activeEditor.selection.setCursorLocation(tinymce.activeEditor.getBody(), tinymce.activeEditor.getBody().childNodes.length);
			$('#submt-btn').val('submit');

      }
    });
  });
});
</script>

                </div>
            </div>
        </div>
     <!--   <div class="multi-sidebar-inner">
            <h4 class="multi-sidebar-title"><?php _e( 'Quick Articles', 'text-domain' ); ?></h4>
            <div class="sidebar-wishlist-content sidebar-plugin-content"><div class="multi-plugin-nodata">
                      <p><?php _e( 'Collect coupons on item pages or during sales dfd', 'text-domain' ); ?></p>
                </div></div>
        </div>
        <div class="multi-sidebar-inner">
            <h4 class="multi-sidebar-title"><?php _e( 'Rewrite Article', 'text-domain' ); ?></h4>
            <div class="sidebar-footprint-content sidebar-plugin-content" >
                 <div class="multi-plugin-nodata">
                      <p><?php _e( 'Collect coupons on item pages or duridfdfng sales', 'text-domain' ); ?></p>
                </div>
            </div>
        </div>
        
                     <div class="multi-sidebar-inner">
                        <h4 class="multi-sidebar-title"><?php _e( 'Grammar Check', 'text-domain' ); ?></h4>
                    <div class="sidebar-footprint-content sidebar-plugin-content" > 
                      <div class="multi-plugin-nodata">
                              <p><?php _e( 'Collect coupons onddd item pages or duridfdfng sales', 'text-domain' ); ?></p>
                        </div>
                    </div>
                </div>
				-->
    </div>
</div>
