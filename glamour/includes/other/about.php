<div class="wrap">
    <div class="glamour-hero wp-clearfix">
        <img src="<?php echo esc_url( GLMR_URL ); ?>assets/images/panel.png" alt="Glamour panel" id="glamour-panel-img">
        <h1>Welcome to Glamour <span>v<?php echo esc_html(GLMR_VERSION); ?></span> - Visual Styling Plugin</h1>
        <p>Design you page, post and custom post type with #1 visual CSS editor. No need to write CSS code manually.</p>
        <div class="glamour-buttons">
            <a href="<?php echo esc_url(
                    add_query_arg(
                        array(
                            'glamour' => 'edit',
                            'glmrmode' => 'single',
                        ),
                        home_url( '/' )
                    )
                ) ?>" target="_blank"><span class="dashicons dashicons-admin-customizer"></span> Style Home Page</a>
            <a href="<?php echo esc_url(
                    add_query_arg(
                        array(
                            'glamour' => 'edit',
                            'glmrmode' => 'global',
                        ),
                        home_url( '/' )
                    )
                ) ?>"  target="_blank"><span class="dashicons dashicons-admin-customizer"></span> Style Globally</a>
            <a href="https://www.cantothemes.com/item/glamour-pro-visual-styling-wordpress-plugin/"  target="_blank"><span class="dashicons dashicons-awards"></span> Get Pro</a>
        </div>
    </div>
    <div class="glamour-features">
        <div class="glamour-feature">
            <h2>Why Glamour?</h2>
            <p>Glamour is a visula styling plugin. You will be able to design any page or post without writing css code. Also you will be able to see changes in real time.</p>
        </div>
        <div class="glamour-feature">
            <h2>Design every page</h2>
            <p>Now you will be able style your single post and page separately to make better feel and design. Or style globally to apply design to all pages.</p>
        </div>
        <div class="glamour-feature">
            <h2>Manage responsive</h2>
            <p>With Glamour, manage responsive css and design for every page or full site.</p>
        </div>
        <div class="glamour-feature">
            <h2>Get pro and get more</h2>
            <p>Buy pro version of Glamour to get more css option like fonts, image background, gradient background, google fonts, transform, transition and more.</p>
            <a href="https://www.cantothemes.com/item/glamour-pro-visual-styling-wordpress-plugin/"  target="_blank" class="glamour-pro-btn"><span class="dashicons dashicons-awards"></span> Get Pro</a>
        </div>
    </div>
</div>
<style>
.wrap{
    font-family: 'Roboto', sans-serif;
    padding: 30px 20px 10px;
}

.glamour-hero{
    max-width: 1185px;
}
#glamour-panel-img{
    width: 300px;
    border-radius: 5px;
    box-shadow: 0 0 20px rgba(0,0,0,0.2);
    float: left;
    margin-right: 50px;
}

.wrap h1{
    font-family: 'Roboto Condensed', sans-serif;
    font-size: 45px;
    line-height: 65px;
    font-weight: 300;
    padding-top: 80px;
    color: #484E56;
}

.wrap h1 span{
    font-size: 14px;
    font-weight: 400;
    position: relative;
    top: -36px;
    margin: 0 -32px;
    display: inline-block;
    padding: 5px 10px 3px;
    background-color: #00a2ba;
    color: #fff;
    line-height: 14px;
    border-radius: 30px;
    background-image: linear-gradient(to right, #00a2ba 0%, #00e18a 100%);
}
.wrap h1 + p{
    font-size: 24px;
    line-height: 34px;
    color: #B2B6BC;
}
.glamour-buttons{
    margin-top: 60px;
}
.wrap .glamour-pro-btn,
.glamour-buttons a{
    display: inline-block;
    color: #fff;
    background-color: #00a2ba;
    background-image: linear-gradient(to right, #00a2ba 0%, #00e18a 100%);
    border-radius: 5px;
    padding: 18px 25px;
    font-size: 20px;
    text-decoration: none;
    line-height: 20px;
    margin-right: 15px;
}

.wrap .glamour-pro-btn,
.glamour-buttons a + a + a{
    background-image: linear-gradient(to right, #FF9100 0%, #FFCC00 100%);
}
.wrap .glamour-pro-btn{
    margin-top: 20px;
}
.glamour-features{
    clear: both;
    background-color: #fff;
    display: flex;
    padding: 25px 30px;
    box-sizing: border-box;
    border-radius: 5px;
    margin-top: 70px;
}
.glamour-features .glamour-feature{
    padding: 30px;
    flex: 0 0 25%;
    box-sizing: border-box;
}

.glamour-features .glamour-feature h2{
    color: #484E56;
    font-size: 28px;
    line-height: 38px;
    font-weight: 300;
    margin-top: 0;
    margin-bottom: 15px;
    box-sizing: border-box;
}
.glamour-features .glamour-feature p{
    color: #7A7D82;
    font-size: 16px;
    line-height: 26px;
    margin-bottom: 0;
    box-sizing: border-box;
}
</style>