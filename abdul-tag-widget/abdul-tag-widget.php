<?php
/*
Plugin Name: ABDUL TAG Widget
Plugin URI: http://wordpress.org/extend/plugins/abdul-tag-widget
Description: search for ABDUL social tagging system
Version: 0.3.1
Author: DreamBuilder Inc.
Author URI: http://conan.in.th/
*/


global $wp_version;

if ( version_compare( $wp_version, '2.9', '<' ) ) {

}

class ABDUL_TAG_Widget extends WP_Widget {

	function ABDUL_TAG_Widget() {
		$widget_ops = array('classname' => 'widget_abdul_tag', 'description' => __( " search for  Tagging system") );
		$this->WP_Widget('abdul_tag', __('ABDUL_TAG'), $widget_ops);
	}

	function widget( $args, $instance ) {
		
        extract( $args );
        echo $before_widget;
        $title = apply_filters('widget_title', $instance['title']);
        if( $title ) echo $before_title . $title . $after_title;


?>
<script type="text/javascript" src="http://library.conan.in.th/js/yui/yahoo/yahoo-min.js"></script> 
<script type="text/javascript" src="http://library.conan.in.th/js/yui/event/event-min.js"></script> 
<script type="text/javascript" src="http://library.conan.in.th/js/yui/connection/connection-min.js"></script> 

<script type="text/javascript">
var handleEvent = {
		start:function(eventType, args){
		document.getElementById('tagresult').innerHTML = "<center><img src=<?php echo WP_PLUGIN_URL;?>/abdul-tag-widget/images/wait.gif></center>";
		},

		complete:function(eventType, args){
			document.mytag.qsearch.select();
		},

		success:function(eventType, args){
			if(args[0].responseText !== undefined){
				document.getElementById('tagresult').innerHTML = args[0].responseText;
				document.mytag.qsearch.select();
			}
		},

		failure:function(eventType, args){

			alert('answering system error');
		},

		abort:function(eventType, args){

		}
	};

	var tagcallback = {
		customevents:{
			onStart:handleEvent.start,
			onComplete:handleEvent.complete,
			onSuccess:handleEvent.success,
			onFailure:handleEvent.failure,
			onAbort:handleEvent.abort
		},
		scope:handleEvent,
	 	argument:["foo","bar","baz"]
	};


	function dosearch(){
		var q = encodeURIComponent(document.getElementById("qsearch").value);
		if(q!=""){
			var sUrl = "<?php echo WP_PLUGIN_URL;?>/abdul-tag-widget/search.php";
			var data = "q="+q;
			var request = YAHOO.util.Connect.asyncRequest('POST', sUrl, tagcallback,data);
		}
	}

	function dosearchevent(e){
		var n = e.keyCode;
		if(n==13){//key of Enter Key
			dosearch();
			document.mytag.qsearch.select();
		}
		
	}

	function tdosearch(t){
		document.getElementById("qsearch").value=t;
		dosearch();
}

</script>
<center>
<form id="mytag" name="mytag" onSubmit="return false;">
<input type="text" name="qsearch" id="qsearch" onkeypress="dosearchevent(event)" size="20">
<input type="button" name="btsearch" id="btsearch" value="search" onclick="dosearch()"/>
</form> 
</center>
<br /><br/>
<div id="tagresult" style="border:0px"></div>





	<?php
			
	}

    //////////////////////////////////////////////////////
    //Update the widget settings
    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        return $instance;
    }

    ////////////////////////////////////////////////////
    //Display the widget settings on the widgets admin panel
    function form( $instance )
    {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
        </p>

<?php
    }

}

add_action( 'widgets_init', 'abdul_tag_widget_init' );

function abdul_tag_widget_init() {
	register_widget('ABDUL_TAG_Widget');
}

?>