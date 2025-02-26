var base_url= window.location.origin;
 function GetAddressData()
 {
    var id=jQuery('#addressrecord').val();
    if(id=='select')
    {
            jQuery('#nightsr').val('');
            jQuery('#weeksr').val('');
            jQuery('#monsr').val('');
            jQuery('#dates1').val('');
            jQuery('#datee1').val('');
            jQuery('#nights1').val('');        
            jQuery('#weeks1').val('');
            jQuery('#mons1').val('');            
            jQuery('#dates2').val('');
            jQuery('#datee2').val('');
            jQuery('#nights2').val('');        
            jQuery('#weeks2').val('');
            jQuery('#mons2').val('');            
            jQuery('#dates3').val('');
            jQuery('#datee3').val('');
            jQuery('#nights3').val('');        
            jQuery('#weeks3').val('');
            jQuery('#mons3').val('');            
            jQuery('#saltax').val('');
            jQuery('#toutax').val('');
            jQuery('#othtax').val('');        
            jQuery('#poolheatd').val('');
            jQuery('#poolheatw').val('');
            jQuery('#poolheatm').val('');        
            jQuery('#parkfee').val('');
            jQuery("#parkfpn").prop("checked", false);
            jQuery("#parkfps").prop("checked", false);            
            jQuery('#otherfee').val('');
            jQuery("#othpn").prop("checked", false);
            jQuery("#othps").prop("checked", false);            
            jQuery('#wififee').val('');
            jQuery("#wifipn").prop("checked", false);
            jQuery("#wifips").prop("checked", false);            
            jQuery('#clnfee').val('');
            jQuery('#clndays').val('');
            jQuery('#discount').val('');     
            jQuery("#dispn").prop("checked", false);
            jQuery("#dispn").prop("checked", false);         
            jQuery('#dmpr').val('');
            jQuery('#currency').val('');   
    }
    else
    {
        var path=window.location.pathname;
        var base_url= window.location.origin+path; 
        base_url=base_url.replace('/wp-admin/admin.php',''); 
        jQuery.post(base_url+'/wp-admin/admin-ajax.php', {action: 'ppcode_locationdata', id:id},function(data){
            
            var result= data.split('|');
            //console.log[result];
            jQuery('#nightsr').val(result[2]);
            jQuery('#weeksr').val(result[3]);
            jQuery('#monsr').val(result[4]);
            jQuery('#dates1').val(result[5]);
            jQuery('#datee1').val(result[6]);
            jQuery('#nights1').val(result[7]);        
            jQuery('#weeks1').val(result[8]);
            jQuery('#mons1').val(result[9]);            
            jQuery('#dates2').val(result[10]);
            jQuery('#datee2').val(result[11]);
            jQuery('#nights2').val(result[12]);        
            jQuery('#weeks2').val(result[13]);
            jQuery('#mons2').val(result[14]);            
            jQuery('#dates3').val(result[15]);
            jQuery('#datee3').val(result[16]);
            jQuery('#nights3').val(result[17]);        
            jQuery('#weeks3').val(result[18]);
            jQuery('#mons3').val(result[19]);            
            jQuery('#saltax').val(result[20]);
            jQuery('#toutax').val(result[21]);
            jQuery('#othtax').val(result[22]);        
            jQuery('#poolheatd').val(result[23]);
            jQuery('#poolheatw').val(result[24]);
            jQuery('#poolheatm').val(result[25]);        
            jQuery('#parkfee').val(result[26]);
            if(result[27]==5)  { jQuery("#parkfpn").prop("checked", true);   }
            else if(result[27]==6){ jQuery("#parkfps").prop("checked", true); }            
            jQuery('#otherfee').val(result[28]);
            if(result[29]==5)  { jQuery("#othpn").prop("checked", true);   }
            else if(result[29]==6){ jQuery("#othps").prop("checked", true); }            
            jQuery('#wififee').val(result[30]);
            if(result[31]==5)  { jQuery("#wifipn").prop("checked", true);   }
            else if(result[31]==6){ jQuery("#wifips").prop("checked", true); }            
            jQuery('#clnfee').val(result[32]);
            jQuery('#clndays').val(result[33]);
            jQuery('#discount').val(result[34]);     
            if(result[35]==7)  { jQuery("#dispn").prop("checked", true);   }
            else if(result[35]==8){ jQuery("#dispn").prop("checked", true); }        
            jQuery('#dmpr').val(result[36]);
            jQuery('#currency').val(result[37]);
            
        });
     } 
 }
 function validatefield()
    {
                 var address=jQuery('#addressrecord').val();
                 var nightsr=jQuery('#nightsr').val();
                 var weeksr=jQuery('#weeksr').val();         
                 var monsr=jQuery('#monsr').val();
                 var saltax=jQuery('#saltax').val();
                 var toutax=jQuery('#toutax').val();
                 //var othtax=jQuery('#othtax').val();        
                 //var poolheatd=jQuery('#poolheatd').val();
                 //var poolheatw=jQuery('#poolheatw').val();
                 //var poolheatm=jQuery('#poolheatm').val();        
                 //var clnfee=jQuery('#clnfee').val();
                 //var clndays=jQuery('#clndays').val();
                 var curr=jQuery('#currency').val();
            if(address=="" || address=="select")
             {
                alert("please Type Your Property Address!");
                return false;
             }
             else if(nightsr==""){ alert("Please Type Per Night Regular Rate!"); return false;}
             else if(weeksr==""){ alert("Please Type Per Week Regular Rate!"); return false;}
             else if(monsr==""){ alert("Please Type Per Month Regular Rate!"); return false;}
             else if(saltax==""){ alert("Please Type Sal Tax in Percentage of pernight!"); return false;}
             else if(toutax==""){ alert("Please Type Tourist Tax in Percentage of pernight!"); return false;}
             else if(curr==""){ alert("Please Type Currency!"); return false;}
             else { return true;}
             //else if(poolheatd==""){ alert("Please Type Daily Pool Heat Fee!"); return false;}
             //else if(poolheatw==""){ alert("Please Type Weekly Pool Heat Fee!"); return false;}
             //else if(poolheatm==""){ alert("Please Type Monthly Pool Heat Fee!"); return false;}
             //else if(clnfee==""){ alert("Please Type Cleaning Fee!"); return false;}
             //else if(clndays==""){ alert("Please Type Cleaning Days!"); return false;}
             
    }  
