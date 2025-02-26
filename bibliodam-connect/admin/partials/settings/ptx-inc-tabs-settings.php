<div id="settings-tab-1" class="tab-content active">
    <h3><?php printf(esc_attr__('General', $this->pluginName)); ?></h3>
    <div class="card">
        <div class="card-header">
            <?php printf(esc_attr__('Application Settings', $this->pluginName)); ?>
        </div>
        <div class="card-body">
            <div class="grid">
                <div class="form-item col-1-2"><?php echo $ptxFields->textField('Username:', 'username', 'settings', '', [
                        'description' => 'Your BiblioDAM username.',
                        'validate'    => true,
                        'placeholder' => 'Username',
                    ]); ?></div>
                <div class="form-item col-1-2"><?php echo $ptxFields->textField('Password:', 'password', 'settings', '', [
                        'description' => 'Your BiblioDAM password.',
                        'placeholder' => 'Password',
                        'validate'    => true,
                    ]); ?></div>
                <div class="form-item col-1-2"><?php echo $ptxFields->textField('Tenant Id:', 'tenant_id', 'settings', '', [
                        'description' => 'Your BiblioDAM tenant id.',
                        'placeholder' => 'Tenant Id',
                        'validate'    => true,
                    ]); ?></div>
                <div class="form-item col-1-2"><?php echo $ptxFields->textField('Application Id:', 'app_id', 'settings', '', [
                        'description' => 'Your BiblioDAM application id.',
                        'placeholder' => '999',
                        'validate'    => true,
                    ]); ?></div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <?php printf(esc_attr__('BiblioDam Settings', $this->pluginName)); ?>
        </div>
        <div class="card-body">
            <div class="grid">
                <div class="form-item col-1-2"><?php echo $ptxFields->textField('Client Url:', 'client_url', 'dam', '', [
                        'description' => 'BiblioDAM Client url.',
                        'placeholder' => 'https://client.baobabsuite.com',
                        'validate'    => true,
                    ]); ?></div>
                <div class="form-item col-1-2"><?php echo $ptxFields->textField('Domain:', 'dam_domain', 'dam', '', [
                        'description' => 'BiblioDAM domain.',
                        'placeholder' => 'https://biblio.afrozaar.com/v/toto/index.html',
                        'validate'    => true,
                    ]); ?></div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <?php printf(esc_attr__('Content Settings', $this->pluginName)); ?>
        </div>
        <div class="card-body">
            <div class="grid">
                <div class="form-item col-1-2"><?php echo $ptxFields->textField('Media Service Url:', 'service_url', 'media', '', [
                        'description' => 'Service url to serve media.',
                        'placeholder' => 'http://media.site.com',
                        'validate'    => true,
                    ]); ?></div>
                <div class="form-item col-1-2"><?php echo $ptxFields->textField('Titles:', 'titles', 'refine', '', [
                        'description' => 'Filter by titles (Comma separate values).',
                        'placeholder' => 'mafro,afroml',
                    ]); ?></div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <?php printf(esc_attr__('Elastic Search', $this->pluginName)); ?>
        </div>
        <div class="card-body">
            <div class="grid">
                <div class="form-item col-1-2"><?php echo $ptxFields->textField('Elastic Search Url:', 'es_url', 'es', '', [
                        'description' => 'Elastic Search Url.',
                        'placeholder' => '',
                        'validate'    => true,
                    ]); ?></div>

                <div class="form-item col-1-2"><?php echo $ptxFields->textField('Elastic Search Api Key:', 'es_api', 'es', '', [
                        'description' => 'Elastic Search Api Key.',
                        'placeholder' => '',
                        'validate'    => true,
                    ]); ?></div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <?php printf(esc_attr__('Visuals', $this->pluginName)); ?>
        </div>
        <div class="card-body">
            <div class="grid">
                <div class="form-item col-1-2"><?php echo $ptxFields->imageUploadField('Logo of the DAM picker:', 'clientLogo', 'design'); ?></div>
                <div class="form-item col-1-2"><?php echo $ptxFields->imageUploadField('Background of the DAM picker:', 'clientBackground', 'design'); ?></div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <?php printf(esc_attr__('Post Media Options', $this->pluginName)); ?>
        </div>
        <div class="card-body">
            <div class="grid">
                <div class="form-item col-1-3"><?php echo $ptxFields->checkboxField('Images', 'image', 'post_media', 1, [
                        'description' => 'Display images in the BiblioDam selector.',
                        'checked'     => true,
                    ]); ?></div>
                <div class="form-item col-1-3"><?php echo $ptxFields->checkboxField('Video', 'video', 'post_media', 1, [
                        'description' => 'Display video in the BiblioDam selector.',
                        'checked'     => true,
                    ]); ?></div>
            </div>
        </div>
    </div>
</div>
<!-- About BiblioDam -->
<div id="settings-tab-2" class="tab-content">
    <h3><?php printf(esc_attr__('About BiblioDAM', $this->pluginName)); ?></h3>
    <div class="card">
        <div class="card-header">
            <?php printf(esc_attr__('Simple, powerful, digital asset management', $this->pluginName)); ?>
        </div>
        <div class="card-body">
            <div class="grid">
                <div class="form-item col-1-1">
                    <h3>Manage images, videos, audio, PDF's and publisher web articles through cloud-based digital asset management</h3>
                    <p>BiblioDAM is a powerful cloud search media library that allows you to centrally store, control
                        and manage your digital assets. BiblioDAM’s simplified interface allows you to control media
                        assets across multiple business units and can be tightly integrated into your CMS platform of
                        choice.</p>
                    <h3>Centralise digital media assets in the cloud</h3>
                    <p>Safeguard your assets and provide accessibility to authorised users from anywhere in the world,
                        on any device.</p>
                    <h3>Single view of digital assets</h3>
                    <p>Consolidate multiple websites or product catalogues across multiple brands, to provide you with a
                        single view of where and how they are being used.</p>
                    <h3>Avoid media archive lock-in</h3>
                    <p>Are you tired of having your video archives locked inside a proprietary video platform (Ooyala,
                        JW Player, Kaltura, Brightcove, YouTube, Vimeo)? BiblioDAM can operate directly with an AWS S3
                        bucket and access your videos for reusability.</p>
                    <h3>Powerful ElasticSearch Engine</h3>
                    <p>No matter how much data, searches are lightning fast and accurate - ensuring you never lose sight
                        of your group's media assets.</p>
                    <a href="https://www.publisherstoolbox.com/bibliodam/" class="btn is-secondary is-center" target="_blank">Visit
                        BiblioDAM Website</a>
                </div>
            </div>
        </div>
    </div>
</div>
