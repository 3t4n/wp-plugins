<?php
global $records_by_day;
?>

<h1>Step 1 - <a href="<?php echo admin_url('post-new.php?post_type='.$this->GetClass('posttype_list')->m_type_slug ); ?>">Add an Email List</a></h1>
<h1>Step 2 - <a href="<?php echo admin_url('post-new.php?post_type='.$this->GetClass('posttype_form')->m_type_slug ); ?>">Create an Optin Form</a></h1>
<h1>Step 3 - <a href="<?php echo admin_url('post-new.php?post_type='.$this->GetClass('posttype_form-preset')->m_type_slug ); ?>">Add them to a preset</a></h1>
<h1>Step 4 - Use all the other optional stuff : )</h1>
