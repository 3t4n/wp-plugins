
////JQUERY JSON LIBRARY:
/*
 * This document is licensed as free software under the terms of the
 * MIT License: <a href="http://www.opensource.org/licenses/mit-license.php" title="http://www.opensource.org/licenses/mit-license.php">http://www.opensource.org/licenses/mit-license.php</a>
 *
 * Adapted by Rahul Singla.
 *
 * Brantley Harris wrote this plugin. It is based somewhat on the JSON.org
 * website's <a href="http://www.json.org/json2.js" title="http://www.json.org/json2.js">http://www.json.org/json2.js</a>, which proclaims:
 * "NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK.", a sentiment that
 * I uphold.
 *
 * It is also influenced heavily by MochiKit's serializeJSON, which is
 * copyrighted 2005 by Bob Ippolito.
 */

/**
 * jQuery.JSON.encode( json-serializble ) Converts the given argument into a
 * JSON respresentation.
 *
 * If an object has a "toJSON" function, that will be used to get the
 * representation. Non-integer/string keys are skipped in the object, as are
 * keys that point to a function.
 *
 * json-serializble: The *thing* to be converted.
 */

var CookieHelper = (function($j, window, undefined){
    return {
        set: function(c_name, value, exdays){
            var exdate  = new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var c_value = escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
            document.cookie = c_name + "=" + c_value + '; path=/';
        },
        get: function(c_name){
            var i, x, y;
            var ARRcookies = document.cookie.split(";");
            for (i = 0; i < ARRcookies.length; i++){
                x = ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
                y = ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
                x = x.replace(/^\s+|\s+$/g,"");
                if (x == c_name){
                    return unescape(y);
                }
            }
        }
    }
}(jQuery, window));

