<?php
/**
 * Plugin Name:       ASC Bio
 * Plugin URI:        https://github.com/jailsonpaca
 * Description:       ASC Bio Plugin is a multi-link tool for use in social media to add many link(urls) in a single page from your site.
 * Version:           1.1
 * Author:            agendasemprecheia(Jailson Pacagnan Santana)
 * Author URI:        https://www.agendasemprecheia.com/
 * Text Domain:       wpsr
 * License: GPLv2 or later (or compatible)
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

/*---------------ADMIN-----------------*/ 



function asc_bio_panel(){
    add_menu_page('ASC Bio', 'ASC Bio', 'manage_options', 'asc-bio', 'ascb_func');
    //add_submenu_page( 'asc-bio', 'Settings', 'Settings', 'manage_options', 'ascb-op-settings', 'ascb_func_settings');
    //add_submenu_page( 'asc-bio', 'FAQ', 'FAQ', 'manage_options', 'ascb-op-faq', 'ascb_func_faq');
  }
  add_action('admin_menu', 'asc_bio_panel');

  function sanitize_checkbox_field_ASCB( $input ) {
    if ( true === $input ) {
        return 1;
     } else {
        return 0;
     }
  }
  function validate_text_ASCB($value){
    if ($value) {
      return $value;
    } else {
      return '';
    }
  }

  function sanitize_text_array_ASCB( $array ) {
    foreach ( (array) $array as $k => $v ) {
           $array[$k] = sanitize_text_field( $v );
    }
 
   return $array;                                                       
 }

  function ascb_func(){

    ?>
    <div class="wrap">
    <h2>ASC Bio</h2></div>
    </br>
    <?php
          if(array_key_exists('submit_ascb_update',$_POST)){
              $aux=validate_text_ASCB(sanitize_textarea_field($_POST['custom_css']));
              update_option('ascb_custom_css',stripslashes($aux));
              $aux=validate_text_ASCB(sanitize_textarea_field($_POST['ga_code']));
              update_option('ascb_ga_code',stripslashes($aux));
              $aux=validate_text_ASCB(sanitize_textarea_field($_POST['pixel_code']));
              update_option('ascb_pixel_code',stripslashes($aux));
              $aux=validate_text_ASCB(sanitize_text_field($_POST['pageName']));
              update_option('ascb_name',$aux);
              $aux=validate_text_ASCB(sanitize_text_field($_POST['image']));
              update_option('ascb_img',$aux);
              $aux=validate_text_ASCB(sanitize_text_field($_POST['description']));
              update_option('ascb_description',$aux);
              $aux=validate_text_ASCB(sanitize_text_field($_POST['fields']));
              update_option('ascb_fields',$aux);
              $aux=sanitize_text_array_ASCB($_POST['nome']);
              //$aux=array_map( 'sanitize_text_field', $aux );
              //$aux=array_map( 'validate_text_ASCB', $aux );
              update_option('ascb_nomes',$aux);
              $aux=sanitize_text_array_ASCB($_POST['url']);
              //$aux=array_map( 'sanitize_text_field', $aux );
              //$aux=array_map( 'validate_text_ASCB', $aux );
              update_option('ascb_urls',$aux);
              $aux=validate_text_ASCB(sanitize_hex_color($_POST['font_color']));
              update_option('ascb_font_color',stripslashes($aux));
              $aux=validate_text_ASCB(sanitize_hex_color($_POST['Background_color']));
              update_option('ascb_Background_color',stripslashes($aux));
              $aux=sanitize_checkbox_field(isset($_POST['checkBar']));
              update_option('ascb_checkBar',stripslashes($aux));
              add_bio_page_bio();
             ?>
             
             <div id="serrings-error-updated" class="serrings-error-updated">
             <strong>Configurações Salvas!</strong>
             </div>
             </br>
             <?php
          }
          $custom_css=get_option('ascb_custom_css','');
          $pixel_code=get_option('ascb_pixel_code','');
          $ga_code=get_option('ascb_ga_code','');
          $pageName=get_option('ascb_name','links');
          $imgSrc=get_option('ascb_img','');
          $description=get_option('ascb_description', get_bloginfo ( 'name' ).' - '.get_bloginfo ( 'description' ));  
          $fields=get_option('ascb_fields',1);
          $urls=get_option('ascb_urls',['']);
          $nomes=get_option('ascb_nomes',['']);
          $font_color=get_option('ascb_font_color','#232323');
          $Background_color=get_option('ascb_Background_color','#ffffff');
          $checkBar=get_option('ascb_checkBar',false);
?>

            <form method="post" action="">
            <label for="pageName" style="margin-right: 12%;" class="label">Nome da Página</label>
              <input type="text" name="pageName" class="pageName" placeholder="Nome da Página" value="<?php print esc_attr($pageName);?>"/>
              <div class="headerTop" >
                <div style="float:left;">
                <label for="image"  class="label">Imagem</label>
                <input type="url" onblur="checkURL(this)" name="image" class="imgSrc" placeholder="Link da imagem" value="<?php print esc_attr($imgSrc);?>"/>
                </div>
                <div style="float:left;margin-left: 5px;">
                <label for="description"  class="label">Descrição</label>
                <input type="text"  class="descricao" name="description" placeholder="Digite a descrição" value="<?php print esc_attr($description);?>" />
                </div>
                <input type="button" onclick="addInput();" name="add" class="button button-primary" value="Adicionar mais um Link" />
              </div> 
              <br/> 
              <div id="options" <?php if ($checkBar){ ?> style="display:block;" <?php }else{?> style="display:none;" <?php } ?>>
                <?php for($i=0;$i<$fields;$i++){?> 
                  <div class="link" id="link-<?php print $i+1 ?>" >
                  <label for="nome[]" style="float: left;margin-right: 27%;" class="label">Nome para o link</label>
                  <label for="url[]" class="label">Link</label>
                  <input type="text"  class="nome" name="nome[]" placeholder="Digite o nome desejado para o link" value="<?php print esc_attr($nomes[$i]);?>" />
                  <input type="url"  onblur="checkURL(this)" class="url" name="url[]" placeholder="Digite o link desejado" value="<?php print esc_attr($urls[$i]);?>"/>
                  <input type="button"  onclick="up(this)" class="up button" value="⬆"/>
                  <input type="button"  onclick="down(this)" class="down button" value="⬇"/>
                  <?php if($i>0){?><input type="button" value="X" class="removeLink button" onclick="removeInput(this)"><?php } ?>
                  </div>
                  <?php }  ?>
                <input type="hidden" name="fields" class="fields" id="fields" value=<?php print esc_attr($fields);?>>
              </div>
              <div class="configs-options">
                <br/> 
                <div class="colors-input">
                <label for="Background_color"  class="label labelC">Cor de fundo da página</label>
                <input type="color" id="Background_color" name="Background_color" value="<?php print esc_attr($Background_color);?>">
                <label for="font_color" class="label labelC">Cor da fonte</label>
                <input type="color" id="font_color"  name="font_color" value="<?php print esc_attr($font_color);?>">
                <input type="button" id="default_color"  class="button" value="Restaurar Padrões" onClick="defaultConfig();" />
                </div>
                <br/>
                <br/>
                <label for="checkBar" class="label labelC">Ativar/Desativar Bio</label>
                <label class="switch">
                <input type="checkbox" name="checkBar" <?php if ($checkBar) echo 'checked="checked"'; ?>  id="checkBar" onclick='handleCheckBar(this);' />
                <span class="slider round"></span>
                </label>
                <input type="submit" name="submit_ascb_update" class="button button-primary btnSaveASCB" value="Salvar"/>
              </div> 
              <div class="customs" style="float:left;">
                <div style="float:left;">
                <label for="custom_css" class="label">CSS Personalizado</label>
                <textarea id="custom_css" class="textarea" name="custom_css" rows="10" cols="70"><?php print esc_textarea($custom_css);?></textarea>
                </div>
                <div style="float:left; margin-left: 40px;">
                <div >
                <label for="ga_code" class="label">Google Analytics</label>
                <input type="text" id="ga_code" class="textarea" placeholder="Ou deixe em branco" name="ga_code" value="<?php print esc_attr($ga_code);?>" />
                </div>
                <div >
                <label for="pixel_code" class="label">Facebook Pixel</label>
                <input type="text" id="pixel_code" class="textarea" placeholder="Ou deixe em branco" value="<?php print esc_attr($pixel_code);?>" name="pixel_code" />
                </div>
                </div>
              </div>
              <br/>
                 
          </form>
          <script>
            function defaultConfig(){
              document.getElementById("Background_color").value='#ffffff';
              document.getElementById("font_color").value='#232323';
            
            }
            function up(e){
              let thisContent = e.parentNode;
              let order=parseInt(thisContent.id.slice(-1),10);
              console.log(order);
              let prev=thisContent.previousElementSibling;
              console.log(prev);
              prev.id="prevSwap";
              if(order>1){
              thisContent.parentNode.insertBefore(thisContent, prev);
              thisContent.id=`link-${order-1}`;
              prev.id=`link-${order}`;
              }
            }
            function down(e){
              let thisContent = e.parentNode;
              let order=parseInt(thisContent.id.slice(-1),10);
              console.log(order);
              let next=thisContent.nextElementSibling;
              console.log(next);
              next.id="nextSwap";
              thisContent.parentNode.insertBefore(thisContent, next.nextElementSibling);
              thisContent.id=`link-${order+1}`;
              next.id=`link-${order}`;
            }
            function handleCheckBar(v){
                console.log("Clicked, new value = " + v.checked);
                if(v.checked){
                  document.getElementById("options").style.display = "block";
                }else{
                  document.getElementById("options").style.display = "none";
                }
            }
            var fields=<?php print esc_js($fields);?>;
            function addInput() {
              console.log(fields);
              document.querySelector('#options').insertAdjacentHTML(
                'beforeend',
                `<div class="link" style="order:${fields+1};" >
                  <label for="nome[]" style="float: left;margin-right: 27%;" class="label">Nome para o link</label>
                  <label for="url[]" class="label">Link</label>
                  <input type="text"  class="nome" name="nome[]" placeholder="Digite o nome desejado para o link" value="" />
                  <input type="url" onblur="checkURL(this)"  class="url" name="url[]" placeholder="Digite o link desejado" value=""/>
                  <input type="button"  onclick="up(this)" class="up button" value="⬆"/>
                  <input type="button"  onclick="down(this)" class="down button" value="⬇"/>
                  <input type="button" value="X" class="removeLink button" onclick="removeInput(this)">
                 </div>`      
              )
                fields++;
                document.getElementById('fields').value=fields;
            }
            function removeInput (input) {
              input.parentNode.remove()
              fields--;
              document.getElementById('fields').value=fields;
            }
            function checkURL (abc) {
              var string = abc.value;
              if (!~string.indexOf("http")) {
                string = "https://" + string;
              }
              abc.value = string;
              return abc
            }
          </script>
          </div>
<?php ;
  }
  function ascb_func_settings(){
          echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
          <h2>ASC Bio Settings</h2></div>';
  }
  function ascb_func_faq(){
          echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
          <h2>ASC Bio FAQ</h2></div>';
  }

