<?php
if(!function_exists('asipi_carousel_general_localize')){
  function asipi_carousel_general_localize(){
      return array(
          'admin_ajax' => admin_url('admin-ajax.php'),
          'project_url'=> ASIPICAROUSELS_PLUGIN_DIR,
          
      );
  };
}
/**
 * Frontend assets
 */

if(!function_exists('asipi_carousel_frontend_assets')){

    function asipi_carousel_frontend_assets() {
        wp_enqueue_style('asipi_carousels_frontend',ASIPICAROUSELS_PLUGIN_URL .'assets/css/frontend/styles.css',[],ASIPICAROUSELS_PLUGIN_VERSION,'all');
        wp_enqueue_script('asipi_carousels_frontend',ASIPICAROUSELS_PLUGIN_URL .'assets/js/frontend/main.js',[],ASIPICAROUSELS_PLUGIN_VERSION,true);
        wp_localize_script('asipi_carousels_frontend','asipi_carousels_ajax',asipi_carousel_general_localize());
    }

    add_action('wp_enqueue_scripts', 'asipi_carousel_frontend_assets',10000 );
}
/**
  * admin assets
  */
if(!function_exists('asipi_carousel_admin_assets')){
    function asipi_carousel_admin_assets(){
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_style('asipi_carousels_admin',ASIPICAROUSELS_PLUGIN_URL.'assets/css/admin/styles.css',['wp-color-picker'],ASIPICAROUSELS_PLUGIN_VERSION,'all');
        wp_enqueue_script('asipi_carousels_admin',ASIPICAROUSELS_PLUGIN_URL.'assets/js/admin/main.js',['wp-color-picker'],ASIPICAROUSELS_PLUGIN_VERSION,true);
        wp_localize_script('asipi_carousels_admin','asipi_carousels_ajax',asipi_carousel_general_localize());
    }
    add_action('admin_enqueue_scripts', 'asipi_carousel_admin_assets',10000 );

}

/**
 * Requires
 */
require_once ASIPICAROUSELS_PLUGIN_DIR .'/includes/shortcodes/shortcodes.php';
require_once ASIPICAROUSELS_PLUGIN_DIR .'/includes/metabox/metabox.php';