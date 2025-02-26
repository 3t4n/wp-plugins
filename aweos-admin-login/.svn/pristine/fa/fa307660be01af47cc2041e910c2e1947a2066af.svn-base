<?php

/**
 * AWEOS Admin Login
 *
 * @wordpress-plugin
 * Plugin Name: AWEOS Admin Login
 * Plugin URI:  -
 * Description: Use 'aweos-admin-login' for a password less login with an E-Mail link
 * Version:     1.5.13
 * Author:      AWEOS GmbH
 * Author URI:  https://aweos.de
 * Text Domain: aw_admin-login
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt

 THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

if (!defined('ABSPATH')) exit;

function awal_register_activation_hook() {

    if (version_compare(get_bloginfo("version"), "4.5", "<")) {
        wp_die("Please update WordPress to use this plugin");
    }

    // default timer: 10 min
    add_option("awal-cooldown", "600");
}

function awal_uninstall() {
    delete_option("awal-cooldown");
}

register_activation_hook(__FILE__, "awal_register_activation_hook");
register_uninstall_hook(__FILE__, "awal_uninstall");

require_once "admin-menu.php";
require_once "interface.php";
require_once "ajax-handler.php";