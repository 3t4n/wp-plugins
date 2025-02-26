<table class="form-table" role="presentation">
    <tbody>

        <tr>
            <th>Plugin version</th>
            <td class="upload-theme">
                <?php echo $info["plugin"]["Version"]?>
            </td>
        </tr>
        <?php if (is_plugin_active("awesome-plugins-team-showcase-premium/awesome-plugins-team-showcase-premium.php")): ?>
        <tr>
            <th>Premium Plugin version</th>
            <td class="upload-theme">
                <?php echo $info["premium_plugin"]["Version"]?>
            </td>
        </tr>
        <?php endif; ?>
        <tr>
            <th>WordPress version</th>
            <td class="upload-theme">
                <?php 
                echo $wp_version;
                ?>
            </td>
        </tr>
        <tr>
            <th>PHP Version</th>
            <td class="upload-theme">
                <?php 
                echo phpversion();
                ?>
            </td>
        </tr>
    </tbody>
</table>