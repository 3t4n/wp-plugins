<?php
function archive_widget_collapsed_with_css_style( $style ){

	$p1 = __( 'pattern 1', 'archive-widget-collapsed-with-css' );
	$p2 = __( 'pattern 2', 'archive-widget-collapsed-with-css' );
	$p3 = __( 'pattern 3', 'archive-widget-collapsed-with-css' );
	$p4 = __( 'pattern 4', 'archive-widget-collapsed-with-css' );
	$css = '';

	if( $style == $p1 ) $css .= '.awcwc_1 .awcwc_year{display:block;position:relative;padding:.3em 1em .3em 1.3em;margin:3px 0 0;font-size:1.05em}.awcwc_1 .awcwc_year:before{display:block;content:"";position:absolute;top:50%;left:.5em;width:0;height:0;border:.3em solid transparent;border-left:.3em solid #999;transform:translateY(-50%) rotate(0);transition:.3s}.awcwc_1 input:checked:checked+.awcwc_year:before{transform:translateY(-30%) rotate(90deg);left:.4em}.awcwc_1 ul li a{cursor:pointer;margin:0 0 0 2em;display:block;padding:.3em}.awcwc_1 .awcwc_num:before{content:" ("}.awcwc_1 .awcwc_num:after{content:")"}';

	if( $style == $p2 ) $css .= '.awcwc_2 .awcwc_year{display:block;position:relative;padding:.5em 1em;margin:10px 0 0;font-size:1.05em;background:rgba(0,0,0,.04)}.awcwc_2 .awcwc_year:before{content:"+";font-weight:700;display:block;position:absolute;right:.8em;transform:rotate(0);transition:.5s;opacity:.5}.awcwc_2 input:checked+.awcwc_year:before{transform:rotate(315deg)}.awcwc_2 ul li a{cursor:pointer;display:block;margin:0 0 0 2em;position:relative;padding:5px}.awcwc_2 .awcwc_list_icon:before{display:block;content:"";position:absolute;top:50%;left:-.6em;width:0;height:0;border:.3em solid transparent;border-left:.3em solid #bbb;transform:translateY(-50%) rotate(0)}.awcwc_2 .awcwc_num{line-height:1em;font-size:.8em;background:rgba(0,0,0,.04);padding:0 .5em;margin:0 0 0 .5em}';

	if( $style == $p3 ) $css .= '.awcwc_3 .awcwc_year{cursor:pointer;display:block;position:relative;padding:.5em 1em .5em 2.5em;margin:10px 0 0;font-size:1.05em;background:rgba(0,0,0,.04)}.awcwc_3 .awcwc_year:before{content:"+";font-size:1.3em;display:block;position:absolute;top:50%;left:.8em;transform:translateY(-50%) rotate(0);transition:.5s;opacity:.5}.awcwc_3 input:checked+.awcwc_year:before{transform:translateY(-50%) rotate(315deg)}.awcwc_3 ul li a{cursor:pointer;display:block;margin:0 0 5px;position:relative;padding:.5em 1em .5em 2em;border-bottom:1px dashed rgba(0,0,0,.2)}.awcwc_3 .awcwc_list_icon:before{content:"";display:block;position:absolute;top:50%;left:1em;width:.3em;height:.3em;background:#aaa;border-radius:50px;transform:translateY(-50%)}.awcwc_3 .awcwc_num{line-height:1em;font-size:.9em;background:rgba(0,0,0,.04);padding:0 .5em;margin:0 0 0 .5em}';

	if( $style == $p4 ) $css .= '.awcwc_4 .awcwc_year{cursor:pointer;display:block;position:relative;padding-left:1.8em;margin:10px 0 0;font-size:1.05em;line-height:30px;height:30px}.awcwc_4 .awcwc_list_icon:before,.awcwc_4 .awcwc_year:after,.awcwc_4 .awcwc_year:before{content:"+";font-family:serif;font-size:15px;display:block;position:absolute;top:50%;left:6px;transform:translateY(-50%) rotate(0);transition:.5s;color:#fff;z-index:2;border-radius:50px;line-height:30px;height:30px}.awcwc_4 .awcwc_year:after{content:"";width:13px;height:13px;background:#aaa;left:4.5px;z-index:1}.awcwc_4 input:checked+.awcwc_year:before{transform:translateY(-50%) rotate(315deg)}.awcwc_4 ul li a{cursor:pointer;display:block;margin:0 0 5px;position:relative;padding:.5em 1em .5em 2em;border-bottom:1px dashed rgba(0,0,0,.2)}.awcwc_4 .awcwc_list_icon:before{left:1em;width:.3em;height:.3em;background:#aaa}.awcwc_4 .awcwc_num{line-height:1em;font-size:.9em;background:rgba(0,0,0,.04);border-radius:50px;padding:0 .5em;margin:0 0 0 .5em}';

	update_option( 'archive_widget_collapsed_with_css_style', get_option( 'archive_widget_collapsed_with_css_style' ) . $css );

}
