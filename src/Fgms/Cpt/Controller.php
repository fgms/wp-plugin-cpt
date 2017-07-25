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
        if ($this->is_enabled('awards-enable' )){
          $post_type_array[] = [
            'name'          =>'Awards',
            'singular_name' =>'Award',
            'post_type'     =>'award',
            'domain'        =>'award',
            'menu_icon'     =>'dashicons-awards',
            'supports'      => array('title','page-attributes'),
            'exclude_from_search'        => true,
            'public'        => false
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
        if ($this->is_enabled('landingpage-enable' )){
          $post_type_array[] = [
            'name'          =>'Landing Pages',
            'singular_name' =>'Landing Page',
            'post_type'     =>'lp',
            'domain'        =>'fgms-lp',
            'menu_icon'     =>'dashicons-admin-page',
            'supports'      => array('title','page-attributes'),
            'exclude_from_search'        => true,
            'public'        => true
          ];
        }

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
            $defaults['display'] = 'Display Type';
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
          if ($column_name == 'display'){
            $display_type = get_post_meta($post_ID, 'condo-display-type', true);
            if ($display_type == 'pdf' ){
              $pdf_id = get_post_meta($post_ID,'fg-pdf',true);
              $display_type = '<a href="'. wp_get_attachment_url($pdf_id) . '" target="_blank">' . basename(get_attached_file($pdf_id)) . '</a>';
            }
            echo $display_type;

          }
       }, 10, 2);
       //testimonialsa
        add_filter('manage_testimonial_posts_columns', function($defaults){
          unset($defaults['date']);
          unset($defaults['wpseo-score']);
          unset($defaults['wpseo-score-readability']);
          $defaults['fg-date'] = 'Testimonial Date';
          $defaults['source'] = 'Source';
          $defaults['snippet'] = 'Snippet';
          return $defaults;
        }, 20);
        add_action('manage_testimonial_posts_custom_column', function($column_name,$post_ID){
          if ($column_name == 'fg-date'){  echo get_post_meta($post_ID, 'fg-date', true); }
          if ($column_name == 'source'){  echo ucfirst(get_post_meta($post_ID, 'fg-source-type', true)); }
          if ($column_name == 'snippet'){  echo strip_tags(addslashes(get_post_meta($post_ID, 'fg-summary', true))) ; }

       }, 10, 2);
      // specials
       add_filter('manage_special_posts_columns', function($defaults){
         unset($defaults['date']);
         unset($defaults['wpseo-score']);
         unset($defaults['wpseo-score-readability']);
         $defaults['active'] = 'Home Page';
         $defaults['modal_active'] = 'Modal Active';
         $defaults['booking_start_date'] = 'Booking Start Date';
         $defaults['booking_end_date'] = 'Booking End Date';
         $defaults['start_date'] = 'Start Date';
         $defaults['end_date'] = 'End Date';

         $defaults['code'] = 'Promo Code';
         $defaults['intro'] = 'Introduction';
         $defaults['image'] = 'Image';
         return $defaults;
       }, 20);
       add_action('manage_special_posts_custom_column', function($column_name,$post_ID){
         if ($column_name == 'sort'){  echo intval(get_post_meta($post_ID, 'order', true)); }
         if ($column_name == 'active'){  echo ucfirst(get_post_meta($post_ID, 'fg-widget-enable', true)); }
         if ($column_name == 'modal_active'){  echo ucfirst(get_post_meta($post_ID, 'fg-modal-enable', true)); }
         if ($column_name == 'start_date'){  echo get_post_meta($post_ID, 'fg-start-date', true); }
         if ($column_name == 'end_date'){  echo get_post_meta($post_ID, 'fg-end-date', true); }
         if ($column_name == 'booking_start_date'){  echo get_post_meta($post_ID, 'fg-booking-start-date', true); }
         if ($column_name == 'booking_end_date'){  echo get_post_meta($post_ID, 'fg-booking-end-date', true); }
         if ($column_name == 'code'){  echo get_post_meta($post_ID, 'fg-booking-code', true); }
         if ($column_name == 'intro'){  echo strip_tags(addslashes(get_post_meta($post_ID, 'intro-text', true))) ; }
         if ($column_name == 'image'){  echo wp_get_attachment_image(get_post_meta($post_ID, 'fg-widget-images', true)); }

      }, 10, 2);
      // Galleries
      add_filter('manage_gallery_posts_columns', function($defaults){
        unset($defaults['date']);
        unset($defaults['wpseo-score']);
        unset($defaults['wpseo-score-readability']);
        $defaults['randomize'] = 'Randomize';
        $defaults['type'] = 'Type';
        $defaults['yaml'] = 'Yaml/Internal';
        $defaults['image'] = 'Image';
        $defaults['count'] = 'Image Count';
        return $defaults;
      }, 20);
      add_action('manage_gallery_posts_custom_column', function($column_name,$post_ID){
        $group_data = get_post_meta($post_ID,'cp_gallery',true);
        $group_data = maybe_unserialize($group_data);
        $first_data = $group_data[0];
        $image = false;
        if (! empty ($first_data['image'][0])) {
          $image = $first_data['image'][0];
        }
        if ($column_name == 'shortcode'){  echo '[page_gallery id="'.$post_ID.'"]'; }
        if ($column_name == 'randomize'){  echo get_post_meta($post_ID, 'randomize', true); }
        if ($column_name == 'type'){  echo ucfirst(get_post_meta($post_ID, 'gallery_type', true));        }
        if ($column_name == 'yaml'){
          echo ucfirst(get_post_meta($post_ID, 'database-or-yaml', true));
          if (is_plugin_active('enhanced-media-library/enhanced-media-library.php') ){
            $term_id = intval(get_post_meta($post_ID,'media-category',true));
            if ($term_id > 0){
              $term = get_term($term_id);
              echo '<br/> Uses Category <strong>'. $term->name .'</strong>';
            }

          }
        }
        if ($image !== false){
          if ($column_name == 'image'){  echo wp_get_attachment_image($image); }
        }

        if ($column_name == 'count'){
           $new_count = 0;
           if (is_plugin_active('enhanced-media-library/enhanced-media-library.php') ){
             $term_id = intval(get_post_meta($post_ID,'media-category',true));
             if ($term_id > 0){
               $term = get_term($term_id);
               $new_count = $term->count;
             }

           }
            echo ($image) ? count($group_data): $new_count;
         }

     }, 10, 2);
     // Media Clippings
      add_filter('manage_media-clip_posts_columns', function($defaults){
        unset($defaults['date']);
        unset($defaults['wpseo-score']);
        unset($defaults['wpseo-score-readability']);
        $defaults['pub_date'] = 'Date';
        $defaults['publisher'] = 'Publisher';
        $defaults['image'] = 'Logo';
        $defaults['summary'] = 'Summary';
        return $defaults;
      }, 20);
      add_action('manage_media-clip_posts_custom_column', function($column_name,$post_ID){

        if ($column_name == 'pub_date'){  echo ucfirst($this->get_meta($post_ID, 'fg-date')); }
        if ($column_name == 'publisher'){  echo $this->get_meta($post_ID, 'fg-publisher'); }
        if ($column_name == 'image'){  echo wp_get_attachment_image($this->get_meta($post_ID, 'clipping-logo')); }
        if ($column_name == 'summary'){  echo $this->get_meta($post_ID, 'fg-summary'); }
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

    private function get_meta($id, $key){
      $val = get_post_meta($id, $key, true);
      return empty($val) ? '' : $val;
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
