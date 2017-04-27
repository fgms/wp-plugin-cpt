<?php
/*
Title: Defaults
Setting: slideshow_settings
Order: 10
*/

require_once __DIR__.'/../../includes/slideshow.php';
piklist('field',[
  'type' => 'text',
  'field'=> 'slideshow-home-dimensions',
  'attributes' => ['placeholder' => '1920px X 550px'],
  'value' => '1920px X 550px',
  'label' => __('Slideshow Home Dimensions'),
  'description' => 'This is for information only to show up on slideshow and feature image pages.'
]);
piklist('field',[
  'type' => 'text',
  'field'=> 'slideshow-secondary-dimensions',
  'attributes' => ['placeholder' => '1920px X 400px'],
  'value' => '1920px X 400px',
  'label' => __('Slideshow Secondary Dimensions'),
  'description' => 'This is for information only to show up on slideshow and feature image pages.'
]);
piklist('field',[
    'type' => 'group',
    'field' => 'defaults',
    'label' => __(''),
    'description' => _('Used for all pages that don\'t have a feature image or slideshow defined<br/>Multiple feature images will be randomized'),
    'add_more' => false,
    'fields' => get_slideshow_fields('defaults')
]);
