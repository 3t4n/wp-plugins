<?php
/*
Plugin Name: Pett Tube
Plugin URI: http://www.runtimesistemas.com.br
Description: Plugin para mostrar os ultimos videos postados no YouTube.
Author: Rogerio Pett
Version: 2.0
Author URI: http://www.pett.com.br
*/

//Registra o widget...
add_action("widgets_init","PettTube_Load_Widget");

function PettTube_Load_Widget() {
  register_widget("PettTube_Widget");
}
//......

function PettTube_Videos($usuario,$numvideos) {
  // URL do Feed RSS de vídeos de um usuário
  $youTube_UserFeedURL = 'http://gdata.youtube.com/feeds/base/users/%s/uploads?orderby=updated&v=2';

  // Usa cURL para pegar o XML do feed
  $cURL = curl_init(sprintf($youTube_UserFeedURL, $usuario));
  curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($cURL, CURLOPT_FOLLOWLOCATION, true);
  $resultado = curl_exec($cURL);
  curl_close($cURL);
  
  // Inicia o parseamento do XML com o SimpleXML
  $xml = new SimpleXMLElement($resultado);

  $videos = array();

  // Passa por todos vídeos no RSS
  $counter==0;
  foreach ($xml->entry AS $video) {
    $counter++;
    $url = (string)$video->link['href'];

    // Quebra a URL do vídeo para pegar o ID
    parse_str(parse_url($url, PHP_URL_QUERY), $params);
    $id = $params['v'];
 
    // Monta um array com os dados do vídeo
    $videos[] = array(
      'id' => $id,
      'titulo' => (string)$video->title,
      'thumbnail' => 'http://i' . rand(1, 4) .'.ytimg.com/vi/'. $id .'/hqdefault.jpg',
      'url' => $url
    );
    if ($counter==$numvideos) break;
  }
  return $videos;
}


class PettTube_Widget extends WP_Widget {

  //Widget setup.
  function PettTube_Widget() {
    //Widget settings.
    $widget_ops = array("classname"=>"petttube","description"=>"Um widget que mostra os ultimos videos do youtube. A widget that show your latest youtube videos.");

    //Widget control settings.
    $control_ops = array("width"=>300,"height"=>350,"id_base"=>"petttube-widget");

    //Create the widget.
    $this->WP_Widget("petttube-widget","Pett Tube",$widget_ops,$control_ops);
  }

  //Como mostrar o widget na tela.
  function widget($args, $instance) {
    extract($args);
    //Our variables from the widget settings.
    $title=apply_filters("widget_title",$instance["title"]);
    $username=$instance["username"];
    $thumbwidth=$instance["thumbwidth"];
    $numvideos=$instance["numvideos"];

    echo $before_widget; //Before widget (defined by themes).

    //Mostra o titulo caso tenha sido digitado.
    if ( $title )
      echo $before_title . $title . $after_title;

    //Lista os videos caso tenha sido digitado o username.
    if ( $username ) {
      $videos=PettTube_Videos($username,$numvideos);
      foreach ($videos as $video) {
        echo "<a href=\"".$video['url']."\" title=\"".$video['titulo']."\"><img src=\"".$video['thumbnail']."\" alt=\"".$video['titulo']."\" width=\"".$thumbwidth."\"/></a>\n";
      }
    }
    echo $after_widget; //After widget (defined by themes).
  }

  //Atualiza as configuracoes do widget
  function update($new_instance,$old_instance) {
    $instance=$old_instance;
    //Elimina tags HTML dos campos texto.
    $instance["title"]=strip_tags($new_instance["title"]);
    $instance["username"]=strip_tags($new_instance["username"]);
    $instance["thumbwidth"]=strip_tags($new_instance["thumbwidth"]);
    $instance["numvideos"]=strip_tags($new_instance["numvideos"]);
    return $instance;
  }

  //Mostra as configuracoes atuais nos campos do widget.
  function form( $instance ) {
    /* Set up some default widget settings. */
    $defaults = array("title"=>"Ultimos Videos","username"=>"youtube_username","thumbwidth"=>"5");
    $instance = wp_parse_args((array)$instance,$defaults); ?>

    <p>
      <label for="<?php echo $this->get_field_id("title"); ?>">Title:</label>
      <input id="<?php echo $this->get_field_id("title"); ?>" name="<?php echo $this->get_field_name("title"); ?>" value="<?php echo $instance["title"]; ?>" style="width:100%;" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id("username"); ?>">YouTube Username:</label>
      <input id="<?php echo $this->get_field_id("username"); ?>" name="<?php echo $this->get_field_name("username"); ?>" value="<?php echo $instance["username"]; ?>" style="width:100%;" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id("thumbwidth"); ?>">Thumbnail Width:</label>
      <input id="<?php echo $this->get_field_id("thumbwidth"); ?>" name="<?php echo $this->get_field_name("thumbwidth"); ?>" value="<?php echo $instance["thumbwidth"]; ?>" style="width:100%;">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id("numvideos"); ?>">Number of Videos: (1 to 25)</label>
      <input id="<?php echo $this->get_field_id("numvideos"); ?>" name="<?php echo $this->get_field_name("numvideos"); ?>" value="<?php echo $instance["numvideos"]; ?>" style="width:100%;">
    </p>

  <?php
  }

}

?>
