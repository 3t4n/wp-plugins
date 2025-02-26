var animatedSets = [];


jQuery.noConflict();

jQuery(document).ready(function() {
    fidesit_ayc_init();
});


var attr_eval_method = {
    ease: 'eval',
    delay:'float',
    time:'float',
    rotate:'float'
}


function evaluate_attr(elem){
    var eval_attrs = ["ease"];
    var finalVal=elem.value;
    switch(attr_eval_method){
        case 'eval'  : finalVal=eval(elem.value); break;
        case 'float' : finalVal=parseFloat(elem.value); break;
        case 'int'   : finalVal=parseInt(elem.value); break;
    }
    if (eval_attrs.indexOf(elem.name) != -1){
        finalVal=eval(elem.value);
    }
    return finalVal;
}



function fidesit_ayc_init(){
    TweenLite.selector = jQuery;
    jQuery("div[ayc_type='animation-set']").css("display:inline");

    jQuery("div[ayc_type='animation-element']").each(function(index){
        var gsap_attrs=[];

        var ayc_attrs = [];

        jQuery.each(this.attributes, function(){
            if (this.name.indexOf("ayc_") == 0){
                ayc_attrs[this.name.substring(4)]=evaluate_attr(this);
            } else if (this.name.indexOf("gsap_") == 0){
                gsap_attrs[this.name.substring(5)]=evaluate_attr(this);
            }
        })
        var effect=ayc_attrs["effect"];
        var animation_time = ayc_attrs["time"];
        switch(effect){
            case 'slide_from_left':
                jQuery(this).offset({ left: -2000 });
                gsap_attrs["left"]="0px";
                gsap_attrs["top"]="0px";
                TweenLite.to(jQuery(this),animation_time, gsap_attrs);
                break;
            case 'slide_from_right':
                jQuery(this).offset({ left: 2000 });
                gsap_attrs["left"]="0px";
                gsap_attrs["top"]="0px";
                TweenLite.to(jQuery(this), animation_time, gsap_attrs);
                break;
            case 'slide_from_top':
                jQuery(this).offset({ top: -2000 });
                gsap_attrs["left"]="0px";
                gsap_attrs["top"]="0px";
                TweenLite.to(jQuery(this), animation_time, gsap_attrs);
                break;
            case 'slide_from_bottom':
                jQuery(this).offset({ top: 2000 });
                gsap_attrs["left"]="0px";
                gsap_attrs["top"]="0px";
                TweenLite.to(jQuery(this), animation_time, gsap_attrs);
                break;
            case 'fade_in':
                gsap_attrs['opacity']='1.0';
                TweenLite.fromTo(jQuery(this), animation_time, {opacity:0}, gsap_attrs);
                break;
            case 'rotate':
                gsap_attrs['transformOrigin']="20% 20%";
                TweenLite.fromTo(jQuery(this), animation_time, {rotation:0}, gsap_attrs);
                break;

        }

    });
}
