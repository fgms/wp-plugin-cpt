<?php
/*
Title: Announcement Content
Post Type:company-announcement
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
  'type' => 'datepicker',
  'label' => __('Date'),
  'field' => 'fg-date',
  'columns' => 4,
  'options' => array(
      'dateFormat' => 'MM d, yy'
    )
]);
piklist('field',[
  'type' => 'text',
  'label' => __('Subtitle'),
  'field' => 'fg-subtitle',
  'columns' => 8
]);

piklist('field',[
  'type' => 'editor',
  'field' => 'fg-summary',
  'label' => __('Body'),
  'description'=> __(''),
  'options' => $piklist_editor_options
]);
