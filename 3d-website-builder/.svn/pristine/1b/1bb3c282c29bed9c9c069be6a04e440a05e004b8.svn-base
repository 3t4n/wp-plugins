/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/

//Create Slide Button

function wb3d_create_slide_button(wslide,obm){
	var sn=obm.sn['0-0'];
	var cl='#24a97e';
	var j,tmp1;
	var RL="left";
	if(wb3d.rtl==1)
		RL="right";
	var text='<div id="demoslide-'+wslide+'" class="ui-state-default" style="border:0px solid red; background-color:transparent;z-index:999; height:80px;width:110px; position: relative;margin:10px 2px 5px 2px;">';
	text+='<div id="demo0-'+wslide+'" class="slide_c pointer imgbuttom" style="z-index:996;background-image:url('+wb3d.wb3d_plagin_images_URL+'desktop.png);background-size:100% 100%;width:106px;height: 76px;position: absolute;top:3px;'+RL+':3px">';
	text+='</div>';
	text+='<div id="demo1-'+wslide+'" class="slide_c pointer imgbuttom" style="z-index:998; background-image:url('+wb3d.wb3d_plagin_images_URL+'htablet.png);background-size:100% 100%;width:60px;height: 45px;position: absolute;top:40px;'+RL+':62px">';
	text+='</div>';
	text+='<div id="demo2-'+wslide+'" class="slide_c pointer imgbuttom" style="z-index:999; background-image:url('+wb3d.wb3d_plagin_images_URL+'vtablet.png);background-size:100% 100%;width:48px;height: 53px;position: absolute;top:31px;'+RL+':23px">';
	text+='</div>';
	text+='<div id="demo3-'+wslide+'" class="slide_c pointer imgbuttom" style="z-index:1000;background-image:url('+wb3d.wb3d_plagin_images_URL+'mobile.png);background-size:100% 100%;width:19px;height: 38px;position: absolute;top:43px;'+RL+':10px">';
	text+='</div>';
	if(Number(wslide)%2===0){
		cl='#2c86f7';
	}
		
	text+='<div id="demodelete-'+wslide+'" title="remove slide" class="pointer imgbuttom" style="z-index:99999999;background-image:url('+wb3d.wb3d_plagin_images_URL+'close4.png);background-size:100% 100%;width:16px;height: 16px;position: absolute;top:-2px;left:-2px;border-radius:50%;"></div>';
	text+='<div id="demo_duplicate-'+wslide+'" title="duplicate" class="pointer imgbuttom" style="z-index:99999999; background-image:url('+wb3d.wb3d_plagin_images_URL+'copy.jpg);background-size:100% 100%;width:18px;height: 18px;position: absolute;top:-1px;right:-1px;border-radius:50%;"></div>';
	text+='<div style="z-index: 1000;display: inline-block;position: absolute;top: -13px;'+RL+': 50px;font-size: 18px;background-color:'+cl+';border-radius: 50%;padding: 3px">'+wslide+'</div></div>';
	jQuery('#divtitleslide2').append(text); 
	jQuery('#divtitleslide2'  ).sortable({
		connectWith: '.ui-state-default',
		update: function (event, ui) {
			var F=obm.dataslide[sn];
			for(j=0;j<obm.slidnum[sn];j++){
				tmp1=JSON.stringify(F[j]);
				F['A'+j]=JSON.parse(tmp1);
			}
			var sortedIDs = jQuery('#divtitleslide2 .ui-state-default').map(function(i) {
				return  this.id;
			}).get();
			var x;
			var slide=[];
			var loc=[];
			for(j=0;j<obm.slidnum[sn];j++){
				x=sortedIDs[j].split('-')[1];
				slide[sn+'-'+j]=x;
				loc[sn+'-'+x]=j;
			}
			for(j=0;j<obm.slidnum[sn];j++){
				tmp1=JSON.stringify(F['A'+obm.los[sn+'-'+slide[sn+'-'+j]]]);
				F[j]=JSON.parse(tmp1);
			}
			for(j=0;j<obm.slidnum[sn];j++){
				x=sortedIDs[j].split('-')[1];
				obm.slide_of_location[sn+'-'+j]=x;
				obm.los[sn+'-'+x]=j;
				obm.dataslide[sn][ j ][0].slide_of_location=x;
				obm.dataslide[sn][j][0]['los_'+x] =j;
			}
		}
	});


	var tmp = jQuery('#divtitleslide2 .ui-state-default').map(function(i) { 
		return  this.id; 
	}).get();
	for(var i=0;i<tmp.length;i++){
		obm.slide_of_location[sn+'-'+i]=tmp[i].split('-')[1];
	}
	jQuery('#demo0-'+wslide).click(function(){wb3d_clickdemoslide(this);});
	jQuery('#demo1-'+wslide).click(function(){wb3d_clickdemoslide(this);});
	jQuery('#demo2-'+wslide).click(function(){wb3d_clickdemoslide(this);});
	jQuery('#demo3-'+wslide).click(function(){wb3d_clickdemoslide(this);});
	jQuery('#demodelete-'+wslide).click(function(){wb3d_clickdemodelete(this);});
	jQuery('#demo_duplicate-'+wslide).click(function(){wb3d_click_demo_duplicate(this);});

}



