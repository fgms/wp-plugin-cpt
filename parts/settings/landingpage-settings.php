<?php
/*
Title: Defaults
Setting: landingpage_settings
Tab: General
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
  'field'=> 'content_class',
  'value' => 'col-sm-8',
  'label' => __('Content Class'),
  'description' => '',
  'columns' => 6
]);

piklist('field',[
  'type' => 'text',
  'field'=> 'sidebar_class',
  'value' => 'col-sm-4',
  'label' => __('Sidebar Class'),
  'description' => '',
  'columns' => 6
]);
piklist('field',[
  'type' => 'text',
  'field'=> 'booking_url',
  'value' => '',
  'label' => __('Default Booking URL'),
  'description' => '',
  'columns' =>6
]);
piklist('field',[
  'type' => 'text',
  'field'=> 'phone',
  'value' => '000.000.0000',
  'label' => __('Action Phone Number'),
  'description' => ''
]);
piklist('field',[
  'type' => 'text',
  'field'=> 'header_button_text',
  'value' => '',
  'label' => __('Header Button Text'),
  'description' => ''
]);
piklist('field',[
  'type' => 'text',
  'field'=> 'calltoaction_title',
  'value' => 'Contact Us',
  'label' => __('Call to Action Title'),
  'description' => ''
]);

piklist('field',[
  'type' => 'text',
  'field'=> 'calltoaction_label',
  'value' => 'Book Online',
  'label' => __('Call to Action Link Label'),
  'description' => ''
]);

piklist('field',[
  'type' => 'editor',
  'field' => 'boilerplate',
  'label' => __('Boilerplate'),
  'description'=> __(''),
  'options' => $piklist_editor_options
]);
piklist('field',[
  'type' => 'editor',
  'field' => 'termsandconditions',
  'label' => __('Terms and Conditions'),
  'description'=> __(''),
  'options' => $piklist_editor_options
]);

piklist('field', [
    'type' => 'file',
    'field' => 'logo_header',
    'label' => 'Header Logo',
    'options' => array('button' => 'Add Logo'),
    'columns' => 4
]);
piklist('field', [
    'type' => 'file',
    'field' => 'background_image',
    'label' => 'Background Image',
    'options' => array('button' => 'Add Image'),
    'columns' => 4
]);
