<?php
/*
Title: Special Offer Content
Post Type: special
Order: 2
Collapse: false
Priority: high
*/

$theme_options = get_option('special_settings');

$type_choices = [];
$property_choices = [];
if ( !(empty($theme_options['special_type']))){
  foreach($theme_options['special_type'] as $type){
    if (!empty($type['special_slug']) && (!empty($type['special_name']))){
      $type_choices[$type['special_slug']] = $type['special_name'];
    }
  }
}

if ( !(empty($theme_options['special_properties']))){
  foreach($theme_options['special_properties'] as $properties){
    if (!empty($properties['property_name'])){
      $property_choices[$properties['property_name']] = $properties['property_name'];
    }
  }
}

$piklist_editor_options = array( // Pass any option that is accepted by wp_editor()
      'wpautop' => false,
      'media_buttons' => true,
      'shortcode_buttons' => true,
      'teeny' => true,
      'dfw' => false,
      'quicktags' => true,
      'drag_drop_upload' => true,
      'tinymce' => array(
        'resize' => false,
        'wp_autoresize_on' => true
      )
    );
if (count($property_choices) >0 ){
  piklist('field',[
    'type' => 'select',
    'label' => __('Properties'),
    'field' => 'fg_special_properties',
    'choices' => $property_choices
  ]);
}


if (count($type_choices) >0 ){
  piklist('field',[
    'type' => 'checkbox',
    'label' => __('Category'),
    'field' => 'fg_special_type',
    'choices' => $type_choices
  ]);
}
piklist('field',[
  'type' => 'text',
  'label' => __('Subtitle'),
  'field' => 'fg-subtitle',
  'columns' => 12
]);
piklist('field',[
  'type' => 'textarea',
  'label' => __('Intro Text'),
  'field' => 'intro-text',
  'columns' => 12,
  'attributes' => array(
      'rows' => 5,
      'cols' => 50,
      'class' => 'large-text'
    )
]);

piklist('field',[
  'type' => 'editor',
  'field' => 'fg-summary',
  'label' => __('Body'),
  'description'=> __(''),
  'options' => $piklist_editor_options

]);

piklist('field',[
  'type' => 'editor',
  'field' => 'fg-terms',
  'label' => __('Terms & Conditions'),
  'description'=> __(''),
  'options' => $piklist_editor_options

]);

piklist('field',[
  'type' => 'url',
  'label' => __('Booking URL'),
  'field' => 'fg-booking-url',
  'columns' => 12
]);

piklist('field',[
  'type' => 'text',
  'label' => __('Promo Code'),
  'field' => 'fg-booking-code',
  'columns' => 12
]);
