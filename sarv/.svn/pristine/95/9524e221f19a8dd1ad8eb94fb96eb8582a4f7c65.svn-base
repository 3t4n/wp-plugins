<?php
function sarv_setting_function()
{

?>
   <div class="form_setting">
      <h2><i class="fa fa-gear"></i> Form Setting</h2>


      <?php

      if(!empty($_REQUEST['listid']) && isset($_REQUEST['listid']) && $_REQUEST['listid']!=""){
        include ('editForm.php');
      }else{
        include ('formLists.php');        
      }

    
}


function sarv_display_setting() { 

$getOptionsData = Sarv_getDataFromDb("options");

$allFormData = json_decode($getOptionsData[0]->value,true);

$userid = $allFormData['userid'];
$token = $allFormData['token'];
 ?>
</div>
        <div class="form_setting">
          <div class="">
              <h2> <i class="fa fa-cogs" aria-hidden="true"></i> Sarv Email Marketing Setting</h2>

              <div class="alert alert-danger" id="errormess" style="display: none;"></div>


              <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="formsetting" method="post"> 

              <table class="form-table">
              <tbody>
              <tr>
                <th scope="row">User ID:</th>
                <td><input type="text" class="form-control" id="userid" name="userid" value="<?php if(isset($userid)): echo $userid; endif; ?>"></td>
              </tr>
              <tr>
                <th scope="row">Token ID:</th>
                <td><input type="text" class="form-control" id="token" name="token" value="<?php if(isset($token)): echo $token; endif; ?>"></td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td><p class="submit"><input name="submit" id="settingform" class="button button-primary" value="Save" type="submit"></p></td>
              </tr>
              </tbody>
              </table>
             </form>
             <div class="alert alert-success" id="successmeg" style="display: none;"></div>
             
          </div>

        <?php 
          $loginChecked = Sarv_getDataFromDb("options");
          if(!empty($loginChecked)): ?>
          <div id="apiconinfo">
          <?php 
          $connectCheck = Sarv_checkApiConnection();

          $connectCheck = (array)json_decode($connectCheck);
          $result = $connectCheck['msg'];

          if($result=="success"):
            echo "<div class='alert alert-primary'><a href='admin.php?page=manage_setting'><i class='fa fa-file-text-o'></i> Click on Form Page.</a></div>";
          elseif($result=="error"):
            echo "<div class='alert alert-danger'>Your information are incorrect.</div>";
          endif;
           ?>
          </div>
        <?php endif; ?>



        <div class="information-sarv">
            <h3><i class="fa fa-pencil-square-o"></i> Create a Sarv Account  </h3>
             <div class="popdown">                
                <div class="message">Enter your Sarv User ID in the form above to install your tracking script.</div> 

                    <ul class="step_row">
                        <li><span>1</span>  Create Sarv Account From Link
                        <a href="https://manage.sarv.com/register?service=MAIL"> <i>https://manage.sarv.com/register?service=MAIL </i></a> There you will get all features </li>
                        <li><span>2</span> You can login your account from below link    <a href="https://manage.sarv.com/login"><i>https://manage.sarv.com/login</i></a></li>
                        <li><span>3</span>You can get USER ID from account Click on top right side there are showing your name  After then click on My Profile tab.             After Then you will get User ID.</li>
                        <li><span>4</span> You can get Token ID from Account.  Hover on Service menu there click on Transactional Email menu from drop-down menu.</li>
                    </ul> 
            
                      <a href="https://manage.sarv.com/login" target="_blank" class="linkbg">Already have an account?</a>
                     <a href="https://manage.sarv.com/register" class="linkbg" target="_blank">Sign Up Here</a>
              </div>
 
           
      </div>
      </div>

<?php } ?>