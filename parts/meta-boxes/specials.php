<?php
/*
Title: Special Offer Content
Post Type: special
Order: 2
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
