jQuery(document).ready(function($) {
//actions to perform onLoad
resetform();
makewritable();
var my_scriptus = JSON.parse(scriptus);
if(typeof(my_scriptus) != 'undefined'){
	for(var i=0;i<my_scriptus.length;i++){
	var tst = my_scriptus[i];
	 $('#actelements').append(
        $('<option></option>').val(i).html(tst.file_name)
    );
	}
	}


	
//capturing resource type changing	
	$('#typus').change(function(){
	if($(this).val()=="style"){
		$('#dep').hide();
	} else{
		$('#dep').show();
	}
	});
//capturing button click
$(".addmod").click(function () { 
	switch($(this).val()){
	case "Modify":
	makewritable()
	$('#pushme').val('Modify');
	$('#formod').css("visibility","visible");
	resetform();
	$('#actelements').val('Please select...');
	break;
	case "Add new":
	makewritable()
	$('#pushme').val('Add');
	$('#formod').css('visibility','hidden');
	resetform();
	break;
	case "Delete":
	resetform();
	$('#unique_name').attr("disabled", true);
	$('#file_name').attr("disabled", true);
	$('#typus').attr("disabled", true);
	$(':checkbox').attr("disabled", true);
	$('#pushme').val('Delete');
	$('#formod').css("visibility","visible");	
	$('#actelements').val('Please select...');
	break;
	}
	});
//capturing mod and delete select menu change
$('#actelements').change(function (){
	resetform();
	var x=$('#actelements').val();
	var tst = my_scriptus[x];
	$('#unique_name').val($('#actelements option:selected').text());
	//$('#unique_name').val(tst.file_name);
	$('#file_name').val(tst.file_url);
	$('#typus').val(tst.res_type).change();
	for(var n=0;n<tst.dep_script.length;n++){
	for(var x=0;x<$(':checkbox').length;x++) {
	if($('#'+x).attr('value')==tst.dep_script[n]){
	$('#'+x).attr('checked', true);
	}
	}
	}
	
});	
function resetform(){
$('#unique_name').val('');
$('#file_name').val('');
$('#typus').val('script').change();
$(':checkbox').removeAttr('checked');
}
function makewritable(){
$('#unique_name').attr("disabled", false);
$('#file_name').attr("disabled", false);
$('#typus').attr("disabled", false);
$(':checkbox').attr("disabled", false);
}
});//end of script