</div><!-- #main -->
 
    <div id="footer">
    <?php  wp_footer() ; ?>
        <div id="colophon">
 
            <div id="site-info">
            &copy; 2011 <?php bloginfo( 'name' ) ?>
            </div><!-- #site-info -->
 
        </div><!-- #colophon -->
    </div><!-- #footer -->
</div><!-- #wrapper -->
  
  <div id="fb-root"></div>
 <script type="text/javascript"> 
   window.fbAsyncInit = function() {
    FB.init({
     appId: 'your_app_id',
     status: true,
     cookie: true,
     xfbml: true
    });
     
     FB.Canvas.setSize();
  
   };
   (function() {
    var e = document.createElement('script');
    e.async = true;
    e.src = document.location.protocol +
     '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);  
   }());
   
  </script>
</body>
</html>

