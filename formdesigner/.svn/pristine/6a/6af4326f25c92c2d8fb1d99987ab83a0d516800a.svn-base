<?php
/**
 * @var string|null $error
 * @var array $forms
 * @var string $menuUrl
 */
?>
<html>
    <head>
        <title><?php echo __('FormDesigner form list', 'formdesigner'); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="<?php echo FORMDESIGNER__PLUGIN_URL; ?>src/style.css" type="text/css" media="all" />
        <script type="text/javascript" src="<?php echo includes_url( 'js/tinymce/tiny_mce_popup.js' ); ?>"></script>
        <script>
        function insert(id) {
            top.window.tinyMCE.execCommand('mceInsertContent',false,'[formdesigner id="'+id+'"]');
            tinyMCEPopup.editor.execCommand('mceRepaint');
            tinyMCEPopup.close();
        }
        </script>
    </head>    
    <body>
        <?php if (!empty($error)) :?>
            <div class="fd-error"><?php echo $error; ?></div>
        <?php elseif (!empty($forms)) :?>
            <label for="forms" class="fd-label">
                <?php echo __('Select the form to be inserted', 'formdesigner'); ?>:
            </label>
            <select id="forms" class="fd-select">
                <?php foreach ($forms as $id => $form) :?>
                    <option value="<?php echo $id; ?>"><?php echo $form['name']; ?> [ID: <?php echo $id; ?>]</option>
                <?php endforeach; ?>
            </select>
            <button class="fd-button" 
                    onclick="var el = document.getElementById('forms');insert(el.options[el.selectedIndex].value)">
                <?php echo __('Insert form', 'formdesigner'); ?>
            </button>
        <?php else :?>
            <p>
                <?php echo __('You do not have any forms created. Go to the', 'formdesigner'); ?>
                <a href="<?php echo $menuUrl; ?>" target="_top">FormDesigner</a>
                <?php echo __('menu and create your first form', 'formdesigner'); ?>.
            </p>
        <?php endif; ?>
    </body>
</html>