/*---------------Functions-----------------*/ 
function load_style_ASCB_ADMIN() {
  wp_enqueue_style( 'ASC-Bio-Admin-Style', plugins_url( '/styleAdmin.css', __FILE__ ) );
}
add_action( 'admin_print_styles', 'load_style_ASCB_ADMIN' );

function ascb_display(){
 
    $checkBar=get_option('ascb_checkBar',false);
    $custom_css=get_option('ascb_custom_css','');
    $imgSrc=get_option('ascb_img','');
    $description=get_option('ascb_description', get_bloginfo ( 'name' ).' - '.get_bloginfo ( 'description' ));  
    $fields=get_option('ascb_fields',1);
    $urls=get_option('ascb_urls',[' ']);
    $nomes=get_option('ascb_nomes',[' ']);
    $font_color=get_option('ascb_font_color','#232323');
    $Background_color=get_option('ascb_Background_color','#ffffff');
    $aux='<div id="bio-page" style="color:'.trim($font_color).'; background-color:'.trim($Background_color).';" class="asc-bio"><div class="thumbnail"><img width="150" height="150" src="'.trim($imgSrc).'" class="thumb" alt="'.trim($description).' Favicon" ></div> <div class="description"><p>'.trim($description).'</p></div>';
    for($i=0;$i<$fields;$i++){
      $aux.='<a href="'.trim($urls[$i]).'" id="link-bio-'.trim($i).'" class="link-bio">'.trim($nomes[$i]).'</a>';
    }
      $aux.='</div><style>'.trim($custom_css).'</style>';
   
    if ($checkBar && sizeof($urls)>0 && sizeof($nomes)>0){
      
     
      return($aux);
   
    }
}

