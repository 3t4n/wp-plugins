<style type="text/css">
    #wpbs_slider{
        -webkit-border-top-left-radius: 0px;
        -webkit-border-bottom-left-radius: 6px;
        -moz-border-radius-topleft: 6px;
        -moz-border-radius-bottomleft: 6px;
        border-top-left-radius: 6px;
        border-bottom-left-radius: 6px;
        position: <?php if ($sticky == "yes") echo "fixed"; else echo "absolute"; ?>;
        top:<?php echo ($spos); ?>px;
        right:-<?php echo $width; ?>px;
        width:<?php echo ($width + $icon_box_width); ?>px;;
        height:<?php echo ($icon_box_height); ?>px;       
        background: <?php echo $bg; ?> url('<?php echo $icon_url; ?>') center no-repeat;
        background-size: <?php echo ($icon_box_height-10);?>px <?php echo ($icon_box_height-10);?>px;
        background-position: 5px 5px;
        cursor: pointer;
        z-index:999999;
    }
    .icon_label{
        color: <?php echo $label_color; ?>;
        float: left;
        position:relative;
        font-size: 12pt; 
        font-weight: bold;
        width: <?php echo $icon_box_width; ?>px;       
        height: <?php echo $icon_box_height; ?>px;
    }
    .wpbs_handle{
       padding: 5px;
       line-height: <?php echo $icon_box_height-10;?>px;
       text-align: right;
       color: <?php echo $text_color;?>;
    }
    #wpbs__cont .widgettitle{
        font-size:10pt;
        font-weight: bold;
    }
    #wpbs__cont{
        margin-left:<?php echo $icon_box_width; ?>px;
        color:<?php echo $text_color; ?>;
        -webkit-border-radius: 0px;
        -webkit-border-bottom-left-radius: 5px;
        -moz-border-radius: 0px;
        -moz-border-radius-bottomleft: 5px;
        border-radius: 0px;
        border-bottom-left-radius: 5px;
    }
    #wpbs__cont .widget{
        padding-left: 10px;
        padding-right: 0px;
        font-size:9pt;
    }
    .widgetcont{
        padding: 10px;
        font-size:9pt;
    }
</style>