// Create Panel for Layers

function wb3d_create_layer_panel(sn,wslide,st,L,obm) {
	var text ='';
	var RL="left";
	if(wb3d.rtl==1)
		RL="right";
		var w ,t,j;
	if(st==='0'){

		text +='<li  id="li-'+wslide+"-"+st+'"  style="list-style-type: none;position:relative;width:160px;">';
		text +='<div style=" float: '+RL+';position:absolute;top:0px;'+RL+':0px;height:33px;  ">';
	}
	else{
	text +='<li   id="li-'+wslide+"-"+st+'"  class="ves_li ui-state-default" style="position:relative; background-color:#eee;width:160px;border:1px solid black;border-radius:3px" >';
		text +='<div style=" top:0px;'+RL+':0px;height:33px;position:absolute ">';
		text +=' <img class="pointer" style="top:-3px;'+RL+':-6px;width:15px;height:15px;position:absolute;border-radius:50%;" src="'+wb3d.wb3d_plagin_images_URL+'close3.png" id="picclose-'+wslide+"-"+st+'">';
		text +=' <img class="pointer" style="top:19px;'+RL+':-6px;width:14px;height:14px;position:absolute;border-radius:50%;border: 1px solid #000;" src="'+wb3d.wb3d_plagin_images_URL+'copy.jpg" id="copy_layer-'+wslide+"-"+st+'">';
		text +='<div style="float: '+RL+'; font-size: 12px;margin:6px 0 0 0px;text-align: center;width:24px" >'+st+'</div>';
	}
	if(st!='0'){
		text +=' <div class="pointer" id="see-'+wslide+'-'+st+'" style="'+RL+':54px;top:1px;position:absolute;width:15px;height:15px;background-image: url('+wb3d.wb3d_plagin_images_URL+'see.jpg);background-size:100% 100%;border-radius:50%">';
		text +='</div>';
		text +=' <div class="pointer" id="lock-'+wslide+'-'+st+'" style="'+RL+':54px;top:17px;position:absolute;width:15px;height:15px;background-image: url('+wb3d.wb3d_plagin_images_URL+'unlock.png);background-size:100% 100%;">';
		text +='</div>';
		text +=' <div style="float: '+RL+';width:70px;height:25px; font-size: 12px;margin:2px 0 0 -1px;">';
		text +='<input type="text" id="lable-'+wslide+"-"+st+'" style="position:absolute;'+RL+':72px;top:2px;width:120px;height:28px;font-size:12px;background-color:#ccc">';
		text +='</div>';
	}
	text +='</div></div></div>'; 
	text +='</li>';
	if(st==='0'){
		var txtt='<ul id="sortable'+wslide+'" class=" sortable1" style="width:170px;position:relative;height:auto;top:-15px"></ul>';
		jQuery('#sortlist-slide-option-'+wslide).append(txtt);
	}

	jQuery('#sortable'+wslide).append(text);


	jQuery('#lable-'+wslide+'-'+st).val(obm.layerstext[wslide+'-'+st]);
	jQuery('#lable-'+wslide+'-'+st).keyup(function(){
		var id=this.id.split('-');
		obm.layerstext[id[1]+'-'+id[2]]=jQuery('#lable-'+id[1]+'-'+id[2]).val();
	});

	if(obm.U_P[sn+'-'+wslide+'-'+st]!=0&&st!='0') {
		var x=1;
		w=obm.U_P[sn+'-'+wslide+'-'+st].split('-')[0];
		var loc=obm.lo_l[sn+'-'+wslide+'-'+st];
		for(var c=loc-1;c>0;c--){
			var l=obm.la_l[sn+'-'+wslide+'-'+c];
			if(obm.U_P[sn+'-'+wslide+'-'+l]===0){
				break;
			}
			else if(l===w){
				x++;
				w=obm.U_P[sn+'-'+wslide+'-'+l].split('-')[0];
			}
			else{

			}
		}
		jQuery('#li-'+wslide+'-'+st).css('margin-'+RL+'',(x*15)+'px'); 
		jQuery('#copy_layer-'+wslide+'-'+st).css('display','none'); 
		jQuery('#picclose-'+wslide+'-'+st).css('display','none');
	}

	wb3d_click_layer_panel(wslide,st,obm);

	jQuery(  '#sortable'+wslide  ).sortable({
		items: 'li:not(.unsortable)'
	});

	jQuery( '#sortable'+wslide ).disableSelection();
	if(st==='0'){
		jQuery( '#sortable'+wslide ).sortable({

			start:function(event,ui){
			},
			change: function( event, ui ) {
				obm.changepanel=1;
			},
			stop: function( event, ui ) {
				if(obm.changepanel!=1){
					obm.changepanel=0;
					return;
				}
				var id=this.id.split('sortable')[1];
				var flag=0;
				var sortedIDs,tmp1,x,i;

				if(obm.li_MouseDown===-1){
					return;
				}
				var l=obm.li_MouseDown.split('-')[1];

				if(obm.U_P[sn+'-'+obm.li_MouseDown]!=0){
					flag=1;
				}
				else{
					for(j=1;j<obm.layers[sn+'-'+id];j++){
						t=obm.la_l[sn+'-'+id+'-'+j];
						if(obm.U_P[sn+'-'+id+'-'+t]!=0)
							if(l===obm.U_P[sn+'-'+id+'-'+t].split('-')[0]){
								flag=1;
								break;
							}
					}
				}

				sortedIDs = jQuery('#'+this.id ).sortable('toArray', {attribute: 'id'});

				if(obm.U_P[sn+'-'+id+'-'+l]!=0){
					flag=1;
				}

				if(flag!=1){
					for(var p=1;p<obm.layers[sn+'-'+id];p++){
						t=obm.la_l[sn+'-'+id+'-'+p];
						if(obm.U_P[sn+'-'+id+'-'+t]!=0){
							for(j=1;j<obm.layers[sn+'-'+id];j++){
								x=sortedIDs[j].split('-')[2];
								if(x===t){
									var n=obm.lo_l[sn+'-'+id+'-'+(obm.U_P[sn+'-'+id+'-'+t].split('-')[0])];
									var n2=obm.U_P[sn+'-'+id+'-'+t].split('-')[0];
									for(var h=1;h<obm.layers[sn+'-'+id];h++){
										var y=sortedIDs[h].split('-')[2];
										if(y===n2)
											break;
									}
									if((p-n)!=j-h){
										flag=1;
										break;
									}
								}
							}
							if(flag===1)
								break;
						}
					}
				}

				if(flag>=1){
					jQuery('#sortable'+wslide).empty();
					jQuery('#sortable'+wslide).remove();
					for( i=0;i<obm.layers[sn+'-'+wslide];i++){
						wb3d_create_layer_panel(sn,wslide,obm.la_l[sn+'-'+wslide+'-'+i],i,obm);
					}
					return;
				}
				var F=obm.dataslide[sn][ obm.los[sn+'-'+id] ];
				for(j=1;j<obm.layers[sn+'-'+id];j++){
					tmp1=JSON.stringify(F[j]);
					F['A'+j]=JSON.parse(tmp1);
				}

				sortedIDs = jQuery('#'+this.id ).sortable('toArray', {attribute: 'id'});
				
				var layer=[];
				var loc=[];
				for(j=0;j<obm.layers[sn+'-'+id];j++){
					x=sortedIDs[j].split('-')[2];
					layer[sn+'-'+id+'-'+j]=x;
					loc[sn+'-'+id+'-'+x]=j;
				}
				for(j=1;j<obm.layers[sn+'-'+id];j++){
					tmp1=JSON.stringify(F['A'+obm.lo_l[sn+'-'+id+'-'+layer[sn+'-'+id+'-'+j]]]);
					F[j]=JSON.parse(tmp1);
				}
				for(j=0;j<obm.layers[sn+'-'+id];j++){
					x=sortedIDs[j].split('-')[2];
					obm.la_l[sn+'-'+id+'-'+j]=x;
					obm.lo_l[sn+'-'+id+'-'+x]=Number(j);
					F[j].loc=j;
				}
				obm.li_MouseDown=-1;
			}
		});
	}

	var B=obm.dataslide[sn][obm.los[sn+'-'+wslide]][L];
	if(B.show===1||B.show===undefined){
		jQuery('#see-'+wslide+'-'+st).css('background-image','url('+wb3d.wb3d_plagin_images_URL+'/see.jpg)');
	}
	else{
		jQuery('#see-'+wslide+'-'+st).css('background-image','url('+wb3d.wb3d_plagin_images_URL+'/nosee.jpg)');
	}

	if(B.lock===1||B.lock===undefined){
		jQuery('#lock-'+wslide+'-'+st).css('background-image','url('+wb3d.wb3d_plagin_images_URL+'/lock.png)');
	}
	else{
		jQuery('#lock-'+wslide+'-'+st).css('background-image','url('+wb3d.wb3d_plagin_images_URL+'/unlock.png)');
	}
}//wb3d_create_layer_panel