class PageTemplaterBioASCB {

	/**
	 * A reference to an instance of this class.
	 */
	private static $instance;

	/**
	 * The array of templates that this plugin tracks.
	 */
	protected $templates;

	/**
	 * Returns an instance of this class. 
	 */
	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new PageTemplaterBioASCB();
		} 

		return self::$instance;

	} 

	/**
	 * Initializes the plugin by setting filters and administration functions.
	 */
	private function __construct() {

		$this->templates = array();


		// Add a filter to the attributes metabox to inject template into the cache.
		if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {

			// 4.6 and older
			add_filter(
				'page_attributes_dropdown_pages_args',
				array( $this, 'register_project_templates' )
			);

		} else {

			// Add a filter to the wp 4.7 version attributes metabox
			add_filter(
				'theme_page_templates', array( $this, 'add_new_template' )
			);

		}

		// Add a filter to the save post to inject out template into the page cache
		add_filter(
			'wp_insert_post_data', 
			array( $this, 'register_project_templates' ) 
		);


		// Add a filter to the template include to determine if the page has our 
		// template assigned and return it's path
		add_filter(
			'template_include', 
			array( $this, 'view_project_template') 
		);


		// Add your templates to this array.
		$this->templates = array(
			'template-bio.php' => 'Bio Template',
		);
			
	} 

	/**
	 * Adds our template to the page dropdown for v4.7+
	 *
	 */
	public function add_new_template( $posts_templates ) {
		$posts_templates = array_merge( $posts_templates, $this->templates );
		return $posts_templates;
	}

	/**
	 * Adds our template to the pages cache in order to trick WordPress
	 * into thinking the template file exists where it doens't really exist.
	 */
	public function register_project_templates( $atts ) {

		// Create the key used for the themes cache
		$cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

		// Retrieve the cache list. 
		// If it doesn't exist, or it's empty prepare an array
		$templates = wp_get_theme()->get_page_templates();
		if ( empty( $templates ) ) {
			$templates = array();
		} 

		// New cache, therefore remove the old one
		wp_cache_delete( $cache_key , 'themes');

		// Now add our template to the list of templates by merging our templates
		// with the existing templates array from the cache.
		$templates = array_merge( $templates, $this->templates );

		// Add the modified cache to allow WordPress to pick it up for listing
		// available templates
		wp_cache_add( $cache_key, $templates, 'themes', 1800 );

		return $atts;

	} 

	/**
	 * Checks if the template is assigned to the page
	 */
	public function view_project_template( $template ) {
		
		// Get global post
		global $post;

		// Return template if post is empty
		if ( ! $post ) {
			return $template;
		}

		// Return default template if we don't have a custom one defined
		if ( ! isset( $this->templates[get_post_meta( 
			$post->ID, '_wp_page_template', true 
		)] ) ) {
			return $template;
		} 

		$file = plugin_dir_path( __FILE__ ). get_post_meta( 
			$post->ID, '_wp_page_template', true
		);

		// Just to be safe, we check if the file exist first
		if ( file_exists( $file ) ) {
			return $file;
		} else {
			echo $file;
		}

		// Return template
		return $template;

	}

} 
add_action( 'plugins_loaded', array( 'PageTemplaterBioASCB', 'get_instance' ) );

