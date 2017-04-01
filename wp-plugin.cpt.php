<?php
/**
 * Plugin Name: Custom Posttypes
 * Plugin URI: https://github.com/sturple/wp-plugin-cpt/
 * Description: Wordpress plugin to add custom post types for hotels ie Awards, Testimonials, Specials, Galleries and Slideshows
 * Version: 0.0.1
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
}
call_user_func(function () {
    $controller=new \Fgms\Cpt\Controller(new \Fgms\WordPress\WordPressImpl());
});


add_action( 'pre_get_posts', function($query){
  if ($query->get('post_type') == 'media-clip'){
    $query->set('orderby' ,'meta_value');
    $query->set('meta_key','fg-timestamp');
  }
});
add_action( 'save_post', function($post_id){
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




} );