//Move mouse On Layer Panel
function wb3d_onMove_li(event,obm){
	var sn=obm.sn['0-0'];
	if(obm.li_MouseDown!=-1){
		obm.es1_changeX[obm.li_MouseDown]=event.clientX-obm.es1_firstPointX;
		console.log(obm.es1_changeX[obm.li_MouseDown]+'___'+obm.U_P[sn+'-'+obm.li_MouseDown]+'___'+wb3d.rtl)
		if(obm.es1_changeX[obm.li_MouseDown]<-20&&obm.U_P[sn+'-'+obm.li_MouseDown]!=0&&wb3d.rtl!=1){
			var id=obm.wb3d_id['0_'+obm.activeslide[obm.cu]+'-'+obm.U_P[sn+'-'+obm.li_MouseDown]];
			if(Number(obm.panelLock[id])==1){
				obm.li_MouseDown=-1;
				return;
			}
			else{
				unset_panel_obj(obm.li_MouseDown,obm);
			}
		}
		else if(obm.es1_changeX[obm.li_MouseDown]>20&&obm.U_P[sn+'-'+obm.li_MouseDown]!=0&&wb3d.rtl==1){
			var id=obm.wb3d_id['0_'+obm.activeslide[obm.cu]+'-'+obm.U_P[sn+'-'+obm.li_MouseDown]];
			if(Number(obm.panelLock[id])==1){
				obm.li_MouseDown=-1;
				return;
			}
			else{
				unset_panel_obj(obm.li_MouseDown,obm);
			}
		}
	}
}


