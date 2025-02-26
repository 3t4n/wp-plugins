<?php
global $wpdb;
global $result1;
$table_name = $wpdb->prefix . "m_analtics" ;
$result = $wpdb->get_results("SELECT * FROM $table_name" );
?>
<div class="wrap" id="text1">
    <form id="meet-ga-form" action="<?php echo  esc_url( $_SERVER['REQUEST_URI']); ?>" method="post">
		<div class="ga-section ga-section-one">
            <label class="ga-heading"> Google Analytics Tracking </label>
            <label class="switch">
                <input type="checkbox" id="myCheck" value="0" name="meet-check" onchange="meet_check_function()">
                <span class="slider round"></span>
            </label>
            <label class="En-Di">Enable/Disable</label>
        </div>
        <div class="ga-section ga-section-two">
            <div class="form-table" id="meet-field-table" style="display: none" >
                <div class="mt-table-row">
                    <div class="trcking-code" >GA Tracking ID </div>
                        <div class="mt-row-deta"><input type="text" name="gcode" id="gcode"  placeholder = "Enter Google Analytics code" required="yes"/></div>
                </div>
            </div>
        </div>
        <div class="ga-section ga-section-three">
            <input type = "submit" name ="meet-submit-data" value = "Save" id="meet-field-button">
        </div>
    </form>
</div>
<?php
if(isset($_POST['meet-submit-data'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . "m_analtics" ;
    $time = date('Y-m-d H:i:s');
    $gcode = sanitize_text_field($_POST['gcode']);
    $lastid = $wpdb->insert_id;
   // $meetcheck = $_POST['meet-check'];
	$meetcheckvalue = 0;
	if($_POST['meet-check']){
		$meetcheckvalue = 1;
	}
if (strlen($gcode)<18 && preg_match('/^ua-\d{4,9}-\d{1,4}$/i', strval($gcode))){
    $result = $wpdb->get_results("SELECT id from $table_name WHERE id IS NOT NULL");
    if(count($result) == 0){
        $success = $wpdb->insert($table_name, array("g_code" => $gcode, "mit_flag" => $meetcheckvalue));
    }
    else{
        $success = $wpdb->query($wpdb->prepare("UPDATE $table_name SET hit_date=CURRENT_TIMESTAMP ,g_code='%s',mit_flag='%d' WHERE id=1",$gcode,$meetcheckvalue));
    }
}
else{
	 echo"<script>alert('Please Enter Valid Google Analytics Code UA-xxxxxxxx-xx');</script>";
  }
}
global $wpdb;
$table_name = $wpdb->prefix . "m_analtics" ;
$lastid = $wpdb->insert_id;
$result = $wpdb->get_results("SELECT * FROM $table_name" );
$checkbox_box_check ="";
$dis_var = "";
foreach($result as $row) {
   ?><p id="meet_code_display" style="display: none"> <?php echo 'Current GA Tracking ID : '.esc_html($row->g_code); ?></p><?php
	$checkbox_box_check =$row->mit_flag;
	$dis_var = $row->g_code;
}
?>
<script>
	window.onload = function() {
		var checkBox = document.getElementById("myCheck");
		jQuery("#myCheck").attr('value', 'true');

         document.getElementById("gcode").value = "<?php echo $dis_var; ?>";
		if (<?php echo esc_html($checkbox_box_check) == '' ? 0 : $checkbox_box_check; ?>) {
		   jQuery( "#myCheck" ).prop( "checked", true );
		   jQuery("#meet_code_display").css('display','block');
		  var meet_field_table = document.getElementById("meet-field-table");
		 	meet_field_table.style.display = "block";
		   }

		   jQuery('#meet-ga-form').submit(function() {
		       var pattern = /UA-([0-9])\d+-[0-9]{1,2}/;
               var meet_ga_code = document.getElementById("gcode").value;
               if(meet_ga_code.match(pattern) != null && meet_ga_code.match(pattern) != '') {
                     return true;
               }else {
                   alert("Enter Proper GA code \n UA-xxxxxxx-xx ");
               }
               return false;
           });
	}
function meet_check_function() {
  var checkBox = document.getElementById("myCheck");
  var meet_table_display = document.getElementById("meet-field-table");
  var meet_table_button = document.getElementById("meet-field-button");
  var meet_ga_display = document.getElementById("meet_code_display");
  var meet_ga_display_id = document.getElementById("gcode");

    if (checkBox.checked == true){
      meet_table_display.style.display = "block";
      meet_table_button.style.display = "block";
      meet_ga_display.style.display = "block";
  } else {
      meet_table_display.style.display = "none";
      meet_ga_display.style.display = "none";
      meet_ga_display_id.value;
  }
}

</script>
<style>
    .En-Di {
        position: relative;
        bottom: -23px;
        left: -59px ;
    }
    .form-table {
        margin-top: 0.5em !important;
    }
    .mt-table-row {
        display: flex;
        align-items: center;
    }
    .ga-section-one {
        width: 100%;
        display: flex;
        align-items: center;
    }
    .ga-section {
        margin: 10px 0px;
    }
    #meet_code_display {
        margin: 0px 0px 0px 5px;
    }
    #meet-ga-form {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }
    .ga-heading {
        margin-right : 20px;
        font-size:15px;
    }
    .trcking-code {
        margin-right : 20px;
        font-weight: normal !important;
        font-size: 15px !important;
        width:10%;
    }
    .ga-section-two {
        display: flex;
        align-items: center;
        width: 100%;
    }
    .ga-section-three {
        width: 100%;
        display: flex;
        align-items: center;
    }
    #meet-field-table>tbody>tr>th {
        width: auto;
    }
    .switch {
        position: relative;
        width: 55px;
        height: 25px;
        display: flex;
        align-items: center;
    }
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
		border-radius: 50px;
    }
    .slider:before {
        position: absolute;
        content: "";
        height: 21px;
        width: 21px;
        left: 5px;
        bottom: 1.5px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
		border-radius: 50px;
        height: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 55px;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

     Rounded sliders 
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
	#meet-field-button {
		display: block;
    	background-color: #2196F3;
    	border: none;
    	color: #fff;
    	font-weight: bold;
    	padding: 6px 20px;
		cursor: pointer;
		margin: 15px 0px;
	}	
	#meet-field-button:hover {
    background-color: #1c7ac5;
}
</style>