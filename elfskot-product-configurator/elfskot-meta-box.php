<?php
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    $access_token =  $this::get_access_token();
    if($access_token != null && $access_token != '')
    {
        $args = array(
            'headers' => array(
                'Authorization' => 'bearer ' . $access_token
            )
        );

        $featureModelsResponse = wp_remote_get('https://api.elfskot.cloud/api/2/featuremodels?include=rootFeature', $args);
        $conLanguagesResponse = wp_remote_get('https://api.elfskot.cloud/api/2/languages', $args);

        if($featureModelsResponse['response']['code'] == 200 && $conLanguagesResponse['response']['code'] == 200)
        {
            $featureModels = json_decode($featureModelsResponse['body'], true);
            $conLanguages = json_decode($conLanguagesResponse['body'], true);
?>

    <table>
        <tr>
            <td>
            Width:
            </td>
            <td>
            <input id="configurator-width" size="4" type="text" />
            </td>
        </tr>
        <tr>
            <td>
            Height:
            </td>
            <td>
            <input id="configurator-height" size="4" type="text" />
            </td>
        </tr>
        <tr>
            <td>
            Toolbar:
            </td>
            <td>
            <input id="configurator-toolbar" type="checkbox" />
            </td>
        </tr>
        <tr>
            <td>
            Language:
            </td>
            <td>
            <select id="configurator-language">
            <option value="">-- default --</option>
    <?php
            foreach($conLanguages as &$language){
                ?>
                <option value="<?php echo esc_attr($language["iso"]); ?>">
                    <?php echo esc_html($language["englishName"]); ?>
                </option>
    <?php
            }
    ?>
        </select>
            </td>
        </tr>
        <tr>
            <td>
            Product:
            </td>
            <td>
            <select id="configurator-selector">
        <?php
            foreach ($featureModels as &$featureModel) {
                ?>
                    <option value="<?php echo esc_attr(str_replace(' ', '-', $featureModel["rootFeature"]["name"])); ?>">
                        <?php echo esc_html($featureModel["rootFeature"]["name"]); ?>
                    </option>
                <?php
            }
        ?>
        </select>
            </td>
        </tr>
    </table>
    <p>
    <button type="button" class="button" onclick="elfskot_insertConfigurator()">Add Configurator</button>
    </p>


    <?php
        }
        else
        {
    ?>
        <i>Failed to receive configuration data from the Elfskot server. Please try again later.</i>
    <?php
        }
    ?>

<?php
    }
    else
    {
?>
    <p><i>Could not validate the configurator domain: <?php echo esc_html(get_option("configurator_domain")); ?></i></p>
<?php
    }
?>


<script>
    function elfskot_insertConfigurator(){
        var selectedConfigurator = document.getElementById('configurator-selector').value;
        var width = document.getElementById('configurator-width').value;
        var height = document.getElementById('configurator-height').value;
        var toolbar = document.getElementById('configurator-toolbar').checked;
        var language = document.getElementById('configurator-language').value;

        var configuratorContent = '<iframe width="' + width + '" height="' + height + '" src="https://<?php echo esc_html(get_option("configurator_domain")); ?>/' + language + '/configure/' + selectedConfigurator + '?toolbar=' + toolbar + '"></iframe>';
        var content = tinyMCE.activeEditor.getContent({format : 'raw'}) + configuratorContent;
        tinyMCE.activeEditor.setContent(content, {format : 'raw'});
    }
</script>

