<?php
/*
Title: Testimonial Content
Post Type: testimonial
Order: 10
Collapse: false
Priority: high
*/
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




piklist('field',[
  'type' => 'text',
  'label' => __('Guest Name (or OTA Name)'),
  'field' => 'fg-name',
  'columns' => 12
]);
piklist('field',[
  'type' => 'file',
  'field' => 'fg-image-logo',
  'label' => 'OTA Logo',
  'options' => array('button' => 'Add Logo'),
  'columns' => 3
]);
piklist('field',[
  'type' => 'file',
  'field' => 'fg-image',
  'label' => 'Guest Photo',
  'options' => array('button' => 'Add Image'),
  'columns' => 9
]);   
piklist('field',[
  'type' => 'text',
  'label' => __('Guest Location'),
  'field' => 'fg-location',
  'columns' => 12
]);
piklist('field',[
  'type' => 'datepicker',
  'label' => __('Date'),
  'field' => 'fg-date',
  'columns' => 12,
  'options' => array(
      'dateFormat' => 'M d, yy'
    )
]);
piklist('field',[
  'type' => 'url',
  'label' => __('Source URL'),
  'field' => 'fg-source',
  'columns' => 12
]);
      
piklist('field',[
  'type' => 'editor',
  'field' => 'fg-summary',
  'label' => __('Full Testimonial'),
  'description'=> __(''),
  'options' => $piklist_editor_options    
]);

piklist('field', array(
  'type' => 'select',
  'field' => 'fg-source-type',
  'label' => 'Source',
  'choices' => array(
    '' => 'Add Source ... ',
    'fanferret' => 'FanFerret',
    'tripadvisor' => 'Trip Advisor'
  )
));