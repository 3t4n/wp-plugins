<?php
if ( ! defined( 'ABSPATH' ) ) {
  die( 'Direct access forbidden.' );
}
require_once __DIR__.'/../AFR-config.php';
require_once __DIR__.'/AFR-enregistrement.php';


$enregistrement = 0;
$enregistrement_roles = 0;

// Renommage des médias
if (isset($_POST['formenvoi'])) {
  if (isset($_POST['AFRactivation']) && $_POST['AFRactivation']==true){
    $AFR_activation = "1";
  }else{
    $AFR_activation = "0";
  }

  // Redirection des pages liées

  if (isset($_POST['AFR_redirection']) && $_POST['AFR_redirection']==true){
    $AFR_redirection = "1";
  }else{
    $AFR_redirection = "0";
  }

  if (isset($_POST['prefixe']) && isset($_POST['suffixe'])) {
    // Si on a reçu un changement, on commence par nettoyer :
    $AFR_prefixe = sanitize_title($_POST['prefixe']);

    $AFR_suffixe = sanitize_title($_POST['suffixe']);
  }

  if (isset($_POST['AFR_Ou_Rediriger'])) {
    switch ($_POST['AFR_Ou_Rediriger']) {
      case '1':
        $AFR_Ou_Rediriger = 'defaut';
        break;
      case '2':
        $AFR_Ou_Rediriger = 'pageliee';
        break;
      case '3':
        $AFR_Ou_Rediriger = 'error';
        break;
      default:
        $AFR_Ou_Rediriger = 'defaut';
        break;
    }
  }else{
      $AFR_Ou_Rediriger = 'defaut';
  }
}

if (isset($AFR_prefixe) && isset($AFR_suffixe) && isset($AFR_activation) && isset($AFR_redirection)){

  $enr = AFRenregistrement($AFR_prefixe, $AFR_suffixe, $AFR_activation, $AFR_redirection, $AFR_Ou_Rediriger);
  if ($enr == true) {
    $enregistrement = 1;
  }
}

// Enregistrement des droits d'accès au panel admin :
if (isset($_POST['formrolesenvoi'])) {
  $enr = AFR_user_role($_POST);
  if ($enr == true) {
    $enregistrement_roles = 1;
  }
}

?>

<div class="wrap">
  <style type="text/css">
    abbr, h1, label {
      color: darkcyan;
      font-weight: 700 !important;
    }
    abbr {
      cursor: help;
    }
    p, label {
      font-size: 1.1vw;
    }
    .AFRtext-exemple{
      margin: 10px 30px;
      font-size: 1.3vw;
      font-weight: 700;
    }
    .AFRbtnsubmit, .AFRsubmitroles {
      background-color: #bae9e9;
      border-radius: 10px;
      padding: 3px 10px;
      font-size: 1.1vw;
      cursor: pointer;
    }
    .AFRsubmitroles {
      float: right;
    }
    .role_manager {
      padding: 20px 20px 50px;
      background-color: #ffd6a0;
      width: 500px;
      border-radius: 20px;
      margin: 30px 0;
    }
  </style>

