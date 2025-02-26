<?php

class AutocompleteSettings {

    protected $option_name = 'Autocomplete-Settings';
    protected $data = array(
        'words' => 'wordpress'
    );

    public function __construct() {

        add_action('init', array($this, 'init'));



        add_action('admin_init', array($this, 'admin_init'));
        add_action('admin_menu', array($this, 'add_page'));

        register_activation_hook(AUTOCOMPLETEPLUGIN_FILE, array($this, 'activate'));

        register_deactivation_hook(AUTOCOMPLETEPLUGIN_FILE, array($this, 'deactivate'));
    }

    public function activate() {
        update_option($this->option_name, $this->data);
    }

    public function deactivate() {
        delete_option($this->option_name);
    }

    public function initlst() {

        $result = get_option('Autocomplete-Settings');
		 $options = get_option($this->option_name);
		$result1 =  $options['words'];
		$resultsarr = explode("," , $result1 );
		$cnt = count($resultsarr);
		$strg = "";
		for($i = 0; $i < $cnt; $i++)
		{
			$strg .= "<li class='selectable'<a href='#' title='delete' class='itemDelete' onclick='aa(jQuery(this))'><font face='verdana' color='blue'>Delete            </font></a> <font face='verdana' color='#dba915' size='3'>";
			$strg .= $resultsarr[$i];
			$strg .= "</font></li>";
			
		}
		
		echo $strg;
    }
	
	public function init() {

        $result = get_option('Autocomplete-Settings');
		
    }

    public function admin_init() {
        register_setting('Autocomplete_options', $this->option_name, array($this, 'validate'));
    }

    public function add_page() {
        add_options_page('Autocomplete  Options', 'Autocomplete Options', 'manage_options', 'Autocomplete_options', array($this, 'options_autocomplete_page'));
    }

    public function options_autocomplete_page() {
        $options = get_option($this->option_name);
        ?>
        <script>
           
			
			function addAnother () {

    //console.log(jQuery("#list"));

    var ul = document.getElementById("list");
    
   
	var vl = document.getElementById("wrd").value;
	
   
	
	if (hasval(vl) == 0)
	{
	
    jQuery("#list").append("<li class='selectable'>" + "<a href='#' title='delete' class='itemDelete' onclick='aa(jQuery(this))'><font face='verdana' color='blue'>Delete            </font></a> <font face='Arial' color='#dba915' size='3'>" + document.getElementById('wrd').value + "</font></li>");
	
	}
	srt();
	sav();
	return false;
	
}

function hasval (vl)
{

var cnt = jQuery("#list")[0].childElementCount;
if (vl == "wordpress")
{
	return 1;
}

if (vl == "")
{
	return 1;
}


for(i = 1; i < cnt; i++)
{

if (jQuery("#list").children()[i].innerText == "Delete " + vl)
{
return 1;
}
}
return 0;
}

function  srt ()
{
	jQuery('#list li').first().remove();
var elems = jQuery('#list li').detach().sort(function (a, b) {
  return (jQuery(a).text() < jQuery(b).text() ? -1 
        : jQuery(a).text() > jQuery(b).text() ? 1 : 0);
}); 
jQuery('#list').append(elems);
jQuery('#list').prepend("<li><font face='Arial' color='#dba915' size='3'>wordpress</font></li>");
return false;
}

function remove_selected_item() {
    jQuery('#list ul li.selected').remove()
}

 function aa (el1) {
	
    el1.parent().remove();
	
	srt();
	
	console.log(jQuery("#list")[0]);
	sav();
	
	return false;
};

function sav ()
{
	
	var oFormObject = document.forms['frm'];
	var elem = document.getElementById("submt");
	elem.value = "wordpress";
	var cnt = jQuery("#list")[0].childElementCount;
	
for(i = 1; i < cnt; i++)
{
var rval = jQuery("#list").children()[i].innerText.substring(7);

elem.value += ",";
elem.value += rval;


}
 
 
 return false;
}



 

        </script>
        
		
		<form onsubmit="return false;" action="options.php" method="post" id="frm">
   <h2>Autocomplete Options</h2>
   <?php settings_fields('Autocomplete_options'); ?>
   <table style="border: 1px solid black;padding: 15px;" cellpadding='10'>
      <tr bgcolor='#7FB3D5'>
         <th></th>
         <th>Aotocomplete Words List</th>
      </tr>
      <tr bgcolor='#FCF3CF'>
         <td style='text-align:top; vertical-align:top;'>Word To add: <input type="text" onkeypress="return IsAlphaNumeric(event);" id="wrd" maxlength="25">
            <button   onClick="addAnother()" return false;>Add Value=></button> 
         </td>
         <td style='text-align:top; vertical-align:top;' id="lst">
            <ul id="list">
			<li><font face='Arial' color='#dba915' size='3'>wordpress</font></li>
			<?php 
			$result = get_option('Autocomplete-Settings');
		 $options = get_option($this->option_name);
		$result1 =  $options['words'];
		$resultsarr = explode("," , $result1 );
		$cnt = count($resultsarr);
		$strg = "";
		for($i = 1; $i < $cnt; $i++)
		{
			
			          
			$strg .= "<li class='selectable'><a href='#' title='delete' class='itemDelete' onclick='aa(jQuery(this))'><font face='verdana' color='blue'>Delete            </font></a> <font face='Arial' color='#dba915' size='3'>";
			$strg .= $resultsarr[$i];
			$strg .= "</font></li>";
			
		}
		
		echo $strg;
			?>
            </ul>
         </td>
      </tr>
      <tr>
        <td><input type="text"  onchange="return false;" name="<?php echo $this->option_name ?>[words]" value="<?php echo $options['words']; ?>"   id="submt" readonly /></td>
      </tr>
   </table>
  <button onclick="document.getElementById('frm').submit();">Submit</button> 
</form>
<script>

 var myInput = document.getElementById('submt');
 myInput.onpaste = function(e) {
   e.preventDefault();
 }
 
 var myInput1 = document.getElementById('wrd');
 myInput1.onpaste = function(e) {
   e.preventDefault();
 }
 
  var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Tab
        specialKeys.push(46); //Delete
        specialKeys.push(36); //Home
        specialKeys.push(35); //End
        specialKeys.push(37); //Left
        specialKeys.push(39); //Right
        function IsAlphaNumeric(e) {
            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
            var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            //document.getElementById("").style.display = ret ? "none" : "inline";
            return ret;
        }


</script>
 

           
       
        <?php
    }

    public function validate($input) {
        var_dump($input);
        $valid = array();
        $valid['words'] = $input['words'];





        return $valid;
    }

}
