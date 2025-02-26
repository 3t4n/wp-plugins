<?php
defined('ABSPATH') || die("You Can't Access this File Directly");
?>
       <?php
   

 $cl = $values['class'];



         global $wpdb;
         $results12 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}popupdata WHERE class = '".$cl."'", OBJECT );

        foreach ( $results12 as $key22=>$value22 ) { 
            $id = $results12[$key22]->id;           
            $name = $results12[$key22]->popupname;
            $title = $results12[$key22]->popuptitle;
            $contentpopup = $results12[$key22]->popuphtml;
            $btntext = $results12[$key22]->text;
            $Borderradius = $results12[$key22]->Border_radius;
            $Color = $results12[$key22]->Color;
            $bgcolor = $results12[$key22]->Background_Color;
            $BgColorhover = $results12[$key22]->Background_Color_hover;
            $BorderColor = $results12[$key22]->Border_Color;
            $BorderColorHover = $results12[$key22]->Border_Color_Hover;
            $BorderSize = $results12[$key22]->Border_Size;
            $FontSize = $results12[$key22]->Font_Size;
            $txtclrhover = $results12[$key22]->colorhover;
            $txtalign = $results12[$key22]->textalign;
            $btnszenew = $results12[$key22]->btnsze;
            $margin2 = $results12[$key22]->margin;
            $padding2 = $results12[$key22]->padding;
            $popfntsze2 = $results12[$key22]->popsize;
            $poptxtcolor2 = $results12[$key22]->popcolor;
            $popBgcolor2 = $results12[$key22]->popbgcolor;
            $popBordersize2 = $results12[$key22]->popbrdersze;
            $popBorderclr2 = $results12[$key22]->popbrdrclr;
            $popBorderradius2 = $results12[$key22]->popbrdrrads;
            $popMargin2 = $results12[$key22]->popmargin;
            $popPadding2 = $results12[$key22]->poppadding;
            $popwidth = $results12[$key22]->popwidth;
            $popclosebtnclr = $results12[$key22]->closebtnclr;
            $popanimation = $results12[$key22]->animation;
            $opacity = $results12[$key22]->opacity;
            $animtesped = $results12[$key22]->animationspeed;
            $transitionpop = $results12[$key22]->transition;
            $titlesize = $results12[$key22]->titlesize;
            $titlecolor = $results12[$key22]->titlecolor;
            $crossbtnsze = $results12[$key22]->crossbtnsze;
            $opacitycolor = $results12[$key22]->opacitycolor;
            $activecokie = $results12[$key22]->activecokie;
            $cookiename = $results12[$key22]->cookiename;
            $cookietime = $results12[$key22]->cookietime;
            $cookietime2 = $results12[$key22]->cookietime2;
        }

         
           ?>    

<div id="maindivpop<?php echo $id ?>">
   <div id ="popmaindvnew<?php echo $id ?>">
    <div class="maincontpop">
    <div class="themehalfimage"></div>
   <div id="popup<?php echo $id ?>" class="hidePopup animereverse popupcls">

    <div class="contentxtpopup">
         
        
        <h2 class="heading"><?php echo $title ?></h2>
        <div class="contentxt"><?php echo do_shortcode($contentpopup); ?></div>
        </div>
        <div class="uercontent"></div>


       <i class="fa fa-times" id="removePopup<?php echo $id ?>" onclick="hidePopUp(<?php echo $id ?>)"></i>
    </div> 
     </div>
    </div>
   <div id="btnDiv<?php echo $id ?>" class="btnclsnew hidelement"> <input type="button" onclick="showPopUp(<?php echo $id ?>)" id="popbtn<?php echo $id ?>" class="mainbtncls<?php echo $id;?> predefinedCls" value="<?php echo $btntext; ?>"> </div>
       
   </div>

    <script>

      window.addEventListener('load',function(){
        if('<?php echo $activecokie ?>' != 'true'){
    document.getElementById('btnDiv<?php echo $id ?>').classList.remove('hidelement');
    }
    else {   

checkCookie('<?php echo $cookiename ?>', parseInt('<?php echo $cookietime ?>'), parseInt('<?php echo $cookietime2 ?>'), '<?php echo $id ?>');
    }
      });

      // Cookie set function start

