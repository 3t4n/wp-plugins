<?php
/**
 * Apoc Plugin Admin Welcome page.
 *
 * @package   APOC
 * @copyright Copyright(c) 2022, FAMPPY INC
 * @license   http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 (GPL-2.0)
 */

$get_apoc_url = 'https://www.apoc.day/#/?post_type=' . APOC_POST_TYPE;
$get_apoc_service_terms_url = 'https://www.apoc.day/#/service/terms';
$get_apoc_tutorial_url = 'https://youtu.be/CCoUns7i8ZQ';

?>

<section class="apoc-viewer-blocks">
    <section class="container">
        <div class="apoc-hero">
            <h2 style="
                font-size: 1.75rem;
                margin-bottom: 0;
                margin-top: 3.5rem;
                color: white;
            ">Interactive content</h2>
            <h2 style="
                font-size: 1.75rem;
                margin: 0;
                color: white;
            ">made easy with APOC
            </h2>
            <h2 style="
                margin-top: 0;
                font-size: 1.75rem;
                color: white;
            ">and nail it on your web</h2>
            <!--            <h1>Welcome APOC!</h1>-->
            <!--            <h3>You can create anything with APOC!</h3>-->
            <div class="apoc-hero__actions">
                <a class="btn" target="_blank" href="<?php echo esc_url($get_apoc_url); ?>">Create APOC Contents!</a>
                <a class="btn" href="<?php echo esc_url(admin_url('post-new.php')); ?>">Add New Post!</a>
            </div>
        </div>
        <div class="apoc-content-body">
            <div>
                <h2>Introduce</h2>
                <p>APOC (A Piece of Content) enables people to create interactive XR content on their own without a
                    single line of coding on a web-based platform and you can share and monetize their content within
                    the platform. </p>
                <h2>Feature</h2>
                <p>- Web-based platform</p>
                <p>- 2D, 3D, XR available</p>
                <p>- Easy to made an interactive content with zero-coding</p>
                <p>- Real-time collaboration</p>

                <h3>Build your content on web without app installed</h3>
                <p>Easy to make a XR content, A Piece Of Content</p>

                <h2>Support</h2>
                <p><a target="_blank" href="<?php echo esc_url($get_apoc_tutorial_url); ?>">APOC Tutorial Video Link</a>
                </p>
                <p><a target="_blank" href="<?php echo esc_url($get_apoc_service_terms_url); ?>">APOC Service Terms</a>
                </p>
                <p>Email : hi@famppy.com</p>
            </div>
        </div>
    </section>
</section>
