<?php
/*******************************************************************************
    Wordpress IDX and Contact Manager Plugin
    Copyright (C) 2010-2011 StormRETS, Inc.

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*******************************************************************************/
?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" />
    
    <?php if ($as_saved): ?>
        <div class="agentstorm-success">
            <?php echo (AgentStormSettingCache::get('as_contactwidget_success')) ? AgentStormSettingCache::get('as_contactwidget_success') : 'We have received your request and will be in touch shortly.'; ?>
        </div>
    <?php else: ?>
        <p>
            <?php echo (AgentStormSettingCache::get('as_contactwidget_desc')) ? AgentStormSettingCache::get('as_contactwidget_desc') : 'Contact Us Now! to discuss you property requirements.'; ?>
        </p>
    <?php endif; ?>
    
    <div class="agentstorm-contact">
        
        <div class="agentstorm-contact-item">
            <label>Name:</label>
            <div class="agentstorm-contact-input"><input type="text" name="as_contact_name" value="" /></div>
        </div>
        
        <div class="agentstorm-contact-item">
            <label>Email:</label>
            <div class="agentstorm-contact-input"><input type="text" name="as_contact_email" value="" /></div>
        </div>
        
        <div class="agentstorm-contact-item">
            <label>Phone Number:</label>
            <div class="agentstorm-contact-input"><input type="text" name="as_contact_phone" value="" /></div>
        </div>
        
        <div class="agentstorm-contact-item">
            <label>Message:</label>
            <div class="agentstorm-contact-input"><textarea name="as_contact_message"></textarea></div>
        </div>
        
		<!--
        <?php if ($this->canCreateCaptcha()): ?>
        <div class="agentstorm-contact-item">
            <label>Human Verification:</label>
            <div class="agentstorm-contact-input">
            	<?php 
            		$captcha = new AgentStormCaptcha($session_code,  '__TEMP__/');
            		echo '<img src="' . $captcha->get_pic(4) . '" />';
            	?>
            </div>
        </div>
        <?php endif; ?>
        -->
		
        <div class="agentstorm-contact-submit">
            <button><?php echo (AgentStormSettingCache::get('as_contactwidget_button')) ? AgentStormSettingCache::get('as_contactwidget_button') : 'Send Now'; ?></button>
        </div>
        
        <input type="hidden" name="as_contactwidget_submit" value="<?php echo $session_code; ?>" />
        <input type="hidden" name="as_session_code" value="1" />
        
    </div>

</form>