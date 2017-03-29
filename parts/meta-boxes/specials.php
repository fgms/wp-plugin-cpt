<?php
/*
Title: Special Content
Post Type: special
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
/*
piklist('field',[
  'type' => 'text',
  'label' => __('Subtitle'),
  'field' => 'fg-subititle',
  'columns' => 12
]);*/
piklist('field',[
  'type' => 'editor',
  'field' => 'fg-summary',
  'label' => __('Summary'),
  'description'=> __(''),
  'options' => $piklist_editor_options
]);
piklist('field',[
  'type' => 'text',
  'label' => __('Hover Button Text'),
  'field' => 'fg-hover-button-text',
  'columns' => 12
]);
piklist('field',[
  'type' => 'textarea',
  'label' => __('Hover Text'),
  'field' => 'fg-hover-text',
  'columns' => 12
]);
piklist('field',[
  'type' => 'datepicker',
  'label' => __('Stay Start Date'),
  'field' => 'fg-start-date',
  'columns' => 12,
  'options' => array(
      'dateFormat' => 'M d, yy'
    )
]);
piklist('field',[
  'type' => 'datepicker',
  'label' => __('Stay End Date'),
  'field' => 'fg-end-date',
  'columns' => 12,
  'options' => array(
      'dateFormat' => 'M d, yy'
    )
]);

piklist('field',[
  'type' => 'datepicker',
  'label' => __('Booking Window Start Date'),
  'field' => 'fg-booking-start-date',
  'columns' => 12,
  'options' => array(
      'dateFormat' => 'M d, yy'
    )
]);
piklist('field',[
  'type' => 'datepicker',
  'label' => __('Booking Window End Date'),
  'field' => 'fg-booking-end-date',
  'columns' => 12,
  'options' => array(
      'dateFormat' => 'M d, yy'
   )
]);
piklist('field',[
  'type' => 'text',
  'label' => __('Booking Code'),
  'field' => 'fg-booking-code',
  'columns' => 12
]);
piklist('field',[
  'type' => 'url',
  'label' => __('Booking Engine Link'),
  'field' => 'fg-booking-url',
  'columns' => 12
]);