<?php
  echo '<h1>'.__('Automatic File Renamer', 'automatic-file-renamer').'</h1><hr>';

  echo '<p>'.__('When a media is uploaded, <b>an attachment page is automatically created</b>.<br><p> If your file\'s name is \'<b>horse.jpg</b>\', the attachment page will be called \'<b>https://your-site.com/horse</b>\'.<br>', 'automatic-file-renamer').'</p>';
  echo '<p>'.__('That can be really annoying, for many reasons ', 'automatic-file-renamer').'<a href="https://unsiteavous.fr/realisations/extensions/automatic-file-renamer/">'.__('mentioned here', 'automatic-file-renamer').'</a>.</p>';
  echo '<p>'.__('Especially since once the page is created, it\'s very dangerous to rename it !', 'automatic-file-renamer').'</p>';
  echo '<p>'.__('To avoid this, it\'s possible thanks to this plugin to rename automatically your files and their attachment pages while the upload.', 'automatic-file-renamer').'</p>';

  echo '<h3>'.__('Choose evocative terms', 'automatic-file-renamer').'</h3>';
  echo '<p>'.__('Browsers (and you too) love when words describe file content !', 'automatic-file-renamer').'</p>';
  ?>
  <form id="AFRactifornot" method="POST" action="#">
    <input type="hidden" name="formenvoi" value="yes1">
    <div style="margin-bottom:15px">
      <input id="activation" type="checkbox" name="AFRactivation" value="AFR-active" onclick="validateAFRActivation()" <?php if ($AFR_activation == 1) {?> checked <?php }?>>
      <label id="labelactivation" for="activation"></label>
    </div>
    <input id="AFRprefixe" type="text" name="prefixe" placeholder="prefixe" value="<?php echo  esc_textarea($AFR_prefixe)?>" style="width:20vw">
    <span><b><?php echo  __('file-name', 'automatic-file-renamer') ?></b></span>
    <input id="AFRsuffixe" type="text" name="suffixe" placeholder="suffixe" value="<?php echo esc_textarea($AFR_suffixe)?>" style="width:20vw">
    <span><b>{<?php echo  __('.extension', 'automatic-file-renamer') ?>}</b></span>
    <input class="AFRbtnsubmit" type="submit" name="Enregistrer" value="Enregistrer" onclick="document.getElementById('AFRactifornot').submit()">
    <?php if ($enregistrement == 1){?>
    <span id="retourenreg" style="color:green;transition:2s;"> <?php echo __('Saved !', 'automatic-file-renamer')?></span>
    <?php }?>

    <p><?php echo __('Currently, your files will be renamed like this :', 'automatic-file-renamer')?></p>
      <p class="AFRtext-exemple"><?php echo ($AFR_prefixe !== '' ? esc_textarea($AFR_prefixe).'-' : '')?><abbr title="<?php echo __('Once saved, the file name cannot be changed. Choose the name BEFORE uploading the file.');?>"><?php echo __('file-name', 'automatic-file-renamer');?></abbr>-<abbr title="<?php echo __('This number changes. it allows to differentiate between two records with the same file name.', 'automatic-file-renamer')?>">123</abbr><?php echo ($AFR_suffixe!=='' ? '-'. esc_textarea($AFR_suffixe) : '')?>.<abbr title=".jpg, .pdf, .mp3, ... "><?php echo __('extension', 'automatic-file-renamer');?></abbr></p>

    <p><?php echo __('This setting will apply to all files that will be uploaded.<br>It\'s not retroactive.', 'automatic-file-renamer');?></p>


    <hr>
    <p><?php echo __('The redirect hides the linked page.', 'automatic-file-renamer')?></p>
    <div>
      <input id="active_redirection" type="checkbox" name="AFR_redirection" value="AFR-redirect" onclick="submitActivateAFRredirect()"<?php  if ($AFR_redirection == 1) {?> checked <?php }?>>
      <label id="labelRedirect" for="active_redirection"></label>
    </div>
    <ul style="margin-left:20px">
      <li>
        <input id="AFRredirectdefaut" type="radio" name="AFR_Ou_Rediriger" value="1" onclick="submitAFRredirect()"<?php  if ($AFR_Ou_Rediriger == 'defaut') {?> checked <?php }?>>
      <label id="labelAFRredirectdefaut" for="AFRredirectdefaut"><?php echo __('Redirect to the file url (default).', 'automatic-file-renamer')?></label>
      </li>
      <li>
        <input id="AFRredirectpageliee" type="radio" name="AFR_Ou_Rediriger" value="2" onclick="submitAFRredirect()"<?php if ($AFR_Ou_Rediriger == 'pageliee') {?> checked <?php }?>>
      <label id="labelAFRredirectpageliee" for="AFRredirectpageliee"><?php echo __('Redirect to the attachment page, if it exists (or else, 404 error).', 'automatic-file-renamer')?></label>
      </li>
      <li>
        <input id="AFRredirecterror" type="radio" name="AFR_Ou_Rediriger" value="3" onclick="submitAFRredirect()"<?php if ($AFR_Ou_Rediriger == 'error') {?> checked <?php }?>>
      <label id="labelAFRredirecterror" for="AFRredirecterror"><?php echo __('Redirect to your 404 page.', 'automatic-file-renamer')?></label>
      </li>
    </ul>
  </form>
  <hr>
  <form id="AFRAttributionRoles" method="POST" action="#">
    <input type="hidden" name="formrolesenvoi" value="yes2">
    <?php
    $user_id = get_current_user_id(); // Récupère l'ID de l'utilisateur courant
    $user = new WP_User( $user_id ); // Récupère l'utilisateur
    $user_roles = $user->get_role_caps(); // Récupère les capcités de l'utilisateur
    // et on vérifie si le rôle nous convient pour afficher cette section :
    if ($user_roles['manage_options']) {?>
      <div class="role_manager">
        <h3><?php echo __('Settings only for Administrators')?></h3>
        <p><?php echo __('Choose wich role(s) can change the above settings :')?></p>
        <ul style="margin-left:20px">
        <?php
        $roles = new WP_Roles;
        $all_roles = $roles->get_names();

        $i = -1;
        foreach ($all_roles as $role) {
          $i++;?>
            <li>
              <input id="<?php $i?>" type="checkbox" name="<?php echo $role ?>" value="<?php echo $role ?>" <?php
               if ($role == "Administrator") {?>
                checked disabled
                <?php
            } elseif (isset($_POST['formrolesenvoi'])) {
                if (in_array($role, $_POST)) {?>
                  checked
             <?php }
              }

             elseif (is_array($AFR_roles_config)){
               if(in_array($role, $AFR_roles_config)) {
              ?>
              checked
              <?php }} ?>>
              <label for="<?php $i?>"><?php echo __( $role ) ?></label>
            </li>
         <?php }
        ?>
        </ul>

        <input class="AFRsubmitroles" type="submit" name="Enregistrer" value="Enregistrer"  onclick="document.getElementById('AFRAttributionRoles').submit()">
        <?php if ($enregistrement_roles == 1){?>
        <span id="retourenreg" style="color:green;transition:2s;"> <?php echo __('Saved !', 'automatic-file-renamer')?></span>
        <?php }?>
      </div>

    <?php }?>
  </form>


