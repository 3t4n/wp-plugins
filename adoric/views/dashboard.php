<?php 
$adoric_installed = ADORICWP::instance()->util->get_adoric_installed();
$username = ADORICWP::instance()->util->get_adoric_username();
$templates = ADORICWP::instance()->util->get_adoric_templates();
$signUpFreeLink = ADORICWP::instance()->util->get_signup_free_link();
?>

<div class="wrap--adoric-dashboard">
    <div class="activate-form-wrapper <?php echo($adoric_installed ? '' : 'active') ?>">
        <strong>free forever</strong>
        <h1>Best popup builder for WP</h1>
        <p>The #1 marketing solution for creating engaging popups, optimizing your conversions, capturing more leads, etc. Install Adoric on your WordPress now with a few clicks of the button.</p>

        <form action="<?php echo(admin_url( 'admin-ajax.php' )) ?>" method="post" class="formInstall" autocomplete="off">
            <label for="accountId">
                Account ID
                <i class="hint-icon"><span class="hint">Click <a href="https://help.adoric.com/install-adoric" target="_blank">here</a> to find your Account ID</span></i>
            </label>
            <input type="password" name="accountId" id="accountId" value="" placeholder="Enter your Account ID" autocomplete="new-password" autocorrect="off" />
            <input type="submit" value="Connect Adoric" />
            <div class="error-info"></div>
        </form>
        <div class="createAccountHelp">Don't have an account? <a href="<?php echo($signUpFreeLink) ?>" target="_blank">Sign up free</a></div>
        <button class="videoLink js-videoLink">Watch the video</button>
        
        <div class="landing">
            <section class="landing__customers">
                <span>More than 10,000 happy customers</span>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </section>
            <section class="landing__abc">
                <strong>how it works</strong>
                <h2>Getting started is as easy as ABC</h2>
                <p>Create and publish interactive popups in just 3 steps</p>
                <div class="landing__abc__steps">
                    <figure>
                        <img alt="Get more sales from your online store" width="322px" srcset="https://static.adoric.com/wp-plugin-images/step-1@2x.png 2x, https://static.adoric.com/wp-plugin-images/step-1.png 1x">
                        <figcaption>Create a free Adoric account</figcaption>
                    </figure>
                    <figure>
                        <img alt="Get more sales from your online store" width="386px" srcset="https://static.adoric.com/wp-plugin-images/step-2@2x.png 2x, https://static.adoric.com/wp-plugin-images/step-2.png 1x">
                        <figcaption>Connect Adoric to your WordPress site</figcaption>
                    </figure>
                    <figure>
                        <img alt="Get more sales from your online store" width="322px" srcset="https://static.adoric.com/wp-plugin-images/step-3@2x.png 2x, https://static.adoric.com/wp-plugin-images/step-3.png 1x">
                        <figcaption>Create popups and publish</figcaption>
                    </figure>
                </div>
            </section>
            <section class="landing__design">
                <strong>intuitive editor</strong>
                <h2>Design has never been so easy</h2>
                <p>Our design editor is intuitive, user-friendly, and allows you to optimize your website’s conversion.</p>
                <a href="<?php echo($signUpFreeLink) ?>" target="_blank" class="linkGetStarted">Get started for FREE</a>
                <img srcset="https://static.adoric.com/wp-plugin-images/editor@2x.png 2x, https://static.adoric.com/wp-plugin-images/editor.png 1x" alt="Adoric Editor"/>
                <ul class="landing__design__features">
                    <li class="icon--elements">
                        <b>10,000 free graphic elements</b>
                        Adoric editor offers an endless stock of images, icons and shapes.
                    </li>
                    <li class="icon--form">
                        <b>Form</b>
                        The perfect and ultimate feature for growing your mailing list and achieving your leads goals.
                    </li>
                    <li class="icon--video">
                        <b>Embed Video</b>
                        Make your campaigns real attention magnets by putting videos in them.
                    </li>
                    <li class="icon--giphy">
                        <b>GIPHY library</b>
                        Full access to Giphy's library with all of the GIF's you need.
                    </li>
                    <li class="icon--spin">
                        <b>Spin to win</b>
                        Get more leads and grow your sales with spin to win wheel popups.
                    </li>
                    <li class="icon--countdown">
                        <b>Countdown</b>
                        This FOMO tool is designed to urge your users towards engagement.
                    </li>
                </ul>
            </section>
            <section class="landing__solutions clearfix">
                <strong>solutions</strong>
                <h2>One platform, tons of solutions</h2>
                <p>Whether you are looking to grow your leads, increase visitors' engagement, or make more sales, Adoric has got you covered.</p>
                <a href="<?php echo($signUpFreeLink) ?>" target="_blank" class="linkGetStarted">Get started for FREE</a>
                <div class="landing__solutions__leads">
                    <h3>Grow your leads</h3>
                    <p>Use Adoric’s forms to capture more leads, get more subscribers, and grow your mailing list instantly! Plus, our forms allow you to precisely target the right audience, and, hence, enjoy better conversion.</p>
                    <a href="<?php echo(ADORIC__APP__HOST__) ?>/solutions/email-list" target="_blank" class="linkLearnMore">Learn more</a>
                    <div class="integrations">
                        Integrate with
                        <ul class="integrationsIcons">
                            <li class="icon--mailchimp"></li>
                            <li class="icon--salesforce"></li>
                            <li class="icon--hubspot"></li>
                            <li class="icon--aweber"></li>
                            <li class="icon--getResponse"></li>
                            <li class="icon--webhooks"></li>
                        </ul>
                    </div>
                </div>
                <div class="landing__solutions__engaging">
                    <h3>Increase visitors’ engagement</h3>
                    <p>Intuitive solutions and features to make your campaigns more interactive and engaging.</p>
                    <a href="<?php echo(ADORIC__APP__HOST__) ?>/solutions/increase-sales" target="_blank" class="linkLearnMore">Learn more</a>
                    <span class="tagBadge">Exit-intent</span>
                    <span class="tagBadge">Multi-step</span>
                    <span class="tagBadge">Spin-to-win</span>
                </div>
                <div class="landing__solutions__ecommerce">
                    <h3>E-commerce solutions</h3>
                    <p>Personalize your users’ experience, reduce cart abandonment and win more sales with Adoric.</p>
                    <a href="<?php echo(ADORIC__APP__HOST__) ?>/industries/ecommerce" target="_blank" class="linkLearnMore">Learn more</a>
                    <span class="tagBadge">Product recommendations</span>
                    <span class="tagBadge">Promotions</span>
                    <span class="tagBadge">Reduce cart abandonment</span>
                </div>
            </section>
            <section class="landing__getStarted">
                <h2>Get started with Adoric</h2>
                <p>Take your publishing, ecommerce, agency, or travel business to the next level with Adoric.</p>
                <a href="<?php echo($signUpFreeLink) ?>" target="_blank" class="linkGetStarted">Get started for FREE</a>
            </section>
            <section class="footer">
                <span class="copyright">© 2021. All Rights Reserved. Adoric LTD</span>
                <div class="socials">
                    <a target="_blank" href="https://twitter.com/AdoricBiz" class="twitter"></a>
                    <a target="_blank" href="https://www.facebook.com/getadoric/" class="facebook"></a>
                    <a target="_blank" href="https://www.instagram.com/adoricbiz/" class="instagram"></a>
                    <a target="_blank" href="https://www.pinterest.com/adoricbiz/" class="pinterest"></a>
                    <a target="_blank" href="https://dribbble.com/adoric" class="dribble"></a>
                    <a target="_blank" href="https://www.linkedin.com/company/adoric/" class="linkedin"></a>
                </div>

            </section>
        </div>
    </div>
    <div class="loader-wrapper">
        <div class="loader">Connecting Adoric to your WP site...</div>
    </div>
    <div class="welcome-wrapper <?php echo($adoric_installed ? 'active' : '') ?>">
        <div class="adoric_header">
            <a href="<?php echo(ADORIC__APP__HOST__) ?>" target="_blank">Go to member area</a>
        </div>
        <h1>Hello<?php echo(strlen($username) > 0 ? ", {$username}" : '') ?> 👋 
            <a href="<?php echo(ADORICWP::instance()->util->generate_template_link('ADORIC_BLANK_TEMPLATE')) ?>" target="_blank">Create popup</a>
        </h1>
        <div class="adoric_templates">
            <h4>New templates for you</h4>
            <p>Create new campaign using our our high-converting, professionally-designed templates</p>
            <ul>
                <?php foreach ($templates as $template) { ?>
                    <?php $style = ADORICWP::instance()->util->generate_template_style($template) ?>
                    <li style="<?php echo $style['parentStyles'] ?>" class="<?php echo (sizeof($template['html']) > 1) ? 'multistep' : '' ?>" data-steps="<?php echo sizeof($template['html']) ?> Steps">
                        <a href="<?php echo(ADORICWP::instance()->util->generate_template_link($template)) ?>" target="_blank"></a>
                        <img style="width: <?php echo $style['width'] ?>; height: auto; <?php echo $style['position'] ?>" src="<?php echo($template['path']) ?>" />
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="videoModal">
    <iframe width="1130" height="565" src="https://www.youtube.com/embed/VCwW77hPDk4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <span class="videoModal__close"></span>
</div>