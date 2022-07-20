<?php
/**
 * Asipi carousels
 *
 * @package           ASIPICAORUSELS
 * @author            Juan Carlos Avila
 * @copyright         2022 ZTGRUOP
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Asipi carousels
 *
 * Description:       Sistema de carruseles
 * Version:           1.0.3
 * Author:            Juan Carlos Avila
 * Text Domain:       asipi-carousels
 *
 */

define('ASIPICAROUSELS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ASIPICAROUSELS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ASIPICAROUSELS_PLUGIN_FILE', __FILE__);
define('ASIPICAROUSELS_PLUGIN_VERSION', '1.0.3');



//Language domain
add_action( 'plugins_loaded', 'asipi_carousels_textdomain' );
   function asipi_carousels_textdomain() {
       load_plugin_textdomain( 'asipi-carousels', false, dirname( plugin_basename( ASIPICAROUSELS_PLUGIN_FILE ) ) . '/languages/' );
   }
function asipi_carousels_activate() { 
 //activate plugin
 asipi_carousel_slide_function();
 asipi_carousels_name();
 flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'asipi_carousels_activate' );

require_once ASIPICAROUSELS_PLUGIN_DIR .'/functions.php';
require_once ASIPICAROUSELS_PLUGIN_DIR .'/includes/post-type/post-type.php';