<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_action("pdf_builder_block","superaddons_pdf_builder_block_button",30);
function superaddons_pdf_builder_block_button(){
    ?>
    <li>
        <div class="momongaDraggable" data-type="button">
            <i class="pdf-creator-icon icon-doc-landscape"></i>
            <div class="pdfbuilder-tool-text"><?php esc_html_e("Button","pdf-for-wpforms") ?></div>
        </div>
    </li>
    <?php
}
add_filter( 'pdf_builder_block_html', "pdf_builder_block_button_load" );
function pdf_builder_block_button_load($type){
   $type["block"]["button"]["builder"] = '
   <div class="builder-elements">
        <div class="builder-elements-content" data-type="button" style="text-align: center;">
            <div class="pdfbuilder_button"><a class="pdfbuilder_button_a" href="#">Button</a></div>
        </div>
    </div>';
    //Show editor
    $type["block"]["button"]["editor"]["container"]["show"]= ["text-align","padding","border","button","background","color","condition"];
    //Style container
    $type["block"]["button"]["editor"]["container"]["style"]= Superaddons_Pdfbuilder_Global_Data::$text_align;
    //Style inner
    $padding = Superaddons_Pdfbuilder_Global_Data::$padding;
    $border = Superaddons_Pdfbuilder_Global_Data::$border;
    $a = array(
            ".builder__editor--item-background .builder__editor_color"=>"background-color",
            ".builder__editor--item-background .image_url"=>"background-image"
        );
    $type["block"]["button"]["editor"]["inner"]["style"]=[
                                                        ".pdfbuilder_button" => array_merge($padding,$border,$a),
                                                        ".pdfbuilder_button a" => array(".builder__editor--item-button .font_size"=>"font-size",".builder__editor--item-color .builder__editor_color"=>"color")
                                                        ];
    // Data Attr
    $type["block"]["button"]["editor"]["inner"]["attr"]=[".pdfbuilder_button a"=>  array(".builder__editor--item-button .button_text"=>"text",
        ".builder__editor--item-button .button_url"=>"href") ];
   return $type;
}
