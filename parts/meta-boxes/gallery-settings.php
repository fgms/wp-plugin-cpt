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
/*
piklist('field', array(
  'type' => 'select',
  'field'=> 'gallery_type',
  'label' => __('Gallery Type'),
  'choices' => [
    'sidebar' => 'Sidebar',
    'full'  => 'Full'
  ],
  'value' => 'sidebar',
  'columns'=> 4
));*/

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
    'type' => 'group',
    'field' => 'cp_gallery',
    'label' => __('Media'),
    'description' => _(''),
    'add_more' => true,
    'fields' => get_gallery_fields('cp_gallery')
]);
