<?php
/*
Title: Configuration
Post Type: slideshow
Order: 20
Collapse: false
Priority: high
*/

function get_internal_urls($post_types = []){
  $choices_array = array(''=>'-- Select  -- ');
  foreach ($post_types as $pt){
    $my_wp_query = new WP_Query();
    $all_wp_pages = $my_wp_query->query(array('post_type'       => $pt,
                                              'posts_per_page'  => 10000,
                                              'orderby'         => 'title',
                                              'order'           => 'asc'));

    foreach ($all_wp_pages as $post){
        $choices_array[ucfirst($pt)][$post->ID] =  $post->post_title;
    }
  }
  return $choices_array;
}

$choices_array = get_internal_urls(['page','post','special']);
$slideshow_settings = get_option('slideshow_settings');

$image_txt = 'Home Slideshow: <br/>'.$slideshow_settings['slideshow-home-dimensions'].'<br/><br/>Secondary Slideshow:<br/>'.$slideshow_settings['slideshow-secondary-dimensions'];

piklist('field',[
    'type' => 'text',
    'field' => 'slidedelay',
    'label' => __('Slide Delay'),
    'description' => __('(IN MS)'),
    'value'=>15000
]);
piklist('field', array(
  'type' => 'select',
  'field'=> 'youtube_enable',
  'label' => __('Use Video'),
  'description' => __('This enables youtube video on first slide'),
  'choices' => [
    'yes' => 'yes',
    'no'  => 'no'
  ],
  'value' => 'no',
));
piklist('field',[
    'type' => 'text',
    'label' => __('Youtube ID'),
    'description' => 'IE.. nY4uOZrzv0s',
    'field' => 'youtube_id',
    'columns' => 4,
    'conditions' => [
        [
          'field' =>  'youtube_enable',
          'value' => 'yes'
        ]
    ],

]);
piklist('field',[
    'type' => 'textarea',
    'label' => __('Youtube Properties'),
    'description' => '<a href="https://github.com/pupunzi/jquery.mb.YTPlayer/wiki" target="_blank">Documententation</a><br/>autoPlay:true,showControls:false,loop:true,startAt:0,endAt:20',
    'field' => 'youtube_properties',
    'columns' => 6,
    'value' => 'autoPlay:true,showControls:false,loop:true,startAt:0,endAt:20',
    'conditions' => [
        [
          'field' =>  'youtube_enable',
          'value' => 'yes'
        ]
    ],
]);
piklist('field',[
    'type' => 'file',
    'field' => 'youtube_background',
    'label' => 'Youtube Background Image',
    'options' => array('button' => 'Add Image'),
    'preview_size' =>'thumbnail',
    'columns' => 3,
    'conditions' => [
        [
          'field' =>  'youtube_enable',
          'value' => 'yes'
        ]
      ]

]);

piklist('field', array(
  'type' => 'select',
  'field'=> 'overlay_enable',
  'label' => __('HTML Overlay'),
  'description' => __('This enables youtube video on first slide'),
  'choices' => [
    'yes' => 'yes',
    'no'  => 'no'
  ],
  'value' => 'yes',
));

piklist('field',[
    'type' => 'textarea',
    'label' => __('Overlay HTML'),
    'description' => '',
    'field' => 'overlay_html',
    'columns' => 12,
    'attributes' => [
      'rows' => 5
    ],
    'value' => "<div class=\"carousel-overlay-inner\">\r\n<a href=\"\" class=\" btn btn-primary\">Book Now</a>\r\n<div>Or Call at: 000.000.000</div>\r\n</div>",
    'conditions' => [
        [
          'field' =>  'overlay_enable',
          'value' => 'yes'
        ]
    ],
]);
piklist('field',[
    'type' => 'textarea',
    'label' => __('Overlay CSS'),
    'description' => '',
    'field' => 'overlay_css',
    'columns' => 12,
    'attributes' => [
      'rows' => 8
    ],
    'value' => ".carousel .carousel-overlay {top: 30px; right:30px; visibility: hidden;}\r\n\r\n@media screen and (min-width: 998px) {\r\n.carousel .carousel-overlay {visibility:visible;}\r\n}",
    'conditions' => [
        [
          'field' =>  'overlay_enable',
          'value' => 'yes'
        ]
    ],
]);
/*
piklist('field',[
    'type' => 'textarea',
    'label' => __('Youtube Properties'),
    'description' => '<a href="https://github.com/pupunzi/jquery.mb.YTPlayer/wiki" target="_blank">Documententation</a>',
    'field' => 'youtube_filters',
    'columns' => 6,
    'value' => 'autoPlay:true,showControls:false,loop:true,startAt:0,endAt:20',
    'conditions' => [
        [
          'field' =>  'youtube_enable',
          'value' => 'yes'
        ]
    ],
]);
*/
piklist('field',[
    'type' => 'group',
    'field' => 'slides',
    'label' => __('Media'),
    'description' => _($image_txt),
    'add_more' => true,
    'fields' => [
        [
            'type' => 'file',
            'field' => 'slide-image',
            'label' => 'Image',
            'options' => array('button' => 'Add Image'),
            'preview_size' =>'thumbnail',
            'columns' => 2,

        ],
        [
            'type' => 'select',
            'label' => __('Internal URL'),
            'description' => '',
            'field' => 'internal',
            'choices' => $choices_array,
            'columns' => 4,

        ],
        [
            'type' => 'text',
            'label' => __('OR External URL'),
            'description' => 'Enter full url.',
            'field' => 'external',
            'columns' => 4,
            'conditions' => [
                [
                  'field' =>  'slides:radio-external-internal',
                  'value' => 'external'
                ]
            ],

        ],


    ]
]);
