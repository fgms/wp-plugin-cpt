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
          array('name'=>'Awards',
                'singular_name' =>'Award',
                'post_type'=>'award',
                'domain'=>'award'),
          array('name'=>'Testimonials',
                'singular_name' =>'Testimonial',
                'post_type'=>'testimonial',
                'domain'=>'testimonial'),
          array('name'=>'Specials',
                'singular_name' =>'Special',
                'post_type'=>'special',
                'domain'=>'special'),          
        );
        $this->wp=$wp;
        $this->post_type='awards';
        $this->domain='awards';
        //	Attach hooks
        $this->wp->add_action('init',[$this,'registerPostType']);
    }
    public function registerPostType()
    {
        foreach($posttype as $this->posttypes){
          $this->wp->register_post_type($this->post_type,[
              'labels' => [
                  'name' => $this->wp->__($posttype['name'],$this->domain),
                  'singular_name' => $this->wp->__($posttype['singular_name'],$this->domain)
              ],
              'public' => true,
              'has_archive' => true,
              'hierarchical' => true,
              'supports'=> array('title','editor','page-attributes','revisions','excerpt','thumbnail')
          ]);          
        }
        
    }
}