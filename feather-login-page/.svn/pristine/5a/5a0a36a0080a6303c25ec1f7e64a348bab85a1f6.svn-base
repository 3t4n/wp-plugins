
var stackUndo = [];
var stackRedo = [];


function isUndoAvailable(){
	if (stackUndo.length > 0) {
		return true;
	}
	
	return false;
}

function isRedoAvailable(){
	if (stackRedo.length > 0) {
		return true;
	}

	return false;
}


function isThisJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}



function undoRedoRenderTemplateAndReAddToStack(templateCode){


    var plbp_LoginBuilderDuplicatedOps = JSON.stringify(templateCode);

    feather_LoginBuilderApp.prevTemplateData = JSON.stringify(feather_LoginBuilderApp.options.updatedOptions) 

    //jQuery('.templateasd').val(JSON.stringify(feather_LoginBuilderApp.options.updatedOptions) )

    feather_LoginBuilderApp.options.updatedOptions = _.clone( JSON.parse(plbp_LoginBuilderDuplicatedOps) );

    loadSavedOptions(feather_LoginBuilderApp.options.updatedOptions);


    var lastActionTemplateChange = false;

    if ( typeof(stackUndo[stackUndo.length-1]) != 'undefined') {

        if ( typeof(stackUndo[stackUndo.length-1]['changedOpName']) != 'undefined' ) {

            if (stackUndo[stackUndo.length-1]['changedOpName'] == 'templateChange') {
                lastActionTemplateChange = true;
            }

        }

    }


    if (lastActionTemplateChange == true) {

        var thisChangeRedoProps = {
            changedOpName:'templateChange',
            changedOpValue:stackUndo[stackUndo.length-1]['changedOpValue'],
        }

        sendDataBackToUndoStack(thisChangeRedoProps);

    }else{

        var thisChangeRedoProps = {
            changedOpName:'templateChange',
            changedOpValue:feather_LoginBuilderApp.prevTemplateData,
        }

        sendDataBackToUndoStack(thisChangeRedoProps);

    }
                    


}



function renderAndReAddToStack(undoneChange,isUndo,isRedo){
    
    
    feather_LoginBuilderApp.changeFromUndoAction = isUndo;
    feather_LoginBuilderApp.changeFromRedoAction = isRedo;


    jQuery('[data-optname="'+undoneChange['changedOpName']+'"]').val(undoneChange['changedOpValue']).trigger('change');


    if (undoneChange['changedOpName'] == 'templateChange') {

        if ( isThisJson(undoneChange['changedOpValue']) ) {

            var parsedChangedTemplate = JSON.parse(undoneChange['changedOpValue']);
            if ( typeof(parsedChangedTemplate['loginDefaults']) != 'undefined' ) {

                undoRedoRenderTemplateAndReAddToStack(parsedChangedTemplate);

            }else{
                jQuery('[data-templateid="'+undoneChange['changedOpValue']+'"]').trigger('click');
            }


            // if is object code here
        }


    }

    feather_LoginBuilderApp.changeFromUndoAction = false;
    feather_LoginBuilderApp.changeFromRedoAction = false;
        
}





function sendDataBackToUndoStack(thisChangeRedoProps){

	//console.log('sendDataBackToUndoStack');
	if (thisChangeRedoProps['changedOpName'] != '' && thisChangeRedoProps['changedOpName'] != ' ') {
        
    	if (feather_LoginBuilderApp.changeFromUndoAction != true) {
          
        	addChangeToUndo(thisChangeRedoProps);
        	if (feather_LoginBuilderApp.changeFromRedoAction != true ) {
        		emptyRedoStackOnNewChange();
          	}
        
        }

        if (feather_LoginBuilderApp.changeFromUndoAction == true && feather_LoginBuilderApp.changeFromRedoAction == false) {
        	addChangeToRedo(thisChangeRedoProps);
        }

    }

    feather_LoginBuilderApp.changeFromUndoAction = false;
    feather_LoginBuilderApp.changeFromRedoAction = false;

    if ( ! isUndoAvailable() ) {
        jQuery('#pbbtnUndo').css('background','#9e9e9e');
    }else{
        jQuery('#pbbtnUndo').css('background','#e3e3e3');
    }

    if ( ! isRedoAvailable() ) {
        jQuery('#pbbtnRedo').css('background','#9e9e9e');
    }else{
        jQuery('#pbbtnRedo').css('background','#e3e3e3');
    }

}

function addChangeToUndo(changedOptionProps){

	if (stackUndo.length >= 0) {

		var lasStackUndoItem = stackUndo[stackUndo.length - 1];
		if ( JSON.stringify(lasStackUndoItem) == JSON.stringify(changedOptionProps) ) {

		}else{
			stackUndo.push(changedOptionProps);

            // if(stackUndo.length > 50){
            //     stackUndo.shift();
            // }
			//console.log('addChangeToUndo trigger');
			//console.log(stackUndo);
		}

	}
}

function addChangeToRedo(propsFromUndo){

	if (stackRedo.length >= 0) {
		var lasstackRedoItem = stackRedo[stackRedo.length];
		if ( JSON.stringify(lasstackRedoItem) == JSON.stringify(propsFromUndo) ) {

		}else{
			stackRedo.push(propsFromUndo);
			//console.log('addChangeToRedo trigger');
			//console.log(stackRedo);
		}
	}

}

function emptyRedoStackOnNewChange(){
    
    //console.log('emptyRedoStackOnNewChange trigger')
	stackRedo = [];

    if ( ! isRedoAvailable() ) {
        jQuery('#pbbtnRedo').css('background','#9e9e9e');
    }else{
        jQuery('#pbbtnRedo').css('background','#e3e3e3');
    }

}

function popb_undo(){

	var undoneChange = stackUndo.pop();
	//console.log(undoneChange);

 	if (typeof(undoneChange) != 'undefined') {
 		
 		renderAndReAddToStack(undoneChange,true,false);

 	}

    if ( ! isUndoAvailable() ) {
        jQuery('#pbbtnUndo').css('background','#9e9e9e');
    }else{
        jQuery('#pbbtnUndo').css('background','#e3e3e3');
    }

    if ( ! isRedoAvailable() ) {
        jQuery('#pbbtnRedo').css('background','#9e9e9e');
    }else{
        jQuery('#pbbtnRedo').css('background','#e3e3e3');
    }

}

function popb_redo(){

 	var redoneChange = stackRedo.pop();
 	
	if (typeof(redoneChange) != 'undefined') {

        renderAndReAddToStack(redoneChange,false,true);

 	}


    if ( ! isRedoAvailable() ) {
        jQuery('#pbbtnRedo').css('background','#9e9e9e');
    }else{
        jQuery('#pbbtnRedo').css('background','#e3e3e3');
    }

    if ( ! isUndoAvailable() ) {
        jQuery('#pbbtnUndo').css('background','#9e9e9e');
    }else{
        jQuery('#pbbtnUndo').css('background','#e3e3e3');
    }

 	//console.log('stackUndo');
 	//console.log(stackUndo);

}