jQuery.JSON = {
    encode: function(o) {
        if (typeof (JSON) == 'object' && JSON.stringify)
            return JSON.stringify(o);

        var type = typeof (o);

        if (o === null)
            return "null";

        if (type == "undefined")
            return undefined;

        if (type == "number" || type == "boolean")
            return o + "";

        if (type == "string")
            return this.quoteString(o);

        if (type == 'object') {
            if (typeof o.toJSON == "function")
                return this.encode(o.toJSON());

            if (o.constructor === Date) {
                var month = o.getUTCMonth() + 1;
                if (month < 10)
                    month = '0' + month;

                var day = o.getUTCDate();
                if (day < 10)
                    day = '0' + day;

                var year = o.getUTCFullYear();

                var hours = o.getUTCHours();
                if (hours < 10)
                    hours = '0' + hours;

                var minutes = o.getUTCMinutes();
                if (minutes < 10)
                    minutes = '0' + minutes;

                var seconds = o.getUTCSeconds();
                if (seconds < 10)
                    seconds = '0' + seconds;

                var milli = o.getUTCMilliseconds();
                if (milli < 100)
                    milli = '0' + milli;
                if (milli < 10)
                    milli = '0' + milli;

                return '"' + year + '-' + month + '-' + day + 'T' + hours + ':'
                + minutes + ':' + seconds + '.' + milli + 'Z"';
            }

            if (o.constructor === Array) {
                var ret = [];
                for (var i = 0; i < o.length; i++)
                    ret.push(this.encode(o[i]) || "null");

                return "[" + ret.join(",") + "]";
            }

            var pairs = [];
            for (var k in o) {
                var name;
                var type = typeof k;

                if (type == "number")
                    name = '"' + k + '"';
                else if (type == "string")
                    name = this.quoteString(k);
                else
                    continue; // skip non-string or number keys

                if (typeof o[k] == "function")
                    continue; // skip pairs where the value is a function.

                var val = this.encode(o[k]);

                pairs.push(name + ":" + val);
            }

            return "{" + pairs.join(", ") + "}";
        }
    },

    /**
     * jQuery.JSON.decode(src) Evaluates a given piece of json source.
     */
    decode: function(src) {
        if (typeof (JSON) == 'object' && JSON.parse)
            return JSON.parse(src);
        return eval("(" + src + ")");
    },

    /**
     * jQuery.JSON.decodeSecure(src) Evals JSON in a way that is *more* secure.
     */
    decodeSecure: function(src) {
        if (typeof (JSON) == 'object' && JSON.parse)
            return JSON.parse(src);

        var filtered = src;
        filtered = filtered.replace(/\\["\\\/bfnrtu]/g, '@');
        filtered = filtered
        .replace(
            /"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,
            ']');
        filtered = filtered.replace(/(?:^|:|,)(?:\s*\[)+/g, '');

        if (/^[\],:{}\s]*$/.test(filtered))
            return eval("(" + src + ")");
        else
            throw new SyntaxError("Error parsing JSON, source is not valid.");
    },

    /**
     * jQuery.JSON.quoteString(string) Returns a string-repr of a string, escaping
     * quotes intelligently. Mostly a support function for JSON.encode.
     *
     * Examples: >>> jQuery.JSON.quoteString("apple") "apple"
     *
     * >>> jQuery.JSON.quoteString('"Where are we going?", she asked.') "\"Where
     * are we going?\", she asked."
     */
    quoteString: function(string) {
        if (string.match(this._escapeable)) {
            return '"' + string.replace(this._escapeable, function(a) {
                var c = this._meta[a];
                if (typeof c === 'string')
                    return c;
                c = a.charCodeAt();
                return '\\u00' + Math.floor(c / 16).toString(16)
                + (c % 16).toString(16);
            }) + '"';
        }
        return '"' + string + '"';
    },

    _escapeable: /["\\\x00-\x1f\x7f-\x9f]/g,

    _meta: {
        '\b': '\\b',
        '\t': '\\t',
        '\n': '\\n',
        '\f': '\\f',
        '\r': '\\r',
        '"': '\\"',
        '\\': '\\\\'
    }
}

/*
 * FUNCTIONS By 15 Green leaves
 *
 */


var meta_marker='';//_value
var apm_show_attributes=false;
var filters={};
var sortby_ajax='default';
var sort_dir='ASC';

function setCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function deleteCookie(name) {
    setCookie(name,"",-1);
}
var fgl_setAutoSetSaveTitle=function(obj){
    form=jQuery('#post');
    var ob=obj
    jQuery('#post').attr('obj',obj);
    jQuery('#post').live('submit',function(){
        //alert(jQuery(this).attr('obj'));

        ///SEt POST TITLE FROM OTHER FIELDS FOLLOWING SCHEMA
        postTitleObj=jQuery('input[name="post_title"]');
        var str=ob.schema;
        jQuery.each(ob.fields,function(index, field) {
            //alert(index + ': ' + field.field+ ': ' + field.field_type);
            fi=jQuery('input[name="'+field.field+meta_marker+'"]');
            if(field.field_type!=='select'){
                if(field.field_type=='autocomplete'){
                    fi=jQuery('input[name="'+field.field+'_displayvalue"]');
                }
                str=str.split('{'+field.field+'}').join(jQuery(fi).val());
            } else {
                o=jQuery('#'+field.field);
                v=jQuery(o).find('option:selected').text();
                str=str.split('{'+field.field+'}').join(v);
            }
        })
        D=new Date();
        str=str.split('[currentdate]').join(D.getFullYear()+"-"+D.getMonth()+"-"+D.getDate());
        jQuery(postTitleObj).val(str);

        //CHECK REQUIRED
        var test=true;
        fi=jQuery('input[class="apm_is_required"]');
        jQuery.each(fi,function(index, field) {
            if(jQuery(field).val()==""){
                test=false;
                jQuery(field).parent().parent().addClass('apm_invalid');
            }
        });

        //CHECK EMAIL
        fi=jQuery('input[class="apm_is_email"]');
        jQuery.each(fi,function(index, field) {
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            var address = jQuery(field).val();
            if(reg.test(address) == false && address!=='') {
                jQuery(field).parent().parent().addClass('apm_invalid');
                test=false;
            }
        });

        //CHECK NUMBERS
        fi=jQuery('input[class="apm_is_numbers"]');
        jQuery.each(fi,function(index, field) {
            var num = jQuery(field).val();
            if ( isNaN(num)) {
                jQuery(field).parent().parent().addClass('apm_invalid');
                test=false;
            }
        });


        //CHECK PHONE
        fi=jQuery('input[class="apm_is_phone"]');
        jQuery.each(fi,function(index, field) {
            var phone = jQuery(field).val();
            var stripped = phone.replace(/[\(\)\.\-\+\ ]/g, '');
            if (isNaN(stripped)) {
                jQuery(field).parent().parent().addClass('apm_invalid');
                test=false;
            } else if (stripped.length <8 && stripped.length >0 ) {
                jQuery(field).parent().parent().addClass('apm_invalid');
                test=false;
            }
        });

        if(test==false){
            // alert("Some fields are invalid.")
            flg_apm.setAlertPanel.addAlert('Error','Some fields are invalid...','error',3000);
            return false;
        }

    });

}
var fgl_setAutoSetTitle=function(obj){
    var inputs=jQuery(':input');
    //alert(posttitle);
    var myobj=obj;
    var postTitleObj=null;
    postTitleObj=jQuery('input[name="post_title"]');
    var str=obj.schema;
    jQuery.each(obj.fields,function(index, field) {
        //alert(index + ': ' + field.field+ ': ' + field.field_type);
        fi=jQuery('input[name="'+field.field+meta_marker+'"]');
        if(field.field_type!=='select'){
            if(field.field_type=='autocomplete'){
                fi=jQuery('input[name="'+field.field+'_displayvalue"]');
            }
            str=str.split('{'+field.field+'}').join(jQuery(fi).val());

        } else {
            o=jQuery('#'+field.field);
            v=jQuery(o).find('option:selected').text();
            str=str.split('{'+field.field+'}').join(v);
        }
    })
    D=new Date();
    str=str.split('[currentdate]').join(D.getFullYear()+"-"+D.getMonth()+"-"+D.getDate());
    jQuery(postTitleObj).val(str);
    return;
}


var apm_convert=function(o,action,post_id,appname,post_type){
    document.location.href="admin.php?page="+appname+"-main-menu&post_id="+post_id+"&action_name="+action+"&post-type="+post_type+"&action-type=convert";

}

var apm_actionbtn=function(o,action,post_id,appname,post_type){
    var fields=jQuery(o).attr('fields');
    oFields=eval(fields);
    jQuery.each(oFields, function(key,field){
        fieldToUpdate=jQuery('input[name="'+field[0]+meta_marker+'"]');
        if(jQuery(fieldToUpdate).val()==undefined){
            if(document.post[field[0]+meta_marker]!==undefined){//= is select
                o=document.post[field[0]+meta_marker].options[0];
                //document.post[field[0]+meta_marker].selectedIndex =5;
                for (var i = 0; i < document.post[field[0]+meta_marker].length; i++)
                {
                    if(Number(field[1])==NaN || field[2]=='text'){
                        //console.log(document.post[field[0]+meta_marker].options[i].text +"//"+ field[1]);
                        if (document.post[field[0]+meta_marker].options[i].text == field[1]){
                            document.post[field[0]+meta_marker].selectedIndex =i;
                        }
                    } else if (Number(document.post[field[0]+meta_marker].options[i].value) == Number(field[1]))
{
                        //alert(document.post[field[0]+meta_marker].options[i].value +'-'+ field[1]);
                        document.post[field[0]+meta_marker].selectedIndex =i;
                    //document.post[field[0]+meta_marker].selected = true;
                    }
                }
            }
            if(tinyMCE.get(field[0]+meta_marker+'_comment')!==undefined){
                txt=tinyMCE.get(field[0]+meta_marker+'_comment').getContent();//jQuery(commentBlock).attr("value");
                //tinyMCE.get('content id').getContent()
                tinyMCE.get(field[0]+meta_marker+'_comment').setContent(field[1]);
            }
        //jQuery(fieldToUpdate).val("3");
        } else {
            val=field[1];
            if(val=='NOW()'){
                do_update=true;
                if(field[2]=="if_empty"){
                    do_update=false;
                    checkv=jQuery(fieldToUpdate).val();
                    if(checkv==""){
                        do_update=true;
                    }
                }
                if(do_update){
                    var myDate=new Date();
                    m=myDate.getMonth();
                    m++;
                    if(m<10){
                        m='0'+m;
                    }
                    d=myDate.getDate();
                    if(d<10){
                        d='0'+d;
                    }
                    val=m+"/"+d+"/"+myDate.getFullYear();
                } else {
                    val="dont_update";
                }
            }
            if(val=='TIME()'){
                var myDate=new Date();
                h=myDate.getHours();
                m=myDate.getMinutes();
                if(m<10){
                    m='0'+m;
                }
                if(h<10){
                    d='0'+h;
                }
                val=h+":"+m;
            }
            if(val!=="dont_update"){
                jQuery(fieldToUpdate).val(val);
            }
        }

    });
    jQuery("#post").submit();
//document.location.href="admin.php?page="+appname+"-main-menu&post_id="+post_id+"&action_name="+action+"&post-type="+post_type+"&action-type=convert";
//return false;
}

var apm_add_notif=function(o){
    var userList=jQuery(o).prev();
    var notifField=jQuery(o).next();
    //alert(userList.val());
    if(notifField.val().indexOf(',')>-1){
        var notifUsersList=notifField.val().split(',');
    } else if(notifField.val()!==""){
        var notifUsersList=[notifField.val()];
    }
    var userToAdd=userList.val();


    var newNotifUsersList=[];
    var already_exist=false;
    if(notifField.val()!==""){
        jQuery.each(notifUsersList, function(key,userid){
            if(Number(userid)!==Number(userToAdd) && Number(userid)!==0){
                newNotifUsersList.push(userid);
            } else {
                already_exist=true;
            }
        });
    }
    newNotifUsersList.push(userToAdd);
    //alert(jQuery(o).next().next().html());
    if(already_exist==false){
        newUserStr="<span class='apm_user_listed'>"+jQuery(o).prev().find("option:selected").text()+" <div><img src='"+apm_settings.paths.img+"/delete_16.png'' onclick='apm_remove_notif(this,"+userToAdd+ ");' style='cursor:pointer;' fieldname='"+jQuery(o).attr('fieldname')+"'/></div></span>";
        jQuery(o).prev().prev().prev().prev().append(newUserStr);
    }
    //
    notifField.val(newNotifUsersList.join(','));

}

var apm_remove_notif=function(o,id){
    jQuery(o).parent().parent().hide();
    field=jQuery('#'+jQuery(o).attr('fieldname')+'_apm');
    var idToRemove=id;



    if(field.val().indexOf(',')>-1){
        var notifUsersList=field.val().split(',');
        newNotifUsersList=[];
        jQuery.each(notifUsersList, function(key,userid){
            if(Number(userid)!==Number(idToRemove) ){
                newNotifUsersList.push(userid);
            }
        });
        field.val(newNotifUsersList.join(','));
    } else {
        //alert(field.val());
        field.val('');
    }


//alert(newNotifUsersList);
//alert(field+"/"+jQuery(field).val());
}

var center_layer=function(obj){
    w=obj.width();
    h=obj.height();
    obj.css('left',((jQuery(window).width()-w)/2)+"px");
    s=jQuery(window).scrollTop() ;
    winh=jQuery(window).height();
    obj.css('top',((winh-h)/2+s)+"px");
}

var apm_show_categ_add=function(obj){

    div=jQuery("#apm_categ_layer");
    tagcateg=jQuery("#tag-categ");
    jQuery(tagcateg).attr('value',jQuery(obj).attr('category_name'));
    //alert();

    center_layer(div);
    div.show();
    name=jQuery("#tag-name");
    name.focus();
}

var fgl_addCategory=function(obj){
    div=jQuery("#apm_categ_layer");
    name=jQuery("#tag-name");
    slug=jQuery("#tag-slug");
    tagcateg=jQuery("#tag-categ");
    description=jQuery("#tag-description");
    layer_sending=jQuery("#apm_categ_layer_sending");
    layer_button=jQuery("#apm_categ_layer_button");
    alertdiv=jQuery("#apm_categ_layer_alert");
    categname=jQuery(tagcateg).val();
    checklist=jQuery("#"+categname+"checklist");
    if(jQuery(name).val()==''){
        alertdiv.show();
        name.focus();
    } else {
        alertdiv.hide();
        layer_button.hide();
        layer_sending.show();
        jQuery.ajax({
            url: ajaxurl ,
            type: "POST",
            data: "name="+jQuery(name).val()+"&slug="+jQuery(slug).val()+"&description="+jQuery(description).val()+"&tagcateg="+jQuery(tagcateg).val()+"&action=apm_add_category",
            //context: document.body,
            success: function(data){
                dataStr=String(data);
                dataStr=dataStr.substring(0,dataStr.length-1);
                dataStr=Number(dataStr);
                checklist.append('<li id="'+categname+'-'+dataStr+'"><label class="selectit"><input value="'+dataStr+'" name="tax_input['+categname+'][]" id="in-'+categname+'-'+dataStr+'" type="checkbox"> '+jQuery(name).val()+'</label></li>');
                layer_sending.hide();
                layer_button.show();
                jQuery(name).val('');
                jQuery(slug).val('');
                jQuery(description).val('');
                div.hide();
            }
        });
    }

}
var fgl_cancelAddCategory=function(obj){
    div=jQuery("#apm_categ_layer");
    div.hide();
}
//

///RTE INIT

var fgl_initRTE=function(){

    $('.apm_show_desc_rte').off('click').on('click',function(){
        t=$(this);
        p=t.parents('.apm_rte_container');
        o=$(p).find('.hidden_rte');
        $(o).removeClass('hidden');
        o=$(p).find('.rte_content');
        $(o).addClass('hidden');
    });


    $('.apm_show_desc_txt').off('click').on('click',function(){
        t=$(this);
        p=t.parents('.apm_rte_container');
        o=$(p).find('.hidden_rte');
        $(o).addClass('hidden');
        o=$(p).find('.rte_content');
        $(o).removeClass('hidden');
        o=$(p).find('.rte_textarea_value');
        os=$(p).find('.rte_content_txt');
        $(os).html($(o).val());
    //
    });
}
//
//
///AJAX CHILD TABLES

var fgl_initChildTables=function(){




    $('.apm_childtable_refresh').off('click').on('click',function(){

        var t=$(this);
        p=t.parents('.apm_childtable');
        tbody=$(p).find('.apm_tablebody');
        nb_cols=$(tbody).attr('data-nb_cols');
        $(tbody).html('<tr><td colspan="'+nb_cols+'" >Loading, please wait... <i class="icon-refresh "></i><td></tr>');

        post_id=$(tbody).attr('data-post_id');
        post_type=$(tbody).attr('data-post_type');
        meta_key=$(tbody).attr('data-meta_key');
        field=$(tbody).attr('data-field');
        fgl_getChildTables($(tbody),post_id,post_type,meta_key,'',field);
    })

    $.each($('.apm_tablebody'), function(i,o){
        var t=$(o);
        tabpan=$(t).parents('.tab-pane');
        post_id=t.attr('data-post_id');
        post_type=t.attr('data-post_type');
        meta_key=t.attr('data-meta_key');
        field=t.attr('data-field');
        id=$(tabpan).attr('id');
        a=$(tabpan).parents('.inside').find('.nav-tabs a[href$="#'+id+'"]:first');
        a=$(a);
        if($(tabpan).hasClass('active')){
            // alert(post_type);
            a.attr('data-isloaded','true');
            fgl_getChildTables(t,post_id,post_type,meta_key,'',field);
        }else{

            a.attr('data-post_id',post_id);
            a.attr('data-isloaded','false');
            a.attr('data-childtabid',id);
            a.attr('data-post_type',post_type);
            a.attr('data-meta_key',meta_key);
            a.attr('data-field',field);
            a.off('click').on('click',function(){
                t=$(this);

                isloaded=t.attr('data-isloaded');
                if(isloaded=='false'){
                    post_id=t.attr('data-post_id');
                    id=t.attr('data-childtabid');
                    table=$('#'+id).find('.apm_tablebody');
                    //alert($(table).html());
                    post_type=t.attr('data-post_type');
                    meta_key=t.attr('data-meta_key');
                    field=t.attr('data-field');
                    fgl_getChildTables(table,post_id,post_type,meta_key,'',field);
                }
            });
        }
    } );

    $('.apm_childtable_dosearch_clear').off('click').on('click',function(){
        var t=$(this);
        p=t.parents('.apm_childtable');
        cb=t.parents('.apm_search_childtable_block');
        inp=$(cb).find('.search-query');
        search="";
        $(inp).val('');
        tbody=$(p).find('.apm_tablebody');
        fgl_searchChildTables(tbody,search);
    });
    $('.apm_childtable_dosearch').off('click').on('click',function(){
        var t=$(this);
        p=t.parents('.apm_childtable');
        cb=t.parents('.apm_search_childtable_block');
        inp=$(cb).find('.search-query');
        search=$(inp).val();
        if(search!==""){
            tbody=$(p).find('.apm_tablebody');
            fgl_searchChildTables(tbody,search);
        }else {
            flg_apm.setAlertPanel.addAlert('Error','Please input a search string..','error',3000);
        }
    } );
}

var fgl_searchChildTables=function(tbody,search){

    nb_cols=$(tbody).attr('data-nb_cols');
    $(tbody).html('<tr><td colspan="'+nb_cols+'" >Loading, please wait... <i class="icon-refresh "></i><td></tr>');

    post_id=$(tbody).attr('data-post_id');
    post_type=$(tbody).attr('data-post_type');
    meta_key=$(tbody).attr('data-meta_key');
    field=$(tbody).attr('data-field');
    fgl_getChildTables($(tbody),post_id,post_type,meta_key,search,field);

};
var fgl_getChildTables=function(t,post_id,post_type,meta_key,search,field){
    var t=t;
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "action=apm_get_childtable&post_id="+post_id+"&post_type="+post_type+"&meta_key="+meta_key+"&search="+search+"&field="+field,
        error: function(data){
            // alert('An error occured,  please try again');
            flg_apm.setAlertPanel.addAlert('An error occured','An error occured,  please try again...','error',3000);
        },
        success: function(data){
            // datas=String(data);
            datas=$.JSON.decode(data);
            //alert(data+"-"+datas+"-"+datas.str);
            t.html(datas.str);
        }
    });
}
//////COMMENTS
//////////


var fgl_initCommments=function(){
    $('.apm_comment_item').off('mouseover').on('mouseover',function(){
        o=$(this).find('.apm_commedit_btns_cont');
        $(o).css('display','block');
    })
    $('.apm_simplecomment_container textarea').off('focus').on('focus',function(){
        $(this).css('height','100');
    })
    $('.apm_comment_item').off('mouseout').on('mouseout',function(){
        o=$(this).find('.apm_commedit_btns_cont');
        $(o).css('display','none');
    })
    $('.apm_show_comments').off('click').on('click',function(){
        if($(this).hasClass('disabled')==false){
            fn=$(this).parents('.apm_comments_block').attr('data-fieldname');
            o=$('#rte_container_'+fn);
            $(o).show();
            $(this).parents('.apm_comments_block').parent().find('.apm_simplecomment_container').hide();
            $(this).hide();
            $(this).parent().find('.apm_quick_comments').hide();
            $(this).parent().find('.apm_do_post_comments').show();
            $(this).parent().find('.apm_back_quick_comments').show();
        }
    });
    $('.apm_do_post_comments').off('click').on('click',function(){
        if($(this).hasClass('disabled')==false){
            fieldname=$(this).parents('.apm_comments_block').attr('data-fieldname');
            o=$('#rte_container_'+fieldname);
            $(this).addClass('disabled');
            $(this).parent().find('.apm_back_quick_comments').addClass('disabled');
            /* $(o).hide();
               $(this).hide();
               $(this).parent().find('.apm_back_quick_comments').hide();
               $(this).parent().find('.apm_quick_comments').show();
               $(this).parents('.apm_comments_block').parent().find('.apm_simplecomment_container').show();
               $(this).parent().find('.apm_show_comments').show();*/
            //alert($(o).html());
            flg_apm.submitCommentNew(
                this,
                $(o).find('textarea'),
                'rte'
                );
        }
    });
    $('.apm_quick_comments').off('click').on('click',function(){
        if($(this).hasClass('disabled')==false){
            $(this).addClass('disabled');
            $(this).parent().find('.apm_show_comments').addClass('disabled');
            flg_apm.submitCommentNew(
                this,
                $(this).parents('.apm_comments_block').parent().find('.apm_simplecomment_container textarea'),
                'quick'
                );
        }

    });
    $('.apm_edit_comment').off('click').on('click',function(e){
        e.preventDefault();
        frmcont=$(this).parents('.apm_comment_item').find('.comm_edit_in');
        frm=$(this).parents('.apm_comment_item').find('.comm_edit_in_frm');
        apm_comment_content=$(this).parents('.apm_comment_item').find('.apm_comment_content');
        $(frm).val($(apm_comment_content).html());
        $(frmcont).fadeIn(500);
        $(this).addClass("disabled");
        $(this).parents('.apm_comment_item').find('.apm_updatecancel_comment').removeClass("disabled");
        $(this).removeClass("disabled");
        //
        return false;
    });
    $('.apm_updatecancel_comment').off('click').on('click',function(e){
        e.preventDefault();
        frmcont=$(this).parents('.apm_comment_item').find('.comm_edit_in');
        $(frmcont).fadeOut(500);
        $(this).parents('.apm_comment_item').find('.apm_update_comment').removeClass("disabled");
        $(this).parents('.apm_comment_item').find('.apm_edit_comment').removeClass("disabled");
        $(this).removeClass("disabled");
        //
        return false;
    });
    $('.apm_update_comment').off('click').on('click',function(e){
        e.preventDefault();
        var oThis=this;
        var commid=$(this).parents('.apm_comment_item').attr('data-comment_id');
        frmcont=$(this).parents('.apm_comment_item').find('.comm_edit_in');
        var com_edit_alert=$(this).parents('.apm_comment_item').find('.com_edit_alert');
        $(com_edit_alert).show();
        $(this).parents('.apm_comment_item').find('.apm_updatecancel_comment').addClass("disabled");
        $(this).addClass("disabled");

        jQuery.ajax({
            url: ajaxurl ,
            type: "POST",
            data: "comment_id="+commid+"&action=apm_update_comments&comment="+$(frm).val(),
            //context: document.body,
            success: function(data){

                dataStr=String(data);
                dataStr=dataStr.substring(0,dataStr.length-1);
                if(dataStr==commid){
                    frm=$(oThis).parents('.apm_comment_item').find('.comm_edit_in_frm');
                    apm_comment_content=$(oThis).parents('.apm_comment_item').find('.apm_comment_content');
                    $(apm_comment_content).html($(frm).val());
                    $(frmcont).fadeOut(500);
                    $(com_edit_alert).hide();
                    $(oThis).parents('.apm_comment_item').find('.apm_edit_comment').removeClass("disabled");
                    $(oThis).parents('.apm_comment_item').find('.apm_updatecancel_comment').removeClass("disabled");
                    $(oThis).removeClass("disabled");
                }
            },

            error: function(data){
                flg_apm.setAlertPanel.addAlert('Error','Sorry an issue occured, please try again..','error',3000);
                $(com_edit_alert).hide();
                $(oThis).parents('.apm_comment_item').find('.apm_updatecancel_comment').removeClass("disabled");
                $(oThis).removeClass("disabled");
            }
        });

        //
        return false;
    });
    $('.apm_delet_comment').off('click').on('click',function(e){
        e.preventDefault();
        flg_apm.deleteComment(this);
        return false;
    });

    $('.apm_back_quick_comments').off('click').on('click',function(){
        fieldname=$(this).parents('.apm_comments_block').attr('data-fieldname');
        o=$('#rte_container_'+fieldname);
        $(o).hide();
        $(this).hide();
        $(this).parent().find('.apm_do_post_comments').hide();
        $(this).parent().find('.apm_quick_comments').show();
        $(this).parents('.apm_comments_block').parent().find('.apm_simplecomment_container').show();
        $(this).parent().find('.apm_show_comments').show();

    });
}

flg_apm.enableComBtn=function(obj){
    $(obj).parent().find('.apm_quick_comments').removeClass('disabled');
    $(obj).parent().find('.apm_show_comments').removeClass('disabled');
    $(obj).parent().find('.apm_back_quick_comments').removeClass('disabled');
    $(obj).parent().find('.apm_do_post_comments').removeClass('disabled');
}
flg_apm.showGlobAlert=function(title,content){
    $('#ModalGlobal h4').html(title);
    $('#ModalGlobal .modal-body').html(content);
    $('#ModalGlobal').modal('show');
}
flg_apm.getAdminUrl=function(){
    a=ajaxurl.split('wp-admin');
    return a[0]+'wp-admin/';
}
flg_apm.deleteComment=function(obj){//
    fieldname=$(obj).parents('.apm_comments_block').attr('data-fieldname');
    id=$(obj).parents('.apm_comment_item').attr('data-comment_id');
    nbcomments=$(obj).parents('.apm_comments_block').find('.nbcomments');
    var commentTpl=$(obj).parents('.apm_comment_item');

    nb=Number($(nbcomments).html())-1;
    $(nbcomments).html(nb);

    $(commentTpl).animate({
        opacity:0
    },500, function() {
        $(commentTpl).remove();
    })
    jQuery.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "comment_id="+id+"&action=apm_delete_comments",
        //context: document.body,
        success: function(data){

        }
    });
    return false;
}

