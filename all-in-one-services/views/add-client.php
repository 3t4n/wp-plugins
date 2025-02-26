<?php
if ( ! defined( 'ABSPATH' ) ) exit;
 ?>
<div class="container">
  <div class="">
    <div class="alert alert-info">
      <h4>Add Client</h4>
    </div>
    <div class="table table-striped table-bordered">
  <div class="panel-heading">Add client</div>
  <div class="panel-body">


    <form class="form-horizontal" action="javascript:void(0)" id="addclients">
  
  <div class="form-group">    
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" required placeholder="Enter name">
    </div>
  </div>

   <div class="form-group">    
    <label class="control-label col-sm-2" for="socila_link">Social Link:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="socila_link" name="socila_link" required placeholder="Enter Social Link">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="about_client">About Client:</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="about_client" required name="about_client" rows="5"></textarea>
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>


  </div>
</div>
  </div>
</div>