<br><hr>
<p><a href="https://unsiteavous.fr/realisations/extensions/automatic-file-renamer/"><?php echo __('Documentation', 'automatic-file-renamer')?></a> | <a href="https://unsiteavous.fr">Un Site à Vous</a> | Version 0.2.7 - 08/03/2023</p>



<script type="text/javascript">

var a = document.getElementById('retourenreg');

if (a) {
  setTimeout(function(){
    a.style.opacity = 0;
  }, 5000);
}

var activation = document.getElementById('activation');
var labelact = document.getElementById('labelactivation');
var p = document.getElementById('AFRprefixe');
var s = document.getElementById('AFRsuffixe');
var e = document.getElementById('AFRactifornot');

function validateAFRActivation(){
  AFRactivation();
  e.submit();
}
function AFRactivation(){
  if (activation.checked) {
    p.disabled = false;
    s.disabled = false;
    labelact.innerHTML = '<?php echo __('Renaming enabled', 'automatic-file-renamer');?>';
  }else{
    p.disabled = true;
    s.disabled = true;
    labelact.innerHTML = '<?php echo __('Enable renaming', 'automatic-file-renamer');?>';
  }
}



var redirection = document.getElementById('active_redirection');
var labelRedirect = document.getElementById('labelRedirect');
var r_defaut = document.getElementById('AFRredirectdefaut');
var r_pageliee = document.getElementById('AFRredirectpageliee');
var r_error = document.getElementById('AFRredirecterror');

function submitActivateAFRredirect(){
  ActivateAFRredirect();
  e.submit();
}

function ActivateAFRredirect(){

  if (redirection.checked) {
    r_defaut.disabled = false;
    r_pageliee.disabled = false;
    r_error.disabled = false;
    labelRedirect.innerHTML = '<?php echo __('Redirects enabled', 'automatic-file-renamer');?>';
  }else{
    r_defaut.disabled = true;
    r_pageliee.disabled = true;
    r_error.disabled = true;
    labelRedirect.innerHTML = '<?php echo __('Enable redirects', 'automatic-file-renamer');?>';
  }
}

function submitAFRredirect(){
  e.submit();
}

function AFROnload(){
  AFRactivation();
  ActivateAFRredirect();
}

window.onload = AFROnload();

</script>
</div>