flg_apm.submitCommentNew=function(objb,objcont,postcase){
    var obj=objb;
    var objsrc=$(obj).parents('.apm_comments_block');
    fieldname=$(obj).parents('.apm_comments_block').attr('data-fieldname');
    post_id=$(obj).parents('.apm_comments_block').attr('data-post_id');
    txt=$(objcont).val();
    $(objsrc).find('.apm_com_submit').show();
    $(objsrc).find('.apm_com_fail').hide();
    $(objsrc).find('.apm_com_success').hide();
    // alert('submitCommentNew');
    jQuery.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "post_id="+post_id+"&comment="+txt+"&action=apm_save_comments&fieldname="+fieldname,
        //context: document.body,
        error: function(data){
            $(objsrc).find('.apm_com_submit').hide();
            $(objsrc).find('.apm_com_fail').show();
            flg_apm.enableComBtn(obj);
        },
        success: function(data){
            $(objsrc).find('.apm_com_submit').hide();
            $(objsrc).find('.apm_com_success').show();

            dataStr=String(data);
            dataStr=dataStr.substring(0,dataStr.length-1);
            dataStr=dataStr.split('***').join("'");

            $(objcont).val('')
            /* dataStr='<div class="well well-small apm_comment_item"><div>By: <strong>DDFSFS</strong>';
                dataStr+=' <span class="apm_commedit_btns_cont"><button rel="tooltip" title="Edit this comment" class="hasTooltip  btn btn-mini   apm_edit_comment"><i class="icon-edit"></i> Edit</button>';
                 dataStr+=' <button rel="tooltip" title="Delete this comment" class="hasTooltip  btn btn-mini   apm_delet_comment"><i class="icon-ban-circle"></i> Delete</button></span>';
                  dataStr+='</div> {content}';
                 dataStr+=' <span style="padding: 8px 0 0 0" class="help-block">Posted on xx/xx/xxxx at 22:22am </span> </div>';*/
            apm_comments_list= $(obj).parents('.apm_comments_block').parent().find('.apm_comments_list');
            nbcomments=$(obj).parents('.apm_comments_block').parent().find('.nbcomments');
            nb=Number($(nbcomments).html())+1;
            $(nbcomments).html(nb);
            $(apm_comments_list).append(dataStr);
            flg_apm.enableComBtn(obj);
            fgl_initCommments();
        /*jQuery(commentLoader).hide();
		jQuery(commentsList).show();
		dataStr=String(data);
		dataStr=dataStr.substring(0,dataStr.length-1);
		dataStr=dataStr.split('***').join("'");
		jQuery(commentsList).append(dataStr);
		jQuery(commentBlock).attr("value",'');
		//jQuery(commentNb).empty();
		nb=Number(jQuery(commentNb).html())+1;
		jQuery(commentNb).html(nb);*/
        //_comment_nb
        }
    });
}

var fgl_deleteComment=function(id,fieldname){
    var commentTpl=jQuery("#apm_comment_"+id);
    var commentNb=jQuery("#"+fieldname+"_comment_nb");

    nb=Number(jQuery(commentNb).html())-1;
    jQuery(commentNb).html(nb);

    commentTpl.animate({
        opacity:0
    },500, function() {
        commentTpl.hide();
    })
    jQuery.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "comment_id="+id+"&action=apm_delete_comments",
        //context: document.body,
        success: function(data){

        }
    });

}
var flg_comments_list=[];
var fgl_add_to_comments_list=function(id,fieldname,post_id){
    flg_comments_list.push({
        id:id,
        fieldname:fieldname,
        post_id:post_id
    });
}
var fgl_submitComment=function(id,fieldname,post_id){
    commentBlock=jQuery("#"+id);
    commentTpl=jQuery("#"+fieldname+"_comment_tpl");
    lang=jQuery("#"+fieldname+"_lang option:selected").val() ;
    if(lang==undefined){
        lang='false';
    }
    var commentsList=jQuery("#"+fieldname+"_comments_list");
    var commentLoader=jQuery("#"+fieldname+"_comment_loader");
    var commentNb=jQuery("#"+fieldname+"_comment_nb");
    jQuery(commentLoader).show();
    txt=tinyMCE.activeEditor.getContent();//jQuery(commentBlock).attr("value");
    tinyMCE.activeEditor.setContent('');
    jQuery.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "lang="+lang+"&post_id="+post_id+"&comment="+txt+"&action=apm_save_comments&fieldname="+fieldname,
        //context: document.body,
        error: function(data){
            // alert('An error occured,  please try again');
            flg_apm.setAlertPanel.addAlert('An error occured','An error occured,  please try again...','error',3000);
        },
        success: function(data){
            jQuery(commentLoader).hide();
            jQuery(commentsList).show();
            dataStr=String(data);
            dataStr=dataStr.substring(0,dataStr.length-1);
            dataStr=dataStr.split('***').join("'");
            jQuery(commentsList).append(dataStr);
            jQuery(commentBlock).attr("value",'');
            //jQuery(commentNb).empty();
            nb=Number(jQuery(commentNb).html())+1;
            jQuery(commentNb).html(nb);
        //_comment_nb
        }
    });
//alert(fieldname+"-"+commentTpl+"-"+jQuery(commentTpl).text());


};


///END COMMENTS


//////TOPBAR

flg_apm.initTopBar=function(){

    $('.apm_is_status').off('click').on('click',function(){
        is_active=$(this).hasClass('active');

        if(is_active==false){
            $(this).parent().find('a').removeClass('active');
            $(this).addClass('active');
            alertB=$(this).parents('.topnav_bar').find('.alert-info');
            $(alertB).html('Submitting Status update....');
            $(alertB).fadeIn(200);
        }
    });





    $('.apm_is_status').off('click').on('click',function(){
        is_active=$(this).hasClass('active');

        if(is_active==false){
            $(this).parent().find('a').removeClass('active');
            $(this).addClass('active');
            var alertB=$(this).parents('.topnav_bar').find('.alert-info');
            $(alertB).html('Submitting Status update....');
            flg_apm.do_show_submitting(this);
            $('#post_status').val($(this).attr('data-status'));
            $('#publish').trigger('click');
            $('#post').submit();
        // flg_apm.do_update_status($(this).attr('data-status'),this);
        }
    });
    $('.apm_trash_post').off('click').on('click',function(e){
        e.preventDefault();
        var alertB=$(this).parents('.topnav_bar').find('.alert-info');
        var modal=$('#confirmModal');
        var  modalB =$(modal).find('.modal-body');
        $(modalB).html('<p>Do you really want to TRASH this item?</p>');
        $(modal).modal('show');

        $(modal).find('.apm_confirm_no').off('click').on('click',function(e){
            $(modal).modal('hide');
        });
        $(modal).find('.apm_confirm_yes').off('click').on('click',function(e){
            $(modal).modal('hide');
            $(alertB).html('Trashing post....');
            flg_apm.do_show_submitting(alertB);
            flg_apm.do_update_status('trash',this,'admin.php?page=15CRM-ff_tasks');
        });

    });
    $('.apm_open_preview').off('click').on('click',function(e){
        e.preventDefault();
        window.open($(this).attr('data-url'));
    });
    $('.apm_update_post').off('click').on('click',function(e){
        e.preventDefault();

		//if(!flg_apm.setOfficeFields.setValidateForm())
			//flg_apm.setAlertPanel.addAlert('Invalid Input','Please fill correctly the fields.','error',4000);
		//else{
			alertB=$(this).parents('.topnav_bar').find('.alert-info');
			$(alertB).html('Saving post....');
			flg_apm.do_show_submitting(this);
			$('#publish').trigger('click');
			$('#post').submit();
		//}
    });
};

flg_apm.do_show_submitted=function(obj){
    parent_obj=$(obj).parents('.topnav_bar');
    alertS2=$(parent_obj).find('.alert-success');
    alertB2=$(parent_obj).find('.alert-info');
    $(alertB2).hide();
    $(alertS2).fadeIn(200).delay(2000).fadeOut(200);
};
flg_apm.do_show_submitting=function(obj){
    parent_obj=$(obj).parents('.topnav_bar');
    alertS3=$(parent_obj).find('.alert-success');
    alertB3=$(parent_obj).find('.alert-info');
    $(alertS3).hide();
    $(alertB3).fadeIn(200);
};
flg_apm.do_update_status=function(status,obj,redirect){
    post_ID=$('#post_ID').val();
    var do_redirect=false;
    if(redirect!==undefined){
        do_redirect=redirect;
    }
    jQuery.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "action=apm_udpate_status&status="+status+"&post_id="+post_ID,
        error: function(data){
            // alert('An error occured,  please try again');
            flg_apm.setAlertPanel.addAlert('An error occured','An error occured,  please try again...','error',3000);
        },
        success: function(data){
            dataStr=String(data);
            if(do_redirect!==false){
                ur=ajaxurl.split(userSettings.url);
                ur2=ur[0]+userSettings.url+"wp-admin/";
                document.location.href=ur2+do_redirect;
            } else {
                flg_apm.do_show_submitted(obj);
            /* alertS=$(alertB).parents('.topnav_bar').find('.alert-success');
                             $(alertB).hide();
                             $(alertS).fadeIn(200);*/
            }
        //if()
        }
    });

}
///END TOPBAR

var fgl_manageCategories=function(){//use all_categories
    jQuery.each(all_categories, function(key, categ){
        categdiv=jQuery("#"+key+"div");
        jQuery(categdiv).css('display','none');
    });

//
}

