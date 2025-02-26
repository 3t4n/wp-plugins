/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/

( function( blocks, editor, element ) {

	var el = wp.element.createElement;
	var wb3d_block_left_p = { position: 'relative',backgroundColor: '#bbaaff', color: '#fff', padding: '20px',height: '42px',borderRadius: '18px' };
	var wb3d_block_input = { display: 'none', color: '#000',position:'absolute' ,top: '9px', left: '130px' , width: '270px' };
	var wb3d_block_input3 = {display: 'none', color: '#f0f',position:'absolute' ,top: '59px', left: '130px' , width: '270px' };
      var wb3d_block_input2 = { fontSize: '15px', color: '#000',position:'absolute' ,top: '20px', left: '140px' };
	var wb3d_block_label3 = { fontSize: '15px', color: '#000',position:'absolute' ,top: '51px', left: '140px' };
	var wb3d_block_left_img = {height: '62px', width: '102px',position:'absolute',top: '9px', left: '9px' };
	var wb3d_block_right_img = { height: '40px', width: '40px',position:'absolute',top: '20px', right: '20px' };
	var wb3d_block_left_button = { backgroundColor: 'rgb(83 50 165)',height: '40px', width: '102px',position:'absolute',top: '20px', right: '20px',borderRadius: '22px' };

	blocks.registerBlockType( 'hall/block-server-side-render', {
		title: '3D Website Builder',
		icon: {
			background: '#7e70af',
			foreground: '#f0f',
			src: 'dashicons-wb3d',
		},
		description:'Add Your 3D Website Builder Object',
		category: 'common',
		attributes: {

			value: { 
				type: 'text',
				value:'2',
			},
			value2: { 
				type: 'text',
				value:'2',
			},
                  value3: { 
                        type: 'text',
                        value:'2',
                  },                  
                  value4: { 
                        type: 'text',
                        value:'2',
                  },
		},
		edit: function(props,  { attributes, setAttributes } ) {

                  var value1,value2,value3,value4;
			if(typeof(props.attributes.value)==='undefined'){
				value1='';
                        value2='';
                        value3='';
				value4='';
				wb3d_read_list_first();
				wb3d_props=props;
			}
			else{
				value1=props.attributes.value;
                        value2=props.attributes.value2;
                        value3=props.attributes.value3;
				value4=props.attributes.value4;
			}

			var wb3d_click_right_img = function (media) {

				wb3d_props=props;
				wb3d_read_list_first();

			};

			wb3d_onChange_input=function(){
				var x=document.getElementById('block-'+wb3d_props.clientId).children[0].children[1].value;
                        var y=document.getElementById('block-'+wb3d_props.clientId).children[0].children[2].value;
				var z=document.getElementById('block-'+wb3d_props.clientId).children[0].children[0].value;
				props.setAttributes( { value:  x } );
                        props.setAttributes( { value2:  y } );
				props.setAttributes( { value3:  z } );
			};
			return el( 'p', {href:'/', style: wb3d_block_left_p },


			el('img', {className:'wb3d_block', style: wb3d_block_left_img,src:value3,}),
			el('input', { style: wb3d_block_input ,onChange:wb3d_onChange_input,value:value1,}),
			el('input', { style: wb3d_block_input3 ,value:value2,}),
                  el('label', { style: wb3d_block_input2},value1.split('"')[1]),
			el('label', { style: wb3d_block_label3},value2,),
			el('button', {style: wb3d_block_left_button,onClick:  wb3d_click_right_img},'Change'),);
		},


		save: function({attributes}) {
                var value1,value2,value3,value4;
			if(typeof(attributes.value)==='undefined'){
				value1='Not Value';
                        value2='Not Value';
                        value3='Not Value';
				value4='Not Value';
			}
			else{
				value1=attributes.value;
                        value2=attributes.value2;
                        value3=attributes.value3;
				value4=attributes.value4;
			}

			return value1;
		},
    });

} )(window.wp.blocks,window.wp.blockEditor,window.wp.element);


function wb3d_read_list_first(){

	var txt='<div id="wb3d_start_sliders_page" style="width: 100%; height:700px;background-color: #bbaaff;text-align: center;position: fixed;top: 0px;left: 0px;z-index: 9999998;">';
      txt+='<label id="wb3d_shortcode_note" style="position:absolute;color:rgb(177,12,12);font-weight: bold;top:30px;margin:auto">Only one shortcode is executed per page</label>';	
      txt+='<div id="wb3d_start_sliders_sub" style="top:10%; position: absolute;left: 10%; width: 80%;height:80%;background-color: #a6abbc;border-radius: 30px;box-shadow: inset 0px 1px 20px 9px rgba(0,0,0,0.53);overflow: auto;">';
	txt+='<div id="wb3d_obj_list" style="top:120px; position: absolute;left:0px; width: 100%;height:auto;"></div>';
	txt+='</div></div>';


      if(jQuery('#wb3d_start_sliders_sub').length===0){
      	jQuery('body').append(txt);
      }
	var w=(Number((jQuery('#wb3d_shortcode_note').css("width")).split('px')[0]))/2;
      var left= (window.innerWidth/2)-w;
      jQuery('#wb3d_shortcode_note').css("left",left+'px');


	var ajaxurl='admin-ajax.php';
	var data2 = {
		'action': 'wb3d_read_first_data',
		'wb3d_nonce': wb3d_blocks.wb3d_nonce,
	};
	jQuery.post(ajaxurl, data2, function(response) {
		response= jQuery.parseJSON(response);
		jQuery('#wb3d_start_sliders_sub').empty();
		wb3d_read_data(response[0]);
	});
}




function wb3d_read_data(data,i){
	for(var j=data.length-1;j>=0;j--){
		var b=data.length-j-1;
		wb3d_append_html(data,j,b);
		jQuery('#wb3dindex_'+j ).show();
	}
}

function wb3d_append_html(data,j,b){

      var txt='<div id="wb3dindex_'+j+'" style="    display: block;float: left; text-align: left;position:relative;margin:10px;width: 294px;height: 185px;background-color:#ccc;border-radius:10px;box-shadow:0px 0px 20px 8px rgba(0,0,0,0.53)">';
      txt+='<lable style="position:absolute;top: 15px;left: 97px;"> Id='+data[j].id_ves+'</lable>';
      txt+='<div id="labelwb3d_'+j+'" style="position:absolute;text-align:center;top: 38px;left: 10px;width: 272px;">[wb3d_object alias="'+data[j].name+'"]</div>';
      txt+='<img id="wb3d_thumbnail_'+j+'" src="'+(data[j].thumbnail)+'" style="border-radius:5px;top:69px;left: 25px;;width:240px;height:107px;position:absolute">';
      txt+=' <div style="width:100px;height40px;background-color:#aaa;"></div></div> ';
	jQuery('#wb3d_start_sliders_sub').append(txt);

	jQuery('#wb3dindex_'+j).click(function(){
		var j=this.id.split('_')[1];
            document.getElementById('block-'+wb3d_props.clientId).children[0].children[0].value=data[j].thumbnail;
		document.getElementById('block-'+wb3d_props.clientId).children[0].children[1].value='[wb3d_object alias="'+data[j].name+'"][/wb3d_object]';
		document.getElementById('block-'+wb3d_props.clientId).children[0].children[2].value=data[j].id_ves;
		wb3d_onChange_input();
		jQuery('#wb3d_start_sliders_page').empty();
		jQuery('#wb3d_start_sliders_page').remove();
	});
}