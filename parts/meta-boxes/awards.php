<?php
/*
Title: Award Content
Post Type: award
Order: 1
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

/*This content will display in the Awards section, as well as on any Awards widget in other areas of the website that you've defined.*/
piklist('field',[
  'type' => 'text',
  'label' => __('Category'),
  'field' => 'fg-category',
  'columns' => 12
]);

piklist('field',[
  'type' => 'datepicker',
  'label' => __('Date'),
  'field' => 'fg-date',
  'columns' => 12,
  'options' => array(
      'dateFormat' => 'MM d, yy'
    )
]);

piklist('field',[
  'type' => 'text',
  'label' => __('Event'),
  'field' => 'fg-event',
  'columns' => 12
]);

piklist('field',[
  'type' => 'text',
  'label' => __('Publisher'),
  'field' => 'fg-publisher',
  'columns' => 12
]);
piklist('field',[
  'type' => 'url',
  'label' => __('Publisher Link'),
  'field' => 'fg-publisher-link',
  'columns' => 12
]);

piklist('field',[
  'type' => 'editor',
  'field' => 'fg-summary',
  'label' => __('Summary'),
  'description'=> __(''),
  'options' => $piklist_editor_options
]);
piklist('field', [
    'type' => 'file',
    'field' => 'fg-feature-image',
    'label' => 'Images',
    'options' => array('button' => 'Add Image'),
    'columns' => 12
]);
