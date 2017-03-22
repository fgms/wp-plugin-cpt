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
    'attributes' => array('placeholder' => 15000)


]);
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
            'label' => '',
            'options' => array('button' => 'Add Image'),
            'preview_size' =>'thumbnail',
            'columns' => 4,
        ],
        [
          'type' => 'radio',
          'field' => 'radio-external-internal',
          'label' => 'URL Type',
          'choices' => [
            'internal' => 'Internal',
            'external' => 'External'
          ],
          'value' => 'internal',
          'columns' => 2
        ],
        [
            'type' => 'text',
            'label' => __('External URL'),
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
        [
            'type' => 'select',
            'label' => __('Internal URL'),
            'description' => '',
            'field' => 'internal',
            'choices' => $choices_array,
            'columns' => 4,
            'conditions' => [
                [
                  'field' =>  'slides:radio-external-internal',
                  'value' => 'internal'
                ]
            ],

        ],
        [
            'type' => 'text',
            'label' => __('Alt'),
            'description' => '',
            'field' => 'alt',
            'columns' => 4,
            'value' => ''

        ],
    ]
]);
