<?php if (isset($_GET['updated'])) { ?>
<div class="updated"><strong><?php _e('Settings saved.') ?></strong></div>
<?php } ?>

  <script>
  jQuery(function($) {

    $( "#tabs" ).tabs();
    
    $( "#tabs" ).tabs({ active: <?php if (isset($_GET['active'])) echo $_GET['active']; else echo 0; ?> });

    $('.btn_href').button();
    
    $('#button_show_add_project').button();

    $( "input[type=submit], button" ).not(".hdn").button();

      if (empty($('#projects').val())) 
        {
        $( "input[type=submit], button" ).not('.any').each(function(){
        if (($(this).attr("id")) != 'button_show_add_project')
          {
          $(this).attr("disabled", "disabled");
          }
        });
        }

function empty(element) {
    if (
            element === ""          ||
            element === 0           ||
            element === "0"         ||
            element === null        ||
            element === "NULL"      ||
            element === "null"      ||
            element === undefined   ||
            element === false
        ) {
        return true;
    }
    if (typeof(element) === 'object') {
        var i = 0;
        for (key in element) {
            i++;
        }
        if (i === 0) { return true; }
    }
    return false;
}
window.emptyel = function(el){ return empty(el); }
        
$('#button_show_add_project').click( function() {
$( ".new_project_show" ).dialog({
      resizable: false,
      height:140,
      modal: true,
      buttons: {
        "Create new project": function() {

          if ($('#new_project_name').val() == '')
            {
            event.preventDefault();
            alert_show('Wrong project name', 'Error');
            }
            else
            //$("form [name='project_creation_form']").submit();
            $('#pcf').submit();
            
            $( this ).dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  });
  
window.alert_show = function(msg, type)
  {
  $( "#dialog-message" ).html(msg);
  $( "#dialog-message" ).attr("title", type);
    $( "#dialog-message" ).dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  }
    
    $('#mass_effect').click( function() {
    
    var input = $("input[name='chk_now[]']").clone();
    $(".hidden_chk").append(input);
    
    });
    
    $('#projects').change( function() {
      location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?page=animated_al_show&active=0&pid="+$('#projects').val();
    });

  
/*
Remove hdn class
*/
window.remove_class_hdn = function(source)
  {
    $(source).find(".hdn").each(function(key, item){
    var oldi = item.outerHTML;
    var newi = $(item).removeClass("hdn")[0].outerHTML;
      source = source.replace(oldi, newi);
    });
    return source;
  }
  
  $('button[name="generate_container_class"]').click(function(event){
    event.preventDefault();
    var unique = "container_"+Math.floor(Math.random()* 1000000000);
      $('input[name="list_items_container"]').val(unique);
  });

  $('button[name="generate_main_container_class"]').click(function(event){
    event.preventDefault();
    var unique = "main_container_"+Math.floor(Math.random()* 1000000000);
      $('input[name="list_main_container"]').val(unique);
  });

  });
  </script>

<div id="dialog-message"></div>

<div id="image_nonce"><?php 
if (function_exists('wp_create_nonce'))
    {
echo wp_create_nonce("upd_rec_img");
    }
 ?></div>
 
 <div id="text_nonce"><?php 
if (function_exists('wp_create_nonce'))
    {
echo wp_create_nonce("upd_rec_txt");
    }
 ?></div>
 <div id="slides_nonce"><?php 
if (function_exists('wp_create_nonce'))
    {
echo wp_create_nonce("upd_rec_slide");
    }
 ?></div>

<!-- ********************************************* Tab Page 1 ****************************************************** -->

<div><img src='<?php echo plugins_url("../../images/caption.png", __FILE__); ?>'></div>
 
 Projects 
 <select name="cur_project" id="projects">
 <?php
 foreach ($all_projects as $project)
  {
  if ($proj_id == $project->list_id)
  echo "<option value='".$project->list_id."' selected='selected'>".$project->list_name."(id:".$project->list_id.")</option>";
  else
  echo "<option value='".$project->list_id."'>".$project->list_name."(id:".$project->list_id.")</option>";
  }
 ?>
 </select>
 <button name="new_project" id="button_show_add_project">Create new project</button>

<form id="projdel" name="project_delete_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=animated_al_show&active=0">
  <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('sp_project_del');
    }
  ?>
<input type="hidden" name="proj_id" value="<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>">
<input type="submit" name="del_proj_btn" value="Delete">
</form>
 
 <div class="new_project_show" title="New project creation">
  <form id="pcf" name="project_creation_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=animated_al_show&active=0">
  <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('sp_project_name');
    }
  ?>
 <h5 class="add_proj_header">New project</h5>
 <input type="text" name="new_project_name" value="" id="new_project_name">
 <input type="hidden" name="new_project_btn" value="Add project" id="add_proj_btn">
  </form>
 </div>
 
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">List Settings</a></li>
    <li><a href="#tabs-2">Manage List</a></li>
    <li><a href="#tabs-3">Edit List Item</a></li>
    <li><a href="#tabs-4">Apply Templates</a></li>
    <li><a href="#tabs-5">Items Positions</a></li>
    <li><a href="#tabs-6">Apply Effect</a></li>
    <li><a href="#tabs-7">Paste Code</a></li>
  </ul>
  <div id="tabs-1">
  
