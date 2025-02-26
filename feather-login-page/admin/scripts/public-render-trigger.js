

function feathermergeDifferentObjProps(source,target){

	Object.keys(target).forEach(function (k) {

      if (typeof source[k] === 'undefined') {
        source[k] = target[k];
      }else{

        if (typeof(target[k]) == 'object' ) {
          Object.keys(target[k]).forEach(function (k2) {

            if (typeof source[k][k2] === 'undefined') {
              source[k][k2] = target[k][k2];
            }else{


              if (typeof(target[k][k2]) == 'object' ) {
                Object.keys(target[k][k2]).forEach(function (k3) {

                  if (typeof source[k][k2][k3] === 'undefined') {
                    source[k][k2][k3] = target[k][k2][k3];
                  }

                });
              }


            }

          });
        }

      }


    });

}


function featherRenderAll(options){

	logoRender(options.logo);
	pageBgRender(options.bgOps);
	formAlignmentRender(options.alignment);
	formBgRender(options.formContBgOps);
	formStylesRender(options.formContOps);
	labelStylesRender(options.formLabels);
	inputStylesRender(options.formInput);
	buttonBgRender(options.formButtonBg);
	buttonStylesRender(options.formButton);
	footerLinksStylesRender(options.footerLinks);
	formTextMessagesRender(options.formTexts);
	formScriptsRender(options.scripts);
}




options = JSON.parse(saved_polpb_data.data);


optionsMobile = false;
try{
	optionsMobile = JSON.parse(saved_polpb_data.dataMobile);
	feathermergeDifferentObjProps(optionsMobile,options);
}catch(e){
	console.log(e);
}

jQuery(document).ready(function($) {


	featherRenderAll(options);


	setTimeout(function() {
    
		featherRenderAll(options);

    }, 1000 );



    function polpb_triggerResponsiveStyles(x) {

			if (x.matches) { // If media query matches
			    
			    jQuery('#login').css('padding','10px');

			    jQuery('#login').css('margin','10% 2%');

			    jQuery('#login').css('max-width','320px');

			    if (typeof(optionsMobile) == 'object') {

			    	featherRenderAll(optionsMobile);

			    }

			} else {
				
				featherRenderAll(options);
			   
			}
		}
	var x = window.matchMedia("(max-width: 400px)")
	polpb_triggerResponsiveStyles(x) // Call listener function at run time
	x.addListener(polpb_triggerResponsiveStyles) // Attach listener function on state changes

	setTimeout(function() {
		polpb_triggerResponsiveStyles(x);
	}, 1002 );

	
});

