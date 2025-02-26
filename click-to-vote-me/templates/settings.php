<h2>click-to-vote.me settings</h2>

<?php if ($updated) {?>
<div class="updated">
    <p>
        <strong>Settings Updated!</strong>
    </p>
</div>
<?php }?>

<form method="post" action="<?php echo $action ?>">
    <table>
        <tr>
            <td>Default width (px)</td>
            <td>
                <input
                    name="clicktovote_width"
                    placeholder="560"
                    value="<?php echo $width ?>"
                    style="max-width: 60px"
                >
            </td>
        </tr>
        <tr>
            <td>Default height (px)</td>
            <td>
                <input
                    name="clicktovote_height"
                    placeholder="350"
                    value="<?php echo $height ?>"
                    style="max-width: 60px"
                >
            </td>
        </tr>
    </table>

    <p class="submit">
        <input type="submit" name="settings_update" class="button button-primary" value="Save Changes">
    </p>
</form>