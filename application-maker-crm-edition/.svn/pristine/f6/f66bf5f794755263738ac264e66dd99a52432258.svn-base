
/* JS EXTENSION
 * setAlertPanel.js
 */


jQuery(document).ready(function(){
    flg_apm.setAlertPanel.initClicks();
});


flg_apm.setAlertPanel=new flg_apm.setUIObject('setAlertPanel','');



flg_apm.setAlertPanel.alerts=[];
flg_apm.setAlertPanel.init=function(){


    }

var posAlertY;
var posAlertYBase=30;
var posAlertNb=0;
var oriAlertHideDelay=7000;
var oriAlertIsAnim=false;
var oriAlertTimeOut;
flg_apm.setAlertPanel.addDisplay=function(){
    posAlertY=posAlertYBase;
    $.each(flg_apm.setAlertPanel.alerts,function(i,al){
        if(al.status=='new'){
            posAlertNb++;
            flg_apm.setAlertPanel.alerts[i].nb=posAlertNb;
            flg_apm.setAlertPanel.alerts[i].timest=new Date().getTime();
            // console.log('add posAlertNb ' +posAlertNb);
            str=my_extensions_views['setAlertPanel'].tpl;
            str=str.replace(/{{title}}/g,al.title);
            str=str.replace(/{{type}}/g,al.type);
            str=str.replace(/{{txt}}/g,al.txt);
            str=str.replace(/{{nb}}/g,posAlertNb);
            $('body').append(str);
            flg_apm.setAlertPanel.alerts[i].status='shown';
            pan=$('#AlertPanel'+posAlertNb);
            $(pan).css('opacity','0');
            $(pan).css('top',(posAlertY-40)+'px');
            oriAlertIsAnim=true;
            $(pan).animate({
                top:posAlertY+'px',
                opacity:'1'
            },500, function() {
                oriAlertIsAnim=false;
            });

        }else{
            pan=$('#AlertPanel'+flg_apm.setAlertPanel.alerts[i].nb);
        }
        flg_apm.setAlertPanel.alerts[i].height=$(pan).height()+10;
        posAlertY+=$(pan).height()+10;
    })
    flg_apm.setAlertPanel.initClicks();
    if(flg_apm.setAlertPanel.alerts.length==1){
        flg_apm.setAlertPanel.loopCheckRemove();
    }
}

flg_apm.setAlertPanel.loopCheckRemove=function(){
    oriAlertTimeOut=setTimeout(function(){
        if(flg_apm.setAlertPanel.alerts.length>0){
            //console.log(' loopCheckRemove ' +flg_apm.setAlertPanel.alerts.length);
            var timest=new Date().getTime();
            $.each(flg_apm.setAlertPanel.alerts,function(i,al){
                if(timest-al.timest>al.hideDelay){
                    // console.log(' need clear ' +al.nb);
                    var p=$('#AlertPanel'+al.nb);
                    flg_apm.setAlertPanel.removeAlert(p);
                }
            });
            flg_apm.setAlertPanel.loopCheckRemove();
        };
    },1000);

}
flg_apm.setAlertPanel.addAlert=function(title,txt,type,hideDelay){

    }
flg_apm.setAlertPanel.addAlertBase=function(title,txt,type,hideDelay){
    if(hideDelay==undefined || hideDelay==0){
        hideDelay=oriAlertHideDelay;
    }
    flg_apm.setAlertPanel.alerts.push({
        title:title,
        txt:txt,
        type:type,
        status:'new',
        hideDelay:hideDelay
    });
    flg_apm.setAlertPanel.addDisplay();
}
flg_apm.setAlertPanel.addAlert=function(title,txt,type,hideDelay){
    if(hideDelay==undefined || hideDelay==0){
        hideDelay=oriAlertHideDelay;
    }
    posAlertYBase = $(window).scrollTop() + 30
    flg_apm.setAlertPanel.addAlertBase(title,txt,type,hideDelay);
}

flg_apm.setAlertPanel.addAlert_posAlertYBase=function(title,txt,type,hideDelay,new_posAlertYBase){
    if(hideDelay==undefined || hideDelay==0){
        hideDelay=oriAlertHideDelay;
    }
    posAlertYBase = new_posAlertYBase
    flg_apm.setAlertPanel.addAlertBase(title,txt,type,hideDelay);
}

flg_apm.setAlertPanel.removeAlert=function(p){
    var locnb=Number($(p).attr('data-nb'));
    $(p).fadeOut(200,function(){
        $(p).remove();
    });
    var arr=[];
    $.each(flg_apm.setAlertPanel.alerts,function(i,al){
        if(al.nb!==locnb){
            arr.push(al);
        }
    });
    flg_apm.setAlertPanel.alerts=arr;
    //console.log('alerts.length ' +flg_apm.setAlertPanel.alerts.length);
    if(flg_apm.setAlertPanel.alerts.length>0){
        posAlertY=posAlertYBase;
        $.each(flg_apm.setAlertPanel.alerts,function(i,al){
            //console.log('al.nb ' +al.nb);
            pan=$('#AlertPanel'+al.nb);
            $(pan).animate({
                top:posAlertY+'px'
            },500, function() {
                });
            posAlertY+=flg_apm.setAlertPanel.alerts[i].height;
        });
    }
}
flg_apm.setAlertPanel.initClicks=function(){
    $('.doCloseAlert').off('click').on('click',function(){
        if(oriAlertIsAnim==false){
            var p=$(this).parents('.AlertPanel');
            flg_apm.setAlertPanel.removeAlert(p);
        }
    });
}