// Unset Layer Panel
function unset_panel_obj(id,obm){
	var x=id.split('-');
	var sn=obm.sn['0-0'];
	var wslide=x[0];
	var ex=x[1];
	var y,tmp1,i;
	jQuery('#sortable'+wslide).empty();
	jQuery('#sortable'+wslide).remove();
	var j=obm.lo_l[sn+'-'+wslide+'-'+ex];
	var F=obm.dataslide[sn][ obm.los[sn+'-'+wslide] ];
	obm.U_P[sn+'-'+wslide+'-'+ex]=0;
	F[j].U_P=0;
	F[j].l_type=0;
	for(var h=0;h<4;h++){
		F[j]['PX_'+h]=80+j*5;
		F[j]['PY_'+h]=80+j*5;
	}
	var tmpdivid='#wb3dh-'+obm.wb3d_id['0_'+obm.activeslide[obm.cu]];
	for(var r=0;r<F[j].layer_obj;r++){
		var t= F[j]['obj_num_'+r];
		jQuery('#wb3dg-'+obm.wb3d_id['0_'+wslide+'-'+ex+'-'+t]).detach().appendTo(tmpdivid);
		wb3d_set_bk(obm.wb3d_id['0_'+wslide+'-'+ex+'-'+t],obm,ex);
            var T=F[j][ 'type_obj-'+t];
            if(obm.addon['wb3d_'+T+'_dropout']!=undefined){
                  obm.addon['wb3d_'+T+'_dropout'](F[j],obm.wb3d_id['0_'+wslide+'-'+ex+'-'+t],t,tmpdivid);
            }
	}
	jQuery('#li-'+wslide+'-'+ex).css('margin-left','0px');
	j++;
	var  next=j-1;
	for(y=j;y<=obm.layers[sn+'-'+wslide]-1;y++){
		var st=obm.la_l[sn+'-'+wslide+'-'+y];
		if(obm.U_P[sn+'-'+wslide+'-'+st]===0) {
			next=y;
			break;
		}
		else if(obm.U_P[sn+'-'+wslide+'-'+st]!=0) {
			var w=obm.U_P[sn+'-'+wslide+'-'+st].split('-')[0];
			for(var c=1;c<j-1;c++){
				var l=obm.la_l[sn+'-'+wslide+'-'+c];
				if(l===w){
					next=y;
					break;
				}
			}
			if(next>j-1){
				break;
			}
		}
	}
	if(next===j-1){

	}
	else{
		for(y=j-1;y<=next-1;y++){
			tmp1=JSON.stringify(F[y]);
			F['A'+y]=JSON.parse(tmp1);
		}
		var num=next-(j-1);
		for(y=next;y<=obm.layers[sn+'-'+wslide]-1;y++){
			tmp1=JSON.stringify(F[y]);
			F[y-(num)]=JSON.parse(tmp1);
			F[(y-(num)) ].loc=(y-(num));
			obm.la_l[sn+'-'+wslide+'-'+(y-(num))]=F[(y-(num)) ].ind;
			obm.lo_l[sn+'-'+wslide+'-'+obm.la_l[sn+'-'+wslide+'-'+(y-(num))]]=(y-(num));       
		}

		num=obm.layers[sn+'-'+wslide]-1-next+1;
		for(y=j-1;y<=next-1;y++){
			tmp1=JSON.stringify(F['A'+y]);
			F[y+num]=JSON.parse(tmp1);
			delete F['A'+y];
			F[(y+num) ].loc=(y+num);
			obm.la_l[sn+'-'+wslide+'-'+(y+num)]=F[(y+num) ].ind;
			obm.lo_l[sn+'-'+wslide+'-'+obm.la_l[sn+'-'+wslide+'-'+(y+num)]]=(y+num);
		}
	}

	for( i=0;i<obm.layers[sn+'-'+wslide];i++){
		wb3d_create_layer_panel(sn,wslide,obm.la_l[sn+'-'+wslide+'-'+i],i,obm);
      }
	wb3d_set_slide_value(wslide,'',obm);
	obm.putimagecanvas();
	obm.li_MouseDown=-1;
}//end function


