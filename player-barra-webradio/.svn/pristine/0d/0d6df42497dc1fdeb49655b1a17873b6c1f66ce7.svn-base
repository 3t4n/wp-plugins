<?php
$pbw_playerbarrapcoes = get_option('playerbarra_op');
?>

<div class='wrap'>
    <h1> Configurações Player Barra WebRadio </h1>
    <hr>

    <form action="options.php" method="post">
    <?php settings_fields('playerbarra_opcoes'); ?>
        <table class="form-table">
            <tbody>
            <tr>
                <th scope='row'>
                    <label><b> URL do Player </b></label>
                </th>
                <td>
                    <input required  type="url" name="playerbarra_op[urlplayer]" id="playerbarra_op[urlplayer]" class="regular-text code" value="<?php echo $pbw_playerbarrapcoes[urlplayer] ?>">
                    <p class="description" id="tagline-description">Insira URL com http:// </p>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="default_post_format">Posição do Player no site</label></th>
                <td>                  
                    <select required  name="playerbarra_op[posicao]">
                        <option value="top" <?php if (  get_option('playerbarra_op')['posicao'] == top ) echo 'selected="selected"'; ?>>topo</option>
                        <option value="bottom" <?php if (  get_option('playerbarra_op')['posicao'] == bottom ) echo 'selected="selected"'; ?>>rodapé</option>
                    </select>
                </td>
            <tr>
                <th scope="row">
                    <label>Altura (Height)</label>
                </th>
                <td>
                    <input required type="number"  name="playerbarra_op[altura]" id="playerbarra_op[altura]" class="small-text"  value="<?php if (!($pbw_playerbarrapcoes[altura])){echo '60';}else{echo $pbw_playerbarrapcoes[altura];}?>" >
                    <label>px</label>
                </td>
            </tr>       
            </tbody>
        </table>
            
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Salvar">
    
    </form>
</div>