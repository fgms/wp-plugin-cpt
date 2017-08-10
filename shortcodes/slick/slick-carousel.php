<?php
call_user_func(function () {
  add_shortcode('slick_carousel',function ($atts, $content) {
    $slick_path = get_stylesheet_directory(). '/../../../vendor/kenwheeler/slick/slick/';
    if (file_exists($slick_path.'slick.min.js') and file_exists($slick_path.'slick.css')){
      $atts['responsive'] = (empty($atts['responsive'])) ? '' : $atts['responsive'];
      $atts['prevarrow'] = (empty($atts['prevarrow'])) ? false : $atts['prevarrow'];
      $atts['nextarrow'] = (empty($atts['nextarrow'])) ? '' : $atts['nextarrow'];

      $data = process_attributes($atts);
      load_assets($data);
      //echo '<pre>'; print_R($atts);echo '</pre>';
      //echo '<pre>'; print_R($data);echo '</pre>';
      return sprintf(
        '<div id="%1$s">%2$s</div>',
        $data['id'],
        do_shortcode($content)
      );
    }
    else {
      return 'Cannot find slick directory at '. $slick_path.'slick.min.js';
    }
  });
  function load_assets($data = []){
    $slick_url = get_site_url(). '/vendor/kenwheeler/slick/slick/';
    $plugin_path =  plugin_dir_path( __FILE__  ).'../../';
    $plugin_url =  plugin_dir_url( __FILE__  ).'../../';
    wp_enqueue_script('slick',$slick_url . 'slick.min.js');
    wp_enqueue_style('slick-css',$slick_url.'slick.css');
    wp_enqueue_style('slick-theme-css',$slick_url.'slick-theme.css');
    $options = '{';
      foreach ($data as $key=>$value) {
        if ($key !== 'id'){
          $options .= $key .':'.$value.',';
        }
      }
    $options .='
      swipe: true
    }';
    if (file_exists($plugin_path.'assets/js/script.js')){
      $script = sprintf('
        jQuery(function($){
          if ((typeof $().slick === "function") && ( $("#%1$s").length > 0 )){
            $("#%1$s").slick(%2$s);
          }
        });',
        $data['id'],
        $options
      );
      wp_enqueue_script('slick-control', $plugin_url.'assets/js/script.js');
      wp_add_inline_script('slick-control',$script);
    }
  }

  function process_attributes($atts){
    $data = [];
    $allowed = get_allowed_options();
    foreach ($atts as $key=>$value){
      $value = ((empty($value)) AND (!empty($allowed[$key]['default']))) ? $allowed[$key]['default'] : $value;
      $value =  html_entity_decode($value, ENT_QUOTES, 'UTF-8');
      if (!empty($allowed[$key])){
        // checking type.
        if ($allowed[$key]['type'] === 'boolean'){
          $value =($value == 'true') ? 'true' : 'false';
        }
        elseif ($allowed[$key]['type'] === 'integer'){
          $value = intval($value);
        }
        elseif ($allowed[$key]['type'] === 'html'){
          $value = "'".strip_tags($value,'<span><a><em><strong><div><p><i>')."'";
        }
        elseif ($allowed[$key]['type'] === 'string'){
          if ( in_array($key,['id','responsive'])  ){
            $value = strip_tags($value);
          }
          else {
            $value = "'".strip_tags($value)."'";
          }
        }
        // get default if empty, otherwise use value.
        $data[$allowed[$key]['property']] = (string)$value ;
      }
    }
    return $data;
  }

  function get_allowed_options(){
    return [
      'id'              => [ 'type' => 'string', 'property'=>'id', 'default' => 'slick-carousel-default'  ],
      'accessibilty'    => ['type' => 'boolean', 'property'=>'accessibilty',  'default' => true  ],
      'autoplay'        => ['type' => 'boolean', 'property'=>'autoplay',  'default' => false ],
      'autoplayspeed'   => ['type' => 'integer', 'property'=>'autoplaySpeed',  'default' => 3000  ],
      'infinite'        => ['type' => 'boolean', 'property'=>'infinite',  'default' => false],
      'responsive'      => [ 'type' => 'string', 'property'=>'responsive',  'default' => '[{breakpoint: 1199, settings: { slidesToShow : 3}},{breakpoint: 989, settings : {slidesToShow : 2}},{breakpoint: 480, settings: {slidesToShow: 1}}]'  ],
      'slidesperrow'    => ['type' => 'integer', 'property'=>'slidesPerRow',  'default' => 3  ],
      'slidestoshow'    => ['type' => 'integer', 'property'=>'slidesToShow',  'default' => 3  ],
      'slidestoscroll'  => ['type' => 'integer', 'property'=>'slidesToScroll',  'default' => 1  ],
      'speed'           => ['type' => 'integer', 'property'=>'speed',  'default' => 300  ],
      'dots'            => ['type' => 'boolean', 'property'=>'dots',  'default' => true],
      'arrows'          => ['type' => 'boolean', 'property'=>'arrows',  'default' => true ],
      'prevarrow'       => ['type' => 'html', 'property'=>'prevArrow',  'default' =>'<a class="animiated-control-arrow control-arrow-prev "><span ></span></a>'],
      'nextarrow'       => ['type' => 'html', 'property'=>'nextArrow',  'default' =>'<a class="animiated-control-arrow control-arrow-next "><span ></span></a>']
    ];
  }
});
?>
