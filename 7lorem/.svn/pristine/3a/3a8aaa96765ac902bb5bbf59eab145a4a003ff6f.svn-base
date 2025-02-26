<?php
/*
Plugin Name: 7lorem
Description: make easy content very fast.It is a widget for making lorem ipsum.
author:Reza nasrollahi in 7learn.com
Plugin URI: http://7learn.com/

*/
/* Start Adding Functions Below this Line */


/* Stop Adding Functions Below this Line */
?>
<?php // Creating the widget 
class lo_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'lo_widget', 

// Widget name will appear in UI
__('لورم اپیسوم', 'lo_widget_domain'), 

// Widget description
array( 'description' => __( 'افزونه ای ساده برای ساخت طرح واره', 'lo_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
echo __( '<style>
@import url(http://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css);
*{font-family:Droid Arabic Naskh;}</style> <script>
function objectTag(){var e=new Array;switch(document.loremForm.loremString.value){case"persian":e[0]="آیا برای این بی سرو سامانی خود برنامه و وقتی مشخص کرده ایم؟ آیا تصمیم گرفته ایم که روزی گناه نکنیم؟ یا که می خواهیم همین وضع را ادامه دهیم. اگر نمی خواهیم این وضع ادامه داشته باشد برای آن وقتی تعیین کنیم چون اگر بخواهیم تا زنده ایم گناه کردن را ادامه دهیم خطرناک است. پس حداقل حدی برای گناهمان تعیین کنیم....";break;case"latin":e[0]="Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.";break;case"silly":e[0]="لورم ایپسوم یا طرح نما به متنی آزمایشی و بی معنی در صنعت چاپ، صفحه آرایی و طراحی گرافیک گفته می شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد. معمولا طراحان گرافیک برای صفحه آرایی، نخست از متن های آزمایشی و بی معنی استفاده می کنند تا صرفا به مشتری یا صاحب کار خود نشان دهند که صفحه طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می رسد و قلم ها و اندازه بندی ها چگونه در نظر گرفته شده است. از آنجایی که طراحان عموما نویسنده متن نیستند و وظیفه رعایت حق تکثیر متون را ندارند و در همان حال کار آنها به نوعی وابسته به متن می باشد آنها با استفاده از محتویات ساختگی، صفحه گرافیکی خود را صفحه آرایی می کنند تا مرحله طراحی و صفحه بندی را به پایان برند.";break;case"spanish":e[0]="Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc., li tot Europa usa li sam vocabularium. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilit? de un nov lingua franca: on refusa continuar payar custosi traductores. It solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.";break;case"italian":e[0]="Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental: in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es."}if("characters"==document.loremForm.type.value){var a="",i=document.loremForm.numbers.value;i=parseInt(i);for(var t=e.join("\n\n");a.length<i;)a+=t;document.loremForm.output.value=a.substring(0,i)}else if("words"==document.loremForm.type.value){var n=document.loremForm.numbers.value;n=parseInt(n);var r=new Array,u=new Array;u=e[0].split(" ");for(var o=0,l=0;r.length<n;)l>u.length&&(l=0,o++,o+1>e.length&&(o=0),u=e[o].split(" "),u[0]="\n\n"+u[0]),r.push(u[l]),l++;document.loremForm.output.value=r.join(" ")}else{var s=document.loremForm.numbers.value;s=parseInt(s);for(var r=new Array,o=0;r.length<s;)o+1>e.length&&(o=0),r.push(e[o]),o++;document.loremForm.output.value=r.join("\n\n")}}function copypaste(){document.loremForm.output.focus(),document.loremForm.output.select(),therange=document.loremForm.output.createTextRange(),therange.execCommand("Copy")}
</script>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<body>
        <p class="grid_6"> توسط فرم زیر می توانید متن ساختگی مورد نظر خود را در واحدهای کاراکتر، کلمه و پاراگراف تولید کنید، سپس آنرا کپی کنید و در کار مورد نظر خود قرار دهید. </p>
        <form name="loremForm" class="pure-form" action="javascript:objectTag();" id="loremForm" class="grid_6">
          <h3>زبان مورد نظر خود را انتخاب کنید ...</h3>
          <select style="font-family:yek;font-size:12px;width: 100%;"  name="loremString" >
            <option value="persian" selected="selected">فارسی-معنی دار</option>
            <option value="latin">Lorem ipsum dolor sit amet... - Latin</option>
            <option value="silly">فارسی بی معنی</option>
<option value="spanish">Li Europan lingues es membres del sam familie... - Spanish</option>
<option value="italian">Ma quande lingues coalesce, li grammatica... - Italian</option>

          </select>
          <h3>تعداد را انتخاب کنید</h3>
          <select style="font-family:yek;font-size:12px;width: 100%;" name="type">
            <option value="characters">کاراکتر</option>
            <option value="words" selected="selected">کلمه</option>
            <option value="paragraphs">پاراگراف</option>
          </select>

          <input type="text" name="numbers" style="width: 100%;" value="8" size="4" />
          <input type="submit" style="width:50%;margin:10px;" name="btnOK" class="pure-button pure-button-primary" value="تولید کن" />
          <textarea rows="10"  name="output" style="width: 100%;" cols="10"></textarea>
        </form>
        <div id="form-btns" class="grid_6">
          <input type="button" style="width:40%;margin:10px 10px 0 0;"  onclick="copypaste()" value="انتخاب متن" class="pure-button pure-button-primary" name="select" />
          <input type="button" style="width:46%;margin:10px 8px 0 0;"  onclick="document.loremForm.reset()" class="pure-button pure-button-primary" value="پاک کردن فرم" />
        </div>

      </div>
      
    </div>', 'lo_widget_domain' );
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'سازنده ی لورم اپیسوم', 'lo_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class lo_widget ends here

// Register and load the widget
function lo_load_widget() {
	register_widget( 'lo_widget' );
}
add_action( 'widgets_init', 'lo_load_widget' );?>