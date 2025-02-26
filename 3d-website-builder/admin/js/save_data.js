/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/

String.prototype.wb3d_htmlEncode2 = function () {
	return String(this)
	.replace(/</g, "$k180")
	.replace(/>/g, "$k181");
};
// Save All Data In DB
function wb3d_Save_All_Data(obm,refresh){

	var sn=obm.sn['0-0'];
	var layerstext={};
	obm.type_wb3d = [];
	var open_addons=[];

      var i,F,t,j,effect_color2,ih,z;

	jQuery('#save_all img').attr('src',wb3d.wb3d_plagin_images_URL+'1.gif');
	var ztmp=[];
	ztmp[0]={};
	obm.another_slider=[];
	obm.another_obj_num=0;
	var A=obm.setting[sn];
	var effect_name_=[];

	ztmp[0].num=obm.slidnum[sn];
	if(obm.slidnum[sn]===undefined||obm.slidnum[sn]<1){
		alert(jQuery('#alert_Error620').text());
		return;
	}

	for(t=0;t<obm.number_effect_compile[sn];t++){
		var eff_t=obm.effect_of_location[sn+'-'+t];
		effect_name_[t*2]=eff_t;
		effect_name_[t*2+1]=obm.name_effect[sn+'-'+eff_t];
	}

	var css1 =jQuery('#wb3d_classtext').val();
	css1=css1.wb3d_htmlEncode2();
	css1 = JSON.stringify(css1);

	var html1 ="";
	html1 = JSON.stringify(html1);

	ztmp[0].r1=A.r1;
	ztmp[0].g1=A.g1;
	ztmp[0].b1=A.b1;
	ztmp[0].a1=A.a1;

	ztmp[0].r2=A.r2;
	ztmp[0].g2=A.g2;
	ztmp[0].b2=A.b2;
	ztmp[0].a2=A.a2;

	ztmp[0].r3=A.r3;
	ztmp[0].g3=A.g3;
	ztmp[0].b3=A.b3;
	ztmp[0].a3=A.a3;

	ztmp[0].rbl1=A.rbl1;
	ztmp[0].gbl1=A.gbl1;
	ztmp[0].bbl1=A.bbl1;
	ztmp[0].abl1=A.abl1;


	ztmp[0].rbl2=A.rbl2;
	ztmp[0].gbl2=A.gbl2;
	ztmp[0].bbl2=A.bbl2;
	ztmp[0].abl2=A.abl2;

	ztmp[0].blo=A.blo;


	ztmp[0].wheel=Number(jQuery('#wheel').val());
	ztmp[0].wheel_s=Number(jQuery('#wheel_speed').val());
	ztmp[0]['vmaxsc-0']=A['vmaxsc-0'];
	ztmp[0]['vmaxsc-1']=A['vmaxsc-1'];
	ztmp[0]['vmaxsc-2']=A['vmaxsc-2'];
	ztmp[0]['vmaxsc-3']=A['vmaxsc-3'];

	

	for(i=0;i<10;i++){
		ztmp[0]['c'+i]=A['c'+i];
      }


      // wb3d_Scroll
	if(jQuery('#display_scroll').is(':checked')){
		ztmp[0].scroll=1;
      }
	else{
            ztmp[0].scroll=0;
      }
		

	if(jQuery('#wheel_checkbox').is(':checked')){
		ztmp[0].wheel_c=1;
      }
	else{
		ztmp[0].wheel_c=0;
      }



	ztmp[0].w_0=Number(jQuery('#width_0_spiner').val());
	ztmp[0].w_1=Number(jQuery('#width_1_spiner').val());
	ztmp[0].w_2=Number(jQuery('#width_2_spiner').val());
	ztmp[0].w_3=Number(jQuery('#width_3_spiner').val());

	ztmp[0].h_0=Number(jQuery('#height_0_spiner').val());
	ztmp[0].h_1=Number(jQuery('#height_1_spiner').val());
	ztmp[0].h_2=Number(jQuery('#height_2_spiner').val());
	ztmp[0].h_3=Number(jQuery('#height_3_spiner').val());
      ztmp[0].colortype=Number(jQuery('#colortype').val());
	ztmp[0].touch=Number(jQuery('#touch').val());
      ztmp[0].fullwidth=Number(jQuery('#fullwidth').val());

	if((Number(jQuery('#reset_scroll').val()))===0){
		ztmp[0].reset=50;
	}
	else{
		ztmp[0].reset=Number(jQuery('#reset_scroll').val());
	}

	if((Number(jQuery('#reset_scroll2').val()))===0){
		ztmp[0].reset2=50;
	}
	else{
		ztmp[0].reset2=Number(jQuery('#reset_scroll2').val());
	}

	ztmp[0].maxColorTable=Number(jQuery('#colortable_to').val());


	var newsetting=ztmp[0];
	ztmp=[];
	var u=obm.slide_of_location[sn+'-'+0];
	var b=-1;

	for(z=0;z<obm.slidnum[sn];z++){
		u=obm.slide_of_location[sn+'-'+z];
		ztmp[z]=[];
		for(i=0;i<=obm.layers[sn+'-'+u]-1;i++){
			b++;
			var yy=obm.la_l[sn+'-'+u+'-'+i];
			ztmp[z][i]=[];

			if(yy==='0'){
				ztmp[z][i]={};
				F=obm.dataslide[sn][ z ][0];
				ztmp[z][i].loc=0;
				ztmp[z][i].ind='0';
				ztmp[z][i].layer=obm.layers[sn+'-'+u];
				ztmp[z][i].slide_of_location=u;
                        ztmp[z][i].slide_r=obm.color1[sn+'-'+u];
				ztmp[z][i].cursor=Number(F.cursor);
				for(var bx=0;bx<4;bx++){
					ztmp[z][i]['E_'+bx]=F['E_'+bx];
				}
			}
			else{// yy!=0

   
				layerstext[u+'-'+yy]=jQuery('#lable-'+u+'-'+yy).val();

				ztmp[z][i]={};
				F=obm.dataslide[sn][ z ][i];

				ztmp[z][i].loc=i;
				ztmp[z][i].ind=(yy).toString();

				if(obm.U_P[sn+'-'+u+'-'+yy]===undefined){
					ztmp[z][i].U_P=0;
				}
				else{
					ztmp[z][i].U_P=obm.U_P[sn+'-'+u+'-'+yy];
				}

				ztmp[z][i].show=F.show;
				ztmp[z][i].lock=F.lock;
				ztmp[z][i].click_type=F.click_type;
				ztmp[z][i].click_newpage=F.click_newpage;

				if(F.click_type!=-1){
					ztmp[z][i].click_link=F.click_link;
				}
				ztmp[z][i].l_type=F.l_type;
				ztmp[z][i].act=F.act;
				ztmp[z][i].reset=F.reset;

				if(F.pointer===undefined){
                              ztmp[z][i].pointer=0;
				}
                        else{
                              ztmp[z][i].pointer=Number(F.pointer);
                        }

                        if(F.sizefunc===undefined){
                              ztmp[z][i].sizefunc=0;
                        }
                        else{
                              ztmp[z][i].sizefunc=Number(F.sizefunc);
                        }

                        if(F.overflow===undefined){
                              ztmp[z][i].overflow=1;
                        }
                        else{
                              ztmp[z][i].overflow=Number(F.overflow);
                        }

                        if(F.overflow2===undefined){
                              ztmp[z][i].overflow2=1;
                        }
                        else{
                              ztmp[z][i].overflow2=Number(F.overflow2);
                        }

                        if(F.selectable===undefined){
                              ztmp[z][i].selectable=0;
                        }
                        else{
                              ztmp[z][i].selectable=Number(F.selectable);
                        }

				if((F.l_type>=9&&F.l_type<=11)||F.l_type==13){
					ztmp[z][i].tab=Number(F.tab);
                        }
				ztmp[z][i].pers=F.pers;


				for(var f5=0;f5<4;f5++){

					ztmp[z][i]['P_s'+f5]=Number(F['P_s'+f5]);
					ztmp[z][i]['repeat'+f5]=Number(F['repeat'+f5]);
					ztmp[z][i]['slow'+f5]=Number(F['slow'+f5]);
					ztmp[z][i]['T_E'+f5]=Number(F['T_E'+f5]);

					//position
					ztmp[z][i]['PX_'+f5]=parseInt(F['PX_'+f5]);
					ztmp[z][i]['PY_'+f5]=parseInt(F['PY_'+f5]);

					//Status
					ztmp[z][i]['S_'+f5]=Number(F['S_'+f5]);

					//parallex
					ztmp[z][i]['P_'+f5]=F['P_'+f5];
					ztmp[z][i]['Pt_'+f5]=F['Pt_'+f5];
					ztmp[z][i]['Pp_'+f5]=F['Pp_'+f5];
					ztmp[z][i]['P1_'+f5]=F['P1_'+f5];
					ztmp[z][i]['P2_'+f5]=F['P2_'+f5];

					ztmp[z][i]['Ps1_'+f5]=F['Ps1_'+f5];
					ztmp[z][i]['Ps2_'+f5]=F['Ps2_'+f5];
					ztmp[z][i]['A_l'+f5]=Number(F['A_l'+f5]);
					ztmp[z][i]['A_t'+f5]=Number(F['A_t'+f5]);
					ztmp[z][i]['WO'+f5]=F['WO'+f5];
					ztmp[z][i]['HO'+f5]=F['HO'+f5];
					ztmp[z][i]['hide_'+f5]=F['hide_'+f5];
					ztmp[z][i]['noxy'+f5]=Number(F['noxy'+f5]);
					ztmp[z][i]['B_'+f5]=F['B_'+f5];
                              if(F['B_'+f5]>300){
                                    ztmp[z][i]['B_'+f5]=0; 
                              }
					ztmp[z][i]['C_'+f5]=F['C_'+f5];
					ztmp[z][i]['E_'+f5]=F['E_'+f5];
                              if(F['E_'+f5]>300){
                                    ztmp[z][i]['E_'+f5]=-100; 
                              }
					ztmp[z][i]['F_'+f5]=F['F_'+f5];
					ztmp[z][i]['EA_'+f5]=F['EA_'+f5];	
					ztmp[z][i]['t_x_'+f5]=Number(F['t_x_'+f5]);
					ztmp[z][i]['t_y_'+f5]=Number(F['t_y_'+f5]);    
				}
	      
				ztmp[z][i].layer_obj=F.layer_obj;

				for(var r=0;r<F.layer_obj;r++){
					t= F['obj_num_'+r];
					var T=F[ 'type_obj-'+t];
					var T1=T;
					ztmp[z][i]['obj_num_'+r]=t;
					ztmp[z][i]['type_obj-'+t]=T;
					wb3d_set_array(obm,ztmp,z,i,t,T,T1,F);
				}
			}//layers

			ztmp[z][i].maxtime=obm.slide_time[sn+'-'+u];
		}// slide
	}
	ztmp =JSON.stringify(ztmp);

	if(refresh==='refresh2'){
		ztmp=ztmp.replaceAll(jQuery( '#wb3d_replace1' ).val(), jQuery( '#wb3d_replace2' ).val());
	}
	ztmp=ztmp.wb3d_htmlEncode2();
	var effcts_={};
	effcts_.num=obm.number_effect_compile[sn];
	effcts_.name=[];

      obm.numGetToken2=0; 
      obm.numSendToken2=0; 
     
	for(b=0;b<obm.number_effect_compile[sn];b++){
		effcts_.name[b]=obm.effect_of_location[sn+'-'+b];
		wb3d_save_effect(obm,obm.effect_of_location[sn+'-'+b],0);
		effcts_[obm.effect_of_location[sn+'-'+b]]=obm.data;
	}


	var colorm=[];

	for(j=0;j<=9;j++){
		var color7=[];
		for(i=0;i<obm.max_color[sn+'-'+j];i++){
			color7[i*4+2]=obm.r[sn+'-'+j+'-'+i];
			color7[i*4+1+2]=obm.g[sn+'-'+j+'-'+i];
			color7[i*4+2+2]=obm.b[sn+'-'+j+'-'+i];
			color7[i*4+3+2]=obm.a[sn+'-'+j+'-'+i];
		}
		color7[0]=parseInt(obm.max_color[sn+'-'+j]/256);
		color7[1]=parseInt(obm.max_color[sn+'-'+j]%256);
		colorm[j]=wb3d_toHexString(color7);
	}

	colorm =JSON.stringify(colorm);
	if(obm.number_effect_compile[sn]>0){
		effcts_ =JSON.stringify(effcts_);
	}
	else{
		effcts_='{}';
	}
	var layerstext2 =JSON.stringify(layerstext);
	layerstext2=layerstext2.wb3d_htmlEncode2();

	effect_color2=[];
	var e_color=[];
	var event={};
	for(i=0;i<obm.number_effect_compile[sn];i++){
		var e=obm.effect_of_location[sn+'-'+i];
		j=i*8;
		e_color[j]=obm.effect_color[sn][j];
		e_color[j+1]=obm.effect_color[sn][j+1];
		e_color[j+2]=obm.effect_color[sn][j+2];
		e_color[j+3]=obm.effect_color[sn][j+3];
		e_color[j+4]=obm.effect_color[sn][j+4];
		e_color[j+5]=obm.effect_color[sn][j+5];
		e_color[j+6]=obm.effect_color[sn][j+6];
		e_color[j+7]=obm.effect_color[sn][j+7];
		var objt=obm.gs[sn][e];
		for(var w=1;w<=objt.gettoken_location[0];w++){  
			var v=objt.gettoken_location[w];
			if(objt.gettypetoken[v]===33){
				event[e+'-'+v]=obm.event[sn][e+'-'+v];
			}
		}
	}

	event=JSON.stringify(event);
	if(obm.number_effect_compile[sn]>0){
		effect_color2=wb3d_toHexString(e_color);
		effect_color2 =JSON.stringify(effect_color2);
	}
	else{
		effect_color2='"0f52a1ff932a2aff"';
	}
	obm.another_slider='';
	obm.another_slider=JSON.stringify(obm.another_slider);
	wb3d_obj=JSON.stringify(obm.type_wb3d);
	var index_open=0;


	open_addons[0]="img";
	index_open=0;

      for(var b0=0;b0<obm.slidnum[sn];b0++){
            var s0=obm.slide_of_location[sn+'-'+b0];
            for(var i=1;i<obm.layers[sn+'-'+s0];i++){
                  var ii=obm.la_l[sn+'-'+s0+'-'+i];
                  var F=obm.dataslide[sn][ obm.los[sn+'-'+s0] ][i];
                  for(r=0;r<F.layer_obj;r++){
                        t= F['obj_num_'+r];
				for(ih=0;ih<300;ih++){
					if(open_addons[ih]==undefined&&ih>0){
						index_open++;
						open_addons[index_open]=F[ 'type_obj-'+t];
						break;
					}
					else if(open_addons[ih]==F[ 'type_obj-'+t]){
						break;

					}
				}

                        if(F[ 'type_'+t]==='wb3d'){
                              var sn1=F['slider_'+t];

                              for(var b=0;b<obm.slidnum[sn1];b++){
                                    var s=obm.slide_of_location[sn1+'-'+b];
                                    for(var ib=1;ib<obm.layers[sn1+'-'+s];ib++){
                                          var H=obm.dataslide[sn1][ obm.los[sn1+'-'+s] ][ib];
                                          for(r=0;r<H.layer_obj;r++){
                                                t= H['obj_num_'+r];
								for(is=0;is<300;is++){
									if(open_addons[is]==undefined&&is>0){
										index_open++;
										open_addons[index_open]=H[ 'type_obj-'+t];
										break;
									}
									else if(open_addons[is]==H[ 'type_obj-'+t]){
										break;

									}
								}
                                          }
                                    }
                              }
                        }
                  }
            }
      }

	var flagE=0;

	for(is=1;is<300;is++){
		if(open_addons[is]==undefined){
			break;
		}
		else if(open_addons[is]=="effectservice"){
			flagE=1;
			break;
		}
	}

	if(flagE==0&&obm.flagE==1){
		open_addons[is]="effectservice";
	}
	open_addons.sort();
	open_addons=open_addons.toString();

	var setting2=JSON.stringify(newsetting);
	if(obm.number_effect_compile[sn]>0){
		effect_name_=JSON.stringify(effect_name_);

	}
	else{
		effect_name_='[]';
	}
	effect_name_=effect_name_.wb3d_htmlEncode2();
	var xxx=JSON.stringify(obm.dataslide[sn]);

	// if(wb3d_pro.wb3d_pro_effect<obm.number_effect_compile[sn]){
	// 	alert(jQuery("#alert_many_effects2").text());
	// 	jQuery('#save_all img').attr('src',wb3d.wb3d_plagin_images_URL+'save.svg');
	// 	return;
	// }

	var ajaxurl=wb3d.wb3d_ADMIN_URL+'admin-ajax.php';
	var data = {
		'html':html1,
		'css':css1,
		'layers':ztmp,
		'event':event,
		'effect_color':effect_color2,
		'effect_name':effect_name_,
		'open_addons':open_addons,
		'wb3d_nonce':wb3d.wb3d_nonce,
		'color':colorm,
		'effects':(effcts_),
		'action': 'wb3d_save_data',
		'id_ves':obm.jQuery_GET.id,
		'textv':xxx,
		'setting':setting2,
		'layerstext':layerstext2,
		'wb3d_obj':wb3d_obj,
	};

	jQuery.post(ajaxurl, data, function(response) {
		jQuery('#save_all img').attr('src',wb3d.wb3d_plagin_images_URL+'save.svg');

		// if(wb3d_pro.wb3d_pro_effect<obm.number_effect_compile[sn]){
		// 	alert(jQuery("#alert_many_effects2").text());
		// }

		// if(wb3d_pro.wb3d_pro_act<obm.numGetToken2){
		// 	alert(jQuery("#alert_many_act2").text());
		// }

		// if(wb3d_pro.wb3d_pro_event<obm.numSendToken2){
		// 	alert(jQuery("#alert_many_event2").text());
		// }

		if(refresh==='refresh'||refresh==='refresh2'||refresh==2){
			location.reload();
		}
	});
	return 0;
}



function wb3d_set_array(obm,ztmp,z,i,t,T,T1,F){
	if(F['type_'+t]==='wb3d'&&F['ajax_'+t]!=1&&F['ajax_'+t]!=11){
		var flag_S=0;
		for(var l=0;l<obm.another_obj_num;l++){
			if(obm.type_wb3d[l]===F['slider_'+t]){
				flag_S=1;
			}
		}
		if(flag_S===0){
			obm.another_slider[obm.another_obj_num]=(JSON.stringify(obm.all_slider[ztmp[z][i]['slider_'+t]]));
			obm.type_wb3d[obm.another_obj_num]=F['slider_'+t];
			obm.another_obj_num++;
		}
	}
	if(T.split('_')[1]!=undefined)
            T=T.split('_')[0];
	obm.savedata[T](ztmp,z,i,t,T,F);
}