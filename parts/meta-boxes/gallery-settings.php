<?php
/*
Title: Gallery
Post Type: gallery
Order: 5
Collapse: false
Priority: high
*/
require_once __DIR__.'/../../includes/gallery.php';
$shortcode = '<pre>[page_gallery id="'. $post->ID .'"]</pre>';

$choices_array2 = array(''=>'-- Select -- ');
$term_choice = get_terms('media_category',['hide_empty' =>false]);

foreach ($term_choice as $term){
    $choices_array2[$term->term_id] =  $term->name;
}

piklist('field', array(
  'type' => 'html',
  'label' => 'Shortcode',
  'value' => $shortcode
));

piklist('field', array(
  'type' => 'select',
  'field'=> 'randomize',
  'label' => __('Randomize'),
  'choices' => [
    'yes' => 'yes',
    'no'  => 'no'
  ],
  'value' => 'no',
  'columns'=> 4
));

piklist('field', array(
  'type' => 'select',
  'field'=> 'gallery_type',
  'label' => __('Gallery Type'),
  'choices' => [
    'sidebar' => 'Sidebar',
    'full'  => 'Full',
    'media-kit' =>'Media Kit'
  ],
  'value' => 'sidebar',
  'columns'=> 4
));

piklist('field', array(
  'type' => 'select',
  'field'=> 'thumbs-per-row',
  'label' => __('Thumbs per Row'),
  'choices' => [
    '6' => '6',
    '5' => '5',
    '4' => '4',
    '3' => '3',
    '2' => '2'
  ],
  'value' => '5',
  'columns'=> 4
));

piklist('field',[
  'type' => 'radio',
  'field'=> 'database-or-yaml',
  'label'=> 'Use Yaml',
  'value' => 'internal',
  'choices' => [
    'yaml' => 'Yaml',
    'internal' => 'Internal'
  ],

]);

if (is_plugin_active('enhanced-media-library/enhanced-media-library.php') ){
  piklist('field',[
    'type' => 'select',
    'label' => __('Media Category slug or id'),
    'field' => 'media-category',
    'choices' => $choices_array2
  ]);
}
else {
  piklist('field', array(
    'type' => 'html',
    'label' => 'HTML Field',
    'value' => '<strong>To Allow Media Category enable plugin </strong> https://wordpress.org/plugins/enhanced-media-library/'
  ));
}
piklist('field',[
  'type' => 'text',
  'field'=> 'yaml-location',
  'label' => __('Yaml Location'),
  'description' =>"In the gallery section of main config, name of the gallery example main  main: {'@import' : 'main-gallery.yml'}",
  'conditions' => [
    [
      'field' => 'database-or-yaml',
      'value' => 'yaml'
    ]
  ]

]);


/*
piklist('field',[
    'type' => 'group',
    'field' => 'cp_gallery',
    'label' => __('Media'),
    'description' => _(''),
    'list' => true,
    'on_post_status' => array( 'value' => 'lock' ),
    'add_more' => true,
    'fields' => get_gallery_fields('cp_gallery'),

]);*/
