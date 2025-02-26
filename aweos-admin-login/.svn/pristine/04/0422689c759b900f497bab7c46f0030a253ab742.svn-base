<?php

if (!defined('ABSPATH')) exit;

add_action('admin_menu', 'awal_create_menu');

function awal_create_menu() {
	add_menu_page(
		'Admin Login', 
		'Admin Login',
		'administrator', 
		__FILE__, 
		'awal_admin_menu' 
	);

	add_action( 'admin_init', 'awal_register_setting' );
}

function awal_register_setting() {
	register_setting( 'awal-opt-group', 'awal-font-size' );
}

function awal_admin_menu() {
?>
<div class="wrap">
	<h1>AWEOS Google Maps iframe load per click</h1>
	<form method="post" action="options.php">

	    <?php settings_fields( 'awal-opt-group' ); ?>
	    <?php do_settings_sections( 'awal-opt-group' ); ?>

	    <h4>Disclosure:</h4>
	    
		<p>THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.</p>

	    <?php submit_button(); ?>

	</form>
</div>
<?php } 