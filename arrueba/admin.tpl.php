<?php //Arrueba options page ?>
<?php
$c1 = get_option('arrueba_replace_in');
$c2 = get_option('arrueba_target');
$cm = ' checked="checked"';
?>
<div class="wrap">
<style>.form-table th{text-align:right;}</style>
    <h2>Opções do Arrueba</h2>
    <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <table class="form-table" style="width:600px;">
            <tr>
                <th scope="row">
                    Substituir @ em:
                </th>
                <td>
                    <p><label><input type="radio" name="arrueba_replace_in" value="0"<?php if($c1 == 0) echo $cm; ?> />Posts e comentários</label></p>
                    <p><label><input type="radio" name="arrueba_replace_in" value="1"<?php if($c1 == 1) echo $cm; ?> />Somente nos posts</label></p>
                    <p><label><input type="radio" name="arrueba_replace_in" value="2"<?php if($c1 == 2) echo $cm; ?> />Somente nos comentários</label></p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    Abrir links:
                </th>
                <td>
                    <p><label><input type="radio" name="arrueba_target" value="0"<?php if($c2 == 0) echo $cm; ?> />Em nova janela (target=_blank)</label></p>
                    <p><label><input type="radio" name="arrueba_target" value="1"<?php if($c2 == 1) echo $cm; ?> />Na mesma janela</label></p>
                </td>
            </tr>
        </table>
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="arrueba_replace_in,arrueba_target" />
        <p class="submit">
            <input type="submit" class="button-primary" value="Salvar" />
        </p>
    </form>
</div>
