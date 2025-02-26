<?php /* Template Name: Bio Template */ ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <?php $pixel_code=get_option('ascb_pixel_code','');
           if($pixel_code!=''){?>
            <!-- Facebook Pixel Code -->
            <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '<?php print esc_js($pixel_code)?>');
            fbq('track', 'PageView');
            </script>
            <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=2605634493034065&ev=PageView&noscript=1"
            /></noscript>
            <!-- End Facebook Pixel Code -->
           <?php }  ?>
    <?php $ga_code=get_option('ascb_ga_code','');
           if($ga_code!=''){?>       
            <!-- Google Analytics Code -->
            <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', '<?php print esc_js($ga_code)?>', 'auto');
            ga('require', 'linkid');
            ga('set', 'forceSSL', true);
            ga('send', 'pageview');
            </script>
            <!-- End Google Analytics Code -->
            <?php } ?>
    <title><?php print get_bloginfo ( 'name' )?> - <?php print get_bloginfo ( 'description' )?></title>
</head>
<body style="background-color:<?php print esc_attr(get_option('ascb_Background_color','#ffffff')); ?>;">
    <main  id="mainBio"  class="mainBio" role="main">
                  <style> #mainBio{font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Open Sans,Helvetica Neue,sans-serif;
                                    margin-left: auto;
                                    margin-right: auto;
                                    max-width: 400px;
                                    padding: 5vh 1.4rem 1.4rem;
                                    text-align: center;
                                    line-height: 1.67;
                                    font-size: 14px;

                              }
                            a{
                              text-decoration:none;
                              color:<?php print esc_attr(get_option('ascb_font_color','#232323')); ?>;    
                            }
                          #bio-page{display: grid;  }   
                          .link-bio{border: 1px solid #bbb;
                                    border-radius: 6px;
                                    padding: .33rem;
                                    margin-bottom: 1rem;
                                    font-weight: 600;
                                    display: block;
                                 
                                  -webkit-transition: background-color .38s ease,color .38s ease;
                                  transition: background-color .38s ease,color .38s ease;
                                  -webkit-font-smoothing: antialiased;
                                  -moz-osx-font-smoothing: grayscale;
                                    transition: all 0.3s ease-in-out;} 
                          .link-bio:hover{
                                    background-color: #bbb;
                                    color: #fff;
                                          }     
                          .thumbnail {
                              margin-bottom: 1rem;
                              text-align: center;
                          }
                          .thumbnail img {
                              max-width: 82px;
                              height: auto;
                              border-radius: 50%;
                              display: block;
                              margin-left: auto;
                              margin-right: auto;
                          }                 </style>
                  <?php
                    // Start the loop.
                    if ( have_posts() ) {
                        while ( have_posts() ) {
                     
                            the_post(); ?>
                     
                            <?php /*<h2><?php print get_option('ascb_name','Links')?></h2>*/?>
                     
                            <?php the_content(); ?>

                        <?php }
                    }
                   
                    ?>
                    <?php  wp_footer();  ?>
    </main>
</body>
</html>