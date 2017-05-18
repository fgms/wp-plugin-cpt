<?php
namespace Fgms\Cpt;
class Controller
{
    private $wp;
    private $post_type;
    private $domain;
    private $posttypes = array();
    public function __construct (\Fgms\WordPress\WordPress $wp)
    {

        $post_type_array = [];
        if ($this->is_enabled('awards-enable',true )){
          $post_type_array[] = [
            'name'          =>'Awards',
            'singular_name' =>'Award',
            'post_type'     =>'award',
            'domain'        =>'award',
            'menu_icon'     =>'dashicons-awards',
            'supports'      => array('title','page-attributes')
          ];
        }
        if ($this->is_enabled('testimonials-enable' )){
          $post_type_array[] = [
            'name'          =>'Testimonials',
            'singular_name' =>'Testimonial',
            'post_type'     =>'testimonial',
            'domain'        =>'testimonial',
            'menu_icon'     =>'dashicons-groups',
            'supports'      => array('title','page-attributes'),
            'public'        => false
          ];
        }
        if ($this->is_enabled('specials-enable' )){
          $post_type_array[] = [
            'name'          =>'Specials',
            'singular_name' =>'Special',
            'post_type'     =>'special',
            'domain'        =>'special',
            'menu_icon'     =>'dashicons-star-filled',
            'supports'      => array('title','page-attributes')
          ];
        }
        if ($this->is_enabled('slideshows-enable' )){
          $post_type_array[] = [
            'name'          =>'Slideshows',
            'singular_name' =>'Slideshow',
            'post_type'     =>'slideshow',
            'domain'        =>'fgms-slideshow',
            'menu_icon'     =>'dashicons-media-interactive',
            'supports'      => array('title'),
            'exclude_from_search'        => true,
            'public'        => false
          ];
        }
        if ($this->is_enabled('galleries-enable' )){
          $post_type_array[] = [
            'name'          =>'Galleries',
            'singular_name' =>'Gallery',
            'post_type'     =>'gallery',
            'domain'        =>'fgms-gallery',
            'menu_icon'     =>'dashicons-format-gallery',
            'supports'      => array('title'),
            'exclude_from_search'        => true,
            'public'        => false
          ];
        }
        if ($this->is_enabled('announcements-enable' )){
          $post_type_array[] = [
            'name'          =>'Announcements',
            'singular_name' =>'Announcement',
            'post_type'     =>'company-announcement',
            'domain'        =>'fgms-company-announcement',
            'menu_icon'     =>'dashicons-megaphone',
            'supports'      => array('title'),
            'exclude_from_search'        => false,
            'public'        => true
          ];
        }
        if ($this->is_enabled('clippings-enable' )){
          $post_type_array[] = [
            'name'          =>'Media Clippings',
            'singular_name' =>'Meida Clip',
            'post_type'     =>'media-clip',
            'domain'        =>'fgms-media-clip',
            'menu_icon'     =>'dashicons-images-alt',
            'supports'      => array('title'),
            'exclude_from_search'        => false,
            'public'        => true
          ];
        }
        if ($this->is_enabled('newsletters-enable' )){
          $post_type_array[] = [
            'name'          =>'Newsletters',
            'singular_name' =>'Newsletter',
            'post_type'     =>'newsletter',
            'domain'        =>'fgms-newsletter',
            'menu_icon'     =>'dashicons-media-document',
            'supports'      => array('title'),
            'exclude_from_search'        => false,
            'public'        => true
          ];
        }
        if ($this->is_enabled('realestate-enable' )){
          $post_type_array[] = [
            'name'          =>'Real Estate',
            'singular_name' =>'Real Estate Listing',
            'post_type'     =>'real-estate',
            'domain'        =>'fgms-real-estate',
            'menu_icon'     =>'dashicons-building',
            'supports'      => array('title'),
            'exclude_from_search'        => false,
            'public'        => true
          ];
        }
        /*
        if ($this->is_enabled('gd-announcements-enable' )){
          $post_type_array[] = [
            'name'          =>'GD Updates',
            'singular_name' =>'GD Update',
            'post_type'     =>'dir-announcement',
            'domain'        =>'fgms-dir-announcement',
            'menu_icon'     =>'dashicons-index-card',
            'supports'      => array('title', 'editor'),
            'exclude_from_search'        => true,
            'public'        => false
          ];
        }
        if ($this->is_enabled('gd-activities-enable' )){
          $post_type_array[] = [
            'name'          =>'GD Activities',
            'singular_name' =>'GD Activity',
            'post_type'     =>'dir-activity',
            'domain'        =>'fgms-activity',
            'menu_icon'     =>'dashicons-index-card',
            'supports'      => array('title'),
            'exclude_from_search'        => true,
            'public'        => false
          ];
        }
        if ($this->is_enabled('gd-dining-enable' )){
          $post_type_array[] = [
            'name'          =>'GD Dining',
            'singular_name' =>'GD Dining',
            'post_type'     =>'dir-dining',
            'domain'        =>'fgms-dining',
            'menu_icon'     =>'dashicons-index-card',
            'supports'      => array('title'),
            'exclude_from_search'        => true,
            'public'        => false
          ];
        }
        */
        $this->posttypes = $post_type_array;
        $this->wp=$wp;
        //	Attach hooks
        $this->wp->add_action('init',[$this,'registerPostType']);

        // updating index for Real Estate.
        add_filter('manage_real-estate_posts_columns', function($defaults){

            unset($defaults['date']);
            unset($defaults['wpseo-score']);
            unset($defaults['wpseo-score-readability']);
            $defaults['title'] = 'Unit#';
            $defaults['bedrooms'] = 'Bedrooms';
            $defaults['views'] = 'View | Type';
            $defaults['price'] = 'Price';
            $defaults['status'] = 'Status';
            return $defaults;
        }, 20);
        add_action('manage_real-estate_posts_custom_column', function($column_name,$post_ID){
          $options = get_option('realestate_settings');
          $style = get_post_meta($post_ID, 'condo-style', true);
          if (strlen($style) > 5 ){
            $style = ' | ' .$style;
          }
          if ($column_name == 'bedrooms'){  echo get_post_meta($post_ID, 'condo-type', true); }
          if ($column_name == 'views'){  echo get_post_meta($post_ID, 'condo-view', true) . $style ; }
          if ($column_name == 'price'){  echo get_post_meta($post_ID, 'condo-price', true) . ' '. $options['realestate_units']; }
          if ($column_name == 'status'){  echo ucfirst(get_post_meta($post_ID, 'condo-status', true)); }
       }, 10, 2);

        add_action( 'template_redirect', function() {
           if ( is_singular('real-estate') ) {
             wp_redirect( get_post_type_archive_link('real-estate'), 302 );
             exit;
           }
           elseif (is_singular('newsletter')){
             wp_redirect( get_post_type_archive_link('newsletter'), 302 );
             exit;
           }
         });
    }

