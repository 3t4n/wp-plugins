jQuery(document).ready(function () {
    custom_api_wp_GetColumn();
});
function custom_api_wp_GetColumn() {
    jQuery('#SelectedColumn').multiselect({

        includeSelectAllOption: true,
        enableFiltering: true

    });
}

jQuery("#CountryList li").click(function () {
    jQuery(this).toggleClass('country active');///User selected value...****

});


function custom_api_wp_CustomText() {
    var check = document.getElementById("ColumnParam").value;
    if (check == "custom") {
        document.getElementById("Param").style.visibility = "visible";
    }
}

function custom_api_wp_GetTbColumn() {
   
    document.getElementById("method_name_initial").value = document.getElementById("MethodName").value;
    document.getElementById("api_name_initial").value = document.getElementById("ApiName").value;
    document.getElementById("table_name_initial").value = document.getElementById("select-table").value;
    document.getElementById("SubmitForm1").click();

}

function custom_api_wp_ShowData() {
    
    var ApiName = document.getElementById("ApiName").value;
    var MethodName = document.getElementById("MethodName").value;
    var SelectedTable = document.getElementById("select-table").value;

    var SelectedCondtion = document.getElementById("ColumnCondition").value;
    var SelectedCoulmn = jQuery('#SelectedColumn').val();
    var SelectedParameter = document.getElementById("ColumnParam").value;
    var ConditionColumn = document.getElementById("OnColumn").value;
    document.getElementById("Selectedcolumn11").value = jQuery('#SelectedColumn').val();
    


    var query;
    if( (SelectedCondtion == "no condition")  ){
        if (MethodName == "GET") {
            query = "Select ";
        }
        query += SelectedCoulmn;
    query += " from ";
    query += SelectedTable;
    document.getElementById("QueryVal").value = query;
}
else{
    if (MethodName == "GET") {
        query = "Select ";
    }
    query += SelectedCoulmn;
    query += " from ";
    query += SelectedTable;
    query += " WHERE " ;
    query += ConditionColumn + " ";
    query += SelectedCondtion + " ";
    query += SelectedParameter;

    document.getElementById("QueryVal").value = query;
}
}

function custom_api_wp_delete(rowIndexOfGridview) {

    var selected = rowIndexOfGridview.parentNode.parentNode;
    var ApiName = selected.cells[0].innerHTML;
   

    var SendUrl = window.location.href + "&action=delete&api=" + ApiName;

    location.replace(SendUrl);
    
}

function custom_api_wp_edit(rowIndexOfGridview) {
    var selected = rowIndexOfGridview.parentNode.parentNode;
    var ApiName = selected.cells[0].innerHTML;

    var SendUrl1 = window.location.href + "&action=edit&api=" + ApiName;

    location.replace(SendUrl1);
}


var d = document.getElementById("wp_d");
if(d!=null) {
    d.onclick = function(){
        var p = document.getElementById("protectedrestapi_container");
        if(p.style.display == "block") p.style.display = "none";
        else p.style.display = "block";
    };
}

var c = document.getElementById("wp_c");
if(c!=null) {
    c.onclick = function() {
        var v = document.getElementById("mo_custom_api_list");
        if(v.style.display == "block") v.style.display = "none";
        else v.style.display = "block";
    }
}

function turnOff(element, id) {
    var sp = document.getElementById(id);
    if(element.checked != true) {
        sp.innerHTML = "";
    } else if(element.checked == true) {
        sp.innerHTML = "ON";
    }
}