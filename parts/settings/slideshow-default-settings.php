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

piklist('field', array(
  'type' => 'html',
  'label' => '',
  'value' => '<strong>Enable overlay on Feature Images</strong>' ));

piklist('field', array(
  'type' => 'select',
  'field'=> 'overlay_enable',
  'label' => __('HTML Overlay'),
  'description' => __('This enables overlay'),
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
    'value' => "<div class=\"feature-image-overlay-inner\">\r\n<a href=\"\" class=\" btn btn-primary\">Book Now</a>\r\n<div>Or Call at: 000.000.000</div>\r\n</div>",
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
    'value' => ".single-feature-image .feature-image-overlay {top: 30px; right:30px; visibility: hidden;}\r\n\r\n@media screen and (min-width: 998px) {\r\n.single-feature-image .feature-image-overlay {visibility:visible;}\r\n}",
    'conditions' => [
        [
          'field' =>  'overlay_enable',
          'value' => 'yes'
        ]
    ],
]);