    private function is_enabled($opt, $default=false){
      $theme_options = get_option('cpt_settings');
      if (!empty($theme_options[$opt])){
        return ($theme_options[$opt] == 'enable');
      }
      return $default;
    }

    public function registerPostType()
    {
        foreach($this->posttypes as $posttype){
          $this->wp->register_post_type($posttype['post_type'],[
              'labels'          => [
                  'name' => $this->wp->__($posttype['name'],$posttype['domain']),
                  'singular_name' => $this->wp->__($posttype['singular_name'],$posttype['domain']),
                  'add_new_item' => $this->wp->__('Add New '. $posttype['singular_name'], $posttype['domain']),
                  'edit_item' => $this->wp->__('Edit '. $posttype['singular_name'], $posttype['domain']),
                  'new_item' => $this->wp->__('New '. $posttype['singular_name'], $posttype['domain']),
              ],
              'taxonomies'          => empty($posttype['taxonomies']) ? array(): $posttype['taxonomies'],
              'public'              => empty($posttype['public']) ? true : $posttype['public'] ,
              'exclude_from_search' => empty($posttype['exclude_from_search']) ? false :$posttype['exclude_from_search'],
              'menu_icon'           =>$posttype['menu_icon'],
              'has_archive'         => empty($posttype['has_archive']) ? true : $posttype['has_archive'] ,
              'hierarchical'        => true,
              'rewrite'             => ['with_front' => false],
              'supports'            => empty($posttype['supports']) ? array('title','editor','page-attributes','revisions','excerpt','thumbnail') : $posttype['supports']
          ]);
        }
    }
}
