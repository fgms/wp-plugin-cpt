<?php
/*
Title: Condo Sales Information
Post Type: real-estate
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
  'type' => 'select',
  'label' => __('Type'),
  'field' => 'condo-style',
  'choices' => [
    'Condominium'  => 'Condominium',
    'Townhouse'   => 'Townhouse',
  ],
  'value' => 'Condominium',
  'columns' => 4
]);
piklist('field',[
  'type' => 'select',
  'label' => __('Floor'),
  'field' => 'condo-floor',
  'choices' => [
    'ground'  => 'Ground',
    'first'   => 'First Floor',
    'second'  => 'Second Floor',
    'third'  => 'Third Floor'
  ],
  'conditions' => [
    [
      'value' => 'Condominium',
      'field' => 'condo-style'
    ]
  ],
  'columns' => 4
]);

piklist('field',[
  'type' => 'select',
  'label' => __('# Bedrooms'),
  'field' => 'condo-type',
  'choices' => [
    'Studio' => 'Studio',
    'Studio w/ Loft' => 'Studio w/ Loft',
    '1 Bedroom' => '1 Bedroom',
    'One Bedroom w/ Loft' => 'One Bedroom w/ Loft',
    '2 Bedroom' => '2 Bedrooms',
    'Two Bedroom w/ Loft' => 'Two Bedroom w/ Loft'
  ],
  'value' => 'Studio',
  'columns' => 4
]);

piklist('field',[
  'type' => 'select',
  'label' => __('View'),
  'field' => 'condo-view',
  'choices' => [
    'Oceanfront' => 'Oceanfront',
    'Ocean View'   => 'Ocean View',
    'Garden / Ocean View' => 'Garden / Ocean View',
    'Garden View'  => 'Garden View',

  ],
  'columns' => 4
]);

piklist('field',[
  'type' => 'text',
  'label' => __('Asking Price'),
  'field' => 'condo-price',
  'columns' => 4
]);

piklist('field',[
  'type' => 'radio',
  'label' => __('Status'),
  'field' => 'condo-status',
  'choices' => [
    'active' => 'Active',
    'pending' => 'Sale Pending',
    'sold' => 'Sold',
    'inactive' => 'Inactive'
  ],
  'value' => 'active',
  'columns' => 4
]);

piklist('field', [
    'type' => 'file',
    'field' => 'location-map',
    'label' => 'Location Map',
    'options' => array('button' => 'Add Image'),
    'columns' => 12
]);

piklist('field',[
  'type' => 'editor',
  'field' => 'fg-summary',
  'label' => __('Summary'),
  'description'=> __(''),
  'options' => $piklist_editor_options
]);
