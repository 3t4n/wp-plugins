<?php    
     $out = '';  
        $out .= '<form id="login" action="login" method="post">';
        $out .= ' <h1>Site Login</h1>';
        $out .= '<p class="status"></p>';
        $out .= '<label for="username">Username</label>';
        $out .= '<input id="username" type="text" name="username">';
		$out .= '<br/>';
        $out .= '<label for="password">Password</label>';
        $out .= '<input id="password" type="password" name="password">';
		$out .= '<br/>';
        $out .= ' <a class="lost" href="'.wp_lostpassword_url().'">Lost your password?</a>';
		$out .= '<br/>';
        $out .= '<input class="submit_button" type="submit" value="Login" name="submit">';
        $out .= ''.wp_nonce_field( 'ajax-login-nonce', 'security' ).'';
        $out .= ' </form>';
		
		
    ?>