<div class="wrap">
    <h1>
        <a href="https://www.getinchat.com" target="_blank">
            <img src="<?php echo GIC_PLUGIN_URL; ?>img/getinchat-logo-full-512.png" />
        </a>
    </h1>
    <b style="color:red;"><?php echo $error; ?></b>
    <?php if(defined('GIC_DEBUG')){ ?>
    <b style="color:red;">DEBUG MODE<br/>
        Step=<?php echo $this->gic_setup_step?><br/>
        Channel=<?php echo $this->channel_id?><br/>
        Channels=<?php print_r($this->channels)?>
    </b>
    <?php }?>


    <?php if($this->gic_setup_step != 1 and !$this->channel_id){ ?>
        <p style="margin-bottom: 0px;"><?php _e('To install GetInChat, please create a new account or use your existing one using form below','getinchat'); ?></p>
        <p class="gray" style="margin-top: 0px;"><?php echo str_replace('%GIC_URL%',GIC_URL,__('If you need help, please chat with us on <a href="%GIC_URL%">getinchat.com</a> or use <a href="https://support.getinchat.com">our forum</a>','getinchat')); ?></p>

        <div class="gray_form">
            <form method="POST">
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label for="email"><?php _e('Email address','getinchat'); ?></label>
                            </th>
                            <td class="input">
                                <input id="email" class="regular-text" type="text" value="" name="username" required>
                            </td>
                            <td class="gray"><div><?php _e('Please specify the email you will use to login to the agent’s app and admin panel. If you already have a GetInChat account, please enter the email address you use for it here.','getinchat'); ?></div></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="userPassword"><?php _e('GetInChat Password','getinchat'); ?></label>
                            </th>
                            <td class="input">
                                <input id="userPassword" class="regular-text" type="password" value="" name="password" required>
                            </td>
                            <td class="gray"><div><?php _e('Please create a new GetInChat account password. If you already have an account, please enter the password for it here.','getinchat'); ?></div></td>
                        </tr>
												<tr>
                            <th scope="row">
                                <label for="name"><?php _e('Your name (optional)','getinchat'); ?></label>
                            </th>
                            <td class="input">
                                <input id="name" class="regular-text" type="text" value="" name="name">
                            </td>
                            <td class="gray"><div><?php _e('Please enter agent name that will be visible to chat users. If you already have GetInChat account leave this field blank. You always can change name later.','getinchat'); ?></div></td>
                        </tr>
                        <tr>
                            <td colspan="3"><input class="button button-primary" type="submit" value="<?php _e('Install GetInChat Now','getinchat'); ?>"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
<?php }?>

<?php if($this->gic_setup_step == 1 and !$this->channel_id){ ?>

    <div class="gray_form">
        <form method="POST">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="email"><?php _e('Channel','getinchat'); ?></label>
                        </th>
                        <td class="input">

                            <select id="channel_id" name="channel_id" required>
                                <?php foreach(($this->channels) as $channel){?>
                                    <option value="<?php echo $channel->id ?>"><?php echo $channel->name ?></option>
                                <?php }?>

                            </select>


                        </td>
                        <td class="gray"><div><?php _e('Please select channel that will be connected to your wordpress site','getinchat'); ?></div></td>
                    </tr>

                    <tr>
                        <td colspan="3"><input class="button button-primary" type="submit" value="<?php _e('Connect','getinchat'); ?>"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <p><a href="?<?php echo http_build_query($_GET) ?>&mode=reset"><?php _e('Reset account info','getinchat'); ?></a></p>
<?php }?>

<?php if($this->channel_id){ ?>
        <div class="success"><?php _e('Congratulations! You have successfully installed GetInChat on your website. Now you need to open the agent’s app and customize the chat widget in the admin panel.','getinchat'); ?>
        </div>
        <div class="gray_form">
            <h3>1. <?php _e('Open agent client','getinchat'); ?></h3>
            <p><?php _e('To start accepting chats please open agent client and switch your status to online. Please note that widget displayed only if at leas one agent is online','getinchat'); ?></p>
            <a  class="button button-primary"  href='https://agent.getinchat.com' target="_blank"><?php _e('Go to GetInChat Agent Client','getinchat'); ?></a>

            <h3>2. <?php _e('Customize Settings and add Agents in the Admin Panel','getinchat'); ?></h3>
            <p><?php _e('Please login to the admin panel to add more agents, customize the chat widget settings and set up proactive invitations to get the most from your new live chat!','getinchat'); ?></p>
            <a  class="button button-primary"  href='<? echo GIC_URL; ?>/dashboard/' target="_blank"><?php _e('Go to GetInChat Admin Panel','getinchat'); ?></a>
            <p><a href="?<?php echo http_build_query($_GET) ?>&mode=reset"><?php _e('Reset account info','getinchat'); ?></a></p>
        </div>
        <p class="gray"><?php echo str_replace('%GIC_URL%',GIC_URL,__('If you need help, please chat with us on <a href="%GIC_URL%">getinchat.com</a> or use <a href="https://support.getinchat.com">our forum</a>','getinchat')); ?></p>
    <?php } ?>
</div>
