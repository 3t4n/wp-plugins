<?php 




class WS_AliDo_Widget extends WP_Widget {
    //构造函数
    function WS_AliDo_Widget() {
		//self::__construct();
		parent::WP_Widget( 'ws_alido', $name = '支付宝捐赠栏',array('description'=>'使用该小工具可以添加一个捐赠工具'));
    }
	
	function __construct(){
		$this->WS_AliDo_Widget();
	}

	//前台HTML
    function widget( $args, $ins ) {	
	    if( $ins['show'] =='close' )
			return;
		require_once( 'cls.option.php' );
		$options = new WS_AliDo_Option( WS_ALIDO_ID );
		$gateway = $options->get('gateway');
		$donateurl = $options->get('donateurl');
		$email = $options->get('email');
	
		if( $gateway == 'alipay' && !empty($donateurl) )
			$donateLink = $donateurl;
		elseif( $gateway == 'api' && !empty($email) )
			$donateLink = WS_ALIDO_URL . '/redirect.php?bill';
		else
			$donateLink = "javascript:alert('还没设置收款账号呢');";
				
		$imgButton = WS_ALIDO_IMG_URL . '/' . $options->get('button');
		
		extract( $args );
	
$html = <<<HTML
<style>
.ws_alido_widget_wrap{margin:0;padding:0;border:none;}
.ws_alido_widget_wrap a{display:block;margin:10px auto;text-align:center}
</style>
$before_widget 
$before_title {$ins['title']} $after_title
<div class="ws_alido_widget_wrap">
<a href="$donateLink " target="_blank"><img src="$imgButton"></a>
</div>
$after_widget
HTML;

	echo $html;

    }

	//更新事件数据过滤器
    function update( $new_instance, $old_instance ) {
	
		return array_merge($old_instance,$new_instance);
    }
	
	//后台HTML
    function form($ins) {
		
		isset($ins['show']) || $ins['show'] = 'show';
		isset($ins['title']) || $ins['title'] = '期待你的捐赠'
		?>
 		<p><label>标题</label>
		<input type="text" value="<?php echo $ins['title'];?>" name="<?php echo $this->get_field_name('title');?>" />
        </p>
        <p>
        <label>显示开关</label>
        <select name="<?php echo $this->get_field_name('show');?>" id="<?php echo $this->get_field_id('show');?>">
        	<option value="show"<?php if($ins['show'] == 'show') echo ' selected="selected" ';?>>显示</option>
            <option value="close"<?php if($ins['show'] == 'close') echo ' selected="selected" ';?>>关闭</option>
        </select>
        </p>
        <?php


    }

} // class FooWidget

// 注册 FooWidget 挂件


?>