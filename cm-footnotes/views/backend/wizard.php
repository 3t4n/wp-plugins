<div class="cm-wizard-step step-0">
    <h1>Welcome to the Footnotes Setup Wizard</h1>
    <p>Thank you for installing the CM Footnotes plugin!</p>
    <p>This plugin enhances your website by allowing you to seamlessly insert footnotes within your content, providing<br/>
    visitors with easy access to additional information and references without interrupting the reading experience.</p>
    <img class="img" src="<?php echo CMF_PLUGIN_URL . 'assets/images/wizard_logo.png';?>">
    <p>To help you get started, we’ve prepared a quick setup wizard to guide you through these steps:</p>
    <ul>
        <li>• Configuring essential settings</li>
        <li>• Customizing the appearance of footnotes</li>
        <li>• Adding your first footnote</li>
    </ul>
    <button class="next-step" data-step="0">Start</button>
    <p><a href="<?php echo admin_url( 'admin.php?page='. CMF_MENU_OPTION ); ?>" >Skip the setup wizard</a></p>
</div>
<?php echo CMF_SetupWizard::renderSteps(); ?>