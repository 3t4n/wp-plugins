<script>
    (function(w,t,c,p,s,e,l,k){
        p=new Promise(function(r){w[c]={client:function(){return p}};
            l=document.createElement('div');l.setAttribute("id", "live-caller-widget");
            s=document.createElement(t);s.async=1;s.setAttribute("data-livecaller", 'script');
            k=document.body || document.documentElement;k.insertBefore(l, k.firstChild);
            l.setAttribute("data-livecaller", 'mount-el');s.src='https://cdn.livecaller.io/js/app.js';
            e=document.getElementsByTagName(t)[0];e ? e.parentNode.insertBefore(s,e) : k.insertBefore(s, l.nextSibling);
            s.onload=function(){r(w[c]);};});return p;
    })(window,'script','LiveCaller').then(function(){
        try{
            LiveCaller.config.merge({ widget: { id: "<?php echo $widget_id; ?>" }, app: { locale: "<?php echo $widget_locale; ?>" } });
            LiveCaller.liftOff();
        }catch(e){
        }
    });
</script>
