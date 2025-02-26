<?php
get_header();
global $ADL_team;
extract($ADL_team->get_all_info_of_member($post));
if(!empty($color_info)) extract($color_info); // lets extract all colors
?>
    <style>
        #tm-details-wrap .tm-details-text > h4{
            color: <?= (!empty($member_name_clr)) ? esc_attr($member_name_clr) : "#e56328"; ?>;
        }
        #tm-details-wrap .skillst2 .count-bar.color-5{
            background-color : <?= (!empty($skill_bg_clr)) ? esc_attr($skill_bg_clr) : "#f75d41"; ?>;
        }
        #tm-details-wrap .skillst2{
            color : <?= (!empty($skill_txt_clr)) ? esc_attr($skill_txt_clr) : "#fff"; ?>;
        }
    </style>
<section id="tm-details-wrap">
    <div class="atp-container">
        <div class="adl-row">
            <div class="adl-col-sm-5">
                <div class="tm-details-img">
                    <img src="<?= (!empty($member_img_src)) ? $member_img_src : '#'; ?>" alt="<?= !empty($name) ? esc_attr($name) : '' ;  ?>">
                </div>
            </div> <!-- END adl-col-sm-6-->
            <div class="adl-col-sm-7">
                <div class="tm-details-text">
                    <h4><?= esc_html($name); ?></h4>
                    <span><?= !empty($designation) ? esc_html($designation): "&nbsp;"; ?></span>
                    <?= !empty($memberfullbio) ? wpautop($memberfullbio) : ''; ?>
                </div>
                <div class="tm-details-social">
                    <ul>
                        <?php
                        if ( !empty($socials) ) {
                            foreach ( $socials as $index => $socialInfo ) { // eg. here, $socialInfo = ['id'=> 'facebook', 'url'=> 'http://fb.com']
                                ?>
                                <li>
                                    <a href="<?= esc_url( $socialInfo['url'] ); ?>"><i class="fa fa-<?= esc_attr( $socialInfo['id'] ); ?>"></i></a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div> <!-- END adl-col-sm-6-->
        </div> <!-- END adl-row-->



        <div class="adl-row">
            <div class="adl-col-sm-12">
                <div class="tm-devider"></div>
            </div>
            <?php if(!empty($office_telephone) || !empty($home_telephone)  || !empty($member_email) || !empty($skype_id) || !empty($location) || !empty($website)  ) {  ?>

            <div class="adl-col-sm-6 tm-details-contact">
                <h3><?php esc_html_e('Contact', ADL_TEAM_TEXTDOMAIN); ?></h3>
                <div class="tm-contact-block">
                    <ul>
                        <?php if(!empty($office_telephone)) { ?>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="contact-info">
                                    <h4>Office</h4>
                                    <p><?= esc_html($office_telephone);?></p>
                                </div>
                            </li>
                        <?php  }

                        if(!empty($home_telephone)) {
                            ?>

                            <li>
                                <div class="icon">
                                    <i class="fa fa-mobile"></i>
                                </div>
                                <div class="contact-info">
                                    <h4><?php esc_html_e('Home', ADL_TEAM_TEXTDOMAIN); ?></h4>
                                    <p><?= $home_telephone; ?></p>
                                </div>
                            </li>
                        <?php  }

                        if(!empty($member_email)) {
                            ?>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="contact-info">
                                    <h4><?php esc_html_e('Email', ADL_TEAM_TEXTDOMAIN); ?></h4>
                                    <p><?= $member_email; ?></p>
                                </div>
                            </li>
                        <?php  }

                        if(!empty($skype_id)) {
                            ?>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-skype"></i>
                                </div>
                                <div class="contact-info">
                                    <h4><?php esc_html_e('Skype', ADL_TEAM_TEXTDOMAIN); ?></h4>
                                    <p><?= $skype_id; ?></p>
                                </div>
                            </li>
                        <?php  }

                        if(!empty($location)) {
                            ?>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="contact-info">
                                    <h4><?php esc_html_e('Location', ADL_TEAM_TEXTDOMAIN); ?></h4>
                                    <p><?= $location; ?></p>
                                </div>
                            </li>
                        <?php  }

                        if(!empty($website)) {
                            ?>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-globe" aria-hidden="true"></i>
                                </div>
                                <div class="contact-info">
                                    <h4><?php esc_html_e('Web', ADL_TEAM_TEXTDOMAIN); ?></h4>
                                    <p> <a href="<?= esc_url($website); ?>"><?= esc_url($website); ?></a> </p>
                                </div>
                            </li>
                        <?php  } ?>
                    </ul>
                </div> <!-- END tm-contact-block-->
            </div> <!-- END adl-col-sm-6 -->
            <?php } ?>
                <?php if ( !empty($skills) ) { ?>
            <div class="adl-col-sm-6 tm-member-skill">

            <h3><?php esc_html_e('Check Skills', ADL_TEAM_TEXTDOMAIN); ?></h3>
                    <div class="wraper">
                        <div class="skillst2">
                            <?php foreach ( $skills as $index => $skillInfo ) { // eg. here, $skillInfo = ['id'=> 'PHP', 'percentage'=> 80] ?>
                                <div class="skillbar" data-percent="<?= esc_html( $skillInfo['percentage'] ); ?>%">
                                    <div class="count-bar color-5">
                                        <div class="title"><?= esc_html( $skillInfo['id'] ); ?></div>
                                        <div class="count"></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>  <!--end skillst2-->
                    </div>  <!--ends wrapper -->
            </div> <!-- END adl-col-sm-6 -->

                <?php } ?>

        </div>  <!-- END adl-row-->
    </div> <!-- END container-->
</section> <!-- END tm-details-wrap-->
<?php get_footer();
