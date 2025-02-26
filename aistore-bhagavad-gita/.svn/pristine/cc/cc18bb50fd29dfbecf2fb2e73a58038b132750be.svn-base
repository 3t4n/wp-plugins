<?php

class AistoreChapters{
     
     private static function getChapter()
     {
          ob_start();
             
          include_once dirname(__FILE__) . "/data/chapters.json";
             
             
          return ob_get_clean();
         
     }
     
     
     
     
      private static function getVerse()
     {
             ob_start();
             
             include_once dirname(__FILE__) . "/data/verse.json";
             
             
          return ob_get_clean();
     }
     
      private static function getCommentry()
     {
             ob_start();
             
             include_once dirname(__FILE__) . "/data/commentary.json";
             
             
          return ob_get_clean();
     }
     
     
     
     public static function aistore_getVerse($chapter_id, $verse_number )
     {
         
        $Verse_data =  json_decode ( AistoreChapters::getVerse());
        
        
        

foreach ($Verse_data as $verse) {
    
  if( ( $verse->chapter_id ==$chapter_id)   &&  ($verse->verse_number ==$verse_number) ) { 
      
      return    $verse  ;
      
      
         
    
    
}


}
         
         
     }  
     
     
           
              
          
          
          
     public static function aistore_getCommentry($verseNumber )
     {
         
        $Commentry_data =  json_decode ( AistoreChapters::getCommentry());
        
    
         
       

foreach ($Commentry_data as $Commentry) {
    
  if( ($Commentry->verseNumber ==$verseNumber)   ) { 
      
      return    $Commentry;
      
      
         
    
  }
}

 
         
         
     }
     
    public static function aistore_chapters(){
        
      
    
    
     ob_start();
 
    
    
    
      if (isset($_GET['sid']) and $_GET['sid'] >0 )
                {



       $chapter_id= sanitize_text_field($_GET['sid']);
       
  
        
        $section_data =   AistoreChapters::getVerse();
        
        
              $section=json_decode( $section_data);
              
        
   $a=array();
   



foreach ($section as $value) {
if($value->chapter_id ==$chapter_id){
 ?>
<div>
    
             <?php 
             
       
      
            echo esc_attr($value->verse_number);
            ?>
        	<a href="?chapter_id=<?php echo esc_attr($value->chapter_id);?>&verse_number=<?php echo  esc_attr($value->verse_number);?>" >

		   <?php echo esc_attr($value->text) ; ?> </a>
            <hr>
</div>

 <?php
}
}
 
    }
    
   else if( (isset($_GET['chapter_id']) and $_GET['chapter_id'] >0) && (isset($_GET['verse_number']) and $_GET['verse_number'] >0 )){
       
       
        
         $chapter_id= sanitize_text_field($_GET['chapter_id']);
          $verse_number= sanitize_text_field($_GET['verse_number']);
          
          
          
          $verse=   AistoreChapters::aistore_getVerse($chapter_id, $verse_number );
          
         
              
              
              echo esc_attr ($verse->text);
           
           echo "<hr />";
           
           
          $mp3_url = esc_url( plugins_url("/data/verse_recitation/".$chapter_id."/".$verse_number.".mp3" ,   __FILE__));
       
     if(file_exists($mp3_url))
     {
           
           echo "<hr />";
           
 echo '<audio src="'.$mp3_url.'"  autoplay="autoplay" controls ></audio>';
 
 
          
           echo "<hr />";
           
     }     
          
           echo "<hr />";
           
         
       
    $verseNumber=$verse->id;
    
        
 
    $Commentry=     AistoreChapters::aistore_getCommentry($verseNumber );
    
 
    
  echo esc_attr($Commentry->description);
  
  echo  "----<strong>".esc_attr($Commentry->authorName)."</strong>";
  
  
    
    
      
      
    }
    
    else
    {
        
 
        
 
        $chapter_data =   AistoreChapters::getChapter()  ;
 
        
        $chapter=json_decode($chapter_data);
        
      
      
        
        
   $a=array();
   
   ?>
    <table>
        <tr>
      <th><?php   _e( 'Chapter Number', 'aistore' ); ?></th>
          <th><?php   _e( 'Name', 'aistore' ); ?></th>
            <th><?php   _e( 'Meaning', 'aistore' ); ?></th></tr>
   <?php

foreach ($chapter as $value) {


 ?>

     <tr>
          <td> 	<a href="?sid=<?php echo  esc_attr($value->id);?>" >

		   <?php echo esc_attr($value->chapter_number) ; ?> </a> </td>
        
             <td><?php echo esc_attr($value->name); ?></td>
               <td><?php echo esc_attr($value->name_meaning); ?></td>
 </tr>

 <?php
}
?>
 </table>
<?php
    }
       return ob_get_clean();
    
    }
     
}
