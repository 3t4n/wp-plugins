<div class="wrap">
<style>
.steps{
  display:grid;
  grid-template-columns:repeat(3,1fr);
  padding:20px;
}
.step{
  display:grid;
  grid-template-rows:auto auto;
  margin-right:25px;
  border-radius:5px;
  box-shadow: 1px 1px 15px rgba(0,0,0,0.1)
}
.step-content {
  border-bottom-left-radius:5px;
  border-bottom-right-radius:5px;
  display: flex;
  flex-direction:column;
  padding:10px;
  background:#fff;
  flex:1;
}
.step-img{
  width:100%;
  position: relative;
  
}
.step-img:before {
    display: block;
    content: "";
    width: 100%;
    padding-top: 56.25%;
}
.step-img-inner{
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
.step-img-inner img{
  border-top-left-radius:5px;
  border-top-right-radius:5px;
  width:100%;
  height:100%;
  object-fit:cover;
}
.step a{
  margin-top:7px;
  text-decoration:none;
  color:#ee6c4d;
}
.no{
  display: flex;
  justify-content:center;
  align-items:center;
  color:#fff;
  background-color:#3d5a80;
  border-radius:50%;
  padding:5px;
  width:20px;
  height:20px;
  margin-bottom:10px;
}
.short{
  display:inline-block;
  padding:3px 5px;
  color:#fff;
  background-color:#3d5a80;
  border-radius:2px;
}
</style>
  <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
  <div>
  <h2>New to EmbedTables?</h2>
  <p>Nice to see you! You need to sign up on EmbedTables.com to use this plugin. Thank's to the web interface you will be able to customize the way you want to display data on a site.</p>
  <div class="steps">
    <div class="step">
      <div class="step-img">
      <div class="step-img-inner">
      <img src="<?php echo   (plugin_dir_url(__FILE__) . '/images/new/step-1.png'); ?>" alt=""/>
      </div>
      </div>
      <div class="step-content">
      <span class="no">01</span>
      <strong>Sign up on embedtables.com</strong>
      <a target="_blank" rel="noopener noreferrer" href="https://embedtables.com/beta">Go there!</a>
      </div>
    </div>
    <div class="step">
      <div class="step-img">
      <div class="step-img-inner">
      <img src="<?php echo   (plugin_dir_url(__FILE__) . '/images/new/step-2.png'); ?>" alt=""/>
      </div>
      </div>
      <div class="step-content">
      <span class="no">02</span>
      <strong>Create a project</strong>
      </div>
    </div>
    <div class="step">
      <div class="step-img">
      <div class="step-img-inner">
      <img src="<?php echo   (plugin_dir_url(__FILE__) . '/images/new/step-3.png'); ?>" alt=""/>
      </div>
      </div>
      <div class="step-content">
      <span class="no">03</span>
      <strong>Use generated shortcode anywhere you want!</strong>
      </div>
    </div>
  </div>
  </div>
  <div>
  <h2>Already have an account?</h2>
  <p>Thanks to this plugin integration EmbedTables with WordPress is smooth and easy. You just need to put shortcode <span class="short">[embedtable id="ET_PROJECT_ID"]</span> wherever you want.</p>
  <div class="steps">
    <div class="step">
      <div class="step-img">
      <div class="step-img-inner">
      <img src="<?php echo   (plugin_dir_url(__FILE__) . '/images/already-have/step-1.png'); ?>" alt=""/>
      </div>
      </div>
      <div class="step-content">
      <span class="no">01</span>
      <strong>Edit or create WordPress site or post</strong>
      </div>
    </div>
    <div class="step">
      <div class="step-img">
      <div class="step-img-inner">
      <img src="<?php echo   (plugin_dir_url(__FILE__) . '/images/already-have/step-2.png'); ?>" alt=""/>
      </div>
      </div>
      <div class="step-content">
      <span class="no">02</span>
      <strong>Put a shortcode in a desirable place</strong>
      </div>
    </div>
    <div class="step">
      <div class="step-img">
      <div class="step-img-inner">
      <img src="<?php echo   (plugin_dir_url(__FILE__) . '/images/already-have/step-3.png'); ?>" alt=""/>
      </div>
      </div>
      <div class="step-content">
      <span class="no">03</span>
      <strong>Save changes and you should see the results!</strong>
      </div>
    </div>
  </div>
  <h2>Support</h2>
  <p>You can always send me an email at <a href="mailto:dominik@embedtables.com">dominik@embedtables.com</a> if you need my support in a configuration process. You can also request new features using <a target="_blank" rel="noopener noreferrer" href="https://share.hsforms.com/1LEKvsyfQR0qKXZYZv4kBWQbmqmj">this form</a>.</p>
  </div>
</div>