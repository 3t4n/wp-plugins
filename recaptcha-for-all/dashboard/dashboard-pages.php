<?php
if (!defined('ABSPATH')) {
    die('We\'re sorry, but you can not directly access this file.');
}

if (isset($_GET['page']) && $_GET['page'] == 'recaptcha_for_all_admin_page') {
    if (isset($_POST['process']) && sanitize_text_field($_POST['process']) == 'recaptcha_for_all_admin_page_pages') {
        $recaptcha_for_all_updated = false;

        /*
        // Atualiza os valores dos radio buttons
        if (isset($_POST['settings'])) {
            $recaptcha_for_all_pages = sanitize_text_field($_POST['settings']);
            
            // Salvando as opções de reCAPTCHA para login e formulário de comentário
            $recaptcha_for_all_login = sanitize_text_field($_POST['recaptcha_for_all_login']);
            $recaptcha_for_all_comment = sanitize_text_field($_POST['recaptcha_for_all_comment']);

            // Salvando a configuração das páginas selecionadas
            if (isset($_POST['myplugin_selected_pages'])) {
                $recaptcha_for_all_slugs = array_map('sanitize_text_field', $_POST['myplugin_selected_pages']);
            } else {
                $recaptcha_for_all_slugs = []; // Se nada for selecionado, salva como array vazio
            }
            update_option('recaptcha_for_all_slugs', $recaptcha_for_all_slugs);

            // Salvando as opções de reCAPTCHA
            update_option('recaptcha_for_all_pages', $recaptcha_for_all_pages);
            update_option('recaptcha_for_all_login', $recaptcha_for_all_login);
            update_option('recaptcha_for_all_comment', $recaptcha_for_all_comment);
            
            $recaptcha_for_all_updated = true;

            if ($recaptcha_for_all_updated) {
                recaptcha_for_all_updated_message();
            }
        }
            */



















        // Update radio button values
        if (isset($_POST['settings'])) {
            $recaptcha_for_all_pages = sanitize_text_field($_POST['settings']);
            
            // Save reCAPTCHA options for login and comment form
            if (isset($_POST['recaptcha_for_all_login'])) {
                $recaptcha_for_all_login = sanitize_text_field($_POST['recaptcha_for_all_login']);
                update_option('recaptcha_for_all_login', $recaptcha_for_all_login);
            }

            if (isset($_POST['recaptcha_for_all_comment'])) {
                $recaptcha_for_all_comment = sanitize_text_field($_POST['recaptcha_for_all_comment']);
                update_option('recaptcha_for_all_comment', $recaptcha_for_all_comment);
            }

            // Save the selected pages configuration
            if (isset($_POST['myplugin_selected_pages'])) {
                $recaptcha_for_all_slugs = array_map('sanitize_text_field', $_POST['myplugin_selected_pages']);
                update_option('recaptcha_for_all_slugs', $recaptcha_for_all_slugs);
            } else {
                $recaptcha_for_all_slugs = []; // If nothing is selected, save as an empty array
                update_option('recaptcha_for_all_slugs', $recaptcha_for_all_slugs);
            }

            // Always save reCAPTCHA options for pages (as it's retrieved earlier)
            update_option('recaptcha_for_all_pages', $recaptcha_for_all_pages);

            $recaptcha_for_all_updated = true;

            if ($recaptcha_for_all_updated) {
                recaptcha_for_all_updated_message();
            }
        }











        
    }
}

// Recupera as opções salvas
$recaptcha_for_all_pages = trim(sanitize_text_field(get_option('recaptcha_for_all_pages', '')));
//$selected_pages = get_option('recaptcha_for_all_slugs', []);
$selected_pages = get_option('recaptcha_for_all_slugs', '');

// Verifica se $selected_pages é uma string
if (is_string($selected_pages)) {
    // Converte a string em um array, dividindo pelo delimitador de linha
    $selected_pages = explode(PHP_EOL, $selected_pages);
}

//

$recaptcha_for_all_login = trim(sanitize_text_field(get_option('recaptcha_for_all_login', '')));
$recaptcha_for_all_comment = trim(sanitize_text_field(get_option('recaptcha_for_all_comment', '')));

echo '<div class="wrap-recaptcha ">' . "\n";
echo '<h2 class="title">' . esc_attr__("Manage Pages, Login, Register, Forgot Password and Comment forms", "recaptcha-for-all") . '</h2>' . "\n";
echo '<p class="description">' . esc_attr__("Choose the pages and/or posts to enable reCAPTCHA/Turnstile.", "recaptcha-for-all");
?>
<br> </p>

<?php
// Configura os radio buttons para páginas
$radio_active1 = $radio_active2 = $radio_active3 = $radio_active4 = false;
if ($recaptcha_for_all_pages == 'yes_all')
    $radio_active1 = true;
elseif ($recaptcha_for_all_pages == 'yes_pages')
    $radio_active2 = true;
elseif ($recaptcha_for_all_pages == 'yes_posts')
    $radio_active3 = true;
else
    $radio_active4 = true;

