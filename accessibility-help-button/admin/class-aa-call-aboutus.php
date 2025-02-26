<?php

class Aa508_Call_Aboutus{

    public $plugin_name;

    private $setting = array();

    private $active_tab;

    private $this_tab = 'about-us';

    private $tab_name = "About us";

    private $setting_key = 'about-us';


    function __construct($plugin_name){
        $this->plugin_name = $plugin_name;
        
        $this->active_tab = (isset($_GET['tab'])) ? sanitize_text_field($_GET['tab']) : 'default';

        $this->settings = array(
            );
        

        if($this->this_tab == $this->active_tab){
            add_action($this->plugin_name.'_tab_content', array($this,'tab_content'));
        }

        add_action($this->plugin_name.'_tab', array($this,'tab'),1);

       
        $this->register_settings();
    }


    function register_settings(){   

        foreach($this->settings as $setting){
                register_setting( $this->setting_key, $setting['field']);
        }
    
    }

    function tab(){
        ?>
        <a class="nav-tab <?php echo $this->active_tab == $this->this_tab || '' ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page='.$_GET['page'].'&tab='.$this->this_tab ); ?>">
            <?php _e( $this->tab_name, 'accessibility-help-button' ); ?> 
        </a>
        <?php
    }

    function tab_content(){
       ?>
        <div class="px-10">
            <p>
            <h1 class="bold">At St Pete Design we have a passion for Web Accessibility and WordPress!
</h1>
    </p>
    <p>
    In 2017 we attended the National Federation of the Blind National Convention in Orlando, Florida. While we were there we learned not only about Section 508 compliance but we learned about the difficulty that the visually impaired community has with navigating the internet.
    </p>
    <p>
    We bring a unique set of skills and mindset to your companies Section 508 compliance that’s because we where WordPress developers first. Our passion began with creating WordPress websites and plugins. Then that passion grew to include helping 100’s of millions of disabled people with Web Accessibility. We decided that we were going to take our Web Development skills and combine that with the knowledge and insight about web accessibility that we’ve gained.
    </p>
    <p>
    We actively give talks about web accessibility and Section 508 to local WordPress groups like WordCamps, WordPress developer meetups, local Barcamps, YouTube and even Podcasts. 
    </p>
    <p>
    <h1 class="bold">“When you are able to combine your passions with your skill set, amazing things will happen.”</h1>
    </p>
    <p>
    We believe that this is exactly what is happening right now. We are able to use our skill set to help in an area that we are passionate about. There has been a push to increase the usability of the internet for people with disabilities and companies are responding by making their websites ADA Section 508 compliant. If you follow these Section 508 guidelines then your website or software will be so much easier to navigate for a disabled person especially a low-vision user and you will not have to worry about lawsuits.
    </p>

    <div class="flex space-between">
        <div class="flex">
            <div>
            <h1 class="bold">Another Free Web Accessibility Plugin</h1>
                <div class="flex align-items-center">
                <div class="text-center">
                <img class="button1" src="<?php echo plugin_dir_url( __FILE__ ); ?>img/img2.png" />
                </div>
                <div class="px-10">
                    <a class="contact-btn" href="https://wordpress.org/plugins/tool-for-ada-section-508-and-seo/" target="_blank">Find On WP Repository</a>
                </div>
                </div>
            </div>
        </div>
        <div class="flex">
            <div>
            <h1 class="bold">Our Free Custom GPS Plugin</h1>
                <div class="flex align-items-center">
                <div class="text-center">
                <img class="button1" src="<?php echo plugin_dir_url( __FILE__ ); ?>img/img1.jpg" />
                </div>
                <div class="px-10">
                    <a class="contact-btn" href="https://wordpress.org/plugins/gps-plotter/" target="_blank">Find On WP Repository</a>
                </div>
                </div>
            </div>
        </div>
        
    </div>
    <h1 class="bold">Our Team<br><br></h1>
    <div class="flex align-items-top">
        <div class="flex align-items-top" style="flex:1">
            <div  class="px-10">
            <img  class="button1 profile-pic" src="<?php echo plugin_dir_url( __FILE__ ); ?>img/img3.jpg" />
            </div>
            <div class="px-10">
                <h2>Steve Curtis</h2>
                Hi I’m Steve Curtis and I’m the owner of St. Pete Design! I’m a 45 year old entrepreneur happily married…<a style="color: #0000ff;" href="https://www.stpetedesign.com/steve/" data-userway-font-size="16">click to read more</a>
            </div>
        </div>
        <div class="flex align-items-top"  style="flex:1">
            <div  class="px-10">
            <img  class="button1 profile-pic" src="<?php echo plugin_dir_url( __FILE__ ); ?>img/img4.jpg" />
            </div>
            <div class="px-10">
                <h2>Joe LoPreste</h2>
                Hi, I’m Joe LoPreste I’m co-owner of St Pete Design. I bring a passion for WordPress and web accessibility along with 12 years of business and technology experience <a style="color: #0000ff;" href="https://www.stpetedesign.com/joseph-lopreste/" data-userway-font-size="16">click to read more</a>
            </div>
        </div>
    </div>
        </div>
       <?php
    }
}

add_action($this->plugin_name.'_general_option', new  Aa508_Call_Aboutus($this->plugin_name));