function calculatefee()
{
    var total_cost=0;
    var parkingfee, otherfee, wififee, cleaningfee,discountrate,nightofweek,poolheatofweek,wififee;
    var address=jQuery('#addressid').val();
    
    var nightr =jQuery("#addressid option:selected").data('nightr');
    var weekr =jQuery("#addressid option:selected").data('weekr');
    var monthr =jQuery("#addressid option:selected").data('monthr');
    //if(monthr=="" || monthr=='0'){monthr=weekr;} 
    
    var start1 =jQuery("#addressid option:selected").data('start1');
    var end1 =jQuery("#addressid option:selected").data('end1');
   if(start1!="" && end1!=""){start1 = Date.parse(start1); end1 = Date.parse(end1);}
    var night1 =jQuery("#addressid option:selected").data('night1');
    var week1 =jQuery("#addressid option:selected").data('week1');
    var month1 =jQuery("#addressid option:selected").data('month1');
    if(month1=="" || month1=='0'){month1=(week1/7)*28;}
    
    var start2 =jQuery("#addressid option:selected").data('start2');
    var end2 =jQuery("#addressid option:selected").data('end2');
   if(start2!="" && end2!=""){start2 = Date.parse(start2); end2 = Date.parse(end2);}
    var night2 =jQuery("#addressid option:selected").data('night2');
    var week2 =jQuery("#addressid option:selected").data('week2');
    var month2 =jQuery("#addressid option:selected").data('month2');
    if(month2=="" || month2=='0'){month2=(week2/7)*28;}
         
    var start3 =jQuery("#addressid option:selected").data('start3');
    var end3 =jQuery("#addressid option:selected").data('end3');
    if(start3!="" && end3!=""){start3 = Date.parse(start3); end3 = Date.parse(end3);}
    var night3 =jQuery("#addressid option:selected").data('night3');
    var week3 =jQuery("#addressid option:selected").data('week3');
    var month3 =jQuery("#addressid option:selected").data('month3');
    if(month3=="" || month3=='0'){month3=(week3/7)*28;}
    
    
    var saltax =jQuery("#addressid option:selected").data('saltax');
    var toutax =jQuery("#addressid option:selected").data('toutax');
    var othertax =jQuery("#addressid option:selected").data('othertax');
    var poolheatd =jQuery("#addressid option:selected").data('poolheatd');
    if(poolheatd=="" || poolheatd=='0'){poolheatd=0;}
    var poolheatw =jQuery("#addressid option:selected").data('poolheatw');
    if(poolheatw=="" || poolheatw=='0'){poolheatw=0;}
    var poolheatm =jQuery("#addressid option:selected").data('poolheatm');
    if(poolheatm=="" && poolheatw!='0'){poolheatm=(poolheatw/7)*28;}
    var parkf =jQuery("#addressid option:selected").data('parkf');
    var parkrate =jQuery("#addressid option:selected").data('parkrate');
    var othf =jQuery("#addressid option:selected").data('othf');
    var othrate =jQuery("#addressid option:selected").data('othrate');
    var wifif =jQuery("#addressid option:selected").data('wifif');
    
    var wifirate =jQuery("#addressid option:selected").data('wifirate');
    var clnf =jQuery("#addressid option:selected").data('clnf');
    var clndys =jQuery("#addressid option:selected").data('clndys');
    var discount =jQuery("#addressid option:selected").data('discount');
    var disrate =jQuery("#addressid option:selected").data('disrate');
    
    var damgp =jQuery("#addressid option:selected").data('damgp');
    var curr =jQuery("#addressid option:selected").data('curr');
    var startdate= jQuery('#startdate').val();
    var datearr=startdate.split('-');
    var startmonth=startdate;
    //var startmonth=datearr[1];
    var enddate= jQuery('#enddate').val();
    var endmonth=enddate;
    var diff = new Date(Date.parse(enddate) - Date.parse(startdate));
        startmonth=Date.parse(startmonth)
        endmonth=Date.parse(endmonth);
    var days = diff/1000/60/60/24;
        days = Math.floor(days);
    var poolheattotalfee=0;
    //alert(days);
    if(parkrate==5)
    {
        parkingfee=parkf*days;
    }
    else { parkingfee=parkf; }
    if(othrate==5)
    {
        otherfee=days*othf;
    }
    else { otherfee=othf;}
    if(wifirate==5)
    {
        wififee=wifif*days;
    }
    else{ wififee=0; }
    if(days<=clndys || clndys=="")
    {
        cleaningfee=clnf;
    }
    else { cleaningfee=0;}
    if(disrate==7)
    {
        discountrate=discount;
    }
    else{ discountrate=8;}
    
    if(address=="select")
    {
        alert("Please Select Location From DropDown");
        return false;
    }
    //...........Session First
            if(startmonth >= start1 && endmonth <= end1 && end1!="")
            {
                 if(days<7)
                    {
                        var salpe1=(saltax/100)*night1;
                        var toutaxp1=(toutax/100)*night1;
                        var othertaxp1 = (othertax/100)*night1;
                        poolheattotalfee=(poolheatd*days);              
                        if(discountrate==8)
                        {
                            var discper=(discount/100)*night1;
                            discountrate=discper*days;
                        }
                        total_cost=(night1*days)+(((salpe1+toutaxp1+othertaxp1)*days)+parkingfee+otherfee+cleaningfee+wififee)-discountrate;
                    }
                    else if(days>=7 && days <=27)
                    {
                        nightofweek = week1/7;
                        poolheatofweek=poolheatw/7;
                        var salpe1=(saltax/100)*nightofweek;
                        var toutaxp1=(toutax/100)*nightofweek;
                        var othertaxp1 = (othertax/100)*nightofweek;
                        poolheattotalfee=(poolheatofweek*days);                
                        if(discountrate==8)
                        {
                            var discper=(discount/100)*nightofweek;
                            discountrate=discper*days;
                        }
                        total_cost=(nightofweek*days)+(((salpe1+toutaxp1+othertaxp1)*days)+parkingfee+otherfee+cleaningfee+wififee)-discountrate;
                        
                    }
                    else if(days>=28)
                    {
                            var nightofmonth = month1/28;
                            var poolheadofmonth=poolheatm/28;
                            var salpe1=(saltax/100)*nightofmonth;
                            var toutaxp1=(toutax/100)*nightofmonth;
                            var othertaxp1 = (othertax/100)*nightofmonth;
                            poolheattotalfee=(poolheadofmonth*days);           
                            if(discountrate==8)
                            {
                                var discper=(discount/100)*nightofmonth;
                                discountrate=discper*days;
                            }
                            total_cost=(nightofmonth*days)+(((salpe1+toutaxp1+othertaxp1)*days)+parkingfee+otherfee+cleaningfee+wififee)-discountrate;
                    }
            }
    //.......Session 2...........
            else if(startmonth >= start2 && endmonth <= end2 && end2!="")
            {
                    if(days<7)
                    {
                        var salpe1=(saltax/100)*night2;
                        var toutaxp1=(toutax/100)*night2;
                        var othertaxp1 = (othertax/100)*night2;
                        poolheattotalfee=(poolheatd*days);               
                        if(discountrate==8)
                        {
                            var discper=(discount/100)*night2;
                            discountrate=discper*days;
                        }
                        total_cost=(night2*days)+(((salpe1+toutaxp1+othertaxp1)*days)+parkingfee+otherfee+cleaningfee+wififee)-discountrate;
                    }
                    else if(days>=7 && days <=27)
                    {
                        nightofweek = week2/7;
                        poolheatofweek=poolheatw/7;
                        var salpe1=(saltax/100)*nightofweek;
                        var toutaxp1=(toutax/100)*nightofweek;
                        var othertaxp1 = (othertax/100)*nightofweek;
                        poolheattotalfee=(poolheatofweek*days);                
                        if(discountrate==8)
                        {
                            var discper=(discount/100)*nightofweek;
                            discountrate=discper*days;
                        }
                        total_cost=(nightofweek*days)+(((salpe1+toutaxp1+othertaxp1)*days)+parkingfee+otherfee+cleaningfee+wififee)-discountrate;
                    }
                    else if(days>=28)
                    {
                            var nightofmonth = month2/28;
                            var poolheadofmonth=poolheatm/28;
                            var salpe1=(saltax/100)*nightofmonth;
                            var toutaxp1=(toutax/100)*nightofmonth;
                            var othertaxp1 = (othertax/100)*nightofmonth;
                            poolheattotalfee=(poolheadofmonth*days);            
                            if(discountrate==8)
                            {
                                var discper=(discount/100)*nightofmonth;
                                discountrate=discper*days;
                            }
                            total_cost=(nightofmonth*days)+(((salpe1+toutaxp1+othertaxp1)*days)+parkingfee+otherfee+cleaningfee+wififee)-discountrate;
                   }
            }
    //........Session 3............
    else if(startmonth >= start3 && endmonth <= end3 && end3!="")
    {
            if(days<7)
            {
                var salpe1=(saltax/100)*night3;
                var toutaxp1=(toutax/100)*night3;
                var othertaxp1 = (othertax/100)*night3;
                poolheattotalfee=(poolheatd*days);             
                if(discountrate==8)
                {
                    var discper=(discount/100)*night3;
                    discountrate=discper*days;
                }
                total_cost=(night3*days)+(((salpe1+toutaxp1+othertaxp1)*days)+parkingfee+otherfee+cleaningfee+wififee)-discountrate;
            }
            else if(days>=7 && days <=27)
            {
                nightofweek = week3/7;
                poolheatofweek=poolheatw/7;
                var salpe1=(saltax/100)*nightofweek;
                var toutaxp1=(toutax/100)*nightofweek;
                var othertaxp1 = (othertax/100)*nightofweek;
                poolheattotalfee=(poolheatofweek*days);              
                if(discountrate==8)
                {
                    var discper=(discount/100)*nightofweek;
                    discountrate=discper*days;
                }
                total_cost=(nightofweek*days)+(((salpe1+toutaxp1+othertaxp1)*days)+parkingfee+otherfee+cleaningfee+wififee)-discountrate;
            }
            else if(days>=28)
            {
                    var nightofmonth = month3/28;
                    var poolheadofmonth=poolheatm/28;
                    var salpe1=(saltax/100)*nightofmonth;
                    var toutaxp1=(toutax/100)*nightofmonth;
                    var othertaxp1 = (othertax/100)*nightofmonth;
                    poolheattotalfee=(poolheadofmonth*days);                
                    if(discountrate==8)
                    {
                        var discper=(discount/100)*nightofmonth;
                        discountrate=discper*days;
                    }
                    total_cost=(nightofmonth*days)+(((salpe1+toutaxp1+othertaxp1)*days)+parkingfee+otherfee+cleaningfee+wififee)-discountrate;
            }
    } 
    // mixed Seasons redualr and season one
   else if(startmonth <= start1  && endmonth >= start1 && endmonth <= end1 && end1!="")
    {
            //var difffirst = new Date(Date.parse(start1) - Date.parse(startmonth));
            var difffirst = start1 - startmonth;
            var firstday = difffirst/1000/60/60/24;
            firstday=Math.floor(firstday);
            var secondays = days - firstday;
            if(days<7)
                {
                    var salpefirst=(saltax/100)*nightr;
                    var toutaxpfirst=(toutax/100)*nightr;
                    var othertaxpfirst = (othertax/100)*nightr;
                    var salpe2nd=(saltax/100)*night1;
                    var toutax2nd=(toutax/100)*night1;
                    var othertax2nd = (othertax/100)*night1;
                    poolheattotalfee=(poolheatd*days);             
                    if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*nightr;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*night1;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(nightr*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (night1*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
                }
                else if(days>=7 && days <=27)
                {
                    var nightofweek1 = weekr/7;
                    var nightofweek2 = week1/7;
                    poolheatofweek=poolheatw/7;
                    var salpefirst=(saltax/100)*nightofweek1;
                    var toutaxpfirst=(toutax/100)*nightofweek1;
                    var othertaxpfirst = (othertax/100)*nightofweek1;
                    var salpe2nd=(saltax/100)*nightofweek2;
                    var toutax2nd=(toutax/100)*nightofweek2;
                    var othertax2nd = (othertax/100)*nightofweek2;
                     
                    poolheattotalfee=(poolheatofweek*days);  
                    
                      if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*nightofweek1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightofweek2;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(nightofweek1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightofweek2*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
                     
                }
                else if(days>=28)
                {
                    var nightofmonth1 = monthr/28;
                    var nightofmonth2 = month1/28;      
                    var salpefirst=(saltax/100)*nightofmonth1;
                    var toutaxpfirst=(toutax/100)*nightofmonth1;
                    var othertaxpfirst = (othertax/100)*nightofmonth1;
                    var salpe2nd=(saltax/100)*nightofmonth2;
                    var toutax2nd=(toutax/100)*nightofmonth2;
                    var othertax2nd = (othertax/100)*nightofmonth2;
                    var poolheadofmonth=poolheatm/28;                
                    poolheattotalfee=(poolheadofmonth*days);
                
                   if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*nightofmonth1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightofmonth2;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(nightofmonth1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightofmonth2*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
              }       
    }
    // Season One and Season Two
    else if(startmonth <= start2 && endmonth >= start2 && endmonth <= end2 && end2!="")
    {
            //var difffirst = new Date(Date.parse(start2) - Date.parse(startmonth));
            var difffirst = start2 - startmonth;
            var firstday = difffirst/1000/60/60/24;
             firstday=Math.floor(firstday);
            var secondays = days-firstday;
            if(days<7)
                {
                    var salpefirst=(saltax/100)*night1;
                    var toutaxpfirst=(toutax/100)*night1;
                    var othertaxpfirst = (othertax/100)*night1;
                    var salpe2nd=(saltax/100)*night2;
                    var toutax2nd=(toutax/100)*night2;
                    var othertax2nd = (othertax/100)*night2;
                    poolheattotalfee=(poolheatd*days);             
                    if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*night1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*night2;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(night1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (night2*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
                }
                else if(days>=7 && days <=27)
                {
                    var nightofweek1 = week1/7;
                    var nightofweek2 = week2/7;
                    poolheatofweek=poolheatw/7;
                    var salpefirst=(saltax/100)*nightofweek1;
                    var toutaxpfirst=(toutax/100)*nightofweek1;
                    var othertaxpfirst = (othertax/100)*nightofweek1;
                    var salpe2nd=(saltax/100)*nightofweek2;
                    var toutax2nd=(toutax/100)*nightofweek2;
                    var othertax2nd = (othertax/100)*nightofweek2;
                     
                    poolheattotalfee=(poolheatofweek*days);  
                    
                      if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*nightofweek1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightofweek2;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(nightofweek1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightofweek2*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
                     
                }
                else if(days>=28)
                {
                    var nightofmonth1 = month1/28;
                    var nightofmonth2 = month2/28;      
                    var salpefirst=(saltax/100)*nightofmonth1;
                    var toutaxpfirst=(toutax/100)*nightofmonth1;
                    var othertaxpfirst = (othertax/100)*nightofmonth1;
                    var salpe2nd=(saltax/100)*nightofmonth2;
                    var toutax2nd=(toutax/100)*nightofmonth2;
                    var othertax2nd = (othertax/100)*nightofmonth2;
                    var poolheadofmonth=poolheatm/28;                
                    poolheattotalfee=(poolheadofmonth*days);
                
                   if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*nightofmonth1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightofmonth2;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(nightofmonth1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightofmonth2*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
              }       
    }
    // season 2 and season 3
    else if(startmonth <= start3 && endmonth >= start3 && endmonth <= end3 && end3!="")
    {
            //var difffirst = new Date(Date.parse(start3) - Date.parse(startmonth));
            var difffirst = start3 - startmonth;
            var firstday = difffirst/1000/60/60/24;
             firstday=Math.floor(firstday);
            var secondays = days-firstday;
            if(days<7)
                {
                    var salpefirst=(saltax/100)*night2;
                    var toutaxpfirst=(toutax/100)*night2;
                    var othertaxpfirst = (othertax/100)*night2;
                    var salpe2nd=(saltax/100)*night3;
                    var toutax2nd=(toutax/100)*night3;
                    var othertax2nd = (othertax/100)*night3;
                    poolheattotalfee=(poolheatd*days);             
                    if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*night3;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*night3;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(night2*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (night3*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
                }
                else if(days>=7 && days <=27)
                {
                    var nightofweek1 = week2/7;
                    var nightofweek2 = week3/7;
                    poolheatofweek=poolheatw/7;
                    var salpefirst=(saltax/100)*nightofweek1;
                    var toutaxpfirst=(toutax/100)*nightofweek1;
                    var othertaxpfirst = (othertax/100)*nightofweek1;
                    var salpe2nd=(saltax/100)*nightofweek2;
                    var toutax2nd=(toutax/100)*nightofweek2;
                    var othertax2nd = (othertax/100)*nightofweek2;
                     
                    poolheattotalfee=(poolheatofweek*days);  
                    
                      if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*nightofweek1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightofweek2;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(nightofweek1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightofweek2*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
                     
                }
                else if(days>=28)
                {
                    var nightofmonth1 = month2/28;
                    var nightofmonth2 = month3/28;      
                    var salpefirst=(saltax/100)*nightofmonth1;
                    var toutaxpfirst=(toutax/100)*nightofmonth1;
                    var othertaxpfirst = (othertax/100)*nightofmonth1;
                    var salpe2nd=(saltax/100)*nightofmonth2;
                    var toutax2nd=(toutax/100)*nightofmonth2;
                    var othertax2nd = (othertax/100)*nightofmonth2;
                    var poolheadofmonth=poolheatm/28;                
                    poolheattotalfee=(poolheadofmonth*days);
                
                   if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*nightofmonth1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightofmonth2;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(nightofmonth1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightofmonth2*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
              }       
    }
    // season 1 and regular
    else if(startmonth >= start1 && startmonth <= end1 && endmonth >= end1 && end3=="" )
    {
            end1 = new Date(end1);
            end1.setDate(end1.getDate() + 01); 
            //var secondays = new Date(Date.parse(endmonth) - Date.parse(end1));
            var secondays = endmonth - end1;
                secondays = secondays/1000/60/60/24;
             secondays=Math.floor(secondays);
            var firstday = days-secondays;
            if(days<7)
                {
                    var salpefirst=(saltax/100)*night1;
                    var toutaxpfirst=(toutax/100)*night1;
                    var othertaxpfirst = (othertax/100)*night1;
                    var salpe2nd=(saltax/100)*nightr;
                    var toutax2nd=(toutax/100)*nightr;
                    var othertax2nd = (othertax/100)*nightr;
                    poolheattotalfee=(poolheatd*days);             
                    if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*night1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightr;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(night1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightr*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
                }
                else if(days>=7 && days <=27)
                {
                    var nightofweek1 = week1/7;
                    var nightofweek2 = weekr/7;
                    poolheatofweek=poolheatw/7;
                    var salpefirst=(saltax/100)*nightofweek1;
                    var toutaxpfirst=(toutax/100)*nightofweek1;
                    var othertaxpfirst = (othertax/100)*nightofweek1;
                    var salpe2nd=(saltax/100)*nightofweek2;
                    var toutax2nd=(toutax/100)*nightofweek2;
                    var othertax2nd = (othertax/100)*nightofweek2;
                     
                    poolheattotalfee=(poolheatofweek*days);  
                    
                      if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*nightofweek1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightofweek2;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(nightofweek1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightofweek2*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
                     
                }
                else if(days>=28)
                {
                    var nightofmonth1 = month1/28;
                    var nightofmonth2 = monthr/28;      
                    var salpefirst=(saltax/100)*nightofmonth1;
                    var toutaxpfirst=(toutax/100)*nightofmonth1;
                    var othertaxpfirst = (othertax/100)*nightofmonth1;
                    var salpe2nd=(saltax/100)*nightofmonth2;
                    var toutax2nd=(toutax/100)*nightofmonth2;
                    var othertax2nd = (othertax/100)*nightofmonth2;
                    var poolheadofmonth=poolheatm/28;                
                    poolheattotalfee=(poolheadofmonth*days);
                
                   if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*nightofmonth1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightofmonth2;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(nightofmonth1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightofmonth2*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
              }       
    }
    // season 3 and 1
    else if(startmonth >= start3 && startmonth <=end3 && endmonth >= end3 && endmonth <= end1 )
    {
            //var difffirst = new Date(Date.parse(end3) - Date.parse(startmonth));
            var difffirst = end3 - startmonth;            
            var firstday = difffirst/1000/60/60/24;
            firstday=Math.floor(firstday);
            var secondays = days-firstday;
            if(days<7)
                {
                    var salpefirst=(saltax/100)*night3;
                    var toutaxpfirst=(toutax/100)*night3;
                    var othertaxpfirst = (othertax/100)*night3;
                    var salpe2nd=(saltax/100)*night1;
                    var toutax2nd=(toutax/100)*night1;
                    var othertax2nd = (othertax/100)*night1;
                    poolheattotalfee=(poolheatd*days);             
                    if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*night3;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*night1;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(night3*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (night1*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
                }
                else if(days>=7 && days <=27)
                {
                    var nightofweek1 = week3/7;
                    var nightofweek2 = week1/7;
                    poolheatofweek=poolheatw/7;
                    var salpefirst=(saltax/100)*nightofweek1;
                    var toutaxpfirst=(toutax/100)*nightofweek1;
                    var othertaxpfirst = (othertax/100)*nightofweek1;
                    var salpe2nd=(saltax/100)*nightofweek2;
                    var toutax2nd=(toutax/100)*nightofweek2;
                    var othertax2nd = (othertax/100)*nightofweek2;
                     
                    poolheattotalfee=(poolheatofweek*days);  
                    
                      if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*nightofweek1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightofweek2;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(nightofweek1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightofweek2*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
                     
                }
                else if(days>=28)
                {
                    var nightofmonth1 = month3/28;
                    var nightofmonth2 = month1/28;      
                    var salpefirst=(saltax/100)*nightofmonth1;
                    var toutaxpfirst=(toutax/100)*nightofmonth1;
                    var othertaxpfirst = (othertax/100)*nightofmonth1;
                    var salpe2nd=(saltax/100)*nightofmonth2;
                    var toutax2nd=(toutax/100)*nightofmonth2;
                    var othertax2nd = (othertax/100)*nightofmonth2;
                    var poolheadofmonth=poolheatm/28;                
                    poolheattotalfee=(poolheadofmonth*days);
                
                   if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*nightofmonth1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightofmonth2;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(nightofmonth1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightofmonth2*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
              }       
    }
    //...season 3 and regular
    else if(startmonth >= start3 && startmonth <= end3 && endmonth >= end3 && end3!="")
    {
            end3 = new Date(end3);
            end3.setDate(end3.getDate() + 01);
            //var secondays = new Date(Date.parse(endmonth) - Date.parse(end3));
            var secondays = endmonth - end3;
                secondays = secondays/1000/60/60/24;
            secondays=Math.floor(secondays);
            var firstday = days-secondays;
            if(days<7)
                {
                    var salpefirst=(saltax/100)*night3;
                    var toutaxpfirst=(toutax/100)*night3;
                    var othertaxpfirst = (othertax/100)*night3;
                    var salpe2nd=(saltax/100)*nightr;
                    var toutax2nd=(toutax/100)*nightr;
                    var othertax2nd = (othertax/100)*nightr;
                    poolheattotalfee=(poolheatd*days);             
                    if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*night3;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightr;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(night3*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightr*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
                }
                else if(days>=7 && days <=27)
                {
                    var nightofweek1 = week3/7;
                    var nightofweek2 = weekr/7;
                    poolheatofweek=poolheatw/7;
                    var salpefirst=(saltax/100)*nightofweek1;
                    var toutaxpfirst=(toutax/100)*nightofweek1;
                    var othertaxpfirst = (othertax/100)*nightofweek1;
                    var salpe2nd=(saltax/100)*nightofweek2;
                    var toutax2nd=(toutax/100)*nightofweek2;
                    var othertax2nd = (othertax/100)*nightofweek2;
                     
                    poolheattotalfee=(poolheatofweek*days);  
                    
                      if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*nightofweek1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightofweek2;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(nightofweek1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightofweek2*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
                     
                }
                else if(days>=28)
                {
                    var nightofmonth1 = month3/28;
                    var nightofmonth2 = monthr/28;      
                    var salpefirst=(saltax/100)*nightofmonth1;
                    var toutaxpfirst=(toutax/100)*nightofmonth1;
                    var othertaxpfirst = (othertax/100)*nightofmonth1;
                    var salpe2nd=(saltax/100)*nightofmonth2;
                    var toutax2nd=(toutax/100)*nightofmonth2;
                    var othertax2nd = (othertax/100)*nightofmonth2;
                    var poolheadofmonth=poolheatm/28;                
                    poolheattotalfee=(poolheadofmonth*days);
                
                   if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*nightofmonth1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightofmonth2;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(nightofmonth1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightofmonth2*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
              }       
    }
    // Season 2 and Regular
    else if(startmonth >= start2 && startmonth <= end2 && endmonth >= end2 && end3=="" )
    {
            end2 = new Date(end2);
            end2.setDate(end2.getDate() + 01); 
            //var secondays = new Date(Date.parse(endmonth) - Date.parse(end2));
            var secondays = endmonth - end2;
                secondays = secondays/1000/60/60/24;
            secondays=Math.floor(secondays);
            var firstday = days-secondays;
            if(days<7)
                {
                    var salpefirst=(saltax/100)*night2;
                    var toutaxpfirst=(toutax/100)*night2;
                    var othertaxpfirst = (othertax/100)*night2;
                    var salpe2nd=(saltax/100)*nightr;
                    var toutax2nd=(toutax/100)*nightr;
                    var othertax2nd = (othertax/100)*nightr;
                    poolheattotalfee=(poolheatd*days);             
                    if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*night2;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightr;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(night2*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightr*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
                }
                else if(days>=7 && days <=27)
                {
                    var nightofweek1 = week2/7;
                    var nightofweek2 = weekr/7;
                    poolheatofweek=poolheatw/7;
                    var salpefirst=(saltax/100)*nightofweek1;
                    var toutaxpfirst=(toutax/100)*nightofweek1;
                    var othertaxpfirst = (othertax/100)*nightofweek1;
                    var salpe2nd=(saltax/100)*nightofweek2;
                    var toutax2nd=(toutax/100)*nightofweek2;
                    var othertax2nd = (othertax/100)*nightofweek2;
                     
                    poolheattotalfee=(poolheatofweek*days);  
                    
                      if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*nightofweek1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightofweek2;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(nightofweek1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightofweek2*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
                     
                }
                else if(days>=28)
                {
                    var nightofmonth1 = month2/28;
                    var nightofmonth2 = monthr/28;      
                    var salpefirst=(saltax/100)*nightofmonth1;
                    var toutaxpfirst=(toutax/100)*nightofmonth1;
                    var othertaxpfirst = (othertax/100)*nightofmonth1;
                    var salpe2nd=(saltax/100)*nightofmonth2;
                    var toutax2nd=(toutax/100)*nightofmonth2;
                    var othertax2nd = (othertax/100)*nightofmonth2;
                    var poolheadofmonth=poolheatm/28;                
                    poolheattotalfee=(poolheadofmonth*days);
                
                   if(discountrate==8)
                    {
                        var discperfirst=(discount/100)*nightofmonth1;
                        var discoun1=discper*firstday;
                        var discper2nd=(discount/100)*nightofmonth2;
                        var discoun2=discper*secondays;
                        discountrate=+discoun1 + +discoun2;
                    }
                    var firsday_cost=(nightofmonth1*firstday)+((salpefirst+toutaxpfirst+othertaxpfirst)*firstday);
                    var second_cost= (nightofmonth2*secondays)+((salpe2nd+toutax2nd+othertax2nd)*secondays);
                    total_cost=(firsday_cost+second_cost+parkingfee+otherfee+cleaningfee+wififee) - discountrate;
              }       
    }
    else
    {        
        if(days<7)
        {
            var salpe1=(saltax/100)*nightr;
            var toutaxp1=(toutax/100)*nightr;
            var othertaxp1 = (othertax/100)*nightr;
            poolheattotalfee=(poolheatd*days);           
            if(discountrate==8)
            {
                var discper=(discount/100)*nightr;
                discountrate=discper*days;
            }
            total_cost=(nightr*days)+(((salpe1+toutaxp1+othertaxp1)*days)+parkingfee+otherfee+cleaningfee+wififee)-discountrate;
        }
        else if(days>=7 && days <=27)
        {
            nightofweek = weekr/7;
            poolheatofweek=poolheatw/7;
            var salpe1=(saltax/100)*nightofweek;
            var toutaxp1=(toutax/100)*nightofweek;
            var othertaxp1 = (othertax/100)*nightofweek;
            poolheattotalfee=(poolheatofweek*days);            
            if(discountrate==8)
            {
                var discper=(discount/100)*nightofweek;
                discountrate=discper*days;
            }
            total_cost=(nightofweek*days)+(((salpe1+toutaxp1+othertaxp1)*days)+parkingfee+otherfee+cleaningfee+wififee)-discountrate;
        }
        else if(days>=28)
        {
            var nightofmonth = monthr/28;
            var poolheadofmonth=poolheatm/28;
            var salpe1=(saltax/100)*nightofmonth;
            var toutaxp1=(toutax/100)*nightofmonth;
            var othertaxp1 = (othertax/100)*nightofmonth;
            poolheattotalfee=(poolheadofmonth*days);            
            if(discountrate==8)
            {
                var discper=(discount/100)*nightofmonth;
                discountrate=discper*days;
            }
            total_cost=(nightofmonth*days)+(((salpe1+toutaxp1+othertaxp1)*days)+parkingfee+otherfee+cleaningfee+wififee)-discountrate;
       }
    }  
    if(jQuery("#poolhincl").is(':checked'))
    {
        total_cost=poolheattotalfee+total_cost;
    }
    total_cost=+total_cost.toFixed(2);
    document.getElementById("po").innerHTML = "<span style='font-weight:bold;'> All Inclusive Rental Cost: " + curr+total_cost + "</span><br>";
    jQuery("#po").append("<span style='font-weight:bold;'>Refundable Damage Protection:" +curr+damgp + "</span><br>");
                         
}
function showpoolhead()
{
    var poolheatd =jQuery("#addressid option:selected").data('poolheatd');
    var poolheatw =jQuery("#addressid option:selected").data('poolheatw');
    var poolheatm =jQuery("#addressid option:selected").data('poolheatm');
    if(poolheatd==0 && poolheatw==0 && poolheatm==0){ jQuery("#poolheatdiv").css("display","none");}
    else if (poolheatd=="" && poolheatw=="" && poolheatm==""){ jQuery("#poolheatdiv").css("display","none");}
    else { jQuery("#poolheatdiv").css("display","block"); }
    
  
}
function getaddress()
{
    var input = document.getElementById('addressrecord');
    var autocomplete = new google.maps.places.Autocomplete(input);    
}
jQuery(document).ready(function(){
       // jQuery(function() {
                jQuery( "#startdate" ).datepicker({ minDate: 0});
                jQuery( "#dates1" ).datepicker({ minDate: 0});
                //jQuery( "#datee1" ).datepicker({ minDate: 0});
                jQuery( "#dates2" ).datepicker({ minDate: 0});
                //jQuery( "#datee2" ).datepicker({ minDate: 0});
                jQuery( "#dates3" ).datepicker({ minDate: 0});
                //jQuery( "#datee3" ).datepicker({ minDate: 0});
           // });
    jQuery('#startdate').change(function()
    {   
        var st_date=jQuery( "#startdate" ).val();
        st_date = new Date(st_date);
        st_date.setDate(st_date.getDate() + 01);
        jQuery( "#enddate" ).datepicker({ minDate: st_date});        
        //var st_date=jQuery(this).val();
    });
    jQuery('#dates1').change(function()
    {   
        var dates1=jQuery( "#dates1" ).val();
        dates1 = new Date(dates1);
        dates1.setDate(dates1.getDate() + 01);
        jQuery( "#datee1" ).datepicker({ minDate: dates1});
    });
    jQuery('#dates2').change(function()
    {   
        var dates2=jQuery( "#dates2" ).val();
        dates2 = new Date(dates2);
        dates2.setDate(dates2.getDate() + 01);
        jQuery( "#datee2" ).datepicker({ minDate: dates2});
    });
    jQuery('#dates3').change(function()
    {   
        var dates3=jQuery( "#dates3" ).val();
        dates3 = new Date(dates3);
        dates3.setDate(dates3.getDate() + 01);
        jQuery( "#datee3" ).datepicker({ minDate: dates3});
    });
});
