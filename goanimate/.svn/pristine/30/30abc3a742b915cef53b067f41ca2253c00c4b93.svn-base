
<!-- Pjesa e headerit -->
<div class="wrap">
    <?php    echo "<h2>" . __( 'Go Animate - CSS Elements Animator', 'oscimp_trdom' ) . "</h2>"; ?>
     <br>
    
     <div id="animateForm">
		<div id="head">
			<div class="rows">
                            <p><a href="#" 
                                  data-tooltip="Element id or class (e.g: '#example' or '.example').">
                                    Element
                                </a>
                            </p>
                        </div>
			<div class="rows">
                        <p><a href="#" data-tooltip="Choose from list of effects :)">Effect</a></p>
                        </div>
			<div class="rows">
                            <p><a href="#" data-tooltip="Duration of the animation in seconds.">Duration</a></p>
                        </div>
                    <div class="rows">
                            <p><a href="#" data-tooltip="Delay of animation at start in seconds.">Delay</a></p>
                        </div>
			<div class="rows">
                           <p><a href="#" 
                            data-tooltip="Repetition of the animation(e.g: 1-999,infinite,initial,inherit). ">Repetition</a></p>
                        </div>
		</div>	

<?php 

// gjenerimi i tabeles se animacioneve ne db
if (is_admin()){

    global $wpdb;
    $myrows = $wpdb->get_results( "SELECT * FROM wp_da_goanimate" ,OBJECT );
    $effects = $wpdb->get_results( "SELECT effect FROM wp_da_ga_effects" ,OBJECT );
    $settings = $wpdb->get_results( "SELECT jquery FROM wp_da_ga_settings" ,OBJECT );
    $path = str_replace( '%7E', '~', $_SERVER['REQUEST_URI']);

    $eff_array = "";
    $numItems = count($myrows);
    $i = 1;

    $allRowsIds = array();
    
    foreach($myrows as $row){

        $allRowsIds[] = $row->id;	
        

        ?>
        <form class="addAnim" action="<?php echo $path; ?>" method="POST">
        <input name="elemId" type="hidden" class="elementId" value="<?php echo $row->id ?>"/>
        <div class="rowField">
            <div class="rows"><input type='text' name='element' value='<?php echo $row->element; ?>' size='25'></div>

            <div class="rows"><select name="effect">
            <?php 
            $eff_array = '';
            foreach($effects as $effect){
                    $selected = ($row->animation == $effect->effect) ? "selected" : "";
                    $eff_array .= "<option value='$effect->effect' $selected>$effect->effect</option>";
            }; echo $eff_array;?>
            </select></div>

            <div class="rows"><input type="text" name="duration" value="<?php echo $row->duration; ?>" size="25"></div>
                        <div class="rows"><input type="text" name="delay" value="<?php echo $row->delay; ?>" ></div>
            <div class="rows"><input type="text" name="iteration" value="<?php echo $row->iteration; ?>" size="20"></div>
	

            <div class="rows lastrow">
                    <input type='submit' class="saveAn" name='submitForm' value='Save' />
                    <input type='submit' class="delAn" onclick="return confirm('Are you sure you want to delete this animation ?')" name='deleteRow' value='Delete' />
            </div>

            </div>

            </form>
                    
                    
    <?php $i++; };

    
    
    $table_name = $wpdb->prefix . 'da_goanimate';
    $table_settings = $wpdb->prefix . 'da_ga_settings';

    // insert and update functions
    if(isset($_POST['submitForm'])){

            $idElem = $_POST['elemId'];
            $element = $_POST['element'];
            $anim = $_POST['effect'];
            $duration = $_POST['duration'];
            $delay = $_POST['delay'];
            $iteration = $_POST['iteration'];

            if( in_array($idElem,$allRowsIds)){

                    $wpdb->update( 
                            $table_name, 
                            array( 
                                    'element' =>  $element,
                                    'animation' => $anim, 
                                    'duration' => $duration, 
                                    'delay' => $delay,
                                    'iteration' => $iteration
                            ), 
                            array( 'ID' => $idElem )
                    );

            } else {

                    $wpdb->insert( 
                            $table_name, 
                            array( 
                                    'element' =>  $element,
                                    'animation' => $anim, 
                                    'duration' => $duration, 
                                    'delay' => $delay,
                                    'iteration' => $iteration
                            ) 
                    );

            }	

            print("<script>window.location.href='$path'</script>");
            
    }
      
    // Delete function
    if(isset($_POST['deleteRow'])){
            $idRow = $_POST['elemId'];
            $wpdb->delete( "$table_name", array( 'ID' => $idRow ) );
            print("<script>window.location.href='$path'</script>");
    }
    
    
    //update settings
    if(isset($_POST['submitSetting'])){
        $jquery = $_POST['jquery'];
        echo $jquery;
        $jqval = ($jquery == 'on') ? 1 : 0;
        $wpdb->update( 
                                $table_settings, 
                                array( 
                                        'jquery' =>  $jqval,
                                ), 
                                array( 'ID' => 1 )
                        );
        print("<script>window.location.href='$path'</script>");
        }

        foreach($settings as $srows){
            $jqueryLib = $srows->jquery; 
        }
        $checked = ($jqueryLib == 1) ? "checked" : "";
}

 ?>
<div id="before"></div>  

</div>

<div class="addWrap"><a class="add">Add New Animation</a></div>

<hr/>
<p style="font-size:18px"><b><i>Settings</i></b></p>
<form action="<?php echo $path; ?>" method="POST">
    Include Jquery Library? &nbsp;<input type="checkbox" name="jquery" <?php echo $checked ?>>
    <p><i>If you already have a jquery library included in your website uncheck the option above.</i></p>
    <br>
    
    <input type='submit' class="settings" name='submitSetting' value='Update Settings' />
</form>



<!-- Copy Html for a new animation row-->
<form class="addAnim copyHtml" action="<?php echo $path; ?>" method="POST">
        <input name="elemId" type="hidden" class="elementId" value=""/>
        <div class="rowField">
            <div class="rows"><input type='text' name='element' value='#example' size='25'></div>

            <div class="rows"><select name="effect">
            <?php 
            $eff_array = '';
            foreach($effects as $effect){
                    $selected = ($row->animation == $effect->effect) ? "selected" : "";
                    $eff_array .= "<option value='$effect->effect' $selected>$effect->effect</option>";
            }; echo $eff_array;?>
            </select></div>

            <div class="rows"><input type="text" name="duration" value="2" size="25"></div>
                        <div class="rows"><input type="text" name="delay" value="0" ></div>
            <div class="rows"><input type="text" name="iteration" value="1" size="20"></div>
	

            <div class="rows lastrow">
                    <input type='submit' class="saveAn" name='submitForm' value='Save' />
                    <input type='submit' class="delAn" onclick="return confirm('Are you sure you want to delete this animation ?')" name='deleteRow' value='Delete' />
            </div>

            </div>

</form>
