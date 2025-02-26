/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/
wb3d_setupdata.typewriter=function(obm){
      obm.typewriter_run=[];
      obm.typewriter_index=0;
      obm.typewriter_num=0;
      obm.createobj.typewriter=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var ext2='<div  id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'overflow:hidden;">'+ext2;
            var style1='style="overflow:hidden;height:auto;width:auto;'+p+'"';
            var tags1=wb3d_set_tag(B,y);
            var tag1=tags1.tag1;
            var tag2=tags1.tag2;
            txt+='<'+tag1+' id="wb3de-'+idm+'" '+style1+'>'+B["text_"+y]+'</'+tag2+'>';
            txt+='</div>';
            txt+='</div>';
            document.getElementById(tmpdivid).insertAdjacentHTML('beforeend',txt);
            obm.bk_create_layer[l]=-1;
            wb3d_reset_obj_xy3(l);
      };

      obm.addon.wb3d_typewriter_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){

            if(obm.time%(10-B['sp_'+md])===0){

                  if(level===0){
                        ids=wslide;
                  }
                  else{
                        ids=w0+'-'+yy_0+'-'+md0+'-'+wslide+'-'+yy;
                  }


                  if(obm.typewriter_index<obm.typewriter_data[obm.typewriter_num].length&&obm.typewriter_flag!=1){
                        obm.typewriter_index++;
                        if(B['ltr'+md]=="Ltr")
                              obm.ide[id1].innerHTML =obm.typewriter_data[obm.typewriter_num].slice(0, obm.typewriter_index)+'<span class="wb3d_typewriter">|</span>';
                        else
                              obm.ide[id1].innerHTML ='<span class="wb3d_typewriter">|</span>'+obm.typewriter_data[obm.typewriter_num].slice(0, obm.typewriter_index);
                        obm.bk_change_sizew[id1]=-1;
                        obm.bk_change_sizeh[id1]=-1;
                        wb3d_set_width_height(obm,B,sn,id_l,id1,'layer',wslide,yy,md,eff,frm,ids,idg,level,cu);
                        wb3d_set_top_left(obm,B,sn,id_l,id1,'layer',wslide,yy,md,ids,level,cu,'0_'+idg,0)
                  }

                  else if(obm.typewriter_index>=obm.typewriter_data[obm.typewriter_num].length+B['delay_'+md]||obm.typewriter_flag===1){
                        obm.typewriter_flag=1;

                        if(obm.typewriter_index<=obm.typewriter_data[obm.typewriter_num].length){
                        obm.bk_change_sizew[id1]=-1;
                        obm.bk_change_sizeh[id1]=-1;
                        if(B['ltr'+md]=="Ltr")
                              obm.ide[id1].innerHTML =obm.typewriter_data[obm.typewriter_num].slice(0, obm.typewriter_index)+'<span class="wb3d_typewriter">|</span>';
                        else
                              obm.ide[id1].innerHTML ='<span class="wb3d_typewriter">|</span>'+obm.typewriter_data[obm.typewriter_num].slice(0, obm.typewriter_index);
                        wb3d_set_width_height(obm,B,sn,id_l,id1,'layer',wslide,yy,md,eff,frm,ids,idg,level,cu);
                        wb3d_set_top_left(obm,B,sn,id_l,id1,'layer',wslide,yy,md,ids,level,cu,'0_'+idg,0)
                        }

                        obm.typewriter_index--;
                        if(obm.typewriter_index===0){
                              obm.typewriter_flag=0;
                              obm.typewriter_num++;
                              if(obm.typewriter_num>=obm.typewriter_data.length){
                                    obm.typewriter_num=0;
                              }
                        }

                  }
                  else{
                        obm.typewriter_index++;
                  }

            }
      };


      obm.setupobj.typewriter=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=2;
            obm.newsize[idm]=2;
            obm.typewriter_data=B['text_'+y].split(',');
            obm.show_obj[idm]=3;
            obm.typewriter_run[idm]=-1;
            wb3d_events('wb3dg-'+idm,obm);
      };
};