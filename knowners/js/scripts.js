var selectedtags = "-99999";

$(document).ready(function(){
	
	
   $( "div.tagli" ).click( function(){
   		$("ul.knowners-tag-list li").removeClass("taglisthighlighted");
   		$( this ).parent().addClass("taglisthighlighted");
   		var iid = $(this).attr("id");
   		$("div.subtagpanel").hide( 0, function(){
   			$("div#sub" + iid ).show( 0 );
   		});
   });
 });
 
 function removetreeo(id){
	if ( confirm( 'Really delete? this will erase entire tree. No UNDO.')  ){
		$('#form-del-' + id ).submit();
	} 
 }
 
 function deleteLink(idlink){
 	if( confirm("Really delete? (no UNDO available)") ){
 		$("input#idlink").val(idlink);
		$("#cmdform").submit();
 	}
 }
 
 function displayTag(url, idtag){
 
 	selectedtagsfrom = selectedtags; 
 	
	if( selectedtags.indexOf( ", " + idtag ) != -1 ){
		selectedtags = selectedtags.replace( ", " + idtag, "" );
	} else {
		selectedtags = selectedtags + ", " + idtag; 
	}
	
 	$("a.knowlers-frontend-taglinks").removeClass("knowlers-ontag");
 	$("a.knowlers-frontend-taglinks").addClass("knowlers-offtag");
 	
	var sa = selectedtags.split(", ");
	for(var i = 0; i<sa.length; i++){ 	
 	
 		$("a#taglink-" + sa[i] ).removeClass("knowlers-offtag");
 		$("a#taglink-" + sa[i] ).addClass("knowlers-ontag");
		$("a#taglink-" + sa[i] ).show();
		
	}
	
 	$("div#knowners-linkpanel").load(
 		{
 			action: 'get_links_for_tag',
 			idtag: selectedtags,
 			idtag2: selectedtagsfrom
 		},
 		function(){
			$("a.knowlers-offtag").hide(); 			
 		}
 	);
 }
 
 function displayAllTags(){
 	$("a.knowlers-offtag").show();
 }
 
 
function init(j){
	
	var json = j;
	
	var infovis = document.getElementById('infovis');
    var w = infovis.offsetWidth, h = infovis.offsetHeight;
    
    
    //init canvas
    //Create a new canvas instance.
    /** 
    var canvas = new Canvas('mycanvas', {
        'injectInto': 'infovis',
        'width': w,
        'height': h,
        'backgroundCanvas': {
            'styles': { 
                'strokeStyle': '#6666FF'
            },
            'impl': {
                'init': function(){},
                'plot': function(canvas, ctx){
                    var times = 6, d = 100; 
                    var pi2 = Math.PI * 2;
                    for (var i = 1; i <= times; i++) {
                        ctx.beginPath();
                        ctx.arc(0, 0, i * d, 0, pi2, true);
                        ctx.stroke();
                        ctx.closePath(); 
                    }
                }
            }
        }
    });
    */  
    //end
    
    
    
    //init RGraph
    var rgraph = new $jit.RGraph({
    
    	injectInto: 'infovis',  
	    background: {  
			CanvasStyles: {  
				strokeStyle: '#6666FF'  
			}  
		},  
	    Navigation: {  
	      enable: true,  
	      panning: true,  
 	      zooming: 10  
	    },  
    
    
    
        //Set Node and Edge colors.
        Node: {
            color: '#000000'
        },
        
        Edge: {
            color: '#AA9999',
			lineWidth: 0.4
        },

        
        
        onBeforeCompute: function(node){
            //Log.write("centering " + node.name + "...");
            //Add the relation list in the right column.
            //This list is taken from the data property of each JSON node.
            //document.getElementById('inner-details').innerHTML = node.data.relation;
        	$("div#knowlers-details").html( node.data.contenuto );
        },
        
        
        onAfterCompute: function(){
            //Log.write("done");
        },
        //Add the name of the node in the correponding label
        //and a click handler to move the graph.
        //This method is called once, on label creation.
        onCreateLabel: function(domElement, node){
            domElement.innerHTML = node.name;
            domElement.onclick = function(){
                rgraph.onClick(node.id);
            };
        },
        //Change some label dom properties.
        //This method is called each time a label is plotted.
		levelDistance: 200,
        onPlaceLabel: function(domElement, node){
            var style = domElement.style;
            style.display = '';
            style.cursor = 'pointer';
			
			var co = node.name;
			
			if(co.indexOf("AUTHOR:")!=-1){
			
				style.fontSize = "1.2em";
				style.color = "#000000";
				style.background = "#FF8000";
				style.zIndex = 4000;
				
				
				
				
				if (node._depth <=0) {
                style.fontSize = "1.2em";
                
            } else if (node._depth == 1) {
                style.fontSize = "0.9em";
                
            } else if(node._depth == 2){
                style.fontSize = "0.8em";
                
            } else {
                style.display = 'none';
                
            }
				
				
				
				
			} else if(co.indexOf("YEAR:")!=-1){
			
				style.fontSize = "1.2em";
				style.color = "#000000";
				style.background = "#FFFF00";
				style.zIndex = 4000;
			
				if (node._depth <=0) {
                style.fontSize = "1.2em";
                
            } else if (node._depth == 1) {
                style.fontSize = "0.9em";
                
            } else if(node._depth == 2){
                style.fontSize = "0.8em";
                
            } else {
                style.display = 'none';
                
            }
			
			
			} else if (node._depth <=0) {
                style.fontSize = "1.2em";
                style.color = "#FFFFFF";
                style.background = "#E1001A";
                style.zIndex = 3000;
            } else if (node._depth == 1) {
                style.fontSize = "0.9em";
                style.color = "#FFFFFF";
                style.background = "#000000";
                style.zIndex = 2500;
            } else if(node._depth == 2){
                style.fontSize = "0.8em";
                style.color = "#AAAAAA";
                style.zIndex = 2000;
                style.background = "#000000";
            } else {
                style.display = 'none';
                style.zIndex = 1000;
                style.background = "#000000";
            }

            var left = parseInt(style.left);
            var w = domElement.offsetWidth;
            style.left = (left - w / 2) + 'px';
        }
    });
    
    //load JSON data
    rgraph.loadJSON(eval( '(' + json + ')' ));
    //compute positions and make the first plot
    rgraph.refresh();
    
    $("div#knowlers-details").html( rgraph.graph.getNode(rgraph.root).data.contenuto );
    
}