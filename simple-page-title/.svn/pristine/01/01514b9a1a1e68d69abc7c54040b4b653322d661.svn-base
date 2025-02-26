<?php
// Custom Default Setting for function and short codes.
  function simple_page_title(){
  	  global $post;
      include('name-titles.php');
      $class = $spt_ele_class;
      if($class== '%postclass%')
      {
        $class = 'spt-id-'.$post->post_name;
      }
      $class_ID = $spt_ele_ID;
      if($class_ID == '%postID%')
      {
        $class_ID = 'spt-page-id-'.$post->ID;
      }  
      echo '<'.$spt_ele_name.' class="'.$class.'" id="'.$class_ID.'">';
      if(is_front_page()){
      	echo $spt_home;
      }
      else if(is_page()){
          echo  single_post_title();
      }
      if(is_404()){
      	echo $spt_404;
      }
      if(is_home()){
      	echo $spt_blog;
      }
      if(is_search()){
      	echo $spt_search;
      }
      if(is_category()){
      	echo $spt_category;
      }
      if(is_tag()){
      	echo $spt_tag;
      }
      if(is_singular('post')){
        $single_name = $spt_blog_single;
        if ( $single_name == '%postname%' || $single_name == '')
        {
           $single_name = $post->post_title;    
        } 
        echo $single_name;
      }
      $args = array('public'=> true,'_builtin'=>false); 
      $output = 'names'; 
      $operator = 'and'; 
      $post_types = get_post_types( $args, $output, $operator ); 
      foreach ($post_types as $post_type) {
          if(is_post_type_archive(''.$post_type.''))
           {  
              $post_arc = get_option('spta_'.$post_type.'');
              echo $post_arc;
           }
           if(is_singular(''.$post_type.''))
           {  
              $post_single = get_option('spts_'.$post_type.'');
              if($post_single == '%postname%' || $post_single == '')
              {
                $post_single = $post->post_title;
              }
              echo $post_single;
           }  
      }
      echo '</'.$spt_ele_name.'>';
  }
  add_shortcode('simple_page_title','simple_page_title');
?>