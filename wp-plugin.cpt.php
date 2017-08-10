<?php
/**
 * Plugin Name: Custom Posttypes
 * Plugin URI: https://github.com/sturple/wp-plugin-cpt/
 * Description: Wordpress plugin to add custom post types for hotels ie Awards, Testimonials, Specials, Galleries and Slideshows
 * Version: 0.1.6
 * Author: Shawn Turple
 * Author URI: http://turple.ca
 * License: GPL-3.0
 * Plugin Type: Piklist
 */
if ( file_exists( $composer_autoload = __DIR__ . '/vendor/autoload.php' ) /* check in self */
    || file_exists( $composer_autoload = WP_CONTENT_DIR.'/vendor/autoload.php') /* check in wp-content */
    || file_exists( $composer_autoload = WP_CONTENT_DIR .'/../vendor/autoload.php') /* check in root directory */
    || file_exists( $composer_autoload = plugin_dir_path( __FILE__ ).'vendor/autoload.php') /* check in plugin directory */
    || file_exists( $composer_autoload = get_stylesheet_directory().'/vendor/autoload.php') /* check in child theme */
    || file_exists( $composer_autoload = get_template_directory().'/vendor/autoload.php') /* check in parent theme */
) {

    require_once $composer_autoload;
    require_once(__DIR__.'/shortcodes/gallery.php');
    require_once(__DIR__.'/shortcodes/page-gallery.php');
    require_once(__DIR__.'/shortcodes/slick/slick-carousel.php');
    require_once(__DIR__.'/shortcodes/slick/slick-slide.php');    
}
call_user_func(function () {
    $controller=new \Fgms\Cpt\Controller(new \Fgms\WordPress\WordPressImpl());
});

function setTimeStampMetaData($field,$id){
  if (! empty($_POST['_post_meta'][$field])){
    $date = $_POST['_post_meta'][$field];
    $timestamp_field = str_replace('date','timestamp', $field);
    if (!empty($date)){
      $datetime = new DateTime( $date );
      update_post_meta( $id, $timestamp_field, $datetime->getTimestamp() );
    }
  }
}
add_post_type_support( 'special', 'page-attributes' );
add_action( 'pre_get_posts', function($query){
  if ($query->get('post_type') == 'media-clip'){
    $query->set('orderby' ,'meta_value');
    $query->set('meta_key','fg-timestamp');
  }
});
add_action( 'save_post', function($post_id){

  // create another custom meta data fg-timestamp for all date fields.
  $whitelist = ['media-clip', 'newsletter','award','testimonial','special'];
  if ( (!empty($_POST['post_type'])) && (in_array($_POST['post_type'],$whitelist)) ){
    if ($_POST['post_type'] == 'special'){
      setTimeStampMetaData('fg-start-date',$post_id);
      setTimeStampMetaData('fg-end-date',$post_id);
      setTimeStampMetaData('fg-booking-start-date',$post_id);
      setTimeStampMetaData('fg-booking-end-date',$post_id);
    }
    else {
      setTimeStampMetaData('fg-date',$post_id);
    }
  }
});


add_filter('fg_theme_master_twig_locations', function($timberLocationsArray){
  $a = [];
  $a[] = __DIR__ .'/twig-templates';
  return array_merge($a,$timberLocationsArray);
});

add_filter('piklist_admin_pages', function($pages){
  $pages[] = [
	 'page_title' => __('Settings')
	 ,'menu_title' => __('Settings', 'piklist')
	 ,'sub_menu' => 'edit.php?post_type=special'
	 ,'capability' => 'manage_options'
	 ,'menu_slug' => 'special_settings'
	 ,'setting' => 'special_settings'
	 ,'single_line' => true
	 ,'save_text' => 'Save Settings'
	];
  $pages[] = [
	 'page_title' => __('Settings')
	 ,'menu_title' => __('Settings', 'piklist')
	 ,'sub_menu' => 'edit.php?post_type=lp'
	 ,'capability' => 'manage_options'
	 ,'menu_slug' => 'landingpage_settings'
	 ,'setting' => 'landingpage_settings'
	 ,'single_line' => true
	 ,'save_text' => 'Save Settings'
	];
	$pages[] = [
	 'page_title' => __('Settings')
	 ,'menu_title' => __('Settings', 'piklist')
	 ,'sub_menu' => 'edit.php?post_type=slideshow'
	 ,'capability' => 'manage_options'
	 ,'menu_slug' => 'slideshow_settings'
	 ,'setting' => 'slideshow_settings'
	 ,'single_line' => true
	 ,'save_text' => 'Save Settings'
	];
	$pages[] = [
	 'page_title' => __('Settings')
	 ,'menu_title' => __('Settings', 'piklist')
	 ,'sub_menu' => 'edit.php?post_type=gallery'
	 ,'capability' => 'manage_options'
	 ,'menu_slug' => 'gallery_settings'
	 ,'setting' => 'gallery_settings'
	 ,'single_line' => true
	 ,'save_text' => 'Save Settings'
	];
  $pages[] = [
	 'page_title' => __('Settings')
	 ,'menu_title' => __('Settings', 'piklist')
	 ,'sub_menu' => 'edit.php?post_type=real-estate'
	 ,'capability' => 'manage_options'
	 ,'menu_slug' => 'realestate_settings'
	 ,'setting' => 'realestate_settings'
	 ,'single_line' => true
   ,'default_tab' => 'General'
	 ,'save_text' => 'Save Settings'
	];
  $pages[] = [
   'page_title' => __('Custom Post Type Settings')
   ,'menu_title' => __('CPT Settings', 'piklist')
   ,'sub_menu' => 'options-general.php'
   ,'capability' => 'manage_options'
   ,'menu_slug' => 'cpt_settings'
   ,'setting' => 'cpt_settings'
   ,'single_line' => true
   ,'save_text' => 'Save Settings'
  ];
  return $pages;
});
