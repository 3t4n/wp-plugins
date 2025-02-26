<style type="text/css">
    #wpbs_slider{
        -webkit-border-bottom-left-radius: 6px;
        -webkit-border-bottom-right-radius: 6px;
        -moz-border-radius-bottomleft: 6px;
        -moz-border-radius-bottomright: 6px;
        border-bottom-left-radius: 6px;
        border-bottom-right-radius: 6px;
        border-top-right-radius: 0px !important;  
        -webkit-border-top-right-radius: 0px !important;
        -moz-border-radius-topright: 0px !important;    
        position: <?php if ($sticky == "yes") echo "fixed"; else echo "absolute"; ?>;
        top:-<?php echo ($height); ?>px;
        left:<?php echo ($spos); ?>px;
        width:<?php echo ($icon_box_width); ?>px;;
        height:<?php echo ($height + $icon_box_height); ?>px;
        background: <?php echo $bg; ?> url('<?php echo $icon_url; ?>') center no-repeat;
        background-size: <?php echo ($icon_box_height-10);?>px <?php echo ($icon_box_height-10);?>px;
        background-position: 5px <?php echo ($height + 5); ?>px  ;
        cursor: pointer;
        z-index:999999;
    }
    .icon_label{
        color: <?php echo $label_color; ?>;
        float: right;
        font-size: 12pt; 
        font-weight: bold;
        position:relative;
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
        color:<?php echo $text_color; ?>;
        -webkit-border-bottom-left-radius: 0px;
        -webkit-border-bottom-right-radius: 6px;
        -moz-border-radius-bottomleft: 0px;
        -moz-border-radius-bottomright: 6px;
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 6px;
        border-top-right-radius: 0px !important;  
        -webkit-border-top-right-radius: 0px !important;
        -moz-border-radius-topright: 0px !important;        
    }
    .widgetcont{
        padding: 10px;
        font-size:9pt;
    }
</style>