// Configura os radio buttons para login e comentários
$radio_login_yes = ($recaptcha_for_all_login == 'yes_all_login') ? true : false;
$radio_comment_yes = ($recaptcha_for_all_comment == 'yes_all_comment') ? true : false;
?>
<form class="recaptcha_for_all-form" method="post" action="admin.php?page=recaptcha_for_all_admin_page&tab=pages">
    <input type="hidden" name="process" value="recaptcha_for_all_admin_page_pages" />

    <?php esc_attr_e("Enable reCAPTCHA/Turnstile on all Pages and Posts?", "recaptcha-for-all"); ?> <br>
    <label for="radio_yes"><?php esc_attr_e("Yes, all pages and posts", "recaptcha-for-all"); ?></label>
    <input type="radio" id="radio_yes_all" name="settings" value="yes_all" <?php if ($radio_active1) echo 'checked'; ?>>
    <br>
    <label for="radio_yes"><?php esc_attr_e("Yes, all pages only", "recaptcha-for-all"); ?></label>
    <input type="radio" id="radio_yes_pages" name="settings" value="yes_pages" <?php if ($radio_active2) echo 'checked'; ?>>
    <br>

    <label for="radio_yes"><?php esc_attr_e("Yes, all posts only", "recaptcha-for-all"); ?></label>
    <input type="radio" id="radio_yes_posts" name="settings" value="yes_posts" <?php if ($radio_active3) echo 'checked'; ?>>
    <br>

    <label for="radio_no"><?php esc_attr_e("No, I will choose below where enable *", "recaptcha-for-all"); ?></label>
    <input type="radio" id="radio_no" name="settings" value="no" <?php if ($radio_active4) echo 'checked'; ?>>
    <br>
    <br><br>

    <label for="myplugin_selected_pages">
        (*)<?php esc_attr_e("Select the pages where you want to enable reCAPTCHA/Turnstile.", "recaptcha-for-all"); ?>
        <?php '<strong>' . esc_attr_e("If you selected one of the other 3 first options, you do not need to use this field.", "recaptcha-for-all"); ?></strong>
        <br>
        <?php esc_attr_e("Hold down Ctrl (or Command) to select multiple pages.", "recaptcha-for-all"); ?>
    </label>

    <br />
    <br />


    <!-- Campo oculto para garantir que o valor seja salvo mesmo se nada for selecionado -->
    <input type="hidden" name="myplugin_selected_pages[]" value="" />
    <select name="myplugin_selected_pages[]" multiple="multiple" style="width:600px;height:200px;">
        <?php
        $pages = get_pages();
        foreach ($pages as $page) {
            $selected = in_array($page->post_name, $selected_pages) ? 'selected' : '';
            echo "<option value='{$page->post_name}' $selected>{$page->post_title}</option>";
        }
        ?>
    </select>
    <br>
    <br>

    <?php esc_attr_e("Enable reCAPTCHA/Turnstile on Login / Forgot Password / Register Forms?", "recaptcha-for-all"); ?> <br>
    <?php 
    echo '<span style="color: red;">' . esc_attr__("Enable this only after you have whitelisted your IP and tested if your keys work.", "recaptcha-for-all") . '</span>'; 
    ?>
    <br>
    
    <label for="radio_yes"><?php esc_attr_e("Yes, enable", "recaptcha-for-all"); ?></label>
    <input type="radio" id="radio_yes_all_login" name="recaptcha_for_all_login" value="yes_all_login" <?php if ($radio_login_yes) echo 'checked'; ?>>
    
    <label for="radio_no_login"><?php esc_attr_e("No, do not enable", "recaptcha-for-all"); ?></label>
    <input type="radio" id="radio_no_login" name="recaptcha_for_all_login" value="no_all_login" <?php if (!$radio_login_yes && $recaptcha_for_all_login == 'no_all_login') echo 'checked'; ?>>
    <br>
    <br>
  
    <?php esc_attr_e("Enable reCAPTCHA/Turnstile on Comment Form?", "recaptcha-for-all"); ?> <br>
    <label for="radio_yes"><?php esc_attr_e("Yes, enable", "recaptcha-for-all"); ?></label>
    <input type="radio" id="radio_yes_all_comment" name="recaptcha_for_all_comment" value="yes_all_comment" <?php if ($radio_comment_yes) echo 'checked'; ?>>
    
    <label for="radio_no_comment"><?php esc_attr_e("No, do not enable", "recaptcha-for-all"); ?></label>
    <input type="radio" id="radio_no_comment" name="recaptcha_for_all_comment" value="no_all_comment" <?php if (!$radio_comment_yes && $recaptcha_for_all_comment == 'no_all_comment') echo 'checked'; ?>>
    <br>
    <br>

    <?php
    echo '<input class="recaptcha_for_all-submit button-primary" type="submit" value="' . esc_attr__("Update", "recaptcha-for-all") . '" />';
    ?>
</form>

</div>

<?php
function recaptcha_for_all_updated_message()
{
    echo '<div class="notice notice-success is-dismissible">';
    echo '<br /><b>';
    esc_attr_e('Database Updated!', 'recaptcha-for-all');
    echo '<br /><br /></div>';
}
?>