var apm_rte_controls={};
var tabs_obj=[];
jQuery(document).ready(function(){
    fgl_initChildTables();
    fgl_initRTE();
    fgl_initCommments();
    flg_apm.initTopBar();
    apm_rte_controls={
        controls: {
            bold          : {
                visible : true
            },
            italic        : {
                visible : true
            },
            underline     : {
                visible : true
            },
            strikeThrough : {
                visible : true
            },


            h4: {
                visible: true,
                className: 'h4',
                command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
                arguments: ($.browser.msie || $.browser.safari) ? '<h4>' : 'h4',
                tags: ['h4'],
                tooltip: 'Header 4'
            },
            h5: {
                visible: true,
                className: 'h5',
                command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
                arguments: ($.browser.msie || $.browser.safari) ? '<h5>' : 'h5',
                tags: ['h5'],
                tooltip: 'Header 5'
            },
            h6: {
                visible: true,
                className: 'h6',
                command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
                arguments: ($.browser.msie || $.browser.safari) ? '<h6>' : 'h6',
                tags: ['h6'],
                tooltip: 'Header 6'
            },
            justifyLeft   : {
                visible : true
            },
            justifyCenter : {
                visible : true
            },
            justifyRight  : {
                visible : true
            },
            justifyFull   : {
                visible : true
            },

            indent  : {
                visible : true
            },
            outdent : {
                visible : true
            },

            subscript   : {
                visible : true
            },
            superscript : {
                visible : true
            },

            undo : {
                visible : true
            },
            redo : {
                visible : true
            },

            insertOrderedList    : {
                visible : true
            },
            insertUnorderedList  : {
                visible : true
            },
            insertHorizontalRule : {
                visible : true
            },

            cut   : {
                visible : true
            },
            copy  : {
                visible : true
            },
            paste : {
                visible : true
            },
            html  : {
                visible: true
            },
            //increaseFontSize : { visible : true },
            //decreaseFontSize : { visible : true },
            exam_html: {
                exec: function() {
                    this.insertHtml('<abbr title="exam">Jam</abbr>');
                    return true;
                },
                visible: true
            }
        },
        events: {
            click: function(event) {
            /*if ($("#click-inform:checked").length > 0) {
					event.preventDefault();
					alert("You have clicked jWysiwyg content!");
				}*/
            }
        }
    };
    var winh=jQuery(window).height();
    var winw=jQuery(window).width();
    tabs(tabs_obj);
    if(getCookie('ApmAdvSearch')==null){
        setCookie('ApmAdvSearch','hidden',2);
        var AdvSearch='hidden';
    } else {
        var AdvSearch=getCookie('ApmAdvSearch');

    }
    jQuery("#post").submit(function() {


        jQuery.each(flg_comments_list, function(key, comment_block){

            txt=tinyMCE.get(comment_block.id).getContent()
            //alert(txt+'-');
            jQuery("#"+comment_block.id).html(txt);
        });
        return true;
    });




    $('.do_fileupload_remove').live('click',function(){

        fieldset=$(this).parents('fieldset');
        fieldname=$(fieldset).attr("fieldname");
        li=$(this).parents('li');
        count=$(li).attr('data-count');
        inp=$(fieldset).find('input.uploadinput_'+fieldname+'_'+(count));
        // flg_apm['fieldname'].count--;
        $(li).remove();
        if(Number(count)>1){
            $(inp).remove();
        }else {
            inp2=$(fieldset).find('input.uploadinput_'+fieldname+'_'+flg_apm['fieldname'].count);
            $(inp2).val('');
            $(inp).val('');
        }

        li=$(this).parents('li');
        lis=$(fieldset).find('li');
        uploadfield_add_file=$(fieldset).find('.uploadfield_add_file');
        $(uploadfield_add_file).val($(lis).length+1);

        inputfile_holder_p=$(apm_uploadfields).find('.inputfile_holder_p');
        inputfile_max_messa=$(apm_uploadfields).find('.inputfile_max_messa');
        $(inputfile_holder_p).show();
        $(inputfile_max_messa).addClass('hidden');
        if($(lis).length==0){
            filenames_container=$(fieldset).find('.filenames_container');
            $(filenames_container).css('display','none');
        }
    });


    $('.all_used_btn').live('click',function(){
        // alert('show_categ_add');
        ot=$(this).parent().find('.most_used_btn');
        $(ot).removeClass('apm_hidden');
        $(this).addClass('apm_hidden');
        lis=$(this).parents('.accordion-group').find('li');
        $.each(lis,function(i,ob){
            $(ob).show();
        });
    });

    $('.most_used_btn').live('click',function(){
        ot=$(this).parent().find('.all_used_btn');
        $(ot).removeClass('apm_hidden');
        $(this).addClass('apm_hidden');
        lis=$(this).parents('.accordion-group').find('li');
        var maxval=0;
        $.each(lis,function(i,ob){
            nb=Number($(ob).attr('data-nbcount'));
            if(nb>maxval){
                maxval=nb;
            }
        });
        $.each(lis,function(i,ob){
            nb=Number($(ob).attr('data-nbcount'));
            if(nb<maxval){
                $(ob).hide();
            } else {
                $(ob).show();
            }
        });
    });


    $('.manage_cat_btn').live('click',function(){
        // alert('show_categ_add');
        });

    $('.send_add_categ_btn').live('click',function(){
        // alert('show_categ_add');
        var name=$('#myModalcategs input.addcateg_name');
        var tagcateg=$('#myModalcategs input.tagcateg');
        var parent=$('#myModalcategs select');
        description=$('#myModalcategs textarea');
        if($(name).val()==""){
            flg_apm.setAlertPanel.addAlert('Error','The name cannot be empty...','error',3000);
            return false;
        }
        $('#myModalcategs .modal_add_categ_alert').html('Submitting... ');

        $.ajax({
            url: ajaxurl ,
            type: "POST",
            data: "name="+$(name).val()+"&parent="+$(parent).val()+"&description="+$(description).val()+"&tagcateg="+$(tagcateg).val()+"&action=apm_add_category",
            //context: document.body,
            error: function(data){
                $('#myModalcategs .modal_add_categ_alert').html('<span style="color:red">Sorry, an error occured.</span> ');
                flg_apm.setAlertPanel.addAlert('An error occured','An error occured,  please try again...','error',3000);
            },
            success: function(data){
                name=$(name).val();
                parent=$(parent).val();
                tagcateg=$(tagcateg).val()
                $('#myModalcategs input.addcateg_name').val('');
                $('#myModalcategs textarea').val('');
                dataStr=String(data);
                dataStr=Number(dataStr);
                $('#myModalcategs .modal_add_categ_alert').html('<span style="color:green">Success, category added.</span> ');
                t=setTimeout(function(){
                    $('#myModalcategs .modal_add_categ_alert').html('');
                },2000);
                acco=$('#collapse'+tagcateg);
                lvl=1;
                if(parent=="0"){
                    selid=false;
                }else{
                    ;
                    lis=$(acco).find('li');
                    selid=false;
                    selobj=false;
                    $.each(lis,function(i,ob){
                        id=$(ob).attr('data-id');
                        console.log(id+"-"+parent);
                        if(id==parent){
                            selid=id;
                            selobj=ob;
                            subname=$(ob).attr('data-name');
                            lvl=Number($(ob).attr('data-lvl'))+1;
                        }
                    });
                }
                if(selid==false){
                    $('.categ_list',acco).prepend('<li data-lvl="'+lvl+'" data-nbcount="0" data-id="'+dataStr+'" data-name="'+name+'" ><input class="categ_checkb"  value="'+dataStr+'" name="tax_input['+tagcateg+'][]" id="in-'+tagcateg+'-'+dataStr+'"  type="checkbox"><label> '+name+' (<span class="cat_count">0</span>) </label></li>');

                }else{
                    $(selobj).after('<ul class="subcateg_list"><li data-lvl="'+lvl+'" data-nbcount="0" data-id="'+dataStr+'" data-name="'+name+'" ><input class="categ_checkb"  value="'+dataStr+'" name="tax_input['+tagcateg+'][]" id="in-'+tagcateg+'-'+dataStr+'"  type="checkbox"><label> '+name+' (<span class="cat_count">0</span>) </label></li></ul>');
                }
                flg_apm.setAddCategCombo(tagcateg);
            }
        });
    });
    flg_apm.setAddCategCombo=function(categ){
        acco=$('#collapse'+categ);
        lis=$(acco).find('li');
        var sel=$('#myModalcategs select');
        $(sel).html('<option value="0">-- None --</option>');
        $.each(lis,function(i,ob){
            id=$(ob).attr('data-id');
            name=$(ob).attr('data-name');
            lvl=Number($(ob).attr('data-lvl'));
            lvlstr="";
            for(i=0;i<lvl;i++){
                lvlstr+="_ _ ";
            }
            console.log('<option value="'+id+'">'+lvlstr+name+'</option>');
            $(sel).append('<option value="'+id+'">'+lvlstr+name+'</option>') ;
        });
    }

    $('.add_categ_btn').live('click',function(){
        categ=$(this).attr('data-categ');
        $('#myModalcategs input.tagcateg').val(categ);
        $('#myModalcategs input.addcateg_name').val('');
        $('#myModalcategs textarea').val('');
        flg_apm.setAddCategCombo(categ);
        $('#myModalcategs').modal('show');
    // alert('show_categ_add');
    });

    $('.manage_cat_btn').live('click',function(){

        categ=$(this).attr('data-categ');

        flg_apm.showGlobAlert('Manage Category','Opening the category manegement page, please wait...');
        document.location.href=flg_apm.getAdminUrl()+"edit-tags.php?taxonomy="+categ;
    });

    $('.show_categ_add').live('click',function(){
        });


    $('.categ_checkb').live('click',function(){
        o=$(this).parents('li').find('.cat_count');
        nb=Number($(o).html())
        c=$(this).attr('checked');
        if(c=='checked'){
            nb++;
        }else {
            nb--;
            if(nb<0){
                nb=0;
            }
        }
        $(o).html(nb);
        $(this).parents('li').attr('data-nbcount',nb);
    });

    $('.multiselect_classic').live('change',function(){
        selvals=[];
        $("option:selected", $(this)).each(function(){
            var obj = $(this).val();
            if(obj!=="none" && obj!=='-'){
                selvals.push(obj);
            }
        });
        p=$(this).prev();
        $(p).val(selvals.join(' - '));
    });
    var admin_url=userSettings.url+'wp-admin/';



    $('.apm_open_user').live('click',function(){
        uid=$(this).attr('user_id');
        if(uid!=='' && uid!==undefined){
            strUrl=admin_url+"user-edit.php?user_id="+uid;
            window.open(strUrl);
        }
    });

    $('.apm_add_user').live('click',function(){
        strUrl=admin_url+"user-new.php";
        window.open(strUrl);
    });


    $('.apm_open_edit').live('click',function(){
        inp=$(this).parents('.controls').find('.autocomplete_field_value');
        //alert($(inp).val());
        if($(inp).val()!==undefined){
            strUrl=admin_url+"post.php?post="+$(inp).val()+"&action=edit";
            window.open(strUrl);
            return;
        }
        p=$(this).parents('.controls').find('option:selected');
        if($(p).html()!==undefined){
            strUrl=admin_url+"post.php?post="+$(p).val()+"&action=edit";
            window.open(strUrl);
            return;
        }
    });


    $('.apm_add_directajax').live('click',function(){
        post_type=$(this).attr('post_type');
        valsource=$(this).parents('.controls').find('.autocomplete_field');//
        // alert($(valsource).val());
        if(post_type!==undefined){

        }
    });
    $('.apm_add_edit').live('click',function(){
        post_type=$(this).attr('post_type');
        if(post_type!==undefined){
            strUrl=admin_url+"post-new.php?post_type="+post_type;
            window.open(strUrl);
        }
    });

    // jQuery.('.hasTooltip').tooltip('show');
    //  alert(" jQuery('.hasTooltip').o");

    //****AUTOSUGGEST MULTISELECT FUNCTIONS***///
    //

    jQuery(".multi_select_autosuggest_list > li > img").live('click', function(e){
        id=jQuery(this).attr('item_id');
        p=jQuery(this).parent().parent().parent();
        p=jQuery(p).find('.autocomplete_field_real_value');
        pval=jQuery(p[0]).attr('value');
        arrData=pval.split(',');
        li=jQuery(this).parent();
        jQuery(li[0]).hide();
        pos=jQuery.inArray(id, arrData);
        arrData.splice(pos,1);
        pval=arrData.join(',');
        jQuery(p[0]).attr('value',pval);
    });

    jQuery(".add_multi_select_autosuggest_list").live('click', function(e){

        p=jQuery(this).parent().parent();
        fstr=jQuery(p).find('.autocomplete_field');
        fval=jQuery(p).find('.autocomplete_field_value');
        prealval=jQuery(p).find('.autocomplete_field_real_value');
        plist=jQuery(p).find('.multi_select_autosuggest_list');
        realval=jQuery(prealval[0]).attr('value');
        str=jQuery(fstr[0]).attr('value');
        val=jQuery(fval[0]).attr('value');
        if(realval!==''){
            arrData=realval.split(',');
        } else {
            arrData=[];
        }
        if(val!==''){
            if(jQuery.inArray(val, arrData)!==-1){
                flg_apm.setAlertPanel.addAlert('Error','This item is already in the list...','error',3000);
            } else  {
                arrData.push(val);
                pval=arrData.join(',');
                jQuery(prealval[0]).attr('value',pval);
                s='<li><a href="post.php?action=edit&post='+val+'" title="Click to open the related item edit form">'+str+' </a>';
                s+='<img src="'+apm_settings.paths.img+'block_16.png" title="Click to remove this item from the list" item_id="'+val+'"></li>';

                jQuery(plist).append(s);
            }
        } else {
            flg_apm.setAlertPanel.addAlert('Error','Sorry, you need first to select an item in the auto suggest field above','error',3000);
        }
    });



    //******DATAGRID FUNCTIONS***///

    ///CALL datagrid data ajax


    data_grids=jQuery(".apm_table_tbody");

    var apm_load_data_grid=function(data_grid,param_filter_key,param_filter_value,sortby){
        modulekey=jQuery(data_grid).attr('modulekey');
        shown=jQuery(data_grid).attr('shown');
        if(shown=='true'){
            var table=jQuery(data_grid);
            var grid=jQuery(data_grid).parents('.apm_grid_block_cls');
            var status_zone=grid.find('.apm_grid_status_zone');
            status_zone.html(' <span  class="apm_loader_img" ><img src="'+apm_settings.paths.css+'images/ui-anim_basic_16x16.gif" ></span><span class="apm_status_txt"><span class="apm_highlight">Status: </span>Loading records</span>');

            //filters=param_filters==undefined? false:param_filters;
            if(param_filter_key!==undefined && param_filter_key!==''){
                filters[param_filter_key]=param_filter_value;
            }
            if(sortby!==undefined && sortby!==''){
                sortby_ajax=sortby;
            }
            filters_str=jQuery.JSON.encode(filters);

            jQuery.ajax({
                url: ajaxurl ,
                type: "POST",
                data: "modulekey="+modulekey+"&action=apm_manage_grid_data&todo=get_data&filters="+filters_str+"&sortby_ajax="+sortby_ajax+"&sort_dir="+sort_dir,
                success: function(data){
                    dataStr=String(data);
                    dataStr=dataStr.substring(0,dataStr.length-1);
                    dataCut=dataStr.split("//cutter//");
                    table.append(dataCut[0])
                    //alert(eval(dataCut[1]);
                    rtrnObj=jQuery.parseJSON( dataCut[1]);

                    if(rtrnObj.filters_results!==""){
                        status_zone.html('<span class="apm_status_txt"><span class="apm_highlight">Status: </span>Records loaded ('+rtrnObj.page_count+' / '+rtrnObj.total_count+'), filtered by: '+rtrnObj.filters_results+'</span>');
                    }else {
                        status_zone.html('<span class="apm_status_txt"><span class="apm_highlight">Status: </span>Records loaded ('+rtrnObj.page_count+' / '+rtrnObj.total_count+')</span>');
                    }

                    gridwrap=jQuery(grid).parents(".apm_datagrid_wrapper");
                    o=jQuery(gridwrap).find('.apm_grid_status_zone_container');
                    obj=jQuery(o[0]).find('.apm_page_first');
                    jQuery(o[0]).attr('last_page',rtrnObj.last_page);
                    //apm_paging_page_nb=new_apm_paging_page_nb;
                    //apm_paging_old_page_nb
                    apm_paging_last_page=rtrnObj.last_page;

                    if(Number(jQuery(o[0]).attr('initial_page'))>Number(rtrnObj.last_page)){
                        jQuery(o[0]).attr('initial_page',rtrnObj.last_page);
                        do_change_paging(Number(rtrnObj.last_page),obj[0],true);
                    //alert('oups');
                    } else {
                        do_change_paging(Number(jQuery(o[0]).attr('initial_page')),obj[0],true);
                    }
                    apm_paging_page_nb=Number(jQuery(o[0]).attr('initial_page'));
                    apm_paging_old_page_nb=apm_paging_page_nb;
                //if()
                }
            });
        }
    }
    jQuery.each(data_grids, function(key, data_grid){
        p=jQuery(data_grid).parents(".apm_datagrid_wrapper");
        sz=jQuery(p).find('.apm_grid_status_zone_container');
        has_paging=Number(jQuery(sz[0]).attr('has_paging'));
        if(has_paging==1){
            apm_load_data_grid(data_grid,'page_nb',1);
        } else {
            apm_load_data_grid(data_grid);
        }
    });

    ///SET PAGING

    var do_change_paging=function(page_nb,obj,norefresh){
        o=jQuery(obj).parents('.apm_pagin_header_zone');
        ochild=jQuery(o[0]).find('.apm_page_nb');
        oapm_page_first_child=jQuery(o[0]).find('.apm_page_first');
        oapm_page_prev_child=jQuery(o[0]).find('.apm_page_prev');
        oapm_page_next_child=jQuery(o[0]).find('.apm_page_next');
        oapm_page_last_child=jQuery(o[0]).find('.apm_page_last');
        if(page_nb==1){
            jQuery(oapm_page_first_child[0]).addClass('inactive');
            jQuery(oapm_page_prev_child[0]).addClass('inactive');
        } else {
            jQuery(oapm_page_first_child[0]).removeClass('inactive');
            jQuery(oapm_page_prev_child[0]).removeClass('inactive');

        }
        if(page_nb==get_last_page(obj)){
            jQuery(oapm_page_next_child[0]).addClass('inactive');
            jQuery(oapm_page_last_child[0]).addClass('inactive');
        } else {
            jQuery(oapm_page_next_child[0]).removeClass('inactive');
            jQuery(oapm_page_last_child[0]).removeClass('inactive');
        }
        jQuery(ochild[0]).attr('value',page_nb);

        gridwrap=jQuery(obj).parents(".apm_datagrid_wrapper");
        var grid=gridwrap.find('.apm_grid_block_cls');
        o=jQuery(obj).parents('.apm_grid_status_zone_container');
        jQuery(o[0]).attr('initial_page',page_nb);

        if(norefresh==undefined) {
            refresh_grid(grid,'page_nb',page_nb);
        }
    }
    var get_last_page=function(obj){
        o=jQuery(obj).parents('.apm_grid_status_zone_container');
        return Number(jQuery(o[0]).attr('last_page'));
    }

    ////SEARCH

    jQuery(".apm_search_btn_go").live('click', function(){
        f=jQuery(this).parent().find('.apm_search_field');
        seaStr=jQuery(f).attr('value');
        if(seaStr!==''){
            var gridparent=jQuery(this).parents('.apm_sidebar_block').parent();
            var grid=jQuery(gridparent).find('.apm_grid_block_cls');
            refresh_grid(grid,"free_search",seaStr);
        }
    //

    });

    jQuery(".apm_search_cancel_btn_go").live('click', function(){
        f=jQuery(this).parent().find('.apm_search_field');
        jQuery(f).attr('value','');
        var gridparent=jQuery(this).parents('.apm_sidebar_block').parent();
        var grid=jQuery(gridparent).find('.apm_grid_block_cls');
        refresh_grid(grid,"free_search",'');
    });


    jQuery(".apm_advanced_search_cancel_btn_go").live('click', function(){
        f=jQuery(this).parents('.content_advanced_search_fields');
        f=f[0];
        fields=jQuery(f).find('select');
        jQuery.each(fields,function(index, field) {
            options=jQuery(field).find('option');
            count=0;
            jQuery.each(options,function(index, option) {
                if(count==0){
                    jQuery(option).attr('selected','selected');
                } else{
                    jQuery(option).removeAttr('selected');
                }
                count++;
            });
        });

        fields=jQuery(f).find('input.autocomplete_field_value');
        jQuery.each(fields,function(index, field) {
            jQuery(field).attr('value','');
        });
        fields=jQuery(f).find('input.autocomplete_field');
        jQuery.each(fields,function(index, field) {
            jQuery(field).attr('value','');
        });

        apm_do_advanced_search(this);
    });


    var apm_do_advanced_search=function(obj){

        f=jQuery(obj).parents('.content_advanced_search_fields');
        f=f[0];
        fields=jQuery(f).find('select');
        jQuery.each(fields,function(index, field) {
            n=jQuery(field).attr('name');
            if( n.substring(0,4) =='cat_' ){
                v=jQuery(field).find('option:selected').text();
            } else {
                v=jQuery(field).find('option:selected').attr('value');
            }
            if(v!=='Show All' && v!=='Show All '){
                filters[n]=v;
            } else {
                filters[n]='';
            }
        });

        fields=jQuery(f).find('input.autocomplete_field_value');

        jQuery.each(fields,function(index, field) {

            n=jQuery(field).attr('name');
            v=jQuery(field).attr('value');

            if(v!=='' ){
                filters[n]=v;
            } else {
                filters[n]='';
            }
        });

        var gridparent=jQuery(obj).parents('.apm_sidebar_block').parent();
        var grid=jQuery(gridparent).find('.apm_grid_block_cls');
        refresh_grid(grid,"",'');
    }
    jQuery(".apm_advanced_search_btn_go").live('click', function(){
        apm_do_advanced_search(this);

    });


    jQuery(".apm_open_advanced_search").live('click', function(){
        var blockparent=jQuery(this).parents('.apm_sidebar_content_filter');
        var blockadvancedsearch=jQuery(blockparent).parent();
        jQuery(blockparent).hide();
        blockadvancedsearch=jQuery(blockadvancedsearch).find('.apm_sidebar_content_advanced_search')
        jQuery(blockadvancedsearch).show();
    });
    jQuery(".apm_close_advanced_search").live('click', function(){
        var blockparent=jQuery(this).parents('.apm_sidebar_content_advanced_search');
        var blockadvancedsearch=jQuery(blockparent).parent();
        jQuery(blockparent).hide();
        blockadvancedsearch=jQuery(blockadvancedsearch).find('.apm_sidebar_content_filter')
        jQuery(blockadvancedsearch).show();
    });

    ///PAGING
    var apm_paging_old_page_nb=1;
    var apm_paging_page_nb=1;
    var apm_paging_last_page=10;

    jQuery(".apm_page_nb").live('focus', function(){
        apm_paging_old_page_nb=Number(jQuery(this).attr('value'));
    });

    jQuery(".apm_page_nb").live('blur', function(){
        //alert('blur');
        new_apm_paging_page_nb=Number(jQuery(this).attr('value'));
        if(new_apm_paging_page_nb>0){
            apm_paging_page_nb=new_apm_paging_page_nb;
            apm_paging_old_page_nb=apm_paging_page_nb;
            do_change_paging(apm_paging_page_nb,this);
        } else {
            jQuery(this).attr('value',apm_paging_old_page_nb)
        }
    });

    //SET GRID HEIGHT TO FIT THE PAGE
    o=jQuery('#mainGridZone');
    if(jQuery(o).hasClass('apm_grid_zone')){
        t=jQuery(o).offset().top;
        //alert(t);
        jQuery('#footer').hide();
        jQuery('#wpfooter').hide();
        w=jQuery(window);
        wh=jQuery(w).height();
        h=(wh-t-10);
        jQuery(o).css('height',h+'px');
    }


    jQuery(".apm_page_nb").live('keypress', function(e){
        if(e.which == 13){
            jQuery(this).blur();
        }
    });
    jQuery(".apm_page_first").live('click', function(e){
        apm_paging_page_nb=1;
        if(apm_paging_old_page_nb!==apm_paging_page_nb){
            do_change_paging(apm_paging_page_nb,this);
            apm_paging_old_page_nb=apm_paging_page_nb;
        }
    });
    jQuery(".apm_page_prev").live('click', function(e){
        apm_paging_page_nb-=1;
        if(apm_paging_page_nb==0){
            apm_paging_page_nb=1;
        }
        if(apm_paging_old_page_nb!==apm_paging_page_nb){
            do_change_paging(apm_paging_page_nb,this);
            apm_paging_old_page_nb=apm_paging_page_nb;
        }
    });
    jQuery(".apm_page_next").live('click', function(e){
        apm_paging_last_page=get_last_page(this);
        if(apm_paging_page_nb+1<=apm_paging_last_page){
            apm_paging_page_nb+=1;
            if(apm_paging_old_page_nb!==apm_paging_page_nb){
                do_change_paging(apm_paging_page_nb,this);
                apm_paging_old_page_nb=apm_paging_page_nb;
            }
        }
    });

    jQuery(".apm_page_last").live('click', function(e){
        apm_paging_last_page=get_last_page(this);
        apm_paging_page_nb=apm_paging_last_page;
        if(apm_paging_old_page_nb!==apm_paging_page_nb){
            do_change_paging(apm_paging_page_nb,this);
            apm_paging_old_page_nb=apm_paging_page_nb;
        }
    });

    ///SET A-Z filtering

    jQuery(".apm_grid_az_header > li > a").live('click', function(){
        letter=jQuery(this).attr('letter');
        var grid=jQuery(this).parents('.apm_grid_block_cls');
        refresh_grid(grid,"letter",letter);

    });

    var cb_clicked_store=[];



    jQuery(".apm_grid_row_cb").live('click', function(){
        post_id= jQuery(this).attr('post_id');
        var do_check=false;
        if(jQuery(this).attr('checked')=='checked'){
            do_check=true;
            pos=jQuery.inArray(post_id,cb_clicked_store);
            if(pos==-1){
                cb_clicked_store.push(post_id);
            }
        } else {
            do_check=false;
            pos=jQuery.inArray(post_id,cb_clicked_store);
            if(pos>-1){
                cb_clicked_store.splice(pos,1);
            }
        }
    //alert(pos+"-"+post_id+"-"+do_check+"-"+cb_clicked_store);
    });


    jQuery(".apm_grid_head_cb").live('click', function(){
        var do_check=false;
        if(jQuery(this).attr('checked')=='checked'){
            do_check=true;
        }
        div=jQuery(this).parents('.apm_grid_block_cls');//.parent().parent().parent().parent().parent();//.parent().next();
        trs=div.find('table > tbody > tr');
        cb_clicked_store=[];
        jQuery.each(trs,function(index, tr) {
            tds=jQuery(tr).find('td');
            td=tds[0].firstChild;
            post_id=jQuery(td).attr('post_id');
            if(do_check){
                jQuery(td).attr('checked','checked');
                cb_clicked_store.push(post_id);
            } else {
                jQuery(td).removeAttr('checked');
            }
        });
    });
    var refresh_grid=function(grid,param_filter_key,param_filter_value,sort_by){
        var data_grid=grid.find('tbody');
        jQuery(data_grid).html("");
        apm_load_data_grid(data_grid,param_filter_key,param_filter_value,sort_by);
    }
    jQuery(".apm_refresh_btn").on('click', function(){
        var grid=jQuery(this).parents('.apm_grid_block_cls');//.parent().parent().parent();
        refresh_grid(grid);
    });

    ///SHOW LAYER ACTION ON  DATA GRIDS

    var countHideLayer=0;
    var apm_selected_post_id=0;
    var apm_selected_post_status=false;
    var apm_selected_post_object=false;
    var all_categories=false;
    var grid=jQuery(apm_selected_post_object).parents('.apm_grid_block_cls');//.parent().parent().parent().parent().parent().parent();
    apm_activate_grid_fields=function(){
        //SET NEW GRID FILD AJAX INPUT
        jQuery('.choice_li_ajax_select span').live('click', function(){
            var t=jQuery(this);
            s=t.parents('#apm_grid_block');
            var status_zone=jQuery(s).find('.apm_grid_status_zone');
            p=t.parent();
            p=jQuery(p);
            fieldname=p.data('fieldname');
            id=p.data('id');
            if(t.hasClass('apm_grid_field_unselected')){
                sp=p.find('span');
                sp=jQuery(sp);
                sp.removeClass('apm_grid_field_selected');
                sp.addClass('apm_grid_field_unselected');
                t.removeClass('apm_grid_field_unselected');
                t.addClass('apm_grid_field_selected');
                val=t.data('val');
                status_zone.html('<span class="apm_status_txt"><span class="apm_highlight">Status: </span>Saving...</span>');
                jQuery.ajax({
                    url: ajaxurl ,
                    type: "POST",//apm_manage_grid_data
                    data: "modulekey="+modulekey+"&action=apm_ajax_field_update&post_id="+id+"&fieldname="+fieldname+"&val="+val,
                    success: function(data){
                        status_zone.html('<span class="apm_status_txt"><span class="apm_highlight">Status: </span>Updated</span>');
                    }//apm_get_grid_data
                });
            }
        });
        jQuery('.apm_act_grid').live('click', function(){
            var t=jQuery(this);
            s=t.parents('#apm_grid_block');
            var status_zone=jQuery(s).find('.apm_grid_status_zone');
            if(t.hasClass('apm_act_pub')){
                t.removeClass('apm_act_pub');
                t.addClass('apm_act_unpub');
                val="0";
            } else {
                t.removeClass('apm_act_unpub');
                t.addClass('apm_act_pub');
                val="1";
            }
            fieldname=t.data('fieldname');
            id=t.data('id');
            status_zone.html('<span class="apm_status_txt"><span class="apm_highlight">Status: </span>Saving...</span>');
            jQuery.ajax({
                url: ajaxurl ,
                type: "POST",//apm_manage_grid_data
                data: "modulekey="+modulekey+"&action=apm_ajax_field_update&post_id="+id+"&fieldname="+fieldname+"&val="+val,
                success: function(data){
                    status_zone.html('<span class="apm_status_txt"><span class="apm_highlight">Status: </span>Updated</span>');
                }//apm_get_grid_data
            });
        });


        jQuery('.ajax_input').live('blur', function(){
            t=jQuery(this);
            s=t.parents('#apm_grid_block');
            var status_zone=jQuery(s).find('.apm_grid_status_zone');
            fieldname=t.data('fieldname');
            id=t.data('id');
            v=t.val();
            status_zone.html('<span class="apm_status_txt"><span class="apm_highlight">Status: </span>Saving...</span>');
            jQuery.ajax({
                url: ajaxurl ,
                type: "POST",//apm_manage_grid_data
                data: "modulekey="+modulekey+"&action=apm_ajax_field_update&post_id="+id+"&fieldname="+fieldname+"&val="+v,
                success: function(data){
                    status_zone.html('<span class="apm_status_txt"><span class="apm_highlight">Status: </span>Updated</span>');
                }//apm_get_grid_data
            });
        });
    ////
    }

    var apm_activateActionLayer=function(){
        countHideLayer=0;
        jQuery(".apm_act_action").live('mouseover', function(){
            actionLayer=jQuery('#apm_grid_actions_layer');
            thisObj=jQuery(this);
            actionLayer.css("left",thisObj.position().left+20+"px").css("top",thisObj.position().top+"px");
            apm_selected_post_id=jQuery(this).attr('post_id');
            apm_selected_post_status=jQuery(this).attr('post_status');
            actionLayer.show();
            if(apm_selected_post_status=='publish'){
                actionLayer.find('.apm_act_pub').hide();
                actionLayer.find('.apm_act_unpub').show();
                actionLayer.find('.apm_act_trash').show();
            } else if(apm_selected_post_status=='pending' || apm_selected_post_status=='draft'){
                actionLayer.find('.apm_act_pub').show();
                actionLayer.find('.apm_act_unpub').hide();
                actionLayer.find('.apm_act_trash').show();
            }else if(apm_selected_post_status=='trash'){
                actionLayer.find('.apm_act_pub').show();
                actionLayer.find('.apm_act_unpub').show();
                actionLayer.find('.apm_act_trash').hide();
            }
            countHideLayer=0;
            apm_selected_post_object=this;
        });
        jQuery(".apm_act_action").live('mouseout', function(){
            apm_startCountHideLayer('#apm_grid_actions_layer');
        });
        jQuery("#apm_grid_actions_layer > span").live('mouseout', function(){
            apm_startCountHideLayer('#apm_grid_actions_layer');
        })
        jQuery("#apm_grid_actions_layer > span").live('mouseover', function(){
            countHideLayer=0;
        })

        jQuery(".apm_act_edit").live('click', function(){
            window.open('post.php?post='+apm_selected_post_id+'&action=edit','_blank');
        });

        jQuery(".apm_act_trash").live('click', function(){
            if(jQuery(this).hasClass('apm_pad_icon')){
                apm_multi_update_status_ajax(this,'trash_multirecs','Trashing','Trashed');
            } else if(jQuery(this).hasClass('apm_filter_icon')){
                apm_filter_status_ajax(this,'filter_trash');
            }else {
                jQuery(apm_selected_post_object).parent().parent().hide();
                var grid=jQuery(apm_selected_post_object).parents('.apm_grid_block_cls');//.parent().parent().parent().parent().parent().parent();
                var status_zone=grid.find('.apm_grid_status_zone');
                var grid_tbody=grid.find('tbody');
                var modulekey=grid_tbody.attr('modulekey');
                status_zone.html(' <span  class="apm_loader_img" ><img src="'+apm_settings.paths.css+'images/ui-anim_basic_16x16.gif" ></span><span class="apm_status_txt"><span class="apm_highlight">Status: </span>trashing Record Id '+apm_selected_post_id+' </span>');
                jQuery.ajax({
                    url: ajaxurl ,
                    type: "POST",
                    data: "modulekey="+modulekey+"&action=apm_manage_grid_data&todo=trash_rec&post_id="+apm_selected_post_id,
                    success: function(data){
                        status_zone.html('<span class="apm_status_txt"><span class="apm_highlight">Status: </span>Record trashed</span>');

                    }//apm_get_grid_data
                });

            }
        });

        jQuery(".apm_act_del").live('click', function(){
            if(cb_clicked_store.length==0 && jQuery(this).hasClass('apm_pad_icon')){
                flg_apm.setAlertPanel.addAlert('Error','Please select at least one record...','error',3000);
                return;
            }

            if(jQuery(this).hasClass('apm_pad_icon')){
                var answer = confirm('Are you sure that you want to delete the Record(s) # '+cb_clicked_store.join(', ')+' ?');
                if (answer){
                    apm_multi_update_status_ajax(this,'del_multirecs','Deleting','Deleted');
                }
            } else {
                var answer = confirm('Are you sure that you want to delete the Record ID '+apm_selected_post_id+' ?');
                if (answer){
                    jQuery(apm_selected_post_object).parent().parent().hide();
                    var grid=jQuery(apm_selected_post_object).parents('.apm_grid_block_cls');//.parent().parent().parent().parent().parent().parent();
                    var status_zone=grid.find('.apm_grid_status_zone');
                    var grid_tbody=grid.find('tbody');
                    var modulekey=grid_tbody.attr('modulekey');
                    status_zone.html(' <span  class="apm_loader_img" ><img src="'+apm_settings.paths.css+'images/ui-anim_basic_16x16.gif" ></span><span class="apm_status_txt"><span class="apm_highlight">Status: </span>deleting Record Id '+apm_selected_post_id+' </span>');
                    jQuery.ajax({
                        url: ajaxurl ,
                        type: "POST",
                        data: "modulekey="+modulekey+"&action=apm_manage_grid_data&todo=del_rec&post_id="+apm_selected_post_id,
                        success: function(data){
                            status_zone.html('<span class="apm_status_txt"><span class="apm_highlight">Status: </span>Record Deleted</span>');

                        }//apm_get_grid_data
                    });
                }
            }
        });
        var apm_filter_status_ajax=function(obj,status_action){
            gridwrap=jQuery(obj).parents(".apm_datagrid_wrapper");
            var grid=gridwrap.find('.apm_grid_block_cls');
            var status_zone=grid.find('.apm_grid_status_zone');
            refresh_grid(grid,"post_status",status_action);
        }

        var apm_export_csv=function(obj,f,ak){

            gridwrap=jQuery(obj).parents(".apm_datagrid_wrapper");
            //alert(jQuery(obj).html());
            var grid=gridwrap.find('.apm_grid_block_cls');
            var table=gridwrap.find('.apm_table_tbody');
            //alert(jQuery(grid).html());
            //alert(jQuery(grid).parent().html());
            modulekey=jQuery(table).attr('modulekey');

            //var status_zone=grid.find('.apm_grid_status_zone');
            //refresh_grid(grid,"post_status",status_action);

            //f=f.join(',');
            jQuery.fileDownload(ajaxurl+"/?modulekey="+modulekey+"&action=apm_manage_grid_data&todo=get_file_csv&filters="+filters_str+"&sortby_ajax="+sortby_ajax+"&sort_dir="+sort_dir+"&fields="+f+"&action_key="+ak, {
                successCallback: function (url) {
                    flg_apm.setAlertPanel.addAlert('Download','You just got a file download dialog or ribbon for this URL :' + url,'ok',3000);
                },
                failCallback: function (html, url) {

                    flg_apm.setAlertPanel.addAlert('Error','Your file download just failed for this URL:' + url + '\r\n' +
                        'Here was the resulting error HTML: \r\n' + html,'error',5000);
                }
            });
        };

        jQuery.download = function(url, data, method){
            //url and data options required
            if( url && data ){
                //data can be string of parameters or array/object
                data = typeof data == 'string' ? data : jQuery.param(data);
                //split params into form inputs
                var inputs = '';
                jQuery.each(data.split('&'), function(){
                    var pair = this.split('=');
                    inputs+='<input type="hidden" name="'+ pair[0] +'" value="'+ pair[1] +'" />';
                });
                //send request
                jQuery('<form action="'+ url +'" method="'+ (method||'post') +'">'+inputs+'</form>')
                .appendTo('body').submit().remove();
            };
        };
        var apm_multi_update_special_ajax=function(obj,action,f,v){
            if(cb_clicked_store.length==0){
                flg_apm.setAlertPanel.addAlert('Error','Please select at least one record...','error',3000);
                return;
            }
            p=jQuery(obj).parent();
            var status_action=status_action;
            modulekey=jQuery(p).attr('modulekey');
            gridwrap=jQuery(obj).parents(".apm_datagrid_wrapper");
            var grid=gridwrap.find('.apm_grid_block_cls');
            var status_zone=grid.find('.apm_grid_status_zone');
            html=' <span  class="apm_loader_img" ><img src="'+apm_settings.paths.css+'images/ui-anim_basic_16x16.gif" ></span>';
            html+='<span class="apm_status_txt"><span class="apm_highlight">Status: </span>updating the '+cb_clicked_store.length+' record(s) </span>';//'+cb_clicked_store.join(', ')+'
            status_zone.html(html);
            jQuery.ajax({
                url: ajaxurl ,
                type: "POST",
                data: "modulekey="+modulekey+"&action=apm_manage_grid_data&todo=special_action&post_ids="+cb_clicked_store.join(',')+"&f="+f+"&v="+v+"&a="+a,
                success: function(data){
                    status_zone.html('<span class="apm_status_txt"><span class="apm_highlight">Status: </span>'+cb_clicked_store.length+' Record(s) updated</span>');
                    cb_clicked_store=[];
                    refresh_grid(grid);
                }
            });
        }

        var apm_multi_update_status_ajax=function(obj,status_action,status_text1,status_text2){
            if(cb_clicked_store.length==0){
                flg_apm.setAlertPanel.addAlert('Error','Please select at least one record...','error',3000);
                return;
            }
            p=jQuery(obj).parent();
            var status_action=status_action;
            modulekey=jQuery(p).attr('modulekey');
            gridwrap=jQuery(obj).parents(".apm_datagrid_wrapper");
            var grid=gridwrap.find('.apm_grid_block_cls');
            var status_zone=grid.find('.apm_grid_status_zone');
            html=' <span  class="apm_loader_img" ><img src="'+apm_settings.paths.css+'images/ui-anim_basic_16x16.gif" ></span>';
            html+='<span class="apm_status_txt"><span class="apm_highlight">Status: </span>'+status_text1+' the '+cb_clicked_store.length+' record(s) '+cb_clicked_store.join(', ')+' </span>';
            status_zone.html(html);
            jQuery.ajax({
                url: ajaxurl ,
                type: "POST",
                data: "modulekey="+modulekey+"&action=apm_manage_grid_data&todo="+status_action+"&post_ids="+cb_clicked_store.join(','),
                success: function(data){
                    status_zone.html('<span class="apm_status_txt"><span class="apm_highlight">Status: </span>'+cb_clicked_store.length+' Record(s) '+status_text2+'</span>');

                    switch(status_action){
                        default:
                            jQuery.each(cb_clicked_store, function(key,id){
                                tr=jQuery('.'+modulekey+"_"+id);
                                td_status=tr.find('.td_status');
                                switch(status_action){
                                    case 'unpub_multirecs':
                                        jQuery(td_status[0]).removeClass('apm_act_pub');
                                        jQuery(td_status[0]).addClass('apm_act_unpub');
                                        jQuery(td_status[0]).addClass('apm_act_trash');
                                        break;
                                    case 'pub_multirecs':
                                        jQuery(td_status[0]).removeClass('apm_act_unpub');
                                        jQuery(td_status[0]).addClass('apm_act_pub');
                                        jQuery(td_status[0]).addClass('apm_act_trash');
                                        break;
                                    case 'trash_multirecs':
                                        jQuery(td_status[0]).addClass('apm_act_unpub');
                                        jQuery(td_status[0]).addClass('apm_act_pub');
                                        jQuery(td_status[0]).removeClass('apm_act_trash');
                                        break;
                                }
                            });
                            if(status_action=="trash_multirecs"){
                                refresh_grid(grid);
                                cb_clicked_store=[];
                            }
                            break;
                        /*case 'trash_multirecs':

								break;*/
                        case 'del_multirecs':
                            refresh_grid(grid);
                            cb_clicked_store=[];
                            break;
                    }
                //refresh_grid(grid);
                }
            });

        }
        var apm_update_status_ajax=function(status_action,status_text1,status_text2){
            var grid=jQuery(apm_selected_post_object).parents('.apm_grid_block_cls');
            apm_act_action=jQuery(apm_selected_post_object).parent().parent().find('.apm_act_action');
            jQuery(apm_act_action).attr('post_status','draft')
            td_status=jQuery(apm_selected_post_object).parent().parent().find('.td_status');
            if(status_action=='unpub_rec'){
                jQuery(td_status).removeClass('apm_act_pub');
                jQuery(td_status).addClass('apm_act_unpub');
                jQuery(td_status).addClass('apm_act_trash');
            } else if(status_action=='pub_rec'){
                jQuery(td_status).removeClass('apm_act_unpub');
                jQuery(td_status).addClass('apm_act_pub');
                jQuery(td_status).addClass('apm_act_trash');
            } else if(status_action=='trash_multirecs'){
                jQuery(td_status).addClass('apm_act_unpub');
                jQuery(td_status).addClass('apm_act_pub');
                jQuery(td_status).removeClass('apm_act_trash');
            }
            var status_zone=grid.find('.apm_grid_status_zone');
            var grid_tbody=grid.find('tbody');
            var modulekey=grid_tbody.attr('modulekey');
            html='<span  class="apm_loader_img" ><img src="'+apm_settings.paths.css+'images/ui-anim_basic_16x16.gif" ></span>';
            html+='<span class="apm_status_txt"><span class="apm_highlight">Status: </span>'+status_text1+' Record Id '+apm_selected_post_id+' </span>';
            status_zone.html(html);
            jQuery.ajax({
                url: ajaxurl ,
                type: "POST",
                data: "modulekey="+modulekey+"&action=apm_manage_grid_data&todo="+status_action+"&post_id="+apm_selected_post_id,
                success: function(data){
                    status_zone.html('<span class="apm_status_txt"><span class="apm_highlight">Status: </span>Record '+status_text2+'</span>');
                }
            });
        }
        jQuery(".apm_act_all").live('click', function(){
            if(jQuery(this).hasClass('apm_filter_icon')){
                apm_filter_status_ajax(this,'filter_all');
            }
        });
        jQuery(".apm_act_unpub").live('click', function(){
            if(jQuery(this).hasClass('apm_pad_icon')){
                apm_multi_update_status_ajax(this,'unpub_multirecs','Unpublishing','Unpublished');

            } else if(jQuery(this).hasClass('apm_filter_icon')){
                apm_filter_status_ajax(this,'filter_unpub');
            } else {
                apm_update_status_ajax('unpub_rec','Unpublishing','Unpublished');
            }
        });
        sort_dir='ASC';
        jQuery(".sort_dir").live('click', function(){
            $t=jQuery(this);
            p=jQuery(this).parent();
            as=jQuery(p).find(".sort_asc");
            de=jQuery(p).find(".sort_desc");
            if($t.hasClass('sort_desc')){
                sort_dir='DESC';
                jQuery(as).removeClass('sort_sel');
                jQuery(de).removeClass('sort_unsel');
                jQuery(as).addClass('sort_unsel');
                jQuery(de).addClass('sort_sel');
            } else {
                sort_dir='ASC';
                jQuery(de).removeClass('sort_sel');
                jQuery(as).removeClass('sort_unsel');
                jQuery(de).addClass('sort_unsel');
                jQuery(as).addClass('sort_sel');

            }
            s=jQuery(p).find(".apm_sortby");
            do_sort(s);
        });

        var do_sort=function(obj){
            f=jQuery(obj).val();
            gridwrap=jQuery(obj).parents(".apm_datagrid_wrapper");
            var grid=gridwrap.find('.apm_grid_block_cls');
            refresh_grid(grid,'','',f);
        }

        jQuery(".apm_sortby").live('change', function(){
            do_sort(this);
        //alert('sort..'+jQuery(this).val());
        });
        jQuery(".apm_act_specialaction").live('click', function(){
            if(jQuery(this).hasClass('apm_pad_icon')){
                a=jQuery(this).attr('data-act_name');
                ak=jQuery(this).attr('data-act_key');
                switch(a){
                    case 'export_csv':
                        f=jQuery(this).attr('data-fields');
                        apm_export_csv(this,f,ak);
                        break;
                }

            //t=jQuery(this).attr('data-tooltip');
            //apm_multi_update_status_ajax(this,'unpub_multirecs','Unpublishing','Unpublished');
            /*f=jQuery(this).attr('data-field');
		        		v=jQuery(this).attr('data-value');
		        		a=jQuery(this).attr('data-act_name');
		        		apm_multi_update_special_ajax(this, a, f, v);*/
            }
        });
        jQuery(".apm_act_specialaction").live('mouseover', function(){
            if(jQuery(this).hasClass('apm_pad_icon')){
                t=jQuery(this).attr('data-tooltip');
                if(t!==undefined){
                //alert(t);
                }
            }
        });
        jQuery(".apm_act_special").live('click', function(){
            if(jQuery(this).hasClass('apm_pad_icon')){
                //apm_multi_update_status_ajax(this,'unpub_multirecs','Unpublishing','Unpublished');
                f=jQuery(this).attr('data-field');
                v=jQuery(this).attr('data-value');
                a=jQuery(this).attr('data-act_name');
                apm_multi_update_special_ajax(this, a, f, v);
            }
        });
        jQuery(".apm_act_pub").live('click', function(){
            if(jQuery(this).hasClass('apm_pad_icon')){
                apm_multi_update_status_ajax(this,'pub_multirecs','Publishing','Published');
            } else if(jQuery(this).hasClass('apm_filter_icon')){
                apm_filter_status_ajax(this,'filter_pub');
            } else {
                apm_update_status_ajax('pub_rec','Publishing','Published');
            }
        });
        jQuery(".apm_act_view").live('click', function(){
            //alert('view '+apm_selected_post_id);
            });
    }
    apm_activateActionLayer();
    apm_activate_grid_fields();

    var apm_startCountHideLayer=function(obj_id){
        var date = new Date();
        countHideLayer=date.getTime();
        setTimeout(apm_CheckHideLayer,500,obj_id);
    }
    var apm_CheckHideLayer=function(obj_id){
        //alert(countHideLayer);
        if(countHideLayer!==0){
            actionLayer=jQuery(obj_id);
            actionLayer.hide();
            apm_selected_post_id=0;
            apm_selected_post_object=false;
        }
        countHideLayer=0;
    }

    /////HANDLE Show the help layer on rollover on a ? icon
    jQuery(".apm_help_btn").live('mouseover', function(){
        //alert(jQuery(this).next());
        //	alert(jQuery(this).next().text());
        helpTxt=jQuery(this).next().text();
        helpObject=jQuery(this).next();
        helpObject.css("left",jQuery(this).position().left+30+"px").css("top",jQuery(this).position().top+"px");
        helpObject.show();
    });
    jQuery(".apm_help_btn").live('mouseout', function(){
        helpObject=jQuery(this).next();
        helpObject.hide();
    });
    //END

    jQuery('.fileRemove').live('click',function(){
        jQuery(this).parent().hide();
        jQuery(this).next().val(jQuery(this).attr('fileid'));
        fieldname=jQuery(this).attr('fieldname');
        filednb=jQuery(this).attr('fieldnb');
        filetype=jQuery(this).attr('filetype');
        if(filetype=="main"){
            jQuery("#"+fieldname).show();
        }
    });
    //
    jQuery('.fileAddDescription_btn').live('click',function(){
        jQuery(this).next().next().show();
        jQuery(this).next().next().css('display','block');
    });
    jQuery('.fileHelpLayer_btn').live('click',function(){

        });

    //

    jQuery('.apm_add_upload').live('click',function(){
        if(this.nbupload==undefined){
            this.nbupload=0;
        }
        this.nbupload+=1;
        fieldname=jQuery(this).attr('fieldname');
        uploadfield=jQuery("#"+fieldname);
        uploadfieldcount=jQuery("#"+fieldname+"_add_file");
        jQuery(uploadfieldcount).val(this.nbupload);
        //<div><input style="'.$upload_field_display.'" type="file" id="'.$config['field'].'" name="'.$config['field'].'_value" value="'.$config['value'].'" '.$config['width'].' /></div>
        uploadfieldnew=jQuery(this).parent().parent().append('<div><input  type="file" id="'+fieldname+'_'+this.nbupload+'" name="'+fieldname+'_value_'+this.nbupload+'" value="" /></div>');

        uploadfieldnew.css('display','block');
    });

    /* a = jQuery('.autocomplete_field').autocomplete( {
 	 	serviceUrl:ajaxurl+"?callback=?&action=amp-ajax-autocomplete&fieldname="+jQuery(this).attr(),
    		minChars:2
    	});*/

    $('.action_button').off('click').on('click',function(i, obj){
        var fieldname=$(this).attr('data-fieldname');
        var post_id=$(this).attr('data-post_id');
        var appname=$(this).attr('data-fields');
        var post_type=$(this).attr('data-post_type');
        var fields=$(this).attr('data-fields');
        var dont_save=false;
        if(fieldname=="convert_lead"){
            var gloWin= flg_apm.c_create_globalModalWin();
            flg_apm.c_init_globalModalWin(gloWin,{
                title:"Convert a Lead to an Account and a Contact",
                actionTitle:'Convert',
                closeTitle: 'Cancel',
                content:"You will be redirected to a form to convert the current Lead to a new Account and a new Contact. <br/ >Are you sure you want to do this?",
                actionClass:'apm_acction_convert_lead_link'
            });
            gloWin.modal('show');
            u="admin.php?page=15CRM_home&post_id="+post_id+"&action_name=convert_lead&post-type=ff_leads&action-type=convert";
            $('.apm_acction_convert_lead_link').live('click',function(i, obj){
                document.location.href=u;
            });
        }else if(fieldname=="convert_potential_to_project"){
            u="admin.php?page=15CRM_home&post_id="+post_id+"&action_name=convert_potential_to_project&post-type=ff_potentials&action-type=convert";
            document.location.href=u;

        }else {
            oFields=eval(fields);
            $.each(oFields, function(key,field){
                fieldToUpdate=$('input[name="'+field[0]+meta_marker+'"]');
                //alert(meta_marker+"*"+field[0]+"-"+$(fieldToUpdate).val());
                if($(fieldToUpdate).val()==undefined){//IS NOT AN INPUT
                    selectToUpdate=$('#'+field[0]+'_select');
                    if($(selectToUpdate)!==undefined){//= is select
                        options=$(selectToUpdate).find('option');
                        if(options.length>0){
                            $.each(options,function(index, option) {
                                $(option).removeAttr('selected');
                            });
                            $.each(options,function(index, option) {
                                if(Number(field[1])==NaN || field[2]=='text'){
                                    if ($(option).html() == field[1]){
                                        $(option).attr('selected','selected');
                                    }

                                    if ($(option).attr('cat-txt') == field[1]){
                                        $(option).attr('selected','selected');
                                    }
                                } else if ( $(option).attr('value') == Number(field[1]))
{
                                    $(option).attr('selected','selected');
                                }
                            });
                        }
                    /*  */
                    }

                    commentToUpdate=$('textarea[name="'+field[0]+meta_marker+'"]');
                    if($(commentToUpdate)!==undefined){//= is comments
                        $(commentToUpdate).html(field[1]);
                    }

                } else {//IS  AN INPUT
                    val=field[1];
                    if(val=='NOW()'){
                        do_update=true;
                        if(field[2]=="if_empty"){
                            do_update=false;
                            checkv=$(fieldToUpdate).val();
                            if(checkv==""){
                                do_update=true;
                            }
                        }
                        if(do_update){
                            var myDate=new Date();
                            m=myDate.getMonth();
                            m++;
                            if(m<10){
                                m='0'+m;
                            }
                            d=myDate.getDate();
                            if(d<10){
                                d='0'+d;
                            }
                            val=m+"/"+d+"/"+myDate.getFullYear();
                        } else {
                            val="dont_update";
                        }
                    }
                    if(val=='TIME()'){
                        var myDate=new Date();
                        h=myDate.getHours();
                        m=myDate.getMinutes();
                        if(m<10){
                            m='0'+m;
                        }
                        if(h<10){
                            d='0'+h;
                        }
                        val=h+":"+m;
                    }
                    if(val!=="dont_update"){
                        $(fieldToUpdate).val(val);
                    }
                }
            });
            if(fieldname=="send_newsletter"){
                flg_apm.sendNewsletter.send(post_id);
                dont_save=true;
            };
            if(dont_save!==true){
                $('#publish').trigger('click');
                $('#post').submit();
            }
        }
    });
    flg_apm.initGlobalClick();


    jQuery('.apm_is_required').live('blur',function(i, obj){
        if(jQuery(this).val()==''){
            //alert('This field is required, please input a value');
            jQuery(this).parent().parent().addClass('apm_invalid');
            jQuery(this).focus()
        } else {
            jQuery(this).parent().parent().removeClass('apm_invalid');
        }
    });
    jQuery('.apm_is_email').live('blur',function(i, obj){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        var address = jQuery(this).val();
        if(reg.test(address) == false && address!=='') {
            jQuery(this).parent().parent().addClass('apm_invalid');
            jQuery(this).focus()
        } else {
            jQuery(this).parent().parent().removeClass('apm_invalid');
        }
    });
    jQuery('.apm_is_numbers').live('blur',function(i, obj){

        var num = jQuery(this).val();

        if ( isNaN(num)) {
            jQuery(this).parent().parent().addClass('apm_invalid');
            jQuery(this).focus()
        } else {
            jQuery(this).parent().parent().removeClass('apm_invalid');
        }

    });
    jQuery('.apm_is_phone').live('blur',function(i, obj){


        error='';
        var phone = jQuery(this).val();
        var stripped = phone.replace(/[\(\)\.\-\+\ ]/g, '');

        if (isNaN(stripped)) {
            error = "The phone number contains illegal characters.\n";
            jQuery(this).parent().parent().addClass('apm_invalid');
        }
        else if (stripped.length <8 && stripped.length >0 ) {
            error = "The phone number is the wrong length. Make sure you included an area code.\n";
            jQuery(this).parent().parent().addClass('apm_invalid');
        } else {
            jQuery(this).parent().parent().removeClass('apm_invalid');
        }

    });
    //apm_is_required



    jQuery('.apm_imgfile > img').live('click',function(){

        str_height=' height="500" ';
        if(jQuery(this).attr('has_resize')=='true'){
            str_height='';
        }
        jQuery('body').prepend('<div id="img_zoom_block" class="apm_imgfile_zoom"><h3 class="apm_win_header">Zoom</h3><div><img src="'+jQuery(this).attr('file_zoom')+'" '+str_height+' /></div></div>');
        zoom_block=jQuery('#img_zoom_block');
        img_zoom_block=jQuery('#img_zoom_block > img');
        w=zoom_block.width();
        h=zoom_block.height();
        wi=img_zoom_block.width();
        if(wi>w){
            nh=img_zoom_block.height()*((w-10)/wi);
            img_zoom_block.css('width',(w-10)+"px");
            img_zoom_block.css('height',nh+"px");
        }
        zoom_block.css('left',((jQuery(window).width()-w)/2)+"px");
        s=jQuery(window).scrollTop() ;
        winh=jQuery(window).height();
        zoom_block.css('top',((winh-h)/2+s)+"px");
        zoom_block.live('click',function(){
            jQuery(this).remove();
        });

    });
    //apm_imgfile
    //var AdvSearch='hidden';
    jQuery(function(){
        //jQuery.localise('ui-multiselect', {/*language: 'en',*/ path: 'js/locale/'});
        jQuery(".multiselect").multiselect();
    //jQuery('#switcher').themeswitcher();
    });

    if(AdvSearch=='shown'){
        jQuery("#apm_searchBlock_fields").show();
        jQuery("#apm_searchBlock_Hide").text('(Hide)');
    } else {
        jQuery("#apm_searchBlock_fields").hide();
        jQuery("#apm_searchBlock_Hide").text('(Show)');
    }
    jQuery("#apm_searchBlock_Hide").live('click', function(){
        if(AdvSearch=='shown'){
            jQuery("#apm_searchBlock_fields").hide();
            AdvSearch='hidden';
            setCookie('ApmAdvSearch',AdvSearch,2);
            this.firstChild.nodeValue ='(Show)';
        } else {
            jQuery("#apm_searchBlock_fields").show();
            AdvSearch='shown';
            setCookie('ApmAdvSearch',AdvSearch,2);
            this.firstChild.nodeValue ='(Hide)';
        }
    });

    if(all_categories!==false && all_categories!==undefined){
        attrdiv=jQuery("#pageparentdiv");
        attributesInside=jQuery("#pageparentdiv > div.inside");
        attributesInsideH=attributesInside.html();
        //alert(attributesInside);
        //pageparentdiv
        attrdiv.empty();
        var accordions='<div id="accordion">';
        if(apm_show_attributes){
            accordions+='<h4><a href="#">Attributes</a></h4>';
            accordions+='<div>'+attributesInsideH+'</div>';
        }
        jQuery.each(all_categories, function(key, categ){
            categdiv=jQuery("#"+key+"-all");
            //categdivadder=jQuery("#"+key+"-adder");
            if(categdiv!==undefined){
                categdivH=categdiv.html();
                //categdivadderH=categdivadder.html();
                accordions+='<h4><a href="#">'+categ.name+'</a></h4>';
                accordions+='<div ><div  class="apm_categ_block">'+categdivH+'</div>';
                accordions+='<div ><a href="edit-tags.php?taxonomy='+key+'" target="_blank">Manage category</a> ';
                accordions+='<img class="show_categ_add" src="'+apm_settings.paths.img+'/plus_16.png"  style="cursor:pointer;" title="Quick add a category" category_name="'+key+'"></div>';
                accordions+='</div>';

            }
        });
        /**/
        accordions+='</div>';

        attrdiv.append('<div class="handlediv" title="Click to toggle"><br /></div><h3 class="hndle"><span>Attributes and Categories</span></h3>'+accordions+' ');
        formCateg='<div  id="apm_categ_layer">';//display:none;
        formCateg+='<h3>Add a category</h3><input name="tag-categ"  id="tag-categ" value="" type="hidden"><ul>';
        formCateg+='<li><label for="tag-name">Name*:</label><input name="tag-name"  id="tag-name" value="" size="50" type="text"><p id="apm_categ_layer_alert">Field required.</p></li>';
        formCateg+='<li><label for="tag-slug">Slug:</label><input name="tag-slug"  id="tag-slug" value="" size="50" type="text"></li>';
        formCateg+='<li><label for="tag-description">Description:</label><br/><textarea name="tag-description" id="tag-description" rows="5" cols="68"></textarea></li>';
        formCateg+='<li id="apm_categ_layer_button"><input  name="category_value_submit" value="Add new category" onclick="fgl_addCategory();" type="button" ><input   value="Cancel" onclick="fgl_cancelAddCategory();" type="button" ></li>';
        formCateg+='</ul><div  id="apm_categ_layer_sending"><img src="'+apm_settings.paths.css+'/images/ui-anim_basic_16x16.gif"/> Senging....</div></div>';


        bodydiv=jQuery("body");
        bodydiv.append(formCateg);
        jQuery( "#accordion" ).accordion();
        jQuery.each(all_categories, function(key, categ){
            categdiv=jQuery("#"+key+"div");
            jQuery(categdiv).remove();
        });
    }
});




