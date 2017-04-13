<?php
/*
Title: Home Page Feature Box
Post Type: special
Order: 3
Collapse: false
Priority: high
*/

piklist('field',[
  'type' => 'textarea',
  'label' => __('Hover Summary'),
  'field' => 'fg-hover-text',
  'columns' => 12
]);
piklist('field',[
  'type' => 'text',
  'label' => __('Hover Button Text'),
  'field' => 'fg-hover-button-text',
  'columns' => 12
]);

piklist('field',[
  'type'  => 'checkbox',
  'field' => 'fg-widget-enable',
  'title' => '',
  'choices' =>[
    'yes' =>'Activate'
  ],
  'value'=> 'no'
]);

piklist('field', array(
  'type' => 'file'
  ,'field' => 'fg-widget-images'
  ,'description' => 'Add Image'
  ,'options' => array(
    'modal_title' => 'Add Image(s)'
    ,'button' => 'Add Image'
  )
));
