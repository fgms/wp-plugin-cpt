<?php
namespace Fgms\ATS;
class Controller
{
    private $wp;
    private $post_type;
    private $domain;
    private $posttypes = array();
    public function __construct (\Fgms\WordPress\WordPress $wp)
    {
        $this->posttypes = array(
          array('name'          =>'Awards',
                'singular_name' =>'Award',
                'post_type'     =>'award',
                'domain'        =>'award',
                'menu_icon'     =>'dashicons-awards',
                'supports'      => array('title','page-attributes')
                ),
          array('name'          =>'Testimonials',
                'singular_name' =>'Testimonial',
                'post_type'     =>'testimonials',
                'domain'        =>'testimonials',
                'menu_icon'     =>'dashicons-groups',
                'supports'      => array('title','page-attributes')
                ),
          array('name'          =>'Specials',
                'singular_name' =>'Special',
                'post_type'     =>'special',
                'domain'        =>'special',
                'menu_icon'     =>'dashicons-star-filled',
                'supports'      => array('title','page-attributes')
                ),          
                  
        );
        $this->wp=$wp;
        //	Attach hooks
        $this->wp->add_action('init',[$this,'registerPostType']);
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
              'taxonomies'      => empty($posttype['taxonomies']) ? array(): $posttype['taxonomies'],
              'public'          => true,
              'menu_icon'       =>$posttype['menu_icon'],
              'has_archive'     => empty($posttype['has_archive']) ? true : $posttype['has_archive'] ,
              'hierarchical'    => true,
              'supports'        => empty($posttype['supports']) ? array('title','editor','page-attributes','revisions','excerpt','thumbnail') : $posttype['supports']
          ]);
        }
    }
}