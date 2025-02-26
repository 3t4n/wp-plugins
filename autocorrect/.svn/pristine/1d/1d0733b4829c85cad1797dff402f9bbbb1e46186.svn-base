var editableGrid;
(function($) {
	$(document).ready(function() {
var metadata = [];
				metadata.push({ name: "typed", label: "TYPE", datatype: "string", editable: false});
				metadata.push({ name: "replaced", label:"REPLACE", datatype: "string", editable: false });
				metadata.push({ name: "deleted", label: "DELETE", datatype: "html" });
				
			
				 var elem = document.getElementById("submt");
	            console.log(elem);
				data = decifer(elem.value);
				console.log(data);
				
				
				editableGrid = new EditableGrid("DemoGridJsData", {enableSort: true})
				editableGrid.load({"metadata": metadata, "data": data});

	           
				editableGrid.renderGrid("tablecontent", "testgrid");

				
				var editbl = $('.editablegrid-typed');
				lstid = document.getElementsByClassName("testgrid")[0].rows[document.getElementsByClassName("testgrid")[0].rows.length - 1].id;
				
				lstidarr = lstid.split("_");
				
				var idx = parseInt(lstidarr[1]);
				
				
				$(".editablegrid-typed, #replacedt, #typedt").bind('copy paste cut',function(e) { 
 e.preventDefault(); //disable cut,copy,paste
 alert('cut,copy & paste options are disabled !!');
 });
 
 function getdatax ()
 {
	 var elemcnt = editableGrid.data.length;
	 retval = editableGrid.data[0].columns[0] + "=" + editableGrid.data[0].columns[1] ;
	 for(var cntx = 1; cntx < elemcnt; cntx++)
	 {
		 
		retval += "|";
		retval += editableGrid.data[cntx].columns[0] + "=" + editableGrid.data[cntx].columns[1] ;
	 }
	 return retval;
 }
 

    $(".deleteme").on('click' , function(event) {
		
        var td = $(this).parent();
		console.log(td);
		console.log(td.parent()[0].rowIndex);
		console.log(td.parent()[0].rowIndex);
		editableGrid.remove(td.parent()[0].rowIndex - 1);
		var oFormObject = document.forms['frm'];
	var elem = document.getElementById("submt");
	elem.value = getdatax();
    return false;
    });

 
 $(".editablegrid-typed, #replacedt, #typedt").on('keypress', function (e) {
	
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
	if(str == " ")
	{
		return true;
	}		
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
	alert('Only Alphabets and Numbers allowed');
    return false;
	});
	
	var tbl = document.getElementsByClassName('testgrid')[0];
			
			var rowcnt = tbl.rows.length;
			
$("#b2").on("click" , function ()
{
$("#d1").toggle("slow","swing");
$("#b2").toggle("slow","swing");
return false;
});
$("#d1").toggle();
        var oFormObject = document.forms['frm'];
        strg1 = '<div style="text-align:center">';
		strg1 += '<div id="tablecontent" style="width:100%"></div>';
		strg1 += '</div>';
		$(strg1).appendTo(oFormObject)
		
		
		

function makearr ()
{
	retarr = [];
	var tbl = document.getElementsByClassName('testgrid')[0];
			
			var rowcnt = tbl.rows.length;
			
			var delarr = [];
			for(var cnt = 2; cnt < rowcnt; cnt++)
			{
				var typd = document.getElementsByClassName('testgrid')[0].rows[cnt].cells[0].innerText;
				retarr.push(typd);
			}
			return retarr;
}




$("#b3").on("click" , function ()
{
	    
	     typd = document.getElementById("typedt").value;
		 typd = typd.toString();
		 repld = document.getElementById("replacedt").value;
		 typd = typd.trim();
		 repld = repld.trim();
		 var rowno = $.inArray(typd, makearr());
		 rowno += 2;
		 console.log(rowno);
		 if ($.inArray(typd, makearr()) == -1)
		 {
			 if((typd != "") && (repld != ""))
		   {
			 pushtd(typd, repld);
		   }
		 }
		 else
		 {
					   colr = document.getElementsByClassName('testgrid')[0].rows[rowno].cells[0].style.background;
		   
		   adddiv(rowno);
           setTimeout(function(){$("#message").remove();document.getElementsByClassName('testgrid')[0].rows[rowno].cells[0].style.background = colr;$("#b3").toggle("slow" , "swing");$("#cncl").toggle("slow" , "swing");}, 3000); 
		
		 }
		 return false;
});




function adddiv(rno)
{
	$('<div id="message" style="background-color:#EAD03D;width:25%">Already Present</div>').insertAfter("#cncl");
	document.getElementsByClassName('testgrid')[0].rows[rno].cells[0].style.background = "#EAD03D";
	$("#b3").toggle("slow" , "swing");
	$("#cncl").toggle("slow" , "swing");
	return false;
	
}   

function remdiv (colr)
{
	$("#tablecontent").removChild($("#tablecontent").childNodes[0]);
	document.getElementsByClassName('testgrid')[0].rows[rno].cells[0].style.background = colr;
	return false;
}

function addchkbx ()
{

var tbl = document.getElementsByClassName('testgrid')[0];
tbl.rows[1].cells[2].innerHTML = "";
			
			var rowcnt = tbl.rows.length;
			
			for(var cnt = 2; cnt < rowcnt; cnt++)
			{
				tbl.rows[cnt].cells[2].innerHTML = '<input type="checkbox">';
			}	
}

function createid (suff , delim, strt)
{
	return suff + delim + (strt + 1);
}

function pushtd( val1 , val2)
{
	

	idx += 1;
	
	editableGrid.addRow(idx , {"typed": val1, "replaced": val2, "deleted":"<button class='deleteme'>Delete</button>"})
	
	
	var elem = document.getElementById("submt");
	elem.value = getdatax();
	$("#typedt").val('');
	$(".deleteme").bind('click', function (event)
	{
		 var td = $(this).parent();
		console.log(td.parent()[0].rowIndex);
	editableGrid.data.splice(td.parent()[0].rowIndex - 1 , 1);
		td.parent().remove();
		var oFormObject = document.forms['frm'];
	var elem = document.getElementById("submt");
	elem.value = getdatax();
    return false;
		
	}
	)
	return false;

	
}

function cancl ()
{
	$("#b2").toggle("slow","swing");
	$("#d1").toggle("slow","swing");
	return false;
}

$("#cncl, #ds, #b2").mousedown(function(){
this.style.background = "red";
return false;
})
$("#cncl, #ds, #b2").mouseup(function(){
this.style.background = "#CED8F6";
return false;
})

function decifer1 (dat)
{
var elem = document.getElementById("submt");
	
}

function decifer (dat)
{
	var datarr = dat.split("|");
	var datcnt = datarr.length;
	
	var retdatadata = [];

	for(var dati= 0; dati < datcnt; dati++)
	{
		elemi = datarr[dati];
		elemarr = elemi.split("=");
		retdatadata.push({id: dati, values: {"typed":elemarr[0],"replaced":elemarr[1], "deleted":"<button class='deleteme'>Delete</button>"}});
		
	}
	return retdatadata;
	

}
$("#cncl").click(function() {
$("#b2").toggle("slow" , "swing");
$("#d1").toggle("slow" , "swing");
return false;	
})


				
	});
	}(jQuery));