function setCookie(cname,cvalue,exdays,exhours) {
  var d = new Date();

    var expval = exdays*24+exhours;

    expval = expval*60*60*1000;

  d.setTime(d.getTime() + (expval));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie(cookieval,cookieday,cookiehour,id) {
  var cookie=getCookie(cookieval);
  if (cookie != "") {
  }
   else {
    cookie = cookieval;  
    showPopUp(id);

     if (cookie != "" && cookie != null) {
       setCookie(cookieval, cookie, cookieday, cookiehour);
     }
  }
}

// Cookie set function close



        function hexToRgbA(hex){
            console.log(hex);
var c;
if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
c= hex.substring(1).split('');
if(c.length== 3){
c= [c[0], c[0], c[1], c[1], c[2], c[2]];
}
c= '0x'+c.join('');
return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+',<?php echo $opacity ?> )';
}
throw new Error('Bad Hex');
}

var x = document.createElement('STYLE');


var btnStyle = '.mainbtncls<?php echo $id;?> { background-color:'+'<?php echo $bgcolor; ?>'+';'+' '+'border:'+'<?php echo $BorderSize.'px  solid '.$BorderColor; ?>'+';'+' '+'border-radius:'+'<?php echo $Borderradius; ?>'+'px;'+' '+'color:'+'<?php echo $Color; ?>'+';'+' '+'font-size:'+'<?php echo $FontSize; ?>'+'px;'+' '+'min-width:'+'<?php echo $btnszenew; ?>'+'px'+';'+' '+'padding:'+'<?php echo $padding2; ?>'+'px'+';'+' '+'margin:'+'<?php echo $margin2; ?>'+'px'+';   }';
var marginLeft = '-'+'<?php echo $popwidth; ?>'/2;
var btnStyleHover = ' .mainbtncls<?php echo $id;?>:hover { background-color:'+'<?php echo $BgColorhover; ?>'+';'+' '+'border-color:'+'<?php echo $BorderColorHover; ?>'+';'+'color:'+'<?php echo $txtclrhover; ?>'+';} #btnDiv<?php echo $id ?>{text-align:'+'<?php echo $txtalign; ?>'+'; }';

var popStyle = '#popup<?php echo $id;?> {background-color:'+'<?php echo $popBgcolor2; ?>'+';'+' '+'font-size:'+'<?php echo $popfntsze2; ?>'+'px;'+' '+'color:'+'<?php echo $poptxtcolor2; ?>'+';'+' '+'border:'+'<?php echo $popBordersize2."px solid"." ".$popBorderclr2; ?>'+';'+' '+'border-radius:'+'<?php echo $popBorderradius2; ?>'+'px;'+' '+'padding:'+'<?php echo $popPadding2; ?>'+'px'+';'+' '+'margin:'+'<?php echo $popMargin2; ?>'+'px'+';'+' '+'width:'+'<?php echo $popwidth; ?>'+'%;'+' '+'margin-left:'+marginLeft+'%'+'; '+' '+ '}';

var animeforward = '#maindivpop<?php echo $id ?> .animeforward {animation-name:'+'<?php echo $popanimation?>'+';'+' '+'animation-duration:'+' <?php echo $animtesped ?>'+'ms;}';
var animereverse = '#maindivpop<?php echo $id ?>  .animereverse {animation-name:'+'<?php echo $popanimation?>'+'reverse;'+' '+'animation-duration:'+' <?php echo $animtesped ?>'+'ms;}';

var popcontentStyle = '#maindivpop<?php echo $id ?> .contentxt {font-size:'+'<?php echo $popfntsze2; ?>'+'px!important;'+' '+'color:'+'<?php echo $poptxtcolor2; ?>'+'!important; }';

var popclosebtnstyle = '#maindivpop<?php echo $id ?>  i.fa.fa-times {color:'+'<?php echo $popclosebtnclr; ?>'+';'+' '+'font-size:'+'<?php echo $crossbtnsze ?>'+'px;' +'}';

var poptitlestyle = '#maindivpop<?php echo $id ?> .heading{color:'+'<?php echo $titlecolor; ?>'+'!important;'+' '+'font-size:'+'<?php echo $titlesize ?>'+'px!important; }';

document.getElementById('popup<?php echo $id?>').setAttribute('name','<?php echo $popanimation?> <?php echo $animtesped ?>');



var popoverlay ='#maindivpop<?php echo $id ?> .overlay {background:'+hexToRgbA('<?php echo $opacitycolor; ?>');' }';



x.innerHTML = btnStyle + ' '+popcontentStyle+' '+popclosebtnstyle+' '+ btnStyleHover + ' ' + popStyle +' '+poptitlestyle+' '+ animeforward+' '+ animereverse+' '+popoverlay;
document.head.append(x);



</script>