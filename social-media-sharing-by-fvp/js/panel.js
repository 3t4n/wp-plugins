jQuery(document).ready(function(){
  jQuery("#fvp-sm-sortable1, #fvp-sm-sortable2").sortable({
    connectWith: ".fvpsmConnected",
    cursor: "move",
    stop: function( event, ui ) {
      var sortedIDs = jQuery( "#fvp-sm-sortable1" ).sortable( "toArray" );
      jQuery("#fvp_sm_sharing_items_order").val( sortedIDs );
    }
  }).disableSelection();

});