function set_template_page_bio($page_id) {
 
  $m=update_post_meta( $page_id, '_wp_page_template', 'template-bio.php' );
} 

function add_bio_page_bio() {
  
  $content=ascb_display();
  $check_page_exist = get_page_by_title(get_option('ascb_name','links'), 'OBJECT', 'page');
  if(!empty($check_page_exist)){
    $edited_page = array(
      'ID'           => $check_page_exist->ID,
      'post_content' => $content,
      'post_type'     => 'page',
  );
    if(current_user_can('edit_others_posts')){
    set_template_page_bio($check_page_exist->ID);
    wp_update_post( $edited_page);
    }
  }else{
  $bio_page = array(
    'ID'           => 0,
    'post_title'    => wp_strip_all_tags(get_option('ascb_name','links')),
    'post_content'  => $content,
    'post_status'   => 'publish',
    'post_author'   => 1,
    'post_type'     => 'page',
  );
    if(current_user_can('edit_others_posts')){
    wp_insert_post( $bio_page );
    $check_page = get_page_by_title(get_option('ascb_name','links'), 'OBJECT', 'page');
    set_template_page_bio($check_page->ID);
    }
  }

}

register_activation_hook(__FILE__, 'add_bio_page_bio');


function wpb_load_fa_bio() {
 
  wp_enqueue_script( 'wpb-fa', plugins_url( '/ebdb5c8cf3.js', __FILE__ ));
   
  }
   
  add_action( 'wp_enqueue_scripts', 'wpb_load_fa_bio' );


?>