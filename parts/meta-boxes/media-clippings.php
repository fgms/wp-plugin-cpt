<?php
/*
Title: Media Clipping
Post Type: media-clip
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
piklist('field',[
  'type' => 'datepicker',
  'label' => __('Published Date'),
  'field' => 'fg-date',
  'columns' => 4,
  'options' => array(
      'dateFormat' => 'MM d, yy'
    )
]);
piklist('field',[
  'type' => 'text',
  'label' => __('Author'),
  'field' => 'fg-author',
  'columns' => 8
]);
piklist('field',[
  'type' => 'text',
  'label' => __('Publisher'),
  'field' => 'fg-publisher',
  'columns' => 8
]);

piklist('field', [
    'type' => 'file',
    'field' => 'clipping-logo',
    'label' => 'Publisher Logo',
    'options' => array('button' => 'Add Logo'),
    'columns' => 12
]);

piklist('field',[
  'type' => 'radio',
  'label' => __('Link Type'),
  'field' => 'clipping-type',
  'columns' => 4,
  'choices' => [
    'html' => 'External Publisher Page',
    'pdf' => 'PDF File'
  ],
  'value' => 'html'
]);

piklist('field',[
  'type' => 'text',
  'label' => __('Publisher Page URL'),
  'field' => 'clipping-url',
  'columns' => 8,
  'conditions' => [
    [
      'value' => 'html',
      'field' => 'clipping-type'
    ]
  ]
]);

piklist('field', [
    'type' => 'file',
    'field' => 'clipping-pdf',
    'label' => 'PDF',
    'options' => array('button' => 'Add PDF'),
    'columns' => 8,
    'conditions' => [
      [
        'value' => 'pdf',
        'field' => 'clipping-type'
      ]
    ]
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
  'label' => __('Summary'),
  'description'=> __(''),
  'options' => $piklist_editor_options
]);

piklist('field', [
    'type' => 'file',
    'field' => 'feature-image',
    'label' => 'Background Image',
    'options' => array('button' => 'Add Image'),
    'columns' => 12
]);
