<?php
/*
Plugin Name: imienniczek
Plugin URI: https://imienniczek.pl
Text Domain: imienniczek
Description: imienniczek.pl - wpisz w treści shortcode [imienniczek] aby wyświetlić osoby ktore mają dziś imieniny. Wtyczka automatycznie pobiera listę dzisiejszych solenizantow i wyświetla ją na Twojej stronie. Możesz też użyć gotowy widget.
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Author: Paweł Bolimowski, Hubert Rosiński
imienniczek jest darmową wtyczką, może być wykorzystywana, udostępniana i modyfikowana.
Version: 1.4.2
*/

//Dodawanie shortcode
function imienniczek_shortcode() {
	$response = '<script type="text/javascript" src="https://imienniczek.pl/widget/js" ></script>';
return $response;
}

add_shortcode("imienniczek","imienniczek_shortcode");


//Tworze widget imienniczek
class imienniczek extends WP_Widget { 
//Wywolanie obiektu
public function __construct()
{
	add_action('widgets_init', array($this, 'imienniczek_init'));
	$widget_details = array(
		'classname' => 'imienniczek',
		'description' => 'Wyświetla imiona dzisiejszych solenizantów imieninowych.'
	); 
	parent::__construct('imienniczek', 'Imienniczek', $widget_details);
}
	//Tworze podstawowy szkielet widgetu wymagana struktura wordpressa i zawartosc czyli pobieranie z imienniczka
	public function widget($args, $instance) {
	extract($args);
	echo $before_widget
		.$before_title
		.$instance['title']
		.$after_title;
	echo '<script type="text/javascript" src="https://imienniczek.pl/widget/js" ></script>';
	echo $after_widget;
}
	//Zmienia nazwe widgetu jesli zostala zmieniona przez uzytkownika
	public function update($new_instance, $old_instance) {
	return $new_instance;
}
	// Formularz nazwy widgetu
	public function form($instance) {
	$title = esc_attr($instance['title']);
	?>
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">
			Tytuł:
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>">
		</label>
	</p>
	<?php 
}
	//Rejestruje widget w wordpress
	public function imienniczek_init() {
	register_widget('imienniczek');
}
}
$imienniczek = new imienniczek();

//Tworze drugi widget Imienniczek Box
class imienniczekBox extends WP_Widget { 
    
    //Wywolanie obiektu
    public function __construct()
    {
        add_action('widgets_init', array($this, 'imienniczek_init'));
        $widget_details = array(
            'classname' => 'imienniczekBox',
            'description' => 'Wyświetla tabelkę z imionami solenizantów wczoraj / dziś / jutro / pojutrze.'
        ); 
        parent::__construct('imienniczekBox', 'ImienniczekBox', $widget_details);
    }
    