﻿/*
     * jQuery File Download Plugin v1.3.3
     *
     * http://www.johnculviner.com
     *
     * Copyright (c) 2012 - John Culviner
     *
     * Licensed under the MIT license:
     * http://www.opensource.org/licenses/mit-license.php
     */

var $ = jQuery.noConflict();

$.extend({
    //
    //$.fileDownload('/path/to/url/', options)
    // see directly below for possible 'options'
    fileDownload: function (fileUrl, options) {

        var defaultFailCallback = function (responseHtml, url) {
            alert('A file download error has occurred, please try again....');
        };

        //provide some reasonable defaults to any unspecified options below
        var settings = $.extend({

            //
            //Requires jQuery UI: provide a message to display to the user when the file download is being prepared before the browser's dialog appears
            //
            preparingMessageHtml: null,

            //
            //Requires jQuery UI: provide a message to display to the user when a file download fails
            //
            failMessageHtml: null,

            //
            //the stock android browser straight up doesn't support file downloads initiated by a non GET: http://code.google.com/p/android/issues/detail?id=1780
            //specify a message here to display if a user tries with an android browser
            //if jQuery UI is installed this will be a dialog, otherwise it will be an alert
            //
            androidPostUnsupportedMessageHtml: "Unfortunately your Android browser doesn't support this type of file download. Please try again with a different browser.",

            //
            //Requires jQuery UI: options to pass into jQuery UI Dialog
            //
            dialogOptions: {
                modal: true
            },

            //
            //a function to call after a file download dialog/ribbon has appeared
            //Args:
            // url - the original url attempted
            //
            successCallback: function (url) { },

            //
            //a function to call after a file download dialog/ribbon has appeared
            //Args:
            // responseHtml - the html that came back in response to the file download. this won't necessarily come back depending on the browser.
            // in less than IE9 a cross domain error occurs because 500+ errors cause a cross domain issue due to IE subbing out the
            // server's error message with a "helpful" IE built in message
            // url - the original url attempted
            //
            failCallback: defaultFailCallback,

            //
            // the HTTP method to use. Defaults to "GET".
            //
            httpMethod: "GET",

            //
            // if specified will perform a "httpMethod" request to the specified 'fileUrl' using the specified data.
            // data must be an object (which will be $.param serialized) or already a key=value param string
            //
            data: null,

            //
            //a period in milliseconds to poll to determine if a successful file download has occured or not
            //
            checkInterval: 100,

            //
            //the cookie name to indicate if a file download has occured
            //
            cookieName: "fileDownload",

            //
            //the cookie value for the above name to indicate that a file download has occured
            //
            cookieValue: "true",

            //
            //the cookie path for above name value pair
            //
            cookiePath: "/",

            //
            //the title for the popup second window as a download is processing in the case of a mobile browser
            //
            popupWindowTitle: "Initiating file download...",

            //
            //Functionality to encode HTML entities for a POST, need this if data is an object with properties whose values contains strings with quotation marks.
            //HTML entity encoding is done by replacing all &,<,>,',",\r,\n characters.
            //Note that some browsers will POST the string htmlentity-encoded whilst others will decode it before POSTing.
            //It is recommended that on the server, htmlentity decoding is done irrespective.
            //
            encodeHTMLEntities: true
        }, options);


        //Setup mobile browser detection: Partial credit: http://detectmobilebrowser.com/
        var userAgent = (navigator.userAgent || navigator.vendor || window.opera).toLowerCase();

        var isIos = false; //has full support of features in iOS 4.0+, uses a new window to accomplish this.
        var isAndroid = false; //has full support of GET features in 4.0+ by using a new window. POST will resort to a POST on the current window.
        var isOtherMobileBrowser = false; //there is no way to reliably guess here so all other mobile devices will GET and POST to the current window.

        if (/ip(ad|hone|od)/.test(userAgent)) {

            isIos = true;

        } else if (userAgent.indexOf('android') != -1) {

            isAndroid = true;

        } else {

            isOtherMobileBrowser = /avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|playbook|silk|iemobile|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i.test(userAgent.substr(0, 4));

        }

        var httpMethodUpper = settings.httpMethod.toUpperCase();

        if (isAndroid && httpMethodUpper != "GET") {
            //the stock android browser straight up doesn't support file downloads initiated by non GET requests: http://code.google.com/p/android/issues/detail?id=1780

            if ($().dialog) {
                $("<div>").html(settings.androidPostUnsupportedMessageHtml).dialog(settings.dialogOptions);
            } else {
                alert(settings.androidPostUnsupportedMessageHtml);
            }

            return;
        }

        //wire up a jquery dialog to display the preparing message if specified
        var $preparingDialog = null;
        if (settings.preparingMessageHtml) {

            $preparingDialog = $("<div>").html(settings.preparingMessageHtml).dialog(settings.dialogOptions);

        }

        var internalCallbacks = {

            onSuccess: function (url) {

                //remove the perparing message if it was specified
                if ($preparingDialog) {
                    $preparingDialog.dialog('close');
                };

                settings.successCallback(url);

            },

            onFail: function (responseHtml, url) {

                //remove the perparing message if it was specified
                if ($preparingDialog) {
                    $preparingDialog.dialog('close');
                };

                //wire up a jquery dialog to display the fail message if specified
                if (settings.failMessageHtml) {

                    $("<div>").html(settings.failMessageHtml).dialog(settings.dialogOptions);

                    //only run the fallcallback if the developer specified something different than default
                    //otherwise we would see two messages about how the file download failed
                    if (settings.failCallback != defaultFailCallback) {
                        settings.failCallback(responseHtml, url);
                    }

                } else {

                    settings.failCallback(responseHtml, url);
                }
            }
        };


        //make settings.data a param string if it exists and isn't already
        if (settings.data !== null && typeof settings.data !== "string") {
            settings.data = $.param(settings.data);
        }


        var $iframe,
        downloadWindow,
        formDoc,
        $form;

        if (httpMethodUpper === "GET") {

            if (settings.data !== null) {
                //need to merge any fileUrl params with the data object

                var qsStart = fileUrl.indexOf('?');

                if (qsStart != -1) {
                    //we have a querystring in the url

                    if (fileUrl.substring(fileUrl.length - 1) !== "&") {
                        fileUrl = fileUrl + "&";
                    }
                } else {

                    fileUrl = fileUrl + "?";
                }

                fileUrl = fileUrl + settings.data;
            }

            if (isIos || isAndroid) {

                downloadWindow = window.open(fileUrl);
                downloadWindow.document.title = settings.popupWindowTitle;
                window.focus();

            } else if (isOtherMobileBrowser) {

                window.location(fileUrl);

            } else {

                //create a temporary iframe that is used to request the fileUrl as a GET request
                $iframe = $("<iframe>")
                .hide()
                .attr("src", fileUrl)
                .appendTo("body");
            }

        } else {

            var formInnerHtml = "";

            if (settings.data !== null) {

                $.each(settings.data.replace(/\+/g, ' ').split("&"), function () {

                    var kvp = this.split("=");

                    var key = settings.encodeHTMLEntities ? htmlSpecialCharsEntityEncode(decodeURIComponent(kvp[0])) : decodeURIComponent(kvp[0]);
                    if (!key) return;
                    var value = kvp[1] || '';
                    value = settings.encodeHTMLEntities ? htmlSpecialCharsEntityEncode(decodeURIComponent(kvp[1])) : decodeURIComponent(kvp[1]);

                    formInnerHtml += '<input type="hidden" name="' + key + '" value="' + value + '" />';
                });
            }

            if (isOtherMobileBrowser) {

                $form = $("<form>").appendTo("body");
                $form.hide()
                .attr('method', settings.httpMethod)
                .attr('action', fileUrl)
                .html(formInnerHtml);

            } else {

                if (isIos) {

                    downloadWindow = window.open("about:blank");
                    downloadWindow.document.title = settings.popupWindowTitle;
                    formDoc = downloadWindow.document;
                    window.focus();

                } else {

                    $iframe = $("<iframe style='display: none' src='about:blank'></iframe>").appendTo("body");
                    formDoc = getiframeDocument($iframe);
                }

                formDoc.write("<html><head></head><body><form method='" + settings.httpMethod + "' action='" + fileUrl + "'>" + formInnerHtml + "</form>" + settings.popupWindowTitle + "</body></html>");
                $form = $(formDoc).find('form');
            }

            $form.submit();
        }


        //check if the file download has completed every checkInterval ms
        setTimeout(checkFileDownloadComplete, settings.checkInterval);


        function checkFileDownloadComplete() {

            //has the cookie been written due to a file download occuring?
            if (document.cookie.indexOf(settings.cookieName + "=" + settings.cookieValue) != -1) {

                //execute specified callback
                internalCallbacks.onSuccess(fileUrl);

                //remove the cookie and iframe
                var date = new Date(1000);
                document.cookie = settings.cookieName + "=; expires=" + date.toUTCString() + "; path=" + settings.cookiePath;

                cleanUp(false);

                return;
            }

            //has an error occured?
            //if neither containers exist below then the file download is occuring on the current window
            if (downloadWindow || $iframe) {

                //has an error occured?
                try {

                    var formDoc;
                    if (downloadWindow) {
                        formDoc = downloadWindow.document;
                    } else {
                        formDoc = getiframeDocument($iframe);
                    }

                    if (formDoc && formDoc.body != null && formDoc.body.innerHTML.length > 0) {

                        var isFailure = true;

                        if ($form && $form.length > 0) {
                            var $contents = $(formDoc.body).contents().first();

                            if ($contents.length > 0 && $contents[0] === $form[0]) {
                                isFailure = false;
                            }
                        }

                        if (isFailure) {
                            internalCallbacks.onFail(formDoc.body.innerHTML, fileUrl);

                            cleanUp(true);

                            return;
                        }
                    }
                }
                catch (err) {

                    //500 error less than IE9
                    internalCallbacks.onFail('', fileUrl);

                    cleanUp(true);

                    return;
                }
            }


            //keep checking...
            setTimeout(checkFileDownloadComplete, settings.checkInterval);
        }

        //gets an iframes document in a cross browser compatible manner
        function getiframeDocument($iframe) {
            var iframeDoc = $iframe[0].contentWindow || $iframe[0].contentDocument;
            if (iframeDoc.document) {
                iframeDoc = iframeDoc.document;
            }
            return iframeDoc;
        }

        function cleanUp(isFailure) {

            setTimeout(function() {

                if (downloadWindow) {

                    if (isAndroid) {
                        downloadWindow.close();
                    }

                    if (isIos) {
                        if (isFailure) {
                            downloadWindow.focus(); //ios safari bug doesn't allow a window to be closed unless it is focused
                            downloadWindow.close();
                        } else {
                            downloadWindow.focus();
                        }
                    }
                }

            }, 0);
        }

        function htmlSpecialCharsEntityEncode(str) {
            return str.replace(/&/gm, '&amp;')
            .replace(/\n/gm, "&#10;")
            .replace(/\r/gm, "&#13;")
            .replace(/</gm, '&lt;')
            .replace(/>/gm, '&gt;')
            .replace(/"/gm, '&quot;')
            .replace(/'/gm, '&apos;'); //single quotes just to be safe
        }
    }
});
if(flg_apm==undefined){
    flg_apm={};
}
flg_apm.initGlobalClick=function(){

    $.each(jQuery('.autocomplete_field'), function(i, obj){
        var fieldname=jQuery(obj).attr('fieldname');
        var post_type=jQuery(obj).attr('post_type');
        flg_apm.ajaxurl=ajaxurl;
        var obj=obj;
        $.fn.typeahead.Constructor.prototype.blur = function() {
            var that = this;
            setTimeout(function () {
                that.hide()
            }, 250);
        };
        $(obj).typeahead({
            minLength: 2,
            source: function(query, process) {
                //e.preventDefault();
                this.obj=obj;
                $.ajax({
                    url:flg_apm.ajaxurl+"?&action=amp-ajax-autocomplete&fieldname="+fieldname+"&post_type="+post_type+"&noparenthesis=true",
                    data:{
                        name_startsWith: query,
                        limit: 14
                    },
                    type: "POST",
                    async: false,
                    success:function(data) {
                        data=$.JSON.decode(data);
                        listar = [];
                        map = {};
                        $.each(data.results, function (i, obj) {
                            map[obj.name] = obj;
                            listar.push(obj.name);
                        });
                        process(listar);
                    }
                });
            },
            matcher: function (item) {
                if (item.toLowerCase().indexOf(this.query.trim().toLowerCase()) != -1) {
                    return true;
                }
            },
            updater: function (item) {
                selectedId = map[item].id;
                $(this.obj).parent().find('.autocomplete_field_value').val(selectedId);
                return item;
            },
            sorter: function (items) {
                return items.sort();
            },
            highlighter: function (item) {
                var regex = new RegExp( '(' + this.query + ')', 'gi' );
                return item.replace( regex, "<strong>$1</strong>" );
            }
        });
        /*
        a= $(obj).autocomplete( {
            //serviceUrl:ajaxurl+"?callback=?&action=amp-ajax-autocomplete&fieldname="+fieldname+"&post_type="+post_type,
            source: function( request, response ) {
                $.ajax({
                    url: flg_apm.ajaxurl,//+"?&action=amp-ajax-autocomplete&fieldname="+fieldname+"&post_type="+post_type,
                    dataType: "jsonp",
                    type: "POST",
                    data: {
                        action: "amp-ajax-autocomplete",
                        fieldname: fieldname,
                        post_type: post_type,
                        style: "full",
                        maxRows: 12,
                        name_startsWith: request.term
                    },
                    success: function( data ) {
                        response( $.map( data.results, function( item ) {
                            return {
                                label: item.name ,//+ (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
                                value: item.name,
                                id: item.id
                            }
                        }));
                    }
                });
            },
            minLength: 2,
            select: function( event, ui ) {
                // alert("select "+ ui.item.label+ "-"+ this.value);
                ui.item ?
                $(this).parent().find('.autocomplete_field_value').val(ui.item.id) :
                false;

            },
            open: function() {
                //alert("open");
                $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
            },
            close: function() {
                $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
            },
            minChars:2
        });
     */
        $(obj).blur(function(){
            if(jQuery(this).val()==''){
                jQuery(this).next().val('');
            }
        });
        $(obj).change(function(){
            /* n=$(this).next();
                     //alert($(n).val()+"-"+$(n).attr('initial_value'));
                     if($(n).val()!==$(n).attr('initial_value')){
                             //alert($(this).hasClass('autocomplete_field_save_ajax'));
                         if($(this).hasClass('autocomplete_field_save_ajax')){
                         }
                     }*/
            });
    });
}
