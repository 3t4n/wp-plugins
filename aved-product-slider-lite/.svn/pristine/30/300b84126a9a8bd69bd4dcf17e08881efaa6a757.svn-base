<?php
// add admin menu
function AVED_slider_option(){add_menu_page('AVED Slider Option', 'AVED Slider Option', 8,__FILE__, 'Aved_slider_option_loader');}
// *********************************** //
// Option
function Aved_slider_option_loader()
{
    if(current_user_can('administrator') )
    {

        $action = $_POST['Save'];
        if($action == 'SAVE')
        {
            if (gettype( ($_POST['slider_product']) ) == 'array' )  
            {
                $array = $_POST['slider_product'];
                foreach ($array['slides_ids'] as $key => $value) 
                {
                    $array['slides_ids'][$key] = (int)$value;
                }
                
                update_option('AVED_slider_option',$array);
            }
        }
        if($_POST['Save'] == 'SAVE' )
        {
            echo '<script type="text/javascript">alert("Option saved!");</script>';
        }
        $params = get_option('AVED_slider_option');
        $_POST['AVED_slider_option'] = array();
        if(gettype($params)  != 'array'){   $params = '';   }
        $count_slides = count( $params['slides']);
        ?>
        <div id="aved_slider_lite">
        <div class="option_table">
            <form method="post">
                <div class="header">
                    <h3>AVEDsoft Product Slider Option</h3>
                    <hr>
                </div>
                <div class="Global_settings">
                    <h4>Global settings</h4>
                </div>
                <div class="tabs_list">
                    <div class="tabs">

                        <input type="button" data="add_slider" value="Add new Slider"/>
                        <ul class="list_tabs_button">
                            <?php
                                foreach($params['slides'] as $slide){
                                ?>
                                <li data-tab="tab" class="<?php echo $slide['id']?>"><?php echo $slide['title']?></li>
                                <?php
                                }
                            ?>
                        </ul>

                    </div>
                    <div class="main">
                        <input id="saved_slider" type="submit" name="Save" value="SAVE"/>
                        <input id="count" type="hidden" name="slider_product[count]" value="<?php echo $params['count']?>"/>
                    </div>
                    <div class="tabs_content">
                        <?php generate_slider($params,'slider_product[slides]');?>
                    </div>

                </div>

            </form>
          
        </div>
        <script type="text/javascript"> 
            var $j = jQuery.noConflict();
            // Add slide in slider function
            $j('[name = "AddSlide"]').on('click',function(){
                var count = $j('#count').val();
                count = Number(count);
                var way =   $j(this).parent().attr('par_id');
                $j(this).parent().append('<div id="slide_'+count+'">ID&nbsp<input type="text" name="'+way+'[slides_ids][slide_'+count+']" value=""/>             <input class="del" type="button" name="slide_'+count+'" value="Delete"><hr></div>');
                count++;
                $j('#count').val(String(count));
            });
          
            $j('.del').on('click',function(){
            	var paramDel =  $j(this).attr('name');
            	$j('div#'+paramDel).remove();
            });
            // Hidden sliders function
            function hidden_tabs(){
                var tabs = $j('[data-tab="tab"]');
                $j('[data-tab="tab"]').attr('data-active','');
                if(tabs[0]){
                    for(var i=0;i<tabs.length;i++){
                        var tmp = parseInt(tabs[i]['className']);
                        $j('#tab_slides_'+tmp).attr('class','hidden');
                    }
                }
            }
            // Tab clickers
            $j('.list_tabs_button li').on('click',function(){
                hidden_tabs();
                var tmp = $j(this).attr('class');
                $j(this).attr('data-active','active');
                $j('#tab_slides_'+tmp).attr('class','vis tab-active');
            });
            // add new slider
            $j('[data="add_slider"]').on('click',function(){
                var count = $j('#count').val();count = Number(count);
                hidden_tabs();
                var slide = 'slide_'+count;
                $j.ajax({
                    url: "/wp-admin/admin-ajax.php",
                    type: "POST",
                    data: "action=get_new_slide&id="+count,
                    success: function(data){
                        $j('div.tabs_content').append(data);
                 
                    }
                });
                $j('.list_tabs_button').append('<li data-tab="tab" class="'+count+'">Tab '+count+'</li>')
                count++;$j('#count').val(String(count));
            });

        </script>
        </div>
    <?php
    }
    else
        echo "Error accses !";
}
    // end option.
    // ***************************************************************** //
    // add admin menu
    add_action('admin_menu', 'AVED_slider_option'); ?>