	//Tworze podstawowy szkielet widgetu wymagana struktura wordpressa i zawartosc czyli pobieranie z imienniczka
	public function widget($args, $instance) {
	    extract($args);
        echo $before_widget
            .$before_title
            .$instance['title']
            .$after_title;
        
        $kolor_imion = $instance['kolor_imion'] != '' ? $instance['kolor_imion'] : '#005baa';
        $kolor_tla = $instance['kolor_tla'] != '' ? $instance['kolor_tla'] : '#FFFFFF';
        
        $kolor_zakladki_1 = $instance['kolor_zakladki_1'] != '' ? $instance['kolor_zakladki_1'] : '#005BAA';
        $kolor_zakladki_2 = $instance['kolor_zakladki_2'] != '' ? $instance['kolor_zakladki_2'] : '#196BB2';
        $kolor_zakladki_3 = $instance['kolor_zakladki_3'] != '' ? $instance['kolor_zakladki_3'] : '#337CBB';
        
        $tresc = "
        <style>
        .imienniczek_box {
            font-family: helvetica, arial;
            line-height: normal;
            text-align:left;
            padding:5px;
            width:230px;
            min-width:230px;
            max-width:350px;
        }

        .imienniczek_box .list {
            font-family: helvetica, arial;
            font-size:15px; 
            color:#005baa; 
            text-decoration: none;
            display: block;
        }

        .imienniczek_box .box_tab {
            display: table;
            border-collapse: separate;
            box-sizing: border-box;
            border-spacing: 2px;
            border-color: grey;
            background-color:$kolor_tla;
			margin:0px;
        }
		
        .imienniczek_box .box_tab td {
            border:none;
        }
		
        .imienniczek_box .box_txt {
            position:relative;
            top:-8px;
            border:1px silver solid;
            clear:both;
        }

        .imienniczek_box .box_tab {
            width:100%;
            font-size:13px;
        }

        .imienniczek_box .box_tab td {
            width:50%;
            padding:1px !important;
        }

        .imienniczek_box .box_tab td  a {
            color:$kolor_imion !important;
        }
        .imienniczek_box .box_tab td  a:hover {
            text-shadow: 0.1px 0.1px 0.1px #001b6a;
        }

        .imienniczek_box .bb {
            float:left;
            width:23%;
            height:20px;
            text-align:center;
            padding-top:5px;
            color:#FFFFFF;
            cursor:pointer;
            box-sizing: unset;
            position:relative;
        }    
        
        .imienniczek_box .bb:hover {
            top:-2px;
        }

        .imienniczek_box .bb div {
            font-size:12px;  
            font-family: helvetica, arial;
        }

        .imienniczek_box .b_d_a, .imienniczek_box .b_w_a, .imienniczek_box .b_j_a, .imienniczek_box .b_p_a {
            border:1px silver solid;
            background-color:$kolor_tla;
            position:relative;
            top:-7px;
            width:23%;
            height:24px;
            z-index:10;
            margin:0px;
            color:$kolor_imion;
        }
        
        .imienniczek_box .b_d_a:hover, .imienniczek_box .b_w_a:hover, .imienniczek_box .b_j_a:hover, .imienniczek_box .b_p_a:hover {
            top:-7px;
        }
        
        .imienniczek_box .b_w {
            margin-left:3px;
        }
        .imienniczek_box .b_p_a {
            width:23%;
        }

        .imienniczek_box .b_d_a div, .imienniczek_box .b_w_a div, .imienniczek_box .b_j_a div, .imienniczek_box .b_p_a div {
            border:1px $kolor_tla solid;
            height:25px;
        }
        
        /* gdy wybrany wczoraj */
        .imienniczek_box .b_d_w {	margin-left:5px;background-color:$kolor_zakladki_1;}
        .imienniczek_box .b_j_w {	margin-left:5px;background-color:$kolor_zakladki_2;}
        .imienniczek_box .b_p_w {	margin-left:5px;background-color:$kolor_zakladki_3;}
        /* gdy wybrany dziś */
        .imienniczek_box .b_w_d {	margin-right:5px;background-color:$kolor_zakladki_1;}
        .imienniczek_box .b_j_d {	margin-left:5px;background-color:$kolor_zakladki_2;}
        .imienniczek_box .b_p_d {	margin-left:5px;background-color:$kolor_zakladki_3;}
        /* gdy wybrany jutro */
        .imienniczek_box .b_w_j {	margin-right:5px;background-color:$kolor_zakladki_1;}
        .imienniczek_box .b_d_j {	margin-right:5px;background-color:$kolor_zakladki_2;}
        .imienniczek_box .b_p_j {	margin-left:5px;background-color:$kolor_zakladki_3;}
        /* gdy wybrany pojutrze */
        .imienniczek_box .b_w_p {	margin-right:5px;background-color:$kolor_zakladki_1;}
        .imienniczek_box .b_d_p {	margin-right:5px;background-color:$kolor_zakladki_2;}
        .imienniczek_box .b_j_p {	margin-right:5px;background-color:$kolor_zakladki_3;}

        </style>
        ";    
        
        $tresc = str_replace(array("\n","\r","\t","  ","           "),array(" "," "," "," ",""),$tresc);

        $tresc .= '
        <script>
            function imienniczek_box(b) {
                if (b == 1) {
                    document.getElementById("txt_w").style.display = "block";
                    document.getElementById("b_w").className = "bb b_w_a";
                    document.getElementById("b_d").className = "bb b_d_w";
                    document.getElementById("b_j").className = "bb b_j_w";
                    document.getElementById("b_p").className = "bb b_p_w";
                }
                else 
                    document.getElementById("txt_w").style.display = "none";


                if (b == 2) {
                    document.getElementById("txt_d").style.display = "block";
                    document.getElementById("b_w").className = "bb b_w_d";
                    document.getElementById("b_d").className = "bb b_d_a";
                    document.getElementById("b_j").className = "bb b_j_d";
                    document.getElementById("b_p").className = "bb b_p_d";
                }
                else 
                    document.getElementById("txt_d").style.display = "none";


                if (b == 3) {
                    document.getElementById("txt_j").style.display = "block";
                    document.getElementById("b_w").className = "bb b_w_j";
                    document.getElementById("b_d").className = "bb b_d_j";
                    document.getElementById("b_j").className = "bb b_j_a";
                    document.getElementById("b_p").className = "bb b_p_j";
                }
                else 
                    document.getElementById("txt_j").style.display = "none";


                if (b == 4) {
                    document.getElementById("txt_p").style.display = "block";
                    document.getElementById("b_w").className = "bb b_w_p";
                    document.getElementById("b_d").className = "bb b_d_p";
                    document.getElementById("b_j").className = "bb b_j_p";
                    document.getElementById("b_p").className = "bb b_p_a";
                }
                else 
                    document.getElementById("txt_p").style.display = "none";
            }    
        </script>
        ';

        $tresc .= '<script type="text/javascript" src="https://imienniczek.pl/widget/box" ></script>';

        echo $tresc;
        echo $after_widget;
    }
    
