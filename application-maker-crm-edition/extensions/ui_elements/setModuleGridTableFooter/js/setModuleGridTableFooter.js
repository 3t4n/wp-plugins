
/* JS EXTENSION
 * setModuleGridTableFooter.js
 */


jQuery(document).ready(function(){
    flg_apm.setModuleGridTableFooter.obj=$('#apmdatagrid_new_gridfooter');
    flg_apm.setModuleGridTableFooter.setMainTpl();
    flg_apm.setModuleGridTableFooter.initClicks();
    flg_apm.setModuleGridBody.setHeight();
//alert(flg_apm.setModuleGridTableFooter.tplIsSet);
//$(f).val('');
});


flg_apm.setModuleGridTableFooter=new flg_apm.setUIObject('setModuleGridTableFooter','.ext_new_gridfooter');
if(flg_apm.setUtil==undefined){
    flg_apm.setUtil={};
}
flg_apm.setUtil.getPageLi=function(i,page){
    pageli=my_extensions_views['setModuleGridTableFooterPagLi'].tpl;
    s=pageli.replace(/{{page}}/g,i);
    if(i==page){
        s=s.replace(/{{class}}/g,'active');
    }else{
        s=s.replace(/{{class}}/g,'');
    }
    return s
}

flg_apm.setModuleGridTableFooter.setUpData=function(nbItems,total,page,fulltotal){
    str=my_extensions_views['tableFooterNb'].tpl
    str=str.replace(/{{nbrows}}/g,nbItems);
    str=str.replace(/{{total}}/g,total);
    str=str.replace(/{{fulltotal}}/g,fulltotal);
    $('.footertalabitems').html(str);
    str=my_extensions_views['setModuleGridTableFooterPaging'].tpl;
    pageli=my_extensions_views['setModuleGridTableFooterPagLi'].tpl;
    nbpages=Math.ceil(total/flg_apm.setModuleGridBody.nbByPage);
    flg_apm.setModuleGridBody.nbpages=nbpages;
    //nbpages=3898;
    //page=558;
    paging='';
    if( nbpages<10 ){
        for(i=1;i<=nbpages;i++){
            paging+=flg_apm.setUtil.getPageLi(i,page);
        }
    } else if (nbpages>=10 && nbpages<100){
        n=5;
        if(nbpages>50){
            n=3;
        }
        for(i=1;i<=n;i++){
            paging+=flg_apm.setUtil.getPageLi(i,page);
        }
        if(page>5 && page<10){
            paging+=flg_apm.setUtil.getPageLi(page,page);
        }
        for(i=10;i<=nbpages;i+=10){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+10 && page<(Math.floor(nbpages/10)*10)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        if(nbpages>(Math.floor(nbpages/10)*10)){
            if(page>(Math.floor(nbpages/10)*10) && page< nbpages){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
            i=nbpages;
            paging+=flg_apm.setUtil.getPageLi(i,page);
        }
    } else  if(nbpages<500){
        paging+=flg_apm.setUtil.getPageLi(1,page);
        if(page<10){
            paging+=flg_apm.setUtil.getPageLi(page,page);
        }
        for(i=10;i<30;i+=10){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+10 && page<(Math.floor(nbpages/10)*10)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        for(i=50;i<nbpages;i+=50){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+50 && page<(Math.floor(nbpages/50)*50)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        if(nbpages>(Math.floor(nbpages/50)*50)){
            if(page>(Math.floor(nbpages/50)*50) && page< nbpages){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
            i=nbpages;
            paging+=flg_apm.setUtil.getPageLi(i,page);
        }
    }else  if(nbpages<1000){
        paging+=flg_apm.setUtil.getPageLi(1,page);
        if(page<50){
            paging+=flg_apm.setUtil.getPageLi(page,page);
        }
        for(i=50;i<100;i+=50){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+50 && page<(Math.floor(nbpages/50)*50)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        for(i=100;i<300;i+=100){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+100 && page<(Math.floor(nbpages/100)*100)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        for(i=300;i<nbpages;i+=200){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+200 && page<(Math.floor(nbpages/200)*200)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        if(nbpages>(Math.floor(nbpages/200)*200)){
            if(page>(Math.floor(nbpages/200)*200) && page< nbpages){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
            i=nbpages;
            paging+=flg_apm.setUtil.getPageLi(i,page);
        }
    } else if(nbpages<5000) {
        paging+=flg_apm.setUtil.getPageLi(1,page);
        for(i=100;i<=200;i+=100){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+100 && page<(Math.floor(nbpages/100)*100)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        if(page>200 && page<500){
            paging+=flg_apm.setUtil.getPageLi(page,page);
        }

        paging+=flg_apm.setUtil.getPageLi(500,page);
        if(page>500 && page<1000){
            paging+=flg_apm.setUtil.getPageLi(page,page);
        }
        for(i=1000;i<nbpages;i+=1000){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+1000 && page<(Math.floor(nbpages/1000)*1000)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        if(nbpages>(Math.floor(nbpages/1000)*1000)){
            if(page>(Math.floor(nbpages/1000)*1000) && page< nbpages){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
            i=nbpages;
            paging+=flg_apm.setUtil.getPageLi(i,page);
        }
    }else  {
        paging+=flg_apm.setUtil.getPageLi(1,page);
        if(page>1 && page<1000){
            paging+=flg_apm.setUtil.getPageLi(page,page);
        }
        for(i=1000;i<=2000;i+=1000){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+1000 && page<(Math.floor(nbpages/1000)*1000)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        if(page>2000 && page<5000){
            paging+=flg_apm.setUtil.getPageLi(page,page);
        }
        for(i=5000;i<nbpages;i+=1000){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+1000 && page<(Math.floor(nbpages/1000)*1000)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        if(nbpages>(Math.floor(nbpages/1000)*1000)){
            if(page>(Math.floor(nbpages/1000)*1000) && page< nbpages){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
            i=nbpages;
            paging+=flg_apm.setUtil.getPageLi(i,page);
        }
    }
    str=str.replace(/{{paging}}/g,paging);
    $('.ori_footerpaging').html(str);
    if(page==1){
        $('.oripag_fir').addClass('disabled');
        $('.oripag_prev').addClass('disabled');
    }else{
        $('.oripag_fir').removeClass('disabled');
        $('.oripag_prev').removeClass('disabled');
    }
    if(page==nbpages){
        $('.oripag_nex').addClass('disabled');
        $('.oripag_las').addClass('disabled');
    }else{
        $('.oripag_nex').removeClass('disabled');
        $('.oripag_las').removeClass('disabled');
    }
    flg_apm.setModuleGridTableFooter.initClicks();
}


flg_apm.setModuleGridTableFooter.setUpPageNb=function(){
    pagnbs=$('.ori_nbofpages').find('span');
    $.each(pagnbs,function(i,o){
        if(Number($(o).attr('data-value'))==Number(flg_apm.setModuleGridBody.nbByPage)){
            $(o).addClass('active');
        }else{
            $(o).removeClass('active');
        }
    });
}
/*flg_apm.setModuleGridTableFooter.init=function(){


    }*/

flg_apm.setModuleGridTableFooter.initClicks=function(){


    $('.ori_nbofpages').find('span').off('click').on('click',function(){
        flg_apm.setModuleGridBody.page=1;
        flg_apm.setModuleGridBody.nbByPage=Number($(this).attr('data-value'));
        flg_apm.setAlertPanel.addAlert('Paging','Reloading with '+flg_apm.setModuleGridBody.nbByPage+' records by page ','',2000);
        flg_apm.setModuleGridBody.doLoad();
    });
    $('.ori_page_li').off('click').on('click',function(){
        flg_apm.setModuleGridBody.page=Number($(this).attr('data-page'));
        flg_apm.setAlertPanel.addAlert('Loading','Loading Page '+flg_apm.setModuleGridBody.page,'',2000);
        flg_apm.setModuleGridBody.doLoad();
    });
    $('.oripag_fir').off('click').on('click',function(){
        if(flg_apm.setModuleGridBody.page>1){
            flg_apm.setModuleGridBody.page=1;
            flg_apm.setAlertPanel.addAlert('Loading','Loading First Page','',2000);
            flg_apm.setModuleGridBody.doLoad();
        }
    });
    $('.oripag_prev').off('click').on('click',function(){
        if(flg_apm.setModuleGridBody.page>1){
            flg_apm.setAlertPanel.addAlert('Loading','Loading Previous Page','',2000);
            flg_apm.setModuleGridBody.page--;
            flg_apm.setModuleGridBody.doLoad();
        }
    });
    $('.oripag_las').off('click').on('click',function(){
        if(flg_apm.setModuleGridBody.page<flg_apm.setModuleGridBody.nbpages){
            flg_apm.setModuleGridBody.page=flg_apm.setModuleGridBody.nbpages;
            flg_apm.setAlertPanel.addAlert('Loading','Loading Last Page','',2000);
            flg_apm.setModuleGridBody.doLoad();
        }
    });
    $('.oripag_nex').off('click').on('click',function(){
        if(flg_apm.setModuleGridBody.page<flg_apm.setModuleGridBody.nbpages){
            flg_apm.setAlertPanel.addAlert('Loading','Loading Next Page','',2000);
            flg_apm.setModuleGridBody.page++;
            flg_apm.setModuleGridBody.doLoad();
        }
    });
//
}

