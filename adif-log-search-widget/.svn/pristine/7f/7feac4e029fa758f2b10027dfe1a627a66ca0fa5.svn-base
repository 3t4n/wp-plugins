<?php

global $wpdb;

$refaction = $_REQUEST['refsaction'];

function logbook_ref_list() {
global $wpdb;
$query = "SELECT id, refnumber, refdescription
        FROM ".$wpdb->prefix."logbookRef
        ORDER BY id
        ";
$results = $wpdb->get_results($query);
echo "<div class=\"wrap\">";
echo "
              <script type=\"text/javascript\">
                $(document).ready(function() {
                    $(\".delete_ref\").click(function() {
                        return confirm(\"Delete this item?\");
                    });
                }); 
              </script>";
echo "<h2>".$wpdb -> num_rows." References in database <a class=\"button add-new-h2\" href=\"".$_SERVER['REQUEST_URI']."&refsaction=add\">Add new</a></h2>";
echo " <table class=\"widefat\">";
echo "    <thead><tr>";
echo "    <th>ID</th>";
echo "    <th>Reference</th>";        
echo "    <th>Reference Description</th>";        
echo "    <th>Action</th>";
echo "    </tr></thead>";
foreach ($results as $result){
        echo "<tr>";
        echo "<td>".$result->id."</td>";
        echo "<td>".$result->refnumber."</td>";            
        echo "<td>".$result->refdescription."</td>";
        echo "<td><a href=\"".$_SERVER['REQUEST_URI']."&refsaction=edit&id=".$result->id."\">Edit</a> | <a class=\"delete_ref\" href=\"".$_SERVER['REQUEST_URI']."&refsaction=del&id=".$result->id."\">Delete</a></td>";
        echo "</tr>";
}
echo "  </table>";
echo "</div>";
}

switch($refaction) {

case ("del"):
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM ".$wpdb->prefix."logbookRef WHERE id = $id";
    
    if ($wpdb->query($sql)){
      logbook_ref_list();}
    else{
      echo "Book could not be deleted!";
      }
break;

case ("edit"):
$refid = $_REQUEST['id'];
$refquery = "SELECT refnumber, refdescription
            FROM ".$wpdb->prefix."logbookRef
            WHERE id = $refid";
            
$refresult = $wpdb->get_row($refquery);

if ($_REQUEST['save']){
$data_array=array('refnumber' => $_REQUEST['refnumber'], 'refdescription' => $_REQUEST['refdescription']);
$where_array = array('id' => $refid);
if ($wpdb->update( $wpdb->prefix . 'logbookRef', $data_array, $where_array ))
{
      logbook_ref_list();
}
    else{
      echo "Reference could not be processed!";
      $wpdb->show_errors();
      $wpdb->print_error();
      } 
}
else {
echo "<div class=\"wrap\">";
echo "<h2>Edit reference</h2>";
echo "<form action=\"".$_SERVER['REQUEST_URI']."\" enctype=\"multipart/form-data\" method=\"post\">";
echo "<input name=\"refid\" type=\"hidden\" value=\"$refid\">";
echo "<table class=\"form-table\">";
echo "<tr valign=\"top\">";
echo "<th scope=\"row\"><label for=\"refnumber\">Reference number</label></th>";
echo "<td><input id=\"refnumber\" class=\"regular-text\" name=\"refnumber\" type=\"text\" value=\"".$refresult->refnumber."\"></td>";
echo "</tr>";
echo "<tr valign=\"top\">";
echo "<th scope=\"row\"><label for=\"refdescription\">Reference number</label></th>";
echo "<td><textarea rows=\"6\" cols=\"40\" id=\"refdescription\" class=\"regular-text\" name=\"refdescription\">".$refresult->refdescription."</textarea></td>";
echo "</tr>";
echo "</table>";
echo "<p class=\"submit\"><input class=\"button-primary\" type=\"submit\" name=\"save\" value=\"Save\"></p>";
echo "</form>";
echo "</div>";
}
break;

case ("add"):
if ($_REQUEST['save']){
$refquery="INSERT INTO ".$wpdb->prefix."logbookRef (refnumber,refdescription) VALUES ('$_REQUEST[refnumber]','$_REQUEST[refdescription]')";
if ($wpdb->query($refquery))
{
      logbook_ref_list();
}
    else{
      echo "Reference could not be added!";
      $wpdb->show_errors();
      $wpdb->print_error();
      } 
}else{
echo "<div class=\"wrap\">";
echo "<h2>Add new reference</h2>";
echo "<form action=\"".$_SERVER['REQUEST_URI']."\" enctype=\"multipart/form-data\" method=\"post\">";

echo "<table class=\"form-table\">";
echo "<tr valign=\"top\">";
echo "<th scope=\"row\"><label for=\"refnumber\">Reference number</label></th>";
echo "<td><input id=\"refnumber\" class=\"regular-text\" name=\"refnumber\" type=\"text\"></td>";
echo "</tr>";
echo "<tr valign=\"top\">";
echo "<th scope=\"row\"><label for=\"refdescription\">Reference description</label></th>";
echo "<td><textarea rows=\"6\" cols=\"40\" id=\"refdescription\" class=\"regular-text\" name=\"refdescription\"></textarea></td>";
echo "</tr>";
echo "</table>";
echo "<p class=\"submit\"><input class=\"button-primary\" type=\"submit\" name=\"save\" value=\"Save\"></p>";
echo "</form>";
echo "</div>";
}

break;

default:	
logbook_ref_list();
break;
}            
?>
