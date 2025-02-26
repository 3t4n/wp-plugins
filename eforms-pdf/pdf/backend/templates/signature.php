<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_action("pdf_builder_block","superaddons_pdf_builder_block_signature",199);
function superaddons_pdf_builder_block_signature(){
    $pro = Superaddons_Settings_Builder_PDF_Backend::check_pro();
    $class ="";
    $title ="";
    if( !$pro){
        $class ="pro_disable";
        $title =" Pro Version";
    }
    ?>
    <li>
        <div class="momongaDraggable <?php echo esc_attr($class) ?>" title="<?php echo esc_html($title) ?>" data-type="signature">
            <i class="dashicons dashicons-admin-customizer"></i>
            <div class="pdfbuilder-tool-text"><?php esc_html_e("Signature","pdf-for-wpforms") ?></div>
        </div>
    </li>
    <?php
}
add_action( 'pdf_builder_block_html', "superaddons_pdf_builder_block_signature_load" );
function superaddons_pdf_builder_block_signature_load($type){
    $type["block"]["signature"]["builder"] = '
<div class="builder-elements" >
    <div class="builder-elements-content" data-type="signature">
        <img data-type="0" data-field="0" style="width:150px;height:39px;" src="'.SUPERADDONS_PDF_CREATOR_BUILDER_URL.'images/your-image.png" alt="">
    </div>
</div>';
    //Show editor
    $type["block"]["signature"]["editor"]["container"]["show"]= ["padding","field","text-align","width","height","condition"];
    //Style container
    $container_style = array(
            ".builder__editor--item-background .builder__editor_color"=>"background-color",
            ".builder__editor--item-background .image_url"=>"background-image",
        );
    $text_align = Superaddons_Pdfbuilder_Global_Data::$text_align;
    $padding = Superaddons_Pdfbuilder_Global_Data::$padding;
    $border = Superaddons_Pdfbuilder_Global_Data::$border;
    $inner_style = array(
            ".builder__editor--item-width .text_width"=>"width",
            ".builder__editor--item-height .text_height"=>"height",
        );
    $type["block"]["signature"]["editor"]["container"]["style"]= array_merge($padding,$text_align);
    $type["block"]["signature"]["editor"]["inner"]["style"]=["img" => array_merge($border,$inner_style)];
    $type["block"]["signature"]["editor"]["inner"]["attr"]= ["img"=>[
        ".builder__editor--item-field .pdfcreator-filed-type-editor-field"=>"data-field"]];
    return $type;
}