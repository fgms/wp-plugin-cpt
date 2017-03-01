<?php
/**
 * Plugin Name: Custom Posttypes (Awards Testimonials Specials)
 * Plugin URI: https://github.com/sturple/wp-awards-testimonials-specials/
 * Description: Wordpress plugin to add custom post types for hotels (Awards, Testimonials, Specials)
 * Version: 0.0.1
 * Author: Shawn Turple
 * Author URI: http://turple.ca
 * License: GPL-3.0
 * Plugin Type: Piklist
 */
if ( file_exists( $composer_autoload = __DIR__ . '/vendor/autoload.php' ) /* check in self */
    || file_exists( $composer_autoload = WP_CONTENT_DIR.'/vendor/autoload.php') /* check in wp-content */
    || file_exists( $composer_autoload = plugin_dir_path( __FILE__ ).'vendor/autoload.php') /* check in plugin directory */
    || file_exists( $composer_autoload = get_stylesheet_directory().'/vendor/autoload.php') /* check in child theme */
    || file_exists( $composer_autoload = get_template_directory().'/vendor/autoload.php') /* check in parent theme */
) {
    
    require_once $composer_autoload;
}
call_user_func(function () {
   
    $controller=new \Fgms\ATS\Controller(new \Fgms\WordPress\WordPressImpl());
});