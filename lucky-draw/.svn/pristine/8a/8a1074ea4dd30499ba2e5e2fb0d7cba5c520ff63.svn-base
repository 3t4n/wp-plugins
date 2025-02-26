<?php 
if ( !defined('ABSPATH') ){
        die();
      }
    
function lucky_draw_function(){
  
    //Add Menu
            add_menu_page('Lucky Draw Menu Page','Lucky Draw','manage_options','lucky-draw','lucky_draw_adminpage','dashicons-tickets-alt',45);
   
   
    //Add Submenus 
    add_submenu_page('lucky-draw','Add Draw','Add Draw','manage_options','adddraw','lucky_draw_add_new_draw');
    
    add_submenu_page('lucky-draw','Draw Prize ',' Draw Prize ','manage_options','drawprize','lucky_draw_the_prize');
    
    
    add_submenu_page('lucky-draw','Help','Help ','manage_options','help','lucky_draw_help');
    
    
    
       
}



function lucky_draw_adminpage(){
        include (Lucky_Draw_Plugin_Path.'admin/dashboard.php');


}

function lucky_draw_demo_table(){
        include (Lucky_Draw_Plugin_Path.'admin/demotable.php');


}



function lucky_draw_add_new_draw(){

        include (Lucky_Draw_Plugin_Path.'admin/add-draw.php');

}
function lucky_draw_the_prize(){

      include (Lucky_Draw_Plugin_Path.'admin/draw-prize.php');

}

function lucky_draw_email(){

     include (Lucky_Draw_Plugin_Path.'admin/email.php');

}


function lucky_draw_help(){

    include (Lucky_Draw_Plugin_Path.'admin/lucky-draw-help.php');

}




add_action( 'admin_menu','lucky_draw_function');