	//Zmienia nazwe widgetu jesli zostala zmieniona przez uzytkownika
	public function update($new_instance, $old_instance) {
        return $new_instance;
    }
    
	// Formularz nazwy widgetu
	public function form($instance) {
        $title = esc_attr($instance['title']);
        $kolor_imion = esc_attr($instance['kolor_imion']);
        $kolor_tla = esc_attr($instance['kolor_tla']);
        $kolor_zakladki_1 = esc_attr($instance['kolor_zakladki_1']);
        $kolor_zakladki_2 = esc_attr($instance['kolor_zakladki_2']);
        $kolor_zakladki_3 = esc_attr($instance['kolor_zakladki_3']); 
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                Tytuł widgetu:
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>">
            </label>
            <label>
                <table>
                    <tr>
                        <td>Kolor imion:</td><td><input type="text" class="widefat" placeholder="domyślny" style="width:80px;" id="<?php echo $this->get_field_id('kolor_imion'); ?>" name="<?php echo $this->get_field_name('kolor_imion'); ?>" value="<?php echo $kolor_imion; ?>"></td>
                    </tr>
                    <tr>
                        <td>Kolor tła:</td><td><input type="text" class="widefat"  placeholder="domyślny" style="width:80px;" id="<?php echo $this->get_field_id('kolor_tla'); ?>" name="<?php echo $this->get_field_name('kolor_tla'); ?>" value="<?php echo $kolor_tla; ?>"></td>
                    </tr>
                    <tr>
                        <td>Kolory zakładek:</td><td>
                        <input type="text" class="widefat"  placeholder="domyślny" style="width:80px;" id="<?php echo $this->get_field_id('kolor_zakladki_1'); ?>" name="<?php echo $this->get_field_name('kolor_zakladki_1'); ?>" value="<?php echo $kolor_zakladki_1; ?>">
                        <input type="text" class="widefat"  placeholder="domyślny" style="width:80px;" id="<?php echo $this->get_field_id('kolor_zakladki_2'); ?>" name="<?php echo $this->get_field_name('kolor_zakladki_2'); ?>" value="<?php echo $kolor_zakladki_2; ?>">
                        <input type="text" class="widefat"  placeholder="domyślny" style="width:80px;" id="<?php echo $this->get_field_id('kolor_zakladki_3'); ?>" name="<?php echo $this->get_field_name('kolor_zakladki_3'); ?>" value="<?php echo $kolor_zakladki_3; ?>">
                        </td>
                    </tr>
                </table>
            </label>
        </p>
        <?php 
    }
    
	//Rejestruje widget w wordpress
	public function imienniczek_init() {
        register_widget('imienniczekBox');
    }
}
$imienniczekBox = new imienniczekBox();