//Copy Layer
function  wb3d_copy_layer(s,l,j,w,obm){
	w=(w);
	var sn=obm.sn['0-0'];
	var tmpdivid;
	var id1=obm.dataslide[sn][ obm.los[sn+'-'+s] ][obm.lo_l[sn+'-'+s+'-'+l]];
	obm.dataslide[sn][ obm.los[sn+'-'+s] ][obm.layers[sn+'-'+s]]={};
	obm.dataslide[sn][ obm.los[sn+'-'+s] ][obm.layers[sn+'-'+s]]=JSON.parse(JSON.stringify(id1));
	obm.lo_l[sn+'-'+s+'-'+j]=obm.layers[sn+'-'+s];
	obm.la_l[sn+'-'+s+'-'+obm.layers[sn+'-'+s]]=j;
	var K=obm.dataslide[sn][obm.los[sn+'-'+s]   ][obm.layers[sn+'-'+s]];
	K.ind=j;
	K.loc=obm.layers[sn+'-'+s];
	obm.bk_create_layer['0_'+obm.activeslide[obm.cu]+'-'+j]=-1;
	obm.framenum['0_'+obm.activeslide[obm.cu]+'-'+j]=0;
	obm.U_P[sn+'-'+obm.activeslide[obm.cu]+'-'+j]=w;
	obm.dataslide[sn][ obm.los[sn+'-'+s] ][obm.layers[sn+'-'+s]].U_P=obm.U_P[sn+'-'+obm.activeslide[obm.cu]+'-'+j];
	obm.layers[sn+'-'+s]++;
	wb3d_createlayer(0,obm.activeslide[obm.cu],(obm.layers[sn+'-'+obm.activeslide[obm.cu]]-1),obm.dataslide[sn][obm.los[sn+'-'+obm.activeslide[obm.cu]]   ],'new',100,0,sn,0,0,0,obm); 
	K=obm.dataslide[sn][obm.los[sn+'-'+s]][obm.lo_l[sn+'-'+s+'-'+j]];

	for(var r=0;r<K.layer_obj;r++){
		if(w===0){
			tmpdivid='#wb3dh-'+obm.wb3d_id['0_'+s];
		}
		else{
			tmpdivid='#wb3de-'+obm.wb3d_id['0_'+s+'-'+w];
		}
		var idm=wb3d_create_id('0_'+s+'-'+j+'-'+K['obj_num_'+r],obm);
		obm.createobj[K[ 'type_obj-'+K['obj_num_'+r]]](obm.sn['0-0'],idm,K,tmpdivid,obm,K['obj_num_'+r],0,j,obm.activeslide[obm.cu],0,0);
	}
	wb3d_scroll_tab_leftmenu('div_layers_menu',obm);
}