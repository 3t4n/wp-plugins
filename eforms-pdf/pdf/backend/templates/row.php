<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_action("pdf_builder_block_row","superaddons_pdf_builder_block_row");
function superaddons_pdf_builder_block_row(){
    $pro = Superaddons_Settings_Builder_PDF_Backend::check_pro();
    $class ="";
    $title ="";
    if( !$pro){
        $class ="pro_disable";
        $title =" Pro Version";
    }
    ?>
    <li class="builder-row-inner"  data-type="row1" >
        <span></span>
    </li>
    <li class="builder-row-inner" data-type="row2">
        <span></span>
        <span></span>
    </li>
    <li class="builder-row-inner" data-type="row3">
        <span class="bd-row-2"></span>
        <span></span>
    </li>
    <li class="builder-row-inner" data-type="row4">
        <span></span>
        <span class="bd-row-2"></span>
    </li>
    <li class="builder-row-inner <?php echo esc_attr($class) ?>" data-type="row5" title="<?php echo esc_html($title) ?>">
        <span></span>
        <span></span>
        <span></span>
    </li>
    <li class="builder-row-inner <?php echo esc_attr($class) ?>" data-type="row6" title="<?php echo esc_html($title) ?>">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </li>
    <li class="builder-row-inner <?php echo esc_attr($class) ?>" data-type="row7" title="<?php echo esc_html($title) ?>">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </li>
    <li class="builder-row-inner <?php echo esc_attr($class) ?>" data-type="row8" title="<?php echo esc_html($title) ?>">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </li>
    <li class="builder-row-inner <?php echo esc_attr($class) ?>" data-type="row9" title="<?php echo esc_html($title) ?>">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </li>
    <?php
}
add_filter( 'pdf_builder_block_html', "superaddons_pdf_builder_block_row_load" );
function superaddons_pdf_builder_block_row_load($type){
    $col = array("row1","row2","row3","row4","row5","row6","row7","row8");
    $padding = Superaddons_Pdfbuilder_Global_Data::$padding;
    foreach( $col as $value ){
        $type["block"][$value]["editor"]["container"]["show"]= ["text-align","padding","background","condition"];
        $a = array(
                ".builder__editor--item-background .builder__editor_color"=>"background-color",".builder__editor--item-background .image_url"=>"background-image",
            );
        $type["block"][$value]["editor"]["container"]["style"]= array_merge($padding,$a);
        $type["block"][$value]["editor"]["container"]["attr"]= array(".builder__editor--item-background_full .background_full_width"=>"background_full");
    }
    $type["block"]["row1"]["builder"] = '
    <div class="builder-row-container builder__item">
        <div style="background-color: transparent" background_full="not" data-type="row1" class="builder-row-container-row builder-row-container-row1">
            <div class="builder-row">
            </div>
        </div>
    </div>';
    $type["block"]["row2"]["builder"]  = '
    <div class="builder-row-container builder__item">
        <div style="background-color: transparent" background_full="not" data-type="row2" class="builder-row-container-row builder-row-container-row2">
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
        </div>
    </div>';
    $type["block"]["row3"]["builder"]  = '
    <div class="builder-row-container builder__item">
        <div style="background-color: transparent" background_full="not" data-type="row3" class="builder-row-container-row builder-row-container-row3">
            <div class="builder-row bd-row-2">
            </div>
            <div class="builder-row">
            </div>
        </div>
    </div>';
    $type["block"]["row4"]["builder"]  = '
    <div class="builder-row-container builder__item">
        <div style="background-color: transparent" background_full="not" data-type="row4" class="builder-row-container-row builder-row-container-row4">
            <div class="builder-row">
            </div>
            <div class="builder-row bd-row-2">
            </div>
        </div>
    </div>';
    $type["block"]["row5"]["builder"]  = '
    <div class="builder-row-container builder__item">
        <div style="background-color: transparent" background_full="not" data-type="row5" class="builder-row-container-row builder-row-container-row5">
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
        </div>
    </div>';
    $type["block"]["row6"]["builder"]  = '
    <div style="background-color: transparent" background_full="not" class="builder-row-container builder__item">
        <div data-type="row6" class="builder-row-container-row builder-row-container-row6">
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
        </div>
    </div>';
    $type["block"]["row7"]["builder"]  = '
    <div style="background-color: transparent" background_full="not" class="builder-row-container builder__item">
        <div data-type="row7" class="builder-row-container-row builder-row-container-row7">
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
        </div>
    </div>';
    $type["block"]["row8"]["builder"]  = '
    <div style="background-color: transparent" background_full="not" class="builder-row-container builder__item">
        <div data-type="row8" class="builder-row-container-row builder-row-container-row8">
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
        </div>
    </div>';
    $type["block"]["row9"]["builder"]  = '
    <div style="background-color: transparent" background_full="not" class="builder-row-container builder__item">
        <div data-type="row9" class="builder-row-container-row builder-row-container-row9">
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
            <div class="builder-row">
            </div>
        </div>
    </div>';
    return $type;
}
