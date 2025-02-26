
	<!-- The productmodal template -->

	<script type="text/template" id="productmodalTemplate">


   <div class="aromodal product-aromodal fdoe-aromodal fade-aro fdoe-nonfallback <%=fdoe.fdoe_product_quantity_buttons_class %>" style="display:none;" id="fdoe_productmodal_<%= id %>" data-id="<%= id %>"

 tabindex="-1" role="dialog" aria-labelledby="fdoe_productmodal_<%= id %>'"

 aria-hidden="true">
        <div class="aromodal-dialog" role="document">
            <div class="aromodal-content">
                <div class="aromodal-header">
                    <h5 class="aromodal-title"

></h5> <button type="button" class="close" data-dismiss="aromodal" aria-label="<%= fdoe.close_text %>">
          <span aria-hidden="true">&times;</span>
        </button> </div>
                <div class="aromodal-body">
					<div class="container-fluid">
						<div class="arorow">
								<div id="fdoe_insert_product_shortcode_<%= id %>" class="arocol-xs-12 fdoe_insert_product_shortcode">




</div>
								</div>
				</div>
						</div>
                <div class="aromodal-footer"> <button type="button" class="button" data-dismiss="aromodal">
           <%= fdoe.close_text %>
</button>
				</div>
            </div>
        </div>
    </div>






	</script>

	<!-- The productmodal Style 1 template -->

	<script type="text/template" id="productmodalTemplate2">

   <div class="aromodal product-aromodal product-modal-style-1 fdoe-aromodal fade-aro fdoe-nonfallback <%= fdoe.fdoe_product_quantity_buttons_class %>" style="display:none;" id="fdoe_productmodal_<%= id %>" data-id="<%= id %>"

 tabindex="-1" role="dialog" aria-labelledby="fdoe_productmodal_<%= id %>"

 aria-hidden="true">
        <div class="aromodal-dialog" role="document">
            <div class="aromodal-content">


                  <button type="button" class="modal-close" data-dismiss="aromodal" aria-label="<%= fdoe.close_text %>">
       <i class="far fa-times-circle fa-3x"></i>
        </button>
                <div class="aromodal-body">
                  <% if(fdoe.image_in_modal == 1){ %>
			 <span class="fdoe-modal-2-image"></span>
			<% } %>
			<span class="fdoe-modal-2-title"></span>
			<span class="fdoe-modal-2-price"></span>
			 <% if(fdoe.desc_in_modal == 1){ %>
			<span class="fdoe-modal-2-description"></span>
			<% } %>
                    <span class="fdoe-modal-2-add">  </span>
</div>
</div>
</div>
</div>
</script>
