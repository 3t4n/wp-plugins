<style type="text/css">
    #nf_info {
        padding: 10px;
        background-color: #fff;
        border: 2px dashed #69A74E;
        margin-right: 10px;
        float:right;
        width: 250px;
    }

    #nf-settings tr td {
        vertical-align: top;
        padding: 10px;
    }

    .nf-textarea {
        width: 500px;
        height: 200px;
        border: 1px solid #ccc;
    }

    p.message {
         background: #FFFBD8;
         border: 1px solid #F5EEAD;
         color: #333;
         margin: 10px 5px 5px 5px;
         padding: 10px;
    }

    #preview {
        border: 1px solid #ccc;
    }

    h3
    {
        border-bottom: 1px solid #ccc;
    }
</style>
<div class="wrap">
<h2>Compassion.org 404 Page Settings</h2>

<h3>Preview</h3>

<p> 
    <strong>This plugin is active</strong>. You can make sure it's working by
    visiting a page that probably doesn't exist. Like this one: <a target="_blank" href="<?php echo site_url() ?>/this-page-is-probably-a-404"><?php echo site_url() ?>/this-page-is-probably-a-404</a>
</p>


<h3>Customization</h3>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <table id="nf-settings">
       <tr>
            <th scope="row">
                Omit 404 Status
            </th>
            <td>
                <input type="checkbox" name="cp_omit_error" value="1" <?php if($data['cp_omit_error']): ?>checked="yes"<?php endif; ?> />
            </td>
            <td>
                Enable this if you've activated this plugin, but a sponsored child page doesn't
                seem to be appearing. It may be that your webhost catches 404s and provides its own
                error page.
            </td>
        </tr>
    </table>
    <p><input name="nf_submit" type="submit" class="button button-primary" value="Save Settings" /></p>
</form>
</div>