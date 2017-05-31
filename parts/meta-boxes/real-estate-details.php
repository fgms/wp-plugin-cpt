<?php
/*
Title: Real Estate Display Page
Post Type: real-estate
Order: 20
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
  'type' => 'select',
  'label' => __('Display Page Type'),
  'field' => 'condo-display-type',
  'choices' => [
    'none'  => 'None',
    'html'  => 'HTML',
    'pdf'   => 'PDF'
  ],
  'value' => 'none',
  'columns' => 4
]);

/*** If type is PDF ***/
piklist('field', [
    'type' => 'file',
    'field' => 'fg-pdf',
    'label' => 'PDF Brochure',
    'options' => array('button' => 'Add PDF'),
    'columns' => 12,
    'conditions' => [
      [
        'field' => 'condo-display-type',
        'value' => 'pdf'
      ]
    ]
]);


/*** If type is HTML ***/
piklist('field',[
  'type' => 'html',
  'value' => '<strong style="color:#ff0000">Warning, html pages are currently not supported</strong>',
  'conditions' => [
    [
      'field' => 'condo-display-type',
      'value' => 'html'
    ]
  ]  
]);

require_once __DIR__.'/../../includes/slideshow.php';
piklist('field',[
    'type' => 'select',
    'label' => __('Sidebar Gallery'),
    'field' => 'sidebar-gallery',
    'choices' => get_slideshow_choices('gallery'),
    'conditions' => [
      [
        'field' => 'condo-display-type',
        'value' => 'html'
      ]
    ]

]);

piklist('field',[
  'type' => 'textarea',
  'field' => 'fg-intro-text',
  'label' => __('Intro Text'),
  'description'=> __(''),
  'attributes' => array(
    'rows' => 5,
    'cols' => 50,
    'class' => 'large-text'
  ),
  'conditions' => [
    [
      'field' => 'condo-display-type',
      'value' => 'html'
    ]
  ]
]);
piklist('field',[
  'type' => 'editor',
  'field' => 'fg-summary',
  'label' => __('Summary'),
  'description'=> __(''),
  'options' => $piklist_editor_options,
  'conditions' => [
    [
      'field' => 'condo-display-type',
      'value' => 'html'
    ]
  ]
]);

piklist('field', [
    'type' => 'file',
    'field' => 'location-map',
    'label' => 'Location Map',
    'options' => array('button' => 'Add Image'),
    'columns' => 12,
    'conditions' => [
      [
        'field' => 'condo-display-type',
        'value' => 'html'
      ]
    ]
]);
